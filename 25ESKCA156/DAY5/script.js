// Database object containing Event Details & descriptions
const festivalEvents = {
    bands: {
        title: "Battle of the Bands",
        meta: "⏰ Time: 11:00 AM onwards | Venue: Main Auditorium",
        emoji: "🎸",
        desc: "Watch the loudest, most electric student rock bands clash for ultimate stage glory. Amplifiers cranked to eleven, booming basslines, and insane drum solos await your cheers."
    },
    dance: {
        title: "Choreo Night",
        meta: "⏰ Time: 03:00 PM onwards | Venue: Open Air Theater",
        emoji: "💃",
        desc: "A mesmerizing showcase of rhythm, precision, and raw storytelling through motion. From hard-hitting hip-hop routines to beautiful contemporary narratives."
    },
    hack: {
        title: "HackFest '26",
        meta: "⏰ Time: 09:00 AM (24 HR) | Venue: Advanced Tech Lab",
        emoji: "💻",
        desc: "Fuel up on caffeine and code. Build functional prototypes, solve challenging real-world roadblocks, and pitch ideas directly to leading tech masterminds."
    },
    drama: {
        title: "Nukkad Natak (Street Play)",
        meta: "⏰ Time: 01:00 PM onwards | Venue: College Quadrangle",
        emoji: "🎭",
        desc: "High-energy performances addressing deep societal challenges through booming voices, synchronized configurations, and powerful acoustic dhol beats."
    }
};

// Event switcher function with smooth fading micro-interactions
function showEventDetails(eventKey) {
    // 1. Manage Active states on buttons
    const tabs = document.querySelectorAll('.tab-btn');
    tabs.forEach(tab => tab.classList.remove('active'));
    event.target.classList.add('active');

    // 2. Safely grab targeted components
    const card = document.querySelector('.dynamic-event-card');
    const imgEl = document.getElementById('event-display-img');
    const titleEl = document.getElementById('event-display-title');
    const descEl = document.getElementById('event-display-desc');
    const metaEl = document.querySelector('.time-meta');

    // 3. Smooth fade out content block
    card.style.opacity = '0';
    card.style.transform = 'scale(0.98)';

    setTimeout(() => {
        // Swap core values from our dictionary
        const selectedData = festivalEvents[eventKey];
        imgEl.innerText = selectedData.emoji;
        titleEl.innerText = selectedData.title;
        metaEl.innerHTML = selectedData.meta;
        descEl.innerText = selectedData.desc;

        // Animate content smoothly back to visible view
        card.style.opacity = '1';
        card.style.transform = 'scale(1)';
    }, 200);
}

// Global View Switching Handler (SPA feel)
function switchView(viewId) {
    const views = document.querySelectorAll('.view');
    
    views.forEach(view => {
        if(view.classList.contains('active')) {
            view.style.opacity = '0';
            view.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                view.classList.remove('active');
                
                const targetView = document.getElementById(viewId);
                targetView.classList.add('active');
                
                setTimeout(() => {
                    targetView.style.opacity = '1';
                    targetView.style.transform = 'translateY(0)';
                }, 50);
            }, 400);
        }
    });
}

// Client Side Form Processing 
function handleRegistration(event) {
    event.preventDefault(); // Halt full window refreshing

    // Pull variables out of elements
    const name = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const trackingEvent = document.getElementById('eventSelect').value;

    // Inject matching elements into pass markup blocks
    document.getElementById('display-name').innerText = name;
    document.getElementById('display-email').innerText = email;
    document.getElementById('display-phone').innerText = phone;
    document.getElementById('display-event').innerText = trackingEvent;

    // Swap directly to Success View layout
    switchView('success-view');
}

// Soft Reset utility function
function resetForm() {
    document.getElementById('registration-form').reset();
    switchView('landing-view');
}