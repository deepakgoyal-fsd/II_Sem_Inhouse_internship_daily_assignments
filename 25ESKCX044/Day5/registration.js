/* =====================================================================
   PREVAH 2026 — REGISTRATION PAGE SCRIPT
   Handles: Bootstrap-style validation, phone/email checks,
   file upload validation, localStorage saving, success modal.
   ===================================================================== */

document.addEventListener("DOMContentLoaded", () => {

  const form = document.getElementById("registrationForm");
  const successModalEl = document.getElementById("successModal");
  const successModal = new bootstrap.Modal(successModalEl);
  const regIdDisplay = document.getElementById("regIdDisplay");

  const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2MB

  /* ---------- Helper: phone validation (Indian 10-digit) ---------- */
  function isValidPhone(value) {
    return /^[6-9]\d{9}$/.test(value.trim());
  }

  /* ---------- Helper: email validation ---------- */
  function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value.trim());
  }

  /* ---------- Helper: file validation ---------- */
  function isValidFile(fileInput, allowedTypesRegex) {
    if (!fileInput.files || fileInput.files.length === 0) return false;
    const file = fileInput.files[0];
    if (file.size > MAX_FILE_SIZE) return false;
    if (allowedTypesRegex && !allowedTypesRegex.test(file.type)) return false;
    return true;
  }

  /* ---------- Generate a simple unique Registration ID ---------- */
  function generateRegId() {
    const timestamp = Date.now().toString().slice(-6);
    return `PREVAH-${timestamp}`;
  }

  /* ---------- Live validation feedback as user types ---------- */
  const phoneInput = document.getElementById("phone");
  const emergencyInput = document.getElementById("emergencyContact");
  const emailInput = document.getElementById("email");

  [phoneInput, emergencyInput].forEach((input) => {
    input.addEventListener("input", () => {
      input.value = input.value.replace(/\D/g, "").slice(0, 10);
    });
  });

  /* ---------- Form submit handler ---------- */
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    e.stopPropagation();

    let isValid = true;

    // Reset previous validation state
    form.querySelectorAll(".is-invalid").forEach((el) => el.classList.remove("is-invalid"));

    // Run Bootstrap's native required-field checks first
    if (!form.checkValidity()) {
      isValid = false;
    }

    // Custom check: phone number
    if (!isValidPhone(phoneInput.value)) {
      phoneInput.classList.add("is-invalid");
      isValid = false;
    }

    // Custom check: emergency contact
    if (!isValidPhone(emergencyInput.value)) {
      emergencyInput.classList.add("is-invalid");
      isValid = false;
    }

    // Custom check: email
    if (!isValidEmail(emailInput.value)) {
      emailInput.classList.add("is-invalid");
      isValid = false;
    }

    // Custom check: student ID file
    const studentIdInput = document.getElementById("studentId");
    if (!isValidFile(studentIdInput, /image\/.*|application\/pdf/)) {
      studentIdInput.classList.add("is-invalid");
      isValid = false;
    }

    // Custom check: payment screenshot file
    const paymentInput = document.getElementById("paymentScreenshot");
    if (!isValidFile(paymentInput, /image\/.*/)) {
      paymentInput.classList.add("is-invalid");
      isValid = false;
    }

    // Mark all fields so Bootstrap's :invalid styling shows correctly
    form.classList.add("was-validated");

    if (!isValid) {
      window.showToast("Please fix the highlighted fields before submitting.", "error");
      // Scroll to the first invalid field
      const firstInvalid = form.querySelector(".is-invalid, :invalid");
      if (firstInvalid) firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
      return;
    }

    /* ---------- Build the registration record ---------- */
    const regId = generateRegId();

    const registration = {
      id: regId,
      fullName: document.getElementById("fullName").value.trim(),
      gender: document.getElementById("gender").value,
      phone: phoneInput.value.trim(),
      email: emailInput.value.trim(),
      city: document.getElementById("city").value.trim(),
      state: document.getElementById("state").value.trim(),
      emergencyContact: emergencyInput.value.trim(),
      collegeName: document.getElementById("collegeName").value.trim(),
      rollNumber: document.getElementById("rollNumber").value.trim(),
      branch: document.getElementById("branch").value.trim(),
      year: document.getElementById("year").value,
      event: document.getElementById("chooseEvent").value,
      teamName: document.getElementById("teamName").value.trim(),
      numMembers: document.getElementById("numMembers").value,
      // Note: only file metadata is stored (name/size) — actual files are
      // NOT stored in localStorage because it has a small (~5MB) quota.
      studentIdFile: studentIdInput.files[0] ? studentIdInput.files[0].name : "",
      paymentScreenshotFile: paymentInput.files[0] ? paymentInput.files[0].name : "",
      medicalCondition: document.getElementById("medicalCondition").value.trim(),
      comments: document.getElementById("comments").value.trim(),
      submittedAt: new Date().toISOString(),
    };

    /* ---------- Save to localStorage ---------- */
    try {
      const existing = JSON.parse(localStorage.getItem("prevahRegistrations")) || [];
      existing.push(registration);
      localStorage.setItem("prevahRegistrations", JSON.stringify(existing));
    } catch (err) {
      console.error("Could not save registration:", err);
      window.showToast("Something went wrong while saving your registration.", "error");
      return;
    }

    /* ---------- Show success modal ---------- */
    regIdDisplay.textContent = regId;
    successModal.show();
    window.showToast("Registration submitted successfully!", "success");

    // Reset form after successful submission
    form.reset();
    form.classList.remove("was-validated");
  });

  /* ---------- Reset button also clears validation styling ---------- */
  document.getElementById("resetFormBtn").addEventListener("click", () => {
    form.classList.remove("was-validated");
    form.querySelectorAll(".is-invalid").forEach((el) => el.classList.remove("is-invalid"));
  });

});