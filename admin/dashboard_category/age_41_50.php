          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><span style="color: #000;"><?php echo $info->age_count(41,50); ?> Total for</span> Age : 41 to 50 <span class="m-0 font-weight-bold text-primary float-right">Female : <?php echo $info->count_gender_for_age('female',41,50) ?>, Male : <?php echo $info->count_gender_for_age('male',41,50) ?></span></h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tin No.</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>School Name</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>Contact Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tin No.</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>School Name</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>Contact Number</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
         <?php 
            
          $result = $db->query("SELECT id,first_name,last_name,age,tin_num,contact_num,gender,school_name FROM info WHERE age BETWEEN 41 and 50");

          if($result->num_rows < 1) :
          ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>  
          <?php    
          else :
          ?>
          
          <?php  
          while($info_row = $result->fetch_array()) :
         ?>           
                    <tr id="employee_table_row">
                      <td><a href="/divoffadmin/admin/mydetails/<?php echo $info_row['tin_num']; ?>" style="text-decoration: none; color: #000; font-weight: bold;"><?php echo $info_row['tin_num']; ?></a></td>
                      <td><?php echo $info_row['first_name']; ?></td> 
                      <td><?php echo $info_row['last_name']; ?></td>
                      <td><?php echo $info_row['school_name']; ?></td>
                      <td><?php echo $info_row['gender']; ?></td>
                      <td><?php echo $info_row['age']; ?></td>
                      <td><?php echo $info_row['contact_num']; ?></td>

                      <td><button class="delete_employee_details btn btn-danger" id="<?php echo $info_row['tin_num']; ?>">Delete</button></td>
                      
                    </tr>

          <?php endwhile; ?>
          <?php endif; ?> 

                  </tbody>
                </table>
              </div>
            </div>
          </div>