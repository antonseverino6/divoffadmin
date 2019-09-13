<?php require_once 'includes/header.php'; ?>

<?php
  $info = new Info();
  $db_object = new Db_object();
  $other_info = new Other_info();

  if(!isset($_GET['category'])) {
    redirect('index');
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

          <!-- Page Heading -->



          <!-- Page Heading -->

          <!-- DataTales Example -->

          <?php 

            switch ($db->fix_string($_GET['category'])) {
              case 'employees':
                  require_once 'dashboard_category/employees.php';
                break;
              
              case 'non_teaching':
                  require_once 'dashboard_category/non_teaching.php';
                break;

              case 'female':
                  require_once 'dashboard_category/female.php';
                break; 

              case 'male':
                  require_once 'dashboard_category/male.php';
                break;    

              case 'sdo_based_personnel':
                  require_once 'dashboard_category/sdo_based_personnel.php';
                break;    

              case 'teacher':
                  require_once 'dashboard_category/teacher.php';
                break;

              case 'firstlevel':
                  require_once 'dashboard_category/firstlevel.php';
                break; 

              case 'secondlevel':
                  require_once 'dashboard_category/secondlevel.php';
                break;  

              case 'thirdlevel':
                  require_once 'dashboard_category/thirdlevel.php';
                break;

              case 'no_employee_id':
                  require_once 'dashboard_category/no_employee_id.php';
                break;

              case '20_30':
                  require_once 'dashboard_category/age_20_30.php';
              break;

              case '31_40':
                  require_once 'dashboard_category/age_31_40.php';
              break;  

              case '41_50':
                  require_once 'dashboard_category/age_41_50.php';
              break;

              case '51_60':
                  require_once 'dashboard_category/age_51_60.php';
              break;                                             

              default :
                  require_once 'dashboard_category/404.php';
                break;                                 
            }


          ?>



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
