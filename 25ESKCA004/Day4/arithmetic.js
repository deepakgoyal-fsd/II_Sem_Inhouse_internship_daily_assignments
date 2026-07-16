<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>

<body>

<form>

    <input type="text" id="number1" placeholder="Enter first number">

    <input type="text" id="number2" placeholder="Enter second number">

    <select id="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>

    <button type="button" onclick="PerformArithmeticOperations()">
        Perform Arithmetic Operations
    </button>

</form>

<h3 id="result"></h3>

<script>

function PerformArithmeticOperations() {

    const number1 = parseFloat(document.getElementById("number1").value);
    const number2 = parseFloat(document.getElementById("number2").value);
    const operator = document.getElementById("operator").value;

    let result;

    if (operator == "+") {
        result = number1 + number2;
    }
    else if (operator == "-") {
        result = number1 - number2;
    }
    else if (operator == "*") {
        result = number1 * number2;
    }
    else if (operator == "/") {
        result = number1 / number2;
    }

    document.getElementById("result").innerHTML = "Result = " + result;
}

</script>

</body>
</html>