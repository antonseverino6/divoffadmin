<?php 
$details = new Details();
$result = $details->get_details_for($tin_num); 

?>

<table class="table table-bordered bg-white table-official" id="details_table">
  <thead>
    <tr>
      <th colspan="6" class="text-center">Details</th>
    </tr>
    <tr class="table-active">
        <th class="asked-info">Special Order Number /<br> Nature of Appointment</th>
        <th class="asked-info">Regular Temporary or Subtitute</th>
        <th class="asked-info">Effective Date</th>        
        <th class="asked-info">Source of Fund</th>
        <th class="asked-info">Action</th>
    </tr>  
  </thead>
  <tbody id="table_details_body">
<?php while($details_row = $result->fetch_array()) : ?>      
    <tr>
        <td class="person-info"><?php echo $details_row['special_order_no']; ?></td>
        <td class="person-info"><?php echo $details_row['reg_temp_sub']; ?></td>
        <td class="person-info"><?php echo $details_row['reg_effective_date']; ?></td>
        <td class="person-info"><?php echo $details_row['source_fund']; ?></td>
        <td class="person-info  table-data-action">
          <!-- <input type="button" name="view_details" class="view_details" id="<?php // echo $details_row['id']; ?>" value="View" style="color: #000;"> -->
          <a name="view_details" class="view_details" id="<?php echo $details_row['id']; ?>" title="View"><i class="far fa-eye"></i></a>&nbsp;
          <!-- <input type="button" name="edit_details_btn" class="edit_details_btn" id="<?php // echo $details_row['id']; ?>" value="Edit"> -->
          <a name="edit_details_btn" class="edit_details_btn" id="<?php echo $details_row['id']; ?>" title="Edit"><i class="far fa-edit"></i></a>&nbsp;
          <a name="delete_details_btn" class="delete_details_btn" id="<?php echo $details_row['id']; ?>" title="Delete"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
<?php endwhile; ?>      
  </tbody>
</table>   


<!----------------------------------------------- MODAL FOR VIEWING ------------------------------------------------->

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <div class="mt-3 row border border-bottom-0 border-right-0 rounded border-dark ">
          <div class="col-md-12 mt-3 align-items-center" id="fetch_details">

          </div>
        </div>
        </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
      </div>
    </div>
  </div>


  <!----------------------------------------------- MODAL FOR EDITING ------------------------------------------------->

<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <p id="alert_details_specialOrder_empty" style="display: none;"></p>
        <p id="update_success_alert" style="display: none;"></p>
        <div class="modal-body" id="update_details_form_modal">
        </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type='button' class='btn btn-primary' name='update_details' id='update_details_btn'>Update</button>   
</div>
      </div>
    </div>
  </div>

  <!----------------------------------------------- MODAL FOR DELETING ------------------------------------------------->

<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete from Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="delete_details_modal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id='delete_details_form_btn'>Delete</button>
      </div>
    </div>
  </div>
</div>