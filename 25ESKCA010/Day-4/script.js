var number = 0;

function increase()
{
    number = number + 1;
    document.getElementById("count").innerHTML = number;
}

function decrease()
{
    number = number - 1;
    document.getElementById("count").innerHTML = number;
}

function reset()
{
    number = 0;
    document.getElementById("count").innerHTML = number;
}

var dark = false;

function changeMode()
{
    if(dark == false)
    {
        document.body.classList.add("dark");
        dark = true;
    }
    else
    {
        document.body.classList.remove("dark");
        dark = false;
    }
}