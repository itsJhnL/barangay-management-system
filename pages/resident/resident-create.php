<form action="function.php" method="POST">

  <!-- 1st modal Capture -->
  <div class="modal fade" id="Add_Resident" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Take Picture</h5>
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
          <button type="button" class="btn btn-secondary" id="closeCam1" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="button-color btn" id="closeCam2" data-bs-target="#Add_Resident1" data-bs-toggle="modal">Next</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 2nd modal Resident Information -->
  <div class="modal fade" id="Add_Resident1" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <input type="text" class="form-control" name="middlename" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
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
                  <option value="" selected disabled>Select Gender</option>
                  <option value="MALE">MALE</option>
                  <option value="FEMALE">FEMALE</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label><b>Birthdate</b></label>
                <input class="form-control" type="date" id="bday" name="birthdate" onchange="birth(this)" required>
                <!-- <input class="form-control" type="hidden" id="birthday" name="birthdate" readonly> -->
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
                <select class="form-select" name="province" id="Province" required>
                  <option value="" selected disabled>Select Province</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-select" name="city" id="CityTown" required>
                  <option value="" selected disabled>Select City/Town</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-select" name="barangay" id="Barangay" required>
                  <option value="" selected disabled>Select Barangay</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <input type="text" class="form-control" name="houseNo" placeholder="House Number" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
              <div class="col-md-3 mb-3">
                <input type="text" class="form-control" name="purokNo" placeholder="Purok Number" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="KuryenteAccountNo" placeholder="Account Number sa Kuryente/If necessary" autocomplete="off" oninput="this.value = this.value.toUpperCase()">
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="income" id="income"  placeholder="Monthly Income/If necessary" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="work" placeholder="Trabaho/If necessary" autocomplete="off" oninput="this.value = this.value.toUpperCase()">
              </div>
              <div class="col-md-6 mb-3">
                <!-- <label><b>Civil Status</b></label> -->
                <select class="form-select" id="civil-status" name="civilStatus" onchange="showSpouse()" required>
                  <option selected disabled value="status">Select Status</option>
                  <option value="SINGLE">SINGLE</option>
                  <option value="MARRIED">MARRIED</option>
                  <option value="DIVORCED">DIVORCED</option>
                  <option value="WIDOWED">WIDOWED</option>
                  <option value="SEPARATED">SEPARATED</option>
                </select>
              </div>
            </div>
            
            <div class="row" id="children1" style="display: none;">
              <div class="col-md-6 mb-3" id="showSpouseField">
                <label><b>Spouse Name:</b></label>
                <input type="text" class="form-control" id="SpouseName" placeholder="Spouse Name" name="spouseName" value="" style="display: none;">
              </div>
              <label><b>Children/s:</b></label>
              <div class="col-md-6 mb-3" style="float: right;"> <!-- id="children2" -->
                <input type="text" class="form-control" id="child2" placeholder="Children 2" name="children2" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" > <!-- id="children1" -->
                <input type="text" class="form-control" id="child1" placeholder="Children 1" name="children1" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" style="float: right;"> <!-- id="children4" -->
                <input type="text" class="form-control" id="child4" placeholder="Children 4" name="children4" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" > <!-- id="children3" -->
                <input type="text" class="form-control" id="child3" placeholder="Children 3" name="children3" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" style="float: right;"> <!-- id="children6" -->
                <input type="text" class="form-control" id="child6" placeholder="Children 6" name="children6" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" > <!-- id="children5" -->
                <input type="text" class="form-control" id="child5" placeholder="Children 5" name="children5" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" style="float: right;"> <!-- id="children8" -->
                <input type="text" class="form-control" id="child8" placeholder="Children 8" name="children8" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" > <!-- id="children7" -->
                <input type="text" class="form-control" id="child7" placeholder="Children 7" name="children7" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" style="float: right;"> <!-- id="children10" -->
                <input type="text" class="form-control" id="child10" placeholder="Children 10" name="children10" style="display: none;">
              </div>
              <div class="col-md-6 mb-3" > <!-- id="children9" -->
                <input type="text" class="form-control" id="child9" placeholder="Children 9" name="children9" style="display: none;">
              </div>
            </div>

            <hr>

            <div class="col-md-12 mb-3">
              <label><b>Educational Background (Optional)</b></label>
            </div>
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

            <hr>

            <div class="col-md-12 mb-3">
              <label><b>Business Information (Optional)</b></label>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md-6">
                <label for="businessIDField">Business ID (Auto Generate)</label>
                <input type="text" class="form-control" name="BusinessID" id="businessIDField" autocomplete="off" oninput="this.value = this.value.toUpperCase()" readonly>
                
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
              <div class="col-md-6 mb-2">
                <label for="date">Started Date:</label>
                <input class="form-control" type="text" id="date" name="BusinessDateStart" onchange="formatDate(this)">
                <!-- <input class="form-control" type="hidden" id="businessformatted"  readonly> -->
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
            <input type="text" style="display: none;" value="" name="nameoffamily">
            <input type="text" style="display: none;" value="" name="relationship">
            <input type="text" style="display: none;" value="" name="dateofdeath">
            <input type="text" style="display: none;" value="" name="timeofdeath">


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="takepicture2" data-bs-target="#Add_Resident" data-bs-toggle="modal">Previous</button>
              <button type="submit" name="save_resident" class="btn btn-primary" onclick="saveSnap()">Submit</button>
            </div>
        </div>
      </div>
    </div>
  </div>

<script>
  //Business Start Date
  // function formatDate(input) {
  //   const dateValue = input.value;
  //   const date = new Date(dateValue);
    
  //   const day = date.getDate();
  //   const month = date.toLocaleString('default', { month: 'long' });
  //   const year = date.getFullYear();
    
  //   const formattedDate = month + ' ' + day + ' ' + year;
    
  //   document.getElementById('businessformatted').value = formattedDate;
  // }

  // //Birthdate
  // function birth(input) {
  //   const BdaydateValue = input.value;
  //   const Bdaydate = new Date(BdaydateValue);
    
  //   const day = Bdaydate.getDate();
  //   const month = Bdaydate.toLocaleString('default', { month: 'long' });
  //   const year = Bdaydate.getFullYear();
    
  //   const formattedDate = month + ' ' + day + ' ' + year;
    
  //   document.getElementById('birthday').value = formattedDate;
  // }

  //Script for business id
  window.onload = function() {
    let lastID = localStorage.getItem("lastBusinessID");
    let nextID = lastID ? parseInt(lastID) + 1 : 1;
    let businessID = "RS" + String(nextID).padStart(7, '0');
    document.getElementById('businessIDField').value = businessID;
    localStorage.setItem("lastBusinessID", nextID);
  };

  //Income numbers with coma
  document.addEventListener('DOMContentLoaded', function() {
  var incomeInput = document.getElementById('income');

  incomeInput.addEventListener('input', function() {
    var input = incomeInput.value;
    // Remove non-digit characters
    input = input.replace(/[^0-9.]/g, '');
    // Format the number
    input = formatCurrency(input);
    incomeInput.value = input;
  });

  function formatCurrency(value) {
    // Remove leading zeros
    value = value.replace(/^0+/, '');
    // Remove any non-digit characters except the dot
    value = value.replace(/[^0-9.]/g, '');
    // Split the value into integer and decimal parts
    var parts = value.split('.');
    var integerPart = parts[0];
    var decimalPart = parts[1] || '';
    // Add thousand separators to the integer part
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    // Limit the decimal part to 2 digits
    decimalPart = decimalPart.substring(0, 2);
    // Combine the integer and decimal parts with the currency symbol
    return '₱' + integerPart + (decimalPart.length > 0 ? '.' + decimalPart : '');
  }
  });

  //Marital Status
  function showSpouse() {
    var civilStatus = document.getElementById("civil-status").value;
    var spouseNameField = document.getElementById("SpouseName");
    var child1 = document.getElementById("child1");
    var child2 = document.getElementById("child2");
    var child3 = document.getElementById("child3");
    var child4 = document.getElementById("child4");
    var child5 = document.getElementById("child5");
    var label = document.getElementById("label");
    if (civilStatus == "MARRIED") {
      spouseNameField.style.display = "block";
      showSpouseField.style.display = "block";
      child1.style.display = "block";
      child2.style.display = "block";
      child3.style.display = "block";
      child4.style.display = "block";
      child5.style.display = "block";
      child6.style.display = "block";
      child7.style.display = "block";
      child8.style.display = "block";
      child9.style.display = "block";
      child10.style.display = "block";
      children1.style.display = "block";
      children2.style.display = "block";
      children3.style.display = "block";
      children4.style.display = "block";
      children5.style.display = "block";
      children6.style.display = "block";
      children7.style.display = "block";
      children8.style.display = "block";
      children9.style.display = "block";
      children10.style.display = "block";
      
    }
    else if (civilStatus == "DIVORCED") {
      spouseNameField.style.display = "none";
      showSpouseField.style.display = "none";
      child1.style.display = "none";
      child2.style.display = "none";
      child3.style.display = "none";
      child4.style.display = "none";
      child5.style.display = "none";
      child6.style.display = "none";
      child7.style.display = "none";
      child8.style.display = "none";
      child9.style.display = "none";
      child10.style.display = "none";
      children1.style.display = "none";
      children2.style.display = "none";
      children3.style.display = "none";
      children4.style.display = "none";
      children5.style.display = "none";
      children6.style.display = "none";
      children7.style.display = "none";
      children8.style.display = "none";
      children9.style.display = "none";
      children10.style.display = "none";
      label.style.display = "none";
    }
    else if (civilStatus == "WIDOWED"){
      spouseNameField.style.display = "none";
      showSpouseField.style.display = "none";
      child1.style.display = "none";
      child2.style.display = "none";
      child3.style.display = "none";
      child4.style.display = "none";
      child5.style.display = "none";
      child6.style.display = "none";
      child7.style.display = "none";
      child8.style.display = "none";
      child9.style.display = "none";
      child10.style.display = "none";
      children1.style.display = "none";
      children2.style.display = "none";
      children3.style.display = "none";
      children4.style.display = "none";
      children5.style.display = "none";
      children6.style.display = "none";
      children7.style.display = "none";
      children8.style.display = "none";
      children9.style.display = "none";
      children10.style.display = "none";
      label.style.display = "none";
    }
    else if (civilStatus == "WIDOWED"){
      spouseNameField.style.display = "none";
      showSpouseField.style.display = "none";
      child1.style.display = "none";
      child2.style.display = "none";
      child3.style.display = "none";
      child4.style.display = "none";
      child5.style.display = "none";
      child6.style.display = "none";
      child7.style.display = "none";
      child8.style.display = "none";
      child9.style.display = "none";
      child10.style.display = "none";
      children1.style.display = "none";
      children2.style.display = "none";
      children3.style.display = "none";
      children4.style.display = "none";
      children5.style.display = "none";
      children6.style.display = "none";
      children7.style.display = "none";
      children8.style.display = "none";
      children9.style.display = "none";
      children10.style.display = "none";
      label.style.display = "none";
    }
    else {
      spouseNameField.style.display = "none";
      showSpouseField.style.display = "none";
      child1.style.display = "none";
      child2.style.display = "none";
      child3.style.display = "none";
      child4.style.display = "none";
      child5.style.display = "none";
      child6.style.display = "none";
      child7.style.display = "none";
      child8.style.display = "none";
      child9.style.display = "none";
      child10.style.display = "none";
      children1.style.display = "none";
      children2.style.display = "none";
      children3.style.display = "none";
      children4.style.display = "none";
      children5.style.display = "none";
      children6.style.display = "none";
      children7.style.display = "none";
      children8.style.display = "none";
      children9.style.display = "none";
      children10.style.display = "none";
      label.style.display = "none";
    }
  }
</script>

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