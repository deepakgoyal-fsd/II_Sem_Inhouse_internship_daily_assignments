<?php

include "auth.php";
include "db.php";
include "header.php";

?>

<div class="card p-5">

    <h2 class="text-center mb-4">
        📝 Student Registration
    </h2>


    <form action="process.php" method="POST" enctype="multipart/form-data">


        <label>Name</label>
        <input 
        type="text" 
        name="name" 
        class="form-control mb-3"
        required>


        <label>Email</label>
        <input 
        type="email" 
        name="email" 
        class="form-control mb-3"
        required>


        <label>Phone</label>
        <input 
        type="text" 
        name="phone" 
        class="form-control mb-3"
        required>


        <label>Branch</label>
        <input 
        type="text" 
        name="branch" 
        class="form-control mb-3"
        required>


        <label>College</label>
        <input 
        type="text" 
        name="college" 
        class="form-control mb-3"
        required>


        <label>CGPA</label>
        <input 
        type="number" 
        step="0.1"
        name="cgpa" 
        class="form-control mb-3"
        required>


        <label>Gender</label>

        <select 
        name="gender" 
        class="form-control mb-3">

            <option>Male</option>
            <option>Female</option>

        </select>



        <label>Course</label>

        <select 
        name="course" 
        class="form-control mb-3">

            <option>B.Tech</option>
            <option>M.Tech</option>
            <option>BCA</option>
            <option>MCA</option>

        </select>



        <label>Address</label>

        <textarea 
        name="address"
        class="form-control mb-3">
        </textarea>



        <label>Status</label>

        <select 
        name="status" 
        class="form-control mb-3">

            <option>Active</option>
            <option>Inactive</option>

        </select>



        <label>Profile Photo</label>

        <input 
        type="file"
        name="photo"
        class="form-control mb-3">



        <button 
        class="btn btn-primary w-100">

            Add Student

        </button>


    </form>


</div>


<?php

include "footer.php";

?>