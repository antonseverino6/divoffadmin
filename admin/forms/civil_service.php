

<div class="float-right mb-2 mr-3">
    <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" title="Add" data-target="#civilServModal" data-whatever="@getbootstrap" title="Add"><i class="fas fa-plus"></i></button>
</div>

<div class="modal fade" id="civilServModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Civil Service Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="insert_alert_civilservice_station_empty" style="display: none;"></p>
        <p id="insert_civil_service_success_alert" style="display: none;"></p>
        <div class="mt-3 row border border-bottom-0 border-right-0 rounded border-dark">
          <p id="result"></p>
        <div class="col-md-6 mt-3">

            <form method="post" action="/divoffadmin/admin/ajax/insert_civil_service.php" id="civil_service_form">
                <input type="hidden" name="tin_num" value="<?php echo $tin_num; ?>">

            <div class="form-group">
              <label for="cs-exam" class="col-form-label">Civil Service Examination<span class="required-info"> *</span></label>
              <input class="form-control" type="text" name="cs_exam" id="cs-exam">
            </div>
            <div class="form-group">
              <label for="cs-rating" class="col-form-label">Passed Rating<span class="required-info"> *</span></label>
              <input class="form-control decimal" type="text" name="cs_passed_rating" id="cs-rating">
            </div>
          
	        <label for="cs-date" class="col-form-label">Date Examination<span class="required-info"> *</span></label>        
	        <div class="input-group" id="cs-date">
	            <div class="input-group-prepend">
	                <select name="cs_date_month" id="cs-month"> 
	                    <?php for($i=00; $i <= 12 ; $i++) { ?> 

	                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

	                    <?php  } ?>
	                </select>                
	                <select name="cs_date_day" id="cs-day"> 
	                    <?php for($i=00; $i <= 31 ; $i++) { ?> 

	                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

	                    <?php  } ?>
	                </select>
	                <select name="cs_date_year">
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
        <button type="button" class="btn btn-primary" name="submit_civil_service" id="submit_civil_service">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</form>