const startScreen = document.getElementById('startScreen');
const gameArea = document.getElementById('gameArea');
const startBtn = document.getElementById('startBtn');
const playerNameInput = document.getElementById('playerName');
const playerLabel = document.getElementById('playerLabel');
const scoreLabel = document.getElementById('scoreLabel');
const timeLabel = document.getElementById('timeLabel');
const board = document.getElementById('board');

let score = 0;
let timeLeft = 30;
let timer;

function randomPosition() {
  const boardRect = board.getBoundingClientRect();
  const size = 70;
  const x = Math.random() * (boardRect.width - size);
  const y = Math.random() * (boardRect.height - size);
  return { x, y };
}

function placeFruit(fruitEl) {
  const pos = randomPosition();
  fruitEl.style.left = `${pos.x}px`;
  fruitEl.style.top = `${pos.y}px`;
}

function createFruit(type) {
  const fruitEl = document.createElement('div');
  fruitEl.className = `fruit ${type}`;
  fruitEl.textContent = type === 'apple' ? '🍎' : '🍌';
  fruitEl.addEventListener('click', () => {
    score += 1;
    scoreLabel.textContent = score;
    placeFruit(fruitEl);
  });
  board.appendChild(fruitEl);
  placeFruit(fruitEl);
}

function startGame() {
  const name = playerNameInput.value.trim();
  if (!name) {
    alert('Please enter your name first!');
    return;
  }

  playerLabel.textContent = name;
  score = 0;
  scoreLabel.textContent = score;
  timeLeft = 30;
  timeLabel.textContent = timeLeft;
  board.innerHTML = '';

  startScreen.classList.add('hidden');
  gameArea.classList.remove('hidden');

  createFruit('apple');
  createFruit('banana');

  clearInterval(timer);
  timer = setInterval(() => {
    timeLeft -= 1;
    timeLabel.textContent = timeLeft;
    if (timeLeft <= 0) {
      clearInterval(timer);
      alert(`Time's up, ${name}! Your score is ${score}.`);
      gameArea.classList.add('hidden');
      startScreen.classList.remove('hidden');
      playerNameInput.value = '';
    }
  }, 1000);
}

startBtn.addEventListener('click', startGame);
playerNameInput.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') startGame();
});
