<?php
  include_once '../../connection.php';

//Add function Barangay Clearance
if(isset($_POST['insert_barangay_clearance']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Barangay Clearance";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Barangay Clearance with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../barangay_clearance.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../barangay_clearance.php");
      exit(0);
  }
}


//Add function Business Permit
if(isset($_POST['insert_business_permit']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Business Permit";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Business Permit with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../business_permit.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../business_permit.php");
      exit(0);
  }
}



//Insert function Good moral
if(isset($_POST['insert_good_moral']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Good Moral";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Good Moral with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../goodmoral.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../goodmoral.php");
      exit(0);
  }
}


//Insert function Business Closure
if(isset($_POST['insert_business_closure']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Business Closure";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Business Closure with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../business_closure.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../business_closure.php");
      exit(0);
  }
}


//Insert function Certificate of Proof of Income
if(isset($_POST['insert_proof_income']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Proof of Income";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Proof of Income with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../proof_of_income.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../proof_of_income.php");
      exit(0);
  }
}


//Insert function Certificate of Deceased Person
if(isset($_POST['insert_deceased_person']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Deceased Person";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Deceased Person with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../deceased_person.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../deceased_person.php");
      exit(0);
  }
}


//Insert function Certificate of Indigency
if(isset($_POST['insert_indigency']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Indigency";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Indigency with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../indigency.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../indigency.php");
      exit(0);
  }
}


//Insert function Certificate of Living Together
if(isset($_POST['insert_living_together']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Living Together";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Living Together with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../living_together.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../living_together.php");
      exit(0);
  }
}


//Insert function Patunay sa Kuryente
if(isset($_POST['insert_kuryente']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Patunay sa Kuryente";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Patunay sa Kuryente with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../patunay_sa_kuryente.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../patunay_sa_kuryente.php");
      exit(0);
  }
}


//Insert function Certificate of Building Permit
if(isset($_POST['insert_permit']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Building Permit";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Building Permit with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../building_permit.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../building_permit.php");
      exit(0);
  }
}


//Insert function Certificate of Late Registration
if(isset($_POST['insert_registration']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Late Registration";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Late Registration with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../late_registration.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../late_registration.php");
      exit(0);
  }
}


//Insert function Certificate of Residency
if(isset($_POST['insert_residency']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Residency";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Residency with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../residency.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../residency.php");
      exit(0);
  }
}



//Insert function Certificate of Same Person
if(isset($_POST['insert_person']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Same Person";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Same Person with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../same_person.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../same_person.php");
      exit(0);
  }
}


//Insert function Certificate of Solo Parent
if(isset($_POST['insert_parent']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['city']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purokNo = mysqli_real_escape_string($con, $_POST['purokNo']);
  $clearanceType = "Certificate of Solo Parent";
  $date = date_default_timezone_set('Asia/Tokyo');
  $currentDateTime = date('F j, Y - g:i:A');

  //quert to add the new data
  $query = "INSERT INTO `tbl_reports` (`firstname`, `lastname`, `middlename`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `clearanceType`, `date` )
   VALUES ('$firstname',
   '$lastname',
   '$middlename',
   '$houseNo',
   '$purokNo',
   '$barangay',
   '$City',
   '$province',
   '$clearanceType',
   '$currentDateTime')";
  

 /*  if(!isset($_SESSION['role']))
  { */
    $insert = 'Print Certificate of Solo Parent with name of '.$firstname ." " .$lastname;
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
  
    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
/*   } */
    

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: ../solo_parent.php");
      exit(0);
  }
  else
  {
      //$_SESSION['messageCreate'] = " Not Created";
      header("Location: ../solo_parent.php");
      exit(0);
  }
}


?>












