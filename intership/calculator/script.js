/* =========================================================================
   EMI LEDGER — SCRIPT.JS
   Plain, vanilla JavaScript. No frameworks, no build step.
   Organised into clearly commented sections so it's easy to follow
   for a college project / portfolio piece.
   ========================================================================= */

/* -------------------------------------------------------------------------
   0. GRAB DOM ELEMENTS
   ------------------------------------------------------------------------- */
const form              = document.getElementById('emiForm');
const calculateBtn      = document.getElementById('calculateBtn');
const resetBtn          = document.getElementById('resetBtn');

const loanAmountInput   = document.getElementById('loanAmount');
const loanAmountRange   = document.getElementById('loanAmountRange');
const downPaymentInput  = document.getElementById('downPayment');
const downPaymentRange  = document.getElementById('downPaymentRange');
const interestRateInput = document.getElementById('interestRate');
const interestRateRange = document.getElementById('interestRateRange');
const loanTenureInput   = document.getElementById('loanTenure');
const loanTenureRange   = document.getElementById('loanTenureRange');
const extraPaymentInput = document.getElementById('extraPayment');
const extraPaymentRange = document.getElementById('extraPaymentRange');
const monthlyIncomeInput= document.getElementById('monthlyIncome');
const currencySelect    = document.getElementById('currencySelect');

const emiOutput          = document.getElementById('emiOutput');
const effectiveLoanOutput= document.getElementById('effectiveLoanOutput');
const totalInterestOutput= document.getElementById('totalInterestOutput');
const totalAmountOutput  = document.getElementById('totalAmountOutput');
const payoffDateOutput   = document.getElementById('payoffDateOutput');
const monthsSavedRow     = document.getElementById('monthsSavedRow');
const monthsSavedOutput  = document.getElementById('monthsSavedOutput');
const affordabilityBadge = document.getElementById('affordabilityBadge');
const affordabilityText  = document.getElementById('affordabilityText');
const legendPrincipal    = document.getElementById('legendPrincipal');
const legendInterest     = document.getElementById('legendInterest');
const progressPrincipal  = document.getElementById('progressPrincipal');
const progressInterest   = document.getElementById('progressInterest');
const pieChartCanvas     = document.getElementById('pieChart');
const amortBody          = document.getElementById('amortBody');

const copyBtn  = document.getElementById('copyBtn');
const shareBtn = document.getElementById('shareBtn');
const toast    = document.getElementById('toast');

const themeToggle = document.getElementById('themeToggle');
const navToggle   = document.getElementById('navToggle');
const navbar      = document.getElementById('navbar');
const backToTop   = document.getElementById('backToTop');

/* -------------------------------------------------------------------------
   1. STATE
   ------------------------------------------------------------------------- */
let rateMode   = 'annual';  // 'annual' | 'monthly'
let tenureMode = 'years';   // 'years'  | 'months'
let currentSymbol = '₹';
let lastResult = null;      // cache of the last successful calculation

const currencySymbols = { INR: '₹', USD: '$', EUR: '€', GBP: '£' };

/* -------------------------------------------------------------------------
   2. HELPERS
   ------------------------------------------------------------------------- */

// Parse a text input that may contain commas/spaces into a plain number.
function parseNumber(value) {
  if (value === null || value === undefined) return NaN;
  const cleaned = String(value).replace(/[,\s]/g, '');
  return cleaned === '' ? NaN : Number(cleaned);
}

// Format a number as currency using the currently selected symbol.
function formatCurrency(amount) {
  if (!isFinite(amount)) amount = 0;
  const rounded = Math.round(amount);
  return currentSymbol + rounded.toLocaleString('en-IN');
}

// Format a plain number with thousands separators (no currency symbol).
function formatNumber(amount) {
  return Math.round(amount).toLocaleString('en-IN');
}

// Keep a text input and its paired range slider in sync both ways.
function bindSlider(numberInput, rangeInput) {
  numberInput.addEventListener('input', () => {
    const val = parseNumber(numberInput.value);
    if (!isNaN(val)) rangeInput.value = val;
    scheduleLiveCalculation();
  });
  rangeInput.addEventListener('input', () => {
    numberInput.value = rangeInput.value;
    scheduleLiveCalculation();
  });
}

bindSlider(loanAmountInput, loanAmountRange);
bindSlider(downPaymentInput, downPaymentRange);
bindSlider(interestRateInput, interestRateRange);
bindSlider(loanTenureInput, loanTenureRange);
bindSlider(extraPaymentInput, extraPaymentRange);

/* -------------------------------------------------------------------------
   3. RATE / TENURE UNIT TOGGLES
   ------------------------------------------------------------------------- */
document.querySelectorAll('[data-rate-mode]').forEach((btn) => {
  btn.addEventListener('click', () => {
    const newMode = btn.dataset.rateMode;
    if (newMode === rateMode) return;

    const currentVal = parseNumber(interestRateInput.value) || 0;
    // Convert the displayed number so the underlying annual rate stays correct.
    const converted = newMode === 'monthly' ? currentVal / 12 : currentVal * 12;
    interestRateInput.value = round2(converted);

    // Update slider range to sensible bounds for the new mode.
    if (newMode === 'monthly') {
      interestRateRange.min = 0.01; interestRateRange.max = 2.5; interestRateRange.step = 0.01;
    } else {
      interestRateRange.min = 0.1; interestRateRange.max = 30; interestRateRange.step = 0.05;
    }
    interestRateRange.value = interestRateInput.value;

    rateMode = newMode;
    document.querySelectorAll('[data-rate-mode]').forEach((b) => b.classList.toggle('is-active', b === btn));
    scheduleLiveCalculation();
  });
});

document.querySelectorAll('[data-tenure-mode]').forEach((btn) => {
  btn.addEventListener('click', () => {
    const newMode = btn.dataset.tenureMode;
    if (newMode === tenureMode) return;

    const currentVal = parseNumber(loanTenureInput.value) || 0;
    const converted = newMode === 'months' ? currentVal * 12 : currentVal / 12;
    loanTenureInput.value = newMode === 'months' ? Math.round(converted) : round2(converted);

    if (newMode === 'months') {
      loanTenureRange.min = 1; loanTenureRange.max = 480; loanTenureRange.step = 1;
    } else {
      loanTenureRange.min = 1; loanTenureRange.max = 40; loanTenureRange.step = 1;
    }
    loanTenureRange.value = loanTenureInput.value;

    tenureMode = newMode;
    document.querySelectorAll('[data-tenure-mode]').forEach((b) => b.classList.toggle('is-active', b === btn));
    scheduleLiveCalculation();
  });
});

function round2(n) { return Math.round(n * 100) / 100; }

/* -------------------------------------------------------------------------
   4. CURRENCY SELECTOR (display only — does not convert values)
   ------------------------------------------------------------------------- */
currencySelect.addEventListener('change', () => {
  currentSymbol = currencySymbols[currencySelect.value] || '₹';
  ['loanAmountSymbol', 'downPaymentSymbol', 'extraPaymentSymbol', 'monthlyIncomeSymbol'].forEach((id) => {
    document.getElementById(id).textContent = currentSymbol;
  });
  if (lastResult) renderResult(lastResult); // re-render with new symbol, same numbers
});

/* -------------------------------------------------------------------------
   5. VALIDATION
   ------------------------------------------------------------------------- */
function showError(id, message) {
  const el = document.getElementById(id);
  el.textContent = message;
}
function clearErrors() {
  document.querySelectorAll('.error-msg').forEach((el) => (el.textContent = ''));
}

function validateInputs(data) {
  let valid = true;
  clearErrors();

  if (!(data.loanAmount > 0)) {
    showError('loanAmountError', 'Enter a loan amount greater than 0.');
    valid = false;
  }
  if (data.downPayment < 0) {
    showError('downPaymentError', 'Down payment cannot be negative.');
    valid = false;
  } else if (data.downPayment >= data.loanAmount) {
    showError('downPaymentError', 'Down payment must be less than the loan amount.');
    valid = false;
  }
  if (!(data.annualRatePercent > 0) || data.annualRatePercent > 100) {
    showError('interestRateError', 'Enter a realistic interest rate between 0 and 100%.');
    valid = false;
  }
  if (!(data.totalMonths > 0) || data.totalMonths > 600) {
    showError('loanTenureError', 'Enter a tenure between 1 month and 50 years.');
    valid = false;
  }
  if (data.extraPayment < 0) {
    showError('extraPaymentError', 'Extra payment cannot be negative.');
    valid = false;
  }
  return valid;
}

/* -------------------------------------------------------------------------
   6. READ FORM INTO A NORMALISED DATA OBJECT
   ------------------------------------------------------------------------- */
function readFormData() {
  const loanAmount  = parseNumber(loanAmountInput.value);
  const downPayment = parseNumber(downPaymentInput.value) || 0;
  const rateRaw     = parseNumber(interestRateInput.value);
  const tenureRaw   = parseNumber(loanTenureInput.value);
  const extraPayment= parseNumber(extraPaymentInput.value) || 0;
  const income      = parseNumber(monthlyIncomeInput.value); // may be NaN (optional)

  const annualRatePercent = rateMode === 'monthly' ? rateRaw * 12 : rateRaw;
  const totalMonths        = tenureMode === 'months' ? Math.round(tenureRaw) : Math.round(tenureRaw * 12);

  return { loanAmount, downPayment, annualRatePercent, totalMonths, extraPayment, income };
}

/* -------------------------------------------------------------------------
   7. CORE EMI + AMORTIZATION CALCULATION
   ------------------------------------------------------------------------- */
function calculateEMI(data) {
  const principal = data.loanAmount - data.downPayment;   // effective loan amount
  const monthlyRate = data.annualRatePercent / 12 / 100;
  const n = data.totalMonths;

  // Standard reducing-balance EMI formula.
  let emi;
  if (monthlyRate === 0) {
    emi = principal / n;
  } else {
    const factor = Math.pow(1 + monthlyRate, n);
    emi = (principal * monthlyRate * factor) / (factor - 1);
  }

  // Simulate the month-by-month schedule, applying the extra payment
  // (prepayment) fully towards principal every month.
  const schedule = [];
  let balance = principal;
  let totalInterest = 0;
  let month = 0;
  const today = new Date();
  const safetyCap = n * 3 + 12; // guard against infinite loops on bad input

  while (balance > 0.5 && month < safetyCap) {
    month++;
    const interestForMonth = balance * monthlyRate;
    let principalForMonth = emi - interestForMonth;
    let extra = data.extraPayment;

    // On the final month, don't overpay — clamp to the remaining balance.
    if (principalForMonth + extra >= balance) {
      extra = Math.max(0, balance - principalForMonth);
      if (principalForMonth > balance) principalForMonth = balance;
    }

    balance = balance - principalForMonth - extra;
    if (balance < 0) balance = 0;
    totalInterest += interestForMonth;

    const paymentDate = new Date(today.getFullYear(), today.getMonth() + month, today.getDate());

    schedule.push({
      month,
      date: paymentDate,
      payment: principalForMonth + interestForMonth,
      principal: principalForMonth,
      interest: interestForMonth,
      extra,
      balance,
    });
  }

  const actualMonths = schedule.length;
  const totalAmountPayable = principal + totalInterest;
  const payoffDate = actualMonths > 0 ? schedule[schedule.length - 1].date : today;
  const monthsSaved = n - actualMonths;

  return {
    principal, emi, monthlyRate, n, totalInterest, totalAmountPayable,
    payoffDate, actualMonths, monthsSaved, schedule, data,
  };
}

/* -------------------------------------------------------------------------
   8. AFFORDABILITY INDICATOR
   ------------------------------------------------------------------------- */
function getAffordability(emi, income) {
  if (!income || income <= 0) {
    return { label: 'Add income for an estimate', level: '' };
  }
  const ratio = emi / income;
  if (ratio <= 0.30) return { label: 'Affordable', level: 'is-affordable' };
  if (ratio <= 0.45) return { label: 'Moderate', level: 'is-moderate' };
  return { label: 'Expensive', level: 'is-expensive' };
}

/* -------------------------------------------------------------------------
   9. PIE CHART (plain canvas, no libraries)
   ------------------------------------------------------------------------- */
function drawPieChart(principal, interest) {
  const ctx = pieChartCanvas.getContext('2d');
  const w = pieChartCanvas.width, h = pieChartCanvas.height;
  const cx = w / 2, cy = h / 2, radius = Math.min(w, h) / 2 - 6;

  ctx.clearRect(0, 0, w, h);

  const total = principal + interest;
  const principalShare = total > 0 ? principal / total : 0.5;

  const styles = getComputedStyle(document.documentElement);
  const colorPrincipal = styles.getPropertyValue('--accent').trim() || '#B8863B';
  const colorInterest  = styles.getPropertyValue('--accent-rust').trim() || '#A8462F';
  const colorSurface   = styles.getPropertyValue('--surface').trim() || '#fff';

  const startAngle = -Math.PI / 2;
  const principalAngle = startAngle + principalShare * Math.PI * 2;

  // Principal slice
  ctx.beginPath();
  ctx.moveTo(cx, cy);
  ctx.arc(cx, cy, radius, startAngle, principalAngle);
  ctx.closePath();
  ctx.fillStyle = colorPrincipal;
  ctx.fill();

  // Interest slice
  ctx.beginPath();
  ctx.moveTo(cx, cy);
  ctx.arc(cx, cy, radius, principalAngle, startAngle + Math.PI * 2);
  ctx.closePath();
  ctx.fillStyle = colorInterest;
  ctx.fill();

  // Donut hole for a cleaner "ledger stamp" look
  ctx.beginPath();
  ctx.arc(cx, cy, radius * 0.55, 0, Math.PI * 2);
  ctx.fillStyle = colorSurface;
  ctx.fill();
}

/* -------------------------------------------------------------------------
   10. RENDER RESULTS TO THE DOM
   ------------------------------------------------------------------------- */
function renderResult(result) {
  const { principal, emi, totalInterest, totalAmountPayable, payoffDate, monthsSaved, data } = result;

  emiOutput.textContent = formatCurrency(emi);
  effectiveLoanOutput.textContent = formatCurrency(principal);
  totalInterestOutput.textContent = formatCurrency(totalInterest);
  totalAmountOutput.textContent = formatCurrency(totalAmountPayable);
  payoffDateOutput.textContent = payoffDate.toLocaleDateString('en-IN', { month: 'long', year: 'numeric' });

  if (monthsSaved > 0) {
    monthsSavedRow.hidden = false;
    const years = Math.floor(monthsSaved / 12), months = monthsSaved % 12;
    monthsSavedOutput.textContent = `${years > 0 ? years + 'y ' : ''}${months}m earlier`;
  } else {
    monthsSavedRow.hidden = true;
  }

  // Affordability badge
  const afford = getAffordability(emi, data.income);
  affordabilityText.textContent = afford.label;
  affordabilityBadge.className = 'stub__badge ' + afford.level;

  // Pie chart + legend
  const total = principal + totalInterest;
  const pPct = total > 0 ? Math.round((principal / total) * 100) : 0;
  const iPct = 100 - pPct;
  legendPrincipal.textContent = pPct + '%';
  legendInterest.textContent = iPct + '%';
  drawPieChart(principal, totalInterest);

  // Progress bar mirrors the same split
  progressPrincipal.style.width = pPct + '%';
  progressInterest.style.width = iPct + '%';

  renderAmortizationTable(result.schedule);
}

function renderAmortizationTable(schedule) {
  if (!schedule.length) {
    amortBody.innerHTML = '<tr><td colspan="7" class="table-empty">Calculate your EMI to view the full schedule.</td></tr>';
    return;
  }
  const rows = schedule.map((row) => `
    <tr>
      <td>${row.month}</td>
      <td>${row.date.toLocaleDateString('en-IN', { month: 'short', year: 'numeric' })}</td>
      <td>${formatCurrency(row.payment + row.extra)}</td>
      <td>${formatCurrency(row.principal)}</td>
      <td>${formatCurrency(row.interest)}</td>
      <td>${row.extra > 0 ? formatCurrency(row.extra) : '—'}</td>
      <td>${formatCurrency(row.balance)}</td>
    </tr>
  `).join('');
  amortBody.innerHTML = rows;
}

/* -------------------------------------------------------------------------
   11. MAIN CALCULATE HANDLER
   ------------------------------------------------------------------------- */
function runCalculation() {
  const data = readFormData();
  if (!validateInputs(data)) {
    lastResult = null;
    return;
  }
  const result = calculateEMI(data);
  lastResult = result;
  renderResult(result);
}

form.addEventListener('submit', (e) => {
  e.preventDefault();
  runCalculation();
});

// Live calculation: recalculates automatically as the user types/slides,
// but gently debounced so it doesn't run on every single keystroke.
let liveTimer = null;
function scheduleLiveCalculation() {
  clearTimeout(liveTimer);
  liveTimer = setTimeout(runCalculation, 300);
}
[loanAmountInput, downPaymentInput, interestRateInput, loanTenureInput, extraPaymentInput, monthlyIncomeInput]
  .forEach((input) => input.addEventListener('input', scheduleLiveCalculation));

/* -------------------------------------------------------------------------
   12. RESET
   ------------------------------------------------------------------------- */
resetBtn.addEventListener('click', () => {
  form.reset();
  loanAmountInput.value = 1000000; loanAmountRange.value = 1000000;
  downPaymentInput.value = 0; downPaymentRange.value = 0;
  interestRateInput.value = 8.5; interestRateRange.value = 8.5;
  loanTenureInput.value = 20; loanTenureRange.value = 20;
  extraPaymentInput.value = 0; extraPaymentRange.value = 0;
  monthlyIncomeInput.value = '';
  clearErrors();
  lastResult = null;
  amortBody.innerHTML = '<tr><td colspan="7" class="table-empty">Calculate your EMI to view the full schedule.</td></tr>';
  emiOutput.textContent = formatCurrency(0);
  effectiveLoanOutput.textContent = formatCurrency(0);
  totalInterestOutput.textContent = formatCurrency(0);
  totalAmountOutput.textContent = formatCurrency(0);
  payoffDateOutput.textContent = '—';
  monthsSavedRow.hidden = true;
  affordabilityText.textContent = 'Enter details';
  affordabilityBadge.className = 'stub__badge';
  drawPieChart(0, 0);
  progressPrincipal.style.width = '0%';
  progressInterest.style.width = '0%';
});

/* -------------------------------------------------------------------------
   13. COPY & SHARE
   ------------------------------------------------------------------------- */
function buildSummaryText() {
  if (!lastResult) return 'Calculate your EMI first.';
  const { emi, totalInterest, totalAmountPayable, payoffDate, principal } = lastResult;
  return [
    `Loan EMI Summary (EMI Ledger)`,
    `Effective Loan Amount: ${formatCurrency(principal)}`,
    `Monthly EMI: ${formatCurrency(emi)}`,
    `Total Interest Payable: ${formatCurrency(totalInterest)}`,
    `Total Amount Payable: ${formatCurrency(totalAmountPayable)}`,
    `Estimated Payoff Date: ${payoffDate.toLocaleDateString('en-IN', { month: 'long', year: 'numeric' })}`,
  ].join('\n');
}

function showToast(message) {
  toast.textContent = message;
  toast.classList.add('is-visible');
  setTimeout(() => toast.classList.remove('is-visible'), 2200);
}

copyBtn.addEventListener('click', async () => {
  const text = buildSummaryText();
  try {
    await navigator.clipboard.writeText(text);
    showToast('Result copied to clipboard!');
  } catch {
    showToast('Could not copy automatically — please copy manually.');
  }
});

shareBtn.addEventListener('click', async () => {
  const text = buildSummaryText();
  if (navigator.share) {
    try {
      await navigator.share({ title: 'My Loan EMI Result', text });
    } catch {
      /* user cancelled the share sheet — no action needed */
    }
  } else {
    try {
      await navigator.clipboard.writeText(text);
      showToast('Share not supported — result copied instead.');
    } catch {
      showToast('Unable to share on this browser.');
    }
  }
});

/* -------------------------------------------------------------------------
   14. THEME TOGGLE (persisted in Local Storage)
   ------------------------------------------------------------------------- */
function applyTheme(theme) {
  document.documentElement.setAttribute('data-theme', theme);
  themeToggle.querySelector('.theme-icon').textContent = theme === 'dark' ? '☀️' : '🌙';
  if (lastResult) drawPieChart(lastResult.principal, lastResult.totalInterest); // repaint chart colors
}

const savedTheme = localStorage.getItem('emi-theme');
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
applyTheme(savedTheme || (prefersDark ? 'dark' : 'light'));

themeToggle.addEventListener('click', () => {
  const current = document.documentElement.getAttribute('data-theme');
  const next = current === 'dark' ? 'light' : 'dark';
  applyTheme(next);
  localStorage.setItem('emi-theme', next);
});

/* -------------------------------------------------------------------------
   15. MOBILE NAV TOGGLE
   ------------------------------------------------------------------------- */
navToggle.addEventListener('click', () => {
  const isOpen = navbar.classList.toggle('is-menu-open');
  navToggle.setAttribute('aria-expanded', String(isOpen));
});
document.querySelectorAll('.navbar__nav a').forEach((link) => {
  link.addEventListener('click', () => {
    navbar.classList.remove('is-menu-open');
    navToggle.setAttribute('aria-expanded', 'false');
  });
});

/* -------------------------------------------------------------------------
   16. FAQ ACCORDION
   ------------------------------------------------------------------------- */
document.querySelectorAll('.accordion__trigger').forEach((trigger) => {
  const panel = trigger.parentElement.nextElementSibling;
  trigger.addEventListener('click', () => {
    const isOpen = trigger.getAttribute('aria-expanded') === 'true';
    trigger.setAttribute('aria-expanded', String(!isOpen));
    panel.style.maxHeight = isOpen ? null : panel.scrollHeight + 'px';
  });
});

/* -------------------------------------------------------------------------
   17. BACK TO TOP BUTTON
   ------------------------------------------------------------------------- */
window.addEventListener('scroll', () => {
  backToTop.classList.toggle('is-visible', window.scrollY > 500);
});
backToTop.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* -------------------------------------------------------------------------
   18. FOOTER YEAR + INITIAL PAINT
   ------------------------------------------------------------------------- */
document.getElementById('footerYear').textContent = new Date().getFullYear();
drawPieChart(0, 0); // empty chart on first load
runCalculation();   // show a result immediately using the default demo values
