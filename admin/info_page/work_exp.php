<?php 

$result = $db->query("SELECT * FROM work_exp WHERE tin_num = '$tin_num'"); 

?>

<table class="table table-bordered bg-white table-official " id="work_table">
  <thead>
    <tr>
      <th colspan="6" class="text-center">Experience Details</th>
    </tr>
    <tr class="table-active">
        <th class="asked-info">Station/Place of Assignment</th>
        <th class="asked-info">Status</th>
        <th class="asked-info">Designation</th>
        <th class="asked-info">Branch</th>
        <th class="asked-info">Action</th>

    </tr>  
  </thead>
  <tbody id="table_work_exp_body">
<?php while($work_row = $result->fetch_array()) : ?>      
    <tr id="<?php echo "table_".$work_row['id']; ?>">
        <td class="person-info"><?php echo $work_row['comp_name']; ?></td>
        <td class="person-info"><?php echo $work_row['status']; ?></td>
        <td class="person-info"><?php echo $work_row['designation']; ?></td>
        <td class="person-info"><?php echo $work_row['branch']; ?></td>
        <td class="person-info  table-data-action">
          <a class="view_workexp"  id="<?php echo $work_row['id']; ?>" title="View"><i class="far fa-eye"></i></a>
          <!-- <button  type="button" name="view_work" class="view_workexp" id="<?php // echo $work_row['id']; ?>" style="color: #000;"><i class="far fa-eye"></i></button> -->
          <a name="edit_workexp_btn" class="edit_workexp_btn" id="<?php echo $work_row['id']; ?>" title="Edit"><i class="far fa-edit"></i></a>
          <!-- <input type="button" name="edit_workexp_btn" class="edit_workexp_btn" id="<?php // echo  $work_row['id']; ?>" value="Edit">    -->
          <a name="delete_workexp_btn" class="delete_workexp_btn" id="<?php echo $work_row['id']; ?>" title="Delete"><i class="far fa-trash-alt"></i></a>
        </td>

    </tr>
<?php endwhile; ?>      
  </tbody>
</table>   


<!----------------------------------------------- MODAL FOR VIEWING ------------------------------------------------->

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Work Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <div class="mt-3 row border border-bottom-0 border-right-0 rounded border-dark ">
          <div class="col-md-12 mt-3 align-items-center" id="fetch_work_exp">

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

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Work Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <p id="alert_workexp_station_empty" style="display: none;"></p>
       <p id="update_work_exp_success_alert" style="display: none;"></p>
        <div class="modal-body" id="update_work_exp_form_modal">


        </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type='button' class='btn btn-primary' name='update_work_exp_btn' id='update_work_exp_btn'>Update</button>
        
</div>
      </div>
    </div>
  </div>


  <!----------------------------------------------- MODAL FOR DELETING ------------------------------------------------->

<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete from Work Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="delete_work_exp_modal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id='delete_work_exp_btn'>Delete</button>
      </div>
    </div>
  </div>
</div>


