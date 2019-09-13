<?php require_once 'includes/header.php'; ?>

<?php

  $db_object = new Db_object();

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
         <?php echo $message; ?> 

          <?php

          if(isset($_GET['error'])) {
            if($_GET['error'] == 'already_exists') {
                echo "<script>Swal.fire('Oops...','An Employee already exist','warning');</script>";
            }
          }


            if(isset($_POST['generate_backup'])) {
                $school_name = trim($db->fix_string($_POST['school_name']));
                $table_name = trim($db->fix_string($_POST['table_name']));

                switch ($table_name) {
                  case 'civil_service':
                       redirect("export_tables/export_civil_service.php?sn=$school_name");
                    break;
                  case 'info':
                      redirect("export_tables/export_info.php?sn=$school_name");
                    break;    
                  case 'other_info':
                      redirect("export_tables/export_other_info.php?sn=$school_name");
                    break; 
                  case 'details':
                      redirect("export_tables/export_details.php?sn=$school_name");
                    break;  
                  case 'work_exp':
                      redirect("export_tables/export_work_exp.php?sn=$school_name");
                    break;                                              
                }
            }

           ?>


          <div class="row">
              <div class="col-xl-4 col-md-6 mb-1">
                  <h4>Export Data</h4>             
              </div>

              <div class="col-xl-2 col-md-6 mb-1"></div>

              <div class="col-xl-4 col-md-6 mb-1">
                  <h4>Import Data</h4>             
              </div>
          </div>  

          <div class="row">
            <div class="col-xl-4 col-md-6 mb-1">
              <form method="post" action="">
                <div class="form-group">
                <input class="form-control" type="text" name="school_name" placeholder="Name of your School" required>
               </div>
                <div class="form-group">
                <select class="form-control" name="table_name">
                  <option value="info">Info</option>
                  <option value="other_info">Other Info</option>
                  <option value="work_exp">Work Experience</option>
                  <option value="civil_service">Civil Service</option>
                  <option value="details">Details</option>
                  
                </select>
              </div>
                <button class="btn btn-primary" type="submit" name="generate_backup">Export Data</button>
              </form>  
            </div>   

            <div class="col-xl-2 col-md-6 mb-1"></div>

            <div class="col-xl-4 col-md-6 mb-1">
              <form action="import_table/import_data.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="file" name="file" accept=".csv" style="display: block; right: 5px;" required="">
                </div>
                <button class="btn btn-primary" type="submit" name="imprt_data">Import Data</button>
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#">Logout</a>
        </div>
      </div>
    </div>
  </div>







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
