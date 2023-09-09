


<!-- 1st modal Resident Information -->
<div class="modal fade" id="Edit_Resident<?php echo $resident['id']; ?>" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Resident's Personal Information</h5>
        <button type="button" class="btn-close" id="exitCam" data-bs-dismiss="modal" aria-label="Close" onClick="window.location.reload();"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="function.php" method="POST">
            <div class="row g-2 mb-2">
              <!-- Picture -->
              <div class="d-flex flex-column align-items-center text-center p-3" >                            
                <div id="camera">
                  <a href="<?php echo $resident['captured_image'];?>" target="_blank">
                    <img src="images/<?php echo basename($resident['captured_image']); ?>" class="capture_frame border border-dark rounded" class="w-auto" height="150" alt="Picture">
                  </a>
                </div>
              </div>
              <div class="text-center d.flex pb-3">
                <input class="col-md-4" type="hidden" name="captured_image" id="newCaptured">
              </div>

              <div class="col">
                <input type="hidden" name="id" value="<?php echo $resident['id']?>"/>
                <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>"/>
                <input type="text" class="form-control" value="<?php echo $resident['lastname']?>" name="lastname" autocomplete="off" onkeyup="lettersOnly(this)" oninput="this.value = this.value.toUpperCase()" >
                <small id="emailHelp" class="form-text text-muted">Last Name</small>
              </div>
              <div class="col">
                
                <input type="text" class="form-control" value="<?php echo $resident['firstname']?>" name="firstname"  autocomplete="off" onkeyup="lettersOnly(this)" oninput="this.value = this.value.toUpperCase()" >
                <small id="emailHelp" class="form-text text-muted">First Name</small>
              </div>
              <div class="col">
                
                <input type="text" class="form-control" value="<?php echo $resident['middlename']?>" name="middlename"  autocomplete="off" onkeyup="lettersOnly(this)" oninput="this.value = this.value.toUpperCase()" >
                <small id="emailHelp" class="form-text text-muted">Middle Name</small>
              </div>
              <div class="col-md-2">
                
                <select class="form-select" value="<?php echo $resident['suffixname']?>" name="suffixname" aria-label="Name Extension">
                  <option selected>N/A</option>
                  <option>Jr.</option>
                  <option>Sr.</option>
                  <option>I</option>
                  <option>II</option>
                  <option>III</option>
                  <option>IV</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Suffix</small>
              </div>
            </div>

            <div class="row g-2">
              <div class="col mb-3">
                <?php 
                  if($resident['gender'] == "MALE")
                  {
                    echo'
                    <select class="form-select" name="gender" autocomplete="off">
                      <option value="MALE">'.strtoupper($resident['gender']).'</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Gender</small>
                    ';
                  }

                  else if($resident['gender'] == "FEMALE")
                  {
                    echo'
                    <select class="form-select" name="gender" autocomplete="off">
                      <option value="FEMALE">'.strtoupper($resident['gender']).'</option>
                      <option value="MALE">MALE</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Gender</small>
                    ';
                  }
                ?>
              </div>
              <!-- <div class="col mb-3">
                <input class="form-control" type="text" id="birthdayEdit<?php echo $resident['id']; ?>" value="<?php echo $resident['birthdate']?>" name="birthdate" readonly>
                <small id="emailHelp" class="form-text text-muted">Birthdate</small>
              </div> -->
              <div class="col mb-3">
                <input class="form-control" type="date" id="birthday<?php echo $resident['id']; ?>" name="birthdate" value="<?php echo $resident['birthdate']?>" onchange="mybirthEdit(this)">
                <small id="emailHelp" class="form-text text-muted">Birthdate</small>
              </div>
              <div class="col-md-2 mb-3">
                <input type="text" class="form-control" style="width: 105px;" value="<?php echo $resident['age']?>"  id="editAge<?php echo $resident['id']; ?>" name="age" readonly >
                <small id="emailHelp" class="form-text text-muted">Age</small>
              </div>
            </div>
            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Address</b></label>
              </div>
              <div class="col-md-6 mb-3">
                <input type="hidden" name="province" value="<?php echo $resident['province']; ?>">
                <input type="hidden" name="city" value="<?php echo $resident['city']; ?>">
                <input type="hidden" name="barangay" value="<?php echo $resident['barangay']; ?>">
                <select class="form-select" name="province" id="editProvince<?php echo$resident['id'];?>">
                  <option selected disabled><?php echo $resident['province']; ?></option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Province</small>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-select" name="city" id="editCityTown<?php echo$resident['id'];?>">
                  <option selected disabled><?php echo $resident['city']; ?></option>
                </select>
                <small id="emailHelp" class="form-text text-muted">City</small>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-select" name="barangay" id="editBarangay<?php echo$resident['id'];?>">
                  <option selected disabled><?php echo $resident['barangay']; ?></option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Barangay</small>
              </div>
              <div class="col-md-3 mb-3">
                <input type="text" class="form-control" value="<?php echo $resident['houseNo']; ?>" name="houseNo" placeholder="House No" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                <small id="emailHelp" class="form-text text-muted">House No.</small>
              </div>
              <div class="col-md-3 mb-3">
                <input type="text" class="form-control" value="<?php echo $resident['purokNo']; ?>" name="purokNo" placeholder="Purok No" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                <small id="emailHelp" class="form-text text-muted">Purok No.</small>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Contact Information</b></label>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['contactNo']?>" maxlength="11" name="contactNo" placeholder="Your Contact Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Contact No.</small>
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control" value="<?php echo $resident['emailAddress']?>" name="emailAddress" placeholder="Your Email Address (Optional)" oninput="this.value = this.value.toUpperCase()">
                <small id="emailHelp" class="form-text text-muted">Email Address.</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['motherName']?>" name="motherName" placeholder="Mother's Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Mother's Name.</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['motherContactNo']?>" maxlength="11" name="motherContactNo" placeholder="Your Mother's Contact Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Contact No.</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['fatherName']?>" name="fatherName" placeholder="Father's Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Father's Name.</small>
              </div>
              <div class="col-md-6 mb-5">
                <input type="text" class="form-control" value="<?php echo $resident['fatherContactNo']?>" maxlength="11" name="fatherContactNo" placeholder="Your Father's Contact Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Contact No.</small>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Additional Information</b></label>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['height']?>" name="height" placeholder="Height (in cm)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Height</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['weight']?>" name="weight" placeholder="Weight (in kg)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Weight</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['nationality']?>" name="nationality" placeholder="Nationality" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Nationality</small>
              </div>
              <div class="col-md-6 mb-3">
                <?php 
                  if($resident['civilStatus'] == "MARRIED")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="MARRIED" selected >'.strtoupper($resident['civilStatus']).'</option>
                      <option value="SINGLE">SINGLE</option>
                      <option value="DIVORCED">DIVORCED</option>
                      <option value="WIDOWED">WIDOWED</option>
                      <option value="SEPARATED">SEPARATED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>
                    ';
                  }

                  else if($resident['civilStatus'] == "SINGLE")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="SINGLE" selected>'.strtoupper($resident['civilStatus']).'</option>
                      <option value="MARRIED">MARRIED</option>
                      <option value="DIVORCED">DIVORCED</option>
                      <option value="WIDOWED">WIDOWED</option>
                      <option value="SEPARATED">SEPARATED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>
                    ';
                  }

                  else if($resident['civilStatus'] == "DIVORCED")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="DIVORCED" selected>'.strtoupper($resident['civilStatus']).'</option>
                      <option value="SINGLE">SINGLE</option>
                      <option value="MARRIED">MARRIED</option>
                      <option value="WIDOWED">WIDOWED</option>
                      <option value="SEPARATED">SEPARATED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>

                    <input type="hidden" class="form-control" placeholder="Spouse Name" value="'.$resident['spouseName'].'" name="spouseName">
                    <input type="hidden" class="form-control" placeholder="Spouse Name" value="'.$resident['spouseName'].'" name="spouseName">
                    <input type="hidden" class="form-control" placeholder="Children 1" value="'.$resident['children1'].'" name="children1">
                    <input type="hidden" class="form-control" placeholder="Children 2" value="'.$resident['children2'].'" name="children2">
                    <input type="hidden" class="form-control" placeholder="Children 3" value="'.$resident['children3'].'" name="children3">
                    <input type="hidden" class="form-control" placeholder="Children 4" value="'.$resident['children4'].'" name="children4">
                    <input type="hidden" class="form-control" placeholder="Children 5" value="'.$resident['children5'].'" name="children5">
                    <input type="hidden" class="form-control" placeholder="Children 6" value="'.$resident['children6'].'" name="children6">
                    <input type="hidden" class="form-control" placeholder="Children 7" value="'.$resident['children7'].'" name="children7">
                    <input type="hidden" class="form-control" placeholder="children 8" value="'.$resident['children8'].'" name="children8">
                    <input type="hidden" class="form-control" placeholder="Children 9" value="'.$resident['children9'].'" name="children9">
                    <input type="hidden" class="form-control" placeholder="Children 10" value="'.$resident['children10'].'" name="children10">
                    ';
                  }

                  else if($resident['civilStatus'] == "WIDOWED")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="WIDOWED" selected>'.strtoupper($resident['civilStatus']).'</option>
                      <option value="SINGLE">SINGLE</option>
                      <option value="MARRIED">MARRIED</option>
                      <option value="DIVORCED">DIVORCED</option>
                      <option value="SEPARATED">SEPARATED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>

                    <input type="hidden" class="form-control" placeholder="Spouse Name" value="'.$resident['spouseName'].'" name="spouseName">
                    <input type="hidden" class="form-control" placeholder="Children 1" value="'.$resident['children1'].'" name="children1">
                    <input type="hidden" class="form-control" placeholder="Children 2" value="'.$resident['children2'].'" name="children2">
                    <input type="hidden" class="form-control" placeholder="Children 3" value="'.$resident['children3'].'" name="children3">
                    <input type="hidden" class="form-control" placeholder="Children 4" value="'.$resident['children4'].'" name="children4">
                    <input type="hidden" class="form-control" placeholder="Children 5" value="'.$resident['children5'].'" name="children5">
                    <input type="hidden" class="form-control" placeholder="Children 6" value="'.$resident['children6'].'" name="children6">
                    <input type="hidden" class="form-control" placeholder="Children 7" value="'.$resident['children7'].'" name="children7">
                    <input type="hidden" class="form-control" placeholder="children 8" value="'.$resident['children8'].'" name="children8">
                    <input type="hidden" class="form-control" placeholder="Children 9" value="'.$resident['children9'].'" name="children9">
                    <input type="hidden" class="form-control" placeholder="Children 10" value="'.$resident['children10'].'" name="children10">
                    ';
                  }
                  else if($resident['civilStatus'] == "SEPARATED")
                  {
                    echo'
                    <select class="form-select" name="civilStatus" onchange="showSpouse()" required>
                      <option value="SEPARATED" selected>'.strtoupper($resident['civilStatus']).'</option>
                      <option value="SINGLE">SINGLE</option>
                      <option value="MARRIED">MARRIED</option>
                      <option value="DIVORCED">DIVORCED</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Civil Status</small>

                    <input type="hidden" class="form-control" placeholder="Spouse Name" value="'.$resident['spouseName'].'" name="spouseName">
                    <input type="hidden" class="form-control" placeholder="Children 1" value="'.$resident['children1'].'" name="children1">
                    <input type="hidden" class="form-control" placeholder="Children 2" value="'.$resident['children2'].'" name="children2">
                    <input type="hidden" class="form-control" placeholder="Children 3" value="'.$resident['children3'].'" name="children3">
                    <input type="hidden" class="form-control" placeholder="Children 4" value="'.$resident['children4'].'" name="children4">
                    <input type="hidden" class="form-control" placeholder="Children 5" value="'.$resident['children5'].'" name="children5">
                    <input type="hidden" class="form-control" placeholder="Children 6" value="'.$resident['children6'].'" name="children6">
                    <input type="hidden" class="form-control" placeholder="Children 7" value="'.$resident['children7'].'" name="children7">
                    <input type="hidden" class="form-control" placeholder="children 8" value="'.$resident['children8'].'" name="children8">
                    <input type="hidden" class="form-control" placeholder="Children 9" value="'.$resident['children9'].'" name="children9">
                    <input type="hidden" class="form-control" placeholder="Children 10" value="'.$resident['children10'].'" name="children10">
                    ';
                  }
                ?>
              </div>
              <div class="col mb-3">
                <?php 

                if ($resident['civilStatus'] == "MARRIED")
                {
                  echo'
                    <div class="col mb-3">
                      <input type="text" class="form-control" placeholder="Spouse Name" value="'.$resident['spouseName'].'" name="spouseName">
                      <small id="emailHelp" class="form-text text-muted">Spouse Name</small>
                    </div>
                    <div class="row g-2">
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 1" value="'.$resident['children1'].'" name="children1">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.1</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 2" value="'.$resident['children2'].'" name="children2">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.2</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 3" value="'.$resident['children3'].'" name="children3">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.3</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 4" value="'.$resident['children4'].'" name="children4">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.4</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 5" value="'.$resident['children5'].'" name="children5">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.5</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 6" value="'.$resident['children6'].'" name="children6">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.6</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 7" value="'.$resident['children7'].'" name="children7">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.7</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="children 8" value="'.$resident['children8'].'" name="children8">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.8</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 9" value="'.$resident['children9'].'" name="children9">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.9</small>
                      </div>
                      <div class="col-md-6 mb-3" >
                        <input type="text" class="form-control" placeholder="Children 10" value="'.$resident['children10'].'" name="children10">
                        <small id="emailHelp" class="form-text text-muted">Children Name No.10</small>
                      </div>
                    </div>
                  ';
                }

                ?>
              </div>
            </div>

            <br>
            <!-- Educational Info -->
            <div class="col-md-12">
              <label><b>Educational Background</b></label>
            </div>
            <hr>

            <div class="row g-2">
              <div class="col-md-12">
                  <label><b>College</b></label>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['course']?>" name="course" placeholder="Course" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Course</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['CSchoolName']?>" name="CSchoolName" placeholder="School Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Name</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['CSchoolAddress']?>" name="CSchoolAddress" placeholder="School Address" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Address</small>
              </div>
              <div class="col-md-6 mb-4">
                <input type="text" class="form-control" value="<?php echo $resident['CYearAttended']?>" name="CYearAttended" placeholder="Year Attended Ex: 2012-2016" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Year attended</small>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-12">
                <label><b>High School</b></label>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['HSchoolName']?>" name="HSchoolName" placeholder="School Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Name</small>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['HSchoolAddress']?>" name="HSchoolAddress" placeholder="School Address" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Address</small>
              </div>
              <div class="col mb-4">
                <input type="text" class="form-control" value="<?php echo $resident['HYearAttended']?>" name="HYearAttended" placeholder="Year Attended Ex: 2012-2016" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Year Attended</small>
              </div>
            </div>

            <div class="row g-2">
              <div class="col-md-12">
                <label><b>Elementary</b></label>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['ESchoolName']?>" name="ESchoolName" placeholder="School Name" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Name</small>
              </div>  
              <div class="col">
                <input type="text" class="form-control" value="<?php echo $resident['ESchoolAddress']?>" name="ESchoolAddress" placeholder="School Address" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">School Address</small>
              </div>
              <div class="col mb-4">
                <input type="text" class="form-control" value="<?php echo $resident['EYearAttended']?>" name="EYearAttended" placeholder="Year Attended Ex: 2012-2016" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Year Attended</small>
              </div>
            </div>

            <br>
            <!-- Business Info -->
            <div class="col-md-12 mb-2">
              <label><b>Business Information</b></label>
            </div>
            <hr>
            <div class="row g-2">
              <label><b>Business Address</b></label>
              <div class="col-md-6 mb">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessID']?>" name="BusinessID" readonly>
                <small id="emailHelp" class="form-text text-muted">Business ID</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessNature']?>" name="BusinessNature" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Business Nature</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessName']?>" name="BusinessName" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Business Name</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessOwner']?>" name="BusinessOwner" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Business Owner</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessOwnerAddress']?>" name="BusinessOwnerAddress" oninput="this.value = this.value.toUpperCase()">
                <small id="emailHelp" class="form-text text-muted">Owner Address</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessContactNumber']?>" maxlength="11" name="BusinessContactNumber" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Contact Number</small>
              </div>

              <!-- <div class="col-md-3 mb-3">
                <input class="form-control" type="text" id="mydateStarted<?php echo $resident['id']?>" name="BusinessDateStart" value="<?php echo $resident['BusinessDateStart']?>" readonly>
                <small id="emailHelp" class="form-text text-muted">Date Started:</small>
              </div> -->
              <div class="col mb-3">
                <input class="form-control" type="text" name="BusinessDateStart" value="<?php echo $resident['BusinessDateStart']?>" onchange="formatDateEdit(this)">
                <small id="emailHelp" class="form-text text-muted">Date Started</small>
              </div>


              <div class="col-md-3">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessBldgNo']?>" name="BusinessBldgNo" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Building No.</small>
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessPurokNo']?>" name="BusinessPurokNo" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                <small id="emailHelp" class="form-text text-muted">Purok No.</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessBarangay']?>" name="BusinessBarangay" oninput="this.value = this.value.toUpperCase()">
                <small id="emailHelp" class="form-text text-muted">Barangay</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessMunicipality']?>" name="BusinessMunicipality" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Municipality</small>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $resident['BusinessProvince']?>" name="BusinessProvince" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)">
                <small id="emailHelp" class="form-text text-muted">Province</small>
              </div>
            </div>
            <br>
            <div class="row g-2 mb-3">
              <div class="col-md-12">
                <label><b>Deceased Information</b></label>
              </div>
              <!-- <div class="col-md-6 mb-3">
                <input class="form-control" type="text" name="dateofdeath" value="<?php echo $resident['dateofdeath'] ?>" id="formatted-date-death<?php echo $resident['id'];?>" readonly>
                <small id="emailHelp" class="form-text text-muted">Date of Death</small>
              </div> -->
              <div class="col mb-6">
                <input class="form-control" type="text" name="dateofdeath" value="<?php echo $resident['dateofdeath'] ?>" onchange="myDateofDeath(this)" >
                <small id="emailHelp" class="form-text text-muted">Date of Death</small>
              </div>
              <div class="col-md-12">
                <input type="time" class="form-control" name="timeofdeath" placeholder="Time of Death"  autocomplete="off" value="<?php echo $resident['timeofdeath']?>">
                <small id="emailHelp" class="form-text text-muted">Time of Death</small>
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control" name="nameoffamily" placeholder="Name of Family Member/Relative"  autocomplete="off" value="<?php echo $resident['nameoffamily']?>">
                <small id="emailHelp" class="form-text text-muted">Name of Family Member/Relative</small>
              </div>
            </div>
            <div class="col-md-12 mb-3">
                <input type="text" class="form-control" name="relationship" placeholder="Relationship with the Deceased"  autocomplete="off" value="<?php echo $resident['relationship']?>">
                <small id="emailHelp" class="form-text text-muted">Relationship with the Deceased</small>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="causeofdeath" placeholder="Cause of Death"  autocomplete="off" value="<?php echo $resident['causeofdeath']?>">
                <small id="emailHelp" class="form-text text-muted">Cause Of Death</small>
            </div>
            <div class="modal-footer float-end">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onClick="window.location.reload();">Cancel</button>
              <button type="submit" name="update_resident" class="button-color btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  // //Business Start Date
  // function formatDateEdit(input) {
  //   let myBusinessDateValue = input.value;
  //   let myBusinessDate = new Date(myBusinessDateValue);
    
  //   let day = myBusinessDate.getDate();
  //   let month = myBusinessDate.toLocaleString('default', { month: 'long' });
  //   let year = myBusinessDate.getFullYear();
    
  //   let myBusinessformattedDate = month + ' ' + day + ' ' + year;
    
  //   document.getElementById('mydateStarted<?php echo $resident['id'];?>').value = myBusinessformattedDate;
  // }

  // //Date of Death
  // function myDateofDeath(input) {
  //   let mydeathdateValue = input.value;
  //   let mydeathdate = new Date(mydeathdateValue);
    
  //   let day = mydeathdate.getDate();
  //   let month = mydeathdate.toLocaleString('default', { month: 'long' });
  //   let year = mydeathdate.getFullYear();
    
  //   let myDeathformattedDate = month + ' ' + day + ' ' + year;
    
  //   document.getElementById('formatted-date-death<?php echo $resident['id'];?>').value = myDeathformattedDate;
  // }

  // //Birthday
  // function mybirthEdit(input) {
  //   let mybirthEditdateValue = input.value;
  //   let mybirthEditdate = new Date(mybirthEditdateValue);
    
  //   let day = mybirthEditdate.getDate();
  //   let month = mybirthEditdate.toLocaleString('default', { month: 'long' });
  //   let year = mybirthEditdate.getFullYear();
    
  //   let myBirthformattedDate = month + ' ' + day + ' ' + year;
    
  //   document.getElementById('birthdayEdit<?php echo $resident['id']; ?>').value = myBirthformattedDate;
  // }

  //Calculate Age
  $("#birthday<?php echo $resident['id']; ?>").on("input",function(){
    let bdate = $(this).val();
    let bdateformat = new Date(bdate);
    let diff_ms =  Date.now() - bdateformat.getTime();
    let age_dt = new Date(diff_ms);
    let age = Math.abs(age_dt.getUTCFullYear() - 1970);
    $("#editAge<?php echo $resident['id']; ?>").val(age);
  })
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
          $("#editProvince<?php echo$resident['id'];?>").append(data);
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
          $("#editCityTown<?php echo$resident['id'];?>").html("");
          $("#editCityTown<?php echo$resident['id'];?>").append(data);
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
          $("#editBarangay<?php echo$resident['id'];?>").html("");
          $("#editBarangay<?php echo$resident['id'];?>").append(data);
  				// if(type == "stateData"){
  				// 	$("#CityTown").html(data);
  				// }else {
  				// 	$("#Province").append(data);
  				// }
  				
  			}
  		});
  	}

  	loadData();

  	$("#editProvince<?php echo$resident['id'];?>").on("change",function(){
  		var Province = $("#editProvince<?php echo$resident['id'];?>").val();

  		if(Province != ""){
  			loadCity(Province);
  		}else{
  			$("#City").html("");
  		}
  	})

    $("#editCityTown<?php echo$resident['id'];?>").on("change",function(){
  		var City = $("#editCityTown<?php echo$resident['id'];?>").val();

  		if(City != ""){
  			loadBarangay(City);
  		}else{
  			$("#editCityTown<?php echo$resident['id'];?>").html("");
  		}
  	})

  });
</script>