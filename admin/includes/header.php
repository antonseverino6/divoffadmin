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
          echo "My Details";
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

  </style>

</head>

<body id="page-top">