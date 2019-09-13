<?php 

	require_once '../includes/init.php';

	$current_year = date("Y");


	if(isset($_POST['id'])) {
		$output = '';
		$sql = "SELECT * FROM work_exp WHERE id=" . $db->fix_string($_POST['id']) ."";

		$result = $db->query($sql);

		$workexp_row= $result->fetch_array();
		
		
		
		$output .= "

<form method='post' action='ajax/update_work_exp.php' id='update_work_exp_form'>	
<div class='mt-3 row border border-bottom-0 border-right-0 rounded border-dark'>
        <div class='col-md-6 mt-3'>

            
            <input type='hidden' name='work_exp_id' value='".$workexp_row['id']."'>
            <input type='hidden' name='tin_num' value='".$workexp_row['tin_num']."'>
            <div class='form-group'>
              <label for='comp-name' class='col-form-label'>Station/Place of Assignment<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='comp_name' id='edit-comp-name' value='".$workexp_row['comp_name']."' autocomplete='off'>
            </div>
            <div class='form-group'>
              <label for='status' class='col-form-label'>Status<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='status' id='edit-status' value='".$workexp_row['status']."' autocomplete='off'>
            </div>
            <div class='form-group'>
              <label for='designation' class='col-form-label'>Designation<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='designation' id='edit-designation' value='".$workexp_row['designation']."' autocomplete='off'>
            </div>            
            <div class='form-group'>
              <label for='salary' class='col-form-label'>Salary<span class='required-info'> *</span></label>
              <input class='form-control decimal' type='text' name='salary' id='edit-salary' value='".$workexp_row['salary']."' autocomplete='off'>
            </div>
            <div class='form-group'>
              <label for='branch' class='col-form-label'>Branch<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='branch' id='edit-branch' value='".$workexp_row['branch']."' autocomplete='off'>
            </div>
        </div>

<div class='col-md-5 mt-3'>


            <label for='from_date' class='col-form-label'>From<span class='required-info'> *</span></label>
            <div class='input-group' id='from_date'>
                <div class='input-group-prepend'>      
                    <select name='from_date_month' id='edit-from-date-month-work-exp'>";

                    if($workexp_row['exp_date_from'] !== ''){
                    	$exp_date_from_arr = explode("-", $workexp_row['exp_date_from']);
                        for($i=00; $i <= 12 ; $i++) {  
                       		if($i == $exp_date_from_arr[0]): 	
     							$output .=	"<option value='".$i."' selected>".$i."</option>";
                    		else:
          						$output .= "<option value='".$i."'>".$i."</option>";
                        	endif;
                        } 
       						$output .=  "</select>                
                    		<select name='from_date_day' id='edit-from-date-day-work-exp'>"; 
                        for($i=00; $i <= 31 ; $i++) { 
                        	if($i == $exp_date_from_arr[1]):		
                  				$output .=  "<option value='".$i."' selected>".$i."</option>";
                            else:
                    			$output .= "<option value='".$i."'>".$i."</option>";
                            endif;
                        } 
            				$output .=  "</select>
                    			<select name='from_date_year'>";
                        for($i=$current_year; $i >= 1900 ; $i--) {  
                        	if($i == $exp_date_from_arr[2]):		
                   				$output .=  "<option value='".$i."' selected>".$i."</option>";
                            else:
                    			$output .= "<option value='".$i."'>".$i."</option>";
                            endif;
                        } 
            				$output .= "</select>";
                    }else {
                        for($i=00; $i <= 12 ; $i++) {  
 
          						$output .= "<option value='".$i."'>".$i."</option>";

                        } 
       						$output .=  "</select>                
                    		<select name='from_date_day' id='edit-from-date-day-work-exp'>"; 
                        for($i=00; $i <= 31 ; $i++) { 

                    			$output .= "<option value='".$i."'>".$i."</option>";

                        } 
            				$output .=  "</select>
                    			<select name='from_date_year'>";
                        for($i=$current_year; $i >= 1900 ; $i--) {  

                    			$output .= "<option value='".$i."'>".$i."</option>";
                        } 
            				$output .= "</select>";
                    }
           $output .="         

                    </div>   
                </div>  

        <label for='to_date' class='col-form-label'>To<span class='required-info'> *</span></label>        
        <div class='input-group' id='to_date'>
            <div class='input-group-prepend'>
                <select name='to_date_month' id='edit-to-date-month-work-exp'>";

                if($workexp_row['exp_date_to'] !== ''){
                	$exp_date_to_arr = explode("-", $workexp_row['exp_date_to']);
                    for($i=00; $i <= 12 ; $i++) {  
                   		if($i == $exp_date_to_arr[0]): 	
 							$output .=	"<option value='".$i."' selected>".$i."</option>";
                		else:
      						$output .= "<option value='".$i."'>".$i."</option>";
                    	endif;
                    } 
   						$output .=  "</select>                
                		<select name='to_date_day' id='edit-to-date-day-work-exp'>"; 
                    for($i=00; $i <= 31 ; $i++) { 
                    	if($i == $exp_date_to_arr[1]):		
              				$output .=  "<option value='".$i."' selected>".$i."</option>";
                        else:
                			$output .= "<option value='".$i."'>".$i."</option>";
                        endif;
                    } 
        				$output .=  "</select>
                			<select name='to_date_year'>";
                    for($i=$current_year; $i >= 1900 ; $i--) {  
                    	if($i == $exp_date_to_arr[2]):		
               				$output .=  "<option value='".$i."' selected>".$i."</option>";
                        else:
                			$output .= "<option value='".$i."'>".$i."</option>";
                        endif;
                    } 
        				$output .= "</select>";      	
                }else {
                    for($i=00; $i <= 12 ; $i++) {  

      						$output .= "<option value='".$i."'>".$i."</option>";

                    } 
   						$output .=  "</select>                
                		<select name='to_date_day' id='edit-to-date-day-work-exp'>"; 
                    for($i=00; $i <= 31 ; $i++) { 

                			$output .= "<option value='".$i."'>".$i."</option>";

                    } 
        				$output .=  "</select>
                			<select name='to_date_year'>";
                    for($i=$current_year; $i >= 1900 ; $i--) {  

                			$output .= "<option value='".$i."'>".$i."</option>";

                    } 
        				$output .= "</select>";    
                }	
 
      $output .= "            
            </div>         
        </div>
            <div class='form-group'>
              <label for='leave_abs' class='col-form-label'>Lv. of abs. w/o pay</label>
              <input class='form-control' type='text' name='leave_abs' id='leave_abs' value='".$workexp_row['leave_abs']."'>
            </div>


          <label for='leave_date' class='col-form-label'>Date of Lv.</label> 
            <div class='input-group' id='leave_date'>
                <div class='input-group-prepend'>
                    <select name='leave_abs_month'>"; 


                if($workexp_row['leave_abs_date'] !== ''){
                	$leave_abs_date_arr = explode("-", $workexp_row['leave_abs_date']);
                    for($i=00; $i <= 12 ; $i++) {  
                   		if($i == $leave_abs_date_arr[0]): 	
 							$output .=	"<option value='".$i."' selected>".$i."</option>";
                		else:
      						$output .= "<option value='".$i."'>".$i."</option>";
                    	endif;
                    } 
   						$output .=  "</select>                
                		<select name='leave_abs_day'>"; 
                    for($i=00; $i <= 31 ; $i++) { 
                    	if($i == $leave_abs_date_arr[1]):		
              				$output .=  "<option value='".$i."' selected>".$i."</option>";
                        else:
                			$output .= "<option value='".$i."'>".$i."</option>";
                        endif;
                    } 
        				$output .=  "</select>
                			<select name='leave_abs_year'>";
                    for($i=$current_year; $i >= 1900 ; $i--) {  
                    	if($i == $leave_abs_date_arr[2]):		
               				$output .=  "<option value='".$i."' selected>".$i."</option>";
                        else:
                			$output .= "<option value='".$i."'>".$i."</option>";
                        endif;
                    } 
        				$output .= "</select>";      	
                }else {
                    for($i=00; $i <= 12 ; $i++) {  

      					$output .= "<option value='".$i."'>".$i."</option>";

                    } 
   						$output .=  "</select>                
                		<select name='leave_abs_day'>"; 
                    for($i=00; $i <= 31 ; $i++) { 

                		$output .= "<option value='".$i."'>".$i."</option>";

                    } 
        				$output .=  "</select>
                			<select name='leave_abs_year'>";
                    for($i=$current_year; $i >= 1900 ; $i--) {  

                		$output .= "<option value='".$i."'>".$i."</option>";

                    } 
        				$output .= "</select>";   
                }

        $output .= "            
                </div>         
            </div> 

     </div>
    </div>

    </form>";


	echo $output;

	}

