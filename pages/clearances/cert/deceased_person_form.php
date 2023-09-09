<?php 
    include "connection.php";

    $query = "SELECT * FROM tblresident";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
?>



<!DOCTYPE html>
<title>Certificate of Deceased Person</title>
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
                    <p style="font-size: 45px;"><b>CERTIFICATE OF DECEASED PERSON</b><p>
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
                               
                                <form action="function.php" method="POST" id="deceased">
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
                                    <p class="intro">Ito ay isang patunay na si <b><?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?> <?php echo $row['lastname']; ?>, <?php echo $row['age'];?></b> taong gulang na naninirahan sa <b> PUROK <?php echo $row['purokNo'];?></b> ng Barangay na ito ay pumanaw na noong ika-<b><?php $birthdate = $row['dateofdeath']; $date = new DateTime($birthdate); $formattedDate = $date->format('j'); echo $formattedDate; ?> ng <?php $birthdate = $row['dateofdeath']; $date = new DateTime($birthdate); $formattedDate = $date->format('F Y'); echo $formattedDate; ?></b> ng taong ito sa ganap na ika-<b><?php echo $row['timeofdeath']; ?></b> sa kanilang tahanan.<br></p>   
                                    <p class="intro">Ang pagpapatunay na ito ay iginawad dahil sa kahilingan ni <b><?php echo $row['nameoffamily']; ?></b> na <b><?php echo $row['relationship']; ?></b> ng pumanaw upang maging batayan at gamitin sa pagkuha ng kaukulang serbisyong kanilang kinakailangan. Iginawad ngayong ika-<b><?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('j'); echo $currentDateTime;?> ng <?php date_default_timezone_set('Asia/Tokyo'); $currentDateTime = date('F Y,'); echo $currentDateTime;?></b> dito sa Tanggapan ng Punong Barangay ng Barangay <?php echo ucwords(strtolower($row['barangay'])); ?>, <?php echo ucwords(strtolower($row['city'])); ?>, <?php echo ucwords(strtolower($row['province'])); ?>.</p></br></br></br></br>
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
    <button class="noprint" id="printpagebutton" form="deceased" name="insert_deceased_person" onclick="PrintElem('#clearance')" style="position: fixed">Print</button>



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