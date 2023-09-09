<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';
    include '../connection.php'; 
?>



<div class="container px-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-2">Barangay Officials List</h1>
            <hr>
            <div class="card d.flex">
                <div class="card-header">
                    <button type="button" class="button-color btn float-start" title="Create" data-bs-toggle="modal" data-bs-target="#Add_Official">
                        New <i class="bi bi-person-fill-add"></i>
                    </button>
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped" id="myTable">
                        <thead>
                            <tr class="col text-center my-auto">
                                <th class="col-2">Position</th> 
                                <th class="col-4">Full Name</th> 
                                <th class="col-4">Address</th>
                                <th class="col">Contact</th>
                                <th class="col-2">Action</th>
                                <th class="col">Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                /* $squery = mysqli_query($con, "SELECT *, CONCAT(lastname, ', ', firstname, ' ', middlename,'.') as fullname FROM tblofficials;"); */
                                $squery = mysqli_query($con, "SELECT *, CONCAT(barangay, ', ', City, ' ', province,'.') as address FROM tblofficials;");
                                while($row = mysqli_fetch_array($squery))
                                {
                                    echo '
                                    <tr class="text-center">
                                        <td> '.strtoupper($row['position']).' </td>
                                        <td> '.strtoupper($row['lastname']).', '.strtoupper($row['firstname']).' '.strtoupper($row['middlename'][0]).'. </td>
                                        <td> '.strtoupper($row['address']).' </td>
                                        <td> '.strtoupper($row['contactNo']).' </td>
                                        ';
                            ?>
                                        
                                        <td>
                                            <form action="function.php" method="POST" class="d-inline">
                                                <button type="button" class="button-color btn btn-sm" title="View" data-bs-toggle="modal" data-bs-target="#View_Official<?php echo $row['id']; ?>"><i class="bi bi-eye-fill"></i></button>
                                                <button type="button" class="button-color btn btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#Edit_Official<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></button>
                                                <!-- <button type="button" class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#Delete_Official<?php echo $row['id']; ?>"><i class="bi bi-trash-fill"></i></button> -->
                                            </form>
                                        </td>

                                        <td class="col">
                                            <?php


                                                if($row['status'] == "Active")
                                                {
                                                    echo '
                                                        <form action="function.php" method="GET">
                                                            <button type="button" class="btn btn-success" title="select to change" data-bs-toggle="modal" data-bs-target="#setInactive'.$row['id'].'">'.$row['status'].'</button>
                                                        </form>
                                                    ';
                                                }

                                                if($row['status'] == "Inactive")
                                                {
                                                    echo '
                                                        <form action="function.php" method="GET">
                                                            <button type="button" class="btn btn-success" title="select to change" data-bs-toggle="modal" data-bs-target="#setInactive'.$row['id'].'">'.$row['status'].'</button>
                                                        </form>
                                                    ';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    include 'Inactive.php';
                                    include 'Active.php';
                                    include 'view_official.php';
                                    include 'edit_official.php';
                                    include 'delete_official.php';
                                    
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- add modal-->
                <?php include ('add_official.php'); ?>
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