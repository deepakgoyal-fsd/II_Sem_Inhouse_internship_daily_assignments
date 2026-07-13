# EMI Ledger — Loan EMI Calculator

A complete, responsive, single-page **Loan EMI Calculator** built with plain **HTML, CSS and vanilla JavaScript** — no frameworks, no build step, no dependencies to install.

Open `index.html` in any modern browser and it just works.

---

## ✨ Features

- **Live + manual calculation** — results update as you type/slide, and a "Calculate EMI" button forces a recalculation.
- **Inputs:** Loan Amount, Interest Rate (Annual ⇄ Monthly toggle), Loan Tenure (Years ⇄ Months toggle), optional Down Payment, optional Extra Monthly Payment (prepayment), optional Monthly Income (for the affordability check).
- **Sliders synced with number fields** in both directions.
- **Input validation** with inline, accessible error messages.
- **Results shown:** Monthly EMI, Effective Loan Amount, Total Interest Payable, Total Amount Payable, Loan Payoff Date, and time saved through prepayment.
- **Currency selector** (₹ / $ / € / £) — display only, does not convert amounts.
- **Loan Affordability Indicator** (Affordable / Moderate / Expensive) based on the EMI-to-income ratio, with a clear disclaimer that it is only an estimate.
- **Pie chart** (Principal vs Interest) drawn with plain `<canvas>`, no chart library.
- **Progress bar** mirroring the principal/interest split.
- **Full amortization schedule** with a sticky table header, showing every month's payment, principal, interest, prepayment and remaining balance.
- **Copy Result** and **Share Result** buttons (uses the native Web Share API when available, falls back to clipboard copy).
- **Dark / light mode** toggle, persisted with `localStorage` and defaulting to the user's OS preference on first visit.
- **Sticky navbar**, smooth scrolling, mobile hamburger menu, and a **back-to-top** button.
- Fully **responsive** across mobile, tablet and desktop.
- **Educational content sections**: how EMI is calculated (with a worked example), factors affecting EMI, benefits of prepayment, tips to reduce EMI, "Did you know?" finance facts, a 12-question FAQ accordion, and a disclaimer.
- Semantic HTML5, SEO meta tags, and accessibility touches: skip link, `aria-live` regions, labelled form controls, visible focus states, `prefers-reduced-motion` support.

> **Note:** This calculator intentionally does **not** include bank-specific data such as processing fees or predefined loan products/types — it is a pure, lender-agnostic EMI and interest calculator.

---

## 📁 Project Structure

```
emi-calculator/
├── index.html      → Page structure & content (semantic HTML5)
├── style.css       → All styling, theming, layout & animations
├── script.js       → All calculator logic & interactivity (vanilla JS)
└── README.md       → This file
```

---

## 🚀 Running the Project

No installation required.

1. Download / clone the four files into one folder (keep them together).
2. Double-click `index.html`, or open it via **File → Open** in your browser.
3. That's it — everything runs client-side.

*(Optional, for local development with live-reload, you can also serve the folder with any static server, e.g. `npx serve` or the VS Code "Live Server" extension — but this is not required.)*

---

## 🧮 The Math

**EMI formula (reducing balance method):**

```
EMI = P × r × (1 + r)^n / [(1 + r)^n − 1]
```

- `P` — Principal (Loan Amount − Down Payment)
- `r` — Monthly interest rate (Annual Rate ÷ 12 ÷ 100)
- `n` — Number of monthly installments (tenure in months)

When an **extra monthly payment** is entered, the calculator simulates the loan month-by-month: each month's interest is charged on the current outstanding balance, the EMI is split into principal + interest as usual, and the extra amount is applied entirely to the principal — which shortens the payoff date and reduces total interest versus the original schedule.

The **affordability indicator** compares your EMI against the monthly income you optionally provide, using a common budgeting guideline (≤30% of income = Affordable, ≤45% = Moderate, above that = Expensive). This is a simplified heuristic for educational purposes only, not financial advice.

---

## 🎨 Design Notes

The UI follows a "financial ledger / passbook" visual concept:

- A **slab-serif** display face (Zilla Slab) for headings and the big EMI figure, evoking stamped ledger totals.
- A **monospace** face (JetBrains Mono) with tabular figures for all numeric fields and the amortization table, so amounts align like a real account statement.
- The result card is styled as a **passbook stub**, complete with a perforated tear-line and a rotated "rubber stamp" affordability badge.
- A muted teal-and-brass palette in light mode, inverting to a deep teal-black in dark mode — avoiding generic “AI template” defaults (no cream/terracotta, no neon-on-black).

---

## ♿ Accessibility

- Semantic landmarks (`header`, `main`, `section`, `footer`, `nav`).
- Skip-to-content link for keyboard users.
- All form fields have associated `<label>` elements.
- Live regions (`aria-live`) announce updated results and errors to screen readers.
- Visible focus outlines on all interactive elements.
- Respects `prefers-reduced-motion` to reduce animation for users who request it.

---

## ⚠️ Disclaimer

This tool is for educational and estimation purposes only. It does not constitute financial advice, and actual figures from a bank or lender may differ due to processing fees, insurance, taxes, or lender-specific rounding rules. Always confirm final numbers with your lender.

---

## 🛠️ Built With

- HTML5
- CSS3 (custom properties, Grid, Flexbox, `color-mix()`)
- Vanilla JavaScript (ES6+, Canvas API, Web Share API, Clipboard API, Local Storage API)

No external JS libraries or CSS frameworks are used.
