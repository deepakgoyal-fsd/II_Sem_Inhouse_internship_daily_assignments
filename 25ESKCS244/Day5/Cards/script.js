$(document).ready(function(){

$("body").hide().fadeIn(1500);

$(".btn-details").click(function(){

$(this)
.closest(".card")
.find(".details")
.slideToggle(600);

$(this).toggleClass("active");

if($(this).text()=="Show Details")
{
$(this).text("Hide Details");
}
else
{
$(this).text("Show Details");
}

});

});