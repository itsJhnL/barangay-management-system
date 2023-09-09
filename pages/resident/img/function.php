<?php
require_once '../connection.php';


/* Address Combo Box function */
$str = "";
if(isset($_POST['type']) && $_POST["type"] == "City"){

  $sql = "SELECT DISTINCT citytown FROM tbl_barangays WHERE province = '{$_POST['province']}'";

  $query = mysqli_query($con,$sql) or die("Query Unsuccessful.");

  $str = "";
  while($row = mysqli_fetch_assoc($query)){
    $str .= "<option value='{$row['citytown']}'>{$row['citytown']}</option>";
  }
  echo $str;

  
}else if(isset($_POST['type']) && $_POST["type"] == "Barangay"){

  $sql = "SELECT DISTINCT barangay FROM tbl_barangays WHERE CityTown = '{$_POST['CityTown']}'";

  $query = mysqli_query($con,$sql) or die("Query Unsuccessful.");

  $str = "";
  while($row = mysqli_fetch_assoc($query)){
    $str .= "<option value='{$row['barangay']}'>{$row['barangay']}</option>";
  }
  echo $str;

  
}else if(isset($_POST['type'])){

  $sql = "SELECT distinct province from tbl_barangays order by province";

  $query = mysqli_query($con,$sql) or die("Query Unsuccessful.");

  
  while($row = mysqli_fetch_assoc($query)){
    $str .= "<option value='{$row['province']}'>{$row['province']}</option>";
  }
  echo $str;
}

//Add function
if(isset($_POST['save_resident']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
  // captured image save to...
  $folderPath = 'images/';
  $image_parts = explode(";base64,", $_POST['captured_image']);
  $image_type_aux = explode("images/", $image_parts[0]);
  $image_type = $image_type_aux[0];
  $image_base64 = base64_decode($image_parts[1]);
  $file = $folderPath . $firstname .' '. $lastname . ' - ' . $contactNo .'.jpeg';
  file_put_contents($file, $image_base64);

  
  $suffixname = mysqli_real_escape_string($con, $_POST['suffixname']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $age = mysqli_real_escape_string($con, $_POST['age']);
  $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
  $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
  $purok = mysqli_real_escape_string($con, $_POST['purokNo']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $city = mysqli_real_escape_string($con, $_POST['city']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $emailAddress = mysqli_real_escape_string($con, $_POST['emailAddress']);
  $motherName = mysqli_real_escape_string($con, $_POST['motherName']);
  $fatherName = mysqli_real_escape_string($con, $_POST['fatherName']);
  $motherContactNo = mysqli_real_escape_string($con, $_POST['motherContactNo']);
  $fatherContactNo = mysqli_real_escape_string($con, $_POST['fatherContactNo']);
  $height = mysqli_real_escape_string($con, $_POST['height']);
  $weight = mysqli_real_escape_string($con, $_POST['weight']);
  $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
  $civilStatus = mysqli_real_escape_string($con, $_POST['civilStatus']);
  $spouseName = mysqli_real_escape_string($con, $_POST['spouseName']);
  $course = mysqli_real_escape_string($con, $_POST['course']);
  $CSchoolName = mysqli_real_escape_string($con, $_POST['CSchoolName']);
  $CSchoolAddress = mysqli_real_escape_string($con, $_POST['CSchoolAddress']);
  $CYearAttended = mysqli_real_escape_string($con, $_POST['CYearAttended']);
  $HSchoolName = mysqli_real_escape_string($con, $_POST['HSchoolName']);
  $HSchoolAddress = mysqli_real_escape_string($con, $_POST['HSchoolAddress']);
  $HYearAttended = mysqli_real_escape_string($con, $_POST['HYearAttended']);
  $ESchoolName = mysqli_real_escape_string($con, $_POST['ESchoolName']);
  $ESchoolAddress = mysqli_real_escape_string($con, $_POST['ESchoolAddress']);
  $EYearAttended = mysqli_real_escape_string($con, $_POST['EYearAttended']);
  $captured_image = $file;
  $BusinessID = mysqli_real_escape_string($con, $_POST['BusinessID']);
  $BusinessNature = mysqli_real_escape_string($con, $_POST['BusinessNature']);
  $BusinessName = mysqli_real_escape_string($con, $_POST['BusinessName']);
  $BusinessOwner = mysqli_real_escape_string($con, $_POST['BusinessOwner']);
  $BusinessOwnerAddress = mysqli_real_escape_string($con, $_POST['BusinessOwnerAddress']);
  $BusinessContactNumber = mysqli_real_escape_string($con, $_POST['BusinessContactNumber']);
  $BusinessBldgNo = mysqli_real_escape_string($con, $_POST['BusinessBldgNo']);
  $BusinessPurokNo = mysqli_real_escape_string($con, $_POST['BusinessPurokNo']);
  $BusinessBarangay = mysqli_real_escape_string($con, $_POST['BusinessBarangay']);
  $BusinessMunicipality = mysqli_real_escape_string($con, $_POST['BusinessMunicipality']);
  $BusinessProvince = mysqli_real_escape_string($con, $_POST['BusinessProvince']);
  $causeofdeath = mysqli_real_escape_string($con, $_POST['causeofdeath']);
  $children1 = mysqli_real_escape_string($con, $_POST['children1']);
  $children2 = mysqli_real_escape_string($con, $_POST['children2']);
  $children3 = mysqli_real_escape_string($con, $_POST['children3']);
  $children4 = mysqli_real_escape_string($con, $_POST['children4']);
  $children5 = mysqli_real_escape_string($con, $_POST['children5']);
  $children6 = mysqli_real_escape_string($con, $_POST['children6']);
  $children7 = mysqli_real_escape_string($con, $_POST['children7']);
  $children8 = mysqli_real_escape_string($con, $_POST['children8']);
  $children9 = mysqli_real_escape_string($con, $_POST['children9']);
  $children10 = mysqli_real_escape_string($con, $_POST['children10']);
  


  //quert to add the new data
  $query = "INSERT INTO `tblresident` (`firstname`, `lastname`, `gender`, `age`, `middlename`, `suffixname`, `birthdate`, `houseNo`, `purokNo`, `barangay`, `city`, `province`, `contactNo`, `emailAddress`, `motherName`, `fatherName`, `motherContactNo`, `fatherContactNo`, `height`, `weight`, `nationality`, `civilStatus`, `spouseName`, `course`, `CSchoolName`, `CSchoolAddress`, `CYearAttended`, `HSchoolName`, `HSchoolAddress`, `HYearAttended`, `ESchoolName`, `ESchoolAddress`, `EYearAttended`, `captured_image`,`BusinessID`,`BusinessNature`,`BusinessName`,`BusinessOwner`,`BusinessOwnerAddress`,`BusinessContactNumber`,`BusinessBldgNo`,`BusinessPurokNo`,`BusinessBarangay`,`BusinessMunicipality`,`BusinessProvince`,`causeofdeath`,`children1`,`children2`,`children3`,`children4`,`children5`,`children6`,`children7`,`children8`,`children9`,`children10`) VALUES 
  (
  '$firstname',
  '$lastname',
  '$gender',
  '$age',
  '$middlename',
  '$suffixname',
  '$birthdate',
  '$houseNo',
  '$purok',
  '$barangay',
  '$city',
  '$province',
  '$contactNo',
  '$emailAddress',
  '$motherName',
  '$fatherName',
  '$motherContactNo',
  '$fatherContactNo',
  '$height',
  '$weight',
  '$nationality',
  '$civilStatus',
  '$spouseName',
  '$course',
  '$CSchoolName',
  '$CSchoolAddress',
  '$CYearAttended',
  '$HSchoolName',
  '$HSchoolAddress',
  '$HYearAttended',
  '$ESchoolName',
  '$ESchoolAddress',
  '$EYearAttended',
  '$captured_image',
  '$BusinessID',
  '$BusinessNature',
  '$BusinessName',
  '$BusinessOwner',
  '$BusinessOwnerAddress',
  '$BusinessContactNumber',
  '$BusinessBldgNo',
  '$BusinessPurokNo',
  '$BusinessBarangay',
  '$BusinessMunicipality',
  '$BusinessProvince',
  '$causeofdeath',
  '$children1',
  '$children2',
  '$children3',
  '$children4',
  '$children5',
  '$children6',
  '$children7',
  '$children8',
  '$children9',
  '$children10')";

  // query to send data to logs
  $date = date_default_timezone_set('Asia/Tokyo'); 
  $currentDateTime = date('F j, Y - g:i:A');

  $insert = mysqli_real_escape_string($con, "Added Resident with name of ".$firstname ." " .$lastname);
  $session_role = mysqli_real_escape_string($con, $_POST['session_role']);

  $query1 = "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')";
  mysqli_query($con, $query1);


  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
    $_SESSION['status'] = "Created Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: resident.php");
    exit(0);
  }
  else{
    $_SESSION['status'] = "Your Data is NOT UPLOADED";
    $_SESSION['status_code'] = "error";
    header("Location: resident.php");
    exit(0);
  }
}
  //Edit function
  if(isset($_POST['update_resident'])){

/*     $folderPath = 'images/';
    $image_parts = explode(";base64,", $_POST['captured_image']);
    $image_type_aux = explode("images/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $file = $folderPath . uniqid() . '.jpeg';
    file_put_contents($file, $image_base64); */

    $user_id = mysqli_real_escape_string($con, $_POST['id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
    $suffixname = mysqli_real_escape_string($con, $_POST['suffixname']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $houseNo = mysqli_real_escape_string($con, $_POST['houseNo']);
    $purok = mysqli_real_escape_string($con, $_POST['purokNo']);
    $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $province = mysqli_real_escape_string($con, $_POST['province']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $emailAddress = mysqli_real_escape_string($con, $_POST['emailAddress']);
    $motherName = mysqli_real_escape_string($con, $_POST['motherName']);
    $fatherName = mysqli_real_escape_string($con, $_POST['fatherName']);
    $motherContactNo = mysqli_real_escape_string($con, $_POST['motherContactNo']);
    $fatherContactNo = mysqli_real_escape_string($con, $_POST['fatherContactNo']);
    $height = mysqli_real_escape_string($con, $_POST['height']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
    $civilStatus = mysqli_real_escape_string($con, $_POST['civilStatus']);
    $spouseName = mysqli_real_escape_string($con, $_POST['spouseName']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $CSchoolName = mysqli_real_escape_string($con, $_POST['CSchoolName']);
    $CSchoolAddress = mysqli_real_escape_string($con, $_POST['CSchoolAddress']);
    $CYearAttended = mysqli_real_escape_string($con, $_POST['CYearAttended']);
    $HSchoolName = mysqli_real_escape_string($con, $_POST['HSchoolName']);
    $HSchoolAddress = mysqli_real_escape_string($con, $_POST['HSchoolAddress']);
    $HYearAttended = mysqli_real_escape_string($con, $_POST['HYearAttended']);
    $ESchoolName = mysqli_real_escape_string($con, $_POST['ESchoolName']);
    $ESchoolAddress = mysqli_real_escape_string($con, $_POST['ESchoolAddress']);
    $EYearAttended = mysqli_real_escape_string($con, $_POST['EYearAttended']);
    /* $captured_image = $file; */
    $BusinessID = mysqli_real_escape_string($con, $_POST['BusinessID']);
    $BusinessNature = mysqli_real_escape_string($con, $_POST['BusinessNature']);
    $BusinessName = mysqli_real_escape_string($con, $_POST['BusinessName']);
    $BusinessOwner = mysqli_real_escape_string($con, $_POST['BusinessOwner']);
    $BusinessOwnerAddress = mysqli_real_escape_string($con, $_POST['BusinessOwnerAddress']);
    $BusinessContactNumber = mysqli_real_escape_string($con, $_POST['BusinessContactNumber']);
    $BusinessBldgNo = mysqli_real_escape_string($con, $_POST['BusinessBldgNo']);
    $BusinessPurokNo = mysqli_real_escape_string($con, $_POST['BusinessPurokNo']);
    $BusinessBarangay = mysqli_real_escape_string($con, $_POST['BusinessBarangay']);
    $BusinessMunicipality = mysqli_real_escape_string($con, $_POST['BusinessMunicipality']);
    $BusinessProvince = mysqli_real_escape_string($con, $_POST['BusinessProvince']);
    $causeofdeath = mysqli_real_escape_string($con, $_POST['causeofdeath']);
    $children1 = mysqli_real_escape_string($con, $_POST['children1']);
    $children2 = mysqli_real_escape_string($con, $_POST['children2']);
    $children3 = mysqli_real_escape_string($con, $_POST['children3']);
    $children4 = mysqli_real_escape_string($con, $_POST['children4']);
    $children5 = mysqli_real_escape_string($con, $_POST['children5']);
    $children6 = mysqli_real_escape_string($con, $_POST['children6']);
    $children7 = mysqli_real_escape_string($con, $_POST['children7']);
    $children8 = mysqli_real_escape_string($con, $_POST['children8']);
    $children9 = mysqli_real_escape_string($con, $_POST['children9']);
    $children10 = mysqli_real_escape_string($con, $_POST['children10']);

    
 
    // query to update the data
    $query_run = mysqli_query($con, "UPDATE `tblresident` SET `firstname` = '$firstname',`lastname` = '$lastname', `contactNo` = '$contactNo', `suffixname` = '$suffixname', `gender` = '$gender', `age` = '$age', `birthdate` = '$birthdate', `houseNo` = '$houseNo', `purokNo` = '$purok', `barangay` = '$barangay', `city` = '$city', `province` = '$province', `middlename` = '$middlename', `emailAddress` = '$emailAddress', `motherName` = '$motherName', `fatherName` = '$fatherName', `motherContactNo` = '$motherContactNo', `fatherContactNo` = '$fatherContactNo', `height` = '$height', `weight` = '$weight', `nationality` = '$nationality', `civilStatus` = '$civilStatus', `spouseName` = '$spouseName', `course` = '$course', `CSchoolName` = '$CSchoolNamdddde', `CSchoolAddress` = '$CSchoolAddress', `CYearAttended` = '$CYearAttended', `HSchoolName` = '$HSchoolName', `HSchoolAddress` = '$HSchoolAddress', `HYearAttended` = '$HYearAttended', `ESchoolName` = '$ESchoolName', `ESchoolAddress` = '$ESchoolAddress', `EYearAttended` = '$EYearAttended',  `BusinessID` = '$BusinessID', `BusinessNature` = '$BusinessNature', `BusinessName` = '$BusinessName', `BusinessOwner` = '$BusinessOwner', `BusinessOwnerAddress` = '$BusinessOwnerAddress', `BusinessContactNumber` = '$BusinessContactNumber', `BusinessBldgNo` = '$BusinessBldgNo', `BusinessPurokNo` = '$BusinessPurokNo', `BusinessBarangay` = '$BusinessBarangay', `BusinessMunicipality` = '$BusinessMunicipality', `BusinessProvince` = '$BusinessProvince', `causeofdeath` = '$causeofdeath', `children1` = '$children1', `children2` = '$children2', `children3` = '$children3', `children4` = '$children4', `children5` = '$children5', `children6` = '$children6', `children7` = '$children7', `children8` = '$children8', `children9` = '$children9', `children10` = '$children10' WHERE `id` = '$user_id'");

    // query to send data to logs
    $date = date_default_timezone_set('Asia/Tokyo'); 
    $currentDateTime = date('F j, Y - g:i:A');

    $insert = mysqli_real_escape_string($con, "Updated Resident with name of ".$firstname ." " .$lastname);
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);

    $query1 = mysqli_query($con, "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')");
    // mysqli_query($con, $query1);


    if($query_run)
    {
        header("Location: resident.php");
        exit(0);
    }
  }
  //Delete function
  if(isset($_POST['delete_resident']))
  {
    $id = mysqli_real_escape_string($con, $_POST['id']);

    // query to delete a record
    $query = "DELETE FROM tblresident WHERE id=$id";
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);

    // query to send data to logs
    $date = date_default_timezone_set('Asia/Tokyo'); 
    $currentDateTime = date('F j, Y - g:i:A');
  
    $insert = mysqli_real_escape_string($con, "Deleted Resident with name of ".$firstname ." " .$lastname);
    $session_role = mysqli_real_escape_string($con, $_POST['session_role']);
    
    $query1 = "INSERT INTO `tbl_logs` (`usertype`, `remarks`, `created_at`) VALUES ('$session_role', '$insert', '$currentDateTime')";
    mysqli_query($con, $query1);

    if (mysqli_query($con, $query)) {
      header("Location: resident.php");
        exit(0);
    }
  }


?>