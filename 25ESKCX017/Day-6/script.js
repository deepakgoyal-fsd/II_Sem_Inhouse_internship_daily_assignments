const students = [
{
    name:"Avani Sharma",
    roll:"25ESKCX017",
    branch:"Computer Science",
    semester:"III",
    cgpa:"8.54",
    attendance:"92%",
    email:"avani.sharma@college.edu",
    phone:"+91 9876543210",
    address:"Jaipur, Rajasthan",
    image:"https://i.pravatar.cc/150?img=1"
},

{
    name:"Rahul Verma",
    roll:"25ESIT018",
    branch:"Information Technology",
    semester:"III",
    cgpa:"8.80",
    attendance:"90%",
    email:"rahul.verma@college.edu",
    phone:"+91 9876543211",
    address:"Delhi",
    image:"https://i.pravatar.cc/150?img=2"
},

{
    name:"Aditi Singh",
    roll:"25AIML011",
    branch:"AI & ML",
    semester:"III",
    cgpa:"9.10",
    attendance:"95%",
    email:"aditi.singh@college.edu",
    phone:"+91 9876543212",
    address:"Lucknow",
    image:"https://i.pravatar.cc/150?img=3"
},

{
    name:"Rohan Patel",
    roll:"25ECE021",
    branch:"Electronics",
    semester:"III",
    cgpa:"8.30",
    attendance:"88%",
    email:"rohan.patel@college.edu",
    phone:"+91 9876543213",
    address:"Ahmedabad",
    image:"https://i.pravatar.cc/150?img=4"
},

{
    name:"Priya Mehta",
    roll:"25CSE029",
    branch:"Computer Science",
    semester:"III",
    cgpa:"9.21",
    attendance:"98%",
    email:"priya.mehta@college.edu",
    phone:"+91 9876543214",
    address:"Mumbai",
    image:"https://i.pravatar.cc/150?img=5"
},

{
    name:"Kunal Sharma",
    roll:"25ME010",
    branch:"Mechanical",
    semester:"III",
    cgpa:"8.01",
    attendance:"87%",
    email:"kunal.sharma@college.edu",
    phone:"+91 9876543215",
    address:"Kota",
    image:"https://i.pravatar.cc/150?img=6"
},

{
    name:"Sneha Agarwal",
    roll:"25CE008",
    branch:"Civil",
    semester:"III",
    cgpa:"8.78",
    attendance:"91%",
    email:"sneha.agarwal@college.edu",
    phone:"+91 9876543216",
    address:"Indore",
    image:"https://i.pravatar.cc/150?img=7"
},

{
    name:"Aditya Joshi",
    roll:"25DS014",
    branch:"Data Science",
    semester:"III",
    cgpa:"8.92",
    attendance:"94%",
    email:"aditya.joshi@college.edu",
    phone:"+91 9876543217",
    address:"Pune",
    image:"https://i.pravatar.cc/150?img=8"
}
];

function showStudent(id){

    let s = students[id-1];

    document.getElementById("studentImage").src = s.image;
    document.getElementById("studentName").innerHTML = s.name;
    document.getElementById("studentRoll").innerHTML = s.roll;
    document.getElementById("studentBranch").innerHTML = s.branch;
    document.getElementById("studentSemester").innerHTML = s.semester;
    document.getElementById("studentCgpa").innerHTML = s.cgpa;
    document.getElementById("studentAttendance").innerHTML = s.attendance;
    document.getElementById("studentEmail").innerHTML = s.email;
    document.getElementById("studentPhone").innerHTML = s.phone;
    document.getElementById("studentAddress").innerHTML = s.address;

    document.getElementById("modal").style.display="flex";
}

function closeModal(){

    document.getElementById("modal").style.display="none";

}