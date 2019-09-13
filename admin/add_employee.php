<?php require_once 'includes/header.php'; ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        <?php require_once 'includes/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


          <!-- Topbar Navbar -->
          <?php require_once 'includes/navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">
              <div class="col-xl-12 col-md-6 mb-1">
                  <h4>Add Employee</h4>             
              </div>
          </div>  
          

            <?php echo $message; ?>



<?php



$info = new Info();

  $error = '';

  $employee_img = '';
  $employee_img_tmp = '';
  $output = "";

  if(isset($_POST['submit_info'])) {

  // ltrim(trim($db->fix_string($_POST['employee_id'])),'0');
    $employee_id =    trim($db->fix_string($_POST['employee_id']));
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
    $school_name =  strtoupper(trim($db->fix_string($_POST['school_name'])));
    $civil_status = trim($db->fix_string($_POST['civil_status']));
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
    }else {
      $date_orig_app = date('m-d-Y',strtotime($date_orig_app_year ."-". $date_orig_app_month ."-".$date_orig_app_day));
    }
    

    $item_number =   trim($db->fix_string($_POST['item_number']));
    $tin_num =       trim($db->fix_string($_POST['tin_num']));
    $suffix =        trim($db->fix_string($_POST['suffix']));
    $email =         trim($db->fix_string($_POST['email']));
    $school_id =     trim($db->fix_string($_POST['school_id']));
    $work_shift =    trim($db->fix_string($_POST['work_shift']));
    $contact_num =   trim($db->fix_string($_POST['contact_num']));

    $birth_date_month = trim($db->fix_string($_POST['birth_date_month']));
    $birth_date_day   = trim($db->fix_string($_POST['birth_date_day']));
    $birth_date_year  = trim($db->fix_string($_POST['birth_date_year']));

    if($birth_date_month == '' || $birth_date_day == '') {
      $birth_date = '';
    }else {
      $birth_date = date('m-d-Y',strtotime($birth_date_year ."-". $birth_date_month ."-".$birth_date_day));
    }  



   if($employee_id !== '') {
    if($info->employee_id_already_exists($employee_id)) {
      $error = "Employee ID already exists!";
    }
  }elseif($info->employee_already_exists($tin_num)) {
        $error = "Tin number already exists!";
  }

    if(!empty($employee_img)) {

      $img_ext = explode('.', $employee_img);
      $ext = end($img_ext);
      $new_img_name = $tin_num . '.' . $ext;

      move_uploaded_file($employee_img_tmp, 'employee_img/'.$new_img_name);


      $sql = "INSERT INTO info(title,first_name,middle_name,last_name,birth_date,place_birth,per_address,civil_status,role_type,email,employee_id,tin_num,";
      $sql .= "div_code,job_title_code,employ_status,date_join,contact_num,work_shift,biometric_id,region_org_code,";
      $sql .= "school_id,suffix,item_number,date_orig_appointment,school_name,employee_img,gender,age) ";

      $sql .= "VALUES('".$title. "','". $first_name ."','" . $middle_name ."','" . $last_name."','" . $birth_date ."','";
      $sql .= "". $place_birth."','".$per_address."','".$civil_status."','". $role_type  ."','". $email ."','" .$employee_id."','" . $tin_num ."','";
      $sql .= "".$div_code. "','".$job_title_code."','".$employ_status."','".$date_join."','".$contact_num."','";
      $sql .= "".$work_shift."','".$biometric_id."','".$region_org_code."','".$school_id."','".$suffix."','".$item_number."','";
      $sql .= "".$date_orig_app."','".$school_name."','".$new_img_name."','".$gender."','".$info->insert_age($birth_date)."')";

    }else {

      $sql = "INSERT INTO info(title,first_name,middle_name,last_name,birth_date,place_birth,per_address,civil_status,role_type,email,employee_id,tin_num,";
      $sql .= "div_code,job_title_code,employ_status,date_join,contact_num,work_shift,biometric_id,region_org_code,";
      $sql .= "school_id,suffix,item_number,date_orig_appointment,school_name,gender,age) ";

      $sql .= "VALUES('".$title. "','". $first_name ."','" . $middle_name ."','" . $last_name."','" . $birth_date ."','";
      $sql .= "". $place_birth."','".$per_address."','".$civil_status."','". $role_type  ."','". $email ."','" .$employee_id."','" . $tin_num ."','";
      $sql .= "".$div_code. "','".$job_title_code."','".$employ_status."','".$date_join."','".$contact_num."','";
      $sql .= "".$work_shift."','".$biometric_id."','".$region_org_code."','".$school_id."','".$suffix."','".$item_number."','";
      $sql .= "".$date_orig_app."','".$school_name."','".$gender."','".$info->insert_age($birth_date)."')";   

    }



    if(empty($error)) {
      if($db->query($sql)) {
        $session->message("<script>Swal.fire({type: 'success',title: 'Employee Added',showConfirmButton: false,timer: 1500});</script>");
        redirect('/divoffadmin/admin/add_employee');
      }
    }else {
      $session->message("<script>Swal.fire({type: 'warning',title: '".$error."',showConfirmButton: true});</script>");
      redirect('/divoffadmin/admin/add_employee');
    }

    
}



?>

<div class="add_employee_container">

<p id="insert_employee_danger" style="display: none;"></p>
<p id="insert_employee_success" style="display: none;"></p>

<form action="" method="post" enctype="multipart/form-data" id="add_employee_form">
   
    
    <table class="table table-bordered bg-white table-official table-striped">
  <thead>
    <tr>
      <th colspan="4" class="text-center">Official</th>
    </tr>
  </thead>
  <tbody>
    <tr>  
      <td class="asked-info" style="width: 225px;">Employee Id</td>
      <td class="person-info"><input type="text" pattern="\d*" class="form-control"  id="inputEmployId" name="employee_id" placeholder="5-7 digits" maxlength="7" autocomplete="on"></td>
      <td class="asked-info">Title<span class="required-info"> *</span></td>
      <td class="person-info">
        <select name="title" class="form-control">

          <?php 
            $num_title = count($info->pick_title());
            $title_arr = $info->pick_title();
            for($i = 0; $i < $num_title; $i++) {
          ?>
                <option value="<?php echo $title_arr[$i]; ?>"><?php echo $title_arr[$i]; ?></option>
              
    <?php  } ?>
          
        </select>
      </td>
    </tr>
    <tr>
      <td class="asked-info">First Name<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="first_name" required="" id="add_first_name" placeholder="e.g. JUAN" autocomplete="on">
      </td>
      <td class="asked-info">Last Name<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="last_name" required="" id="add_last_name" placeholder="e.g. DELA CRUZ" autocomplete="on"></td>
    </tr>
    <tr>
      <td class="asked-info">Middle Name</td>
      <td class="person-info"><input class="form-control" type="text" name="middle_name" id="add_middle_name" placeholder="e.g. SANTOS" autocomplete="on"></td>
      <td class="asked-info">Tin Number<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control numDash" type="text" name="tin_num"  placeholder="e.g. xxx-xxx-xxx" required="" id="add_tin_num" autocomplete="on"></td>  
    </tr>
    <tr>
      <td class="asked-info">Civil Status<span class="required-info"> *</span></td>
      <td class="person-info">
        <select name="civil_status" class="form-control">  
        <?php 
          $num_civil_status = count($info->pick_civil_status());
          $civil_status_arr = $info->pick_civil_status();
          for($i = 0; $i < $num_civil_status; $i++) {
        ?>

          <option value="<?php echo $civil_status_arr[$i]; ?>"><?php echo $civil_status_arr[$i]; ?></option>

        <?php } ?>
        </select>

      </td>
      <td class="asked-info">Gender<span class="required-info"> *</span></td>
      <td class="person-info">
        <div class="form-check form-check-inline">
          <input type="radio" id="inlineRadio1" class="form-check-input" name="gender" value="FEMALE" checked>
          <label class="form-check-label" for="inlineRadio1">Female</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" id="inlineRadio2" class="form-check-input" name="gender" value="MALE">
          <label class="form-check-label" for="inlineRadio2">Male</label>
        </div>
          
        </select>
      </td>
    </tr> 
    <tr>
      <td class="asked-info">Email<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="email" name="email" id="add_email" required="" placeholder="preferable deped email" autocomplete="on"></td>
      <td colspan="2"></td>
    </tr>                         
    <tr>
<td class="asked-info">Birth Date<span class="required-info"> *</span></td>
      <td class="person-info">
        
        <div class="input-group">
            <div class="input-group-prepend">
                <select class="form-control" name="birth_date_month" style="width : 75px;" required="">
                    <option value=""></option>
                    <?php for($i=1; $i <= 12 ; $i++) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                    <?php  } ?>
                </select>                
                <select class="form-control" name="birth_date_day" style="width : 75px;" required="">
                    <option value=""></option> 
                    <?php for($i=1; $i <= 31 ; $i++) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                    <?php  } ?>
                </select>
                <select class="form-control" name="birth_date_year" style="width : 90px;">
                    <?php for($i=$current_year -18; $i >= 1900 ; $i--) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                    <?php  } ?>
                </select>                
            </div>         
        </div>        
        
        
      </td>
            <td class="asked-info">Place of Birth<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="place_birth" required="" id="add_place_birth" placeholder="TOWN, PROVINCE" autocomplete="on"></td>

    </tr>
    <tr>
      <td class="asked-info">Permanent Address<span class="required-info"> *</span></td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="per_address" required="" id="add_per_add" placeholder="ST., SUBD., BARANGAY, TOWN, PROVINCE / ZIP CODE" autocomplete="on"></td> 
    </tr>
    <tr>
      <td class="asked-info">School Name<span class="required-info"> *</span></td>
      <td class="person-info" colspan="3"><input class="form-control" type="text" name="school_name" required="" id="add-school-name" placeholder="e.g. AMPID NATIONAL HIGH SCHOOL"></td> 
    </tr>      
    <tr>
      <td class="asked-info">School ID<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="school_id" required="" id="add_school_id" placeholder="e.g. 308126"></td> 

      <td class="asked-info">Biometric ID/RFID</td>
      <td class="person-info"><input class="form-control" type="text" name="biometric_id" id="add_biometric" placeholder="SAME AS EMPLOYEE NUMBER"></td> 
    </tr>                          
    <tr>
      <td class="asked-info">Job Title Code<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="job_title_code" required="" id="add_job_title" placeholder="REFER TO JOB TITLE LIST"></td>
      <td class="asked-info">Work Shift<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="work_shift" required="" id="add_work_shift" placeholder="OFFICIAL TIME-IN"></td>    
    </tr>
    <tr>
      <td class="asked-info">Employment Status<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="employ_status" required="" id="add_employ_status" placeholder="e.g. PERMANENT"></td>
      <td class="asked-info">Role Type<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="role_type" required="" id="add_role_type" placeholder="e.g. EMPLOYEE MANAGER"></td>
    </tr>                          
    <tr>
      <td class="asked-info">Date of Joining<span class="required-info"> *</span></td>
      <td class="person-info">
        
        <div class="input-group">
            <div class="input-group-prepend">
                <select class="form-control" name="date_join_month" style="width : 75px;" required=""> 
                  <option value=""></option>
                    <?php for($i=1; $i <= 12 ; $i++) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>    
                    <?php  } ?>
                </select>                
                <select class="form-control" name="date_join_day" style="width : 75px;" required=""> 
                  <option value=""></option>
                  <?php for($i=1; $i <= 31 ; $i++) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                    <?php  } ?>
                </select>
                <select class="form-control" name="date_join_year" style="width : 90px;">
                    <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                    <?php  } ?>
                </select>                
            </div>         
        </div>        
        
        
      </td>
            <td class="asked-info">Division Code<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="div_code" required="" id="add_div_code" placeholder="e.g. 043"></td>
    </tr>                           
    <tr>
      <td class="asked-info">Date of Original Appoinment<span class="required-info"> *</span></td>
      <td class="person-info">
    
        <div class="input-group">
            <div class="input-group-prepend">
                <select class="form-control" name="date_orig_app_month" style="width : 75px;" required=""> 
                    <option value=""></option>
                    <?php for($i=1; $i <= 12 ; $i++) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                    <?php  } ?>
                </select>                
                <select class="form-control" name="date_orig_app_day" style="width : 75px;" required=""> 
                    <option value=""></option>
                    <?php for($i=1; $i <= 31 ; $i++) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                    <?php  } ?>
                </select>
                <select class="form-control" name="date_orig_app_year" style="width : 90px;">
                    <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                    <?php  } ?>
                </select>                
            </div>         
        </div>           
        
      </td>
      <td class="asked-info">Suffix</td>
      <td class="person-info"><input class="form-control" type="text" name="suffix" placeholder="e.g. JR,SR"></td>   
    </tr>                          
    <tr>
      <td class="asked-info">Region Org Code<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="region_org_code" required="" id="add_region_code" placeholder="e.g. 116"></td>
      <td class="asked-info">Contact Number<span class="required-info"> *</span></td>
      <td class="person-info"><input class="form-control" type="text" name="contact_num" maxlength="13" required="" id="add_contact_num" placeholder="09XX-XXX-XXXX"></td>    
    </tr>

    <tr>
      <td class="asked-info">Complete item number<span class="required-info"> *</span></td>
 
     <td class="person-info" colspan="3"><input class="form-control" type="text" name="item_number" required="" id="add_item_num" placeholder="AS APPEAR IN PSIPOP"></td>
      <!-- <td class="asked-info" colspan="2"></td> -->
<!--                          <td class="person-info"></td>    -->        
    </tr>
    <tr>
      <td class="asked-info">Employee Image</td>
      <td colspan="3"><input type="file" name="employee_img" accept="image/jpg, image/jpeg, image/png"></td>
    </tr>  

  </tbody>
</table>
    
 <button class="btn btn-primary btn-lg btn-block" type="submit" id="add_employee_btn" name="submit_info">Submit</button>
</form>

</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
            <?php require_once 'includes/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="/divoffadmin/admin/typeahead/bootstrap3-typeahead.min.js"></script>
  <script src="js/my_script.js"></script>


<script>

    // onkeypress="return isNumberKey(event)";

    // function isNumberKey(evt)
    // {
    //   var charCode = (evt.which) ? evt.which : event.keyCode;
    //  console.log(charCode);
    //     if (charCode != 46 && charCode != 45 && charCode > 31
    //     && (charCode < 48 || charCode > 57))
    //      return false;

    //   return true;
    // }

$(function () {
   $("#inputEmployId").keydown(function (e) {
       if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
         (e.keyCode >= 35 && e.keyCode <= 40) ||
         $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
         return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
         (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
   });
});



  $('.numDash').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\-]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
  });

</script>


 

</body>

</html>