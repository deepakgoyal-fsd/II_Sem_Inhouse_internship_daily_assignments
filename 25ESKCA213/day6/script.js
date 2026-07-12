const addBtnWrapper = document.querySelector("#add-btn button");

const modal = document.querySelector("#modal");
const modalBackdrop = document.querySelector(".bg-modal");
const inputDetails = document.querySelector(".input-details");

const nameInput = document.querySelector("#name");
const yearSelect = document.querySelector("#Year");
const cgpaInput = document.querySelector("#cgpa");
const addDetailsBtn = document.querySelector("#add-details-btn");

const searchInput = document.querySelector(".search input");
const cardsContainer = document.querySelector("#cards");
const storageKey = "day7StudentCards";

function getSavedCards() {
  try {
    return JSON.parse(localStorage.getItem(storageKey)) || [];
  } catch {
    return [];
  }
}

function saveCards(cards) {
  localStorage.setItem(storageKey, JSON.stringify(cards));
}

function renderCard(cardData) {
  const card = document.createElement("div");
  card.classList.add("card");

  card.innerHTML = `
    <div class="card-top">
      <img class="card-avatar" src="${cardData.photo}" alt="Random avatar for ${cardData.name}">
      <div>
        <h1>${cardData.name}</h1>
        <p class="card-subtitle">Random avatar from API</p>
      </div>
    </div>
    <button class="Details">Details</button>
    <button class="Delete">Delete</button>
    <div class="card-details">
      <h6>Year: ${cardData.year}</h6>
      <h6>CGPA: ${cardData.cgpa}</h6>
    </div>`;

  cardsContainer.appendChild(card);

  const detailBtn = card.querySelector(".Details");
  const deleteBtn = card.querySelector(".Delete");
  const cardDetail = card.querySelector(".card-details");

  detailBtn.addEventListener("click", () => {
    cardDetail.classList.toggle("show");

    detailBtn.textContent = cardDetail.classList.contains("show")
      ? "Hide Details"
      : "Details";
  });

  deleteBtn.addEventListener("click", () => {
    const savedCards = getSavedCards();
    const cardIndex = savedCards.findIndex(
      (savedCard) =>
        savedCard.name === cardData.name &&
        savedCard.year === cardData.year &&
        savedCard.cgpa === cardData.cgpa &&
        savedCard.photo === cardData.photo
    );

    if (cardIndex !== -1) {
      savedCards.splice(cardIndex, 1);
      saveCards(savedCards);
    }

    card.remove();
  });

  return card;
}

function loadSavedCards(cards) {
  cardsContainer.innerHTML = "";
  cards.forEach(renderCard);
}

function getRandomYear() {
  return String(Math.floor(Math.random() * 4) + 1);
}

function getRandomCgpa() {
  return (Math.random() * 4 + 6).toFixed(1);
}

function buildFallbackCards(count) {
  return Array.from({ length: count }, (_, index) => ({
    name: `Student ${index + 1}`,
    year: getRandomYear(),
    cgpa: getRandomCgpa(),
    photo: `https://i.pravatar.cc/150?img=${index + 1}`,
  }));
}

async function seedInitialCards() {
  const savedCards = getSavedCards();

  if (savedCards.length >= 6) {
    loadSavedCards(savedCards);
    return;
  }

  try {
    const neededCount = 6 - savedCards.length;
    const response = await fetch(`https://randomuser.me/api/?results=${neededCount}`);
    const data = await response.json();

    const fetchedCards = data.results.map((user) => ({
      name: `${user.name.first} ${user.name.last}`,
      year: getRandomYear(),
      cgpa: getRandomCgpa(),
      photo: user.picture.large,
    }));

    const initialCards = [...savedCards, ...fetchedCards];

    saveCards(initialCards);
    loadSavedCards(initialCards);
  } catch {
    const fallbackCards = [...savedCards, ...buildFallbackCards(6 - savedCards.length)];
    saveCards(fallbackCards);
    loadSavedCards(fallbackCards);
  }
}

addBtnWrapper.addEventListener("click", (e) => {
  modal.classList.toggle("active");
});

modalBackdrop.addEventListener("click", () => {
  modal.classList.toggle("active");
});

addDetailsBtn.addEventListener("click", (e) => {
  const name = nameInput.value.trim();
  const year = yearSelect.value;
  const cgpa = cgpaInput.value.trim();

  if (!name || !year || !cgpa) {
    alert("fill all the credentials");
    return;
  }

  fetch("https://randomuser.me/api/")
    .then((response) => response.json())
    .then((data) => {
      const user = data.results[0];
      const photo = user.picture.large;
      const savedCards = getSavedCards();
      const cardData = { name, year, cgpa, photo };

      savedCards.push(cardData);
      saveCards(savedCards);
      renderCard(cardData);

      nameInput.value = "";
      cgpaInput.value = "";
      yearSelect.selectedIndex = 0;

      modal.classList.remove("active");
    })
    .catch(() => {
      const savedCards = getSavedCards();
      const cardData = {
        name,
        year,
        cgpa,
        photo: "https://i.pravatar.cc/150?u=student-card",
      };

      savedCards.push(cardData);
      saveCards(savedCards);
      renderCard(cardData);

      nameInput.value = "";
      cgpaInput.value = "";
      yearSelect.selectedIndex = 0;

      modal.classList.remove("active");
    });
});

searchInput.addEventListener("keyup",(elem)=>{
  const searchvalue = searchInput.value.toLowerCase();
  const cards = document.querySelectorAll(".card");
  cards.forEach(card => {
    const name = card.querySelector("h1").textContent.toLowerCase();
    if(name.includes(searchvalue)){
      card.style.display = "";
    }
    else{
      card.style.display = "none";
    }
  })
})

seedInitialCards();