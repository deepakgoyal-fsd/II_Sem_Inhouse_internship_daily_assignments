$(function () {
  "use strict";

  /* ---------------------------------------------------------
     STUDENT DATA
  --------------------------------------------------------- */
  const students = [
    { name:"Ananya Sharma", major:"Computer Science", year:"3rd Year", gpa:"9.1", credits:96,
      email:"ananya.sharma@skit.ac.in", phone:"+91 98765 43210", location:"Jaipur, India",
      bio:"Full-stack developer passionate about building accessible web apps.",
      skills:["JavaScript","React","Node.js"] },
    { name:"Rohan Verma", major:"Electronics Engg.", year:"2nd Year", gpa:"8.4", credits:64,
      email:"rohan.verma@skit.ac.in", phone:"+91 98765 43211", location:"Jaipur, India",
      bio:"Embedded systems enthusiast, currently building an IoT weather station.",
      skills:["C++","Arduino","PCB Design"] },
    { name:"Priya Nair", major:"Data Science", year:"4th Year", gpa:"9.6", credits:128,
      email:"priya.nair@skit.ac.in", phone:"+91 98765 43212", location:"Kochi, India",
      bio:"Working on a research project applying ML to crop yield prediction.",
      skills:["Python","Pandas","TensorFlow"] },
    { name:"Aditya Mehta", major:"Mechanical Engg.", year:"1st Year", gpa:"8.0", credits:28,
      email:"aditya.mehta@skit.ac.in", phone:"+91 98765 43213", location:"Indore, India",
      bio:"First-year student exploring robotics club projects.",
      skills:["SolidWorks","MATLAB"] },
    { name:"Sneha Kapoor", major:"Computer Science", year:"3rd Year", gpa:"8.9", credits:94,
      email:"sneha.kapoor@skit.ac.in", phone:"+91 98765 43214", location:"Delhi, India",
      bio:"UI/UX focused developer, runs the campus design club.",
      skills:["Figma","CSS","jQuery"] },
    { name:"Karan Singh", major:"Civil Engineering", year:"4th Year", gpa:"7.8", credits:120,
      email:"karan.singh@skit.ac.in", phone:"+91 98765 43215", location:"Jaipur, India",
      bio:"Interning with a sustainable construction startup this semester.",
      skills:["AutoCAD","Project Mgmt"] },
    { name:"Ishita Rao", major:"Data Science", year:"2nd Year", gpa:"9.3", credits:60,
      email:"ishita.rao@skit.ac.in", phone:"+91 98765 43216", location:"Bengaluru, India",
      bio:"Competitive programmer and Kaggle contributor.",
      skills:["Python","SQL","Scikit-learn"] },
    { name:"Yash Gupta", major:"Electronics Engg.", year:"3rd Year", gpa:"8.2", credits:92,
      email:"yash.gupta@skit.ac.in", phone:"+91 98765 43217", location:"Lucknow, India",
      bio:"Building a low-cost health-monitoring wearable for his final project.",
      skills:["Embedded C","Signal Processing"] },
  ];

  /* ---------------------------------------------------------
     2. RENDER STUDENT CARDS DYNAMICALLY
  --------------------------------------------------------- */
  const $grid = $("#cardGrid");
  const $resultCount = $("#resultCount");
  const $noResults = $("#noResults");
  const $noResultsQuery = $("#noResultsQuery");

  function initials(name) {
    return name.split(" ").map(w => w[0]).slice(0, 2).join("").toUpperCase();
  }

  function renderCards(list) {
    $grid.empty();
    list.forEach((student, i) => {
      const $card = $(`
        <article class="student-card" data-index="${i}" style="animation-delay:${i * 0.04}s">
          <div class="card-avatar">${initials(student.name)}</div>
          <h3>${student.name}</h3>
          <p>${student.major}</p>
          <span class="card-tag">${student.year}</span>
        </article>
      `);
      $grid.append($card);
    });
    $resultCount.text(list.length);
    $noResultsQuery.text($("#searchInput").val());
    $noResults.toggleClass("show", list.length === 0);
  }

  renderCards(students);

  /* ---------------------------------------------------------
     1. SEARCH BOX — filter students in real time
  --------------------------------------------------------- */
  const $searchInput = $("#searchInput");
  const $clearBtn = $("#clearSearch");

  $searchInput.on("input", function () {
    const query = $(this).val().trim().toLowerCase();
    $clearBtn.toggleClass("show", query.length > 0);

    const filtered = students.filter(s => s.name.toLowerCase().includes(query));
    renderCards(filtered);
  });

  $clearBtn.on("click", function () {
    $searchInput.val("").trigger("input").focus();
  });

  /* ---------------------------------------------------------
     3. DETAIL VIEW — click a card to expand full profile
  --------------------------------------------------------- */
  const $overlay = $("#overlay");
  const $detailPanel = $("#detailPanel");
  const $extraInfo = $("#extraInfo");
  const $toggleBtn = $("#toggleInfoBtn");

  function openDetail(student) {
    $("#detailAvatar").text(initials(student.name));
    $("#detailName").text(student.name);
    $("#detailRole").text(`${student.major} · ${student.year}`);
    $("#detailGpa").text(student.gpa);
    $("#detailYear").text(student.year.split(" ")[0]);
    $("#detailCredits").text(student.credits);
    $("#detailEmail").text(student.email);
    $("#detailPhone").text(student.phone);
    $("#detailLocation").text(student.location);
    $("#detailBio").text(student.bio);

    const $skillsWrap = $("#detailSkills").empty();
    student.skills.forEach(skill => {
      $skillsWrap.append(`<span class="skill-pill">${skill}</span>`);
    });

    // reset the show/hide section to collapsed each time a new profile opens
    $extraInfo.removeClass("open").css("max-height", 0);
    $toggleBtn.removeClass("open").find("span").text("More details");

    $overlay.addClass("show");
    $detailPanel.addClass("show");
    $("body").css("overflow", "hidden");
  }

  function closeDetail() {
    $overlay.removeClass("show");
    $detailPanel.removeClass("show");
    $("body").css("overflow", "");
  }

  // event delegation so it works for dynamically generated cards
  $grid.on("click", ".student-card", function () {
    const index = $(this).data("index");
    const currentList = $searchInput.val().trim()
      ? students.filter(s => s.name.toLowerCase().includes($searchInput.val().trim().toLowerCase()))
      : students;
    openDetail(currentList[index]);
  });

  $("#detailClose, #overlay").on("click", closeDetail);
  $(document).on("keydown", function (e) {
    if (e.key === "Escape") closeDetail();
  });

  /* ---------------------------------------------------------
     4. SHOW / HIDE — toggle extra info with smooth animation
  --------------------------------------------------------- */
  $toggleBtn.on("click", function () {
    const isOpen = $extraInfo.hasClass("open");
    if (isOpen) {
      $extraInfo.css("max-height", 0).removeClass("open");
      $(this).removeClass("open").find("span").text("More details");
    } else {
      $extraInfo.addClass("open").css("max-height", $extraInfo.prop("scrollHeight") + "px");
      $(this).addClass("open").find("span").text("Less details");
    }
  });
});