let classmates = [
    {
        name: "Shreya",
        branch: "CSE",
        cgpa: 8.5,
        skills: ["HTML", "CSS", "JavaScript"],
        city: "Delhi"
    },
    {
        name: "Rahul",
        branch: "IT",
        cgpa: 8.2,
        skills: ["C", "Java", "Python"],
        city: "Mumbai"
    },
    {
        name: "Priya",
        branch: "ECE",
        cgpa: 9.0,
        skills: ["C++", "HTML", "SQL"],
        city: "Pune"
    }
];

// Convert array to JSON
let jsonArray = JSON.stringify(classmates, null, 2);

console.log("JSON Array:");
console.log(jsonArray);

// Convert back to object
let parsedArray = JSON.parse(jsonArray);

console.log("Parsed Array:");
console.log(parsedArray);