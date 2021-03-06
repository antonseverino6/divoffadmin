<?php
$current_year = date("Y");
$other_info = new other_info();
$spouse_name = '';
$spouse_occ = '';
$spouse_add = '';

 if(isset($_POST['submit_other_info'])) {
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
    $employee_type = trim($db->fix_string($_POST['employee_type']));
    $position = trim($db->fix_string($_POST['position']));
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
        $sql = "INSERT INTO other_info(tin_num,spouse_name,spouse_occ,spouse_add,high_deg_received,";
        $sql .= "year_received,name_of_institution,spec_qualification,prev_experience,teach_comp_exam_score,";
        $sql .= "teach_comp_exam_date,gsis_no,level_civil_service,employee,employee_type,position,";
        $sql .= "philhealth_no,prc_license,lbp_no,pag_ibig_no,subject,tle_strand,tle_component,grade_level) ";
        $sql .= "VALUES('$tin_num','$spouse_name','$spouse_occ','$spouse_add','$high_deg_received',";
        $sql .= "'$year_received','$name_of_institution','$spec_qualification','$prev_experience','$teach_comp_exam_score',";
        $sql .= "'$teach_comp_exam_date','$gsis_no','$level_civil_service','$employee','$employee_type','$position',";
        $sql .= "'$philhealth_no','$prc_license','$lbp_no','$pag_ibig_no','$subject','$tle_strand','$tle_component',";
        $sql .= "'$grade_level')";

        if($db->query($sql)) {
          redirect('/divoffadmin/admin/mydetails/'.$tin_num."");
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
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="spouse_name" placeholder="e.g. MARIA A. CRUZ" <?php if($emp_info['civil_status'] == 'SINGLE') { echo "disabled"; }  ?>></td>
    </tr>
    <tr>
      <td class="asked-info">Occupation</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="spouse_occ" placeholder="e.g. CASHIER" <?php if($emp_info['civil_status'] == 'SINGLE') { echo "disabled"; }  ?>></td>
    </tr>
    <tr>
      <td class="asked-info">Address</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="spouse_add" placeholder="ST., SUBD., BARANGAY, TOWN, PROVINCE / ZIP CODE" <?php if($emp_info['civil_status'] == 'SINGLE') { echo "disabled"; }  ?>></td>
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
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="high_deg_received" placeholder="e.g. MASTER OF ARTS IN EDUCATIONAL MANAGEMENT"></td>
    </tr>
    <tr>  
      <td class="asked-info" style="width: 200px;">Year received</td>
        <td class="person-info">
            <select class="form-control" name="year_received" style="width : 90px;">
                <option value=""></option>
                <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                <?php  } ?>
            </select>  
        </td>  
    </tr>
    <tr>
      <td class="asked-info" style="width: 200px;">Name of Institution</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="name_of_institution" placeholder="e.g. UNIVERSITY OF RIZAL SYSTEM - RODRIGUEZ"></td>
    </tr>
    <tr>
      <td class="asked-info" style="width: 200px;">Special Qualification</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="spec_qualification" placeholder="e.g. ADVANCE COMPUTER USER"></td>
    </tr>
    <tr>  
      <td class="asked-info" style="width: 200px;">Previous Experience</td>
      <td class="person-info" colspan="3"><input class="form-control upperCase" type="text" name="prev_experience" placeholder="e.g. CALL CENTER AGENT"></td>      
    </tr>
  </tbody>
  </table>  
<!--     <tr>
      <td class="asked-info" colspan="4" style="text-align: center;">Teacher's Competitive Examination:</td>   
    </tr>  -->    
<!--     <tr>
      <td class="asked-info" style="width: 225px;">Score</td>
      <td class="person-info"><input class="form-control" type="text" name="teach_comp_exam_score" disabled></td>
      <td class="asked-info" style="width: 225px;">Date Taken</td>
      <td class="person-info">
        
        <div class="input-group">
            <div class="input-group-prepend">
                <select name="teach_comp_month" style="width : 75px;" disabled> 
                    <?php // for($i=00; $i <= 12 ; $i++) { ?> 
                          <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>    
                    <?php //  } ?>
                </select>                
                <select name="teach_comp_day" style="width : 75px;" disabled> 
                    <?php // for($i=00; $i <= 31 ; $i++) { ?> 
                          <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>  
                    <?php //  } ?>
                </select>
                <select name="teach_comp_year" style="width : 90px;" disabled>
                    <?php // for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                          <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>  
                    <?php //  } ?>
                </select>                
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
      <td class="person-info"><label id="non-teaching-radio" onclick="disable_teacher_and_sdo()"><input type="radio" name="employee" value="NON-TEACHING"> NON-TEACHING</label></td>
      <td class="person-info" colspan="2"><label id="teaching-radio" onclick="undisable_teacher_type()"><input type="radio" name="employee"  value="TEACHING"> TEACHING</label></td>
      <td class="person-info"><label id="sdo-based-radio" onclick="undisable_sdo_type()"><input type="radio" name="employee" value="SDO BASED PERSONNEL"> SDO BASED PERSONNEL</label></td>
    </tr> 
    <tr>
      <td class="person-info">
          <select name="employee_type" class="form-control" id="non_teacher_type" disabled>

            <?php 
              $num_non_teacher_type_choices = count($other_info->teacher_choices());
              $non_teacher_type_choices_arr = $other_info->teacher_choices();

              for($i = 0; $i < $num_non_teacher_type_choices; $i++) {
                echo "<option value='".$non_teacher_type_choices_arr[$i]."'>".$non_teacher_type_choices_arr[$i]."</option>";
              }
            ?>
            
          </select>      
      </td>
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
    </tr>
    <tr>
      <td class="asked-info">
        <select name="position" class="form-control" id="non_teacher_position" disabled>

          <?php 
            $num_non_teaching_position_choices = count($other_info->non_teaching_position_choices());
            $non_teaching_position_arr = $other_info->non_teaching_position_choices();

            for($i = 0; $i < $num_non_teaching_position_choices; $i++) {
              echo "<option value='".$non_teaching_position_arr[$i]."'>".$non_teaching_position_arr[$i]."</option>";
            }
          ?>
          
        </select>   
      </td>
      <td class="person-info" colspan="2">
        <select name="position" class="form-control" id="teacher_position" disabled="">
          <?php 
            $num_position_choices = count($other_info->teaching_choices());
            $position_choices_arr = $other_info->teaching_choices();

            for($i = 0; $i < $num_position_choices; $i++) {
              echo "<option value='".$position_choices_arr[$i]."'>".$position_choices_arr[$i]."</option>";
            }
          ?>
        </select>
      </td>
      <td class="person-info" colspan="2">
        <select name="position" class="form-control" id="employee_sdo_position" disabled="">
          <?php 
            $num_sdo_position_choices = count($other_info->sdo_based_position_choices());
            $sdo_position_choices_arr = $other_info->sdo_based_position_choices();

            for($i = 0; $i < $num_sdo_position_choices; $i++) {
              echo "<option value='".$sdo_position_choices_arr[$i]."'>".$sdo_position_choices_arr[$i]."</option>";
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
              <option value="<?php echo $subject_array[$i]; ?>"><?php echo $subject_array[$i]; ?></option>
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
              <option value="<?php echo $tle_strands_array[$i]; ?>"><?php echo $tle_strands_array[$i]; ?></option>
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
            <option class="heComponent" value="<?php echo $tle_he_array[$i]; ?>"><?php echo $tle_he_array[$i]; ?></option>
        <?php endfor; ?>

        <!-------------------------------  AGRI-FISHERY ARTS COMPONENTS ----------------------------------->

        <?php $tle_afa_count = count($other_info->tle_afa_component()); 
            $tle_afa_array = $other_info->tle_afa_component(); ?>
        <?php for($i = 0; $i < $tle_afa_count; $i++) : ?>
            <option class="afaComponent" value="<?php echo $tle_afa_array[$i]; ?>"><?php echo $tle_afa_array[$i]; ?></option>
        <?php endfor; ?>

        <!-------------------------------  INDUSTRIAL ARTS COMPONENTS ----------------------------------->

        <?php $tle_ia_count = count($other_info->tle_ia_component()); 
            $tle_ia_array = $other_info->tle_ia_component(); ?>
        <?php for($i = 0; $i < $tle_ia_count; $i++) : ?>
            <option class="iaComponent" value="<?php echo $tle_ia_array[$i]; ?>"><?php echo $tle_ia_array[$i]; ?></option>
        <?php endfor; ?>

        <!-------------------------  INFORMATION COMM. AND TECH. COMPONENTS ------------------------------>

        <?php $tle_ict_count = count($other_info->tle_ict_component()); 
            $tle_ict_array = $other_info->tle_ict_component(); ?>
        <?php for($i = 0; $i < $tle_ict_count; $i++) : ?>
            <option class="ictComponent" value="<?php echo $tle_ict_array[$i]; ?>"><?php echo $tle_ict_array[$i]; ?></option>
        <?php endfor; ?>

      </select> 

        
      </td>
    </tr>
    <tr class="subjectToggle">
      <td class="asked-info">Grade Level</td>
      <td colspan="3"><input class="form-control" type="text" name="grade_level"></td>
    </tr> 

    <tr>
      <td class="asked-info">Levels of Civil Service Elegibility</td>
      <td colspan="3" class="person-info">
        <select name="level_civil_service" class="form-control">
          <?php 

            $num_level_civil = count($other_info->pick_level_civil());
            $level_civil_service_arr = $other_info->pick_level_civil();

            for($i = 0; $i < $num_level_civil; $i++) {
              echo "<option value='".$level_civil_service_arr[$i]."'>".$level_civil_service_arr[$i]."</option>";
            }
          ?>
        </select>
      </td>

    </tr>

  </tbody>
</table>

  <table class="table table-bordered bg-white table-official table-striped">  
  <thead>
    <tr>
      <th colspan="4" class="text-center">Government Numbers</th>
    </tr>
  </thead>
    <tr>
      <td class="asked-info" style="width: 225px;">G.S.I.S B.P. No.</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="gsis_no"></td>     
    </tr>
    <tr>
      <td class="asked-info" style="width: 225px;">Philhealth No.</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="philhealth_no"></td>     
    </tr>      
    <tr>
      <td class="asked-info" style="width: 225px;">PRC License</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="prc_license"></td>     
    </tr>
    <tr>
      <td class="asked-info" style="width: 225px;">LBP Number</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="lbp_no"></td>     
    </tr>      
    <tr>
      <td class="asked-info" style="width: 225px;">Pag-IBIG No.</td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="pag_ibig_no"></td>     
    </tr> 
  </tbody>
</table>
<button class="btn btn-primary btn-lg btn-block" type="submit" name="submit_other_info">Submit</button>

</form>


