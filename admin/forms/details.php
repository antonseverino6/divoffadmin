
<?php $details = new Details(); ?>

<div class="float-right mb-2 mr-3">
    <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" title="Add" data-target="#detailsModal" data-whatever="@getbootstrap"><i class="fas fa-plus"></i></button>
</div>

<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <p id="alert_insert_details_specialOrder_empty" style="display: none;"></p>
      <p id="insert_details_success_alert" style="display: none;"></p>
      <div class="modal-body">
        <div class="mt-3 row border border-bottom-0 border-right-0 rounded border-dark">
          <p id="result"></p>
        <div class="col-md-6 mt-3">

            <form method="post" action="/divoffadmin/admin/ajax/insert_details.php" id="details_form">
                <input type="hidden" name="tin_num" value="<?php echo $tin_num; ?>">

            <div class="form-group">
              <label for="insert-special-order" class="col-form-label">Special Order Number / Nature of Appt.<span class="required-info"> *</span></label>
              <input class="form-control upperCase" type="text" name="special_order_no" id="insert-special-order" required autocomplete="off">
            </div>


            <label for="reg_temp_sub" class="col-form-label">Regular, Temporary or Subtitute<span class="required-info"> *</span></label>
            <div class="input-group" id="reg_temp_sub">
                <div class="input-group-prepend"> 
              <select class="form-control" name="reg_temp_sub">

              <?php $num_of_reg = count($details->pick_reg_temp_sub()); 
                $reg_temp_arr = $details->pick_reg_temp_sub();
                for($i = 0; $i < $num_of_reg; $i++):      
              ?>     
                <option value="<?php echo $reg_temp_arr[$i]; ?>"><?php echo $reg_temp_arr[$i]; ?></option>
              <?php endfor; ?>  
              </select>
		          </div>
		      </div>



            <label for="reg_effective_date" class="col-form-label">Effective Date<span class="required-info"> *</span></label>
            <div class="input-group" id="reg_effective_date">
                <div class="input-group-prepend">      
                    <select name="reg_effective_month" id="insert-reg-effective-month"> 
                        <?php for($i=00; $i <= 12 ; $i++) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>                
                    <select name="reg_effective_day" id="insert-reg-effective-day"> 
                        <?php for($i=00; $i <= 31 ; $i++) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>
                    <select name="reg_effective_year">
                        <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>
                    </div>   
                </div>


            <div class="form-group">
              <label for="insert-annual-salary" class="col-form-label">Annual Salary<span class="required-info"> *</span></label>
              <input class="form-control decimal" type="text" name="annual_salary" id="insert-annual-salary">
            </div>


            <label for="source-fund" class="col-form-label">Source of Fund: National or Capital<span class="required-info"> *</span></label>
            <div class="input-group" id="source-fund">
                <div class="input-group-prepend"> 
              <select class="form-control" name="source_fund">

              <?php $num_of_source_fund = count($details->pick_source_fund()); 
                $source_fund_arr = $details->pick_source_fund();
                for($i = 0; $i < $num_of_source_fund; $i++):      
              ?>     
                <option value="<?php echo $source_fund_arr[$i]; ?>"><?php echo $source_fund_arr[$i]; ?></option>
              <?php endfor; ?>  
              </select>
              </div>
          </div>

  </div>
<div class="col-md-5 mt-3 border-left">




            <div class="form-group">
              <label for="insert-nature-ass" class="col-form-label">Station/Nature of Assignment/School<span class="required-info"> *</span></label>
              <input class="form-control upperCase" type="text" name="nature_of_assignment" id="insert-nature-ass">
            </div>

<!--           <label for="nat-effective-date" class="col-form-label">Effective Date</label> 
            <div class="input-group" id="nat-effective-date">
                <div class="input-group-prepend">
                    <select name="nat_effective_month"> 
                        <?php // for($i=00; $i <= 12 ; $i++) { ?> 

                            <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>

                        <?php //  } ?>
                    </select>                
                    <select name="nat_effective_day"> 
                        <?php // for($i=00; $i <= 31 ; $i++) { ?> 

                            <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>

                        <?php //  } ?>
                    </select>
                    <select name="nat_effective_year" >
                        <?php // for($i=$current_year; $i >= 1900 ; $i--) { ?> 

                            <option value="<?php // echo $i; ?>"><?php // echo $i; ?></option>

                        <?php //  } ?>
                    </select>                
                </div>         
            </div> --> 

            <label for="insert-item-number" class="col-form-label">Item Number<span class="required-info"> *</span></label> 
            <div class="input-group" id="item-number">
               <input class="form-control" type="text" name="details_item_number" id="insert-item-number" autocomplete="off">      
            </div> 

            <label for="insert-position" class="col-form-label">Position<span class="required-info"> *</span></label> 
            <div class="input-group" id="position">
               <input class="form-control upperCase" type="text" name="position" id="insert-position" autocomplete="off">      
            </div> 

            <label for="insert-remarks" class="col-form-label">Remarks<span class="required-info"> *</span></label> 
            <div class="input-group" id="remarks">
               <input class="form-control upperCase" type="text" name="remarks" id="insert-remarks" autocomplete="off">      
            </div> 

<!--             <label for="pick_pri_inter" class="col-form-label">Primary or Intermediate</label>
            <div class="input-group" id="pick_pri_inter">
                <div class="input-group-prepend"> 
              <select class="form-control" name="primary_or_intermediate">

              <?php //  $num_of_pri_inter = count($details->pick_pri_inter()); 
                 // $pri_inter_arr = $details->pick_pri_inter();
                 // for($i = 0; $i < $num_of_pri_inter; $i++):      
              ?>     
                <option value="<?php //  echo $pri_inter_arr[$i]; ?>"><?php //  echo $pri_inter_arr[$i]; ?></option>
              <?php //  endfor; ?>  
              </select>
		          </div>
		      </div> -->
          
        </div>    
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="submit_details" id="submit_details">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</form>