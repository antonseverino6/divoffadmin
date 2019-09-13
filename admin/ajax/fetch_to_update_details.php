<?php

require_once '../includes/init.php';

$current_year = date("Y");

$details = new Details();


  if(isset($_POST['id'])) :
      $output = '';
      $sql = "SELECT * FROM details WHERE id=" . $db->fix_string($_POST['id']) ."";

      $result = $db->query($sql);
      $details_row = $result->fetch_array();


    $output = "
      <form method='post' action='ajax/update_details.php' id='update_details_form'>
        <div class='mt-3 row border border-bottom-0 border-right-0 rounded border-dark'>
        <div class='col-md-6 mt-3'>

                <input type='hidden' name='details_id' value='".$details_row['id']."'>
                <input type='hidden' name='tin_num' value='".$details_row['tin_num']."'>

            <div class='form-group'>
              <label for='special-order' class='col-form-label'>Special Order Number / Nature of Appt.<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='special_order_no' id='edit-special-order-no' value='".$details_row['special_order_no']."' autocomplete='off'>
            </div>


            <label for='reg_temp_sub' class='col-form-label'>Regular, Temporary or Subtitute<span class='required-info'> *</span></label>
            <div class='input-group' id='reg_temp_sub'>
                <div class='input-group-prepend'> 
              <select class='form-control' name='reg_temp_sub'>";

               $num_of_reg = count($details->pick_reg_temp_sub()); 
                $reg_temp_arr = $details->pick_reg_temp_sub();
                for($i = 0; $i < $num_of_reg; $i++):      
                  if($reg_temp_arr[$i] == $details_row['reg_temp_sub']){
                    $output .= "<option value='".$reg_temp_arr[$i]."' selected>".$reg_temp_arr[$i]."</option>"; 
                  }else {
                    $output .= "<option value='".$reg_temp_arr[$i]."'>".$reg_temp_arr[$i]."</option>";
                  } 
                  
               endfor;   
   $output .="</select>
		          </div>
		      </div>



            <label for='reg_effective_date' class='col-form-label'>Effective Date<span class='required-info'> *</span></label>
            <div class='input-group' id='reg_effective_date'>
                <div class='input-group-prepend'>      
                    <select name='reg_effective_month' id='edit-reg-effective-month'>";
                  if($details_row['reg_effective_date'] !== ''){
                      $reg_effective_date_arr = explode("-", $details_row['reg_effective_date']);
                         for($i=00; $i <= 12 ; $i++) {  
                            if($i == $reg_effective_date_arr[0]){                              
                              $output .= "<option value='".$i."' selected>".$i."</option>";
                            }else{
                              $output .= "<option value='".$i."'>".$i."</option>";
                            }
                          } 
        $output .= "</select>                
                    <select name='reg_effective_day' id='edit-reg-effective-day'>"; 
                         for($i=00; $i <= 31 ; $i++) {  
                            if($i == $reg_effective_date_arr[1]){                              
                              $output .= "<option value='".$i."' selected>".$i."</option>";
                            }else{
                              $output .= "<option value='".$i."'>".$i."</option>";
                            }
                          } 
        $output .= "</select>
                    <select name='reg_effective_year' id='edit-reg-effective-year'>";
                         for($i=$current_year; $i >= 1900 ; $i--) {  
                            if($i == $reg_effective_date_arr[2]){                              
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
                    <select name='reg_effective_day' id='edit-reg-effective-day'>"; 
                         for($i=00; $i <= 31 ; $i++) {  

                            $output .= "<option value='".$i."'>".$i."</option>";

                          } 
        $output .= "</select>
                    <select name='reg_effective_year' id='edit-reg-effective-year'>";
                         for($i=$current_year; $i >= 1900 ; $i--) {  

                            $output .= "<option value='".$i."'>".$i."</option>";

                          }  
                  }   

        $output .= "</select>
                    </div>   
                </div>


            <div class='form-group'>
              <label for='edit-annual-salary' class='col-form-label'>Annual Salary<span class='required-info'> *</span></label>
              <input class='form-control decimal' type='text' name='annual_salary' id='edit-annual-salary' value='".$details_row['annual_salary']."'>
            </div>


            <label for='source-fund' class='col-form-label'>Source of Fund: National or Capital<span class='required-info'> *</span></label>
            <div class='input-group' id='source-fund'>
                <div class='input-group-prepend'> 
              <select class='form-control' name='source_fund'>";

               $num_of_source_fund = count($details->pick_source_fund()); 
                $source_fund_arr = $details->pick_source_fund();
                for($i = 0; $i < $num_of_source_fund; $i++):      
                  if($source_fund_arr[$i] == $details_row['source_fund']){ 
                      $output .= "<option value='".$source_fund_arr[$i]."' selected>".$source_fund_arr[$i]."</option>";
                  }else {
                      $output .= "<option value='".$source_fund_arr[$i]."'>".$source_fund_arr[$i]."</option>";
                  } 
                
               endfor;   
  $output .= "</select>
              </div>
          </div>

  </div>
<div class='col-md-5 mt-3 border-left'>

            <div class='form-group'>
              <label for='edit-nature-ass' class='col-form-label'>Station/Nature of Assignment/School<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='nature_of_assignment' id='edit-nature-ass' value='".$details_row['nature_of_assignment']."' autocomplete='off'>
            </div>";
$output .= "

            <div class='form-group'>
              <label for='edit-item-number' class='col-form-label'>Item Number<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='details_item_number' id='edit-item-number' value='".$details_row['details_item_number']."' autocomplete='off'>
            </div>

            <div class='form-group'>
              <label for='edit-position' class='col-form-label'>Position<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='position' id='edit-position' value='".$details_row['position']."' autocomplete='off'>
            </div>

            <div class='form-group'>
              <label for='edit-remarks' class='col-form-label'>Remarks<span class='required-info'> *</span></label>
              <input class='form-control' type='text' name='remarks' id='edit-remarks' value='".$details_row['remarks']."' autocomplete='off'>
            </div>

            ";


        //   <label for='nat-effective-date' class='col-form-label'>Effective Date</label> 
        //     <div class='input-group' id='nat-effective-date'>
        //         <div class='input-group-prepend'>
        //             <select name='nat_effective_month'>";
        //             if($details_row['nat_effective_date'] !== '') {
        //                $nat_effective_date_arr = explode("-", $details_row['nat_effective_date']);
        //                    for($i=00; $i <= 12 ; $i++) {  
        //                       if($i == $nat_effective_date_arr[0]) {
        //                         $output .= "<option value='".$i."' selected>".$i."</option>";
        //                       }else {
        //                         $output .= "<option value='".$i."'>".$i."</option>";
        //                       }
        //                     } 
        //   $output .= "</select>                
        //               <select name='nat_effective_day'>"; 
        //                    for($i=00; $i <= 31 ; $i++) {  
        //                       if($i == $nat_effective_date_arr[1]) {
        //                         $output .= "<option value='".$i."' selected>".$i."</option>";
        //                       }else {
        //                         $output .= "<option value='".$i."'>".$i."</option>";
        //                       }
        //                     } 
        //   $output .= "</select>
        //               <select name='nat_effective_year' >";
        //                    for($i=$current_year; $i >= 1900 ; $i--) {  
        //                       if($i == $nat_effective_date_arr[2]) {
        //                         $output .= "<option value='".$i."' selected>".$i."</option>";
        //                       }else {
        //                         $output .= "<option value='".$i."'>".$i."</option>";
        //                       }
        //                     } 
        //             }else {
        //                    for($i=00; $i <= 12 ; $i++) {  

        //                       $output .= "<option value='".$i."'>".$i."</option>";

        //                     } 
        //   $output .= "</select>                
        //               <select name='nat_effective_day'>"; 
        //                    for($i=00; $i <= 31 ; $i++) {  

        //                       $output .= "<option value='".$i."'>".$i."</option>";

        //                     } 
        //   $output .= "</select>
        //               <select name='nat_effective_year' >";
        //                    for($i=$current_year; $i >= 1900 ; $i--) {  

        //                       $output .= "<option value='".$i."'>".$i."</option>";

        //                     } 
        //             } 

        // // $output .= 
        // // "</select>                
        //         </div>         
        //     </div> 

        //     <label for='pick_pri_inter' class='col-form-label'>Primary or Intermediate</label>
        //     <div class='input-group' id='pick_pri_inter'>
        //         <div class='input-group-prepend'> 
        //       <select class='form-control' name='primary_or_intermediate'>";

               // $num_of_pri_inter = count($details->pick_pri_inter()); 
               //  $pri_inter_arr = $details->pick_pri_inter();
               //  for($i = 0; $i < $num_of_pri_inter; $i++):      
               //     if($pri_inter_arr[$i] == $details_row['primary_or_intermediate']) {
               //        $output .= "<option value='".$pri_inter_arr[$i]."' selected>".$pri_inter_arr[$i]."</option>";
               //     }else {
               //        $output .= "<option value='".$pri_inter_arr[$i]."'>".$pri_inter_arr[$i]."</option>";
               //     }
               // endfor;  
  // $output .= "</select>
	$output .=	"</div>
		      </div>
          
        </div>    
          </div>
      </form>";    

      echo $output;
  endif;      
