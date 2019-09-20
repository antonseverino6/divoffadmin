<?php
     $fetch_other_info = $other_info->get_details_for($_GET['id']);
     $emp_other_info = $fetch_other_info->fetch_array();
?>

    <table class="table table-bordered bg-white table-official table-striped">
  <thead>
    <tr>
      <th colspan="4" class="text-center">Spouse Information</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="asked-info" style="width: 225px;">Name of Spouse</td>
      <td class="person-info" colspan="3"><?php echo $emp_other_info['spouse_name']; ?></td>
    </tr>
    <tr>
      <td class="asked-info">Occupation</td>
      <td class="person-info" colspan="3"><?php echo $emp_other_info['spouse_occ']; ?></td>
    </tr>
    <tr>
      <td class="asked-info">Address</td>
      <td class="person-info" colspan="3"><?php echo $emp_other_info['spouse_add']; ?></td>
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
      <td class="asked-info" style="width: 250px;">Highest Grade completed or degree received</td>
      <td class="person-info"><?php echo $emp_other_info['high_deg_received']; ?></td>
    </tr>
    <tr>  
      <td class="asked-info" style="width: 250px;">Year received</td>
      <td class="person-info"><?php echo $emp_other_info['year_received']; ?></td>      
    </tr>
    <tr>
      <td class="asked-info">Name of Institution</td>
      <td class="person-info" colspan="3"><?php echo $emp_other_info['name_of_institution']; ?></td>
    </tr>
    <tr>
      <td class="asked-info" style="width: 250px;">Special Qualification</td>
      <td class="person-info"><?php echo $emp_other_info['spec_qualification']; ?></td>
    </tr>
    <tr>  
      <td class="asked-info" style="width: 250px;">Previous Experience</td>
      <td class="person-info"><?php echo $emp_other_info['prev_experience']; ?></td>      
    </tr>
  </tbody>
  </table>  
<!--     <tr>
      <td class="asked-info" colspan="4" style="text-align: center;">Teacher's Competitive Examination:</td>   
    </tr> -->     
<!--     <tr>
      <td class="asked-info" style="width: 225px;">Score</td>
      <td class="person-info"><?php // echo $emp_other_info['teach_comp_exam_score']; ?></td>
      <td class="asked-info" style="width: 225px;">Date Taken</td>
      <td class="person-info"><?php // echo $emp_other_info['teach_comp_exam_date']; ?></td>      
    </tr> -->
  <table class="table table-bordered bg-white table-official table-striped">
    <thead>
    <tr>
      <th colspan="4" class="text-center">Type of Employee</th>
    </tr>
  </thead>  
  <tbody>  
      <td class="asked-info" style="width: 225px;">Employee</td>
      <td class="person-info"><?php echo $emp_other_info['employee']; ?></td>
      <td class="asked-info" style="width: 175px;">Employee Type</td>
      <td class="person-info"><?php echo $emp_other_info['employee_type']; ?></td>
    </tr>
    <tr>
      <td class="asked-info" style="width: 225px;">Position</td>
      <td class="person-info" colspan="3"><?php echo $emp_other_info['position']; ?></td>
      <!-- <td colspan="2"></td> -->
    </tr>

    <?php if ($emp_other_info['subject'] !== "") : ?>

    <tr>
      <td class="asked-info" style="width: 225px;">Subject</td>
      <td class="person-info" colspan="3"><?php echo strtoupper($emp_other_info['subject']); ?></td>
    </tr>

    <?php if ($emp_other_info['subject'] == "Technology and Livelihood Education (TLE)") { ?>

    <tr>
      <td class="asked-info" style="width: 225px;">Area</td>
      <td class="person-info" colspan="3"><?php echo strtoupper($emp_other_info['tle_strand']); ?></td>
    </tr>

    <tr>
      <td class="asked-info" style="width: 225px;">Component</td>
      <td class="person-info" colspan="3"><?php echo strtoupper($emp_other_info['tle_component']); ?></td>
    </tr>

    <?php } ?>

    <tr>
      <td class="asked-info" style="width: 225px;">Grade Level</td>
      <td class="person-info" colspan="3"><?php echo strtoupper($emp_other_info['grade_level']); ?></td>
    </tr>            

    <?php endif; ?>

    <tr>
      <td style="width: 270px;" class="asked-info">Levels of Civil Service Elegibility</td> 
      <td class="person-info" colspan="3"><?php echo $emp_other_info['level_civil_service']; ?></td>
    </tr>
  </tbody>    
  </table>



  <table class="table table-bordered bg-white table-official table-striped">
    <thead>
    <tr>
      <th colspan="4" class="text-center">Government Numbers</th>
    </tr>
  </thead>  
  <tbody>  
      <td class="asked-info" style="width: 175px;">Pag-IBIG No.</td>
      <td class="person-info" colspan="3"><?php echo $emp_other_info['pag_ibig_no']; ?></td>        
    </tr>
    <tr>
      <td class="asked-info" style="width: 225px;">G.S.I.S B.P. No.</td>
      <td class="person-info"><?php echo $emp_other_info['gsis_no']; ?></td>  
      <td class="asked-info" style="width: 175px;">Philhealth No.</td>
      <td class="person-info"><?php echo $emp_other_info['philhealth_no']; ?></td>          
    </tr>    
    <tr>
      <td class="asked-info" style="width: 225px;">PRC License</td>
      <td class="person-info"><?php echo $emp_other_info['prc_license']; ?></td>  
      <td class="asked-info" style="width: 175px;">LBP Number</td>
      <td class="person-info"><?php echo $emp_other_info['lbp_no']; ?></td>      
    </tr>                                            
  </tbody>
</table>