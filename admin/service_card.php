<?php require_once 'includes/header.php'; ?>
<?php $info = new Info(); ?>
<?php $other_info = new Other_info(); ?>
<?php $civil = new Civil(); ?>
<?php $details = new Details(); ?>
<?php if(isset($_GET['id']) && $info->employee_already_exists($_GET['id'])) {
        $tin_num = $db->fix_string($_GET['id']);

        $info_row = $info->get_for_service_card($tin_num);
        $other_info_row = $other_info->get_for_service_card($tin_num);
        $fetch_civil = $civil->get_for_service_card($tin_num);
        $fetch_details = $details->get_for_service_card($tin_num);
      }else {
         redirect('/divoffadmin/login'); 
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
          <div class="row">
              <div class="col-xl-12 col-md-6 mb-1">
                  <h4>Service Card</h4>
                  <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right ml-2" href="/divoffadmin/admin/gen_service_card_pdf/<?php echo $tin_num; ?>" target="_blank">Generate a PDF File</a>                
              </div>
          </div>  

          <div class="row" >

            
            <div class="col-xl-12 col-md-6 mb-4 service_card_header_holder">
              <div class="row mt-2 ml-1 mr-1">
                  <h3><?php echo $info_row['first_name'] ." ". $info_row['middle_name'] ." ". $info_row['last_name']; ?></h3>
              </div>
              <div class="row mt-2 ml-1 mb-2 mr-1">
                  <table class="service_card_table"> 
                     <tr>
                       <td>EN :</td>
                       <td class="info_first_col"><?php echo $info_row['employee_id']; ?></td>
                       <td>TIN :</td>
                       <td class="info_second_col"><?php echo $info_row['tin_num']; ?></td>
                       <td>GSIS BP No.</td>
                       <td class="info_third_col"><?php echo $other_info_row['gsis_no']; ?></td>
                     </tr>
                     <tr>
                       <td>Date of Birth</td>
                       <td class="info_first_col"><?php echo $info_row['birth_date']; ?></td>
                       <td>Place of Birth</td>
                       <td class="info_second_col"><?php echo $info_row['place_birth']; ?></td>
                       <td>Permanent Address</td>
                       <td class="info_third_col"><?php echo $info_row['per_address']; ?></td> 
                     </tr> 
                     <tr>
                       <td>Civil Status</td>
                       <td class="info_first_col"><?php echo $info_row['civil_status']; ?></td>
                       <td>Name of Spouse</td> 
                       <td class="info_second_col"><?php echo $other_info_row['spouse_name']; ?></td>
                       <td>Occupation</td>
                       <td class="info_third_col"><?php echo $other_info_row['spouse_occ']; ?></td>
                       <td>Address</td>
                       <td class="info_fourth_col"><?php echo $other_info_row['spouse_add']; ?></td>
                     </tr>
                  </table>
              </div>

            </div>
          </div>

          <div class="row">
            <div class="col-xl-12 col-md-6 mb-4 service_card_other_info_holder" >
               <h3 class="other-info-header">
                  Other Information
               </h3>
               <div class="row">
                   <div class="col-md-6 mb-1" >
                      <table class="table-other-info-1">
                         <tbody>
                            <tr>
                              <td colspan="2">Highest grade completed</td>
                              <td colspan="2"><?php echo $other_info_row['high_deg_received']; ?></td>
                            </tr>
                            <tr>
                              <td colspan="2">Year received</td>
                              <td colspan="4"><?php echo $other_info_row['year_received']; ?></td>
                            </tr>                            
                            <tr>
                              <td colspan="2">Name of Institution</td>
                              <td colspan="4"><?php echo $other_info_row['name_of_institution']; ?></td>
                            </tr>
                            <tr>
                              <td colspan="2">Special Qualification</td>
                              <td colspan="4"><?php echo $other_info_row['spec_qualification']; ?></td>
                            </tr>
                            <tr>
                              <td colspan="2">Previous Experience</td>
                              <td colspan="4"><?php echo $other_info_row['prev_experience']; ?></td>
                            </tr>  
                            <tr>
                              <td colspan="2">Teacher's competitive exam: Score;Date taken</td>
                              <td colspan="4">

                                <?php 
                                  if(empty($other_info_row['teach_comp_exam_score'])) : 
                                    echo $other_info_row['teach_comp_exam_date'];
                                  elseif(empty($other_info_row['teach_comp_exam_date'])) :
                                    echo $other_info_row['teach_comp_exam_score'];
                                  else :    
                                    echo $other_info_row['teach_comp_exam_score'] . " ; " . $other_info_row['teach_comp_exam_date']; 
                                  endif;  
                                ?>
                                </td>
                            </tr>
                            <tr>
                              <td colspan="2">G.S.I.S. B.P. No.</td>
                              <td colspan="4"><?php echo $other_info_row['gsis_no']; ?></td>
                            </tr>  
                         </tbody>                     
                      </table>
                   </div>
                   <div class="col-md-6 mb-4" >
                      <table class="table-other-info-2">
                         <thead>
                            <tr>
                              <th>C.S. Examination</th>
                              <th style="width: 120px;">Passed Rating</th>
                              <th>Date Examination</th>
                            </tr>
                         </thead> 
                         <tbody>

                         <?php while($civil_row = $fetch_civil->fetch_array()) : ?> 
                            <tr>
                              <td style="text-align: center;"><?php echo $civil_row['cs_exam']; ?></td>
                              <td style="text-align: center;"><?php echo $civil_row['cs_passed_rating']; ?></td>
                              <td style="text-align: center;"><?php echo $civil_row['cs_date_passed']; ?></td>
                            </tr>
                         <?php endwhile; ?>                                                                                                                   
                         </tbody>                     
                      </table>
                   </div>
                </div>   
            </div>
          </div> 


          <div class="row">
            <div class="col-xl-12 col-md-6 mb-4 service-card-details-holder" >
                <table class="table-service-card-details">
                   <thead>
                      <tr>
                        <th>Special Order Number / <br> Nature of Appt.</th>
                        <th>Regular <br> Temporary <br> or <br> Subtitute</th>
                        <th>Effective Date</th>
                        <th>Annual Salary</th>
                        <th>Source of Fund: <br> National or <br> Local</th>
                        <th>Station / <br> Nature of Assignment / <br> School</th>
                        <th>Item Number</th>
                        <th>Position</th>
                        <th>Remarks</th>
                      </tr>
                   </thead>
                   <tbody>
                      <?php while($details_row = $fetch_details->fetch_array()) : ?>
                        <tr>
                          <td><?php echo $details_row['special_order_no']; ?></td>
                          <td><?php echo $details_row['reg_temp_sub']; ?></td> 
                          <td><?php echo $details_row['reg_effective_date']; ?></td> 
                          <td><?php echo $details_row['annual_salary']; ?></td> 
                          <td><?php echo $details_row['source_fund']; ?></td> 
                          <td><?php echo $details_row['nature_of_assignment']; ?></td> 
                          <td><?php echo $details_row['details_item_number']; ?></td> 
                          <td><?php echo $details_row['position']; ?></td> 
                          <td><?php echo $details_row['remarks']; ?></td> 
                        </tr>
                      <?php endwhile; ?>
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

</body>

</html>
