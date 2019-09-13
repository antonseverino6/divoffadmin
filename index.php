<?php
    require_once 'admin/includes/init.php';
 $current_year = date("Y");

    if(!$session->is_logged_in()) {
        redirect('login');
    }else {
       redirect('/divoffadmin/admin/index');
    }
        $user = new User();
    // $official = new Official();
    // $db_object = new Db_object();

    // $user_off = $official->get_all_for_user($user->get_one_info('id'));
    // $full_name = strtoupper($user_off['first_name']. " " . $user_off['middle_name'] . " " . $user_off['last_name']);
    // $employee_name = $user_off['prefix'] . ". " . $full_name;
    // $work_tel_no = $user_off['work_tel_no'];
    // $email = $user_off['email'];
    // $employee_id = $user_off['employee_id'];


  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Amnahis - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
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

  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Start of Sidebar -->
    <?php require_once 'includes/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<!--
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
-->

          <!-- Topbar Navbar -->
         <?php require_once 'includes/navbar.php'; ?> 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-xl-12 col-md-7 mb-0 mt-1">
            <!-- <h1 class="h3 mb-0 text-gray-800">My Details</h1> -->
            
            </div>
          </div>


          <!-- Content Row -->
          <div class="mt-5 row border border-top-0 border-left-0 rounded border-dark" >

            <!-- Earnings (Monthly) Card Example -->
 
                <div class="col-xl-3 col-md-5 mb-4 mt-1" style="padding-right: 0; margin-right: 0;">
                    <h2 style="margin-left: 15px;">My Details</h2>
                    
                   <img class="img-thumbnail" src="resources/img/placeholder-img.jpg" alt="..." style="height: 175px; width: 175px; margin-left: 70px;">
                    
                </div> 

                <div class="col-xl-9 col-md-6 mt-5 ml-0" style="margin-bottom: 20px;">

                    <div class="table-person-info">
                        
                    <table style="background-color: #fff; width: 100%; height: 100%; border-radius: 3px;">
                      <tbody >
                        <tr style="border-bottom: 1px solid rgba(0,0,0,.125);">
                          <td class="asked-info" width="20%" >Employee Name</td>
                          <td width="60%" class="person-info">:&nbsp;<?php echo $employee_name; ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,.125);">
                          <td class="asked-info">Employee Id</td>
                          <td class="person-info">:&nbsp; <?php echo $employee_id; ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,.125);">
                          <td class="asked-info">Email</td>
                          <td class="person-info">:&nbsp; <?php echo $email; ?></td>
                        </tr>
                        <tr >
                          <td class="asked-info">Contact Number</td>
                          <td class="person-info">:&nbsp; <?php echo $work_tel_no; ?></td>
                        </tr>      
                      </tbody>
                    </table>
                     </div>                   
                </div>  
              
          </div>

            <div class="mt-3 row border border-bottom-0 border-right-0 rounded border-dark ">
                <div class="col-xl-2 col-md-5 mb-4 mt-3" >
                    
                    
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-official" role="tab" aria-controls="v-pills-home" aria-selected="true">Official</a>
<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-personalinfo" role="tab" aria-controls="v-pills-profile" aria-selected="false">Personal Information</a>
<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-contactinfo" role="tab" aria-controls="v-pills-profile" aria-selected="false">Contact Information</a>
<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-familydetails" role="tab" aria-controls="v-pills-messages" aria-selected="false">Family</a>
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-education" role="tab" aria-controls="v-pills-settings" aria-selected="false">Education</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-civilservice" role="tab" aria-controls="v-pills-settings" aria-selected="false">Civil Service Eligibility</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-workexperience" role="tab" aria-controls="v-pills-settings" aria-selected="false">Work Experience</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-voluntarywork" role="tab" aria-controls="v-pills-settings" aria-selected="false">Voluntary Work</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-certification" role="tab" aria-controls="v-pills-settings" aria-selected="false">Learning &amp; Development</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-otherinfo" role="tab" aria-controls="v-pills-settings" aria-selected="false">Other Information</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-questionnaire" role="tab" aria-controls="v-pills-settings" aria-selected="false">Questionnaire</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-references" role="tab" aria-controls="v-pills-settings" aria-selected="false">References</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-payslips" role="tab" aria-controls="v-pills-settings" aria-selected="false">Pay slips</a>      
<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-dtr" role="tab" aria-controls="v-pills-settings" aria-selected="false">DTR</a>      
    </div>                    
                    

                    
                </div>
                
                <div class="col-xl-10 col-md-5 mb-4 mt-3">
                
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-official" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="float-right"><a class="btn btn-success btn-circle mb-1" href="edit_page.php?edit=official&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>" title="Edit"><i class="fas fa-edit" ></i></a></div>
                <?php 
                    if($official->check_if_has_user_id($user->get_one_info('id'))){
                        require_once 'info_page/official.php'; 
                    }else {
                        require_once 'forms/official.php';
                    }
                ?> 
            </div>
            <div class="tab-pane fade" id="v-pills-personalinfo" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="float-right"><a href="edit_page.php?edit=personal&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
                <?php 
                
//                    $personal = new Personal();
                
                    if($db_object->check_if_has_user_id('personal_info',$user->get_one_info('id'))){
                        require_once 'info_page/personal_info.php';
                    }else {
                        require_once 'forms/personal_info.php';
                    }
                ?>
            </div>
            <div class="tab-pane fade" id="v-pills-contactinfo" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="float-right"><a href="edit_page.php?edit=contact&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
                <?php 
                
//                    $contact = new Contact();
                
                    if($db_object->check_if_has_user_id('contact',$user->get_one_info('id'))){
                        require_once 'info_page/contact_info.php';
                    }else {
                        require_once 'forms/contact.php';
                    }
                ?>
            
            </div>
            <div class="tab-pane fade" id="v-pills-familydetails" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="float-right"><a href="edit_page.php?edit=family&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
            <?php 
                
//              $family = new Family();  
                    
                    if($db_object->check_if_has_user_id('family',$user->get_one_info('id')) || $db_object->check_if_has_user_id('spouse',$user->get_one_info('id')) || $db_object->check_if_has_user_id('family',$user->get_one_info('id'))) {
                        require_once 'info_page/fam_details.php';
                    }else {
                        require_once 'forms/family.php';
                    }    
            
            ?>
            </div>
            <div class="tab-pane fade" id="v-pills-education" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="float-right mb-1">

                    <a class="btn btn-primary btn-circle" href="edit_page.php?edit=official&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>" title="Add"><i class="fas fa-plus" ></i></a>

                    <a class="btn btn-success btn-circle" href="edit_page.php?edit=education&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>"  title="Edit"><i class="fas fa-edit"></i></a>
                </div>
            <?php 
            
//                $education = new Education();
                
                if($db_object->check_if_has_user_id('education',$user->get_one_info('id'))){
                    require_once 'info_page/education.php';
                }else {
                    require_once 'forms/education.php';
                }
                
            ?>
            </div>
            <div class="tab-pane fade" id="v-pills-civilservice" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="float-right"><a href="edit_page.php?edit=civil&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
            
            <?php    
            
//                $civil = new Civil();
                
                if($db_object->check_if_has_user_id('civil',$user->get_one_info('id'))){
                    require_once 'info_page/civil_service.php';
                }else {
                    require_once 'forms/civil_service.php';
                }
                
                
            ?>  
            </div>
            <div class="tab-pane fade" id="v-pills-workexperience" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="float-right"><a href="edit_page.php?edit=workexp&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
            <?php
                
                if($db_object->check_if_has_user_id('work_exp',$user->get_one_info('id'))){
                    require_once 'info_page/work_exp.php';
                }else {
                    require_once 'forms/work_exp.php';
                }  
            
            ?>
            </div>
            <div class="tab-pane fade" id="v-pills-voluntarywork" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="float-right"><a href="edit_page.php?edit=voluntary&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
            <?php    
                if($db_object->check_if_has_user_id('voluntary',$user->get_one_info('id'))){
                    require_once 'info_page/voluntary.php';
                }else {
                    require_once 'forms/voluntary.php';
                }   
            ?>
                
            </div>
            <div class="tab-pane fade" id="v-pills-certification" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="float-right"><a href="edit_page.php?edit=certification&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
            <?php 
                
                if($db_object->check_if_has_user_id('certification',$user->get_one_info('id'))){
                    require_once 'info_page/certification.php';
                }else {
                    require_once 'forms/certification.php';
                }             
                
            ?>
                
            </div>
            <div class="tab-pane fade" id="v-pills-otherinfo" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="float-right"><a href="edit_page.php?edit=otherinfo&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
                
            <?php 
                
                if($db_object->check_if_has_user_id('other_info',$user->get_one_info('id'))){
                    require_once 'info_page/other_info.php';
                }else {
                    require_once 'forms/other_info.php';
                }             
                 
            ?>            
            
            </div>
            <div class="tab-pane fade" id="v-pills-questionnaire" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>

            <div class="tab-pane fade" id="v-pills-references" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="float-right"><a href="edit_page.php?edit=references&user_id=<?php echo $db_object->user_id($user->get_one_info('id')); ?>">Edit</a></div>
            <?php 
                
                if($db_object->check_if_has_user_id('ref',$user->get_one_info('id'))){
                    require_once 'info_page/references.php';
                }else {
                    require_once 'forms/references.php';
                }             
                 
            ?>         
            
            
            </div>
            <div class="tab-pane fade" id="v-pills-payslips" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            <div class="tab-pane fade" id="v-pills-dtr" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>

                    </div>      
                    
                    
                    <?php 
                        $info_page = '';
                        if(isset($_GET['info_page'])){
                            $info_page = $_GET['info_page'];                    
                        }
                    
//                             switch($info_page) {                           
//                                case 'personalinfo':
//                                     require_once 'info_page/personal_info.php';
//                                break;
//                                case 'contactinfo':
//                                     require_once 'info_page/contact_info.php';
//                                break;     
//                                case 'familydetails':
//                                     require_once 'info_page/fam_details.php';
//                                break;                            
//                                case 'education':
//                                     require_once 'info_page/educ_details.php';
//                                break;                            
//                                case 'civilservice':
//                                     require_once 'info_page/civil_elig.php';
//                                break;                            
//                                case 'workexperience':
//                                     require_once 'info_page/work_exp.php';
//                                break;                            
//                                case 'voluntarywork':
//                                     require_once 'info_page/volun_work.php';
//                                break;                            
//                                case 'certification':
//                                     require_once 'info_page/certification.php';
//                                break;                             
//                                case 'otherinfo':
//                                     require_once 'info_page/other_info.php';
//                                break;                             
//                                case 'questionnaire':
//                                     require_once 'info_page/questionnaire.php';
//                                break;                             
//                                case 'references':
//                                     require_once 'info_page/references.php';
//                                break;                            
//                                default:
//                                    require_once 'info_page/official.php';
//                                break;
//
//                            }
//                    
                    ?>
                    
                                
                    

                </div>
            
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once 'includes/footer.php'; ?>
