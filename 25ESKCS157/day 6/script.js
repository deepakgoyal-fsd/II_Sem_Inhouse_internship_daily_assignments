const userRow = document.getElementById("userRow");
const loadingText = document.getElementById("loadingText");

fetch("https://jsonplaceholder.typicode.com/users")
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        // Hide the loading text message since data has arrived
        loadingText.classList.add("d-none");

        // Loop through the array of live users sent by the server
        for (let i = 0; i < data.length; i++) {
            let user = data[i];

            // Template structure using the user object properties
            let cardTemplate = `
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">${user.name}</h5>
                            <p class="card-text mb-1"><strong>Email:</strong> ${user.email}</p>
                            <p class="card-text mb-1"><strong>Company:</strong> ${user.company.name}</p>
                            <p class="card-text text-muted small">City: ${user.address.city}</p>
                        </div>
                    </div>
                </div>
            `;

            // Append the new card layout string to our grid display row
            userRow.innerHTML = userRow.innerHTML + cardTemplate;
        }
    });