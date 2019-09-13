<?php 

    require_once '../includes/init.php';
    
    $tin_num = '';
    $cs_exam      =  '';
    $cs_passed_rating     =  '';

    $cs_date_month =  '';
    $cs_date_day =  '';
    $cs_date_year =  '';
    $cs_date_passed = '';

    $tin_num     =  trim($db->fix_string($_POST['tin_num']));
    $cs_exam      =  strtoupper(trim($db->fix_string($_POST['cs_exam'])));
    $cs_passed_rating     =  trim($db->fix_string($_POST['cs_passed_rating']));

    $cs_date_year = $db->fix_string($_POST['cs_date_year']);
    $cs_date_day = $db->fix_string($_POST['cs_date_day']);
    $cs_date_month = $db->fix_string($_POST['cs_date_month']);

    if($cs_date_month == 0 || $cs_date_day == 0) {
       $cs_date_passed = '';
    }else {
      $cs_date_passed = date('m-d-Y',strtotime($cs_date_year ."-". $cs_date_month ."-".$cs_date_day));
    }


   
    if(!empty($cs_exam)) {

          $sql = "INSERT INTO civil_service(tin_num,cs_exam,cs_passed_rating,cs_date_passed) ";
          $sql .= "VALUES('$tin_num','$cs_exam','$cs_passed_rating','$cs_date_passed')";

          if($db->query($sql)) {
            $query = "SELECT * FROM civil_service WHERE tin_num='$tin_num' ORDER BY id DESC LIMIT 1";
            $result = $db->query($query);
            $civil_row = $result->fetch_array();

                echo "<tr><td class='person-info'>" . $civil_row['cs_exam'] . "</td>";
                echo "<td class='person-info'>". $civil_row['cs_passed_rating'] ."</td>";
                echo "<td class='person-info'>". $civil_row['cs_date_passed'] ."</td>";
                echo "<td class='person-info table-data-action'><a name='view_civil' class='view_civil' id='".$civil_row['id']."' title='View'><i class='far fa-eye'></i></a>&nbsp;";
                echo "<a name='edit_civilserv_btn' class='edit_civilserv_btn' id='".$civil_row['id']."' title='Edit'><i class='far fa-edit'></i></a>&nbsp;";
                echo "<a name='delete_civilserv_btn' class='delete_civilserv_btn' id='".$civil_row['id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td></tr>";
           
          }else {
            echo "it didnt work";
          }


    }