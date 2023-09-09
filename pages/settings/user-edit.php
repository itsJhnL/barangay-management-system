<!-- Edit User Modal -->
<div class="modal fade" id="Edit_User<?php echo $row['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ID selected: <?php echo $row['id']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <!-- Form -->
          <form action="function.php" method="POST">
            <div class="row">
              <div class="col">
                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                <label>Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="username" autocomplete="off" required value="<?php echo $row['username']; ?>">
              </div>
              <div class="col mb-3">
                <label>Password</label>
                <input class="form-control" type="text" name="password" placeholder="password" autocomplete="off" required value="<?php echo $row['password']; ?>">
                </div>
            </div>
            <label id="user_msg<?php echo $row['id']?>" style="color:#CC0000;" ></label>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" id="btn_edit<?php echo $row['id']?>" name="update_User" class="button-color btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- <script type="text/javascript">
  $(document).ready(function() {

  var timeOut = null; // this used for hold few seconds to made ajax request

  var loading_html = '<img src="img/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here

  //when button is clicked
  $('#username').keyup(function(e){

    // when press the following key we need not to make any ajax request, you can customize it with your own way
    switch(e.keyCode)
    {
        //case 8:   //backspace
        case 9:     //tab
        case 13:    //enter
        case 16:    //shift
        case 17:    //ctrl
        case 18:    //alt
        case 19:    //pause/break
        case 20:    //caps lock
        case 27:    //escape
        case 33:    //page up
        case 34:    //page down
        case 35:    //end
        case 36:    //home
        case 37:    //left arrow
        case 38:    //up arrow
        case 39:    //right arrow
        case 40:    //down arrow
        case 45:    //insert
        //case 46:  //delete
        return;
    }
    if (timeOut != null)
      clearTimeout(timeOut);
    timeOut = setTimeout(is_available, 1000);  // delay delay ajax request for 1000 milliseconds
    $('#user_msg<?php echo $row['id']?>').html(loading_html); // adding the loading text or image
  });
  });

  function is_available(){
  //get the username
  var username = $('#username').val();

  //make the ajax request to check is username available or not
  $.post("check_username.php", { username: username },
  function(result)
  {
      console.log(result);
      if(result != 0)
      {
          $('#user_msg<?php echo $row['id']?>').html('Username already taken!');
          document.getElementById("btn_edit<?php echo $row['id']?>").disabled = true;
      }
      else
      {
          $('#user_msg<?php echo $row['id']?>').html('<span style="color:#006600;">Available</span>');
          document.getElementById("btn_edit<?php echo $row['id']?>").disabled = false;
      }
  });

  }
</script> -->