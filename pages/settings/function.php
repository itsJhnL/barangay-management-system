<?php 

  include '../connection.php';

  if(isset($_POST['update_bio']))
  {
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $about = mysqli_real_escape_string($con, $_POST['about']);

      $query_run = mysqli_query($con, "UPDATE `dashboard` SET `about` = '$about'");

      if($query_run)
      {
          //$_SESSION['messageCreate'] = " Created Successfully";
          header("Location: maintenance.php");
          exit(0);
      
      }

  }

  if(isset($_POST['update_User']))
  {
    $user_id = mysqli_real_escape_string($con, $_POST['id']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query_run = mysqli_query($con, "UPDATE `tblstaff` SET `username` = '$username', `password` = '$password' WHERE `id` = '$user_id' ");

    if($query_run)
    {
        header("Location: userAccount.php");
        exit(0);
    }
  }

  if(isset($_POST['update_admin']))
  {
    $user_id = mysqli_real_escape_string($con, $_POST['id']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query_run = mysqli_query($con, "UPDATE `tbluser` SET `username` = '$username', `password` = '$password' WHERE `id` = '$user_id' ");

    if($query_run)
    {
        header("Location: ../../index.php");
        exit(0);
    }
  }

  /* $stud_req_no = $_POST['stud_req_check_no'];

    $sqlReq = "SELECT * FROM tbl_student_requirement_checklist WHERE stud_req_check_no = ?";
    $stmtReq = $conn->prepare($sqlReq);
    $stmtReq->bind_param('i', $stud_req_no);
    $stmtReq->execute();
    $resultReq = $stmtReq->get_result();
    $row2 = $resultReq->fetch_assoc();
    $student_id = $row2['student_id'];
  
    // Delete the files from the server
    if (!empty($row2['f138_req_file']) && file_exists($row2['f138_req_file'])) {
      unlink($row2['f138_req_file']);
    }

    $dateCustom = $_POST['dateCustom'];
    $status = 'Complete';
    $reqfile = moveImage($_FILES['f138File'], $student_id);
    var_dump($reqfile);
    $sql = "UPDATE tbl_student_requirement_checklist SET form_138 = '$status', f138_req_file = '$reqfile', last_update = '$dateCustom' WHERE stud_req_check_no = '$stud_req_no'";
    if($conn->query($sql)) {
      $_SESSION['message1'] = "Successfully Uploaded";
      header("location:studentreqchecklist.php");
    } else {
      $_SESSION['message1'] = "Failed to upload";
      header("location:studentreqchecklist.php");
    }
    else {
    $_SESSION['message1'] = "Something went wrong, Please Try again.";
      header("location:studentreqchecklist.php");
  } */
?>

<!-- Logo -->
<?php
  if(isset($_FILES["fileImg"]["name"]))
  {
    $id = $_POST["id"];

    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = $_FILES["fileImg"]["name"];

    $target = "img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE dashboard SET image = '$imageName' WHERE id = $id";
    mysqli_query($con, $query);

    if($query)
    {
      header("Location: maintenance.php");
    }

  }
?>

<!-- CertL function -->
<?php
  if(isset($_FILES["certLogoLeft"]["name"]))
  {
    $id = $_POST["id"];

    $src = $_FILES["certLogoLeft"]["tmp_name"];
    $imageName = $_FILES["certLogoLeft"]["name"];

    $target = "img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE dashboard SET `certL` = '$imageName' WHERE id = $id";
    mysqli_query($con, $query);

    if($query)
    {
      header("Location: maintenance.php");
    }

  }
?>

<!-- CertR function -->
<?php
  if(isset($_FILES["certLogoRight"]["name"]))
  {
    $id = $_POST["id"];

    $src = $_FILES["certLogoRight"]["tmp_name"];
    $imageName = $_FILES["certLogoRight"]["name"];

    $target = "img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE dashboard SET `certR` = '$imageName' WHERE id = $id";
    mysqli_query($con, $query);

    if($query)
    {
      header("Location: maintenance.php");
    }

  }
?>