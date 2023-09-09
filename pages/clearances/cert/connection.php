<?php 

    $host = "localhost";
    $username = "root";
    $password ="admin";
    $database = "barangay_system_db";
    
    $con = new mysqli($host, $username, $password, $database);

    if (!$con) {
        die(mysqli_error($con));
    }
    
    /* if ($con) {
        echo "connected";
    } else {
        die(mysqli_error($con));
    } */
?>

