<?php require_once 'includes/header.php'; ?>

<?php 

if(!isset($_GET['id']) && !isset($_GET['edit'])) {
  redirect('/divoffadmin/admin/index');
}

$info = new Info(); 

  $get_user_info = $info->get_details_for($_GET['id']);
  $emp_info = $get_user_info->fetch_array();
  $full_name = $emp_info['first_name'] . " " . $emp_info['middle_name'] . " " . $emp_info['last_name'];
$tin_num = $emp_info['tin_num'];
$employee_img = $emp_info['employee_img'];
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

        <!-- Topbar -->
        <?php require_once 'includes/navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php echo $message; ?>

          <!-- Page Heading -->
          <div class="row">
            <div class="col-xl-12 col-md-7 mb-0 mt-1">
            <!-- <h1 class="h3 mb-0 text-gray-800">My Details</h1> -->
            <?php // require_once 'try_again.php'; ?>
            </div>
          </div>

          <!-- Content Row -->
          <div class="mt-5 row border border-top-0 border-left-0 rounded border-dark" >

            <!-- Earnings (Monthly) Card Example -->
 
                <div class="col-xl-3 col-md-5 mb-4 mt-1" style="padding-right: 0; margin-right: 0;">
                    <h2 style="margin-left: 15px;">My Details</h2>

                    <?php  if(!empty($employee_img)) { ?>
                            <img class="img-thumbnail" src="/divoffadmin/admin/employee_img/<?php echo $employee_img; ?>" alt="..." style="height: 175px; width: 175px; margin-left: 70px;">
                         
                    <?php  }else {  ?>
                              <img class="img-thumbnail" src="/divoffadmin/admin/resources/img/placeholder-img.jpg" alt="..." style="height: 175px; width: 175px; margin-left: 70px;">
                    <?php  }    ?>
                    
                </div> 

                <div class="col-xl-9 col-md-6 mt-5 ml-0" style="margin-bottom: 20px;">

                    <div class="table-person-info">
                        
                    <table style="background-color: #fff; width: 100%; height: 100%; border-radius: 3px;">
                      <tbody >
                        <tr style="border-bottom: 1px solid rgba(0,0,0,.125);">
                          <td class="asked-info" width="20%" >Employee Name</td>
                          <td width="60%" class="person-info">:&nbsp;<?php echo $full_name; ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,.125);">
                          <td class="asked-info">Employee Id</td>
                          <td class="person-info">:&nbsp; <?php echo $emp_info['employee_id']; ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,.125);">
                          <td class="asked-info">Email</td>
                          <td class="person-info">:&nbsp; <?php echo $emp_info['email']; ?></td>
                        </tr>
                        <tr >
                          <td class="asked-info">Contact Number</td>
                          <td class="person-info">:&nbsp; <?php echo $emp_info['contact_num']; ?></td>
                        </tr>      
                      </tbody>
                    </table>
                     </div>                   
                </div>  
              
          </div>



<div class="mt-3 row border border-bottom-0 border-right-0 rounded border-dark ">
                <div class="col-xl-2 col-md-5 mb-4 mt-3" >
                    
                     <a href="/divoffadmin/admin/mydetails/<?php echo $_GET['id']; ?>" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span><span class="text">Go Back</span></a>                  
                    
                    
                </div>
                
                <div class="col-xl-10 col-md-5 mb-4 mt-3">
                

                    <?php 
                        $edit_page = '';
                        if(isset($_GET['edit'])){
                            $edit_page = $_GET['edit'];                    
                        }
                    
                            switch($edit_page) {                           
                               case 'info':
                                    require_once 'forms/edit_info.php';
                               break;
                               case 'other_info':
                                    require_once 'forms/other_info.php';
                               break;
                               case 'edit_other_info':
                                    require_once 'forms/edit_other_info.php';
                               break;         
                           }
                   
                    ?>
            
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
<!--   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  </div> -->

  <!-- Bootstrap core JavaScript-->
  <script src="/divoffadmin/admin/vendor/jquery/jquery.min.js"></script>
  <script src="/divoffadmin/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/divoffadmin/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/divoffadmin/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/divoffadmin/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/divoffadmin/admin/js/demo/chart-area-demo.js"></script>
  <script src="/divoffadmin/admin/js/demo/chart-pie-demo.js"></script>

<script>
$(document).ready(function() {

$(function () {
   $("#inputEmployId").keydown(function (e) {
       if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
         (e.keyCode >= 35 && e.keyCode <= 40) ||
         $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
         return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
         (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
   });
});

$(function () {
   $("#inputYearReceived").keydown(function (e) {
       if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
         (e.keyCode >= 35 && e.keyCode <= 40) ||
         $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
         return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
         (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
   });
});

});

</script>

  <script>

      function undisable_teacher_type() {
        document.getElementById("non_teacher_position").disabled = true;
        document.getElementById("non_teacher_type").disabled = true;
        document.getElementById("employee_sdo_type").disabled = true;
        document.getElementById("employee_sdo_position").disabled = true;
        document.getElementById("employee_teacher_type").disabled = false;
        document.getElementById("teacher_position").disabled = false;

      }

      function disable_teacher_and_sdo() {
        document.getElementById("employee_teacher_type").disabled = true;
        document.getElementById("employee_sdo_type").disabled = true;
        document.getElementById("employee_sdo_position").disabled = true;
        document.getElementById("teacher_position").disabled = true;
        document.getElementById("non_teacher_position").disabled = false;
        document.getElementById("non_teacher_type").disabled = false;
      }

      function undisable_sdo_type() {
        document.getElementById("employee_teacher_type").disabled = true;
        document.getElementById("teacher_position").disabled = true;
        document.getElementById("non_teacher_position").disabled = true;
        document.getElementById("non_teacher_type").disabled = true;
        document.getElementById("employee_sdo_type").disabled = false;
        document.getElementById("employee_sdo_position").disabled = false;
      }

      function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : event.keyCode;
       console.log(charCode);
          if (charCode != 46 && charCode != 45 && charCode > 31
          && (charCode < 48 || charCode > 57))
           return false;

        return true;
      }    
      
  </script>


</body>

</html>
