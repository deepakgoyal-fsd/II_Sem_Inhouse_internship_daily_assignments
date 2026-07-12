// Universal Architecture Settings
const API_URL = "https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY";

// DOM Targets
const dateInput = document.getElementById('date-input');
const searchBtn = document.getElementById('search-btn');
const randomBtn = document.getElementById('random-btn');
const favBtn = document.getElementById('fav-btn');
const photoTitle = document.getElementById('photo-title');
const photoDate = document.getElementById('photo-date');
const mediaContainer = document.getElementById('media-container');
const photoExplanation = document.getElementById('photo-explanation');
const loader = document.getElementById('loader');
const contentArea = document.getElementById('content-area');
const favoritesGrid = document.getElementById('favorites-grid');

// Modal Elements
const intelModal = document.getElementById('intel-modal');
const readMoreBtn = document.getElementById('read-more-btn');
const closeModal = document.getElementById('close-modal');

let currentPhotoData = null;

// Initialize Core Engine
window.addEventListener('DOMContentLoaded', () => {
    const today = new Date().toISOString().split('T')[0];
    dateInput.max = today;
    dateInput.value = today;

    fetchStellarData(today);
    renderArchives();
});

// Asynchronous Data Processor Engine
async function fetchStellarData(date) {
    toggleLoadingState(true);
    try {
        const res = await fetch(`${API_URL}&date=${date}`);
        if(!res.ok) throw new Error("Telemetry connection anomaly encountered.");
        
        const data = await res.json();
        currentPhotoData = data;
        renderViewport(data);
    } catch (err) {
        photoTitle.textContent = "Telemetry Link Failure";
        mediaContainer.innerHTML = `<div style="padding:3rem; text-align:center; color:#ff4a4a;"><i class="fa-solid fa-triangle-exclamation" style="font-size:3rem; margin-bottom:1rem;"></i><p>Failed to capture transmission for target coordinates.</p></div>`;
        console.error(err);
    } finally {
        toggleLoadingState(false);
    }
}

// Render dynamic elements to interface
function renderViewport(data) {
    photoTitle.textContent = data.title;
    photoDate.textContent = `Mission Frame: ${data.date}`;
    photoExplanation.textContent = data.explanation;
    mediaContainer.innerHTML = "";

    if (data.media_type === "image") {
        const imageNode = document.createElement('img');
        imageNode.src = data.url;
        imageNode.alt = data.title;
        imageNode.classList.add('content-fade');
        mediaContainer.appendChild(imageNode);
    } else if (data.media_type === "video") {
        const frameNode = document.createElement('iframe');
        frameNode.src = data.url;
        frameNode.allowFullscreen = true;
        mediaContainer.appendChild(frameNode);
    }
}

// Random Generator Engine Feature
randomBtn.addEventListener('click', () => {
    const start = new Date(1996, 0, 1).getTime(); // NASA APOD start benchmark
    const end = new Date().getTime();
    const randomDate = new Date(start + Math.random() * (end - start));
    
    const formattedDate = randomDate.toISOString().split('T')[0];
    dateInput.value = formattedDate;
    fetchStellarData(formattedDate);
});

searchBtn.addEventListener('click', () => {
    if(dateInput.value) fetchStellarData(dateInput.value);
});

function toggleLoadingState(isLoading) {
    if (isLoading) {
        loader.classList.remove('hidden');
        contentArea.classList.add('hidden');
    } else {
        loader.classList.add('hidden');
        contentArea.classList.remove('hidden');
    }
}

// Modal Toggle Logic
readMoreBtn.addEventListener('click', () => intelModal.classList.remove('hidden'));
closeModal.addEventListener('click', () => intelModal.classList.add('hidden'));
window.addEventListener('click', (e) => { if(e.target === intelModal) intelModal.classList.add('hidden'); });

// Storage Engine Infrastructure
favBtn.addEventListener('click', () => {
    if (!currentPhotoData) return;
    let archives = JSON.parse(localStorage.getItem('stellarArchives')) || [];
    
    if(archives.some(item => item.date === currentPhotoData.date)) {
        alert("Coordinates already logged in storage array.");
        return;
    }

    archives.push({
        title: currentPhotoData.title,
        date: currentPhotoData.date,
        url: currentPhotoData.url,
        media_type: currentPhotoData.media_type
    });

    localStorage.setItem('stellarArchives', JSON.stringify(archives));
    renderArchives();
});

function renderArchives() {
    favoritesGrid.innerHTML = "";
    const archives = JSON.parse(localStorage.getItem('stellarArchives')) || [];

    if(archives.length === 0) {
        favoritesGrid.innerHTML = `<p style="grid-column:1/-1; color: var(--text-muted); text-align:center; font-style:italic; padding:2rem;">Archive databases empty. Log cosmic assets above.</p>`;
        return;
    }

    archives.forEach((item, index) => {
        const card = document.createElement('div');
        card.classList.add('fav-card');
        
        const thumbnail = item.media_type === 'image' 
            ? `<img src="${item.url}" alt="${item.title}">`
            : `<div style="height:140px; background:#05050a; display:flex; flex-direction:column; align-items:center; justify-content:center; color:var(--neon-blue); font-size:0.8rem;"><i class="fa-solid fa-video" style="margin-bottom:0.4rem;"></i>Video Dataset</div>`;

        card.innerHTML = `
            <div class="fav-img-wrap">${thumbnail}</div>
            <div class="fav-card-body">
                <h4>${item.title}</h4>
                <p>${item.date}</p>
                <button class="btn-delete" onclick="purgeArchive(${index})"><i class="fa-solid fa-trash-can"></i> Purge</button>
            </div>
        `;
        favoritesGrid.appendChild(card);
    });
}

window.purgeArchive = function(index) {
    let archives = JSON.parse(localStorage.getItem('stellarArchives')) || [];
    archives.splice(index, 1);
    localStorage.setItem('stellarArchives', JSON.stringify(archives));
    renderArchives();
};
