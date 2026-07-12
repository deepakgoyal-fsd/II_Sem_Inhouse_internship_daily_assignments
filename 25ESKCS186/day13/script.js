$(document).ready(function(){

$("#searchBtn").click(function(){
searchRecipe();
});

$("#searchInput").keypress(function(e){
if(e.which==13){
searchRecipe();
}
});

function searchRecipe(){

let query=$("#searchInput").val().trim();

if(query==""){
alert("Please enter a recipe name.");
return;
}

$("#recipeContainer").html("<h2 style='text-align:center;'>Searching...</h2>");

fetch("https://www.themealdb.com/api/json/v1/1/search.php?s="+encodeURIComponent(query))

.then(response=>response.json())

.then(data=>{

if(data.meals){

displayRecipe(data.meals[0]);

$("html,body").animate({
scrollTop:$("#recipes").offset().top-50
},700);

}
else{

searchByIngredient(query);

}

})

.catch(function(){

$("#recipeContainer").html("<h2 style='text-align:center;color:red;'>Unable to fetch recipe.</h2>");

});

}

function searchByIngredient(query){

fetch("https://www.themealdb.com/api/json/v1/1/filter.php?i="+encodeURIComponent(query))

.then(response=>response.json())

.then(data=>{

if(data.meals){

fetch("https://www.themealdb.com/api/json/v1/1/lookup.php?i="+data.meals[0].idMeal)

.then(response=>response.json())

.then(result=>{

displayRecipe(result.meals[0]);

$("html,body").animate({
scrollTop:$("#recipes").offset().top-50
},700);

});

}
else{

$("#recipeContainer").html("<h2 style='text-align:center;'>😔 No recipe found.</h2>");

$("html,body").animate({
scrollTop:$("#recipes").offset().top-50
},700);

}

})

.catch(function(){

$("#recipeContainer").html("<h2 style='text-align:center;color:red;'>Unable to fetch recipe.</h2>");

});

}

function displayRecipe(recipe){

let ingredients="";

for(let i=1;i<=20;i++){

let ingredient=recipe["strIngredient"+i];
let measure=recipe["strMeasure"+i];

if(ingredient && ingredient.trim()!=""){

ingredients+=`<li>${measure} ${ingredient}</li>`;

}

}

$("#recipeContainer").html(`

<div class="recipe-card">

<img src="${recipe.strMealThumb}" alt="${recipe.strMeal}">

<div class="recipe-content">

<h2>${recipe.strMeal}</h2>

<h4>🍽 Category: ${recipe.strCategory}</h4>

<h4>🌍 Cuisine: ${recipe.strArea}</h4>

<h3>Ingredients</h3>

<ul>
${ingredients}
</ul>

<h3>Instructions</h3>

<p>${recipe.strInstructions}</p>

</div>

</div>

`);

}

$(window).scroll(function(){

if($(this).scrollTop()>250){

$("#top").fadeIn();

}
else{

$("#top").fadeOut();

}

});

$("#top").click(function(){

$("html,body").animate({
scrollTop:0
},700);

});

$("nav a").click(function(e){

let target=$(this).attr("href");

if($(target).length){

e.preventDefault();

$("html,body").animate({
scrollTop:$(target).offset().top-50
},700);

}

});

});