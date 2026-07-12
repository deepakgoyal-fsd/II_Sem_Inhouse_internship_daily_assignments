
async function generateImage(prompt) {
  
  return `https://dummyimage.com/600x400/000/fff&text=${encodeURIComponent(prompt)}`;
}
async function setLogo() {
  const logoEl = document.getElementById("logo");
  const logoImg = await generateImage("College Fest 2026 Logo");
  logoEl.innerHTML = `<img src="${logoImg}" alt="Fest Logo" style="height:50px;">`;
}

const eventsData = [
  {
    id: 1,
    name: "Battle of Bands",
    icon: "fa-solid fa-music",
    image: "images/music.jpg",
    teaser: "Live campus music showdown with original and cover performances.",
    description:
      "Battle of Bands brings student bands to one stage for an electrifying musical face-off. Expect energetic performances, crowd-favorite hits, and original compositions.",
    datetime: "10 July 2026, 4:00 PM",
    venue: "Main Stage",
    rules: [
      "Each team can have 3 to 8 members.",
      "Performance time limit is 10 minutes.",
      "Use of offensive language is not allowed.",
      "Teams must report 30 minutes before the event."
    ]
  },
  {
    id: 2,
    name: "Dance Fusion",
    icon: "fa-solid fa-person-dress-burst",
    image: "images/dance.jpg",
    teaser: "Solo and group dance performances full of energy and creativity.",
    description:
      "Dance Fusion is the ultimate stage for rhythm, expression, and choreography. Participants can showcase classical, western, hip-hop, or freestyle performances.",
    datetime: "10 July 2026, 2:00 PM",
    venue: "Auditorium",
    rules: [
      "Solo or team entries are allowed.",
      "Maximum performance duration is 8 minutes.",
      "Participants must submit audio in advance.",
      "Props are allowed if approved beforehand."
    ]
  },
  {
    id: 3,
    name: "Code Sprint",
    icon: "fa-solid fa-code",
    image: "images/coding.jpg",
    teaser: "Fast-paced coding challenge for problem solvers and tech enthusiasts.",
    description:
      "Code Sprint is a competitive programming event where participants solve algorithmic and logical problems within a limited time. Ideal for coders who love speed and accuracy.",
    datetime: "10 July 2026, 11:00 AM",
    venue: "Computer Lab 2",
    rules: [
      "Individual participation only.",
      "Duration is 90 minutes.",
      "Internet access is restricted unless specified.",
      "Final ranking is based on score and submission time."
    ]
  },
  {
    id: 4,
    name: "Drama Spotlight",
    icon: "fa-solid fa-masks-theater",
    image: "images/drama.jpg",
    teaser: "A stage for storytelling, acting, and unforgettable performances.",
    description:
      "Drama Spotlight invites student groups to present original or adapted stage performances. Creativity, acting quality, and impact will be judged.",
    datetime: "10 July 2026, 1:00 PM",
    venue: "Open Air Theatre",
    rules: [
      "Team size should be between 4 and 12 members.",
      "Maximum stage time is 15 minutes.",
      "No dangerous props or fire effects allowed.",
      "Teams must bring their own background tracks if needed."
    ]
  },
  {
    id: 5,
    name: "Quiz Quest",
    icon: "fa-solid fa-brain",
    image: "images/quiz.jpg",
    teaser: "General knowledge, current affairs, pop culture, and rapid-fire fun.",
    description:
      "Quiz Quest tests your awareness, memory, and speed through multiple exciting rounds. Bring your sharpest thinking and competitive spirit.",
    datetime: "10 July 2026, 12:00 PM",
    venue: "Seminar Hall",
    rules: [
      "Teams of 2 are allowed.",
      "Use of mobile phones during the quiz is prohibited.",
      "Quizmaster decisions will be final.",
      "Elimination and rapid-fire rounds may be included."
    ]
  },
  {
    id: 6,
    name: "Photography Walk",
    icon: "fa-solid fa-camera-retro",
    image: "images/banner.jpg",
    teaser: "Capture campus colors, moments, and creative visual stories.",
    description:
      "Photography Walk encourages participants to explore the campus and capture the spirit of the fest through compelling photos and visual storytelling.",
    datetime: "10 July 2026, 9:30 AM",
    venue: "College Campus",
    rules: [
      "Individual participation only.",
      "Photos must be taken during the fest.",
      "Basic editing is allowed, heavy manipulation is not.",
      "Final submission deadline must be followed."
    ]
  }
];

const eventsGrid = document.getElementById("eventsGrid");
const eventModal = document.getElementById("eventModal");
const modalBody = document.getElementById("modalBody");
const modalClose = document.getElementById("modalClose");
const modalBackdrop = document.getElementById("modalBackdrop");
const searchInput = document.getElementById("searchInput");
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");
async function renderEvents(events) {
  eventsGrid.innerHTML = "";

  if (!events.length) {
    eventsGrid.innerHTML = `<div class="empty-state">No events found. Try another keyword.</div>`;
    return;
  }

  for (const event of events) {
    
    const aiImage = await generateImage(`${event.name} ${event.teaser}`);

    const card = document.createElement("article");
    card.className = "event-card";
    card.innerHTML = `
      <div class="event-card-image">
        <img src="${aiImage}" alt="${event.name}">
      </div>
      <div class="event-card-content">
        <div class="event-icon"><i class="${event.icon}"></i></div>
        <h3>${event.name}</h3>
        <p>${event.teaser}</p>
      </div>
    `;
    card.addEventListener("click", () => openModal(event));
    eventsGrid.appendChild(card);
  }
}

function openModal(event) {
  modalBody.innerHTML = `
    <img class="modal-event-image" src="${event.image}" alt="${event.name}">

    <div class="modal-top">
      <div>
        <p class="section-label">Event Details</p>
        <h2>${event.name}</h2>
        <p>${event.description}</p>
      </div>

      <div class="meta-list">
        <div class="meta-item">
          <strong>Date & Time</strong>
          <p>${event.datetime}</p>
        </div>
        <div class="meta-item">
          <strong>Venue</strong>
          <p>${event.venue}</p>
        </div>
        <div class="meta-item">
          <strong>Registration</strong>
          <p>Open for students</p>
        </div>
      </div>
    </div>

    <section>
      <h3>Rules / Guidelines</h3>
      <ul class="rules-list">
        ${event.rules.map((rule) => `<li>${rule}</li>`).join("")}
      </ul>
    </section>

    <section>
      <h3>Register for ${event.name}</h3>
      <form id="registrationForm" novalidate>
        <div class="form-grid">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name">
            <div class="error" id="nameError"></div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <div class="error" id="emailError"></div>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
            <div class="error" id="phoneError"></div>
          </div>

          <div class="form-group">
            <label for="yearDept">Year / Department</label>
            <input type="text" id="yearDept" name="yearDept" placeholder="e.g. 2nd Year CSE">
            <div class="error" id="yearDeptError"></div>
          </div>

          <div class="form-group full">
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="success-message" id="successMessage">
              Thank you for registering!
            </div>
          </div>
        </div>
      </form>
    </section>
  `;

  eventModal.classList.add("active");
  eventModal.setAttribute("aria-hidden", "false");
  document.body.style.overflow = "hidden";

  const registrationForm = document.getElementById("registrationForm");
  registrationForm.addEventListener("submit", (e) => handleFormSubmit(e, event));
}

function closeModal() {
  eventModal.classList.remove("active");
  eventModal.setAttribute("aria-hidden", "true");
  document.body.style.overflow = "";
}

function validateEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validatePhone(phone) {
  return /^\d{10}$/.test(phone);
}

function handleFormSubmit(e, event) {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const yearDept = document.getElementById("yearDept").value.trim();

  const nameError = document.getElementById("nameError");
  const emailError = document.getElementById("emailError");
  const phoneError = document.getElementById("phoneError");
  const yearDeptError = document.getElementById("yearDeptError");
  const successMessage = document.getElementById("successMessage");

  nameError.textContent = "";
  emailError.textContent = "";
  phoneError.textContent = "";
  yearDeptError.textContent = "";
  successMessage.style.display = "none";

  let isValid = true;

  if (!name) {
    nameError.textContent = "Name is required.";
    isValid = false;
  }

  if (!email) {
    emailError.textContent = "Email is required.";
    isValid = false;
  } else if (!validateEmail(email)) {
    emailError.textContent = "Enter a valid email address.";
    isValid = false;
  }

  if (!phone) {
    phoneError.textContent = "Phone number is required.";
    isValid = false;
  } else if (!validatePhone(phone)) {
    phoneError.textContent = "Phone number must be exactly 10 digits.";
    isValid = false;
  }

  if (!yearDept) {
    yearDeptError.textContent = "Year / Department is required.";
    isValid = false;
  }

  if (!isValid) return;

  const registration = {
    eventId: event.id,
    eventName: event.name,
    name,
    email,
    phone,
    yearDept,
    submittedAt: new Date().toISOString()
  };

  console.log("Registration submitted:", registration);

  successMessage.style.display = "block";
  e.target.reset();

  
  const registrations = JSON.parse(localStorage.getItem("festRegistrations")) || [];
  registrations.push(registration);
  localStorage.setItem("festRegistrations", JSON.stringify(registrations));
}

function startCountdown() {
  const targetDate = new Date("2026-07-10T00:00:00");

  function updateCountdown() {
    const now = new Date();
    const diff = targetDate - now;

    const daysEl = document.getElementById("days");
    const hoursEl = document.getElementById("hours");
    const minutesEl = document.getElementById("minutes");
    const secondsEl = document.getElementById("seconds");

    if (diff <= 0) {
      daysEl.textContent = "00";
      hoursEl.textContent = "00";
      minutesEl.textContent = "00";
      secondsEl.textContent = "00";
      return;
    }

    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((diff / (1000 * 60)) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    daysEl.textContent = String(days).padStart(2, "0");
    hoursEl.textContent = String(hours).padStart(2, "0");
    minutesEl.textContent = String(minutes).padStart(2, "0");
    secondsEl.textContent = String(seconds).padStart(2, "0");
  }

  updateCountdown();
  setInterval(updateCountdown, 1000);
}

searchInput.addEventListener("input", (e) => {
  const term = e.target.value.toLowerCase().trim();

  const filtered = eventsData.filter((event) => {
    return (
      event.name.toLowerCase().includes(term) ||
      event.teaser.toLowerCase().includes(term) ||
      event.description.toLowerCase().includes(term) ||
      event.venue.toLowerCase().includes(term)
    );
  });

  renderEvents(filtered);
});

menuToggle.addEventListener("click", () => {
  navLinks.classList.toggle("open");
});

modalClose.addEventListener("click", closeModal);
modalBackdrop.addEventListener("click", closeModal);

document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && eventModal.classList.contains("active")) {
    closeModal();
  }
});

renderEvents(eventsData);
startCountdown();
setLogo();
