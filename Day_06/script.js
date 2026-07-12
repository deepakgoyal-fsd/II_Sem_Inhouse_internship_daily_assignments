"use strict";

/**
 * Civil Registry — case file directory
 * Rebuilt around a small controller class instead of loose globals:
 *  - one fetch pipeline with abort-on-refresh
 *  - event delegation for the "open file" toggles (bound once)
 *  - a debounced search + a gender filter that compose together
 *  - IntersectionObserver-driven reveal instead of setTimeout staggering
 */

class RegistryApp {
  constructor(root) {
    this.el = {
      grid: root.querySelector("#userContainer"),
      loading: root.querySelector("#loading"),
      error: root.querySelector("#error"),
      empty: root.querySelector("#empty"),
      count: root.querySelector("#count"),
      status: root.querySelector("#statusline"),
      search: root.querySelector("#search"),
      genderFilter: root.querySelector("#genderFilter"),
      refreshBtn: root.querySelector("#refreshBtn"),
      retryBtn: root.querySelector("#retryBtn"),
    };

    this.records = [];
    this.abortController = null;
    this.searchDebounce = null;

    this.reveal = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            this.reveal.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );

    this._bindControls();
    this._bindDelegatedEvents();
    this.load();
  }

  _bindControls() {
    this.el.refreshBtn.addEventListener("click", () => this.load());
    this.el.retryBtn.addEventListener("click", () => this.load());

    this.el.search.addEventListener("input", () => {
      clearTimeout(this.searchDebounce);
      this.searchDebounce = setTimeout(() => this.applyFilters(), 180);
    });

    this.el.genderFilter.addEventListener("change", () => this.applyFilters());
  }

  // Event delegation: one listener on the grid handles every toggle,
  // present or future, instead of re-binding per card per render.
  _bindDelegatedEvents() {
    this.el.grid.addEventListener("click", (e) => {
      const btn = e.target.closest(".filecard__toggle");
      if (!btn) return;

      const memo = btn.parentElement.querySelector(".filecard__memo");
      const isOpen = btn.getAttribute("aria-expanded") === "true";

      btn.setAttribute("aria-expanded", String(!isOpen));
      memo.dataset.open = String(!isOpen);
      btn.querySelector(".filecard__toggle-label").textContent = isOpen
        ? "Open File"
        : "Close File";
    });
  }

  setStatus(text) {
    this.el.status.textContent = text;
  }

  async load() {
    if (this.abortController) this.abortController.abort();
    this.abortController = new AbortController();

    this._showState("loading");
    this.setStatus("requesting batch from archive…");

    try {
      const response = await fetch("https://randomuser.me/api/?results=12&noinfo", {
        signal: this.abortController.signal,
      });

      if (!response.ok) throw new Error(`Archive responded with ${response.status}`);

      const payload = await response.json();
      this.records = payload.results || [];

      this.applyFilters();
      this.setStatus(`batch received — ${this.records.length} files on desk`);
    } catch (err) {
      if (err.name === "AbortError") return;
      this._showState("error");
      this.setStatus("request failed");
    }
  }

  applyFilters() {
    const query = this.el.search.value.trim().toLowerCase();
    const gender = this.el.genderFilter.value;

    const filtered = this.records.filter((user) => {
      const fullName = `${user.name.first} ${user.name.last}`.toLowerCase();
      const matchesName = fullName.includes(query);
      const matchesGender = gender === "all" || user.gender === gender;
      return matchesName && matchesGender;
    });

    this.render(filtered);
  }

  render(list) {
    this.el.count.textContent = String(list.length).padStart(2, "0");

    if (list.length === 0) {
      this._showState("empty");
      return;
    }
    this._showState("grid");

    const fragment = document.createDocumentFragment();
    list.forEach((user, i) => fragment.appendChild(this._buildCard(user, i)));

    this.el.grid.innerHTML = "";
    this.el.grid.appendChild(fragment);

    this.el.grid.querySelectorAll(".filecard").forEach((card) => this.reveal.observe(card));
  }

  _buildCard(user, index) {
    const card = document.createElement("article");
    card.className = "filecard";
    card.dataset.tab = `FILE №${String(index + 1).padStart(3, "0")}`;
    card.style.transitionDelay = `${Math.min(index * 40, 300)}ms`;

    const genderLabel = user.gender === "female" ? "F" : "M";
    const stampClass = user.gender === "female" ? "filecard__stamp--female" : "filecard__stamp--male";

    card.innerHTML = `
      <div class="filecard__body">
        <div class="filecard__photo-wrap">
          <img class="filecard__photo" src="${user.picture.medium}" alt="Photograph of ${user.name.first} ${user.name.last}" loading="lazy">
          <span class="filecard__stamp ${stampClass}">${genderLabel}</span>
        </div>
        <div class="filecard__id">
          <p class="filecard__name">${user.name.first}<br>${user.name.last}</p>
          <p class="filecard__line" title="${user.email}"><i>@</i>${user.email}</p>
          <p class="filecard__line"><i>#</i>${user.phone}</p>
          <p class="filecard__line"><i>&#8982;</i>${user.location.country}</p>
        </div>
      </div>

      <button class="filecard__toggle" type="button" aria-expanded="false">
        <span class="filecard__toggle-label">Open File</span>
      </button>

      <div class="filecard__memo" data-open="false">
        <div class="filecard__memo-inner">
          <dl class="filecard__memo-content">
            <dt>Residence</dt>
            <dd>${user.location.city}, ${user.location.state}</dd>
            <dt>Age on record</dt>
            <dd>${user.dob.age}</dd>
            <dt>Registry username</dt>
            <dd>${user.login.username}</dd>
          </dl>
        </div>
      </div>
    `;

    return card;
  }

  _showState(state) {
    this.el.loading.hidden = state !== "loading";
    this.el.error.hidden = state !== "error";
    this.el.empty.hidden = state !== "empty";
    this.el.grid.hidden = state === "loading" || state === "error";
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new RegistryApp(document);
});
