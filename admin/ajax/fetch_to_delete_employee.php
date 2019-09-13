<?php


	require_once '../includes/init.php';

	if(isset($_POST['id'])) {
		$output = '';
		$result = $db->query("SELECT id,first_name FROM info WHERE tin_num = " . $db->fix_string($_POST['id']) ."");

		$info_row = $result->fetch_array();

            $first_name = str_split($info_row['first_name']);
            if(end($first_name) == 'S') {
              $output .= " Are You sure you want to delete ". $info_row['first_name']  . "' info?";
            }else {
              $output .= " Are You sure you want to delete ". $info_row['first_name']  . "'s info?";
            } 

            $output .= "     <form action='ajax/delete_employee.php' method='post' id='delete_employee_form'>
          				<input type='hidden' name='tin_num' value='".$_POST['id']."'> 
           			   </form>";

           	echo $output;		   

	}