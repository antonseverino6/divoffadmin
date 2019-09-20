<?php 
	require_once 'includes/header.php';
  $info = new Info();
  $other_info = new Other_info();

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
<!--
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
-->

          <!-- Content Row -->
          <div class="row ml-1">
			<form method="get" action="" id="search_count_form">
				<div class="form-row">
          <div class="col">
            <label class="control-label">School</label>
            <select name="school_name">
              <option value="no_value"></option>
              <?php $school_name_query = $info->school_name_choices(); ?>
              <?php while($row = $school_name_query->fetch_array()) : ?>
                      <option value="<?php echo $row['school_name']; ?>"><?php echo $row['school_name']; ?></option>    
              <?php endwhile; ?>
            </select>
          </div>

					<div class="col">
            <label class="control-label">Employee</label>
						<select id="employee" name="employee">
							<option value="no_value"></option>
							<option value="NON-TEACHING">NON-TEACHING</option>
							<option value="TEACHING">TEACHING</option>
							<option value="SDO BASED PERSONNEL">SDO BASED PERSONNEL</option>
						</select>
					</div>

					<div class="col">
            <label class="control-label">Employee Type</label>
            <select name="employee_type">
              <option value=""></option>
              <?php 
                $teacher_count = count($other_info->teacher_choices());
                $teacher_arr = $other_info->teacher_choices();
                    for($i = 0; $i < $teacher_count; $i++) : ?>
                      <option class="teacher_type" value="<?php echo $teacher_arr[$i]; ?>"><?php echo $teacher_arr[$i]; ?></option>
              <?php endfor; ?>  
              <?php 
                $sdo_based_count = count($other_info->sdo_based_choices());
                $sdo_based_arr = $other_info->sdo_based_choices();
                    for($i = 0; $i < $sdo_based_count; $i++) : ?>
                      <option class="sdo_based_type" value="<?php echo $sdo_based_arr[$i]; ?>"><?php echo $sdo_based_arr[$i]; ?></option>
              <?php endfor; ?>  
            </select>
					</div>	
					
					<div class="col">
            <label class="control-label">Position</label>
            <select name="position">
              <option value=""></option>
              <?php 
                $teaching_count = count($other_info->teaching_choices());
                $teaching_arr = $other_info->teaching_choices();
                    for($i = 0; $i < $teaching_count; $i++) : ?>
                      <option class="teaching_position" value="<?php echo $teaching_arr[$i]; ?>"><?php echo $teaching_arr[$i]; ?></option>
              <?php endfor; ?>  
              <?php 
                $non_teaching_count = count($other_info->non_teaching_position_choices());
                $non_teaching_arr = $other_info->non_teaching_position_choices();
                    for($i = 0; $i < $non_teaching_count; $i++) : ?>
                      <option class="non_teaching_position" value="<?php echo $non_teaching_arr[$i]; ?>"><?php echo $non_teaching_arr[$i]; ?></option>
              <?php endfor; ?>  
              <?php 
                $sdo_based_count = count($other_info->sdo_based_position_choices());
                $sdo_based_arr = $other_info->sdo_based_position_choices();
                    for($i = 0; $i < $sdo_based_count; $i++) : ?>
                      <option class="sdo_based_position" value="<?php echo $sdo_based_arr[$i]; ?>"><?php echo $sdo_based_arr[$i]; ?></option>
              <?php endfor; ?> 
            </select>
					</div>
					
					<div class="col">
            <label class="control-label">&nbsp;</label><br>
						<button type="button" name="submit_search" value="search" id="search_count_btn">Search</button>
					</div>
					
				</div>


			</form>
          </div>

		<div class="row ml-1" >
			<div class="col-md-12" id="number_of_results">
        
      </div>
		</div>

          <div class="row">
            <div class="col-xl-12 col-md-6 mb-4 service-card-details-holder" >
                <table class="table-service-card-details">
                   <thead>
                      <tr>
                        <th>Tin No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>School Name</th>
                        <th>Employee</th>
                        <th>Employee Type</th>
                        <th>Position</th>
                      </tr>
                   </thead>
                   <tbody id="search_count_tbody">


                   </tbody>                   
                </table>
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

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script>
  	$(document).ready(function() {
      var employee = $("#employee");
      var sdo_based_type = $(".sdo_based_type");
      var teacher_and_non_teacher_type = $(".teacher_type");
      var sdo_based_position = $(".sdo_based_position");
      var non_teaching_position = $(".non_teaching_position");
      var teaching_position = $(".teaching_position");

      // if (employee.val() === '') {
        $("#employee").on("change", function() {

          switch(employee.val()) {
            case 'NON-TEACHING':
              sdo_based_type.attr("disabled","true");
              teaching_position.attr("disabled","true");
              sdo_based_position.attr("disabled","true");
              if (teacher_and_non_teacher_type.attr("disabled")) {
                teacher_and_non_teacher_type.removeAttr("disabled");
              }
              if (non_teaching_position.attr("disabled")) {
                non_teaching_position.removeAttr("disabled");
              }   
            break;
            case 'TEACHING':
              sdo_based_type.attr("disabled","true");
              non_teaching_position.attr("disabled","true");
              sdo_based_position.attr("disabled","true");
              if (teacher_and_non_teacher_type.attr("disabled")) {
                teacher_and_non_teacher_type.removeAttr("disabled");
              }
              if (teaching_position.attr("disabled")) {
                teaching_position.removeAttr("disabled");
              }  
            break;
            case 'SDO BASED PERSONNEL':
              teacher_and_non_teacher_type.attr("disabled","true");
              non_teaching_position.attr("disabled","true");
              teaching_position.attr("disabled","true");
              if (sdo_based_type.attr("disabled")) {
                sdo_based_type.removeAttr("disabled");
              }
              if (sdo_based_position.attr("disabled")) {
                sdo_based_position.removeAttr("disabled");
              }

            break;
            default :
              if (sdo_based_type.attr("disabled")) {
                sdo_based_type.removeAttr("disabled");
              } else if (teacher_and_non_teacher_type.attr("disabled")) {
                teacher_and_non_teacher_type.removeAttr("disabled");
              } else if (sdo_based_type.attr("disabled") && teacher_and_non_teacher_type.attr("disabled")) {
                sdo_based_type.removeAttr("disabled");
                teacher_and_non_teacher_type.removeAttr("disabled");
              }
              if (non_teaching_position.attr("disabled")) {
                non_teaching_position.removeAttr("disabled");
              }
              if (teaching_position.attr("disabled")) {
                teaching_position.removeAttr("disabled");
              }  
              if (sdo_based_position.attr("disabled")) {
                sdo_based_position.removeAttr("disabled");
              }   
            break;
          }

        });        
      // }



      // AJAX CALL FOR SEARCH

  		$("#search_count_btn").click(function() {
  			$.ajax({
  				url: "ajax/search_count.php",
  				type: "GET",
  				data: $('#search_count_form').serialize(),
  				success: function(d) {
  					$("#search_count_tbody").html(d);
  				}
  			});
  		});

  		$("#search_count_btn").click(function() {
  			$.ajax({
  				url: "ajax/count_of_results.php",
  				type: "GET",
  				data: $('#search_count_form').serialize(),
  				success: function(d) {
  					$("#number_of_results").html(d);
  				}
  			});
  		});  		
  	});
  </script>

</body>

</html>
