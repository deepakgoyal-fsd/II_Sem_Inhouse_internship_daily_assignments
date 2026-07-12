
function loadUsers() {
    
   
    $('#user-container').html('<div class="alert alert-info">Loading users...</div>');

   
    fetch('https://jsonplaceholder.typicode.com/users')
        .then(res => res.json()) // Parse the raw HTTP response into a JS object
        .then(data => {
            
           
            let htmlOutput = `<h4 class="mb-4 text-primary">Showing ${data.length} users</h4>`;
            
           
            htmlOutput += `<div class="row">`; 

            
            data.forEach(user => {
              
                htmlOutput += `
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">${user.name}</h5>
                                <p class="card-text"><strong>Email:</strong> ${user.email}</p>
                                <p class="card-text text-muted"><strong>Company:</strong> ${user.company.name}</p>
                            </div>
                        </div>
                    </div>
                `;
            });
            
           
            htmlOutput += `</div>`; 

            // Inject the fully built HTML string into the #user-container on the page
            $('#user-container').html(htmlOutput);
        })
        .catch(err => {
            
          
            $('#user-container').html(`
                <div class="alert alert-danger">
                    Unable to load users. Please try again.
                    <br><br>
                    <button class="btn btn-danger" onclick="loadUsers()">Retry</button>
                </div>
            `);
        });
}


loadUsers();
$('#student-form').on('submit', function(e) {
    e.preventDefault(); // Prevents the page from refreshing on submit

  
    const newStudent = {
        name: $('#name').val(),
        email: $('#email').val()
    };

    
    fetch('https://jsonplaceholder.typicode.com/users', {
        method: 'POST',
        body: JSON.stringify(newStudent), 
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    })
    .then(response => response.json())
    .then(json => {
        alert("Success! The API received: " + JSON.stringify(json));
        console.log(json);
    });
});