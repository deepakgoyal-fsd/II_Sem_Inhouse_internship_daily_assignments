
const students = [
  {
    name: "Arnav Sharma",
    roll: "101",
    branch: "electrical",
    email: "arnav.sharma@school.com",
    cgpa: "9.1",
    photo: "https://i.pravatar.cc/150?img=12"
  },
  {
    name: "ashok gahlot",
    roll: "102",
    branch: "computer science",
    email: "ashok.gahlot@school.com",
    cgpa: "8.7",
    photo: "https://www.bing.com/th/id/OSK.2beXFStSteHP9uqqYJWIDGjI6QmzSM2BfXKBWLYR4jo?w=224&h=200&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2"
  },
  {
    name: "kairav saraswal",
    roll: "103",
    branch: "mechanical",
    email: "kairav.saraswal@school.com",
    cgpa: "8.3",
    photo: "https://i.pravatar.cc/150?img=33"
  },
  {
    name: "tanuja mishra",
    roll: "104",
    branch: "civil",
    email: "tanuja.mishra@school.com",
    cgpa: "8.1",
    photo: "https://i.pravatar.cc/150?img=25"
  },
  {
    name: "prashant jain",
    roll: "105",
    branch: "electrical",
    email: "prashant.jain@school.com",
    cgpa: "8.5",
    photo: "https://i.pravatar.cc/150?img=67"

  }
];

const container = document.getElementById('studentContainer');
const noResult = document.getElementById('noResult');

function renderStudents(list) {
  container.innerHTML = "";
  if (list.length === 0) {
    noResult.style.display = "block";
    return;
  }
  noResult.style.display = "none";

  list.forEach(student => {
    const card = document.createElement('div');
    card.className = 'card';
    card.innerHTML = `
      <img src="${student.photo}" alt="${student.name}">
      <h3>${student.name}</h3>
      <p class="roll">Roll No: ${student.roll}</p>
      <p>Branch: ${student.branch}</p>
      <p>CGPA: ${student.cgpa}</p>
      <p>${student.email}</p>
    `;
    container.appendChild(card);
  });
}

function searchStudent() {
  const query = document.getElementById('searchInput').value.trim().toLowerCase();
  if (query === "") {
    renderStudents(students);
    return;
  }
  const filtered = students.filter(s =>
    s.name.toLowerCase().includes(query) || s.roll.includes(query)
  );
  renderStudents(filtered);
}

document.getElementById('searchInput').addEventListener('input', searchStudent);


renderStudents(students);
