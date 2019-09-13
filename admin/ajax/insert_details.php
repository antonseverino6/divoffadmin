<?php 

    require_once '../includes/init.php';
    
    $tin_num = '';
    $special_order_no      =  '';
    $reg_temp_sub     =  '';
    $annual_salary     =  '';
    $source_fund     =  '';
    $nature_of_assignment     =  '';
    $primary_or_intermediate     =  '';

    $reg_effective_month =  '';
    $reg_effective_day =  '';
    $reg_effective_year =  '';

    $nat_effective_year = '';
    $nat_effective_day = '';
    $nat_effective_month = '';

    $tin_num     =  trim($db->fix_string($_POST['tin_num']));
    $special_order_no      =  strtoupper(trim($db->fix_string($_POST['special_order_no'])));
    $reg_temp_sub     =  trim($db->fix_string($_POST['reg_temp_sub']));
    $annual_salary     =  trim($db->fix_string($_POST['annual_salary']));
    $source_fund     =  trim($db->fix_string($_POST['source_fund']));
    $nature_of_assignment     =  strtoupper(trim($db->fix_string($_POST['nature_of_assignment'])));
    // $primary_or_intermediate  =  trim($db->fix_string($_POST['primary_or_intermediate']));
    $details_item_number =  trim($db->fix_string($_POST['details_item_number']));
    $position =  strtoupper(trim($db->fix_string($_POST['position'])));
    $remarks =  strtoupper(trim($db->fix_string($_POST['remarks'])));

    $reg_effective_year = $db->fix_string($_POST['reg_effective_year']);
    $reg_effective_day = $db->fix_string($_POST['reg_effective_day']);
    $reg_effective_month = $db->fix_string($_POST['reg_effective_month']);

    // $nat_effective_year = $db->fix_string($_POST['nat_effective_year']);
    // $nat_effective_day = $db->fix_string($_POST['nat_effective_day']);
    // $nat_effective_month = $db->fix_string($_POST['nat_effective_month']);    

    if($reg_effective_day == 0 || $reg_effective_month == 0) {
       $reg_effective_date = '';
    }else {
      $reg_effective_date = date('m-d-Y',strtotime($reg_effective_year ."-". $reg_effective_month ."-".$reg_effective_day));
    }

    // if($nat_effective_month == 0 || $nat_effective_day == 0) {
    //    $nat_effective_date = '';
    // }else {
    //   $nat_effective_date = date('m-d-Y',strtotime($nat_effective_year ."-". $nat_effective_month ."-".$nat_effective_day));
    // }


   
    if(!empty($special_order_no)) {

          $sql = "INSERT INTO details(tin_num,special_order_no,reg_temp_sub,reg_effective_date,";
          $sql .= "annual_salary,source_fund,nature_of_assignment,details_item_number,position,remarks) ";

          $sql .= "VALUES('$tin_num','$special_order_no','$reg_temp_sub','$reg_effective_date',";
          $sql .= "'$annual_salary','$source_fund','$nature_of_assignment','$details_item_number','$position','$remarks')";

          if($db->query($sql)) {
            $query = "SELECT * FROM details WHERE tin_num='$tin_num' ORDER BY id DESC LIMIT 1";
            $result = $db->query($query);
            $details_row = $result->fetch_array();

            echo "<tr><td class='person-info'>" . $details_row['special_order_no'] . "</td>";
            echo "<td class='person-info'>".$details_row['reg_temp_sub'] ."</td>";
            echo "<td class='person-info'>".$details_row['reg_effective_date'] ."</td>";
            echo "<td class='person-info'>".$details_row['source_fund'] ."</td>";
            echo "<td class='person-info table-data-action'><a name='view_details' class='view_details' id='".$details_row['id']."' title='View'><i class='far fa-eye'></i></a>&nbsp;";
            echo "<a name='edit_details_btn' class='edit_details_btn' id='".$details_row['id']."' title='Edit'><i class='far fa-edit'></i></a>&nbsp;";
            echo "<a name='delete_details_btn' class='delete_details_btn' id='".$details_row['id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td></tr>";
       
          }else {
            echo "it didnt work";
          }


    }