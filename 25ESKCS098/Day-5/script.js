const students = [

    {

        name:"Dhruv Singh Rajpurohit",

        roll:"25ESKCS098",

        branch:"CSE",

        cgpa:9.1

    },

    {

        name:"Rahul Sharma",

        roll:"25ESKCS045",

        branch:"IT",

        cgpa:8.6

    },

    {

        name:"Priya Mehta",

        roll:"25ESKCS072",

        branch:"ECE",

        cgpa:9.3

    },

    {

        name:"Aman Verma",

        roll:"25ESKCS081",

        branch:"Mechanical",

        cgpa:8.4

    }

];

function showStudents(){

    let output="";

    // Bonus 1
    document.getElementById("total").innerHTML =
    "Total Students : " + students.length;

    for(let i=0;i<students.length;i++){

        output += `

        <div class="col-md-3">

            <div class="card shadow">

                <div class="card-body">

                    <!-- Challenge -->

                    <h5 class="text-primary">

                        Student ${i+1}

                    </h5>

                    <h4>

                        ${students[i].name}

                    </h4>

                    <p>

                        <b>Roll Number :</b>

                        ${students[i].roll}

                    </p>

                    <p>

                        <b>Branch :</b>

                        ${students[i].branch}

                    </p>

                    <!-- Bonus 2 -->

                    <p>

                        <b>CGPA :</b>

                        <span class="badge bg-success">

                            ${students[i].cgpa}

                        </span>

                    </p>

                </div>

            </div>

        </div>

        `;

    }

    document.getElementById("students").innerHTML = output;

}