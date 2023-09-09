<?php
    include '../connection.php';

    
?>

<?php 
include '../../includes/header.php';
?>

    <div class="container mt-4">

        
        <?php //include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">

                <h1>Certificate of Residency</h1>
                <hr>

                <div class="card">
                    <div class="card-header">
                        <!-- search bar -->
                        <div class="col-4  ms-auto">
                            <input class="form-control mr-sm-2" type="search" placeholder="Type to search" aria-label="Search" aria-describeby="btnNavbarSearch" id="myInput" onkeyup="myFunction()">
                        </div>
                    </div>
                    
                    <div class="card-body">

                        <table id="myTable" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr class="text-center">

                                    <!-- <th class="col">#</th> -->
                                    <th class="col-3">Resident Name</th>
                                    <th class="col">Age</th>
                                    <th class="col-4">Address</th>
                                    <th class="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- <td scope='row'>
                                            <div class='text-center'>
                                                <label class='radio'>
                                                    <input type='radio' class='hidden message' name='stud_id' form='option' required value='$row[id]'>
                                                    <span class='label'></span>
                                                </label>
                                            </div>
                                            </td> -->
                                
                                <?php
                                    $sql = "SELECT * FROM tblresident";
                                    $stmt = $con->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while($row = $result->fetch_assoc()) {
                                        echo "
                                        <tr>
                                            
                                            <td>$row[lastname] $row[firstname] $row[middlename]</td>
                                            <td>$row[age]</td>
                                            <td>$row[houseNo] $row[purokNo] $row[barangay] $row[city] $row[province]</td>";
                                        ?>
                                            <td class="text-center">
                                                <form action="cert/residency_form.php" target="_blank" id="option" method="GET" class="d-inline">
                                                    <input type="hidden" name="id" value="<?php if(isset($_GET['id']))/* {echo $_GET['id'];} */ ?>" class="form-control">
                                                    <button type="submit" class="button-color btn btn-sm" title="Print" name="id" form="option" value='<?php echo $row['id'];?>'>Generate</button>
                                                </form>
                                            </td>
                                            
                                        
                                        </tr>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        
        //Search function
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                } else {
                tr[i].style.display = "none";
                }
            }       
            }
        }
    </script>


<?php 
    include '../../includes/scripts.php';
include '../../includes/footer.php';

?>