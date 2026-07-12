onst heading = document.querySelector("h1");

console.log(heading.textContent);

heading.textContent ="Registeration form";

heading.style.color ="#16FFBB";

const btn= document.querySelector("#my Btn");

btn.addEventListener("click", function(){
    let count= parseInt(btn.CDATA_SECTION_NODE.count || 0);
    count++;

})
let arr=[100,30,"Rohit",true]
arr[2]="mohit";
console.log(arr);
const arr= [10,30,50,90,11];
const arr3= arr.splice(1,3,"Rohit",19);
console.log(arr);
const user=
{
    name: "Rohit",
    age: 20,
    emailId:"negi@Gmail.com",
    amount: 3400,
    greeting: function(){
        console.log("strike is coming on 18 october");
         return 20;
    }
}

