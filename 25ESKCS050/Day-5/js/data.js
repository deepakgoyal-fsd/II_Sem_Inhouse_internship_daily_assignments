let students = JSON.parse(localStorage.getItem("students")) || [

{
    id:1,
    name:"Ethan Walker",
    department:"CSE",
    year:1,
    cgpa:9.4,
    city:"New York",
    email:"ethan.walker@gmail.com",
    phone:"+1 202-555-0101",
    skills:["HTML","CSS","JavaScript"],
    favorite:true,
    image:"https://randomuser.me/api/portraits/men/18.jpg"
},

{
    id:2,
    name:"Sophia Johnson",
    department:"IT",
    year:2,
    cgpa:8.8,
    city:"Los Angeles",
    email:"sophia.johnson@gmail.com",
    phone:"+1 202-555-0102",
    skills:["Bootstrap","React","Node.js"],
    favorite:false,
    image:"https://randomuser.me/api/portraits/women/17.jpg"
},

{
    id:3,
    name:"Noah Anderson",
    department:"ECE",
    year:3,
    cgpa:9.1,
    city:"Chicago",
    email:"noah.anderson@gmail.com",
    phone:"+1 202-555-0103",
    skills:["Python","Arduino","C++"],
    favorite:true,
    image:"https://randomuser.me/api/portraits/men/22.jpg"
},

{
    id:4,
    name:"Olivia Carter",
    department:"Civil",
    year:4,
    cgpa:8.4,
    city:"Seattle",
    email:"olivia.carter@gmail.com",
    phone:"+1 202-555-0104",
    skills:["AutoCAD","Surveying","Excel"],
    favorite:false,
    image:"https://randomuser.me/api/portraits/women/23.jpg"
},

{
    id:5,
    name:"Liam Mitchell",
    department:"Mechanical",
    year:2,
    cgpa:8.9,
    city:"Boston",
    email:"liam.mitchell@gmail.com",
    phone:"+1 202-555-0105",
    skills:["SolidWorks","MATLAB","CAD"],
    favorite:false,
    image:"https://randomuser.me/api/portraits/men/15.jpg"
},

{
    id:6,
    name:"Emma Thompson",
    department:"CSE",
    year:3,
    cgpa:9.8,
    city:"San Francisco",
    email:"emma.thompson@gmail.com",
    phone:"+1 202-555-0106",
    skills:["Java","Spring Boot","SQL"],
    favorite:true,
    image:"https://randomuser.me/api/portraits/women/15.jpg"
}

];