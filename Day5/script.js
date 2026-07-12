

function show(id){

let x=document.getElementById(id);

if(x.style.display=="block")
{
x.style.display="none";
}
else
{
x.style.display="block";
}

}

function searchStudent(){

let input=document.getElementById("search").value.toLowerCase();

let shyama=document.getElementById("shyama");

let charu=document.getElementById("charu");

if(input=="")
{
shyama.style.display="block";
charu.style.display="block";
}

else if(input.startsWith("s"))
{
shyama.style.display="block";
charu.style.display="none";
}

else if(input.startsWith("c"))
{
charu.style.display="block";
shyama.style.display="none";
}

else
{
shyama.style.display="none";
charu.style.display="none";
}

}

