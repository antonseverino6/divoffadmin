<?php	

	require_once '../includes/init.php';


	$work_exp_id = '';
	$tin_num = '';
    $comp_name      =  '';
    $status     =  '';
    $designation     =  '';
    $salary     =  '';
    $branch     =  '';
    $leave_abs =   '';

    $leave_abs_month =  '';
    $leave_abs_day =  '';
    $leave_abs_year =  '';
    $from_date_year = '';
    $from_date_day = '';
    $from_date_month = '';
    $to_date_year = '';
    $to_date_day = '';
    $to_date_month = '';
    $work_exp_id = trim($db->fix_string($_POST['work_exp_id']));
    $tin_num = trim($db->fix_string($_POST['tin_num']));
    $comp_name      =  strtoupper(trim($db->fix_string($_POST['comp_name'])));
    $status     =  strtoupper(trim($db->fix_string($_POST['status'])));
    $designation     =  strtoupper(trim($db->fix_string($_POST['designation'])));
    $salary     =  trim($db->fix_string($_POST['salary']));
    $branch     =  strtoupper(trim($db->fix_string($_POST['branch'])));
    $leave_abs =   trim($db->fix_string($_POST['leave_abs'])); 


    $from_date_year = $db->fix_string($_POST['from_date_year']);
    $from_date_day = $db->fix_string($_POST['from_date_day']);
    $from_date_month = $db->fix_string($_POST['from_date_month']);

    if($from_date_day == 0 || $from_date_month == 0) {
       $exp_date_from = '';
    }else {
      $exp_date_from = date('m-d-Y',strtotime($from_date_year ."-". $from_date_month ."-".$from_date_day));
    }
    


    $to_date_year = $db->fix_string($_POST['to_date_year']);
    $to_date_day = $db->fix_string($_POST['to_date_day']);
    $to_date_month = $db->fix_string($_POST['to_date_month']);  
    
    if($to_date_day == 0 || $to_date_month == 0) {
       $exp_date_to = '';
    }else {
      $exp_date_to = date('m-d-Y',strtotime($to_date_year ."-". $to_date_month ."-".$to_date_day));
    }


      

    $leave_abs_month =  $db->fix_string($_POST['leave_abs_month']);
    $leave_abs_day =  $db->fix_string($_POST['leave_abs_day']);
    $leave_abs_year =  $db->fix_string($_POST['leave_abs_year']);
   

    if($leave_abs_day == 0 || $leave_abs_month == 0) {
       $leave_abs_date = '';
    }else {
      $leave_abs_date = date('m-d-Y',strtotime($leave_abs_year ."-". $leave_abs_month ."-".$leave_abs_day));
    }


    if(!empty($comp_name)) {

    	$sql  = "UPDATE work_exp SET comp_name='$comp_name',status='$status',designation='$designation',salary='$salary',";
    	$sql .= "branch='$branch',exp_date_from='$exp_date_from',exp_date_to='$exp_date_to',leave_abs='$leave_abs',";
    	$sql .= "leave_abs_date='$leave_abs_date' WHERE id=".$work_exp_id."";

    	 if($db->query($sql)) {
            $query = "SELECT * FROM work_exp WHERE tin_num='$tin_num'";
            $result = $db->query($query);
	        while($work_row = $result->fetch_array()):
                echo "<tr>";
                echo "<td class='person-info'>" . $work_row['comp_name'] . "</td>";
                echo "<td class='person-info'>". $work_row['status'] ."</td>";
                echo "<td class='person-info'>". $work_row['designation'] ."</td>";
                echo "<td class='person-info'>". $work_row['branch'] ."</td>";
                echo "<td class='person-info table-data-action'><a class='view_workexp'  id='".$work_row['id']."' title='View'><i class='far fa-eye'></i></a> ";
                echo "<a name='edit_workexp_btn' class='edit_workexp_btn' id='".$work_row['id']."' title='Edit'><i class='far fa-edit'></i></a> ";
                echo "<a name='delete_workexp_btn' class='delete_workexp_btn' id='".$work_row['id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>";

                echo "</tr>";
        	endwhile;
          }else {
            $query = "SELECT * FROM work_exp WHERE tin_num='$tin_num'";
            $result = $db->query($query);
            while($work_row = $result->fetch_array()):
                echo "<tr>";
                echo "<td class='person-info'>" . $work_row['comp_name'] . "</td>";
                echo "<td class='person-info'>". $work_row['status'] ."</td>";
                echo "<td class='person-info'>". $work_row['designation'] ."</td>";
                echo "<td class='person-info'>". $work_row['branch'] ."</td>";
                echo "<td class='person-info table-data-action'><a class='view_workexp'  id='".$work_row['id']."' title='View'><i class='far fa-eye'></i></a> ";
                echo "<a name='edit_workexp_btn' class='edit_workexp_btn' id='".$work_row['id']."' title='Edit'><i class='far fa-edit'></i></a> ";
                echo "<a name='delete_workexp_btn' class='delete_workexp_btn' id='".$work_row['id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>";

                echo "</tr>";
            endwhile;          
        }


    }else {
            $query = "SELECT * FROM work_exp WHERE tin_num='$tin_num'";
            $result = $db->query($query);
            while($work_row = $result->fetch_array()):
                echo "<tr>";
                echo "<td class='person-info'>" . $work_row['comp_name'] . "</td>";
                echo "<td class='person-info'>". $work_row['status'] ."</td>";
                echo "<td class='person-info'>". $work_row['designation'] ."</td>";
                echo "<td class='person-info'>". $work_row['branch'] ."</td>";
                echo "<td class='person-info table-data-action'><a class='view_workexp'  id='".$work_row['id']."' title='View'><i class='far fa-eye'></i></a> ";
                echo "<a name='edit_workexp_btn' class='edit_workexp_btn' id='".$work_row['id']."' title='Edit'><i class='far fa-edit'></i></a> ";
                echo "<a name='delete_workexp_btn' class='delete_workexp_btn' id='".$work_row['id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>";

                echo "</tr>";
            endwhile;   
    }	