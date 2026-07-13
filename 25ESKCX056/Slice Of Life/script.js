function openModal() {
    document.getElementById('modalOverlay').style.display = 'flex';
}

function closeModal() {
    document.getElementById('modalOverlay').style.display = 'none';
}

function syncToLocalStorage() {
    const cards = document.querySelectorAll('.note-card');
    const notes = [];
    cards.forEach(card => {
        notes.push({
            title: card.querySelector('h3').innerText,
            content: card.querySelector('p').innerText
        });
    });
    localStorage.setItem('sol_notes', JSON.stringify(notes));
}

syncToLocalStorage();
