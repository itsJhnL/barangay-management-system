<?php
    include '../connection.php';
    include '../../includes/header.php';
    include '../../includes/scripts.php';

    // Total Distributed list
    $BarangayClearance = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Barangay Clearance';");
    $BuildingPermit = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Building Permit';");
    $BusinessClosure = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Business Closure';");
    $DeceasedPerson = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Deceased Person';");
    $GoodMoral = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Good Moral';");
    $Indigency = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Indigency';");
    $LivingTogether = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Living Together';");
    $PatunaySaKuryente = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Patunay sa Kuryente';");
    $ProofOfIncome = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Proof Of Income';");
    $Residency = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Residency';");
    $SamePerson = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Same Person';");
    $SoloParent = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Solo Parent';");
    $LateRegistration = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Late Registration';");
    $BusinessPermit = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Business Permit';");
?>
 <!-- <script src="fill.js"></script> -->

    



    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Table of Reports</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Total Distributed</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container px-4">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="my-2">REPORTS</h1>
                        <hr>
                    
                        <div class="card d.flex">
                            <div class="card-header">
                                <!-- <div class="dropdown">
                                    <button class="button-color btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Filter
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><option class="dropdown-item">By Purok</option></li>
                                        <li><option class="dropdown-item">By Barangay</option></li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover table-striped" id="myTable">
                                    <thead>
                                        <tr class="col text-center">
                                            <th class="col-md-3">Name</th>
                                            <th class="col-md-4">Addresss</th>
                                            <th class="col-md-3">Clearance</th> 
                                            <th class="col">Date</th> 
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            include '../connection.php';
                                            $stmt = $con->prepare("SELECT *, concat('#',houseNo, ' PUROK', purokNo, ' ',barangay,' ',city,' ',province,'') as address FROM tbl_reports");
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while ($report = $result->fetch_assoc()):
                                        ?>
                                        
                                        <tr class="text-center">
                                            <td><?php echo strtoupper($report['lastname']) ; ?>, <?php echo strtoupper($report['firstname']) ; ?> <?php echo strtoupper($report['middlename'][0]) ; ?>.</td>
                                            <td><?php echo strtoupper($report['address']) ; ?></td>
                                            <td><?php echo strtoupper($report['clearanceType']) ; ?></td>
                                            <td><?php echo strtoupper($report['date']) ; ?></td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row mt-3">
                <div class=" col-md-6">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Total Distributed</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                            <b class="mb-4 fs-4 text-center">
                            <span class="fas fa-user"></span>
                                <?php
                                $q = mysqli_query($con,"SELECT * from tbl_reports");
                                $num_rows = mysqli_num_rows($q);

                                echo $num_rows;
                                ?>
                            </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Barangay Clearance</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $BarangayClearance->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Building Permit</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $BuildingPermit->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Business Closure</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $BusinessClosure->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Deceased Person</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $DeceasedPerson->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Good Moral</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $GoodMoral->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Indigency</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $Indigency->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Living Together</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $LivingTogether->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Patunay sa Kuryente</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $PatunaySaKuryente->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Proof of Income</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $ProofOfIncome->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Residency</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $Residency->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Same Person</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $SamePerson->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Solo Parent</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $SoloParent->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Late Registration</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $LateRegistration->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-white mb-4">
                        <div class="card-header bg-card"><h4>Business Permit</h4></div>
                        <div class="card-body" style="background-color: #00518C;">
                        <b class="mb-4 fs-4 text-center">
                        <span class="fas fa-user"></span>
                        <?php echo $BusinessPermit->num_rows;?>
                        </b>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    
    
<!-- Pagination -->
<script>
    $(document).ready( function () 
    {
        $('#myTable').DataTable();
    } );
</script>

<?php 
include 'pagination/pagination.php';
include '../../includes/footer.php';
?>