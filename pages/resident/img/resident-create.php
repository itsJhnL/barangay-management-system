<form action="function.php" method="POST">
  <!-- 1st modal Resident Information -->
  <div class="modal fade" id="Add_Resident" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Resident's Personal Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center d.flex pb-3">
            <?php 

              $query = mysqli_query($con, "SELECT image FROM dashboard");
              {
              while($row = mysqli_fetch_array($query))
              echo'
              <image src="../settings/img/'.basename($row['image']).'" style="border-radius: 50%" alt="" class="w-auto" height="150">';

              }

            ?>
          </div>
            <div class="row g-2 mb-2">
              <div class="col">
                <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']; ?>">
                <input type="hidden" name="causeofdeath" value="">
                <label><b>Last Name</b></label>
                <input type="text" class="form-control" name="lastname" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
              </div>
              <div class="col">
                <label><b>First Name</b></label>
                <input type="text" class="form-control" name="firstname" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
              </div>
              <div class="col">
                <label><b>Middle Name</b></label>
                <input type="text" class="form-control" name="middlename" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
              </div>
              <div class="col-md-2">
                <label><b>Suffix</b></label>
                <select class="form-select" name="suffixname" aria-label="Name Extension" >
                  <option selected></option>
                  <option>Jr.</option>
                  <option>Sr.</option>
                  <option>I</option>
                  <option>II</option>
                  <option>III</option>
                  <option>IV</option>
                </select>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-6 mb-3">
                <label><b>Gender</b></label>
                <select class="form-select" name="gender" autocomplete="off" required>
                  <option value="MALE">MALE</option>
                  <option value="FEMALE">FEMALE</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label><b>Birthdate</b></label>
                <input type="date" class="form-control" id="bday" name="birthdate" autocomplete="off" required>
              </div>
              <div class="col-md-2 mb-3">
                <label><b>Age</b></label>
                <input type="text" class="form-control" id="age" name="age" readonly>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Address</b></label>
              </div>

              <div class="col-md-6 mb-3">
                <select class="form-select" name="province" id="Province">
                  <option value="" selected disabled>Select Province</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-select" name="city" id="CityTown">
                  <option value="" selected disabled>Select City/Town</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-select" name="barangay" id="Barangay">
                  <option value="" selected disabled>Select Barangay</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <input type="text" class="form-control" name="houseNo" placeholder="House Number" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
              <div class="col-md-3 mb-3">
                <input type="text" class="form-control" name="purokNo" placeholder="Purok Number" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-12 mb-3">
                  <label><b>Contact Information</b></label>
              </div>
              <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" name="contactNo" maxlength="11" minlength="11" placeholder="Your Contact Number" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
              <div class="col-md-6 mb-3">
                  <input type="email" class="form-control" name="emailAddress" placeholder="Your Email Address (Optional)" autocomplete="off" oninput="this.value = this.value.toUpperCase()" required>
              </div>
              <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" name="motherName" placeholder="Mother's Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
              </div>
              <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" name="motherContactNo" maxlength="11" minlength="11" placeholder="Your Mother's Contact Number" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
              <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" name="fatherName" placeholder="Father's Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
              </div>
              <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" name="fatherContactNo" maxlength="11" minlength="11" placeholder="Your Father's Contact Number" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-12 mb-3">
                <label><b>Additional Information</b></label>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="height" placeholder="Height (in cm)"  autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="weight" placeholder="Weight (in kg)" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="nationality" placeholder="Nationality" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
              </div>
            </div>
            <div class="row g-2">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="civil-status"><b>Civil Status</b></label>
                  <select class="form-select" id="civil-status" name="civil-status" onchange="showSpouse()">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    <option value="widowed">Widowed</option>
                  </select>
                </div>
              
                <div class="col-md-8 mb-2">
                  <label for="spouse-name"><b></b></label>
                  <input type="text" class="form-control" id="spouse-name" placeholder="Spouse Name" name="spouse-name" style="display: none;">
                </div>
              </div>
            </div>

            <div class="row" id="spouse-children-fields" style="display: none;">
              <div class="col-md-4 mb-3">
                <label for="num-children"><b>Number of Children</b></label>
                <input type="number" class="form-control" id="num-children" name="num-children" onchange="showChildFields()">
              </div>
            </div>

            <div id="child-name-fields"></div>

            <script>
              function showSpouse() {
                var civilStatus = document.getElementById("civil-status").value;
                var spouseNameField = document.getElementById("spouse-name");
                var spouseChildrenFields = document.getElementById("spouse-children-fields");
                if (civilStatus == "married") {
                  spouseNameField.style.display = "block";
                  spouseChildrenFields.style.display = "block";
                } else {
                  spouseNameField.style.display = "none";
                  spouseChildrenFields.style.display = "none";
                }
              }

              function showChildFields() {
                var numChildren = document.getElementById("num-children").value;
                var childNameFields = document.getElementById("child-name-fields");
                childNameFields.innerHTML = "";

                for (var i = 1; i <= numChildren; i++) {
                  var childNameField = `
                    <div class="row">
                      <div class="col-md-8 mb-2">
                        <input type="text" class="form-control" placeholder="Child ${i} Name" id="child-${i}-name" name="child-${i}-name">
                      </div>
                      <div class="col-md-6 mb-3"></div>
                    </div>
                  `;
                  childNameFields.innerHTML += childNameField;
                }
              }
            </script>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  
              <button type="button" class="button-color btn" data-bs-target="#Add_Residents2" data-bs-toggle="modal">Next</button>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 2nd Modal Educational Background -->
  <div class="modal fade" id="Add_Residents2" aria-hidden="true" aria-labelledby="Add_Residents2" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Add_Residents2">Educational Background (Optional)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="container">
          <div class="row g-2">
          <div class="col-md-12 mb-3">
              <label><b>College</b></label>
          </div>
          <div class="col-md-6">
              <input type="text" class="form-control" name="course" placeholder="Course" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
          </div>
          <div class="col-md-6 mb-3">
              <input type="text" class="form-control" name="CSchoolName" placeholder="School Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
          </div>
          <div class="col-md-6 mb-3">
              <input type="text" class="form-control" name="CSchoolAddress" placeholder="School Address" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
          </div>
          <div class="col-md-6 mb-3">
              <input type="text" class="form-control" name="CYearAttended" placeholder="Year Attended Ex: 2012-2016" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
          </div>
          </div>

          <div class="row g-2">
          <div class="col-md-12 mb-3">
              <label><b>High School</b></label>
          </div>
          <div class="col mb-3">
              <input type="text" class="form-control" name="HSchoolName" placeholder="School Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
          </div>
          <div class="col mb-3">
              <input type="text" class="form-control" name="HSchoolAddress" placeholder="School Address" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
          </div>
          <div class="col mb-3">
              <input type="text" class="form-control" name="HYearAttended" placeholder="Year Attended Ex: 2012-2016" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
          </div>
          </div>

          <div class="row g-2">
          <div class="col-md-12 mb-3">
              <label><b>Elementary</b></label>
          </div>
          <div class="col mb-3">
              <input type="text" class="form-control" name="ESchoolName" placeholder="School Name" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
          </div>  
          <div class="col mb-3">
              <input type="text" class="form-control" name="ESchoolAddress" placeholder="School Address" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
          </div>
          <div class="col mb-3">
              <input type="text" class="form-control" name="EYearAttended" placeholder="Year Attended Ex: 2012-2016" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
          </div>
          </div>
          </div>
        </div>
        <div class="modal-footer float-start">
          <button type="button" class="btn btn-secondary" data-bs-target="#Add_Resident" data-bs-toggle="modal">Previous</button>
          <button type="button" class="button-color btn" id="takepicture" data-bs-target="#takepictureModal" data-bs-toggle="modal">Next</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 3rd modal Capture -->
  <div class="modal fade" id="takepictureModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Take Picture</h5>
          <button type="button" class="btn-close" id="closeCam" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center text-center">
          <label>Capture live photo</label>
          <div id="my_camera" class="pre_capture_frame border border-dark rounded"></div>
          <input type="hidden" name="captured_image" id="captured_image_data" autocomplete="off">
          <br>
          <div class="row g-2">
            <div class="col">
              <input type="button" id="captureBtn" class="button-color btn" value="Capture">
            </div>
            <div class="col">
              <input type=button id="takepicture1" class="btn btn-secondary"  value="Reset" onClick="Webcam.reset()">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="closeCam1" data-bs-target="#Add_Residents2" data-bs-toggle="modal">Previous</button>
          <button type="button" class="button-color btn" id="closeCam2" data-bs-target="#Add_Residents3" data-bs-toggle="modal">Next</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 4th Modal Business -->
  <div class="modal fade" id="Add_Residents3" aria-hidden="true" aria-labelledby="Add_Residents3" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Add_Residents3">Business Information (Optional)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row g-2">
              <div class="col-md-6">
                <label for="businessIDField">Business ID</label>
                <input type="text" class="form-control" name="BusinessID" id="businessIDField" autocomplete="off" oninput="this.value = this.value.toUpperCase()">
                
              </div>
              <div class="col-md-6">
                <label>Business Nature</label>
                <input type="text" class="form-control" name="BusinessNature" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
              </div>
              <div class="col-md-6">
                <label>Business Name</label>
                <input type="text" class="form-control" name="BusinessName" autocomplete="off" oninput="this.value = this.value.toUpperCase()" >
              </div>
              <div class="col-md-6">
                <label>Business Owner</label>
                <input type="text" class="form-control" name="BusinessOwner" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
              </div>
              <div class="col-md-6">
                <label>Owner Address</label>
                <input type="text" class="form-control" name="BusinessOwnerAddress" autocomplete="off" oninput="this.value = this.value.toUpperCase()" >
              </div>
              <div class="col-md-6 mb-2">
                <label>Contact Number</label>
                <input type="text" class="form-control" maxlength="11" minlength="11" name="BusinessContactNumber" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
              <div class="col-md-12">
                <label>Business Address</label>
              </div>
              <div class="col-md-3">
                <label>Building No.</label>
                <input type="text" class="form-control" name="BusinessBldgNo" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
              <div class="col-md-3">
                <label>Purok No.</label>
                <input type="text" class="form-control" name="BusinessPurokNo" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
              <div class="col-md-6">
                <label>Barangay</label>
                <input type="text" class="form-control" name="BusinessBarangay" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
              </div>
              <div class="col-md-6">
                <label>Municipality</label>
                <input type="text" class="form-control" name="BusinessMunicipality" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
              </div>
              <div class="col-md-6">
                <label>Province</label>
                <input type="text" class="form-control" name="BusinessProvince" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer float-end">
          <button type="button" class="btn btn-secondary" id="takepicture2" data-bs-target="#takepictureModal" data-bs-toggle="modal">Previous</button>
          <button type="submit" name="save_resident" class="btn btn-primary" onclick="saveSnap()">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Script for business id -->
<script>
    window.onload = function() {
      var lastID = localStorage.getItem("lastBusinessID");
      var nextID = lastID ? parseInt(lastID) + 1 : 1;
      var businessID = "RS" + String(nextID).padStart(7, '0');
      document.getElementById('businessIDField').value = businessID;
      localStorage.setItem("lastBusinessID", nextID);
    };
  </script>
<!-- Script for Civil status -->

<!-- <script>
  function showSpouseANDChildrenFields() {
    var civilStatus = document.getElementById("civilStatus").value;
    var spouseNameField = document.getElementById("spouse-name");
    var spouseChildrenFields = document.getElementById("spouse-children-fields");
    if (civilStatus == "married") {
      spouseNameField.style.display = "block";
      spouseChildrenFields.style.display = "block";
    } else {
      spouseNameField.style.display = "none";
      spouseChildrenFields.style.display = "none";
    }
  }

  function showChildNameFields() {
    var numChildren = document.getElementById("num-children").value;
    var childNameFields = document.getElementById("child-name-fields");
    childNameFields.innerHTML = "";

    for (var i = 1; i <= numChildren; i++) {
      var childNameField = `
        <div class="col-md-6">
          <div class="col mb-2">
            <input type="text" class="form-control" name="childrenName" placeholder="Child ${i} Name" id="child-${i}-name" name="child-${i}-name">
          </div>
          <div class="col mb-3"></div>
        </div>
      `;
      childNameFields.innerHTML += childNameField;
    }
  }
</script> -->


<!-- Calculate Age -->
<!-- <script src="js/age.js"></script> -->
<!-- <script>
  function calculateAge() {
  // Get the birthdate input field
  const birthdayInput = document.getElementById("bday");
  
  // Get the age input field
  const ageInput = document.getElementById("age");
  
  // Calculate the age based on the birthdate
  const birthdate = new Date(birthdayInput.value);
  const now = new Date();
  const diff = now.getTime() - birthdate.getTime();
  const age = Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25));
  
  // Update the age input field
  ageInput.value = age;
  }
</script> -->

  <!-- Capture -->
<script language="JavaScript">
	 // Configure a few settings and attach camera 250x187
	 Webcam.set({
	  width: 600,
	  height: 600,
	  image_format: 'jpeg',
	  jpeg_quality: 90
	 });	 

    // enable camera.
     document.getElementById('takepicture').addEventListener('click', function() {
        Webcam.attach( '#my_camera' );
    });
    document.getElementById('takepicture1').addEventListener('click', function() {
        Webcam.attach( '#my_camera' );
    });
    document.getElementById('takepicture2').addEventListener('click', function() {
        Webcam.attach( '#my_camera' );
    });


    document.getElementById('captureBtn').addEventListener('click', function() {
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('my_camera').innerHTML = 
        '<img id="my_camera" src="'+data_uri+'"/>';
        $("#captured_image_data").val(data_uri);
        });	
    });

    //this function will close the camera once click next/previous/exit.
    document.getElementById('closeCam').addEventListener('click', function() {
        Webcam.reset();
    });
    document.getElementById('closeCam1').addEventListener('click', function() {
        Webcam.reset();
    });
    document.getElementById('closeCam2').addEventListener('click', function() {
        Webcam.reset();
    });

  function saveSnap()
  {
    var base64data = $("#captured_image_data").val();
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "function.php",
      data: {image: base64data},
      success: function(data) { 
      alert(data);
      }
    });
	}
</script>


<!-- Address dropdown -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "function.php",
  			type : "POST",
  			data: {type : "province"},
  			success : function(data){
          $("#Province").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

    function loadCity(province){
  		$.ajax({
  			url : "function.php",
  			type : "POST",
  			data: {type : "City", province : province},
  			success : function(data){
          $("#CityTown").html("");
          $("#CityTown").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

    function loadBarangay(CityTown){
  		$.ajax({
  			url : "function.php",
  			type : "POST",
  			data: {type : "Barangay", CityTown : CityTown},
  			success : function(data){
          $("#Barangay").html("");
          $("#Barangay").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

  	loadData();

  	$("#Province").on("change",function(){
  		var Province = $("#Province").val();

  		if(Province != ""){
  			loadCity(Province);
  		}else{
  			$("#City").html("");
  		}
  	})

    $("#CityTown").on("change",function(){
  		var City = $("#CityTown").val();

  		if(City != ""){
  			loadBarangay(City);
  		}else{
  			$("#CityTown").html("");
  		}
  	})

    $("#bday").on("input",function(){
      var bdate = $(this).val();
      var bdateformat = new Date(bdate);
      var diff_ms =  Date.now() - bdateformat.getTime();
      var age_dt = new Date(diff_ms);
      var age = Math.abs(age_dt.getUTCFullYear() - 1970);
      $("#age").val(age);
    })

  });
</script>

<!-- RegEx -->
<script>
  function lettersOnly (input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace (regex, "");
  }
</script>