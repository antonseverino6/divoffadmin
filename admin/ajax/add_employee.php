<?php


  require_once '../includes/init.php';

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
    $role_type =           trim($db->fix_string($_POST['role_type']));
    $title =           trim($db->fix_string($_POST['title']));
    $biometric_id =  trim($db->fix_string($_POST['biometric_id']));
    $region_org_code = trim($db->fix_string($_POST['region_org_code']));
    $div_code = trim($db->fix_string($_POST['div_code']));
    $place_birth = trim($db->fix_string($_POST['place_birth']));
    $job_title_code =      trim($db->fix_string($_POST['job_title_code']));
    $employ_status =  trim($db->fix_string($_POST['employ_status']));
    $per_address =  trim($db->fix_string($_POST['per_address'])); 
    $school_name =  trim($db->fix_string($_POST['school_name']));
    $civil_status = trim($db->fix_string($_POST['civil_status']));
    $gender = trim($db->fix_string($_POST['gender']));
    $employee_img = $_FILES['employee_img']['name'];
    $employee_img_tmp = $_FILES['employee_img']['tmp_name'];

    $date_join_month =      trim($db->fix_string($_POST['date_join_month']));
    $date_join_day =      trim($db->fix_string($_POST['date_join_day']));
    $date_join_year =      trim($db->fix_string($_POST['date_join_year']));

    if($date_join_month == '0' || $date_join_day == '0') {
      $date_join = '';
    }else {
      $date_join = date('m-d-Y',strtotime($date_join_year ."-". $date_join_month ."-".$date_join_day));
    }

    

    $date_orig_app_month =   trim($db->fix_string($_POST['date_orig_app_month']));
    $date_orig_app_day =   trim($db->fix_string($_POST['date_orig_app_day']));
    $date_orig_app_year =   trim($db->fix_string($_POST['date_orig_app_year']));

    if($date_orig_app_month == '0' || $date_orig_app_day == '0') {
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

    if($birth_date_month == '0' || $birth_date_day == '0') {
      $birth_date = '';
    }else {
      $birth_date = date('m-d-Y',strtotime($birth_date_year ."-". $birth_date_month ."-".$birth_date_day));
    }  


    if($info->employee_id_already_exists($employee_id)) {
      $error = "Employee ID already exists!";
    }elseif($info->employee_already_exists($tin_num)) {
        $error = "Tin number already exists!";
    }


    if(!empty($employee_img)) {

      $img_ext = explode('.', $employee_img);
      $ext = end($img_ext);
      $new_img_name = $employee_id . '.' . $ext;

      move_uploaded_file($employee_img_tmp, 'employee_img/'.$new_img_name);


      $sql = "INSERT INTO info(title,first_name,middle_name,last_name,birth_date,place_birth,per_address,civil_status,role_type,email,employee_id,tin_num,";
      $sql .= "div_code,job_title_code,employ_status,date_join,contact_num,work_shift,biometric_id,region_org_code,";
      $sql .= "school_id,suffix,item_number,date_orig_appointment,school_name,employee_img,gender) ";

      $sql .= "VALUES('".$title. "','". $first_name ."','" . $middle_name ."','" . $last_name."','" . $birth_date ."','";
      $sql .= "". $place_birth."','".$per_address."','".$civil_status."','". $role_type  ."','". $email ."','" .$employee_id."','" . $tin_num ."','";
      $sql .= "".$div_code. "','".$job_title_code."','".$employ_status."','".$date_join."','".$contact_num."','";
      $sql .= "".$work_shift."','".$biometric_id."','".$region_org_code."','".$school_id."','".$suffix."','".$item_number."','";
      $sql .= "".$date_orig_app."','".$school_name."','".$new_img_name."','".$gender."')";

    }else {

      $sql = "INSERT INTO info(title,first_name,middle_name,last_name,birth_date,place_birth,per_address,civil_status,role_type,email,employee_id,tin_num,";
      $sql .= "div_code,job_title_code,employ_status,date_join,contact_num,work_shift,biometric_id,region_org_code,";
      $sql .= "school_id,suffix,item_number,date_orig_appointment,school_name,gender) ";

      $sql .= "VALUES('".$title. "','". $first_name ."','" . $middle_name ."','" . $last_name."','" . $birth_date ."','";
      $sql .= "". $place_birth."','".$per_address."','".$civil_status."','". $role_type  ."','". $email ."','" .$employee_id."','" . $tin_num ."','";
      $sql .= "".$div_code. "','".$job_title_code."','".$employ_status."','".$date_join."','".$contact_num."','";
      $sql .= "".$work_shift."','".$biometric_id."','".$region_org_code."','".$school_id."','".$suffix."','".$item_number."','";
      $sql .= "".$date_orig_app."','".$school_name."','".$gender."')";   

    }



    if(empty($error)) {
      $db->query($sql);
      $session->message("<script>Swal.fire({type: 'success',title: 'Employee Added',showConfirmButton: false,timer: 1500});</script>");
      redirect('add_employee.php');
    }else {
      $session->message("<script>Swal.fire({type: 'warning',title: '".$error."',showConfirmButton: false,timer: 1500});</script>");

    }

    
}

