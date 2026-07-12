function searchStudent(){

    let input = document.getElementById("search").value.toLowerCase();

    let cards = document.getElementsByClassName("student-card");

    for(let i=0;i<cards.length;i++){

        let name = cards[i].getAttribute("data-name").toLowerCase();

        if(name.includes(input)){
            cards[i].style.display="block";
        }
        else{
            cards[i].style.display="none";
        }

    }

}