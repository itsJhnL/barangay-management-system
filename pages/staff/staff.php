<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';
?>
    
    <div class="container px-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-2">Staff list</h1>
                <hr>
                <div class="card d.flex">
                    <div class="card-header">
                        <button type="button" class="button-color btn float-start" title="Create" data-bs-toggle="modal" data-bs-target="#Add_Staff">
                            New <i class="bi bi-person-fill-add"></i>
                        </button>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped" id="reportTable">
                            <thead>
                                <tr class="col text-center">
                                    <th class="col">#</th>
                                    <th class="col">Full Name</th> 
                                    <th class="col">Address</th>
                                    <th class="col">Contact No.</th>
                                    <th class="col">Gender</th> 
                                    <th class="col">Username</th>
                                    <th class="col-sm-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                include '../connection.php';
                                $stmt = $con->prepare("SELECT *, concat(barangay,', ',City,', ',province,' ') as address FROM tblstaff");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                // $grand_total = 0;
                                while ($staff = $result->fetch_assoc()):
                            ?>

                                
                                <tr class="text-center">
                                    <td><?php echo $staff['id'] ; ?></td>
                                    <td><?php echo strtoupper($staff['lastname']) ; ?>, <?php echo strtoupper($staff['firstname']) ; ?> <?php echo strtoupper($staff['middlename'][0]) ; ?>.</td>
                                    <td><?php echo strtoupper($staff['address']) ; ?></td>
                                    <td><?php echo strtoupper($staff['contactNo']) ; ?></td>
                                    <td><?php echo strtoupper($staff['gender']) ; ?></td>
                                    <td><?php echo $staff['username'] ; ?></td>
                                    
                                    <td class="text-center">
                                        <form action="function.php" method="POST" class="d-inline">
                                            <button type="button" class="button-color btn btn-sm" title="View" data-bs-toggle="modal" data-bs-target="#View_Staff<?php echo $staff['id']; ?>"><i class="fa-solid fa-eye"></i></button>
                                            <button type="button" class="button-color btn btn-sm " title="Edit" data-bs-toggle="modal" data-bs-target="#Edit_Staff<?php echo $staff['id']; ?>" ><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#Delete_Staff<?php echo $staff['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    include 'staff-edit.php'; 
                                    include 'staff-delete.php';
                                    include 'staff-view.php';
                                ?>
                                <?php endwhile; ?>
                            </tbody>
                            <?php  ?>
                        </table>
                    </div>
                    <!-- add modal-->
                    <?php include ('staff-create.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <script>
        $(document).ready( function () 
        {
            $('#reportTable').DataTable();
        } );
    </script>
    
<?php 
include 'pagination/pagination.php';
include '../../includes/footer.php';
?>