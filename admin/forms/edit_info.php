<?php 

$info = new Info();
$db_object = new Db_object();

$fetch_info = $info->get_details_for($_GET['id']);
$emp_info = $fetch_info->fetch_array();


if(isset($_POST['update_info'])) {

    $id = trim($_POST['id']);
    $employee_id =    trim($db->fix_string($_POST['employee_id']));
    // $new_employee_id =    trim($db->fix_string($_POST['new_employee_id']));
    $first_name =     strtoupper(trim($db->fix_string($_POST['first_name'])));
    $middle_name =    strtoupper(trim($db->fix_string($_POST['middle_name'])));
    $last_name =      strtoupper(trim($db->fix_string($_POST['last_name'])));
    $role_type =           strtoupper(trim($db->fix_string($_POST['role_type'])));
    $title =           trim($db->fix_string($_POST['title']));
    $biometric_id =  trim($db->fix_string($_POST['biometric_id']));
    $region_org_code = trim($db->fix_string($_POST['region_org_code']));
    $div_code = trim($db->fix_string($_POST['div_code']));
    $place_birth = strtoupper(trim($db->fix_string($_POST['place_birth'])));
    $job_title_code =      trim($db->fix_string($_POST['job_title_code']));
    $employ_status =  strtoupper(trim($db->fix_string($_POST['employ_status'])));
    $per_address =  strtoupper(trim($db->fix_string($_POST['per_address']))); 
    $civil_status = trim($db->fix_string($_POST['civil_status']));
    $school_name = strtoupper(trim($db->fix_string($_POST['school_name'])));
    $gender = trim($db->fix_string($_POST['gender']));
    $employee_img = $_FILES['employee_img']['name'];
    $employee_img_tmp = $_FILES['employee_img']['tmp_name'];

    $date_join_month =      trim($db->fix_string($_POST['date_join_month']));
    $date_join_day =      trim($db->fix_string($_POST['date_join_day']));
    $date_join_year =      trim($db->fix_string($_POST['date_join_year']));

    if($date_join_month == '' || $date_join_day == '') {
      $date_join = '';
    }else {
      $date_join = date('m-d-Y',strtotime($date_join_year ."-". $date_join_month ."-".$date_join_day));
    }

    
    $date_orig_app_month =   trim($db->fix_string($_POST['date_orig_app_month']));
    $date_orig_app_day =   trim($db->fix_string($_POST['date_orig_app_day']));
    $date_orig_app_year =   trim($db->fix_string($_POST['date_orig_app_year']));

    if($date_orig_app_month == '' || $date_orig_app_day == '') {
      $date_orig_app = '';
    }else{
      $date_orig_app = date('m-d-Y',strtotime($date_orig_app_year ."-". $date_orig_app_month ."-".$date_orig_app_day));
    }

    

    $item_number =   trim($db->fix_string($_POST['item_number']));
    $tin_num =     	 trim($db->fix_string($_POST['tin_num']));
    $new_tin_num =   trim($db->fix_string($_POST['new_tin_num'])); 
    $suffix =        trim($db->fix_string($_POST['suffix']));
    $email =         trim($db->fix_string($_POST['email']));
    $school_id =     trim($db->fix_string($_POST['school_id']));
    $work_shift =    trim($db->fix_string($_POST['work_shift']));
    $contact_num =   trim($db->fix_string($_POST['contact_num']));

    $birth_date_month = trim($db->fix_string($_POST['birth_date_month']));
    $birth_date_day	  = trim($db->fix_string($_POST['birth_date_day']));
    $birth_date_year  = trim($db->fix_string($_POST['birth_date_year']));

    if($birth_date_month == '' || $birth_date_day == '') {
      $birth_date = '';
    }else {
      $birth_date = date('m-d-Y',strtotime($birth_date_year ."-". $birth_date_month ."-".$birth_date_day));
    }

    $age = $info->insert_age($birth_date);


  if($employee_id !== '') {

    $check_same_employee_id = $db->query("SELECT id,employee_id FROM info WHERE employee_id='$employee_id' AND tin_num != '$tin_num'");

    if ($check_same_employee_id->num_rows > 0) {
      $error = "Employee ID already exists!";
    }

  }


  if($new_tin_num !== $tin_num) {
    $check_same_tin_num = $db->query("SELECT id FROM info WHERE tin_num='$new_tin_num' AND id != $id");
    $database_tin_num = $check_same_tin_num->fetch_array();

    if ($check_same_tin_num->num_rows > 0) {
          $error = "Tin number already exists!";
    }
  }



    
    
    if(!empty($employee_img)) {

      $img_ext = explode('.', $employee_img);
      $ext = end($img_ext);
      $new_img_name = $tin_num . '.' . $ext;

      move_uploaded_file($employee_img_tmp, 'employee_img/'.$new_img_name);

      $sql = "UPDATE info SET employee_id='$employee_id',first_name='$first_name',middle_name='$middle_name',";
      $sql .= "last_name='$last_name',title='$title',birth_date='$birth_date',place_birth='$place_birth',place_birth='$place_birth',";
      $sql .= "per_address='$per_address',civil_status='$civil_status',email='$email',tin_num='$new_tin_num',div_code='$div_code',";
      $sql .= "job_title_code='$job_title_code',employ_status='$employ_status',role_type='$role_type',date_join='$date_join',";
      $sql .= "contact_num='$contact_num',work_shift='$work_shift',biometric_id='$biometric_id',region_org_code='$region_org_code',";
      $sql .= "school_id='$school_id',suffix='$suffix',item_number='$item_number',date_orig_appointment='$date_orig_app',";
      $sql .= "school_name='$school_name', employee_img='$new_img_name', gender='$gender', age='$age' WHERE tin_num='$tin_num' ";
    }else {
      $sql = "UPDATE info SET employee_id='$employee_id',first_name='$first_name',middle_name='$middle_name',";
      $sql .= "last_name='$last_name',title='$title',birth_date='$birth_date',place_birth='$place_birth',place_birth='$place_birth',";
      $sql .= "per_address='$per_address',civil_status='$civil_status',email='$email',tin_num='$new_tin_num',div_code='$div_code',";
      $sql .= "job_title_code='$job_title_code',employ_status='$employ_status',role_type='$role_type',date_join='$date_join',";
      $sql .= "contact_num='$contact_num',work_shift='$work_shift',biometric_id='$biometric_id',region_org_code='$region_org_code',";
      $sql .= "school_id='$school_id',suffix='$suffix',item_number='$item_number',date_orig_appointment='$date_orig_app',";
      $sql .= "school_name='$school_name', gender='$gender', age='$age' WHERE tin_num='$tin_num' ";
    }


    
    if(empty($error)) {
        if($db->query($sql)) {
          $db_object->update_tin_num($tin_num,$new_tin_num);
          redirect('/divoffadmin/admin/mydetails/'.$new_tin_num);
      }else {
        echo "Something went wrong";
      }
    }else {
      $session->message("<script>Swal.fire({type: 'warning',title: '".$error."',showConfirmButton: true});</script>");
      redirect('/divoffadmin/admin/edit_page/info/' . $tin_num);
    }
}


?>


<form action="" method="post" enctype="multipart/form-data">
   
    
    <table class="table table-bordered bg-white table-official table-striped">
  <thead>
    <tr>
      <th colspan="4" class="text-center">Official</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <input type="hidden" name="tin_num" value="<?php echo $emp_info['tin_num']; ?>">		
      <input type="hidden" name="id" value="<?php echo $emp_info['id']; ?>">    
      <td class="asked-info" style="width: 225px;">Employee Id</td>
      <td class="person-info"><input class="form-control" id="inputEmployId" type="text" name="employee_id" value="<?php echo $emp_info['employee_id']; ?>" placeholder="5-7 digits" maxlength="7"></td>
      <td class="asked-info">Title</td>
      <td class="person-info">

        <select name="title" class="form-control">
          <?php 
            $num_title = count($info->pick_title());
            $title_arr = $info->pick_title();

            for($i = 0; $i < $num_title; $i++) :
              if($title_arr[$i] === $emp_info['title']) {
                echo "<option value='".$title_arr[$i]."' selected>".$title_arr[$i]."</option>";
              }else {
                echo "<option value='".$title_arr[$i]."'>".$title_arr[$i]."</option>";
              }  
            endfor; 
          ?>

        </select>

      </td>
    </tr>
    <tr>
      <td class="asked-info">First Name<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="first_name" value="<?php echo $emp_info['first_name']; ?>" required="">
      </td>
      <td class="asked-info">Last Name<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="last_name" value="<?php echo $emp_info['last_name']; ?>" required=""></td>
    </tr>
    <tr>
      <td class="asked-info">Middle Name</td>
      <td class="person-info"><input class="form-control" type="text" name="middle_name" value="<?php echo $emp_info['middle_name']; ?>"></td>
      <td class="asked-info">Tin Number<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="new_tin_num" onkeypress="return isNumberKey(event);" value="<?php echo $emp_info['tin_num']; ?>" placeholder="xxx-xxx-xxx" required=""></td>  
    </tr>
    <tr>
      <td class="asked-info">Civil Status<span class="required-info"> *</span></td>
      <td class="person-info">
        <select name="civil_status" class="form-control">
            
          <?php 
          
            $num_civil_status = count($info->pick_civil_status());
            $civil_status_arr = $info->pick_civil_status();
            for($i = 0; $i < $num_civil_status; $i++) :
              if($civil_status_arr[$i] == $emp_info['civil_status']) {
                echo "<option value='".$civil_status_arr[$i]."' selected>".$civil_status_arr[$i]."</option>";
              }else {
                echo "<option value='".$civil_status_arr[$i]."'>".$civil_status_arr[$i]."</option>";
              }
            endfor;  
          ?>  

        </select>
      </td>
      <td class="asked-info">Gender<span class="required-info"> *</span></td>
      <td class="person-info">
        
        <?php if ($emp_info['gender'] === 'FEMALE') : ?>

          <div class="form-check form-check-inline">
            <input type="radio" id="inlineRadio1" class="form-check-input" name="gender" value="FEMALE" checked>
            <label class="form-check-label" for="inlineRadio1">Female</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" id="inlineRadio2" class="form-check-input" name="gender" value="MALE">
            <label class="form-check-label" for="inlineRadio2">Male</label>
          </div>

        <?php else : ?> 

          <div class="form-check form-check-inline">
            <input type="radio" id="inlineRadio1" class="form-check-input" name="gender" value="FEMALE">
            <label class="form-check-label" for="inlineRadio1">Female</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" id="inlineRadio2" class="form-check-input" name="gender" value="MALE" checked>
            <label class="form-check-label" for="inlineRadio2">Male</label>
          </div>

        <?php endif; ?>  

      </td>
    </tr>  
    <tr>  
      <td class="asked-info">Email<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="email" name="email" value="<?php echo $emp_info['email']; ?>" required=""></td>
      <td colspan="2"></td>
    </tr>                          
    <tr>
<td class="asked-info">Birth Date<span class="required-info"> *</span></td>
      <td class="person-info">
        
        <div class="input-group">
            <div class="input-group-prepend">
            	<?php $birth_date_arr =  explode("-", $emp_info['birth_date']); ?>
                <select name="birth_date_month" style="width : 75px;" required=""> 
                  <option value=""></option>
                    <?php for($i=1; $i <= 12 ; $i++) { ?> 
                    	<?php if($i == $birth_date_arr[0]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>    	
                    <?php  } ?>
                </select>                
                <select name="birth_date_day" style="width : 75px;" required=""> 
                  <option value=""></option>
                    <?php for($i=1; $i <= 31 ; $i++) { ?> 
                    	<?php if($i == $birth_date_arr[1]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>
                    <?php  } ?>
                </select>
                <select name="birth_date_year" style="width : 90px;">
                    <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                    	<?php if($i == $birth_date_arr[2]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>
                    <?php  } ?>
                </select>                
            </div>         
        </div>        
        
        
      </td>
            <td class="asked-info">Place of Birth<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="place_birth" value="<?php echo $emp_info['place_birth']; ?>" required=""></td>

    </tr>
    <tr>
      <td class="asked-info">Permanent Address<span class="required-info"> *</span></td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="per_address" value="<?php echo $emp_info['per_address']; ?>" required=""></td> 
    </tr> 
    <tr>
      <td class="asked-info">School Name<span class="required-info"> *</span></td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="school_name" value="<?php echo $emp_info['school_name']; ?>" required=""></td> 
    </tr>     
    <tr>
      <td class="asked-info">School ID<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="school_id" value="<?php echo $emp_info['school_id']; ?>" required=""></td> 

      <td class="asked-info">Biometric ID/RFID</td>
      <td class="person-info"><input class="form-control" type="text" name="biometric_id" value="<?php echo $emp_info['biometric_id']; ?>"></td> 
    </tr>                          
    <tr>
      <td class="asked-info">Job Title Code<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="job_title_code" value="<?php echo $emp_info['job_title_code']; ?>" required=""></td>
      <td class="asked-info">Work Shift<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="work_shift" value="<?php echo $emp_info['work_shift']; ?>" required=""></td>    
    </tr>
    <tr>
      <td class="asked-info">Employment Status<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="employ_status" value="<?php echo $emp_info['employ_status']; ?>" required=""></td>
      <td class="asked-info">Role Type<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="role_type" value="<?php echo $emp_info['role_type']; ?>" required=""></td>
    </tr>                          
    <tr>
      <td class="asked-info">Date of Joining<span class="required-info"> *</span></td>
      <td class="person-info">
        
        <div class="input-group">
            <div class="input-group-prepend">
            	<?php $date_join =  explode("-", $emp_info['date_join']); ?>
                <select name="date_join_month" style="width : 75px;" required=""> 
                  <option value=""></option>
                    <?php for($i=1; $i <= 12 ; $i++) { ?> 
                    	<?php if($i == $date_join[0]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>    	
                    <?php  } ?>
                </select>                
                <select name="date_join_day" style="width : 75px;" required=""> 
                  <option value=""></option>
                    <?php for($i=1; $i <= 31 ; $i++) { ?> 
                    	<?php if($i == $date_join[1]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>
                    <?php  } ?>
                </select>
                <select name="date_join_year" style="width : 90px;">
                    <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                    	<?php if($i == $date_join[2]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>
                    <?php  } ?>
                </select>                
            </div>         
        </div>        
        
        
      </td>
            <td class="asked-info">Division Code<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="div_code" value="<?php echo $emp_info['div_code']; ?>" required=""></td>
    </tr>                           
    <tr>
      <td class="asked-info">Date of Original Appoinment<span class="required-info"> *</span></td>
      <td class="person-info">
    
        <div class="input-group">
            <div class="input-group-prepend">
            	<?php $date_orig_app =  explode("-", $emp_info['date_orig_appointment']); ?>
                <select name="date_orig_app_month" style="width : 75px;" required=""> 
                  <option value=""></option>
                    <?php for($i=1; $i <= 12 ; $i++) { ?> 
                    	<?php if($i == $date_orig_app[0]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>
                    <?php  } ?>
                </select>                
                <select name="date_orig_app_day" style="width : 75px;" required=""> 
                  <option value=""></option>
                    <?php for($i=1; $i <= 31 ; $i++) { ?> 
                    	<?php if($i == $date_orig_app[1]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>
                    <?php  } ?>
                </select>
                <select name="date_orig_app_year" style="width : 90px;">
                    <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                    	<?php if($i == $date_orig_app[2]) : ?>
                        	<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php else : ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
                    	<?php endif; ?>
                    <?php  } ?>
                </select>                
            </div>         
        </div>           
        
      </td>
      <td class="asked-info">Suffix</td>
      <td class="person-info"><input class="form-control" type="text" name="suffix" value="<?php echo $emp_info['suffix']; ?>"></td>   
    </tr>                          
    <tr>
      <td class="asked-info">Region Org Code<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="region_org_code" value="<?php echo $emp_info['region_org_code']; ?>" required=""></td>
      <td class="asked-info">Contact Number<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="contact_num" value="<?php echo $emp_info['contact_num']; ?>" required=""></td>    
    </tr>

    <tr>
      <td class="asked-info">Complete item number<span class="required-info"> *</span></td>
 
     <td class="person-info" colspan="3"><input class="form-control" type="text" name="item_number" value="<?php echo $emp_info['item_number']; ?>" required=""></td>
      <!-- <td class="asked-info" colspan="2"></td> -->
<!--                          <td class="person-info"></td>    -->        
    </tr>  
    <tr>
      <td class="asked-info">Employee Image</td>
      <td colspan="3"><input type="file" name="employee_img" accept="image/jpg, image/jpeg, image/png"></td>
    </tr>                        
  </tbody>
</table>
    
 <button class="btn btn-primary btn-lg btn-block" type="submit" name="update_info">Update</button>
</form>