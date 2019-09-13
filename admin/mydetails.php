<?php require_once 'includes/header.php'; ?>

<?php 

if(!isset($_GET['id'])) {
  redirect('/divoffadmin/admin/index');
}

$info = new Info();

     $get_user_info = $info->get_details_for($db->fix_string($_GET['id']));
  
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

          <!-- Page Heading -->
          <div class="row">
            <div class="col-xl-12 col-md-7 mb-0 mt-1">
            <!-- <h1 class="h3 mb-0 text-gray-800">My Details</h1> -->
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right ml-2" href="/divoffadmin/admin/service_card/<?php echo $tin_num; ?>" target="_blank">Service Card</a>
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right ml-2" href="/divoffadmin/admin/gen_service_record/<?php echo $tin_num; ?>" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> Service Record</a>
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
                    
                    
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-personalinfo" role="tab" aria-controls="v-pills-profile" aria-selected="false">Personal Information</a>  
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-otherinfo" role="tab" aria-controls="v-pills-settings" aria-selected="false">Other Info</a>
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-workexperience" role="tab" aria-controls="v-pills-settings" aria-selected="false">Work Experience</a>  
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-civilservice" role="tab" aria-controls="v-pills-settings" aria-selected="false">Civil Service</a>   
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-details" role="tab" aria-controls="v-pills-settings" aria-selected="false">Details</a>  
    </div>                    
                    

                    
                </div>
                
                <div class="col-xl-10 col-md-5 mb-4 mt-3">
                
        <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show active" id="v-pills-personalinfo" role="tabpanel" aria-labelledby="v-pills-profile-tab">

               <!-- <div><?php // require_once 'service_rec_excel.php'; ?></div> -->
              <div class="float-right mb-2 mr-3"><a class="btn btn-success btn-circle" href="/divoffadmin/admin/edit_page/info/<?php echo $tin_num; ?>"  title="Edit"><i class="far fa-edit" style="color: #fff;"></i></a></div>
                <?php require_once 'info_page/info.php'; ?>
            </div>

            <div class="tab-pane fade show" id="v-pills-otherinfo" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <?php 
                 // Other Info  
                 $other_info = new Other_info();

                if(!$other_info->check_if_has_other_info($tin_num)) :
              ?>  
              <div class="float-right mb-2 mr-3"><a class="btn btn-info btn-xs" href="/divoffadmin/admin/edit_page/other_info/<?php echo $tin_num; ?>">Update</a></div>                

              <?php
                else:
              ?>
               <div class="float-right mb-2 mr-3"><a class="btn btn-success btn-circle" href="/divoffadmin/admin/edit_page/edit_other_info/<?php echo $tin_num ?>" title="Edit"><i class="far fa-edit" style="color: #fff;"></i></a></div>
              <?php
                endif;
              ?>              

                <?php require_once 'info_page/other_info.php'; ?>
            </div>


             <div class="tab-pane fade" id="v-pills-workexperience" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                
                <div><?php  require_once 'forms/work_exp.php'; ?></div>
                
                <!-- <div class="float-right"><a href="edit_page.php?edit=workexp&id=<?php // echo $_GET['id']; ?>">Edit</a></div>  -->
                <?php require_once 'info_page/work_exp.php'; ?>
            
            </div>

             <div class="tab-pane fade" id="v-pills-civilservice" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                
                <div><?php require_once 'forms/civil_service.php'; ?></div>
                
                <!-- <div class="float-right"><a href="edit_page.php?edit=edit_civil_service&id=<?php // echo $_GET['id']; ?>">Edit</a></div>  -->
                <?php require_once 'info_page/civil_service.php'; ?>
            
            </div>

             <div class="tab-pane fade" id="v-pills-details" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                
                <div><?php require_once 'forms/details.php'; ?></div>
                
                <!-- <div class="float-right"><a href="edit_page.php?edit=edit_details&id=<?php // echo $_GET['id']; ?>">Edit</a></div>  -->
                <?php require_once 'info_page/details.php'; ?>
            
            </div>            


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
  
  <!-- Page level plugins -->
  <script src="/divoffadmin/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/divoffadmin/admin/js/demo/chart-area-demo.js"></script>
  <script src="/divoffadmin/admin/js/demo/chart-pie-demo.js"></script>
<script src="/divoffadmin/admin/typeahead/bootstrap3-typeahead.min.js"></script>
  <script src="/divoffadmin/admin/js/my_script.js"></script> 

<script type="text/javascript">
  $(document).ready(function() {

  $('#insert-comp-name').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/work_exp_station.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });

  $('#insert-designation').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/work_exp_designation.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });

  $('#insert-status').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/work_exp_status.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });


  $('#insert-branch').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/work_exp_branch.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });

  $('#cs-exam').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/civil_service_examination.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });  

  $('#insert-special-order').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_special_order_no.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });  

  $('#insert-nature-ass').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_nature_of_ass.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });   

  $('#insert-item-number').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_item_number.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });   

  $('#insert-position').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_position.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });  


  $('#insert-remarks').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_remarks.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });    

  });
</script>


</body>

</html>
