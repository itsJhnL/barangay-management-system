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

                <h1>Certificate of Barangay Clearance</h1>
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
                                    <!-- <th class="col">Gender</th> -->
                                    <th class="col-4">Address</th>
                                    <th class="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="showdata">
                                
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
                                                <form action="cert/barangay_form.php" target="_blank" id="option" method="GET" class="d-inline">
                                                    <input type="hidden" name="id" value="<?php if(isset($_GET['id']))/* {echo $_GET['id'];} */ ?>" class="form-control">
                                                    <button type="submit" class="button-color btn btn-sm" title="Print" name="id" form="option" value='<?php echo $row['id'];?>' onClick="window.location.reload();" id="generated">Generate</button>
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
    /* $(document).ready(function(){
        $('#generated').on("keyup", function(){
            var generate = $(this).val();
            $.ajax({
            method:'POST',
            url:'generated.php',
            data:{generated:generate},
            success:function(response)
            {
                    $("#showdata").html(response);
                    alert."Success";
            } 
            });
        });
    }); */

    /* $(document).on('click','#generated',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "generated.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addEmployeeModal').modal('hide');
						alert('Data added successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	}); */
    </script>


<?php 
include '../../includes/scripts.php';
include '../../includes/footer.php';

?>