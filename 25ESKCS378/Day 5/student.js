 const btn = document.getElementById("darkModeBtn");

  btn.addEventListener("click",() => {
    document.body.classList.toggle("dark-mode");

    if(document.body.classList.contains("dark-mode")){
      btn.textContent ="Light";
    }else{
      btn.textContent ="Dark";
    }
  });

$(document).ready(function () {

  $(".directory-container").hide().fadeIn(800);

  $(".btn-details").click(function () {
    var $btn = $(this);
    var $details = $btn.closest(".card").find(".details");

    $details.slideToggle(300, function () {
      if ($details.is(":visible")) {
        $btn.text("Hide Details").addClass("active");
      } else {
        $btn.text("Show Details").removeClass("active");
      }
    });
  });

});