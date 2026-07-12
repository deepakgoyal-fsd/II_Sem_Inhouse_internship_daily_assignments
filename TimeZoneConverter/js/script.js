// =========================================================
// SCRIPT.JS
// This file handles ALL JavaScript functionality:
// 1. Home page current date/time
// 2. Live time in a selected time zone
// 3. Form validation before submitting the converter form
// 4. Dark Mode / Light Mode toggle with Local Storage
// 5. Search box redirect to search.php
// 6. Delete button redirect to delete.php
// 7. Clear All button redirect to clear.php
// =========================================================


// -----------------------------------------------------------
// 1. HOME PAGE - Current Date & Time
// -----------------------------------------------------------
function updateHomeClock() {
    const now = new Date();

    // Format the date nicely, e.g. "Sunday, July 12, 2026"
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateText = now.toLocaleDateString(undefined, dateOptions);

    // Format the time nicely, e.g. "10:45:32 AM"
    const timeText = now.toLocaleTimeString();

    const dateEl = document.getElementById("currentDate");
    const timeEl = document.getElementById("currentTimeClock");

    if (dateEl) dateEl.textContent = dateText;
    if (timeEl) timeEl.textContent = timeText;
}

// Run once immediately, then every second
updateHomeClock();
setInterval(updateHomeClock, 1000);


// -----------------------------------------------------------
// 2. CURRENT TIME IN SELECTED TIME ZONE
// -----------------------------------------------------------
function updateZoneClock() {
    const zoneSelect = document.getElementById("zoneSelect");
    const liveZoneTime = document.getElementById("liveZoneTime");

    if (!zoneSelect || !liveZoneTime) return;

    const selectedZone = zoneSelect.value;

    try {
        // Use built-in JavaScript Intl API to get time in chosen zone
        const options = {
            timeZone: selectedZone,
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        };
        const timeString = new Date().toLocaleTimeString('en-US', options);
        liveZoneTime.textContent = timeString;
    } catch (error) {
        liveZoneTime.textContent = "Invalid Time Zone";
    }
}

// Update every second, and also whenever the dropdown changes
const zoneSelectEl = document.getElementById("zoneSelect");
if (zoneSelectEl) {
    zoneSelectEl.addEventListener("change", updateZoneClock);
}
updateZoneClock();
setInterval(updateZoneClock, 1000);


// -----------------------------------------------------------
// 3. FORM VALIDATION - Converter Form
// -----------------------------------------------------------
const converterForm = document.getElementById("converterForm");

if (converterForm) {
    converterForm.addEventListener("submit", function (e) {

        let isValid = true;

        // Get all the fields we need to check
        const inputDate = document.getElementById("inputDate");
        const inputTime = document.getElementById("inputTime");
        const fromTimezone = document.getElementById("fromTimezone");
        const toTimezone = document.getElementById("toTimezone");

        // Reset previous error styles
        [inputDate, inputTime, fromTimezone, toTimezone].forEach(field => {
            field.classList.remove("is-invalid");
        });

        // Validation: Date is empty
        if (inputDate.value === "") {
            inputDate.classList.add("is-invalid");
            isValid = false;
        }

        // Validation: Time is empty
        if (inputTime.value === "") {
            inputTime.classList.add("is-invalid");
            isValid = false;
        }

        // Validation: From Time Zone not selected
        if (fromTimezone.value === "") {
            fromTimezone.classList.add("is-invalid");
            isValid = false;
        }

        // Validation: To Time Zone not selected
        if (toTimezone.value === "") {
            toTimezone.classList.add("is-invalid");
            isValid = false;
        }

        // If anything is invalid, stop the form from submitting
        if (!isValid) {
            e.preventDefault();
        }
    });
}


// -----------------------------------------------------------
// 4. DARK MODE / LIGHT MODE TOGGLE (with Local Storage)
// -----------------------------------------------------------
const themeToggle = document.getElementById("themeToggle");
const bodyEl = document.body;

// Check Local Storage when the page loads, and apply saved theme
const savedTheme = localStorage.getItem("theme");
if (savedTheme === "dark") {
    bodyEl.classList.add("dark-mode");
    if (themeToggle) themeToggle.checked = true;
}

// When the toggle switch is clicked, switch theme and save choice
if (themeToggle) {
    themeToggle.addEventListener("change", function () {
        if (themeToggle.checked) {
            bodyEl.classList.add("dark-mode");
            localStorage.setItem("theme", "dark");
        } else {
            bodyEl.classList.remove("dark-mode");
            localStorage.setItem("theme", "light");
        }
    });
}


// -----------------------------------------------------------
// 5. SEARCH BOX - redirects to search.php with the typed text
// -----------------------------------------------------------
const searchBox = document.getElementById("searchBox");

if (searchBox) {
    // We wait until the user stops typing for a short moment
    // before redirecting, so it doesn't reload on every letter.
    let searchTimer;

    searchBox.addEventListener("keyup", function () {
        clearTimeout(searchTimer);

        searchTimer = setTimeout(function () {
            const query = searchBox.value.trim();
            if (query.length > 0) {
                window.location.href = "search.php?q=" + encodeURIComponent(query);
            }
        }, 600); // waits 600ms after typing stops
    });
}


// -----------------------------------------------------------
// 6. DELETE BUTTON - redirects to delete.php?id=...
// -----------------------------------------------------------
document.querySelectorAll(".delete-btn").forEach(function (button) {
    button.addEventListener("click", function () {
        const recordId = button.getAttribute("data-id");

        // Simple confirmation before deleting
        const confirmDelete = confirm("Are you sure you want to delete this record?");
        if (confirmDelete) {
            window.location.href = "delete.php?id=" + recordId;
        }
    });
});


// -----------------------------------------------------------
// 7. CLEAR ALL HISTORY BUTTON - redirects to clear.php
// -----------------------------------------------------------
const clearAllBtn = document.getElementById("clearAllBtn");

if (clearAllBtn) {
    clearAllBtn.addEventListener("click", function () {
        const confirmClear = confirm("This will delete ALL history records. Continue?");
        if (confirmClear) {
            window.location.href = "clear.php";
        }
    });
}
