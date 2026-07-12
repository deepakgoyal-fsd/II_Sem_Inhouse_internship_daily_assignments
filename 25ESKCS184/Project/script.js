const productName = document.getElementById("productName");
const productImage = document.getElementById("productImage");
const preview = document.getElementById("preview");
const generateBtn = document.getElementById("generateBtn");
const description = document.getElementById("description");

// Preview uploaded image

productImage.addEventListener("change", function () {

    const file = this.files[0];

    if (file) {

        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
        };

        reader.readAsDataURL(file);
    }

});

// Generate Description

generateBtn.addEventListener("click", function () {

    let name = productName.value.trim();

    if (name !== "") {

        description.innerText =
        `${name} is a premium-quality product designed to provide outstanding performance, durability, and style. It is built using high-quality materials and offers an excellent user experience, making it a reliable choice for everyday use.`;

    }

    else if (productImage.files.length > 0) {

        description.innerText =
        "AI detected a product image. This product appears to be well-designed, durable, and suitable for everyday use. Connect this project to an AI Vision API to generate an accurate description based on the uploaded image.";

    }

    else {

        alert("Please enter a product name or upload an image.");

    }

});