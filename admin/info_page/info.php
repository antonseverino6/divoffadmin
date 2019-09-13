<?php
$current_year = date("Y");
$info = new Info();

$fetch_info = $info->get_details_for($tin_num);
$emp_info = $fetch_info->fetch_array();
?>
    <table class="table table-bordered bg-white table-official table-striped">
  <thead>
    <tr>
      <th colspan="4" class="text-center">Personal Information</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="asked-info" style="width: 225px;">Employee Id</td>
      <td class="person-info"><?php echo $emp_info['employee_id']; ?></td>
      <td class="asked-info">Title</td>
      <td class="person-info"><?php echo $emp_info['title']; ?></td>
    </tr>
    <tr>
      <td class="asked-info">First Name</td>
      <td class="person-info"><?php echo $emp_info['first_name']; ?></td>
      <td class="asked-info">Last Name</td>
      <td class="person-info"><?php echo $emp_info['last_name']; ?></td>
    </tr>
    <tr>
      <td class="asked-info">Middle Name</td>
      <td class="person-info"><?php echo $emp_info['middle_name']; ?></td>
      <td class="asked-info">Tin Number</td>
      <td class="person-info"><?php echo $emp_info['tin_num']; ?></td>  
    </tr>
    <tr>
      <td class="asked-info">Civil Status</td>
      <td class="person-info"><?php echo $emp_info['civil_status']; ?></td>
      <td class="asked-info">Gender</td>
      <td class="person-info"><?php echo $emp_info['gender']; ?></td>
    </tr>
    <tr>  
      <td class="asked-info">Email</td>
      <td class="person-info"><?php echo $emp_info['email']; ?></td> 
      <td class="asked-info">Age</td>
      <td class="person-info"><?php echo $info->insert_age($emp_info['birth_date']); ?></td>   
    </tr>                          
    <tr>
    <td class="asked-info">Birth Date</td>
      <td class="person-info"><?php echo $emp_info['birth_date']; ?></td>
      <td class="asked-info">Place of Birth</td>
      <td class="person-info"><?php echo $emp_info['place_birth']; ?></td>   
    </tr>
    <tr>
      <td class="asked-info">Permanent Address</td>
      <td class="person-info" colspan="4"><?php echo $emp_info['per_address']; ?></td>    
    </tr>   
    <tr>
      <td class="asked-info">School Name</td>
      <td class="person-info" colspan="4"><?php echo $emp_info['school_name']; ?></td>    
    </tr>        
    <tr>
      <td class="asked-info">School ID</td>
      <td class="person-info"><?php echo $emp_info['school_id']; ?></td> 
      <td class="asked-info">Biometric ID/RFID</td>
      <td class="person-info"><?php echo $emp_info['biometric_id']; ?></td> 
    </tr>                          
    <tr>
      <td class="asked-info">Job Title Code</td>
      <td class="person-info"><?php echo $emp_info['job_title_code']; ?></td>
      <td class="asked-info">Work Shift</td>
      <td class="person-info"><?php echo $emp_info['work_shift']; ?></td>    
    </tr>
    <tr>
      <td class="asked-info">Employment Status</td>
      <td class="person-info"><?php echo $emp_info['employ_status']; ?></td>
      <td class="asked-info">Role Type</td>
      <td class="person-info"><?php echo $emp_info['role_type']; ?></td>
    </tr>                          
    <tr>
      <td class="asked-info">Date of Joining</td>
      <td class="person-info"><?php echo $emp_info['date_join']; ?></td>
            <td class="asked-info">Division Code</td>
      <td class="person-info"><?php echo $emp_info['div_code']; ?></td>
    </tr>                           
    <tr>
      <td class="asked-info">Date of Original Appoinment</td>
      <td class="person-info"><?php echo $emp_info['date_orig_appointment']; ?></td>
      <td class="asked-info">Suffix</td>
      <td class="person-info"><?php echo $emp_info['suffix']; ?></td>   
    </tr>                          
    <tr>
      <td class="asked-info">Region Org Code</td>
      <td class="person-info"><?php echo $emp_info['region_org_code']; ?></td>
      <td class="asked-info">Contact Number</td>
      <td class="person-info"><?php echo $emp_info['contact_num']; ?></td>    
    </tr>

    <tr>
      <td class="asked-info">Complete item number</td>
 
     <td class="person-info" colspan="4"><?php echo $emp_info['item_number']; ?></td>
      <!-- <td class="asked-info" colspan="2"></td> -->
<!--                          <td class="person-info"></td>    -->        
    </tr>                          
  </tbody>
</table>