<?php  
	
	$civil = new Civil();

	$fetch_civil = $civil->get_details_for($tin_num); 

?>

<table class="table table-bordered bg-white table-official" id="civil_service_table">
  <thead>
    <tr>
      <th colspan="5" class="text-center">Civil Service Information</th>
    </tr>
    <tr class="table-active">
        <th class="asked-info">C.S Examination</th>
        <th class="asked-info">Passed Rating</th>
        <th class="asked-info">Date Examination</th>
        <th class="asked-info">Action</th>
    </tr>  
  </thead>
  <tbody id="table_civil_service_body">

<?php while($civil_row = $fetch_civil->fetch_array()) : ?>      
      
    <tr>
      <td class="person-info"><?php echo $civil_row['cs_exam']; ?></td>
      <td class="person-info"><?php echo $civil_row['cs_passed_rating']; ?></td>
      <td class="person-info"><?php echo $civil_row['cs_date_passed']; ?></td>
      <td class="person-info table-data-action" >
        <a name="view_civil" class="view_civil" id="<?php echo $civil_row['id']; ?>" title="View"><i class="far fa-eye"></i></a>&nbsp;
        <a name="edit_civilserv_btn" class="edit_civilserv_btn" id="<?php echo $civil_row['id']; ?>" title="Edit"><i class="far fa-edit"></i></a>&nbsp;
        <a name="delete_civilserv_btn" class="delete_civilserv_btn" id="<?php echo $civil_row['id']; ?>" title="Delete"><i class="far fa-trash-alt"></i></a>
    
      </td>
    </tr> 
    
<?php endwhile; ?>      
      
  </tbody>
</table>


<!----------------------------------------------- MODAL FOR VIEWING ------------------------------------------------->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Civil Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <div class="mt-3 row border border-bottom-0 border-right-0 rounded border-dark ">
          <div class="col-md-9 mt-3 align-items-center" id="fetch_civil_service">

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

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Civil Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <p id="alert_civilservice_station_empty" style="display: none;"></p>
        <p id="update_civil_service_success_alert" style="display: none;"></p>
        <div class="modal-body" id="update_civil_service_form_modal">

        </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type='button' class='btn btn-primary' name='update_civil_service' id='update_civil_service_btn'>Update</button>
        
</div>
      </div>
    </div>
  </div>


  <!----------------------------------------------- MODAL FOR DELETING ------------------------------------------------->

<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete from Civil Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="delete_civil_service_modal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id='delete_civil_service_form_btn'>Delete</button>
      </div>
    </div>
  </div>
</div>  