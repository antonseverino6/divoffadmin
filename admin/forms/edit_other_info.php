<?php
$current_year = date("Y");
$other_info = new Other_info();
$fetch_other_info = $other_info->get_details_for($tin_num);
$emp_other_info = $fetch_other_info->fetch_array();

 if(isset($_POST['edit_other_info'])) {
    $spouse_name = strtoupper(trim($db->fix_string($_POST['spouse_name'])));
    $spouse_occ =  strtoupper(trim($db->fix_string($_POST['spouse_occ'])));
    $spouse_add =  strtoupper(trim($db->fix_string($_POST['spouse_add'])));

    $high_deg_received =  strtoupper(trim($db->fix_string($_POST['high_deg_received'])));
    $year_received =  trim($db->fix_string($_POST['year_received']));
    $name_of_institution =  strtoupper(trim($db->fix_string($_POST['name_of_institution'])));
    $spec_qualification =  strtoupper(trim($db->fix_string($_POST['spec_qualification'])));
    $prev_experience =  strtoupper(trim($db->fix_string($_POST['prev_experience'])));
    // $teach_comp_exam_score =  trim($db->fix_string($_POST['teach_comp_exam_score']));
    $teach_comp_exam_score = '';
    $teach_comp_exam_date = '';
    $gsis_no =  trim($db->fix_string($_POST['gsis_no']));
    $level_civil_service = trim($db->fix_string($_POST['level_civil_service']));
    $employee = trim($db->fix_string($_POST['employee']));
    $position = trim($db->fix_string($_POST['position']));
    $employee_type = trim($db->fix_string($_POST['employee_type']));
    $philhealth_no = trim($db->fix_string($_POST['philhealth_no']));
    $prc_license = trim($db->fix_string($_POST['prc_license']));
    $lbp_no = trim($db->fix_string($_POST['lbp_no']));
    $pag_ibig_no = trim($db->fix_string($_POST['pag_ibig_no']));
    $subject = trim($db->fix_string($_POST['subject']));
    $tle_strand = trim($db->fix_string($_POST['tle_strand']));
    $tle_component = trim($db->fix_string($_POST['tle_component']));
    $grade_level = trim($db->fix_string($_POST['grade_level']));



    if ($employee === "SDO BASED PERSONNEL") {
        $subject = "";
        $tle_strand = "";
        $tle_component = "";
        $grade_level = "";
    }

    if ($employee === 'NON-TEACHING' && ($position !== 'HEAD TEACHER I' && $position !== 'HEAD TEACHER II' && $position !== 'HEAD TEACHER III' && $position !== 'HEAD TEACHER IV' && $position !== 'HEAD TEACHER V' && $position !== 'HEAD TEACHER VI') ) {
        $subject = "";
        $tle_strand = "";
        $tle_component = ""; 
        $grade_level = "";
    }

    if ($subject !== "Technology and Livelihood Education (TLE)") {
      $tle_strand = "";
      $tle_component = "";
    } 
          

    // $teach_comp_month =  trim($db->fix_string($_POST['teach_comp_month']));
    // $teach_comp_day =  trim($db->fix_string($_POST['teach_comp_day']));
    // $teach_comp_year =  trim($db->fix_string($_POST['teach_comp_year']));
    // if($teach_comp_month == 0 || $teach_comp_day == 0) {
    //   $teach_comp_exam_date = '';
    // }else {
    //   $teach_comp_exam_date = date('m-d-Y',strtotime($teach_comp_year ."-". $teach_comp_month ."-".$teach_comp_day));
    // }
    

    if(!empty($tin_num)) {
        $sql = "UPDATE other_info SET spouse_name='$spouse_name',spouse_occ='$spouse_occ',";
        $sql .= "spouse_add='$spouse_add',high_deg_received='$high_deg_received',year_received='$year_received',";
        $sql .= "name_of_institution='$name_of_institution',spec_qualification='$spec_qualification',";
        $sql .= "prev_experience='$prev_experience',teach_comp_exam_score='$teach_comp_exam_score',";
        $sql .= "teach_comp_exam_date='$teach_comp_exam_date',gsis_no='$gsis_no',level_civil_service ='$level_civil_service',";
        $sql .= "employee='$employee',employee_type='$employee_type',position='$position',";
        $sql .= "philhealth_no='$philhealth_no',prc_license='$prc_license',lbp_no='$lbp_no',";
        $sql .= "pag_ibig_no='$pag_ibig_no',subject='$subject',tle_strand='$tle_strand',";
        $sql .= "tle_component='$tle_component',grade_level='$grade_level' WHERE tin_num='$tin_num'";

        if($db->query($sql)) {
            redirect('/divoffadmin/admin/mydetails/'.$tin_num);
        }
    }
 }

?>
<form action="" method="post">
    <table class="table table-bordered bg-white table-official table-striped">
  <thead>
    <tr>
      <th colspan="4" class="text-center">Spouse Information</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="asked-info" style="width: 225px;">Name of Spouse</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="spouse_name" value="<?php echo $emp_other_info['spouse_name']; ?>" placeholder="e.g. MARIA A. CRUZ" <?php if($emp_info['civil_status'] == 'SINGLE') { echo "disabled"; }  ?>></td>
    </tr>
    <tr>
      <td class="asked-info">Occupation</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="spouse_occ" value="<?php echo $emp_other_info['spouse_occ']; ?>" placeholder="e.g. CASHIER" <?php if($emp_info['civil_status'] == 'SINGLE') { echo "disabled"; }  ?>></td>
    </tr>
    <tr>
      <td class="asked-info">Address</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="spouse_add" value="<?php echo $emp_other_info['spouse_add']; ?>" placeholder="ST., SUBD., BARANGAY, TOWN, PROVINCE / ZIP CODE" <?php if($emp_info['civil_status'] == 'SINGLE') { echo "disabled"; }  ?>></td>
    </tr>                           
  </tbody>
</table>

    <table class="table table-bordered bg-white table-official table-striped">
  <thead>
    <tr>
      <th colspan="4" class="text-center">Other Information</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="asked-info" style="width: 200px;">Highest Grade completed or degree received</td>
      <td class="person-info"><input class="form-control upperCase" type="text" name="high_deg_received" value="<?php echo $emp_other_info['high_deg_received']; ?>" placeholder="e.g. MASTER OF ARTS IN EDUCATIONAL MANAGEMENT"></td>
    </tr>  
    <tr>  
      <td class="asked-info" style="width: 200px;">Year received</td>
      <td class="person-info">
        <select class="form-control" name="year_received" style="width : 90px;">
          <option value=""></option>
            <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 
              <?php if($i == $emp_other_info['year_received']) : ?>
                  <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                <?php else : ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
              <?php endif; ?>
            <?php  } ?>
        </select>
      </td>      
    </tr>
    <tr>
      <td class="asked-info">Name of Institution</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="name_of_institution" value="<?php echo $emp_other_info['name_of_institution']; ?>" placeholder="e.g. UNIVERSITY OF RIZAL SYSTEM - RODRIGUEZ"></td>
    </tr>
    <tr>
      <td class="asked-info" style="width: 200px;">Special Qualification</td>
      <td class="person-info"><input class="form-control upperCase" type="text" name="spec_qualification" value="<?php echo $emp_other_info['spec_qualification']; ?>" placeholder="e.g. ADVANCE COMPUTER USER"></td>
    </tr>
    <tr>  
      <td class="asked-info" style="width: 200px;">Previous Experience</td>
      <td class="person-info"><input class="form-control upperCase" type="text" name="prev_experience" value="<?php echo $emp_other_info['prev_experience']; ?>" placeholder="e.g. CALL CENTER AGENT"></td>      
    </tr>
  </tbody>
  </table>

<!--     <tr>
      <td class="asked-info" colspan="4" style="text-align: center;">Teacher's Competitive Examination:</td>   
    </tr> -->     
<!--     <tr>
      <td class="asked-info" style="width: 225px;">Score</td>
      <td class="person-info"><input class="form-control" type="text" name="teach_comp_exam_score" value="<?php // echo $emp_other_info['teach_comp_exam_score']; ?>"></td>
      <td class="asked-info" style="width: 225px;">Date Taken</td>
      <td class="person-info">
        
        <div class="input-group">
            <div class="input-group-prepend">

        <?php // if($emp_other_info['teach_comp_exam_date'] !== ''): ?>
              <?php // $teach_comp_exam_date_arr = explode("-", $emp_other_info['teach_comp_exam_date']); ?>
                <select name="teach_comp_month" style="width : 75px;">
                    <?php // for($i=00; $i <= 12 ; $i++) { ?> 
                        <?php // if($i == $teach_comp_exam_date_arr[0]) : ?>
                          <option value="<?php // echo $i; ?>" selected><?php // echo $i; ?></option>
                        <?php // endif; ?>      
                    <?php // } ?>
                </select>                
                <select name="teach_comp_day" style="width : 75px;"> 
                    <?php // for($i=00; $i <= 31 ; $i++) { ?> 
                        <?php // if($i == $teach_comp_exam_date_arr[1]) : ?>
                          <option value="<?php // echo $i; ?>" selected><?php // echo $i; ?></option>
                        <?php // endif; ?> 
                    <?php //  } ?>
                </select>
                <select name="teach_comp_year" style="width : 90px;">
                    <?php // for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                        <?php // if($i == $teach_comp_exam_date_arr[2]) : ?>
                          <option value="<?php // echo $i; ?>" selected><?php // echo $i; ?></option>
                        <?php // endif; ?>  
                    <?php //  } ?>
                </select>  

        <?php // else :  ?>       

                <select name="teach_comp_month" style="width : 75px;"> 
                    <?php // for($i=00; $i <= 12 ; $i++) { ?> 
                          <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>    
                    <?php //  } ?>
                </select>                
                <select name="teach_comp_day" style="width : 75px;"> 
                    <?php // for($i=00; $i <= 31 ; $i++) { ?> 
                          <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>  
                    <?php //  } ?>
                </select>
                <select name="teach_comp_year" style="width : 90px;">
                    <?php // for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                          <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>  
                    <?php //  } ?>
                </select>

        <?php // endif;  ?>
            </div>         
        </div>  



      </td>
    </tr> -->
  <table class="table table-bordered bg-white table-official table-striped">  
  <thead>
    <tr>
      <th colspan="4" class="text-center">Type of Employee</th>
    </tr>
  </thead>
  <tbody>  


    <tr>
      <?php 

        if($emp_other_info['employee'] == 'NON-TEACHING') {

          echo "<td class='person-info'><label id='non-teaching-radio' onclick='disable_teacher_and_sdo()'><input type='radio' name='employee' id='non-teaching-input' value='NON-TEACHING' checked> NON-TEACHING</label></td>
                <td class='person-info' colspan='2'><label id='teaching-radio' onclick='undisable_teacher_type()'><input type='radio' name='employee'  value='TEACHING'> TEACHING</label></td>
                <td class='person-info'><label id='sdo-based-radio' onclick='undisable_sdo_type()'><input type='radio' name='employee' value='SDO BASED PERSONNEL'> SDO BASED PERSONNEL</label></td>";

        }elseif($emp_other_info['employee'] == 'TEACHING') {

          echo "<td class='person-info'><label id='non-teaching-radio' onclick='disable_teacher_and_sdo()'><input type='radio' name='employee' value='NON-TEACHING'> NON-TEACHING</label></td>
                <td class='person-info' colspan='2'><label id='teaching-radio' onclick='undisable_teacher_type()'><input id='teaching-input' type='radio' name='employee'  value='TEACHING' checked> TEACHING</label></td>
                <td class='person-info'><label id='sdo-based-radio' onclick='undisable_sdo_type()'><input type='radio' name='employee' value='SDO BASED PERSONNEL'> SDO BASED PERSONNEL</label></td>";
                
        }elseif($emp_other_info['employee'] == 'SDO BASED PERSONNEL') {

          echo "<td class='person-info'><label id='non-teaching-radio' onclick='disable_teacher_and_sdo()'><input type='radio' name='employee' value='NON-TEACHING'> NON-TEACHING</label></td>
                <td class='person-info' colspan='2'><label id='teaching-radio' onclick='undisable_teacher_type()'><input type='radio' name='employee'  value='TEACHING'> TEACHING</label></td>
                <td class='person-info'><label id='sdo-based-radio' onclick='undisable_sdo_type()'><input type='radio' name='employee' value='SDO BASED PERSONNEL' checked> SDO BASED PERSONNEL</label></td>";
                
        }else {

          echo "<td class='person-info'><label id='non-teaching-radio' onclick='disable_teacher_and_sdo()'><input type='radio' name='employee' value='NON-TEACHING'> NON-TEACHING</label></td>
                <td class='person-info' colspan='2'><label id='teaching-radio' onclick='undisable_teacher_type()'><input type='radio' name='employee'  value='TEACHING'> TEACHING</label></td>
                <td class='person-info'><label id='sdo-based-radio' onclick='undisable_sdo_type()'><input type='radio' name='employee' value='SDO BASED PERSONNEL'> SDO BASED PERSONNEL</label></td>";
        }


      ?>

    </tr> 
    <tr>
      


      <td class="person-info" >
        <?php 
          if($emp_other_info['employee'] !== 'NON-TEACHING') {
            echo "<select class='form-control' id='non_teacher_type' name='employee_type' disabled=''>";
          }else {
            echo "<select class='form-control' id='non_teacher_type' name='employee_type'>";
          }
        ?>
        
        <?php 

            $num_non_TEACHING_type_choices = count($other_info->teacher_choices());
            $non_TEACHING_type_arr = $other_info->teacher_choices();

            for($i = 0; $i < $num_non_TEACHING_type_choices; $i++) {
              if($non_TEACHING_type_arr[$i] == $emp_other_info['employee_type']) {
                echo "<option value='".$non_TEACHING_type_arr[$i]."' selected>".$non_TEACHING_type_arr[$i]."</option>";
              }else {
                echo "<option value='".$non_TEACHING_type_arr[$i]."'>".$non_TEACHING_type_arr[$i]."</option>";
              }
            }

        ?>
        </select>
      </td>
      

       <?php  if($emp_other_info['employee'] == 'TEACHING') { ?>

<!--               <td class="person-info">
                <select name="position" class="form-control" id="non_teacher_position" disabled> -->

                    <?php 
                      // $num_non_TEACHING_position_choices = count($other_info->non_TEACHING_position_choices());
                      // $non_TEACHING_position_arr = $other_info->non_TEACHING_position_choices();

                      // for($i = 0; $i < $num_non_TEACHING_position_choices; $i++) {
                      //   echo "<option value='".$non_TEACHING_position_arr[$i]."'>".$non_TEACHING_position_arr[$i]."</option>";
                      // }
                    ?>

<!--                 </select>
              </td> -->
      
              <td class="person-info" colspan="2">
                  <select name="employee_type" class="form-control" id="employee_teacher_type">

                    <?php 
                      $num_teacher_choices = count($other_info->teacher_choices());
                      $teacher_choices_arr = $other_info->teacher_choices();

                      for($i = 0; $i < $num_teacher_choices; $i++) {
                        if($teacher_choices_arr[$i] == $emp_other_info['employee_type']) {
                          echo "<option value='".$teacher_choices_arr[$i]."' selected>".$teacher_choices_arr[$i]."</option>";
                        }else {
                          echo "<option value='".$teacher_choices_arr[$i]."'>".$teacher_choices_arr[$i]."</option>";
                        }
                      }
                    ?>
                    
                  </select>
              </td>
              <td class="person-info">
                <select name="employee_type" class="form-control" id="employee_sdo_type" disabled>

                    <?php 
                      $num_sdo_based_choices = count($other_info->sdo_based_choices());
                      $sdo_based_choices_arr = $other_info->sdo_based_choices();

                      for($i = 0; $i < $num_sdo_based_choices; $i++) {
                        echo "<option value='".$sdo_based_choices_arr[$i]."'>".$sdo_based_choices_arr[$i]."</option>";
                      }
                    ?>

                </select>
              </td>
          
       <?php }elseif($emp_other_info['employee'] == 'SDO BASED PERSONNEL') { ?>
<!--               <td class="person-info">
                <select name="position" class="form-control" id="non_teacher_position" disabled> -->

                    <?php 
                      // $num_non_TEACHING_position_choices = count($other_info->non_TEACHING_position_choices());
                      // $non_TEACHING_position_arr = $other_info->non_TEACHING_position_choices();

                      // for($i = 0; $i < $num_non_TEACHING_position_choices; $i++) {
                      //   echo "<option value='".$non_TEACHING_position_arr[$i]."'>".$non_TEACHING_position_arr[$i]."</option>";
                      // }
                    ?>

<!--                 </select>
              </td> -->

              <td class="person-info" colspan="2">
                  <select name="employee_type" class="form-control" id="employee_teacher_type" disabled>

                    <?php 
                      $num_teacher_choices = count($other_info->teacher_choices());
                      $teacher_choices_arr = $other_info->teacher_choices();

                      for($i = 0; $i < $num_teacher_choices; $i++) {
                          echo "<option value='".$teacher_choices_arr[$i]."'>".$teacher_choices_arr[$i]."</option>";
                      }
                    ?>
                    
                  </select>
              </td>
              <td class="person-info">
                <select name="employee_type" class="form-control" id="employee_sdo_type">

                    <?php 
                      $num_sdo_based_choices = count($other_info->sdo_based_choices());
                      $sdo_based_choices_arr = $other_info->sdo_based_choices();

                      for($i = 0; $i < $num_sdo_based_choices; $i++) {
                        if($sdo_based_choices_arr[$i] == $emp_other_info['employee_type']) {
                          echo "<option value='".$sdo_based_choices_arr[$i]."' selected>".$sdo_based_choices_arr[$i]."</option>";
                        }else {
                          echo "<option value='".$sdo_based_choices_arr[$i]."'>".$sdo_based_choices_arr[$i]."</option>";
                        }
                        
                      }
                    ?>

                </select>
              </td>

      <?php }elseif($emp_other_info['employee'] == 'NON-TEACHING') { ?>        

<!--               <td class="person-info">
                <select name="position" class="form-control" id="non_teacher_position">

                    <?php 
                      // $num_non_TEACHING_position_choices = count($other_info->non_TEACHING_position_choices());
                      // $non_TEACHING_position_arr = $other_info->non_TEACHING_position_choices();

                      // for($i = 0; $i < $num_non_TEACHING_position_choices; $i++) {
                        // echo "<option value='".$non_TEACHING_position_arr[$i]."'>".$non_TEACHING_position_arr[$i]."</option>";
                      // }
                    ?>

                </select>
              </td> -->

              <td class="person-info" colspan="2">
                  <select name="employee_type" class="form-control" id="employee_teacher_type" disabled>

                    <?php 
                      $num_teacher_choices = count($other_info->teacher_choices());
                      $teacher_choices_arr = $other_info->teacher_choices();

                      for($i = 0; $i < $num_teacher_choices; $i++) {
                          echo "<option value='".$teacher_choices_arr[$i]."'>".$teacher_choices_arr[$i]."</option>";
                      }
                    ?>
                    
                  </select>
              </td>
              <td class="person-info">
                <select name="employee_type" class="form-control" id="employee_sdo_type" disabled>

                    <?php 
                      $num_sdo_based_choices = count($other_info->sdo_based_choices());
                      $sdo_based_choices_arr = $other_info->sdo_based_choices();

                      for($i = 0; $i < $num_sdo_based_choices; $i++) {
                        if($sdo_based_choices_arr[$i] == $emp_other_info['employee_type']) {
                          echo "<option value='".$sdo_based_choices_arr[$i]."' selected>".$sdo_based_choices_arr[$i]."</option>";
                        }else {
                          echo "<option value='".$sdo_based_choices_arr[$i]."'>".$sdo_based_choices_arr[$i]."</option>";
                        }
                        
                      }
                    ?>

                </select>
              </td>


      <?php }else { ?>

<!--               <td class="person-info">
                <select name="position" class="form-control" id="non_teacher_position" disabled>

                    <?php 
                      // $num_non_TEACHING_position_choices = count($other_info->non_TEACHING_position_choices());
                      // $non_TEACHING_position_arr = $other_info->non_TEACHING_position_choices();

                      // for($i = 0; $i < $num_non_TEACHING_position_choices; $i++) {
                        // echo "<option value='".$non_TEACHING_position_arr[$i]."'>".$non_TEACHING_position_arr[$i]."</option>";
                      // }
                    ?>

                </select>
              </td> -->

              <td class="person-info" colspan="2">
                  <select name="employee_type" class="form-control" id="employee_teacher_type" disabled>

                    <?php 
                      $num_teacher_choices = count($other_info->teacher_choices());
                      $teacher_choices_arr = $other_info->teacher_choices();

                      for($i = 0; $i < $num_teacher_choices; $i++) {
                          echo "<option value='".$teacher_choices_arr[$i]."'>".$teacher_choices_arr[$i]."</option>";
                      }
                    ?>
                    
                  </select>
              </td>
              <td class="person-info">
                <select name="employee_type" class="form-control" id="employee_sdo_type" disabled>

                    <?php 
                      $num_sdo_based_choices = count($other_info->sdo_based_choices());
                      $sdo_based_choices_arr = $other_info->sdo_based_choices();

                      for($i = 0; $i < $num_sdo_based_choices; $i++) {
                        echo "<option value='".$sdo_based_choices_arr[$i]."'>".$sdo_based_choices_arr[$i]."</option>";
                      }
                    ?>

                </select>
              </td>

      <?php } ?>


    </tr>
    <tr>
      <td class="asked-info">
        
        <?php 
          if($emp_other_info['employee'] !== 'NON-TEACHING') {
            echo "<select class='form-control' id='non_teacher_position' name='position' disabled=''>";
          }else {
            echo "<select class='form-control' id='non_teacher_position' name='position'>";
          }
        ?>
        
        <?php 

            $num_non_teaching_position_choices = count($other_info->non_teaching_position_choices());
            $non_teaching_position_arr = $other_info->non_teaching_position_choices();

            for($i = 0; $i < $num_non_teaching_position_choices; $i++) {
              if($non_teaching_position_arr[$i] == $emp_other_info['position']) {
                echo "<option value='".$non_teaching_position_arr[$i]."' selected>".$non_teaching_position_arr[$i]."</option>";
              }else {
                echo "<option value='".$non_teaching_position_arr[$i]."'>".$non_teaching_position_arr[$i]."</option>";
              }
            }

        ?>
        </select>        

      </td>
      <td class="person-info" colspan="2">
        <?php 
          if($emp_other_info['employee'] !== 'TEACHING') {
            echo "<select class='form-control' id='teacher_position' name='position' disabled=''>";
          }else {
            echo "<select class='form-control' id='teacher_position' name='position'>";
          }
        ?>
        
        <?php 

            $num_teaching_choices = count($other_info->teaching_choices());
            $teaching_choices_arr = $other_info->teaching_choices();

            for($i = 0; $i < $num_teaching_choices; $i++) {
              if($teaching_choices_arr[$i] == $emp_other_info['position']) {
                echo "<option value='".$teaching_choices_arr[$i]."' selected>".$teaching_choices_arr[$i]."</option>";
              }else {
                echo "<option value='".$teaching_choices_arr[$i]."'>".$teaching_choices_arr[$i]."</option>";
              }
            }

        ?>
        </select>
      </td>
      <td class="person-info">
        
          <?php 
            if($emp_other_info['employee'] !== 'SDO BASED PERSONNEL') {
              echo "<select class='form-control' id='employee_sdo_position' name='position' disabled=''>";
            }else {
              echo "<select class='form-control' id='employee_sdo_position' name='position'>";
            }
          ?>
          
          <?php 

              $num_sdo_position_choices = count($other_info->sdo_based_position_choices());
              $sdo_position_choices_arr = $other_info->sdo_based_position_choices();

              for($i = 0; $i < $num_sdo_position_choices; $i++) {
                if($sdo_position_choices_arr[$i] == $emp_other_info['position']) {
                  echo "<option value='".$sdo_position_choices_arr[$i]."' selected>".$sdo_position_choices_arr[$i]."</option>";
                }else {
                  echo "<option value='".$sdo_position_choices_arr[$i]."'>".$sdo_position_choices_arr[$i]."</option>";
                }
              }

          ?>
          </select>        


      </td>
    </tr>



    <tr class="subjectToggle">

      <td class="asked-info" >Subject</td>

      <td colspan="3">
        <select class="form-control" id="subjects" name="subject">
          <option class="subjectDefault" value=""></option>
          <?php $subjects_count = count($other_info->subjects_choices()); 
              $subject_array = $other_info->subjects_choices(); ?>
          <?php for($i = 0; $i < $subjects_count; $i++) : ?>
              <?php if ($subject_array[$i] === $emp_other_info['subject']) {  ?>
              <option value="<?php echo $subject_array[$i]; ?>" selected><?php echo $subject_array[$i]; ?></option>
              <?php } else { ?>
              <option value="<?php echo $subject_array[$i]; ?>"><?php echo $subject_array[$i]; ?></option> 
              <?php } ?>
          <?php endfor; ?>  
        </select>
      </td>

    </tr> 

    <tr class="subjectToggle">
      <td class="asked-info">Area</td>
      <td colspan="3">
        <select class="form-control" id="tleStrands" name="tle_strand" disabled>
          <option class="tleStrandsDefault" value=""></option>
          <?php $tle_strands_count = count($other_info->tle_strands()); 
              $tle_strands_array = $other_info->tle_strands(); ?>
          <?php for($i = 0; $i < $tle_strands_count; $i++) : ?>
            <?php if ($tle_strands_array[$i] === $emp_other_info['tle_strand']) { ?>
              <option value="<?php echo $tle_strands_array[$i]; ?>" selected><?php echo $tle_strands_array[$i]; ?></option>
            <?php } else { ?>
              <option value="<?php echo $tle_strands_array[$i]; ?>"><?php echo $tle_strands_array[$i]; ?></option>
            <?php } ?>  
          <?php endfor; ?>  
        </select>
      </td>
    </tr>
    
    <tr class="subjectToggle">  
      <td class="asked-info">Component</td>
      <td colspan="3">
      <select class="form-control" id="components" name="tle_component" disabled>
        <option class="componentDefault" value=""></option>
        <!-------------------------------  HOME ECONOMICS COMPONENTS ----------------------------------->

        <?php $tle_he_count = count($other_info->tle_he_component()); 
            $tle_he_array = $other_info->tle_he_component(); ?>
        <?php for($i = 0; $i < $tle_he_count; $i++) : ?>
          <?php if ($tle_he_array[$i] == $emp_other_info['tle_component']) { ?>
            <option class="heComponent" value="<?php echo $tle_he_array[$i]; ?>" selected><?php echo $tle_he_array[$i]; ?></option>
          <?php } else { ?>
            <option class="heComponent" value="<?php echo $tle_he_array[$i]; ?>"><?php echo $tle_he_array[$i]; ?></option>  
          <?php } ?>  
        <?php endfor; ?>

        <!-------------------------------  AGRI-FISHERY ARTS COMPONENTS ----------------------------------->

        <?php $tle_afa_count = count($other_info->tle_afa_component()); 
            $tle_afa_array = $other_info->tle_afa_component(); ?>
        <?php for($i = 0; $i < $tle_afa_count; $i++) : ?>
          <?php if ($tle_afa_array[$i] == $emp_other_info['tle_component']) { ?>
            <option class="afaComponent" value="<?php echo $tle_afa_array[$i]; ?>" selected><?php echo $tle_afa_array[$i]; ?></option>
          <?php } else { ?>
            <option class="afaComponent" value="<?php echo $tle_afa_array[$i]; ?>"><?php echo $tle_afa_array[$i]; ?></option>  
          <?php } ?>   
        <?php endfor; ?>

        <!-------------------------------  INDUSTRIAL ARTS COMPONENTS ----------------------------------->

        <?php $tle_ia_count = count($other_info->tle_ia_component()); 
            $tle_ia_array = $other_info->tle_ia_component(); ?>
        <?php for($i = 0; $i < $tle_ia_count; $i++) : ?>
          <?php if ($tle_ia_array[$i] == $emp_other_info['tle_component']) { ?>
            <option class="iaComponent" value="<?php echo $tle_ia_array[$i]; ?>" selected><?php echo $tle_ia_array[$i]; ?></option>
          <?php } else { ?>
            <option class="iaComponent" value="<?php echo $tle_ia_array[$i]; ?>"><?php echo $tle_ia_array[$i]; ?></option>
          <?php } ?>  
        <?php endfor; ?>

        <!-------------------------  INFORMATION COMM. AND TECH. COMPONENTS ------------------------------>

        <?php $tle_ict_count = count($other_info->tle_ict_component()); 
            $tle_ict_array = $other_info->tle_ict_component(); ?>
        <?php for($i = 0; $i < $tle_ict_count; $i++) : ?>
          <?php if ($tle_ict_array[$i] == $emp_other_info['tle_component']) { ?>
            <option class="ictComponent edit_ict_component" value="<?php echo $tle_ict_array[$i]; ?>" selected><?php echo $tle_ict_array[$i]; ?></option>
          <?php } else { ?>
            <option  class="ictComponent edit_ict_component" value="<?php echo $tle_ict_array[$i]; ?>"><?php echo $tle_ict_array[$i]; ?></option>
          <?php } ?>  
        <?php endfor; ?>

      </select> 

        
      </td>
    </tr>
    <tr class="subjectToggle">
      <td class="asked-info">Grade Level</td>
      <td colspan="3"><input class="form-control" type="text" name="grade_level" value="<?php echo $emp_other_info['grade_level']; ?>"></td>
    </tr> 




    
    <tr>
      <td colspan="2" class="asked-info">Levels of Civil Service Elegibility</td>
      <td colspan="2" class="person-info">
        <select name="level_civil_service" class="form-control">
          <?php 

            $num_level_civil = count($other_info->pick_level_civil());
            $level_civil_service_arr = $other_info->pick_level_civil();
            for($i = 0; $i < $num_level_civil; $i++) {
              if($level_civil_service_arr[$i] == $emp_other_info['level_civil_service']) {
                echo "<option value='".$level_civil_service_arr[$i]."' selected>".$level_civil_service_arr[$i]."</option>";
              }else {
                echo "<option value='".$level_civil_service_arr[$i]."'>".$level_civil_service_arr[$i]."</option>";
              }
              
            }
          ?>
        </select>
      </td>
    </tr>

  </tbody>
  </table> 


<!-------------------------------------- GOVERNMENT IDENTIFICATION TABLE ---------------------------------------------->  

  <table class="table table-bordered bg-white table-official table-striped">  
  <thead>
    <tr>
      <th colspan="4" class="text-center">Government Number</th>
    </tr>
  </thead>
  <tbody>  


    <tr>
      <td class="asked-info" style="width: 225px;">G.S.I.S B.P. No.</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="gsis_no" value="<?php echo $emp_other_info['gsis_no']; ?>"></td>
    </tr>
    <tr>
      <td class="asked-info" style="width: 225px;">Philhealth No.</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="philhealth_no" value="<?php echo $emp_other_info['philhealth_no']; ?>"></td>     
    </tr>      
    <tr>
      <td class="asked-info" style="width: 225px;">PRC License</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="prc_license" value="<?php echo $emp_other_info['prc_license']; ?>"></td>     
    </tr>
    <tr>
      <td class="asked-info" style="width: 225px;">LBP Number</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="lbp_no" value="<?php echo $emp_other_info['lbp_no']; ?>"></td>     
    </tr>
    <tr>
      <td class="asked-info" style="width: 225px;">Pag-IBIG No.</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="pag_ibig_no" value="<?php echo $emp_other_info['pag_ibig_no']; ?>"></td>     
    </tr>                 
  </tbody>
</table>
<button class="btn btn-primary btn-lg btn-block" type="submit" name="edit_other_info">Update</button>

</form>