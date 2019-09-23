<?php require_once 'includes/header.php'; ?>

<?php 
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
          <!------------------------------------------ START OF 1ST ROW ------------------------------------------>
          <div class="row">


            <!-- START OF 1ST COLUMN IN 1ST ROW -->
            <div class="col-xl-3 col-md-6 mb-4">

              
              <div class="mb-1">
              <a href="categories/employees">  
              <div class="card border-left-primary shadow h-100 py-2">
                
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Employees</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $info->employees_count(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                 
              </div>
              </a>
              </div>
<!--             </div>  

            <div class="col-xl-3 col-md-6 mb-4"> -->  
              <div class="mb-1">
              <a href="categories/female">   
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><span style="color: #FF1493;">Female</span></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $info->female_count(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-female fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              </div>  

<!--             </div>

            <div class="col-xl-3 col-md-6 mb-4"> -->
              <div class="mb-1">
              <a href="categories/male">  
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><span style="color: #1420C2;">Male</span></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $info->male_count(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-male fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              </div>
<!--             </div>            


            <div class="col-xl-3 col-md-6 mb-4">  --> 
              <div class="mb-1">
              <a href="categories/no_employee_id">  
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">No Employee ID</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $info->no_employee_id_count(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              </div>
            </div>   
            <!-- END OF 1ST COLUMN IN 1ST ROW -->

          
            <!-- START OF 2nd COLUMN IN 1ST ROW -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  <h6 class="m-0 font-weight-bold text-primary">Employee</h6>

                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="pieChartEmployee"></canvas>
                  </div>
                  <div class="mt-2 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i><a href="categories/teacher" style="color: #858796;"> <span style="color: #000;"><?php echo $other_info->employee_count('TEACHING'); ?></span> TEACHING
                    </span></a>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i><a href="categories/non_teaching" style="color: #858796;"> <span style="color: #000;"><?php echo $other_info->employee_count('NON-TEACHING'); ?></span> NON-TEACHING
                    </span></a>
                  </div>  
                  <div class="text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i><a href="categories/sdo_based_personnel" style="color: #858796;"> <span style="color: #000;"><?php echo $other_info->employee_count('SDO BASED PERSONNEL'); ?></span> SDO BASED PERSONNEL
                    </span></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- END OF 2nd COLUMN IN 1ST ROW -->
<!--           </div>  

          <div class="row">  --> 

            <!-- START OF 3rd COLUMN IN 1ST ROW -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- <a href="categories.php?category=teacher"> -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Levels of Civil Service Elegibility</h6>

                </div>
                <!-- </a> -->
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="pieChartLevelsCivil"></canvas>
                  </div>
                  <div class="mt-2 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i><a href="categories/firstlevel" style="color: #858796;"> <span style="color: #000;"><?php echo $other_info->levels_of_civil_count('First Level - SG 1-9'); ?></span> First Level
                    </span></a>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i><a href="categories/secondlevel" style="color: #858796;"> <span style="color: #000;"><?php echo $other_info->levels_of_civil_count('Second Level - SG 10-24'); ?></span> Second Level
                    </span></a>  
                  </div>
                  <div class="text-center small">
                    <span class="mt-3">
                      <i class="fas fa-circle text-info"></i><a href="categories/thirdlevel" style="color: #858796;"> <span style="color: #000;"><?php echo $other_info->levels_of_civil_count('Third Level - SG 25-Up'); ?></span> Third Level
                    </span></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- END OF 3rd COLUMN IN 1ST ROW -->


    
        </div>    
        <!-- END OF 1st ROW -->

        <!------------------------------------- START OF 2ND ROW -------------------------------------------------->
        <div class="row">


            <!------------------------------------- AGE FOR BOTH GENDERS --------------------------------------------------> 

            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  <h6 class="m-0 font-weight-bold text-primary">Age</h6>

                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="pieChartAge"></canvas>
                  </div>
                  <div class="mt-2 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i><a href="categories/18_30" style="color: #858796;"> <span style="color: #000;"> </span> 18-30
                    </span></a>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i><a href="categories/31_40" style="color: #858796;"> <span style="color: #000;"> </span> 31-40
                    </span></a>
                  </div>  
                  <div class="text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i><a href="categories/41_50" style="color: #858796;"> <span style="color: #000;"> </span> 41-50
                    </span></a>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i><a href="categories/51_60" style="color: #858796;"> <span style="color: #000;"> </span> 51-60
                    </span></a>                    
                  </div>
                </div>
              </div>
            </div>


            <!------------------------------------- AGE BY FEMALE CHART -------------------------------------------------->

            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  <h6 class="m-0 font-weight-bold text-primary">Age : <span style="color: #FF1493;">Female</span></h6>

                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="pieChartAgeFemale"></canvas>
                  </div>
                  <div class="mt-2 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i><a href="categories/female_18_30" style="color: #858796;"> <span style="color: #000;"> </span> 18-30
                    </span></a>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i><a href="categories/female_31_40" style="color: #858796;"> <span style="color: #000;"> </span> 31-40
                    </span></a>
                  </div>  
                  <div class="text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i><a href="categories/female_41_50" style="color: #858796;"> <span style="color: #000;"> </span> 41-50
                    </span></a>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i><a href="categories/female_51_60" style="color: #858796;"> <span style="color: #000;"> </span> 51-60
                    </span></a>                    
                  </div>
                </div>
              </div>
            </div>


            <!------------------------------------- AGE BY MALE CHART -------------------------------------------------->

            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  <h6 class="m-0 font-weight-bold text-primary">Age : <span style="color: #1420C2;">Male</span></h6>

                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="pieChartAgeMale"></canvas>
                  </div>
                  <div class="mt-2 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i><a href="categories/male_18_30" style="color: #858796;"> <span style="color: #000;"> </span> 18-30
                    </span></a>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i><a href="categories/male_31_40" style="color: #858796;"> <span style="color: #000;"> </span> 31-40
                    </span></a>
                  </div>  
                  <div class="text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i><a href="categories/male_41_50" style="color: #858796;"> <span style="color: #000;"> </span> 41-50
                    </span></a>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i><a href="categories/male_51_60" style="color: #858796;"> <span style="color: #000;"> </span> 51-60
                    </span></a>                    
                  </div>
                </div>
              </div>
            </div>


        </div>
      <!------------------------------------- END OF 2ND ROW -------------------------------------------------->

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
  <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
  <!-- <script src="js/demo/donut_chart.php"></script> -->
  <?php // require_once "js/demo/chart-bar-demo.php"; ?>  

  <!-- THIS DONUT CHART HAS THE LEVELS CIVIL AND EMPLOYEE TYPES -->
  <?php require_once 'js/demo/donut_chart.php'; ?>
  <!-- THIS DONUT CHART HAS THE AGE,FEMALE AGE AND MALE AGE -->
  <?php require_once 'js/demo/donut_chart2.php'; ?>  
</body>

</html>
