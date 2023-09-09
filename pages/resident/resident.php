<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';
?>
    <div class="container px-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-2">Resident List</h1>
                <hr>
                <div class="card d.flex">
                    <div class="card-header">
                        <button type="button" class="button-color btn float-start" id="takepicture" title="Create" data-bs-toggle="modal" data-bs-target="#Add_Resident">
                            New <i class="bi bi-person-fill-add"></i>
                        </button>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped" id="myTable">
                            <thead>
                                <tr class="col text-center">
                                    <th class="col">Image</th> 
                                    <th class="col">Name</th> 
                                    <th class="col-md-5">Address</th>
                                    <th class="col-md-1">Age</th> 
                                    <th class="col-md-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                <?php
                                
                                
                                    include '../connection.php';
                                    $query ="SELECT FORMAT (getdate(), 'MMM dd yyyy') as date";
                                    $stmt = $con->prepare("SELECT *, CONCAT('#',houseno,' Purok ',purokNo,' ',barangay,' ',city,' ',province) as address FROM tblresident");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while ($resident = $result->fetch_assoc()):
                                
                                ?>

                                    <tr class="text-center">
                                        <td style="width: 70px;">
                                        
                                        <?php

                                            $image = $resident['captured_image'];

                                            $userpic = $image;
                                            $default = "img/default1.png";

                                            if(file_exists($userpic)){
                                                $profile_picture = $userpic;
                                            }else{
                                                $profile_picture = $default;
                                            }
                                            if(isset($profile_picture))
                                            {
                                                echo '<image src="'.$profile_picture.'" style="width: 60px; height: 60px;" />';
                                            }
                                        ?>
                                        </td>
                                        <td> <?php echo strtoupper($resident['lastname']); ?>, <?php echo strtoupper($resident['firstname']); ?> <?php echo strtoupper($resident['middlename'][0]); ?> </td>
                                        <td> <?php echo strtoupper($resident['address']); ?> </td>
                                        <td> <?php echo strtoupper($resident['age']); ?> </td>
                                    
                                
                                        <td class="col-2">
                                            <form action="function.php" method="POST" class="d-inline">
                                                <button type="button" class="button-color btn btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_Resident<?php echo $resident['id']; ?>" >Edit <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete_Resident<?php echo $resident['id']; ?>">Delete <i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                            
                                <?php
                                    
                                    include 'resident-edit.php'; 
                                    include 'resident-delete.php';

                                ?>
                                <?php endwhile; ?>
                            </tbody>
                            
                            
                        </table>
                    </div>
                    <!-- add modal-->
                    <?php include ('resident-create.php'); ?>
                </div>
            </div>
        </div>
    </div>

    
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