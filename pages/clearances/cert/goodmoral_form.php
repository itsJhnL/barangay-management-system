<?php 
    include "connection.php";

    $query = "SELECT * FROM tblresident";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
?>



<!DOCTYPE html>
<title>Certificate of Good Moral</title>
<html id="clearance">
<link rel="stylesheet" href="../css/form.css">
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
                    <div style="font-size: 25px; margin-top: -450px;">                
                        Republic of the Philippines<br>
                        Province of <?php echo ucwords(strtolower($row['province'])); ?><br>
                        Municipality of <?php echo ucwords(strtolower($row['city'])); ?><br>
                        <p style="font-size: 32px;"><b>BARANGAY <?php echo $row['barangay']; ?></p></b>
                        <p style="font-size: 32px;">Office of the Punong Barangay</p>
                        <p style="font-size: 45px;"><b>CERTIFICATE OF GOOD MORAL</b><p>
                        <p style="font-size: 20px; margin-top: 50px; right: -320px; position: relative;"><b><?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('F j, Y - g:i:A'); echo $currentDateTime;?></p></b>
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
            
            <div>
                <?php
                        //   $id = $_POST['id'];
                        $sql = "SELECT * FROM tblresident where id = 5";
                        $result = $con->query($sql);
                        $row = $result->fetch_assoc();
                ?>

                <?php 
                    $con = mysqli_connect("localhost","root","admin","barangay_system_db");

                    $id = $_GET['id'];

                    $gender = "SELECT gender FROM tblresident WHERE `id` ='$id' ";
                    $getgender = $con->query($gender);
                    $genderinfo = $getgender->fetch_assoc();

                    if($genderinfo['gender'] == "MALE")
                    {
                        $gen = "He";
                    } else {
                        $gen = "She";
                    }


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
                                <!-- ETO PRE YUNG DINAG DAG, look mo yung id="goodmoral" then sa baba andun button add ka lang form="goodmoral" dapat same yung value nung ID-->
                                <form action="function.php" method="POST" id="goodmoral">
                                    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                                    <input type="hidden" name="lastname" value="<?php echo $row['lastname']?>"/>
                                    <input type="hidden" name="firstname" value="<?php echo $row['firstname']?>"/>
                                    <input type="hidden" name="middl    ename" value="<?php echo $row['middlename']?>"/>
                                    <input type="hidden" name="houseNo" value="<?php echo $row['houseNo']?>"/>
                                    <input type="hidden" name="purokNo" value="<?php echo $row['purokNo']?>"/>
                                    <input type="hidden" name="province" value="<?php echo $row['province']?>"/>
                                    <input type="hidden" name="city" value="<?php echo $row['city']?>"/>
                                    <input type="hidden" name="barangay" value="<?php echo $row['barangay']?>"/>
                                    <input type="hidden" name="clearanceType"/>
                                    <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>"/>
                                </form>
                                <!-- END -->

                                    <p style="font-size: 20px; margin-top: 120px; text-align: left;"><b>TO WHOM IT MAY CONCERN:</p></b>
                                    <p class="intro"><b>THIS IS TO CERTIFY</b> that<b> <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?> <?php echo $row['lastname'];?>, <?php echo $row['age']; ?> years old,</b> Filipino and a bonafide resisdent of this Barangay is a law abiding citizen with no degregatory record nor any pending case filed before the Barangay Peace and Order Council of this Barangay, <b><?php echo $gen ?></b> is known to me of having a good moral character.<br></p>
                                    <p class="intro">This certification is issued upon the request of the above mention person for reference whatever legal intent or purpose it may serve.</p></br>
                                    <p class="intro">Issued this <b><?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('j'); echo $currentDateTime;?></b> day of <b><?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('F Y'); echo $currentDateTime;?></b> hereat the Office of The Punong Barangay of Barangay <?php echo ucwords(strtolower($row['barangay'])); ?>, <?php echo ucwords(strtolower($row['city'])); ?>, <?php echo ucwords(strtolower($row['province'])); ?>, Republic of the Philippines.</p></br></br></br></br>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No Record Found";
                        }
                    }
                    
                ?>

                <br>
                <br>
                <div>
                    <div>
                        <label style="padding-bottom: 10px; float: left;">Prepared by:</label>
                        <?php   
                            $qry = mysqli_query($con,"SELECT * from tblofficials WHERE status='Active' ");
                                while($row=mysqli_fetch_array($qry)){
                                    if($row['position'] == "Secretary"){
                                    echo '
                                        <p style="font-size: 18px; margin-top: 73px; float: left;">
                                            <b>'.strtoupper($row['lastname']).', '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).'.<br></b>
                                            <span style="text-align: center;">BARANGAY SECRETARY</span>
                                        </p>
                                    ';
                                }
                            }
                        ?>
                    </div>
                    
                    <div>
                        <label style="padding-bottom: 10px; margin-left: 152px;">Certified by:</label>
                        <?php   
                            $qry = mysqli_query($con,"SELECT * from tblofficials WHERE status='Active'  ");
                                while($row=mysqli_fetch_array($qry)){
                                    if($row['position'] == "Barangay Captain"){
                                    echo '
                                        <p style="font-size: 18px; margin-top: 72px; float: right;">
                                            <b>'.strtoupper($row['lastname']).', '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).'.<br></b>
                                            <span style="text-align: center;">PUNONG BARANGAY</span>
                                        </p>
                                    ';
                                }
                                
                            }
                        ?>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    
    <!-- eto pre, ang na dagdag form="goodmoral", name="insert_good_moral" wag mo papalitan yung id="printpagebutton" sa JS yan. -->
    <button class="noprint" id="printpagebutton" form="goodmoral" name="insert_good_moral" onclick="PrintElem('#clearance')" style="position: fixed">Print</button>

    
   
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


</body>


</html>
<?php } ?>

