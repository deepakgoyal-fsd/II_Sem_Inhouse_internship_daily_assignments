        const form = document.getElementById('loginForm');


        form.addEventListener('submit', function(event) {

            event.preventDefault(); 


            const studentId = document.getElementById('studentId').value;

            const password = document.getElementById('password').value;


            console.log("Student ID:", studentId);

            console.log("Password:", password);

            if(studentId === ""){

                alert("Enter student id")

            }

                       if(password === ""){

                alert("Enter valid password")

            }

        });