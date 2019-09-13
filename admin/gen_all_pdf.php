<?php require_once 'includes/header.php'; ?>

<?php
  $info = new Info();

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
          <!-- Page Heading -->
          <div class="row">
          <div class="col-md-12 mb-3">
            <a class="btn btn-primary float-right" href="summary_excel.php" target="_blank">Generate Summary in Excel</a>
          </div>
          </div>
          <!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Generate a PDF Copy</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>School Name</th>
                      <th>Service Record</th>
                      <th>Service Card</th>                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>First Name</th>
                      <th>School Name</th>
                      <th>Service Record</th>
                      <th>Service Card</th>
                    </tr>
                  </tfoot>
                  <tbody>
         <?php 
            
          $result = $db->query("SELECT id,first_name,last_name,school_name,tin_num FROM info");

          if($result->num_rows < 1) :
          ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>  
          <?php    
          else :
          ?>
          
          <?php  
          while($info_row = $result->fetch_array()) :
         ?>           
                    <tr id="employee_table_row">
                      <td><?php echo $info_row['first_name'] . " " . $info_row['last_name']; ?></td> 
                      <td><?php echo $info_row['school_name']; ?></td>
                      <td><a href="/divoffadmin/admin/gen_service_record/<?php echo $info_row['tin_num']; ?>" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> Generate a PDF File</a></td>
                      <td><a href="/divoffadmin/admin/gen_service_card_pdf/<?php echo $info_row['tin_num']; ?>" target="_blank">Generate a PDF File</a>  </td>


                    </tr>

          <?php endwhile; ?>
          <?php endif; ?> 

                  </tbody>
                </table>
              </div>
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

  <!-- DELETE Modal-->
  <div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="delete_employee_modal">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-danger" id='delete_work_exp_btn' name="delete_employee">Delete</button>
        
      </div>
    </div>
  </div>
</div>



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
  <script src="/divoffadmin/admin/vendor/jquery/jquery.min.js"></script>
  <script src="/divoffadmin/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/divoffadmin/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/divoffadmin/admin/js/sb-admin-2.min.js"></script>
  <script src="/divoffadmin/admin/js/my_script.js"></script> 
  <!-- Page level plugins -->
  <script src="/divoffadmin/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/divoffadmin/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/divoffadmin/admin/js/demo/datatables-demo.js"></script>

  

</body>

</html>
