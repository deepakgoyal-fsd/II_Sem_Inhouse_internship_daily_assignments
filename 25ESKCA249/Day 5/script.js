/* ============================================================
   PRAVAH 2026 — script.js
   All interactivity implemented with jQuery. No backend.
   ============================================================ */

$(function () {

  /* ----------------------------------------------------------
     EVENT DATA
     ---------------------------------------------------------- */
  const EVENTS = [
    { id: 'hackathon',     name: 'Hackathon',                cat: 'technical', icon: 'bi-cpu',                 desc: '24-hour build sprint. Ship a working product from a cold-open problem statement.', prize: '₹40,000', seats: 12 },
    { id: 'coding',        name: 'Coding Competition',        cat: 'technical', icon: 'bi-code-slash',          desc: 'Competitive programming rounds against the clock and against everyone else.', prize: '₹15,000', seats: 30 },
    { id: 'ai-challenge',  name: 'AI Challenge',              cat: 'technical', icon: 'bi-stars',                desc: 'Train, fine-tune or prompt your way to the best model on a surprise dataset.', prize: '₹25,000', seats: 8 },
    { id: 'robotics',      name: 'Robotics Challenge',        cat: 'technical', icon: 'bi-robot',                desc: 'Build and pilot a bot through an obstacle arena for speed and precision.', prize: '₹20,000', seats: 6 },
    { id: 'webdev',        name: 'Web Development Battle',    cat: 'technical', icon: 'bi-window-stack',         desc: 'Live front-end duel: same brief, same clock, two very different builds.', prize: '₹12,000', seats: 20 },
    { id: 'dance',         name: 'Dance Battle',              cat: 'cultural',  icon: 'bi-music-note-beamed',    desc: 'Solo and crew battles across styles, judged on floor, energy and originality.', prize: '₹30,000', seats: 40 },
    { id: 'singing',       name: 'Singing Competition',       cat: 'cultural',  icon: 'bi-mic',                  desc: 'Open mic to main stage — solo vocalists take on any genre, any language.', prize: '₹18,000', seats: 25 },
    { id: 'fashion',       name: 'Fashion Show',              cat: 'cultural',  icon: 'bi-magic',                desc: 'Themed ramp walk with student-designed looks and a live audience vote.', prize: '₹22,000', seats: 16 },
    { id: 'drama',         name: 'Drama Competition',         cat: 'cultural',  icon: 'bi-theater-masks',        desc: 'Short-form theatre — ten minutes to make a room laugh, wince, or go silent.', prize: '₹15,000', seats: 10 },
    { id: 'standup',       name: 'Stand-up Comedy',           cat: 'cultural',  icon: 'bi-emoji-laughing',       desc: 'Five minutes, one mic, zero mercy. Open sign-ups for original sets only.', prize: '₹10,000', seats: 15 },
    { id: 'bgmi',          name: 'BGMI Tournament',           cat: 'fun',       icon: 'bi-controller',           desc: 'Squad-based bracket tournament across the day, streamed on the main screen.', prize: '₹25,000', seats: 64 },
    { id: 'photography',   name: 'Photography Competition',   cat: 'fun',       icon: 'bi-camera',                desc: 'Capture the fest as it happens — theme dropped at 9 AM, submissions by 6 PM.', prize: '₹10,000', seats: 50 },
    { id: 'treasure',      name: 'Treasure Hunt',             cat: 'fun',       icon: 'bi-map',                   desc: 'Campus-wide clue trail for teams of four. First to the final flag wins.', prize: '₹12,000', seats: 20 },
    { id: 'quiz',          name: 'Quiz Competition',          cat: 'fun',       icon: 'bi-patch-question',       desc: 'General knowledge, pop culture and tech trivia across elimination rounds.', prize: '₹8,000',  seats: 40 },
    { id: 'meme',          name: 'Meme Contest',              cat: 'fun',       icon: 'bi-emoji-sunglasses',     desc: 'Fest-themed meme submissions, judged live by audience reaction.', prize: '₹5,000',  seats: 100 },
    { id: 'esports-valo',  name: 'Valorant Showdown',         cat: 'fun',       icon: 'bi-joystick',              desc: '5v5 tactical shooter bracket — group stage into a knockout final.', prize: '₹18,000', seats: 40 },
    { id: 'debate',        name: 'Debate Championship',       cat: 'cultural',  icon: 'bi-chat-quote',            desc: 'Parliamentary-style debate on fest-day topics, judged for logic and delivery.', prize: '₹12,000', seats: 20 },
    { id: 'cybersec',      name: 'Capture The Flag',          cat: 'technical', icon: 'bi-shield-lock',           desc: 'Jeopardy-style cybersecurity CTF — crypto, web, forensics and reversing.', prize: '₹20,000', seats: 24 },
    { id: 'rangoli',       name: 'Rangoli & Art Wall',        cat: 'cultural',  icon: 'bi-palette',               desc: 'Live rangoli and mural competition on the main lawn, teams of two.', prize: '₹8,000',  seats: 18 }
  ];

  const CAT_LABEL = { technical: 'Technical', cultural: 'Cultural', fun: 'Fun' };

  /* ----------------------------------------------------------
     RENDER EVENT CARDS
     ---------------------------------------------------------- */
  const $grid = $('#eventsGrid');
  const $checkGrid = $('#eventCheckGrid');

  function renderEvents() {
    let cardsHtml = '';
    let checksHtml = '';

    EVENTS.forEach(ev => {
      cardsHtml += `
        <div class="col-sm-6 col-lg-4 event-item fade-item" data-cat="${ev.cat}" data-name="${ev.name.toLowerCase()}">
          <div class="event-card cat-${ev.cat}">
            <div class="event-media"><i class="bi ${ev.icon}"></i></div>
            <div class="event-body">
              <div class="event-cat-tag">${CAT_LABEL[ev.cat]}</div>
              <h3 class="event-title">${ev.name}</h3>
              <p class="event-desc">${ev.desc}</p>
              <div class="event-meta">
                <span class="event-prize"><i class="bi bi-trophy-fill"></i> ${ev.prize}</span>
                <span class="event-seats" data-seats="${ev.id}">${ev.seats} seats left</span>
              </div>
              <button type="button" class="btn-event-register" data-event="${ev.id}">Register for this event</button>
            </div>
          </div>
        </div>`;

      checksHtml += `
        <div class="event-check">
          <input class="form-check-input" type="checkbox" value="${ev.name}" id="chk-${ev.id}">
          <label for="chk-${ev.id}">${ev.name}</label>
        </div>`;
    });

    $grid.html(cardsHtml);
    $checkGrid.html(checksHtml);
    revealOnScroll();
  }
  renderEvents();

  // "Register for this event" scrolls to form and pre-checks the box
  $grid.on('click', '.btn-event-register', function () {
    const id = $(this).data('event');
    $(`#chk-${id}`).prop('checked', true);
    $('html, body').animate({ scrollTop: $('#register').offset().top - 70 }, 600);
  });

  /* ----------------------------------------------------------
     EVENT FILTER + SEARCH
     ---------------------------------------------------------- */
  let activeFilter = 'all';

  function applyFilters() {
    const term = $('#eventSearch').val().trim().toLowerCase();
    let visibleCount = 0;

    $('.event-item').each(function () {
      const $item = $(this);
      const matchesCat = activeFilter === 'all' || $item.data('cat') === activeFilter;
      const matchesTerm = term === '' || $item.data('name').toString().includes(term);
      if (matchesCat && matchesTerm) {
        $item.show();
        visibleCount++;
      } else {
        $item.hide();
      }
    });

    $('#noResults').toggleClass('d-none', visibleCount !== 0);
  }

  $('.filter-btn').on('click', function () {
    $('.filter-btn').removeClass('active');
    $(this).addClass('active');
    activeFilter = $(this).data('filter');
    applyFilters();
  });

  $('#eventSearch').on('input', applyFilters);

  /* ----------------------------------------------------------
     SMOOTH SCROLL NAV + ACTIVE LINK HIGHLIGHT
     ---------------------------------------------------------- */
  $('.scroll-link').on('click', function (e) {
    const target = $(this).attr('href');
    if (target.startsWith('#') && $(target).length) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: $(target).offset().top - 68 }, 700);
      $('#navMenu').collapse('hide');
    }
  });

  const $sections = $('section[id], header[id]');
  const $navLinks = $('.navbar-nav .nav-link.scroll-link');

  function highlightNav() {
    const scrollPos = $(window).scrollTop() + 120;
    let currentId = null;
    $sections.each(function () {
      if ($(this).offset().top <= scrollPos) currentId = $(this).attr('id');
    });
    $navLinks.removeClass('active-link');
    if (currentId) $navLinks.filter(`[href="#${currentId}"]`).addClass('active-link');
  }

  /* ----------------------------------------------------------
     NAVBAR SCROLLED STATE + BACK TO TOP + FLOW PROGRESS
     ---------------------------------------------------------- */
  const $nav = $('#mainNav');
  const $backToTop = $('#backToTop');
  const $flowFill = $('#flowFill');

  function onScroll() {
    const st = $(window).scrollTop();
    $nav.toggleClass('scrolled', st > 40);
    $backToTop.toggleClass('show', st > 500);

    const docHeight = $(document).height() - $(window).height();
    const pct = docHeight > 0 ? (st / docHeight) * 100 : 0;
    $flowFill.css('height', pct + '%');

    highlightNav();
    revealOnScroll();
  }
  $(window).on('scroll', onScroll);
  onScroll();

  $backToTop.on('click', function () {
    $('html, body').animate({ scrollTop: 0 }, 700);
  });

  /* ----------------------------------------------------------
     SCROLL REVEAL (stats, timeline, event cards)
     ---------------------------------------------------------- */
  function revealOnScroll() {
    const winBottom = $(window).scrollTop() + $(window).height() - 80;
    $('.fade-item:not(.in-view)').each(function () {
      if ($(this).offset().top < winBottom) {
        $(this).addClass('in-view');
      }
    });
  }

  /* ----------------------------------------------------------
     STAT COUNTER ANIMATION
     ---------------------------------------------------------- */
  let statsAnimated = false;
  function animateStats() {
    if (statsAnimated) return;
    const $stats = $('.stat-num');
    if ($stats.length === 0) return;
    const top = $stats.first().offset().top;
    if ($(window).scrollTop() + $(window).height() < top + 40) return;

    statsAnimated = true;
    $stats.each(function () {
      const $el = $(this);
      const target = parseInt($el.data('count'), 10);
      const prefix = $el.data('prefix') || '';
      const suffix = $el.data('suffix') || '';
      $({ val: 0 }).animate({ val: target }, {
        duration: 1400,
        easing: 'swing',
        step: function (now) {
          $el.text(prefix + Math.floor(now) + suffix);
        },
        complete: function () {
          $el.text(prefix + target + suffix);
        }
      });
    });
  }
  $(window).on('scroll', animateStats);
  animateStats();

  /* ----------------------------------------------------------
     COUNTDOWN TIMER — target: 10 July 2026, 09:00 local
     ---------------------------------------------------------- */
  const festDate = new Date('2026-07-10T09:00:00');

  function updateCountdown() {
    const now = new Date();
    let diff = festDate - now;

    if (diff <= 0) {
      $('#cdDays, #cdHours, #cdMins, #cdSecs').text('00');
      return;
    }
    const day = Math.floor(diff / (1000 * 60 * 60 * 24));
    diff -= day * (1000 * 60 * 60 * 24);
    const hr = Math.floor(diff / (1000 * 60 * 60));
    diff -= hr * (1000 * 60 * 60);
    const min = Math.floor(diff / (1000 * 60));
    diff -= min * (1000 * 60);
    const sec = Math.floor(diff / 1000);

    $('#cdDays').text(String(day).padStart(2, '0'));
    $('#cdHours').text(String(hr).padStart(2, '0'));
    $('#cdMins').text(String(min).padStart(2, '0'));
    $('#cdSecs').text(String(sec).padStart(2, '0'));
  }
  updateCountdown();
  setInterval(updateCountdown, 1000);

  /* ----------------------------------------------------------
     REGISTRATION FORM — VALIDATION
     ---------------------------------------------------------- */
  const registrations = []; // in-memory store, appended each submission

  function showError(id, message) {
    $('#' + id).addClass('is-invalid');
    $('#err-' + id).text(message);
  }
  function clearError(id) {
    $('#' + id).removeClass('is-invalid');
    $('#err-' + id).text('');
  }

  function validateForm() {
    let valid = true;
    ['fullName', 'email', 'phone', 'collegeId', 'role', 'department', 'year'].forEach(clearError);
    $('#err-events').text('');
    $('#confirmCheck').removeClass('is-invalid');
    $('#err-confirm').text('');

    const fullName = $('#fullName').val().trim();
    if (fullName.length < 2) { showError('fullName', 'Please enter your full name.'); valid = false; }

    const email = $('#email').val().trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) { showError('email', 'Please enter a valid email address.'); valid = false; }

    const phone = $('#phone').val().trim().replace(/\D/g, '');
    if (phone.length < 10) { showError('phone', 'Enter a valid phone number (minimum 10 digits).'); valid = false; }

    const collegeId = $('#collegeId').val().trim();
    if (collegeId.length < 3) { showError('collegeId', 'Please enter your College ID or Employee ID.'); valid = false; }

    const role = $('#role').val();
    if (!role) { showError('role', 'Please select your role.'); valid = false; }

    const department = $('#department').val();
    if (!department) { showError('department', 'Please select your department.'); valid = false; }

    const year = $('#year').val();
    if (!year) { showError('year', 'Please select your year.'); valid = false; }

    const selectedEvents = $('#eventCheckGrid input:checked').map(function () { return $(this).val(); }).get();
    if (selectedEvents.length === 0) {
      $('#err-events').text('Please select at least one event.');
      valid = false;
    }

    if (!$('#confirmCheck').is(':checked')) {
      $('#confirmCheck').addClass('is-invalid');
      $('#err-confirm').text('You must confirm your information is correct.');
      valid = false;
    }

    return { valid, data: { fullName, email, phone, collegeId, role, department, year, selectedEvents } };
  }

  /* ----------------------------------------------------------
     CSV GENERATION + DOWNLOAD
     ---------------------------------------------------------- */
  function csvEscape(value) {
    const str = String(value === undefined || value === null ? '' : value);
    if (/[",\n]/.test(str)) {
      return '"' + str.replace(/"/g, '""') + '"';
    }
    return str;
  }

  function buildCsv() {
    const header = ['name', 'email', 'phone', 'college_id', 'role', 'department', 'year', 'events', 'notes', 'timestamp'];
    const rows = registrations.map(r => [
      csvEscape(r.name), csvEscape(r.email), csvEscape(r.phone), csvEscape(r.college_id),
      csvEscape(r.role), csvEscape(r.department), csvEscape(r.year), csvEscape(r.events),
      csvEscape(r.notes), csvEscape(r.timestamp)
    ].join(','));
    return header.join(',') + '\n' + rows.join('\n') + '\n';
  }

  function downloadCsv() {
    const csvContent = buildCsv();
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'registrations.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
  }

  /* ----------------------------------------------------------
     SEAT COUNTER — decrement on registration
     ---------------------------------------------------------- */
  function decrementSeats(eventNames) {
    eventNames.forEach(name => {
      const ev = EVENTS.find(e => e.name === name);
      if (!ev || ev.seats <= 0) return;
      ev.seats -= 1;
      const $seatEl = $(`[data-seats="${ev.id}"]`);
      $seatEl.text(ev.seats + ' seats left');
      if (ev.seats <= 5) $seatEl.addClass('low');
    });
  }

  /* ----------------------------------------------------------
     FORM SUBMIT
     ---------------------------------------------------------- */
  $('#registerForm').on('submit', function (e) {
    e.preventDefault();
    const { valid, data } = validateForm();
    if (!valid) {
      const $firstInvalid = $('.is-invalid').first();
      if ($firstInvalid.length) {
        $('html, body').animate({ scrollTop: $firstInvalid.offset().top - 120 }, 400);
      }
      return;
    }

    const $btn = $('#submitBtn');
    const $spinner = $('#submitSpinner');
    $btn.prop('disabled', true);
    $btn.find('.btn-label').text('Submitting…');
    $spinner.removeClass('d-none');

    // Simulate a brief processing delay for a real submit feel
    setTimeout(function () {
      const record = {
        name: data.fullName,
        email: data.email,
        phone: data.phone,
        college_id: data.collegeId,
        role: data.role,
        department: data.department,
        year: data.year,
        events: data.selectedEvents.join(' | '),
        notes: $('#notes').val().trim(),
        timestamp: new Date().toISOString()
      };
      registrations.push(record);
      downloadCsv();
      decrementSeats(data.selectedEvents);

      $btn.prop('disabled', false);
      $btn.find('.btn-label').text('Submit Registration');
      $spinner.addClass('d-none');

      $('#successModalName').text(`Thanks, ${data.fullName.split(' ')[0]} — you're registered for ${data.selectedEvents.length} event(s).`);
      const modal = new bootstrap.Modal(document.getElementById('successModal'));
      modal.show();
      fireConfetti();
    }, 900);
  });

  $('#successModal').on('hidden.bs.modal', function () {
    document.getElementById('registerForm').reset();
    $('.event-select-grid input:checked').prop('checked', false);
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').text('');
  });

  /* ----------------------------------------------------------
     CONFETTI EFFECT (canvas, no external library)
     ---------------------------------------------------------- */
  function fireConfetti() {
    const canvas = document.getElementById('confettiCanvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    canvas.style.display = 'block';

    const colors = ['#22D3EE', '#8B5CF6', '#FF6584', '#FBBF24'];
    const pieces = Array.from({ length: 140 }, () => ({
      x: Math.random() * canvas.width,
      y: -20 - Math.random() * canvas.height * 0.4,
      w: 6 + Math.random() * 6,
      h: 8 + Math.random() * 10,
      color: colors[Math.floor(Math.random() * colors.length)],
      speedY: 2 + Math.random() * 3,
      speedX: -1.5 + Math.random() * 3,
      rotation: Math.random() * 360,
      rotationSpeed: -6 + Math.random() * 12
    }));

    let frame = 0;
    const maxFrames = 200;

    function draw() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      pieces.forEach(p => {
        p.x += p.speedX;
        p.y += p.speedY;
        p.rotation += p.rotationSpeed;
        ctx.save();
        ctx.translate(p.x, p.y);
        ctx.rotate((p.rotation * Math.PI) / 180);
        ctx.fillStyle = p.color;
        ctx.fillRect(-p.w / 2, -p.h / 2, p.w, p.h);
        ctx.restore();
      });
      frame++;
      if (frame < maxFrames) {
        requestAnimationFrame(draw);
      } else {
        canvas.style.display = 'none';
        ctx.clearRect(0, 0, canvas.width, canvas.height);
      }
    }
    draw();
  }

  $(window).on('resize', function () {
    const canvas = document.getElementById('confettiCanvas');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  });

});
