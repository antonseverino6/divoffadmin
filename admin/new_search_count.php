<?php 

    require_once 'includes/init.php';
    $current_year = date("Y");
    $user = new User();
    if(!$session->is_logged_in()) {
        redirect('../login');
    }

    // elseif($session->isset_id() && $user->get_one_info('admin') == 0) {
    //     redirect('../index.php');
    // }
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <link rel="icon" href="/divoffadmin/admin/resources/img/background_divoff.png" type="image/icon type">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

<?php
 $current_page = $_SERVER['PHP_SELF'];
?>
  <title>

    <?php 

    switch ($current_page) {
      case '/divoffadmin/admin/index.php':
          echo "Dashboard";
        break;      
      case '/divoffadmin/admin/add_employee.php':
          echo "Add Employee";
        break; 
      case '/divoffadmin/admin/search_count.php':
          echo "Search";
        break;
      case '/divoffadmin/admin/backuptables.php':
          echo "Export Data";
        break;
      case '/divoffadmin/admin/manage_account.php':
          echo "Manage Account";
        break;
      case '/divoffadmin/admin/categories.php':
          echo "Categories";
        break;
      case '/divoffadmin/admin/mydetails.php':
          if (isset($_GET['id'])) {
            $result = $db->query("SELECT first_name,last_name FROM info WHERE tin_num='".$db->fix_string($_GET['id'])."'");
            $row = $result->fetch_array();

            echo $row['first_name'] . " " . $row['last_name'];
          } else {

            echo "My Details";

          }
        break;
      case '/divoffadmin/admin/service_card.php':
          echo "Service Card";
        break; 
      case '/divoffadmin/admin/set_service_record.php':
          echo "Service Record";
        break;
      case '/divoffadmin/admin/gen_all_pdf.php':
          echo "Generate Copies";
        break;                                                                           
      default:
        echo "Dashboard";
        break;
    } 

    ?>


  </title>

  <!-- Custom fonts for this template-->
  <link href="/divoffadmin/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/divoffadmin/admin/css/sb-admin-2.min.css" rel="stylesheet">
    
  <!-- Custom styles for this page -->
  <link href="/divoffadmin/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="/divoffadmin/admin/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="/divoffadmin/admin/sweetalert2/dist/sweetalert2.min.css">
  <style>
      .table-person-info {
          padding: 10px; border-radius: 5px; 
          background: #dddde2; 
          display:block; 
          height:100%;
      }
      .person-info {
          color: #000;
          font-weight: 700;
          
      }
      body {
          letter-spacing: 0.5px;
      }
            
      .table-person-info .asked-info {
          padding-left: 15px;   
      }
      
      .asked-info {
          color: #535563;
      }
      .cat_list a:active {
          background-color: rgb(235, 235, 235);
          text-decoration-color: #535563;
      }
      .cat-info {
          color: #535563;
      }
      
      .cat-info:hover {
          background-color: rgb(235, 235, 235);
      }
      
/*
      .table-official .person-info {
          background-color: rgb(235, 235, 235);
      }


*/
      .table-data-action {
        text-align: center;
      }

      .fa-edit {
        color: #51A659;
        cursor: pointer;
      }
      .fa-edit:hover {
          color: #000;
      }

      .fa-eye {
        color: #4B83B3;
        cursor: pointer;
      }

      .fa-eye:hover {
        color: #000;
      }

      .fa-trash-alt {
        color: #E22626;
        cursor: pointer;
      }

      .fa-trash-alt:hover {
        color: #000;
      }

      .service_card_header_holder {
        color: #eaedf2;
        background-color: #4e73df;
        font-size: 10px;
        border-radius: 3px;
      }    

      .service_card_table td:nth-child(even) {
          font-weight: bold;
          background-color: #f4f8fc;
          color: #000;
      }

      .service_card_table td {
          padding: 3px;
          border: 2px solid #4e73df;
      }
                

      .service_card_table tr {
          border: 2px solid #4e73df;
      }

      .other-info-header {
          border-bottom: 4px solid #5c5d60;
          color: #000;

      }

      .service_card_header_holder .service_card_table .info_first_col {
          width: 80px; 
      }   

      .service_card_header_holder .service_card_table .info_second_col {
          width: 200px; 
      } 

      .service_card_header_holder .service_card_table .info_third_col {
          width: 230px; 
      }       

      .service_card_header_holder .service_card_table .info_fourth_col {
          width: 230px; 
      }       

      .service_card_other_info_holder .table-other-info-1 {
        width: 100%;
        font-size: 14px;
      }

      .service_card_other_info_holder .table-other-info-1 td {
          /*border-bottom: 2px solid #000;*/
          padding: 2px;
      }

      
      .service_card_other_info_holder .table-other-info-1 td:nth-child(even) {
          font-weight: bold;
          color: #000;
      }

      .service_card_other_info_holder .table-other-info-1 td:nth-child(odd) {
          width: 39%;
      }



      .service_card_other_info_holder .table-other-info-2 {
        width: 100%;
        /*height: 100%;*/
        
      }
      .service_card_other_info_holder .table-other-info-2 th {
        border: 2px solid #f8f9fc;
        background-color: #4e73df;
        color: #eaedf2; 
        text-align: center;
        font-size: 15px;
      }      

      .service_card_other_info_holder .table-other-info-2 td {
          background-color: #ffffff;
          padding: 2px;
          font-size: 13px;
          color: #000;
          font-weight: bold;
      }      

      .service_card_other_info_holder .table-other-info-2 tr:nth-child(even) td {
          border: 2px solid #f8f9fc;
          background-color: #eaecef;
      }

      .service-card-details-holder .table-service-card-details {
          font-size: 14px;
          width: 100%;
      }

      .service-card-details-holder .table-service-card-details th {
          border: 2px solid #f8f9fc;
          background-color: #4e73df;
          color: #eaedf2; 
          text-align: center;
          padding: 1px;
          font-size: 13px; 
      }

      .service-card-details-holder .table-service-card-details td {
          background-color: #ffffff;
          padding: 2px;
          font-size: 13px;
          color: #000;
          font-weight: bold;
      }           

      .service-card-details-holder .table-service-card-details tr:nth-child(even) td {
          border: 2px solid #f8f9fc;
          background-color: #eaecef;
      }      

      .service-card-details-holder .table-service-card-details td {
          text-align: center;
      }
      
      .typeahead { z-index: 1051; }   
      
      #number_of_results small {
        font-size: 15px;
      }

      #search_count_form select {
        width: 220px;
      }

      .required-info {
        color: #ff3333;
      }        

      .upperCase {
        text-transform: uppercase;
      }

      input.notEmpty {
        background-color : rgb(232, 240, 254); 
      }          

      #components option:disabled {
        background-color: #D3D3D3;
      }

  </style>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body id="page-top">
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

    <div class="s007">
      <form method="get" action="" id="search_count_form">
        <div class="inner-form">

          <div class="advance-search">
             <div id="number_of_results" class="result-count" style="float: right; color: #555; font-size: 14px; font-weight: bold; margin-bottom: 26px; ">
               
             </div>
            <div class="row" style="clear: both;">
              <div class="input-field">
                <div class="input-select">

	            <select data-trigger="" name="school_name">
	              <option placeholder="" value="">SCHOOL NAME</option>
	              <?php $school_name_query = $info->school_name_choices(); ?>
	              <?php while($row = $school_name_query->fetch_array()) : ?>
	                      <option value="<?php echo $row['school_name']; ?>"><?php echo $row['school_name']; ?></option>    
	              <?php endwhile; ?>
	            </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="employee">
                    <option placeholder="" value="">EMPLOYEE</option>
					<option value="NON-TEACHING">NON-TEACHING</option>
					<option value="TEACHING">TEACHING</option>
					<option value="SDO BASED PERSONNEL">SDO BASED PERSONNEL</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">

	            <select data-trigger="" name="employee_type">
	            	<option placeholder="" value="">EMPLOYEE TYPE</option>
	              <?php 
	                $employee_type_count = count($other_info->employee_type_choices());
	                $employee_type_arr = $other_info->employee_type_choices();
	                    for($i = 1; $i < $employee_type_count; $i++) : ?>
	                      <option value="<?php echo $employee_type_arr[$i]; ?>"><?php echo $employee_type_arr[$i]; ?></option>
	              <?php endfor; ?>  
	            </select>

                </div>
              </div>
            </div>
            <div class="row second">
              <div class="input-field">
                <div class="input-select">

                  <select data-trigger="" name="position">
		            	<option placeholder="" value="">POSITION</option>
		              <?php 
		                $position_count = count($other_info->position_choices());
		                $position_arr = $other_info->position_choices();
		                    for($i = 1; $i < $position_count; $i++) : ?>
		                      <option value="<?php echo $position_arr[$i]; ?>"><?php echo $position_arr[$i]; ?></option>
		              <?php endfor; ?> 
		            </select>

                </div>
              </div>

            </div>
            <div class="row third">
              <div class="input-field">
                <button type="button" name="submit_search" value="search" id="search_count_btn" class="btn btn-primary">Search</button>
                <button class="btn-delete" id="delete">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </form>
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

    <script src="js/extention/choices.js"></script>
    <script>
      const customSelects = document.querySelectorAll("select");
      const deleteBtn = document.getElementById('delete')
      const choices = new Choices('select',
      {
        searchEnabled: false,
        removeItemButton: true,
        itemSelectText: '',
      });
      for (let i = 0; i < customSelects.length; i++)
      {
        customSelects[i].addEventListener('addItem', function(event)
        {
          if (event.detail.value)
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('valid')
            parent.classList.remove('invalid')
          }
          else
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('invalid')
            parent.classList.remove('valid')
          }
        }, false);
      }
      deleteBtn.addEventListener("click", function(e)
      {
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++)
        {
          deleteAll[i].click();
        }
      });

    </script>


  <script>
  	$(document).ready(function() {
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
