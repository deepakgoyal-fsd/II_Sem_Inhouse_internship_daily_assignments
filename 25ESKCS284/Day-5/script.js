//----

//----FORM VALIDATION----
const form=document.querySelector(".form")
const name=document.querySelector(".name")
const id=document.querySelector(".id")
const rollNo=document.querySelector(".rollNo")
const branch=document.querySelector(".branch")
const year=document.querySelector(".year")
const section=document.querySelector(".section")
const cgpa=document.querySelector(".cgpa")
const subBtn=document.querySelector(".form-submit")
const nameError=document.querySelector(".name-error")
const idError=document.querySelector(".id-error")
const rollNoError=document.querySelector(".rollNo-error")
const branchError=document.querySelector(".branch-error")
const yearError=document.querySelector(".year-error")
const sectionError=document.querySelector(".section-error")
const cgpaError=document.querySelector(".cgpa-error")
let students = JSON.parse(localStorage.getItem("students")) || [];
form.addEventListener("submit",(e)=>{
    let isValid=true
    e.preventDefault()
    if(name.value.trim()==""){
        nameError.innerHTML="Error:Please Enter Your Name"
        isValid=false
    }
    if(id.value.trim()==""){
        idError.innerHTML="Error:Please Enter Your Id"
        isValid=false
    }
    if(rollNo.value.trim()==""){
        rollNoError.innerHTML="Error:Please Enter Your University Roll No"
        isValid=false
    }
    if(section.value.trim()==""){
        sectionError.innerHTML="Error:Please Enter Your Section"
        isValid=false
    }
    if(branch.value.trim()==""){
        branchError.innerHTML="Error:Please Enter Your Branch"
        isValid=false
    }
    if(year.value.trim()==""){
        yearError.innerHTML="Error:Please Enter Your Year"
        isValid=false
    }
    const cgpaValue = parseFloat(cgpa.value);

if (isNaN(cgpaValue)) {
    cgpaError.innerHTML = "Error: Please enter your CGPA";
    isValid = false;
}
else if (cgpaValue < 0 || cgpaValue > 10) {
    cgpaError.innerHTML = "Error: CGPA must be between 0 and 10";
    isValid = false;
}
     //----STORE STUDENTS----
    
    const student ={
        name:name.value.trim(),
        id:id.value.trim(),
        rollNo:rollNo.value.trim(),
        branch:branch.value,
        year:year.value,
        section:section.value,
        cgpa:parseFloat(cgpa.value)
        }

    

    if(isValid){
        students.push(student)
        localStorage.setItem("students", JSON.stringify(students));
    

        alert("Details Successfully Submitted")
    form.reset()
    }
    
})
name.addEventListener("input",()=>{
    nameError.innerHTML=""
})
id.addEventListener("input",()=>{
    idError.innerHTML=""
})
rollNo.addEventListener("input",()=>{
    rollNoError.innerHTML=""
})
branch.addEventListener("change",()=>{
    branchError.innerHTML=""
})
year.addEventListener("change",()=>{
yearError.innerHTML=""
})
section.addEventListener("change",()=>{
    sectionError.innerHTML=""
})
cgpa.addEventListener("input",()=>{
    cgpaError.innerHTML=""
})
rollNo.addEventListener("input",()=>{
    rollNoError.innerHTML=""
})
//----SEARCH USER-----
const searchFor=document.querySelector(".searchFor")
const searchValue=document.querySelector(".searchValue")
const searchBtn=document.querySelector(".search-btn")
searchBtn.addEventListener("click",()=>{
    studentContainer.innerHTML=""
    if(searchFor.value==""){
        alert("Pls Select For")
        return
    }
let field=searchFor.value
let value=searchValue.value.toLowerCase()
const result=students.filter(student=>
     student[field].toString().toLowerCase().includes(value)
    
)
showUser(result)
})

//----SHOW USER
const studentContainer=document.querySelector(".student-container")
function showUser(studentArray){
    studentContainer.innerHTML=""
    if(studentArray.length === 0){

        studentContainer.innerHTML = `
            <div class="no-student">
                <i class="fa-solid fa-user-xmark"></i>
                <h2>No Student Found</h2>
                <p>Try searching with another Name, ID, Roll No, Branch, Year, Section or CGPA.</p>
            </div>
        `;

        return;
    }

    studentArray.forEach(student => {
        studentContainer.innerHTML+=`
   
<div class="student-card">
    <h2>${student.name}</h2>
    <p><strong>Id:</strong>${student.id}</p>
    <p><strong>University Roll No:</strong>${student.rollNo}</p>
    <p><strong>Branch:</strong>${student.branch}</p>
     <p><strong>Year:</strong>${student.year}</p>
      <p><strong>Section:</strong>${student.section}</p>
       <p><strong>CGPA:</strong>${student.cgpa}</p>
</div>
`
 });
}
const FormContainer=document.querySelector(".form-container")

// const addBtn=document.querySelector(".addStudent")
searchBtn.addEventListener("click",()=>{
    FormContainer.style.display="none"
})
$(".addStudent").click(function () {
    $(".form-container").show();
    $(".student-container").empty();
    $(".searchFor").val("");
    $(".searchValue").val("");
});