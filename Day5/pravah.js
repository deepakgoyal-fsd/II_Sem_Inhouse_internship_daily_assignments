// ---------- EVENT DATA ----------
// One array of objects drives both the event cards AND the registration dropdown
const events = [
  { day: 1, date: "July 10", title: "Inauguration & Ghoomar Night", category: "Cultural", time: "5:00 PM", venue: "Main Auditorium", desc: "Traditional lamp lighting followed by a mesmerizing Ghoomar dance performance by folk artists." },
  { day: 2, date: "July 11", title: "CodeStorm Hackathon", category: "Technical", time: "9:00 AM", venue: "CS Block Labs", desc: "24-hour hackathon challenging teams to build solutions for real-world problems." },
  { day: 3, date: "July 12", title: "Kathputli Puppet Show", category: "Cultural", time: "4:00 PM", venue: "Open Air Theatre", desc: "Experience Rajasthan's iconic string-puppet storytelling tradition, live on stage." },
  { day: 4, date: "July 13", title: "Robo Wars & Tech Expo", category: "Technical", time: "10:00 AM", venue: "Mechanical Block", desc: "Robot combat arena plus student project exhibitions from every department." },
  { day: 5, date: "July 14", title: "Rajasthani Folk Night", category: "Cultural", time: "7:00 PM", venue: "Amphitheatre", desc: "Live Manganiyar folk music and Kalbeliya dance under the open sky." },
  { day: 6, date: "July 15", title: "Rajwada Rhapsody Fashion Show", category: "Cultural", time: "6:00 PM", venue: "Main Auditorium", desc: "A ramp walk celebrating royal Rajasthani attire, reimagined by student designers." },
  { day: 7, date: "July 16", title: "Closing Ceremony & DJ Night", category: "Finale", time: "6:00 PM", venue: "Main Ground", desc: "Prize distribution followed by a high-energy DJ night to close Pravah in style." }
];

// ---------- RENDER EVENT CARDS ----------
// Loop over the array once, build one HTML string, inject it in a single go
function renderEvents() {
  let html = "";
  for (let i = 0; i < events.length; i++) {
    const e = events[i];
    html += `
      <div class="col-md-6 col-lg-4">
        <div class="event-card">
          <span class="event-day">Day ${e.day}</span>
          <span class="event-category category-${e.category}">${e.category}</span>
          <h3>${e.title}</h3>
          <p class="event-meta">
            <i class="bi bi-calendar3"></i>${e.date} &nbsp;
            <i class="bi bi-clock"></i>${e.time} &nbsp;
            <i class="bi bi-geo-alt"></i>${e.venue}
          </p>
          <button class="toggle-btn" type="button">+ Read more</button>
          <p class="event-desc">${e.desc}</p>
        </div>
      </div>
    `;
  }
  document.getElementById("eventContainer").innerHTML = html;
}
renderEvents();

// ---------- POPULATE REGISTRATION DROPDOWN FROM THE SAME ARRAY ----------
function populateEventSelect() {
  const select = document.getElementById("eventSelect");
  let options = `<option value="">Select an event</option>`;
  for (let i = 0; i < events.length; i++) {
    options += `<option value="${events[i].title}">Day ${events[i].day} — ${events[i].title}</option>`;
  }
  select.innerHTML = options;
}
populateEventSelect();

// ---------- jQuery: "Read more" toggle on each card ----------
$(document).on("click", ".toggle-btn", function () {
  $(this).next(".event-desc").slideToggle();
  $(this).text($(this).text().startsWith("+") ? "- Show less" : "+ Read more");
});

// ---------- COUNTDOWN TIMER ----------
// Target: start of Pravah, July 10 2026, midnight (visitor's local time)
const festDate = new Date("2026-07-10T00:00:00").getTime();
let timerInterval;

function updateCountdown() {
  const now = new Date().getTime();
  const gap = festDate - now;

  if (gap <= 0) {
    document.getElementById("countdown").innerHTML = "<p class='live-now'>🎉 Pravah has begun!</p>";
    clearInterval(timerInterval);
    return;
  }

  const days = Math.floor(gap / (1000 * 60 * 60 * 24));
  const hours = Math.floor((gap % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((gap % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((gap % (1000 * 60)) / 1000);

  document.getElementById("days").textContent = days;
  document.getElementById("hours").textContent = hours;
  document.getElementById("minutes").textContent = minutes;
  document.getElementById("seconds").textContent = seconds;
}

updateCountdown();
timerInterval = setInterval(updateCountdown, 1000);

// ---------- REGISTRATION FORM VALIDATION ----------
document.getElementById("regForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const eventChoice = document.getElementById("eventSelect").value;
  const errorBox = document.getElementById("formError");
  const successBox = document.getElementById("formSuccess");

  successBox.textContent = "";

  if (name === "" || email === "" || phone === "") {
    errorBox.textContent = "Please fill in your name, email, and phone number.";
    return;
  }
  if (!email.includes("@")) {
    errorBox.textContent = "Please enter a valid email address.";
    return;
  }
  if (eventChoice === "") {
    errorBox.textContent = "Please choose an event to register for.";
    return;
  }

  errorBox.textContent = "";
  successBox.textContent = `You're registered for "${eventChoice}", ${name}! See you at Pravah.`;
  this.reset();
});
