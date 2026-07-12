const body = document.body;
const themeToggle = document.getElementById('themeToggle');
const toast = document.getElementById('toast');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const feedbackForm = document.getElementById('feedbackForm');
const feedbackList = document.getElementById('feedbackList');
const feedbackCount = document.getElementById('feedbackCount');
const sentimentChart = document.getElementById('sentimentChart');
const sentimentText = document.getElementById('sentimentText');
const trendChart = document.getElementById('trendChart');
const storageKey = 'feedbackDashboardEntries';
const userStorageKey = 'feedbackDashboardUsers';

let feedbackEntries = [];
let users = JSON.parse(localStorage.getItem(userStorageKey)) || [];

const defaultEntries = [
  {
    name: 'Alex',
    email: 'alex@example.com',
    category: 'Faculty',
    subject: 'Teaching style is engaging',
    message: 'The instructor explained the concepts clearly and kept the class interactive.',
    rating: 5,
    learningMark: 'Strong understanding',
    createdAt: '2026-06-18T10:00:00.000Z'
  },
  {
    name: 'Mina',
    email: 'mina@example.com',
    category: 'Infrastructure',
    subject: 'Lab environment needs improvement',
    message: 'The project room has limited seating and weak Wi-Fi during busy hours.',
    rating: 2,
    learningMark: 'Needs support',
    createdAt: '2026-06-28T09:30:00.000Z'
  },
  {
    name: 'Ravi',
    email: 'ravi@example.com',
    category: 'Curriculum',
    subject: 'More practical work needed',
    message: 'The modules are informative, but more real-world examples would help.',
    rating: 4,
    learningMark: 'Needs practice',
    createdAt: '2026-07-05T11:45:00.000Z'
  }
];

const localEntries = JSON.parse(localStorage.getItem(storageKey)) || [];
feedbackEntries = localEntries.length ? localEntries : defaultEntries;

function applyTheme(theme) {
  body.setAttribute('data-theme', theme);
  themeToggle.textContent = theme === 'dark' ? '☀️ Light Mode' : '🌙 Dark Mode';
  localStorage.setItem('feedback-theme', theme);
}

function showToast(message) {
  toast.textContent = message;
  toast.classList.add('show');
  clearTimeout(showToast.timeout);
  showToast.timeout = setTimeout(() => toast.classList.remove('show'), 2200);
}

function getSentiment(rating) {
  if (rating >= 4) return 'positive';
  if (rating <= 2) return 'negative';
  return 'neutral';
}

function saveEntries() {
  localStorage.setItem(storageKey, JSON.stringify(feedbackEntries));
}

function saveUsers() {
  localStorage.setItem(userStorageKey, JSON.stringify(users));
}

async function requestBackend(action, payload = {}) {
  const formData = new FormData();
  formData.append('action', action);
  Object.entries(payload).forEach(([key, value]) => formData.append(key, value));

  try {
    const response = await fetch('api.php', { method: 'POST', body: formData });
    if (!response.ok) throw new Error('Backend unavailable');
    return await response.json();
  } catch (error) {
    return null;
  }
}

function updateStats() {
  const total = feedbackEntries.length;
  const average = (feedbackEntries.reduce((sum, item) => sum + Number(item.rating), 0) / total).toFixed(1);
  const positive = feedbackEntries.filter((item) => getSentiment(item.rating) === 'positive').length;
  const negative = feedbackEntries.filter((item) => getSentiment(item.rating) === 'negative').length;
  const neutral = feedbackEntries.filter((item) => getSentiment(item.rating) === 'neutral').length;

  document.getElementById('feedbackCountStat').textContent = total;
  document.getElementById('ratingStat').textContent = `${average}/5`;
  document.getElementById('positiveStat').textContent = positive;
  document.getElementById('negativeStat').textContent = negative;
  document.getElementById('feedbackCount').textContent = `${total} entries`;
  document.getElementById('feedbackCountStat').setAttribute('data-count', total);

  const percentage = total ? Math.round((positive / total) * 100) : 0;
  sentimentChart.style.background = `conic-gradient(var(--accent) 0 ${percentage}%, var(--accent-2) ${percentage}% ${percentage + neutral / Math.max(total, 1) * 100}%, var(--warning) ${percentage + neutral / Math.max(total, 1) * 100}% 100%)`;
  sentimentText.textContent = `${percentage}%`;
}

function updateCategoryBars() {
  const categories = ['Faculty', 'Infrastructure', 'Curriculum', 'Support Services'];
  const counts = categories.map((category) => feedbackEntries.filter((item) => item.category === category).length);
  const max = Math.max(...counts, 1);

  const bars = [
    ['facultyBar', 'facultyBarLabel'],
    ['infraBar', 'infraBarLabel'],
    ['curriculumBar', 'curriculumBarLabel'],
    ['supportBar', 'supportBarLabel']
  ];

  bars.forEach(([barId, labelId], index) => {
    const width = Math.round((counts[index] / max) * 100);
    document.getElementById(barId).style.width = `${width}%`;
    document.getElementById(labelId).textContent = counts[index];
  });
}

function updateTrendChart() {
  const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
  const counts = months.map((month) => feedbackEntries.filter((item) => new Date(item.createdAt).toLocaleString('en', { month: 'short' }) === month).length);
  const max = Math.max(...counts, 1);

  trendChart.innerHTML = '';
  counts.forEach((count, index) => {
    const bar = document.createElement('div');
    bar.className = 'trend-bar';
    bar.innerHTML = `<span style="height:${Math.max(12, (count / max) * 100)}%"></span><small>${months[index]}</small>`;
    trendChart.appendChild(bar);
  });
}

async function loadFeedbackFromServer() {
  const data = await requestBackend('list');
  if (data && data.success && Array.isArray(data.feedback)) {
    feedbackEntries = data.feedback;
    localStorage.setItem(storageKey, JSON.stringify(feedbackEntries));
    refreshDashboard();
  } else {
    feedbackEntries = JSON.parse(localStorage.getItem(storageKey)) || defaultEntries;
    refreshDashboard();
  }
}

function renderFeedbackList() {
  feedbackList.innerHTML = '';
  if (!feedbackEntries.length) {
    feedbackList.innerHTML = '<p>No feedback yet.</p>';
    return;
  }

  feedbackEntries.slice().reverse().forEach((item) => {
    const card = document.createElement('article');
    card.className = 'feedback-card';
    const ratingText = '★'.repeat(Number(item.rating)) + '☆'.repeat(5 - Number(item.rating));
    const sentimentClass = getSentiment(Number(item.rating)) === 'negative' ? 'warning' : getSentiment(Number(item.rating)) === 'neutral' ? 'neutral' : 'positive';
    card.innerHTML = `
      <div class="feedback-top">
        <div>
          <h4>${item.subject}</h4>
          <p>${item.name} • ${item.category}</p>
        </div>
        <span class="badge ${sentimentClass}">${item.category}</span>
      </div>
      <p class="feedback-message">${item.message}</p>
      <div class="learning-mark-row">
        <div class="stars">${ratingText}</div>
        <div class="learning-tags">
          <span class="tag">${item.learningMark}</span>
          <span class="tag">${item.rating}/5</span>
        </div>
      </div>
    `;
    feedbackList.appendChild(card);
  });
}

function refreshDashboard() {
  updateStats();
  updateCategoryBars();
  updateTrendChart();
  renderFeedbackList();
}

function applyAuthMode(mode) {
  document.querySelectorAll('.tab-btn').forEach((button) => {
    button.classList.toggle('active', button.dataset.auth === mode);
  });
  document.querySelectorAll('.auth-form').forEach((form) => {
    form.classList.toggle('active', form.id === `${mode}Form`);
  });
}

const savedTheme = localStorage.getItem('feedback-theme');
applyTheme(savedTheme || 'dark');

document.querySelectorAll('.tab-btn').forEach((button) => {
  button.addEventListener('click', () => applyAuthMode(button.dataset.auth));
});

themeToggle.addEventListener('click', () => {
  const nextTheme = body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
  applyTheme(nextTheme);
});

loginForm.addEventListener('submit', async (event) => {
  event.preventDefault();
  const email = document.getElementById('loginEmail').value.trim();
  const password = document.getElementById('loginPassword').value.trim();

  const data = await requestBackend('login', { email, password });

  if (data && data.success) {
    document.getElementById('loginStatus').textContent = `Welcome back, ${data.name}!`;
    document.getElementById('loginStatus').style.color = 'var(--accent-2)';
    showToast('Login successful');
  } else {
    const storedUser = users.find((user) => user.email === email && user.password === password);
    if (storedUser) {
      document.getElementById('loginStatus').textContent = `Welcome back, ${storedUser.name}!`;
      document.getElementById('loginStatus').style.color = 'var(--accent-2)';
      showToast('Login successful offline');
    } else {
      document.getElementById('loginStatus').textContent = 'Invalid credentials';
      document.getElementById('loginStatus').style.color = 'var(--warning)';
    }
  }
});

registerForm.addEventListener('submit', async (event) => {
  event.preventDefault();
  const name = document.getElementById('registerName').value.trim();
  const email = document.getElementById('registerEmail').value.trim();
  const password = document.getElementById('registerPassword').value.trim();

  const data = await requestBackend('register', { name, email, password });

  if (data && data.success) {
    document.getElementById('registerStatus').textContent = `Account created for ${name}`;
    document.getElementById('registerStatus').style.color = 'var(--accent-2)';
    showToast(data.message);
  } else {
    if (users.some((user) => user.email === email)) {
      document.getElementById('registerStatus').textContent = 'Email already exists';
      document.getElementById('registerStatus').style.color = 'var(--warning)';
    } else {
      users.push({ name, email, password });
      saveUsers();
      document.getElementById('registerStatus').textContent = `Account created for ${name}`;
      document.getElementById('registerStatus').style.color = 'var(--accent-2)';
      showToast('Registered locally');
    }
  }
});

feedbackForm.addEventListener('submit', async (event) => {
  event.preventDefault();
  const entry = {
    name: document.getElementById('feedbackName').value.trim(),
    email: document.getElementById('feedbackEmail').value.trim(),
    category: document.getElementById('feedbackCategory').value,
    subject: document.getElementById('feedbackSubject').value.trim(),
    message: document.getElementById('feedbackMessage').value.trim(),
    rating: Number(document.getElementById('feedbackRating').value),
    learningMark: document.getElementById('learningMark').value,
    createdAt: new Date().toISOString()
  };

  if (!entry.name || !entry.email || !entry.subject || !entry.message) {
    showToast('Please complete all feedback fields');
    return;
  }

  const formData = new FormData();
  formData.append('action', 'feedback');
  formData.append('name', entry.name);
  formData.append('email', entry.email);
  formData.append('category', entry.category);
  formData.append('subject', entry.subject);
  formData.append('message', entry.message);
  formData.append('rating', entry.rating);
  formData.append('learningMark', entry.learningMark);

  try {
    const response = await fetch('api.php', { method: 'POST', body: formData });
    const data = await response.json();

    if (data.success) {
      feedbackForm.reset();
      await loadFeedbackFromServer();
      showToast('Feedback saved to database!');
    } else {
      showToast('Error: ' + data.message);
    }
  } catch (error) {
    showToast('Connection error, saving locally');
    feedbackEntries.unshift(entry);
    saveEntries();
    refreshDashboard();
    feedbackForm.reset();
  }
});

refreshDashboard();
loadFeedbackFromServer();
