(function(){

  const API = 'api/students.php';

  /* ---------- state ---------- */
  let students = [];
  let isOffline = false;   // true when the PHP/MySQL API is unreachable
  const state = { query:"", dept:null, status:null, letter:null, sort:"name" };

  const LOCAL_KEY = 'studentRegistryOfflineData';

  function loadOfflineStudents(){
    try{
      const raw = localStorage.getItem(LOCAL_KEY);
      if(raw) return JSON.parse(raw);
    }catch(e){ /* ignore corrupt/missing data */ }
    return STUDENTS_FALLBACK.map(s=>({...s})); // seed with sample data on first run
  }

  function saveOfflineStudents(){
    try{ localStorage.setItem(LOCAL_KEY, JSON.stringify(students)); }
    catch(e){ /* storage unavailable — fail silently, data just won't persist */ }
  }

  function nextOfflineId(){
    return students.reduce((max,s)=>Math.max(max, s.id||0), 0) + 1;
  }

  const DEPTS_FALLBACK = ["Computer Science","Mechanical Eng.","Economics","Biotechnology","Mathematics","Literature","Physics","Design"];
  const STATUS_LIST = ["Active","OnLeave","Graduated"];

  /* ---------- fallback data (used only if the PHP/MySQL API is unreachable) ---------- */
  const STUDENTS_FALLBACK = [
    {id:1,  name:"Aarav Sharma",   roll:"REG-2024-1001", dept:"Computer Science", year:2, status:"Active",    gpa:8.40, email:"aarav.sharma@campus.edu",   phone:"+91 98765 43210"},
    {id:2,  name:"Isha Verma",     roll:"REG-2023-1002", dept:"Economics",         year:3, status:"Active",    gpa:7.90, email:"isha.verma@campus.edu",     phone:"+91 91234 56780"},
    {id:3,  name:"Rohan Iyer",     roll:"REG-2022-1003", dept:"Mechanical Eng.",   year:4, status:"OnLeave",   gpa:6.80, email:"rohan.iyer@campus.edu",     phone:"+91 90000 11122"},
    {id:4,  name:"Meera Reddy",    roll:"REG-2021-1004", dept:"Physics",           year:4, status:"Graduated", gpa:9.10, email:"meera.reddy@campus.edu",    phone:"+91 99887 76655"},
    {id:5,  name:"Kabir Kapoor",   roll:"REG-2024-1005", dept:"Design",            year:1, status:"Active",    gpa:7.20, email:"kabir.kapoor@campus.edu",   phone:"+91 98123 45678"},
    {id:6,  name:"Ananya Nair",    roll:"REG-2023-1006", dept:"Biotechnology",     year:2, status:"Active",    gpa:8.90, email:"ananya.nair@campus.edu",    phone:"+91 97654 32109"},
    {id:7,  name:"Vivaan Malhotra",roll:"REG-2024-1007", dept:"Computer Science", year:1, status:"Active",    gpa:7.60, email:"vivaan.malhotra@campus.edu",phone:"+91 90112 23344"},
    {id:8,  name:"Saanvi Joshi",   roll:"REG-2022-1008", dept:"Mathematics",       year:3, status:"Active",    gpa:9.30, email:"saanvi.joshi@campus.edu",   phone:"+91 98221 10098"},
    {id:9,  name:"Arjun Menon",    roll:"REG-2021-1009", dept:"Mechanical Eng.",   year:4, status:"Graduated", gpa:8.05, email:"arjun.menon@campus.edu",    phone:"+91 99001 22334"},
    {id:10, name:"Diya Chatterjee",roll:"REG-2023-1010", dept:"Literature",        year:2, status:"Active",    gpa:8.20, email:"diya.chatterjee@campus.edu",phone:"+91 91002 33445"},
    {id:11, name:"Kian Bose",      roll:"REG-2024-1011", dept:"Design",            year:1, status:"OnLeave",   gpa:6.50, email:"kian.bose@campus.edu",      phone:"+91 90223 44556"},
    {id:12, name:"Anika Rao",      roll:"REG-2022-1012", dept:"Physics",           year:3, status:"Active",    gpa:8.75, email:"anika.rao@campus.edu",      phone:"+91 98334 55667"},
    {id:13, name:"Reyansh Gupta",  roll:"REG-2020-1013", dept:"Economics",         year:4, status:"Graduated", gpa:7.40, email:"reyansh.gupta@campus.edu",  phone:"+91 97445 66778"},
    {id:14, name:"Myra Desai",     roll:"REG-2024-1014", dept:"Biotechnology",     year:1, status:"Active",    gpa:9.05, email:"myra.desai@campus.edu",     phone:"+91 96556 77889"},
    {id:15, name:"Advait Pillai",  roll:"REG-2023-1015", dept:"Computer Science", year:2, status:"Active",    gpa:8.55, email:"advait.pillai@campus.edu",  phone:"+91 95667 88990"},
    {id:16, name:"Ira Singh",      roll:"REG-2021-1016", dept:"Mathematics",       year:4, status:"OnLeave",   gpa:7.10, email:"ira.singh@campus.edu",      phone:"+91 94778 99001"},
    {id:17, name:"Vihaan Chauhan", roll:"REG-2022-1017", dept:"Mechanical Eng.",   year:3, status:"Active",    gpa:7.85, email:"vihaan.chauhan@campus.edu", phone:"+91 93889 00112"},
    {id:18, name:"Navya Bhatt",    roll:"REG-2024-1018", dept:"Design",            year:1, status:"Active",    gpa:8.30, email:"navya.bhatt@campus.edu",    phone:"+91 92990 11223"},
    {id:19, name:"Aryan Kulkarni", roll:"REG-2020-1019", dept:"Physics",           year:4, status:"Graduated", gpa:8.95, email:"aryan.kulkarni@campus.edu", phone:"+91 91101 22334"},
    {id:20, name:"Prisha Agarwal", roll:"REG-2023-1020", dept:"Literature",        year:2, status:"Active",    gpa:7.75, email:"prisha.agarwal@campus.edu", phone:"+91 90212 33445"}
  ];

  /* ---------- DOM refs ---------- */
  const grid = document.getElementById('cardsGrid');
  const emptyState = document.getElementById('emptyState');
  const loadingState = document.getElementById('loadingState');
  const errorBanner = document.getElementById('errorBanner');
  const stamp = document.getElementById('resultStamp');
  const deptChipsEl = document.getElementById('deptChips');
  const alphaRail = document.getElementById('alphaRail');
  const searchInput = document.getElementById('searchInput');

  /* ---------- API helpers ---------- */
  async function apiRequest(url, options){
    const res = await fetch(url, options);
    let body = null;
    try { body = await res.json(); } catch(e){ /* no body */ }
    if(!res.ok){
      const message = (body && body.error) ? body.error : ('Request failed (' + res.status + ')');
      throw new Error(message);
    }
    return body;
  }

  function showError(message){
    errorBanner.textContent = message;
    errorBanner.hidden = false;
    setTimeout(()=>{ errorBanner.hidden = true; }, 5000);
  }

  async function loadStudents(){
    loadingState.hidden = false;
    grid.hidden = true;
    try{
      students = await apiRequest(API);
      isOffline = false;
    }catch(err){
      // API/database not reachable (e.g. XAMPP not running, DB not imported yet) —
      // fall back to locally-saved data so the portal still shows records and
      // lets you add/edit/delete (saved in this browser only, via localStorage).
      isOffline = true;
      showError('Live database unreachable — working offline. Changes are saved in this browser. (' + err.message + ')');
      students = loadOfflineStudents();
    }
    loadingState.hidden = true;
    grid.hidden = false;
    buildDeptChips();
    render();
  }

  /* ---------- department chips (built from live data) ---------- */
  function buildDeptChips(){
    const depts = Array.from(new Set(students.map(s=>s.dept))).sort();
    const list = depts.length ? depts : DEPTS_FALLBACK;
    deptChipsEl.innerHTML = "";
    list.forEach(d=>{
      const b = document.createElement('button');
      b.className = 'chip';
      b.textContent = d;
      b.dataset.dept = d;
      b.classList.toggle('active', state.dept === d);
      b.addEventListener('click', ()=>{
        state.dept = state.dept === d ? null : d;
        render();
      });
      deptChipsEl.appendChild(b);
    });
  }

  document.querySelectorAll('#statusChips .chip').forEach(b=>{
    b.addEventListener('click', ()=>{
      const s = b.dataset.status;
      state.status = state.status === s ? null : s;
      render();
    });
  });

  /* ---------- alpha rail ---------- */
  const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
  letters.forEach(l=>{
    const b = document.createElement('button');
    b.textContent = l;
    b.dataset.letter = l;
    b.addEventListener('click', ()=>{
      state.letter = state.letter === l ? null : l;
      render();
    });
    alphaRail.appendChild(b);
  });

  /* ---------- search / sort inputs ---------- */
  searchInput.addEventListener('input', ()=>{
    state.query = searchInput.value.trim().toLowerCase();
    render();
  });
  document.getElementById('sortSelect').addEventListener('change', e=>{
    state.sort = e.target.value;
    render();
  });
  document.getElementById('addStudentBtn').addEventListener('click', ()=> openForm(null));

  /* ---------- filtering ---------- */
  function getFilteredIgnoringLetter(){
    return students.filter(s=>{
      if(state.dept && s.dept !== state.dept) return false;
      if(state.status && s.status !== state.status) return false;
      if(state.query){
        const hay = (s.name+" "+s.roll+" "+s.dept+" "+s.email).toLowerCase();
        if(!hay.includes(state.query)) return false;
      }
      return true;
    });
  }

  function getFiltered(){
    return getFilteredIgnoringLetter().filter(s=>{
      if(state.letter && !s.name.toUpperCase().startsWith(state.letter)) return false;
      return true;
    });
  }

  function sortList(list){
    const copy = list.slice();
    switch(state.sort){
      case 'roll': copy.sort((a,b)=>a.roll.localeCompare(b.roll)); break;
      case 'gpa': copy.sort((a,b)=>b.gpa-a.gpa); break;
      case 'year': copy.sort((a,b)=>b.year-a.year); break;
      default: copy.sort((a,b)=>a.name.localeCompare(b.name));
    }
    return copy;
  }

  function statusClass(s){ return s.replace(/\s/g,''); }

  function escapeHtml(str){
    const d = document.createElement('div');
    d.textContent = str == null ? "" : String(str);
    return d.innerHTML;
  }

  /* ---------- render ---------- */
  function render(){
    const filtered = sortList(getFiltered());

    document.querySelectorAll('#deptChips .chip').forEach(b=>{
      b.classList.toggle('active', state.dept === b.dataset.dept);
    });
    document.querySelectorAll('#statusChips .chip').forEach(b=>{
      b.classList.toggle('active', state.status === b.dataset.status);
    });

    const availableLetters = new Set(getFilteredIgnoringLetter().map(s=>s.name[0].toUpperCase()));
    document.querySelectorAll('.alpha-rail button').forEach(b=>{
      const l = b.dataset.letter;
      b.classList.toggle('active', state.letter === l);
      b.classList.toggle('has-match', availableLetters.has(l));
      b.disabled = !availableLetters.has(l) && state.letter !== l;
    });

    stamp.textContent = filtered.length + (filtered.length===1 ? " record found" : " records found") +
      (students.length !== filtered.length ? " (of " + students.length + ")" : "");
    stamp.classList.remove('pulse'); void stamp.offsetWidth; stamp.classList.add('pulse');

    grid.innerHTML = "";
    emptyState.hidden = filtered.length !== 0 || !loadingState.hidden;
    filtered.forEach(s=>{
      const card = document.createElement('div');
      card.className = 'card';
      card.tabIndex = 0;
      card.innerHTML = `
        <div class="roll">${escapeHtml(s.roll)}</div>
        <div class="name">${escapeHtml(s.name)}</div>
        <div class="meta-line"><b>${escapeHtml(s.dept)}</b> · Year ${s.year}</div>
        <div class="meta-line">${escapeHtml(s.email)}</div>
        <div class="tag-row">
          <span class="status-pill ${statusClass(s.status)}">${s.status === 'OnLeave' ? 'ON LEAVE' : s.status.toUpperCase()}</span>
          <span class="gpa">GPA <b>${s.gpa}</b></span>
        </div>
      `;
      card.addEventListener('click', ()=>openDetail(s));
      card.addEventListener('keypress', e=>{ if(e.key === 'Enter') openDetail(s); });
      grid.appendChild(card);
    });
  }

  /* ---------- modal scaffolding ---------- */
  function openOverlay(innerHtml, onMount){
    const overlay = document.createElement('div');
    overlay.className = 'modal-overlay';
    overlay.innerHTML = `<div class="modal-card" role="dialog" aria-modal="true">${innerHtml}</div>`;
    overlay.addEventListener('click', e=>{ if(e.target === overlay) close(); });
    function close(){ overlay.remove(); document.removeEventListener('keydown', onKey); }
    function onKey(e){ if(e.key === 'Escape') close(); }
    document.addEventListener('keydown', onKey);
    document.body.appendChild(overlay);
    const card = overlay.querySelector('.modal-card');
    if(onMount) onMount(card, close);
    return close;
  }

  /* ---------- detail modal ---------- */
  function openDetail(s){
    openOverlay(`
      <button class="close-btn" aria-label="Close">✕</button>
      <span class="roll">${escapeHtml(s.roll)}</span>
      <div class="name">${escapeHtml(s.name)}</div>
      <div class="modal-grid">
        <div><div class="label">Department</div><div class="value">${escapeHtml(s.dept)}</div></div>
        <div><div class="label">Year</div><div class="value">Year ${s.year}</div></div>
        <div><div class="label">Status</div><div class="value">${s.status === 'OnLeave' ? 'On Leave' : s.status}</div></div>
        <div><div class="label">GPA</div><div class="value">${s.gpa}</div></div>
      </div>
      <div class="divider"></div>
      <div class="modal-grid" style="grid-template-columns:1fr;">
        <div><div class="label">Email</div><div class="value">${escapeHtml(s.email)}</div></div>
        <div><div class="label">Phone</div><div class="value">${escapeHtml(s.phone || '—')}</div></div>
      </div>
      <div class="form-actions">
        <button class="btn btn-danger" data-action="delete">Delete</button>
        <button class="btn btn-secondary" data-action="edit">Edit</button>
      </div>
    `, (card, close)=>{
      card.querySelector('.close-btn').addEventListener('click', close);
      card.querySelector('[data-action="edit"]').addEventListener('click', ()=>{
        close();
        openForm(s);
      });
      card.querySelector('[data-action="delete"]').addEventListener('click', async ()=>{
        if(!confirm(`Remove ${s.name} (${s.roll}) from the registry?`)) return;
        try{
          if(isOffline){
            students = students.filter(x=>x.id !== s.id);
            saveOfflineStudents();
            close();
            buildDeptChips();
            render();
          } else {
            await apiRequest(API + '?id=' + s.id, { method:'DELETE' });
            close();
            await loadStudents();
          }
        }catch(err){
          showError('Could not delete record: ' + err.message);
        }
      });
    });
  }

  /* ---------- add / edit form modal ---------- */
  function openForm(existing){
    const isEdit = !!existing;
    const s = existing || { name:"", roll:"", dept:"", year:1, status:"Active", gpa:"", email:"", phone:"" };

    const deptOptionsHtml = Array.from(new Set([...students.map(x=>x.dept), ...DEPTS_FALLBACK]))
      .filter(Boolean)
      .map(d=>`<option value="${escapeHtml(d)}" ${d===s.dept?'selected':''}>${escapeHtml(d)}</option>`)
      .join('');

    const statusOptionsHtml = STATUS_LIST
      .map(st=>`<option value="${st}" ${st===s.status?'selected':''}>${st==='OnLeave'?'On Leave':st}</option>`)
      .join('');

    openOverlay(`
      <button class="close-btn" aria-label="Close">✕</button>
      <div class="name">${isEdit ? 'Edit Record' : 'New Student Record'}</div>
      <div class="form-error" id="formError" hidden></div>
      <form id="studentForm">
        <div class="form-row">
          <label for="f-name">Full Name</label>
          <input id="f-name" name="name" type="text" value="${escapeHtml(s.name)}" required>
        </div>
        <div class="form-grid-2">
          <div class="form-row">
            <label for="f-roll">Roll No.</label>
            <input id="f-roll" name="roll" type="text" value="${escapeHtml(s.roll)}" required>
          </div>
          <div class="form-row">
            <label for="f-year">Year</label>
            <select id="f-year" name="year">
              ${[1,2,3,4].map(y=>`<option value="${y}" ${Number(s.year)===y?'selected':''}>Year ${y}</option>`).join('')}
            </select>
          </div>
        </div>
        <div class="form-row">
          <label for="f-dept">Department</label>
          <input id="f-dept" name="dept" list="deptList" type="text" value="${escapeHtml(s.dept)}" required>
          <datalist id="deptList">${deptOptionsHtml}</datalist>
        </div>
        <div class="form-grid-2">
          <div class="form-row">
            <label for="f-status">Status</label>
            <select id="f-status" name="status">${statusOptionsHtml}</select>
          </div>
          <div class="form-row">
            <label for="f-gpa">GPA</label>
            <input id="f-gpa" name="gpa" type="number" min="0" max="10" step="0.01" value="${s.gpa}" required>
          </div>
        </div>
        <div class="form-row">
          <label for="f-email">Email</label>
          <input id="f-email" name="email" type="email" value="${escapeHtml(s.email)}" required>
        </div>
        <div class="form-row">
          <label for="f-phone">Phone (optional)</label>
          <input id="f-phone" name="phone" type="text" value="${escapeHtml(s.phone || '')}">
        </div>
        <div class="form-actions">
          <button type="button" class="btn btn-secondary" data-action="cancel">Cancel</button>
          <button type="submit" class="btn btn-primary">${isEdit ? 'Save Changes' : 'Add to Registry'}</button>
        </div>
      </form>
    `, (card, close)=>{
      card.querySelector('.close-btn').addEventListener('click', close);
      card.querySelector('[data-action="cancel"]').addEventListener('click', close);
      const form = card.querySelector('#studentForm');
      const formError = card.querySelector('#formError');

      form.addEventListener('submit', async e=>{
        e.preventDefault();
        formError.hidden = true;
        const fd = new FormData(form);
        const payload = {
          name: fd.get('name').trim(),
          roll: fd.get('roll').trim(),
          dept: fd.get('dept').trim(),
          year: Number(fd.get('year')),
          status: fd.get('status'),
          gpa: Number(fd.get('gpa')),
          email: fd.get('email').trim(),
          phone: fd.get('phone').trim()
        };

        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        try{
          if(isOffline){
            const dup = students.find(x=>x.roll === payload.roll && (!isEdit || x.id !== existing.id));
            if(dup) throw new Error('A student with this roll number already exists');

            if(isEdit){
              const idx = students.findIndex(x=>x.id === existing.id);
              students[idx] = { ...students[idx], ...payload };
            } else {
              students.push({ ...payload, id: nextOfflineId() });
            }
            saveOfflineStudents();
            close();
            buildDeptChips();
            render();
          } else {
            if(isEdit){
              await apiRequest(API + '?id=' + existing.id, {
                method:'PUT',
                headers:{'Content-Type':'application/json'},
                body: JSON.stringify(payload)
              });
            } else {
              await apiRequest(API, {
                method:'POST',
                headers:{'Content-Type':'application/json'},
                body: JSON.stringify(payload)
              });
            }
            close();
            await loadStudents();
          }
        }catch(err){
          formError.textContent = err.message;
          formError.hidden = false;
          submitBtn.disabled = false;
        }
      });
    });
  }

  loadStudents();
})();
