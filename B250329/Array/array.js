// ===============================
// ARRAYS: Mission & Code Challenge
// ===============================

// 1. Favourite Movies
let movies = [
    "Avengers",
    "Interstellar",
    "KGF",
    "Pushpa",
    "Bahubali"
];

console.log("===== Favourite Movies =====");
console.log("First Movie :", movies[0]);
console.log("Last Movie  :", movies[movies.length - 1]);


// 2. Favourite Games
let games = [
    "BGMI",
    "Free Fire",
    "Minecraft",
    "GTA V",
    "Valorant"
];

console.log("\n===== Favourite Games =====");
console.log("Total Games :", games.length);


// 3. Favourite Foods
let foods = [
    "Pizza",
    "Burger",
    "Paneer",
    "Dosa",
    "Pasta"
];

let middleIndex = Math.floor(foods.length / 2);

console.log("\n===== Favourite Foods =====");
console.log("Middle Food :", foods[middleIndex]);


// Bonus (.at())
console.log("\n===== Bonus =====");
console.log("First Movie using .at():", movies.at(0));
console.log("Last Movie using .at():", movies.at(-1));


// Bonus: Print all movies
console.log("\n===== All Movies =====");
for (let i = 0; i < movies.length; i++) {
    console.log(movies[i]);
}