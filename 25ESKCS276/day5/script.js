/**
 * script.js — jQuery logic for the Student Directory
 *
 * Responsibilities:
 *   1. Render student cards dynamically from the `students` array.
 *   2. Toggle CGPA visibility per card with a smooth animation.
 *   3. Color-code the CGPA once revealed.
 *   4. Filter cards by name or year via the search input.
 *
 * Uses event delegation so dynamically-created cards are handled correctly.
 */

$(function () {
  "use strict";

  /* ------------------------------------------------
   * 1. Render Cards
   * ------------------------------------------------ */
  const $grid = $("#studentGrid");

  /**
   * Builds a Bootstrap column card for a single student.
   * @param {Object} student
   * @param {number} index  — used for staggered animation delay
   * @returns {jQuery}
   */
  function createCard(student, index) {
    // CGPA color class based on value
    let cgpaClass = "cgpa-red";
    if (student.cgpa >= 8) cgpaClass = "cgpa-green";
    else if (student.cgpa >= 6) cgpaClass = "cgpa-yellow";

    const delay = (index * 0.04).toFixed(2); // stagger entry

    const html = `
      <div class="col-12 col-sm-6 col-lg-3 student-col"
           data-name="${student.name.toLowerCase()}"
           data-branch="${student.branch.toLowerCase()}"
           data-year="${student.year.toLowerCase()}"
           style="animation-delay:${delay}s">

        <div class="card student-card h-100">
          <div class="card-body d-flex flex-column">

            <!-- Year badge -->
            <span class="year-badge">${student.year} Year</span>

            <!-- Student name -->
            <h5 class="student-name">${student.name}</h5>

            <!-- Branch -->
            <p class="student-branch mb-1">
              <i class="bi bi-building"></i>&nbsp; ${student.branch}
            </p>

            <!-- Study year text -->
            <p class="student-year mb-3">
              <i class="bi bi-book"></i>&nbsp; ${student.year} Year Student
            </p>

            <!-- CGPA area -->
            <div class="cgpa-wrapper mt-auto">
              <div>
                <span class="cgpa-label">CGPA</span>
                <p class="cgpa-masked mb-0" data-student-id="${student.id}">&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;</p>
                <p class="cgpa-value ${cgpaClass}" data-student-id="${student.id}">
                  ${student.cgpa.toFixed(2)}
                </p>
              </div>

              <span class="cgpa-lock" data-student-id="${student.id}" title="Click to reveal CGPA">
                <i class="bi bi-eye-slash"></i>
                <small>Show</small>
              </span>
            </div>

          </div>
        </div>
      </div>`;

    return $(html);
  }

  // Render every student into the grid
  $.each(students, function (i, student) {
    $grid.append(createCard(student, i));
  });

  /* ------------------------------------------------
   * 2. CGPA Toggle (event delegation)
   * ------------------------------------------------ */
  $grid.on("click", ".cgpa-lock", function () {
    const $lock   = $(this);
    const id      = $lock.data("student-id");
    const $masked = $grid.find(`.cgpa-masked[data-student-id="${id}"]`);
    const $value  = $grid.find(`.cgpa-value[data-student-id="${id}"]`);
    const $icon   = $lock.find(".bi");

    if ($value.is(":visible")) {
      // Hide CGPA
      $value.slideUp(200, function () {
        $masked.fadeIn(150);
      });
      $icon.removeClass("bi-eye").addClass("bi-eye-slash");
      $lock.find("small").text("Show");
    } else {
      // Reveal CGPA
      $masked.fadeOut(150, function () {
        $value.slideDown(250);
      });
      $icon.removeClass("bi-eye-slash").addClass("bi-eye");
      $lock.find("small").text("Hide");
    }
  });

  /* ------------------------------------------------
   * 3. Search / Filter
   * ------------------------------------------------ */
  $("#searchInput").on("input", function () {
    const query = $(this).val().toLowerCase().trim();

    let visibleCount = 0;

    $grid.find(".student-col").each(function () {
      const $col   = $(this);
      const name    = $col.data("name");
      const year    = $col.data("year");
      const branch  = $col.data("branch");
      const matches = !query ||
                      name.includes(query) ||
                      year.includes(query) ||
                      branch.includes(query);

      $col.toggle(matches);
      if (matches) visibleCount++;
    });

    // Show / hide the "no results" message
    $("#noResults").toggle(visibleCount === 0);
  });
});
