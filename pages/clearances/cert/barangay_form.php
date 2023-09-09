<?php 
    require_once "connection.php";
?>

<!DOCTYPE html>
<title>Barangay Clearance</title>
<html id="clearance">
<link rel="stylesheet" href="../css/brgy.css">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<style>
    @media print {
        .noprint {
        visibility: hidden;
         }
    }
    @page { size: auto;  margin: 4mm; }
</style>

<?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../../login.php"); 
    }
    else
    {
    ob_start(); ?>

<body>
    
    <div class="book">
        <div class="page">
            <div style="text-align: center">
            <div style="text-align: center">
                <div class="topleft">
                    <?php 

                        $query = mysqli_query($con, "SELECT image,certL,certR FROM dashboard");
                            {
                                while($row = mysqli_fetch_array($query))
                                echo'
                                <image src="../../settings/img/'.basename($row['certL']).'" style="width:230px; height: 230px; border-radius: 50%">';

                            }
                    ?>
                </div>
                <div class="topright">
                    <?php 

                        $query = mysqli_query($con, "SELECT image,certL,certR FROM dashboard");
                            {
                                while($row = mysqli_fetch_array($query))
                                echo'
                                <image src="../../settings/img/'.basename($row['certR']).'" style="width:230px; height: 230px; border-radius: 50%">';

                            }
                    ?>
                </div>
                <?php 
                            $con = mysqli_connect("localhost","root","admin","barangay_system_db");

                            if(isset($_GET['id']))
                            {
                                $id = $_GET['id'];

                                $query = "SELECT * FROM tblresident WHERE id='$id' ";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                        <div style="font-size: 25px; margin-top: -522px;">                  
                            Republic of the Philippines<br>
                            Province of <?php echo ucwords(strtolower($row['province'])); ?><br>
                            Municipality of <?php echo ucwords(strtolower($row['city'])); ?><br>
                            <p style="font-size: 32px;"><b>BARANGAY <?php echo $row['barangay']; ?></p></b>
                            <p style="font-size: 32px; padding-bottom: 20px">Office of the Punong Barangay</p>
                            <p class="title" style="font-size: 45px;"><b>BARANGAY CLEARANCE</b><p>
                        <?php
                        }
                                    
                                }
                                else
                                {
                                    echo "No Record Found";
                                }
                            }
                            
                        ?>
                                
                                <div class="card" style="width: 23rem; height: 70rem; border-radius: 46px;background: linear-gradient(145deg, #ffffff, #e6e6e6); box-shadow:  12px 12px 26px #b8b8b8, -12px -12px 26px #ffffff; margin-top: 100px">
                                    <div class="card-body" style="height: 1000px">
                                        <h4 class="card-title">BARANGAY OFFICIALS</h4>
                                        <p></p>
                                        <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Barangay Captain"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">PUNONG BARANGAY</p>
                                                ';
                                                }
                                            }
                                         ?>
                                         <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Kagawad(Infrastracture)"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">COMMITTE ON INFRASTRUCTURE</p>
                                                ';
                                                }
                                            }
                                         ?>
                                         <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Kagawad(Public Safety)"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">COMMITTE ON PEACE & ORDER</p>
                                                ';
                                                }
                                            }
                                         ?>
                                          <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Kagawad(Public Safety)"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">COMMITTE ON HEALTH</p>
                                                ';
                                                }
                                            }
                                         ?>
                                        <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Kagawad(Public Safety)"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">COMMITTE ON APPROPRIATION</p>
                                                ';
                                                }
                                            }
                                         ?>
                                        <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Kagawad(Education)"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">COMMITTE ON EDUCATION</p>
                                                ';
                                                }
                                            }
                                         ?>
                                         <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Kagawad(Ordinance)"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">COMMITTE IN SOCIAL SERVICE</p>
                                                ';
                                                }
                                            }
                                         ?>
                                         <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Kagawad(Agriculture)"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">COMMITTE ON AGRICULTURE</p>
                                                ';
                                                }
                                            }
                                         ?>
                                         <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "SK Chairman"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">SK CHAIRPERSON/SPORTS</p>
                                                ';
                                                }
                                            }
                                         ?>
                                        <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Secretary"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">BARANGAY SECRETARY</p>
                                                ';
                                                }
                                            }
                                         ?>
                                         <?php   
                                                $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                while($row=mysqli_fetch_array($qry)){
                                                if($row['position'] == "Treasurer"){
                                                echo '
                                                    <p style="font-size: 20px; margin-top: 1px"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                    <p style="font-size: 20px; margin-top: -15px;">BARANGAY TREASURER</p>
                                                ';
                                                }
                                            }
                                         ?>
                                    </div>
                                </div>
                        
                        </div>
                            <?php
                                //   $id = $_POST['id'];
                                $sql = "SELECT * FROM tblresident where id = 5";
                                $result = $con->query($sql);
                                $row = $result->fetch_assoc();
                            ?>

                        <?php 
                            $con = mysqli_connect("localhost","root","admin","barangay_system_db");

                            if(isset($_GET['id']))
                            {
                                $id = $_GET['id'];

                                $query = "SELECT * FROM tblresident WHERE id='$id' ";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        <form action="function.php" method="POST" id="insert_report">
                                            <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                                            <input type="hidden" name="lastname" value="<?php echo $row['lastname']?>"/>
                                            <input type="hidden" name="firstname" value="<?php echo $row['firstname']?>"/>
                                            <input type="hidden" name="middlename" value="<?php echo $row['middlename']?>"/>
                                            <input type="hidden" name="houseNo" value="<?php echo $row['houseNo']?>"/>
                                            <input type="hidden" name="purokNo" value="<?php echo $row['purokNo']?>"/>
                                            <input type="hidden" name="province" value="<?php echo $row['province']?>"/>
                                            <input type="hidden" name="city" value="<?php echo $row['city']?>"/>
                                            <input type="hidden" name="barangay" value="<?php echo $row['barangay']?>"/>
                                            <input type="hidden" name="clearanceType"/>
                                            <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>"/>
                                        </form>
                                            <div class="main">
                                                
                                                <p style="font-size: 20px; margin-top:-1180px; right: 49px; position: relative;"><b>TO WHOM IT MAY CONCERN:</p></b>
                                                <p style="font-size: 20px; margin-top:-150px; right: -300px; position: relative;"><b><?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('F j, Y - g:i:A'); echo $currentDateTime;?></p></b>
                                                <p style="font-size: 20px; margin-top:150px;">This is to certify that <b><?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename'];?>,</b> of legal age, born on <b><?php $birthdate = $row['birthdate']; $date = new DateTime($birthdate); $formattedDate = $date->format('F j, Y'); echo $formattedDate; ?>, <?php echo $row['civilStatus'];?>,</b> and a Filipino Citezen, whose signature & thumbark appears below, is a resident of this barangay with address at <b>PUROK <?php echo $row['purokNo'];?> Barangay <?php echo ucwords(strtolower($row['barangay'])); ?>, <?php echo ucwords(strtolower($row['city'])); ?>, <?php echo ucwords(strtolower($row['province'])); ?>.</b></p></br>
                                                <p style="font-size: 20px;">This certifies further that the above-mentioned name has no derogatory record in our barangay files to date.</b></p></br>
                                                <p style="font-size: 20px;">Issued upon the request of the above-mentioned name on this <b><?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('F j, Y'); echo $currentDateTime;?></b><!-- <b>7th</b> day of <b>February</b> Year <b>2023</b> --> for <b>ANY LEGAL PURPOSES.</b></p></br>
                                                <p style="font-size: 20px; text-align: center;"><b>PERSONAL DETAILS</b></p>
                                                <p style="font-size: 20px; right: 55px; position: relative;" >Name: <b><?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></b></p> 
                                                <p style="font-size: 20px; margin-top:-20px; right: 55px; position: relative;">Address: <b>PUROK <?php echo $row['purokNo'];?> <?php echo $row['barangay'];?>, <?php echo $row['city'];?></b></p>    
                                                <p style="font-size: 20px; margin-top:-20px; right: 55px; position: relative;">Civil status: <b><?php echo $row['civilStatus']; ?></b>  Sex: <b><?php echo $row['gender']; ?></b></p>
                                                <p style="font-size: 20px; margin-top:-20px; right: 55px; position: relative;">Place of Birth: <b><?php echo $row['city']; ?><?php echo $row['province']; ?></b></p>
                                                <p style="font-size: 20px; margin-top:-20px; right: 55px; position: relative;">Height: <b><?php echo $row['height']; ?> cm</b>  Weight: <b><?php echo $row['weight']; ?> KG</b></p>
                                                <p style="font-size: 20px; margin-top:-20px; right: 55px; position: relative;">Citizenship: <b><?php echo $row['nationality']; ?></b></p>
                                                <hr style="width:50%; margin-top:80px; left: 300px; position: relative; border: solid 1px"><p style="font-size: 20px; left: 307px; position: relative; margin-top:10px;">Applicant's Signature</p>
                                                <p style="font-size: 20px; margin-top: 120px; right: 70px; position: relative;">Community Tax No.</p>
                                                <p style="font-size: 20px; margin-top:-20px; right: 70px; position: relative;">Issued On:</p>
                                                <p style="font-size: 20px; margin-top:-20px; right: 70px; position: relative;">Issued At:</p>
                                                <p style="font-size: 20px; margin-top:-20px; right: 70px; position: relative;">OR No:</p>
                                                <p style="font-size: 20px; margin-top:10px; right: 70px; position: relative;">Prepared by:</p>
                                                <p style="font-size: 20px; margin-top:-46px; right: -275px; position: relative;">Approved by:</p> 
                                                
                                        <?php   
                                                    $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                    while($row=mysqli_fetch_array($qry)){
                                                    if($row['position'] == "Secretary"){
                                                        echo '
                                                            <p style="font-size: 20px; margin-top: 40px;  position: relative; left: -62px;"><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                            <p style="margin-top: -10px; font-size: 20px; position: relative; left: -62px;">BARANGAY SECRETARY</p>
                                                        ';
                                                }
                                            }
                                        ?>
                                         <?php   
                                                    $qry = mysqli_query($con,"SELECT * from tblofficials");
                                                    while($row=mysqli_fetch_array($qry)){
                                                    if($row['position'] == "Barangay Captain"){
                                                        echo '
                                                            <p style="font-size: 20px; margin-top: -82px;  position: relative; right: -280px; "><b>HON. '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' '.strtoupper($row['lastname']).'<br></b></p>
                                                            <p style="font-size: 20px; margin-top: -10px;  position: relative; right: -280px; ">PUNONG BARANGAY</p>
                                                        ';
                                                }
                                            }
                                        ?>
                                                </div>
                                                <div style="width: 140px; height: 140px; padding: 10px; border: 5px solid blue; margin-top:-10px; left: 30px; position: relative;"><p style="font-size: 20px;"><b>LEFT</b></p></div>  
                                                <div style="width: 140px; height: 140px; padding: 10px; border: 5px solid blue; margin-top:-140px; left: 200px; position: relative;"><p style="font-size: 20px;"><b>RIGHT</b></p></div></div>
                                                <div class="bottom">
                                                    <?php 

                                                        $query = mysqli_query($con, "SELECT captured_image FROM tblresident WHERE id = '".$_GET['id']."' ");
                                                        {
                                                            while($row = mysqli_fetch_array($query))
                                                            echo'
                                                            <image src="../../resident/images/'.basename($row['captured_image']).'" style="width:140px; height: 140px; margin-top:-850px; right: 331px; position: relative; border-style: solid; border-color: blue;">';
                                                        }

                                                    ?>    
                                                </div>
                                            </div>
                                            <!-- <p style="position: fixed;  left: 0;  bottom: 0;  width: 100%; font-size: 20px; text-align: center; padding-top: 30px"><b>Note: Valid until December 31, 2023 unless otherwise revoke</b></p> -->
                                            <p style="position: fixed;  left: 0;  bottom: 0;  width: 100%; font-size: 20px; text-align: center; padding-top: 30px"><b>Note: Valid for 7 Days, unless otherwise revoke</b></p>
                                            
                                            </div>
                                              
                                            <div>
                                            
                                            <div>
                                                
                                               
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    
                                }
                                else
                                {
                                    echo "No Record Found";
                                }
                            }
                            
                        ?>
                           

                           

                                                
                                                
                    </div>                          
                </div> 
            </div> 
        </div> 
    </div> 
    <button type="submit" class="btn btn-primary noprint" name="insert_barangay_clearance" form="insert_report" id="printpagebutton" onclick="PrintElem('#clearance')">Print</button>
    


<script>
        function PrintElem(elem)
{
    window.print();
}

function Popup(data) 
{
    var mywindow = window.open('', 'my div', 'height=400,width=600');
    //mywindow.document.write('<html><head><title>my div</title>');
    /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
    //mywindow.document.write('</head><body class="skin-black" >');
        var printButton = document.getElementById("printpagebutton");
    //Set the print button visibility to 'hidden' 
    printButton.style.visibility = 'hidden';
    mywindow.document.write(data);
    //mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10

    amywindow.print();

    printButton.style.visibility = 'visible';
    mywindow.close();

    return true;
}
</script>

<?php } ?>

</html>

