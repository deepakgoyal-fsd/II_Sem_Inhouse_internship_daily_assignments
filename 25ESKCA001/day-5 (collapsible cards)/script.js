function showStudent(number)
{

    if(number == 1)
    {
        document.getElementById("studentName").innerHTML = "Rahul Sharma";
        document.getElementById("studentAge").innerHTML = "Age : 20";
        document.getElementById("studentCourse").innerHTML = "Course : BCA";
        document.getElementById("studentEmail").innerHTML = "Email : rahul@gmail.com";
        document.getElementById("studentCity").innerHTML = "City : Jaipur";
    }

    if(number == 2)
    {
        document.getElementById("studentName").innerHTML = "Priya Verma";
        document.getElementById("studentAge").innerHTML = "Age : 19";
        document.getElementById("studentCourse").innerHTML = "Course : B.Tech";
        document.getElementById("studentEmail").innerHTML = "Email : priya@gmail.com";
        document.getElementById("studentCity").innerHTML = "City : Delhi";
    }

    if(number == 3)
    {
        document.getElementById("studentName").innerHTML = "Aman Singh";
        document.getElementById("studentAge").innerHTML = "Age : 21";
        document.getElementById("studentCourse").innerHTML = "Course : B.Com";
        document.getElementById("studentEmail").innerHTML = "Email : aman@gmail.com";
        document.getElementById("studentCity").innerHTML = "City : Mumbai";
    }

    if(number == 4)
    {
        document.getElementById("studentName").innerHTML = "Neha Gupta";
        document.getElementById("studentAge").innerHTML = "Age : 22";
        document.getElementById("studentCourse").innerHTML = "Course : MBA";
        document.getElementById("studentEmail").innerHTML = "Email : neha@gmail.com";
        document.getElementById("studentCity").innerHTML = "City : Pune";
    }

}