<?php
  include ('../connection.php');

if(isset($_POST['add_official']))
{


  // $output_dir = "signatures/";/* Path for file upload */
	// $RandomNum = time();
	// $ImageName = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	// $ImageType = $_FILES['image']['type'][0];
 
	// $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	// $ImageExt = str_replace('.','',$ImageExt);
	// $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	// $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
  // $ret[$NewImageName]= $output_dir.$NewImageName;
	
	// /* Try to create the directory if it does not exist */
	// if (!file_exists($output_dir))
	// {
	// 	@mkdir($output_dir, 0777);
	// }               
	// move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );

  $position = mysqli_real_escape_string($con, $_POST['position']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
  $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
  $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
  $status = mysqli_real_escape_string($con, $_POST['status']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['City']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);

  
  // query to insert the data
  $query = "INSERT INTO `tblofficials` (`position`, `lastname`, `firstname`, `middlename`, `contactNo`, `start_date`, `end_date`, `status`,  `email`,`gender`, `province`, `City`, `barangay`)
   VALUES 
    ('$position',
    '$lastname',
    '$firstname',
    '$middlename',
    '$contactNo',
    '$start_date',
    '$end_date',
    '$status',
    '$email',
    '$gender',
    '$province',
    '$City',
    '$barangay')";

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
      //$_SESSION['messageCreate'] = " Created Successfully";
      header("Location: officials.php");
      exit(0);
  } else {
    header("Location: officials.php");
    exit(0);
  }
  $con->close();
}

//Edit function
if(isset($_POST['update_official']))
{

  // $output_dir = "signatures/";/* Path for file upload */
	// $RandomNum = time();
	// $ImageName = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	// $ImageType = $_FILES['image']['type'][0];
 
	// $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	// $ImageExt = str_replace('.','',$ImageExt);
	// $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	// $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
  // $ret[$NewImageName]= $output_dir.$NewImageName;
	
	// /* Try to create the directory if it does not exist */
	// if (!file_exists($output_dir))
	// {
	// 	@mkdir($output_dir, 0777);
	// }               
	// move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );

  $id = mysqli_real_escape_string($con, $_POST['id']);
  $position = mysqli_real_escape_string($con, $_POST['position']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
  $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
  $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
  $status = mysqli_real_escape_string($con, $_POST['status']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['City']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);

  // query to update the data
  $query_run = mysqli_query($con, "UPDATE `tblofficials` SET `position` = '$position', `lastname` = '$lastname', `firstname` = '$firstname',  `middlename` = '$middlename', `contactNo` = '$contactNo', `email` = '$email', `start_date` = '$start_date', `end_date` = '$end_date', `status` = '$status', `email` = '$email', `gender` = '$gender', `province` = '$province', `City` = '$City', `barangay` = '$barangay'/* , `signature` = '$NewImageName' */ WHERE `id` = '$id'") or die(mysqli_error());

  if($query_run)
  {
      header("Location: officials.php");
      exit(0);
  }
  $con->close();
}
//Delete function
if(isset($_POST['delete_official']))
{
  $id = mysqli_real_escape_string($con, $_POST['id']);

  // query to delete a record
  $query = "DELETE FROM tblofficials WHERE id=$id";

  if (mysqli_query($con, $query)) {
    header("Location: officials.php");
      exit(0);
  }
}

// Active function
if(isset($_POST['Active'])) {
  $id = $_POST['id'];
  $status = "Active";
    // query to update the data
    $sql = "UPDATE tblofficials SET status = '$status' WHERE id = '$id'";
    if($result2 = $con->query($sql)) {
      header("location:officials.php");
  }
}

// Restore function
if(isset($_POST['Active']))
{
  $id = $_POST['id'];

  $position = mysqli_real_escape_string($con, $_POST['position']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['City']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
  $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
  $status = mysqli_real_escape_string($con, $_POST['status']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);

  $query_run = "INSERT INTO `tblofficials` (`position`, `lastname`, `firstname`, `middlename`, `contactNo`, `province`, `City`, `barangay`, `start_date`, `end_date`, `status`,  `email`,`gender`)
   VALUES 
    ('$position',
    '$lastname',
    '$firstname',
    '$middlename',
    '$contactNo',
    '$province',
    '$City',
    '$barangay',
    '$start_date',
    '$end_date',
    '$status',
    '$email',
    '$gender')";
    
    if($result2 = $con->query($query_run)) {
      header("Location: officials.php");
    }
}

// Restore delete function
if(isset($_POST['Active']))
{
  $id = mysqli_real_escape_string($con, $_POST['id']);

  // query to delete a record
  $query = "DELETE FROM tbl_archives WHERE id=$id";

  if (mysqli_query($con, $query)) {
    header("Location: officials.php");
      exit(0);
  }
}

// Archive function

if(isset($_POST['Inactive']))
{
  $id = $_POST['id'];

  $position = mysqli_real_escape_string($con, $_POST['position']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['City']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
  $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
  $status = mysqli_real_escape_string($con, $_POST['status']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $reason = mysqli_real_escape_string($con, $_POST['reason']);

  $query_run = "INSERT INTO `tbl_archives` (`position`, `lastname`, `firstname`, `middlename`, `contactNo`, `province`, `City`, `barangay`, `start_date`, `end_date`, `status`,  `email`, `gender`, `reason`)
   VALUES 
  ('$position',
  '$lastname',
  '$firstname',
  '$middlename',
  '$contactNo',
  '$province',
  '$City',
  '$barangay',
  '$start_date',
  '$end_date',
  '$status',
  '$email',
  '$gender',
  '$reason')";
    
  if($result2 = $con->query($query_run)) {
    header("Location: officials.php");
  }
}

// Inactive function
if(isset($_POST['Inactive'])) {
  $id = $_POST['id'];
  $status = "Inactive";
  // query to update the data
  $sql = "UPDATE tblofficials SET status = '$status' WHERE id = '$id'";

  // query to delete a record
  $query = "DELETE FROM tblofficials WHERE id=$id";
  if($result2 = $con->query($query)) {
    header("location:officials.php");
  }
}

// Archive delete function
if(isset($_POST['delete_official_archive']))
{
  $id = mysqli_real_escape_string($con, $_POST['id']);

  // query to delete a record
  $query = "DELETE FROM tbl_archives WHERE id=$id";

  if (mysqli_query($con, $query)) {
    header("Location: archive.php");
      exit(0);
  }
}

// End Term function

if(isset($_POST['EndTerm']))
{
  $id = $_POST['id'];

  $position = mysqli_real_escape_string($con, $_POST['position']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
  $contactNo = mysqli_real_escape_string($con, $_POST['contactNo']);
  $province = mysqli_real_escape_string($con, $_POST['province']);
  $City = mysqli_real_escape_string($con, $_POST['City']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
  $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
  $status = mysqli_real_escape_string($con, $_POST['status']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $reason = mysqli_real_escape_string($con, $_POST['reason']);

  $query_run = "INSERT INTO `tbl_archives` (`position`, `lastname`, `firstname`, `middlename`, `contactNo`, `province`, `City`, `barangay`, `start_date`, `end_date`, `status`,  `email`, `gender`, `reason`)
   VALUES 
    ('$position',
    '$lastname',
    '$firstname',
    '$middlename',
    '$contactNo',
    '$province',
    '$City',
    '$barangay',
    '$start_date',
    '$end_date',
    '$status',
    '$email',
    '$gender',
    '$reason')";
    
  if($result2 = $con->query($query_run)) {
    header("Location: officials.php");
  }
}

// End Term delete function
if(isset($_POST['EndTerm']))
{
  $id = mysqli_real_escape_string($con, $_POST['id']);

  // query to delete a record
  $query = "DELETE FROM tblofficials WHERE id=$id";

  if (mysqli_query($con, $query)) {
    header("Location: officials.php");
      exit(0);
  }
}


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

?>