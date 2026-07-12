  let Students = [ {
            name : "Pulkit",
            branch : "IOT",
            rollNo : "25ESKCY047",
            marks : 83,
        },
        {
            name: "XYZ",
            branch : "CSE",
            rollNo : 11,
            marks : 80,
        }
    ]
        console.log(Students[0].branch);


    let name = prompt("Enter the name");
    let userName = "@" + name + name.length;
    console.log(userName);


let student = '{ "name" : "John", "branch" : "CS", "rollNo" : 1234, "marks" : 90 }'
console.log(JSON.parse(student));


  let Student =  {
            name : "Pulkit",
            branch : "IOT",
            rollNo : "25ESKCY047",
            marks : 83,
        }
        JSON.stringify(Student);         
        console.log(Student);

        console.log(JSON.stringify(Student));   
        
        fetch('https://jsonplaceholder.typicode.com/todos/1')
      .then(response => response.json())
      .then(json => console.log(json))