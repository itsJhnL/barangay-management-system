<!-- Edit Admin Modal -->
<div class="modal fade" id="admin<?php echo $row['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <input class="form-control" type="text" name="username" placeholder="username" autocomplete="off" required value="<?php echo $row['username']; ?>" onkeyup="checkUsername(this.value);">
                </div>
                <div class="col mb-3">
                    <label>Password</label>
                    <input class="form-control" type="text" name="password" placeholder="password" autocomplete="off" required value="<?php echo $row['password']; ?>">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" name="update_admin" class="button-color btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>