<?php


    /* include '../connection.php';

    if(isset($_POST['generate']))
    {

        $date = date_default_timezone_set('Asia/Tokyo'); 
        $currentDateTime = date('F j, Y - g:i:A');

        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);

        $insert = 'Generated Barangay Clearance with name of '.$firstname ." " .$lastname;
        
        $query1 = "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('Admin', '$insert', '$currentDateTime')";
        $query_run = mysqli_query($con, $query1);

        if($query_run)
        {
            header("Location: barangay_clearance.php");
            exit(0);
        }

    } */

?>