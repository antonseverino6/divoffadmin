<?php require_once 'includes/header.php'; ?>

<?php 
$msg = "";
if (isset($_POST['submit'])) {
    $full_name = strtoupper(trim($db->fix_string($_POST['full_name'])));
    $position = strtoupper(trim($db->fix_string($_POST['position'])));

    $result = $db->query("SELECT * FROM service_record LIMIT 1");

    if ($result->num_rows < 1) :
          $db->query("INSERT INTO service_record(name,position) VALUES('$full_name','$position')");
           $session->message("<script>Swal.fire('Success','Inserted!','success');</script>");
           redirect("/divoffadmin/admin/set_service_record");

    else :
          $id = $db->fix_string($_POST['id']);
          $db->query("UPDATE service_record SET name='$full_name', position='$position' WHERE id = $id");
          $session->message("<script>Swal.fire('Success','Updated!','success');</script>");
          redirect("/divoffadmin/admin/set_service_record");
    endif;  

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
 <?php echo $message; ?> 

          <!-- Topbar Navbar -->
          <?php require_once 'includes/navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">
              <div class="col-xl-12 col-md-6 mb-1">
                  <h2 class="mb-3">Service Record</h2>
                  <h4>To be signed by:</h4>             
              </div>
          </div>  


        <div class="row">
        	<div class="col-xl-4 col-md-2">

        		<form method="post" action="">

              <?php 

                $result = $db->query("SELECT * FROM service_record LIMIT 1");

                if ($result->num_rows < 1) :

              ?>

              <div class="form-group">
                <input class="form-control form-control-user" type="input" name="full_name" placeholder="Full Name" required="">
              </div>
              <div class="form-group">
                <input class="form-control form-control-user" type="input" name="position" placeholder="Position" required="">
              </div>
              

              
              <?php    

                else : 

                  $row = $result->fetch_array();

              ?>


              <input class="form-control form-control-user" type="hidden" name="id" placeholder="Name" required="" value="<?php echo $row['id']; ?>">
              <label>Full Name</label>
              <div class="form-group">
                <input class="form-control form-control-user" type="input" name="full_name" placeholder="Full Name" required="" value="<?php echo $row['name']; ?>">
              </div>
              <label>Position</label>
              <div class="form-group">
                <input class="form-control form-control-user" type="input" name="position" placeholder="Position" required="" value="<?php echo $row['position']; ?>">
              </div>



              <?php  endif;    

              ?>

              <button class="btn btn-primary btn-block" type="submit" name="submit">Save Changes</button>

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