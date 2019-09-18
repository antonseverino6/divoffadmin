<?php
require_once '../includes/init.php';

$current_year = date("Y");

if(isset($_POST['id'])) {
	$output = '';
	$sql = "SELECT * FROM civil_service WHERE id=" . $db->fix_string($_POST['id']) ."";

	$result = $db->query($sql);

	$civilserve_row = $result->fetch_array();
	

$output = "	

<form method='post' action='ajax/update_civil_service.php' id='update_civil_service_form'>

	        <div class='mt-3 row border border-bottom-0 border-right-0 rounded border-dark'>
        
        <div class='col-md-6 mt-3'>

                <input type='hidden' name='cs_id' value='".$civilserve_row['id']."'>
                <input type='hidden' name='tin_num' value='".$civilserve_row['tin_num']."'>

            <div class='form-group'>
              <label for='cs-exam' class='col-form-label'>Civil Service Examination<span class='required-info'> *</span></label>
              <input class='form-control upperCase' type='text' name='cs_exam' id='edit-cs-exam' value='".$civilserve_row['cs_exam']."'>
            </div>
            <div class='form-group'>
              <label for='rating' class='col-form-label'>Passed Rating<span class='required-info'> *</span></label>
              <input class='form-control decimal' type='text' name='cs_passed_rating' id='edit-rating' value='".$civilserve_row['cs_passed_rating']."'>
            </div>
          
	        <label for='cs-date' class='col-form-label'>Date Examination<span class='required-info'> *</span></label>        
	        <div class='input-group' id='cs-date'>
	            <div class='input-group-prepend'>
	                <select name='cs_date_month' id='edit-cs-month'>";
	                if($civilserve_row['cs_date_passed'] !== ''){
	                	$cs_date_passed_arr = explode("-",$civilserve_row['cs_date_passed']);
	                     for($i=00; $i <= 12 ; $i++) {  
	                     	if($i == $cs_date_passed_arr[0]){
	                     		$output .= "<option value='".$i."' selected>".$i."</option>";
	                     	}else{
	                        	$output .= "<option value='".$i."'>".$i."</option>";
	                     	}
	                      } 
	    $output .= "</select>                
	                <select name='cs_date_day' id='edit-cs-day'>"; 
	                     for($i=00; $i <= 31 ; $i++) {  
	                     	if($i == $cs_date_passed_arr[1]){
	                     		$output .= "<option value='".$i."' selected>".$i."</option>";
	                     	}else{
	                        	$output .= "<option value='".$i."'>".$i."</option>";
	                     	}
	                      } 
	    $output .= "</select>
	                <select name='cs_date_year'>";
	                     for($i=$current_year; $i >= 1900 ; $i--) {  
	                     	if($i == $cs_date_passed_arr[2]){
	                     		$output .= "<option value='".$i."' selected>".$i."</option>";
	                     	}else{
	                        	$output .= "<option value='".$i."'>".$i."</option>";
	                     	}
	                      } 
  	                	
	                }else {
		                
		                     for($i=00; $i <= 12 ; $i++) {  

		                        $output .= "<option value='".$i."'>".$i."</option>";

		                      } 
		$output .= "</select>                
		                <select name='cs_date_day' id='edit-cs-day'>"; 
		                     for($i=00; $i <= 31 ; $i++) {  

		                        $output .= "<option value='".$i."'>".$i."</option>";

		                      } 
		$output .= "</select>
		                <select name='cs_date_year'>";
		                     for($i=$current_year; $i >= 1900 ; $i--) {  

		                        $output .= "<option value='".$i."'>".$i."</option>";

		                      } 
		                 	
	                }
             
	 $output .= "
	 		</select>  
	 		</div>         
	        </div>

  </div>
  
          </div>
    </form>";      

    echo $output;
}