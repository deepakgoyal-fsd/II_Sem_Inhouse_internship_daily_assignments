fetch('https://jsonplaceholder.typicode.com/todos/2')
    .then(response => response.json())
    .then(data => console.log(data));

const text = "   Welcome To CodeSphere Academy   ";

const lowercase = text.toLowerCase();
const trim = text.trim();

console.log(lowercase);
console.log(trim);