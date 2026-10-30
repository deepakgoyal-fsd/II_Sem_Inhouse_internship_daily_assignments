const submitBtn = document.getElementById('submitBtn');
  const fruitsContainer = document.getElementById('fruitsContainer');

  let bananaCount = 0;
  let appleCount = 0;

  const bananaCountEl = document.getElementById('bananaCount');
  const appleCountEl = document.getElementById('appleCount');

  submitBtn.addEventListener('click', () => {
    fruitsContainer.style.display = 'flex';
    submitBtn.style.display = 'none';
  });

  document.getElementById('bananaBox').addEventListener('click', () => {
    bananaCount++;
    bananaCountEl.textContent = bananaCount;
  });

  document.getElementById('appleBox').addEventListener('click', () => {
    appleCount++;
    appleCountEl.textContent = appleCount;vs
  });