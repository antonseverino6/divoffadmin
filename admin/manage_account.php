<?php require_once 'includes/header.php'; ?>

<?php 
$msg = "";
if(isset($_POST['submit_new_password'])) {
	if(!$user->change_password($_POST['current_password'],$_POST['new_password'],$_POST['confirm_new_password'])) {
		$msg = $user->msg;
	}else {
		$msg = "<script>
				        Swal.fire({				            
				        	text: 'Password has been updated! Re-login',
				            type: 'success'
				        }).then(function() {
				            window.location = '../logout.php';
				        });
				</script>";
		$session->logout();		
	} 
}



?>


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        <?php require_once 'includes/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


          <!-- Topbar Navbar -->
          <?php require_once 'includes/navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">
              <div class="col-xl-12 col-md-6 mb-1">
                  <h4>Change Password</h4>             
              </div>
          </div>  


        <div class="row">
        	<div class="col-xl-4 col-md-2">
        		<?php 
        			if(!empty($msg)) {
        				if($msg == "New and Confirm Password does not match!") {
        					echo "<p class='alert alert-danger'>$msg</p>"; 
        				}elseif($msg == "Fields should not be left empty!") {
        					echo "<p class='alert alert-danger'>$msg</p>"; 
        				}elseif($msg == "Incorrect Current Password!") {
        					echo "<p class='alert alert-danger'>$msg</p>"; 
        				}else {
        					echo $msg;

        				}
        				
        			}
        			

        		?>
        		<form method="post" action="">
<!--         			<div class="form-group">
        				<input class="form-control form-control-user" type="text" name="username" placeholder="Username">
        			</div> -->
        			<div class="form-group">
        				<input class="form-control form-control-user" type="password" name="current_password" placeholder="Current Password">
        			</div>
        			<div class="form-group">
        				<input class="form-control form-control-user" type="password" name="new_password" placeholder="New Password">
        			</div>
        			<div class="form-group">
        				<input class="form-control form-control-user" type="password" name="confirm_new_password" placeholder="Confirm New Password">	
        			</div>
        			<button class="btn btn-primary btn-block" type="submit" name="submit_new_password">Save Changes</button>
        		</form>
        	</div>	
        </div>  

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
            <?php require_once 'includes/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/my_script.js"></script> 

  

</body>

</html>