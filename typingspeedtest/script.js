// ===== Typing Paragraph =====
const BASE_STORY =
    "the sun rose slowly over the small town and the birds began to sing " +
    "their morning songs from the trees. the air was fresh and cool and the " +
    "sky was painted in shades of orange and pink. people started to wake up " +
    "and open their windows to greet the new day. the smell of fresh bread " +
    "came from the bakery on the corner. children walked to school with their " +
    "bags on their backs and smiles on their faces. the old man who lived next " +
    "door watered the plants in his garden every morning without fail. the " +
    "cats sat on the walls and watched the world go by. it was a peaceful " +
    "morning just like any other in this quiet town. the streets were clean " +
    "and the houses were painted in bright colors. everyone knew each other " +
    "and people always stopped to say hello. the postman rode his bicycle " +
    "through the streets delivering letters and packages. the dogs barked " +
    "happily as they went for their morning walk. the sound of laughter could " +
    "be heard from the playground where the little children played. the river " +
    "flowed gently at the edge of the town and the fish swam in the clear " +
    "water. the trees along the river bank provided shade on hot summer days. " +
    "ducks paddled near the shore looking for food. the bridge across the " +
    "river was old but still strong. people crossed it every day on their way " +
    "to work. the market square was the heart of the town where people gathered " +
    "to buy fresh fruits and vegetables. the farmers brought their produce from " +
    "the countryside every morning. the stalls were full of ripe tomatoes " +
    "green lettuce sweet oranges and red apples. the smell of fresh flowers " +
    "filled the air near the flower shop. the bees buzzed around the colorful " +
    "petals collecting nectar. the old clock tower stood in the center of the " +
    "square and chimed every hour. people checked their watches when they " +
    "heard the sound. the library was a quiet place where people went to read " +
    "books and study. the shelves were filled with stories of adventure and " +
    "mystery and love. children sat on the floor reading their favorite books " +
    "with wide eyes. the librarian helped people find what they were looking " +
    "for with a gentle smile. in the afternoon the sun was high in the sky " +
    "and the town became warm and quiet. many people took a short nap after " +
    "lunch. the shops closed for a little while and the streets were calm. " +
    "the dogs lay in the shade of the trees resting after the busy morning. " +
    "the birds also rested and the only sound was the soft wind blowing " +
    "through the leaves. the church bells rang in the distance calling people " +
    "to the afternoon service. the old church had stood in the town for many " +
    "hundred years and its walls held many memories. the stained glass windows " +
    "shone with beautiful colors when the sunlight passed through them. people " +
    "sat on the benches outside the church and talked about their day. they " +
    "shared stories and laughed together. as the evening came the sky turned " +
    "golden and the temperature dropped a little. the families went home to " +
    "prepare dinner. the smell of cooking food came from every house. some " +
    "people cooked soup and others made rice and vegetables. the children set " +
    "the table and helped their parents. dinner time was when the whole family " +
    "sat together and talked about what happened during the day. after dinner " +
    "some people went for a walk around the town. the stars began to appear " +
    "in the dark sky one by one. the moon was bright and full and it lit up " +
    "the streets with a soft white light. the night was calm and peaceful. " +
    "the crickets made their gentle sound in the fields. the frogs croaked " +
    "near the pond. people sat on their porches and enjoyed the cool night " +
    "air. some read books while others just sat quietly and thought about " +
    "life. the world seemed to slow down at night and everything was still. " +
    "the street lamps cast a warm yellow glow on the pavement. the cats " +
    "walked silently along the walls. the owls hooted from the tall trees. " +
    "it was a time for rest and reflection. life in the town was simple but " +
    "full of small joys and gentle moments. people did not rush or worry too " +
    "much. they took each day as it came and appreciated the little things " +
    "around them. a kind word from a neighbor a warm meal on a cold day a " +
    "beautiful sunset at the end of the day all these things made life worth " +
    "living. the town was not big or famous but it was home to many good " +
    "people. the children grew up played in the streets went to school and " +
    "later started their own families. the cycle of life continued day after " +
    "day year after year. the seasons changed and the town changed with them. " +
    "in spring the flowers bloomed and the trees grew new green leaves. in " +
    "summer the sun was hot and everyone went to the river to cool off. in " +
    "autumn the leaves turned orange and red and fell gently to the ground. " +
    "in winter the snow covered everything in a soft white blanket and the " +
    "children built snowmen and had snowball fights. each season brought its " +
    "own beauty and its own activities. the people of the town knew how to " +
    "enjoy every moment of every season. they celebrated festivals together " +
    "and shared meals with each other. they helped each other when someone " +
    "was sick or needed support. the sense of community was strong and " +
    "everyone felt like they belonged. this was the heart of the town not " +
    "the buildings or the streets but the people who lived there and the " +
    "kindness they showed to one another every single day. life went on and " +
    "the town continued to be a place of peace and happiness for everyone " +
    "who called it home. the story of the town was written not in books but " +
    "in the lives of the people who lived there and every day a new page was " +
    "added to that story. the sun would rise again tomorrow and a new day " +
    "would begin full of hope and promise. the birds would sing the market " +
    "would open and the town would come alive once more. and that was the " +
    "beauty of life in this small town where every day was a gift and " +
    "every moment was precious. people learned to be patient and kind and " +
    "to always look for the good in every situation. they knew that life " +
    "was not about having many things but about loving and caring for the " +
    "people around them. they found joy in simple pleasures like a cup of " +
    "tea on a rainy day or a walk in the park with a friend. they understood " +
    "that happiness was not something to chase but something to create every " +
    "day with our thoughts and our actions. and so the town continued to " +
    "be a wonderful place where life moved at its own gentle pace and " +
    "everyone was free to be themselves and live their lives in peace.";

const PARAGRAPH = BASE_STORY + " " + BASE_STORY;

// ===== DOM Elements =====
const typingBox = document.getElementById("typingBox");
const typingInner = document.getElementById("typingInner");
const timerBtns = document.querySelectorAll(".timer-btn");
const resetBtn = document.getElementById("resetBtn");

const timeDisplay = document.getElementById("time");
const speedDisplay = document.getElementById("speed");
const accuracyDisplay = document.getElementById("accuracy");

const modalOverlay = document.getElementById("modalOverlay");
const modalBox = document.getElementById("modalBox");
const modalUsername = document.getElementById("modalUsername");
const modalError = document.getElementById("modalError");
const modalStartBtn = document.getElementById("modalStartBtn");

const submitBtn = document.getElementById("submitResultBtn");
const submitStatus = document.getElementById("submitStatus");

let userName = "";
let resultSubmitted = false;

// ===== Text Width Helper =====
const textMeasure = document.createElement("span");
textMeasure.style.cssText =
    "position:fixed;visibility:hidden;white-space:pre;" +
    "font-size:24px;font-family:Poppins,sans-serif;top:-9999px;left:-9999px;";
document.body.appendChild(textMeasure);

function measureTextWidth(text) {
    textMeasure.textContent = text;
    return textMeasure.offsetWidth;
}

// ===== Game Variables =====
let testDuration = 30;
let timeLeft = 30;
let timer = null;
let testActive = false;
let currentIndex = 0;
let correctCount = 0;
let totalChars = 0;

// ===== Create Character Spans =====
function buildDisplay() {
    typingInner.innerHTML = "";
    for (let i = 0; i < PARAGRAPH.length; i++) {
        const span = document.createElement("span");
        span.className = "char" + (i === 0 ? " current" : "");
        span.textContent = PARAGRAPH[i];
        typingInner.appendChild(span);
    }
    totalChars = PARAGRAPH.length;
    currentIndex = 0;
    correctCount = 0;
    typingInner.style.transform = "translateX(0px)";
}

// ===== Extend Paragraph =====
function extendDisplay() {
    for (let i = 0; i < PARAGRAPH.length; i++) {
        const span = document.createElement("span");
        span.className = "char";
        span.textContent = PARAGRAPH[i];
        typingInner.appendChild(span);
    }
    totalChars += PARAGRAPH.length;
}

// ===== Auto Scroll Text =====
function scrollToCurrentChar() {
    if (currentIndex === 0) {
        typingInner.style.transform = "translateX(0px)";
        return;
    }

    const beforeWidth = measureTextWidth(PARAGRAPH.substring(0, currentIndex));
    const charWidth = measureTextWidth(PARAGRAPH.substring(currentIndex, currentIndex + 1));

    const wrapperWidth = typingBox.offsetWidth;
    const paddingLeft = 24;

    const targetRatio = 0.38;
    const targetPos = wrapperWidth * targetRatio;

    let translateX = targetPos - paddingLeft - beforeWidth - (charWidth / 2);

    if (translateX > 0) translateX = 0;

    typingInner.style.transform = "translateX(" + translateX + "px)";
}

// ===== Count Correct Words =====
function countCorrectWords() {
    let wordStart = 0;
    let count = 0;
    for (let i = 0; i < currentIndex; i++) {
        const ch = typingInner.children[i].textContent;
        if (ch === " ") {
            let allCorrect = true;
            for (let j = wordStart; j < i; j++) {
                if (!typingInner.children[j].classList.contains("correct")) {
                    allCorrect = false;
                    break;
                }
            }
            if (allCorrect && i > wordStart) {
                count++;
            }
            wordStart = i + 1;
        }
    }
    return count;
}

// ===== Update Display =====
function updateAccuracy() {
    const acc = currentIndex > 0
        ? Math.round((correctCount / currentIndex) * 100)
        : 0;
    accuracyDisplay.innerText = acc + "%";
}

function updateWpm() {
    const elapsed = Math.max(testDuration - timeLeft, 1);
    const mins = elapsed / 60;
    const words = countCorrectWords();
    const wpm = Math.round(words / mins);
    speedDisplay.innerText = isFinite(wpm) ? wpm : 0;
}

// ===== Start Timer =====
function startCountdown() {
    testActive = true;
    timer = setInterval(function () {
        timeLeft--;
        timeDisplay.innerText = timeLeft;
        if (timeLeft <= 0) {
            clearInterval(timer);
            onTimeUp();
        }
    }, 1000);
}

// ===== Test Complete =====
function onTimeUp() {
    typingInner.contentEditable = "false";

    const correctWords = countCorrectWords();
    const accuracy = currentIndex > 0
        ? Math.round((correctCount / currentIndex) * 100)
        : 0;
    const mins = testDuration / 60;
    let wpm = Math.round(correctWords / mins);
    if (!isFinite(wpm)) wpm = 0;

    document.getElementById("hiddenTime").value = testDuration;
    document.getElementById("hiddenSpeed").value = wpm;
    document.getElementById("hiddenAccuracy").value = accuracy;
    document.getElementById("hiddenCorrectWords").value = correctWords;
    document.getElementById("hiddenTotalChars").value = currentIndex;

    // Show submit button section
    document.querySelector(".timer-options").style.display = "none";
    document.querySelector(".btn-group").style.display = "none";
    document.getElementById("submitSection").style.display = "block";
}

// ===== Save Result to Database =====
submitBtn.addEventListener("click", function () {
    if (resultSubmitted) return;
    resultSubmitted = true;

    const btn = this;
    btn.disabled = true;
    btn.textContent = "Saving...";
    submitStatus.textContent = "";
    submitStatus.style.color = "";

    const finalName = userName || "Anonymous";

    const durVal = document.getElementById("hiddenTime").value;
    const wpmVal = document.getElementById("hiddenSpeed").value;
    const accVal = document.getElementById("hiddenAccuracy").value;
    const cwVal = document.getElementById("hiddenCorrectWords").value;
    const ctVal = document.getElementById("hiddenTotalChars").value;

    const postBody = "username=" + encodeURIComponent(finalName) +
        "&duration=" + durVal +
        "&wpm=" + wpmVal +
        "&accuracy=" + accVal +
        "&correct_words=" + cwVal +
        "&characters_typed=" + ctVal;

    fetch("save_result.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: postBody
    })
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        if (data.success) {
            submitStatus.textContent = "✅ Result saved successfully.";
            submitStatus.style.color = "#10b981";
            setTimeout(function () {
                document.getElementById("resultForm").submit();
            }, 1500);
        } else {
            submitStatus.textContent = "❌ " + (data.error || "Unknown error");
            submitStatus.style.color = "#ff6b6b";
            btn.disabled = false;
            btn.textContent = "Submit Result";
            resultSubmitted = false;
        }
    })
    .catch(function () {
        submitStatus.textContent = "❌ Network error. Please try again.";
        submitStatus.style.color = "#ff6b6b";
        btn.disabled = false;
        btn.textContent = "Submit Result";
        resultSubmitted = false;
    });
});

// ===== Reset Test =====
function resetTest() {
    clearInterval(timer);
    testActive = false;
    timeLeft = testDuration;
    timeDisplay.innerText = testDuration;
    speedDisplay.innerText = "0";
    accuracyDisplay.innerText = "0%";
    buildDisplay();
    typingInner.contentEditable = "true";
    typingInner.focus();

    document.querySelector(".timer-options").style.display = "flex";
    document.querySelector(".btn-group").style.display = "flex";
    document.getElementById("submitSection").style.display = "none";
    submitStatus.textContent = "";
    submitBtn.disabled = false;
    submitBtn.textContent = "Submit Result";
    resultSubmitted = false;
}

// ===== Initial Load =====
buildDisplay();

if (sessionStorage.getItem("typingSession") !== null) {
    modalOverlay.classList.add("hidden");
    userName = sessionStorage.getItem("typingUser");
    document.getElementById("usernameText").textContent = userName;
    document.getElementById("usernameDisplay").style.display = "block";
    typingInner.contentEditable = "true";
    typingInner.focus();
} else {
    typingInner.contentEditable = "false";
    document.body.classList.add("no-scroll");
    modalUsername.focus();
}

// ===== Timer Buttons =====
timerBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
        timerBtns.forEach(function (b) { b.classList.remove("active"); });
        btn.classList.add("active");
        testDuration = parseInt(btn.getAttribute("data-time"), 10);
        resetTest();
    });
});

modalStartBtn.addEventListener("click", function () {

    const name = modalUsername.value.trim();

    if (name === "") {
        modalError.classList.add("visible");
        modalUsername.focus();
        return;
    }

    modalError.classList.remove("visible");

    userName = name;

    sessionStorage.setItem("typingSession", "1");
    sessionStorage.setItem("typingUser", name);

    fetch("set_session.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "username=" + encodeURIComponent(name)
    });

    document.getElementById("usernameText").textContent = name;
    document.getElementById("usernameDisplay").style.display = "block";

    modalBox.classList.add("closing");

    setTimeout(function () {
        modalOverlay.classList.add("hidden");
        modalBox.classList.remove("closing");
        document.body.classList.remove("no-scroll");
        typingInner.contentEditable = "true";
        typingInner.focus();
    }, 300);
});

modalUsername.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        modalStartBtn.click();
    }
});

// ===== Block Default Input =====
typingInner.addEventListener("beforeinput", function (e) {
    e.preventDefault();
});

typingInner.addEventListener("paste", function (e) { e.preventDefault(); });
typingInner.addEventListener("contextmenu", function (e) { e.preventDefault(); });

// ===== Handle Typing =====
typingInner.addEventListener("keydown", function (e) {

    if (e.ctrlKey || e.metaKey) return;

    if (e.key === "Backspace") {
        e.preventDefault();
        if (currentIndex > 0) {
            currentIndex--;
            const span = typingInner.children[currentIndex];
            if (span.classList.contains("correct")) {
                correctCount--;
            }
            span.className = "char current";
            if (currentIndex + 1 < typingInner.children.length) {
                typingInner.children[currentIndex + 1].classList.remove("current");
            }
            updateAccuracy();
            scrollToCurrentChar();
        }
        return;
    }

    if (
        e.key === "Delete" || e.key === "Tab" || e.key === "Enter" ||
        e.key === "Home" || e.key === "End" ||
        e.key === "PageUp" || e.key === "PageDown" ||
        e.key.startsWith("Arrow")
    ) {
        e.preventDefault();
        return;
    }

    if (e.key.length === 1) {

        if (currentIndex >= totalChars - 50) {
            extendDisplay();
        }

        if (currentIndex >= typingInner.children.length) {
            return;
        }

        e.preventDefault();

        if (!testActive) {
            startCountdown();
        }

        const span = typingInner.children[currentIndex];
        const expected = span.textContent;

        if (e.key === expected) {
            span.className = "char correct";
            correctCount++;
        } else {
            span.className = "char incorrect";
        }

        currentIndex++;
        updateAccuracy();
        updateWpm();

        if (currentIndex < typingInner.children.length) {
            typingInner.children[currentIndex].classList.add("current");
        }

        scrollToCurrentChar();
    }
});

// ===== Reset Button =====
resetBtn.addEventListener("click", resetTest);

// ===== Click to Focus =====
typingBox.addEventListener("click", function () {
    typingInner.focus();
});
