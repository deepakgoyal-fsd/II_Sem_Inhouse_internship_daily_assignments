const form = document.getElementById("regForm");
const popup = document.getElementById("popup");

form.addEventListener("submit", function(e){
  e.preventDefault();

  // simple validation
  const inputs = form.querySelectorAll("input, select");
  for(let i=0;i<inputs.length;i++){
    if(inputs[i].value === "" || inputs[i].value === "Choose Event"){
      alert("Please fill all fields!");
      return;
    }
  }

  // show popup
  popup.classList.add("show");

  setTimeout(()=>{
    popup.classList.remove("show");
  },3000);

  form.reset();
});