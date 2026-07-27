let endDate = new Date().getTime() + (4*24*60*60*1000);

setInterval(function(){
    let now = new Date().getTime();
    let diff = endDate - now;

    let days = Math.floor(diff/(1000*60*60*24));
    let hours = Math.floor((diff%(1000*60*60*24))/(1000*60*60));
    let mins = Math.floor((diff%(1000*60*60))/(1000*60));
    let secs = Math.floor((diff%(1000*60))/1000);

    document.getElementById("timer").innerHTML =
    "⏳ Registration ends in: " + days+"d "+hours+"h "+mins+"m "+secs+"s";

},1000);


function submitForm(){
    document.getElementById("dance").style.display="block";
}
