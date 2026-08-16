<?php

/*======================================================
        EMAIL VALIDATOR PRO
        DELETE HISTORY
======================================================*/


include "config.php";


// Check if ID is received

if(isset($_GET["id"])){

    $id = $_GET["id"];


    // Delete record

    $sql = "DELETE FROM history WHERE id=?";


    $stmt = $conn->prepare($sql);


    $stmt->bind_param("i",$id);



    if($stmt->execute()){


        header("Location: history.php");


        exit;


    }


    else{


        echo "Delete Failed";


    }



}


else{


    echo "No ID Found";


}



?>