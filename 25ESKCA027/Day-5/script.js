// Select input/button elements
const inputField = document.getElementById('searchInput');
const searchBtn = document.getElementById('search');

// Function to filter cards based on search term
function filterCards() {

    const searchTerm = inputField.value.trim().toLowerCase();

    // Select generated cards
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {

        const textContent = card.innerText.toLowerCase();

        if (searchTerm === '' || textContent.includes(searchTerm)) {

            card.style.display = '';
            card.style.opacity = '1';

        } else {

            card.style.display = 'none';

        }

    });

}

const container = document.getElementById('card-container');

// Sample student names
const names = [
    "Aditya Kapoor",
    "Neha Sharma",
    "Rohan Mehta",
    "Ishita Gupta",
    "Karan Malhotra"
];

const section = [
    "Alpha",
    "Beta",
    "Gamma",
    "Delta",
    "Omega"
];

function generateCards(count) {

    let htmlContent = '';

    for (let i = 1; i <= count; i++) {

        const randomName = names[Math.floor(Math.random() * names.length)];

        const randomSection = section[Math.floor(Math.random() * section.length)];

        const randomScore = (Math.random() * (100 - 75) + 75).toFixed(0);

        htmlContent += `

        <div class="card" style="width: 13rem;">

            <div class="card-body">

                <div class="img">

                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400"
                        alt="Student">

                </div>

                <div class="content">

                    <h5 class="card-title">${randomName}</h5>

                    <p class="card-text">CSP${1000 + i}</p>

                    <p class="card-text">Group - ${randomSection}</p>

                    <p class="hidden-text">Score : ${randomScore}%</p>

                </div>

            </div>

        </div>

        `;
    }

    container.innerHTML = htmlContent;

}

// Generate 50 cards
generateCards(50);

// Filter on Search button click
searchBtn.addEventListener('click', filterCards);

// Live search with debounce
let timeout = null;

inputField.addEventListener('input', function () {

    clearTimeout(timeout);

    timeout = setTimeout(filterCards, 300);

});

// Search on Enter
inputField.addEventListener('keydown', function (e) {

    if (e.key === 'Enter') {

        clearTimeout(timeout);

        filterCards();

    }

});