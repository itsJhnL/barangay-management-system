<?php 
    include "connection.php";

    $query = "SELECT * FROM tblresident";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
?>



<!DOCTYPE html>
<title>Certificate of Living Together</title>
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
                    <p style="font-size: 45px;"><b>CERTIFICATE OF LIVING TOGETHER</b><p>
                    <p style="font-size: 20px; right: -320px; position: relative;"><b><?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('F j, Y - g:i:A'); echo $currentDateTime;?></p></b>
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
                              
                                <form action="function.php" method="POST" id="together">
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
                                <!-- END -->
                                    <p style="font-size: 20px; margin-top: 120px; text-align: left;"><b>SA KINAUUKULAN:</p></b>
                                    <p class="intro">Ito ay isang pagpapatunay na sina <b><?php echo $row['firstname'];?> <?php echo $row['middlename'];?> <?php echo $row['lastname'];?> at <?php echo $row['spouseName']; ?>,</b> naninirahan sa <b>PUROK <?php echo $row['purokNo'];?></b> ng Barangay Collado, Talavera, Nueva Ecija ay nagsasama na bilang mag asawa sa loob ng 19 taon.<br><br></p>
                                    <p class="intro">Ito rin ay nagpapatunay na ang mga sumusunod ay kanilang mga anak:</p></br></br>
                                    <p style="font-size: 20px; text-align: center;"><b><?php $fullname = $row['children1']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?>, <?php $fullname = $row['children2']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?>, <?php $fullname = $row['children3']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?>, <?php $fullname = $row['children4']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?>, <?php $fullname = $row['children5']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?></b></p></br>
                                    <p style="font-size: 20px; margin-top: -10px; text-align: center;"><b><?php $fullname = $row['children6']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?>, <?php $fullname = $row['children7']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?>, <?php $fullname = $row['children8']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?>, <?php $fullname = $row['children9']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?>, <?php $fullname = $row['children10']; $nameParts = explode(" ", $fullname); $firstName = $nameParts[0]; echo $firstName;?></b></p></br></br></br>
                                    <p class="intro">Ang pagpapatunay na ito ay iginawad kay <b><?php echo $row['firstname'];?> <?php echo $row['middlename'];?> <?php echo $row['lastname'];?>,</b> Iginawad ngayong ika- <b><?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('j'); echo $currentDateTime;?> ng <?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('F Y,'); echo $currentDateTime;?></b> dito sa Tanggapan ng Punong Barangay ng Barangay <?php echo ucwords(strtolower($row['barangay'])); ?>, <?php echo ucwords(strtolower($row['city'])); ?>, <?php echo ucwords(strtolower($row['province'])); ?>.</p></br></br>
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
                        <label style="padding-bottom: 10px; float: left;">Inihanda ni:</label>
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
                        <label style="padding-bottom: 10px; margin-left: 152px;">Nagpapatunay ni:</label>
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
    <button class="noprint" id="printpagebutton" form="together" name="insert_living_together" onclick="PrintElem('#clearance')" style="position: fixed">Print</button>

    

</body>
   
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
</html>
<?php } ?>