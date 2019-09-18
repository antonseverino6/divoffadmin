

<div class="float-right mb-2 mr-3">
<button type="button" class="btn btn-primary btn-circle" data-toggle="modal" title="Add" data-target="#workExpModal" data-whatever="@getbootstrap"><i class="fas fa-plus"></i></button></div>

<div class="modal fade" id="workExpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Work Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="insert_work_exp_success_alert" style="display: none;"></p>
        <p id="work_exp_empty_warning" style="display: none;"></p>
        <div class="mt-3 row border border-bottom-0 border-right-0 rounded border-dark">
          <p id="result"></p>
          
        <div class="col-md-6 mt-3">

            <form method="post" action="/divoffadmin/admin/ajax/insert_work_exp.php" id="work_exp_form">
                <input type="hidden" name="tin_num" value="<?php echo $tin_num; ?>">

            <div class="form-group">
              <label for="comp-name" class="col-form-label">Station/Place of Assignment<span class="required-info"> *</span></label>
              <input class="form-control upperCase" type="text" name="comp_name" id="insert-comp-name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="status" class="col-form-label">Status<span class="required-info"> *</span></label>
              <input class="form-control upperCase" type="text" name="status" id="insert-status" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="designation" class="col-form-label">Designation<span class="required-info"> *</span></label>
              <input class="form-control upperCase" type="text" name="designation" id="insert-designation" autocomplete="off">
            </div>            
            <div class="form-group">
              <label for="salary" class="col-form-label">Salary<span class="required-info"> *</span></label>
              <input class="form-control decimal" type="text" name="salary" id="insert-salary">
            </div>
            <div class="form-group">
              <label for="branch" class="col-form-label">Branch<span class="required-info"> *</span></label>
              <input class="form-control upperCase" type="text" name="branch" id="insert-branch" autocomplete="off">
            </div>
  </div>
<div class="col-md-5 mt-3">


            <label for="from_date" class="col-form-label">From<span class="required-info"> *</span></label>
            <div class="input-group" id="from_date">
                <div class="input-group-prepend">      
                    <select name="from_date_month" id='insert-from-date-month-work-exp'> 
                        <?php for($i=00; $i <= 12 ; $i++) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>                
                    <select name="from_date_day" id='insert-from-date-day-work-exp'> 
                        <?php for($i=00; $i <= 31 ; $i++) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>
                    <select name="from_date_year">
                        <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>
                    </div>   
                </div>  

        <label for="to_date" class="col-form-label">To<span class="required-info"> *</span></label>        
        <div class="input-group" id="to_date">
            <div class="input-group-prepend">
                <select name="to_date_month" id='insert-to-date-month-work-exp'> 
                    <?php for($i=00; $i <= 12 ; $i++) { ?> 

                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                    <?php  } ?>
                </select>                
                <select name="to_date_day" id="insert-to-date-day-work-exp"> 
                    <?php for($i=00; $i <= 31 ; $i++) { ?> 

                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                    <?php  } ?>
                </select>
                <select name="to_date_year">
                    <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 

                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                    <?php  } ?>
                </select>                
            </div>         
        </div>
            <div class="form-group">
              <label for="leave_abs" class="col-form-label">Lv. of abs. w/o pay</label>
              <input class="form-control" type="text" name="leave_abs" id="leave_abs">
            </div>


          <label for="leave_date" class="col-form-label">Date of Lv.</label> 
            <div class="input-group" id="leave_date">
                <div class="input-group-prepend">
                    <select name="leave_abs_month"> 
                        <?php for($i=00; $i <= 12 ; $i++) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>                
                    <select name="leave_abs_day"> 
                        <?php for($i=00; $i <= 31 ; $i++) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>
                    <select name="leave_abs_year" >
                        <?php for($i=$current_year; $i >= 1900 ; $i--) { ?> 

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php  } ?>
                    </select>                
                </div>         
            </div> 

          
        </div>    
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="submit_work_exp" id="submit_work_exp">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</form>