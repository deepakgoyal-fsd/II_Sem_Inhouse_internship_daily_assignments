// =========================================
// STUDENT DATA
// =========================================

let students = [

{
    id:1,
    name:"Yashwini Yadav",
    roll:"25ESKCS379",
    branch:"Computer Science",
    year:"Second Year",
    cgpa:9.2,
    email:"yashwini@gmail.com",
    phone:"9876543210",
    image:"images/Student1.png",
    status:"Online",
    favorite:false
},

{
    id:2,
    name:"Vanshika Rajawat",
    roll:"25ESKCS361",
    branch:"Computer Science",
    year:"Second Year",
    cgpa:8,
    email:"vanshika@gmail.com",
    phone:"9876543211",
    image:"images/Student2.png",
    status:"Offline",
    favorite:false
},

{
    id:3,
    name:"Vinni Chaudhary",
    roll:"25ESKCS368",
    branch:"Computer Science",
    year:"Second Year",
    cgpa:8,
    email:"vinni@gmail.com",
    phone:"9876543212",
    image:"images/Student3.png",
    status:"Online",
    favorite:true
},

{
    id:4,
    name:"Soniya Ambesh",
    roll:"25ESKCS331",
    branch:"Computer Science",
    year:"Second Year",
    cgpa:8.3,
    email:"soniya@gmail.com",
    phone:"9876543213",
    image:"images/Student4.png",
    status:"Offline",
    favorite:false
},

{
    id:5,
    name:"Anil Yadav",
    roll:"23CAR119",
    branch:"Cardiology",
    year:"First Year",
    cgpa:9.8,
    email:"anil@gmail.com",
    phone:"9876543214",
    image:"images/Student5.png",
    status:"Online",
    favorite:false
},

{
    id:6,
    name:"Aryan Kumawat",
    roll:"23NEU120",
    branch:"Neurology",
    year:"Third Year",
    cgpa:9.7,
    email:"aryan@gmail.com",
    phone:"9876543215",
    image:"images/Student6.png",
    status:"Online",
    favorite:false
},

{
    id:7,
    name:"Hitesh Nasana",
    roll:"23AI0071",
    branch:"Artificial Intelligence",
    year:"Third Year",
    cgpa:9.6,
    email:"hitesh@gmail.com",
    phone:"9876543216",
    image:"images/Student7.png",
    status:"Offline",
    favorite:true
},

{
    id:8,
    name:"Kanishka singh",
    roll:"23CV1201",
    branch:"Civil",
    year:"Second Year",
    cgpa:8.5,
    email:"kanishka@gmail.com",
    phone:"9876543217",
    image:"images/Student8.png",
    status:"Online",
    favorite:false
},

{
    id:9,
    name:"Purvesh Yadav",
    roll:"23CS334",
    branch:"Computer Science",
    year:"Fourth Year",
    cgpa:9.9,
    email:"purvesh@gmail.com",
    phone:"9876543218",
    image:"images/Student9.png",
    status:"Online",
    favorite:false
},

{
    id:10,
    name:"Anjali Yadav",
    roll:"23IT0101",
    branch:"Information Technology",
    year:"Third Year",
    cgpa:8.9,
    email:"anjali@gmail.com",
    phone:"9876543219",
    image:"images/Student10.png",
    status:"Offline",
    favorite:false
}

];

// =========================================
// DOM ELEMENTS
// =========================================

const studentContainer = document.getElementById("studentContainer");

const searchBox = document.getElementById("searchBox");

const totalStudents = document.getElementById("totalStudents");

const onlineStudents = document.getElementById("onlineStudents");

const favoriteStudents = document.getElementById("favoriteStudents");

const searchCount = document.getElementById("searchCount");

// =========================================
// DISPLAY STUDENTS
// =========================================

function displayStudents(studentArray){

    studentContainer.innerHTML="";

    studentArray.forEach(student=>{

        studentContainer.innerHTML += `

        <div class="student">

            <img src="${student.image}" alt="${student.name}">

            <h2>${student.name}</h2>

            <div class="branch">
                ${student.branch}
            </div>

            <div class="status ${student.status.toLowerCase()}">
                ${student.status}
            </div>

            <div class="cardButtons">

                <button
                    class="showBtn"
                    onclick="toggleDetails(${student.id})">

                    Show Details

                </button>

                <button
                <button
    class="favoriteBtn"
    onclick="toggleFavorite(${student.id})">

    ${student.favorite ? "⭐" : "☆"}

</button>
                   
    <button
        class="editBtn"
        onclick="editStudent(${student.id})">

        Edit

    </button>

    <button
        class="deleteBtn"
        onclick="deleteStudent(${student.id})">

        Delete

    </button>

</div>

            <div
                class="details"
                id="details-${student.id}">

                <p><b>Roll No:</b> ${student.roll}</p>

                <p><b>Year:</b> ${student.year}</p>

                <p><b>CGPA:</b> ${student.cgpa}</p>

                <p><b>Email:</b> ${student.email}</p>

                <p><b>Phone:</b> ${student.phone}</p>

            </div>

        </div>

        `;

    });

}
// =========================================
// UPDATE DASHBOARD
// =========================================

function updateDashboard(studentArray){

    totalStudents.textContent = students.length;

    let online = students.filter(student =>
        student.status === "Online"
    ).length;

    onlineStudents.textContent = online;

    let favorite = students.filter(student =>
        student.favorite
    ).length;

    favoriteStudents.textContent = favorite;

    searchCount.textContent = studentArray.length;

}


// =========================================
// SHOW / HIDE DETAILS
// =========================================

function toggleDetails(id){

    const details = document.getElementById("details-" + id);

    const button = details.previousElementSibling.querySelector(".showBtn");

    if(details.style.display === "block"){

        details.style.display = "none";

        button.innerHTML = "Show Details";

    }

    else{

        details.style.display = "block";

        button.innerHTML = "Hide Details";

    }

}


// =========================================
// LIVE SEARCH
// =========================================

searchBox.addEventListener("keyup",function(){

    const search = this.value.toLowerCase();

    const filteredStudents = students.filter(student =>

        student.name.toLowerCase().includes(search)

        ||

        student.roll.toLowerCase().includes(search)

        ||

        student.branch.toLowerCase().includes(search)

        ||

        student.year.toLowerCase().includes(search)

        ||

        student.email.toLowerCase().includes(search)

        ||

        student.phone.includes(search)

    );

    if(filteredStudents.length===0){

        studentContainer.innerHTML=`

        <div class="notFound">

            <h2>No Student Found</h2>

            <p>Try searching with another keyword.</p>

        </div>

        `;

    }

    else{

        displayStudents(filteredStudents);

    }

    updateDashboard(filteredStudents);

});


// =========================================
// INITIAL PAGE LOAD
// =========================================

displayStudents(students);

updateDashboard(students);


// =========================================
// LOADER
// =========================================

window.addEventListener("load",function(){

    setTimeout(function(){

        document.getElementById("loader").style.display="none";

    },1000);

});
// =========================================
// TOGGLE FAVORITE
// =========================================

function toggleFavorite(id){

    const student = students.find(s => s.id === id);

    student.favorite = !student.favorite;

    displayStudents(students);

    updateDashboard(students);

}


// =========================================
// DARK MODE
// =========================================

const themeBtn = document.getElementById("themeBtn");

if(localStorage.getItem("theme") === "dark"){

    document.body.classList.add("dark");

    themeBtn.innerHTML = "☀️ Light Mode";

}

themeBtn.addEventListener("click", function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){

        themeBtn.innerHTML = "☀️ Light Mode";

        localStorage.setItem("theme","dark");

    }

    else{

        themeBtn.innerHTML = "🌙 Dark Mode";

        localStorage.setItem("theme","light");

    }

});


// =========================================
// BRANCH FILTER
// =========================================

const branchFilter = document.getElementById("branchFilter");

branchFilter.addEventListener("change", filterStudents);


// =========================================
// YEAR FILTER
// =========================================

const yearFilter = document.getElementById("yearFilter");

yearFilter.addEventListener("change", filterStudents);


// =========================================
// SORT
// =========================================

const sortStudents = document.getElementById("sortStudents");

sortStudents.addEventListener("change", filterStudents);


// =========================================
// FILTER FUNCTION
// =========================================

function filterStudents(){

    let result = [...students];

    if(branchFilter.value !== "All"){

        result = result.filter(student =>

            student.branch === branchFilter.value

        );

    }

    if(yearFilter.value !== "All"){

        result = result.filter(student =>

            student.year === yearFilter.value

        );

    }

    if(sortStudents.value === "name"){

        result.sort((a,b)=>

            a.name.localeCompare(b.name)

        );

    }

    if(sortStudents.value === "roll"){

        result.sort((a,b)=>

            a.roll.localeCompare(b.roll)

        );

    }

    if(sortStudents.value === "cgpa"){

        result.sort((a,b)=>

            b.cgpa - a.cgpa

        );

    }

    displayStudents(result);

    updateDashboard(result);

}
// =========================================
// MODAL ELEMENTS
// =========================================

const modal = document.getElementById("studentModal");

const addStudentBtn = document.getElementById("addStudentBtn");

const closeBtn = document.querySelector(".close");

const studentForm = document.getElementById("studentForm");

const toast = document.getElementById("toast");

// =========================================
// OPEN MODAL
// =========================================

addStudentBtn.addEventListener("click", function(){

    modal.style.display = "flex";

});

// =========================================
// CLOSE MODAL
// =========================================

closeBtn.addEventListener("click", function(){

    modal.style.display = "none";

});

window.addEventListener("click", function(event){

    if(event.target == modal){

        modal.style.display = "none";

    }

});

// =========================================
// SHOW TOAST
// =========================================

function showToast(message){

    toast.innerHTML = message;

    toast.classList.add("show");

    setTimeout(function(){

        toast.classList.remove("show");

    },3000);

}

// =========================================
// ADD STUDENT
// =========================================

studentForm.addEventListener("submit", function(e){

    e.preventDefault();

    const name = document.getElementById("name").value.trim();

    const roll = document.getElementById("roll").value.trim();

    const branch = document.getElementById("branch").value.trim();

    const year = document.getElementById("year").value.trim();

    const cgpa = document.getElementById("cgpa").value.trim();

    const email = document.getElementById("email").value.trim();

    const phone = document.getElementById("phone").value.trim();

    const image = document.getElementById("image").value.trim();

    // ===============================
    // VALIDATION
    // ===============================

    if(
        name==="" ||
        roll==="" ||
        branch==="" ||
        year==="" ||
        cgpa==="" ||
        email==="" ||
        phone===""

    ){

        alert("Please fill all fields.");

        return;

    }

    // ===============================
    // CREATE STUDENT OBJECT
    // ===============================

    const student = {

        id: Date.now(),

        name:name,

        roll:roll,

        branch:branch,

        year:year,

        cgpa:Number(cgpa),

        email:email,

        phone:phone,

        image: image===""
            ? "https://randomuser.me/api/portraits/lego/1.jpg"
            : image,

        status:"Online",

        favorite:false

    };

    // ===============================
    // ADD INTO ARRAY
    // ===============================

    students.push(student);

    // ===============================
    // REFRESH PAGE
    // ===============================

    displayStudents(students);

    updateDashboard(students);

    // ===============================
    // RESET FORM
    // ===============================

    studentForm.reset();

    modal.style.display = "none";

    showToast("✅ Student Added Successfully!");

});
// =========================================
// SAVE TO LOCAL STORAGE
// =========================================

function saveStudents(){

    localStorage.setItem(
        "students",
        JSON.stringify(students)
    );

}

// =========================================
// LOAD FROM LOCAL STORAGE
// =========================================

const savedStudents = localStorage.getItem("students");

if(savedStudents){

    students = JSON.parse(savedStudents);

}

// =========================================
// DELETE STUDENT
// =========================================

function deleteStudent(id){

    const confirmDelete = confirm(
        "Delete this student?"
    );

    if(!confirmDelete){

        return;

    }

    students = students.filter(student=>student.id!==id);

    saveStudents();

    displayStudents(students);

    updateDashboard(students);

    showToast("🗑 Student Deleted");

}

// =========================================
// EDIT STUDENT
// =========================================

function editStudent(id){

    const student = students.find(
        student=>student.id===id
    );

    document.getElementById("name").value = student.name;
    document.getElementById("roll").value = student.roll;
    document.getElementById("branch").value = student.branch;
    document.getElementById("year").value = student.year;
    document.getElementById("cgpa").value = student.cgpa;
    document.getElementById("email").value = student.email;
    document.getElementById("phone").value = student.phone;
    document.getElementById("image").value = student.image;

    modal.style.display="flex";

    deleteStudent(id);

}

// =========================================
// SAVE WHEN ADDING STUDENT
// =========================================

const oldSubmit = studentForm.onsubmit;

studentForm.addEventListener("submit",function(){

    saveStudents();

});

// =========================================
// PAGE LOAD
// =========================================

displayStudents(students);

updateDashboard(students);

saveStudents();