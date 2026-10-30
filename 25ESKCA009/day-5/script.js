 // Select input/button elements
const inputField = document.getElementById('searchInput');
const searchBtn = document.getElementById('search');

// Function to filter cards based on search term
function filterCards() {
    const searchTerm = inputField.value.trim().toLowerCase();

    // Cards dynamically select karo (generateCards ke baad)
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

// Sample names for random generation
const names = ["Arihant Jain", "Rahul Sharma", "Priya Verma", "Amit Singh", "Sneha Gupta"];
const section = ["E", "D", "C", "B", "A"];

function generateCards(count) {
    let htmlContent = '';
    
    for (let i = 1; i <= count; i++) {
        const randomName = names[Math.floor(Math.random() * names.length)];
        const randomSection = section[Math.floor(Math.random() * section.length)];
        const randomCGPA = (Math.random() * (10 - 7) + 7).toFixed(1); // 7.0 to 10.0
        
        htmlContent += `
    
                  <div class="card" style="width: 13rem;">
            <div class="card-body">
                <div class="img"><img
                        src="https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt=""> </div>
                <div class="content">
                    <h5 class="card-title">${randomName} </h5>
                    <p class="card-text">25ESKCS${100 + i}</p>
                    <p class="card-text">Section-${randomSection}</p>
                    <p id="cgpa" class="hidden-text">${randomCGPA}</p>

                </div>
            </div>
        </div>`;
    }
    container.innerHTML = htmlContent;
}

// 50 cards generate karein
generateCards(50);
// Filter on Search button click
searchBtn.addEventListener('click', filterCards);

// Also filter live as the user types (with a small debounce)
let timeout = null;
inputField.addEventListener('input', function () {
    clearTimeout(timeout);
    timeout = setTimeout(filterCards, 300);
});

// Trigger search on pressing Enter key inside the input
inputField.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
        clearTimeout(timeout);
        filterCards();
    }
});