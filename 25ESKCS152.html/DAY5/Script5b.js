// Student Array

let students = [

{
    name:"Ishika Gupta",
    branch:"Computer Science",
    cgpa:9.3
},

{
    name:"Ishan Jain",
    branch:"Computer Science",
    cgpa:8.6
},

{
     name:"Jahnvi Jain",
    branch:"Computer Science",
    cgpa:9.7
},

{
     name:"Ishita Agarwal",
    branch:"Computer Science",
    cgpa:7.0
},

{
    name:"Kaavya Rai",
    branch:"Computer Science",
    cgpa:6.2
}

];


// Total Students

document.getElementById("totalStudents").innerHTML = students.length;


// HTML Variable

let cards = "";


// Loop

for(let i=0;i<students.length;i++)
{

    let cardColor;

    if(i%2==0)
    {
        cardColor="bg-even";
    }

    else
    {
        cardColor="bg-odd";
    }


    let badgeColor;

    if(students[i].cgpa>8)
    {
        badgeColor="bg-success";
    }

    else
    {
        badgeColor="bg-danger";
    }


cards += `

<div class="col-md-4 mb-4">

<div class="card ${cardColor}">

<div class="card-body">

<h4 class="card-title">

Student ${i+1}

<span class="badge bg-dark float-end">

#${i+1}

</span>

</h4>

<hr>

<h5>${students[i].name}</h5>

<button class="btn btn-primary btn-details mt-3">

Show Details

</button>

<div class="details">

<p>

<strong>Branch :</strong>

${students[i].branch}

</p>

<p>

<strong>CGPA :</strong>

<span class="badge ${badgeColor}">

${students[i].cgpa}

</span>

</p>

</div>

</div>

</div>

</div>

`;

}


// Inject Cards

document.getElementById("studentCards").innerHTML = cards;



// jQuery

$(document).ready(function(){


    // Fade In

    $(".container").hide().fadeIn(1200);



    // Show Hide Details

    $(".btn-details").click(function(){


        $(this)

        .closest(".card")

        .find(".details")

        .slideToggle(500);



        if($(this).text()=="Show Details")
        {

            $(this).text("Hide Details");

            $(this).removeClass("btn-primary");

            $(this).addClass("btn-danger");

        }

        else
        {

            $(this).text("Show Details");

            $(this).removeClass("btn-danger");

            $(this).addClass("btn-primary");

        }

    });


});