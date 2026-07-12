  let Students = [ {
            name : "Sameer",
            branch : "CS",
            rollNo : "25ESKCS305",
            marks : 98,
        },
        {
            name: "abc",
            branch : "AI",
            rollNo : 18,
            marks : 88,
        }
    ]
        console.log(Students[0].branch);


    let name = prompt("Enter the name");
    let userName = "@" + name + name.length;
    console.log(userName);


let student = '{ "name" : "John", "branch" : "CS", "rollNo" : 1234, "marks" : 90 }'
console.log(JSON.parse(student));


  let Student =  {
            name : "Sameer",
            branch : "CS",
            rollNo : "25ESKCS305",
            marks : 98,
        }
        JSON.stringify(Student);             //java script object
        console.log(Student);

        console.log(JSON.stringify(Student));      //JSON string
        
        fetch('https://jsonplaceholder.typicode.com/todos/1')
      .then(response => response.json())
      .then(json => console.log(json))