<?php  
 
  $civil = new Civil();

    $fetch_civil = $civil->get_details_for($info_id);

  $civil_no = $fetch_civil->num_rows;  
 
if(isset($_POST['update_civil_service'])){
  for($i = 0; $i < $civil_no; $i++) :
      $civil_service_id[] = trim($db->fix_string($_POST['id'][$i]));
      $cs_exam[]      =  trim($db->fix_string($_POST['cs_exam'][$i]));
      $cs_passed_rating[]  =  trim($db->fix_string($_POST['cs_passed_rating'][$i]));

      $cs_date_year[] = $db->fix_string($_POST['cs_date_year'][$i]);
      $cs_date_day[] = $db->fix_string($_POST['cs_date_day'][$i]);
      $cs_date_month[] = $db->fix_string($_POST['cs_date_month'][$i]);

      if($cs_date_month[$i] == 0 || $cs_date_day[$i] == 0) {
         $cs_date_passed[] = '';
      }else {
        $cs_date_passed[] = date('m-d-Y',strtotime($cs_date_year[$i] ."-". $cs_date_month[$i] ."-".$cs_date_day[$i]));
      }

  
     
      if(!empty($cs_exam[$i])) {

            $sql = "UPDATE civil_service SET cs_exam='$cs_exam[$i]',";
            $sql .= "cs_passed_rating='$cs_passed_rating[$i]',cs_date_passed='$cs_date_passed[$i]' ";
            $sql .= "WHERE tin_num='$tin_num' AND id=$civil_service_id[$i]";

            $result = $db->query($sql);
                

      }
  endfor; 

        if($result = $db->query($sql)) {
            redirect('edit_page.php?edit=edit_civil_service&id='.$tin_num);
        }   

}



	 

?>

<form action="" method="post">

<table class="table table-bordered bg-white table-official" id="civil_service_table">
  <thead>
    <tr>
      <th colspan="5" class="text-center">Civil Service Information</th>
    </tr>
    <tr class="table-active">
        <th class="asked-info">C.S Examination</th>
        <th class="asked-info">Passed Rating</th>
        <th class="asked-info">Date Passed</th>
    </tr>  
  </thead>
  <tbody>

<?php while($civil_row = $fetch_civil->fetch_array()) : ?>      
      
    <tr>
      <input type="hidden" name="id[]" value="<?php echo $civil_row['id']; ?>">
      <td class="person-info"><input class="form-control" type="text" name="cs_exam[]" value="<?php echo $civil_row['cs_exam']; ?>"></td>
      <td class="person-info"><input class="form-control" type="text" name="cs_passed_rating[]" value="<?php echo $civil_row['cs_passed_rating']; ?>"></td>
      <td>
          <div class="input-group" id="cs-date">
              <div class="input-group-prepend">

                <?php if($civil_row['cs_date_passed'] !== '') : ?>
                <?php $cs_date_passed_arr = explode("-", $civil_row['cs_date_passed']); ?>
                  <select name="cs_date_month[]"> 
                      <?php for($i=00; $i <= 12 ; $i++) { ?> 
                      <?php if($i == $cs_date_passed_arr[0]) : ?>
                        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                      <?php else : ?>
                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                      <?php endif; ?>  
                      <?php  } ?>
                  </select>                
                  <select name="cs_date_day[]"> 
                      <?php for($i=00; $i <= 31 ; $i++) { ?> 
                      <?php if($i == $cs_date_passed_arr[1]) : ?>
                        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                      <?php else : ?>
                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                      <?php endif; ?>  
                      <?php  } ?>
                  </select>
                  <select name="cs_date_year[]">
                      <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 
                      <?php if($i == $cs_date_passed_arr[2]) : ?>
                        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                      <?php else : ?>
                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                      <?php endif; ?>  
                      <?php  } ?>
                  </select>
                  <?php else : ?>

                  <select name="cs_date_month[]"> 
                      <?php for($i=00; $i <= 12 ; $i++) { ?> 

                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                      <?php  } ?>
                  </select>                
                  <select name="cs_date_day[]"> 
                      <?php for($i=00; $i <= 31 ; $i++) { ?> 

                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                      <?php  } ?>
                  </select>
                  <select name="cs_date_year[]">
                      <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 

                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                      <?php  } ?>
                  </select>                    


                  <?php endif; ?>                
              </div>         
          </div>
        </td>  
    </tr> 
    
<?php endwhile; ?>      
      
  </tbody>
</table> 

  <button class="btn btn-primary btn-lg btn-block" type="submit" name="update_civil_service">Update</button>

</form>