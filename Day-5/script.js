$(document).ready(function(){

$(".nav-link").click(function(e){

e.preventDefault();

let target=$(this).attr("href");

$("html,body").animate({

scrollTop:$(target).offset().top-60

},600);

});

$(window).scroll(function(){

if($(this).scrollTop()>200){

$("#topBtn").fadeIn();

}

else{

$("#topBtn").fadeOut();

}

});

$("#topBtn").click(function(){

$("html,body").animate({

scrollTop:0

},600);

});

});
