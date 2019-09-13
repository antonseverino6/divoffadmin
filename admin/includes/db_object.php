<?php

class Db_object {
    
    /************************************************************/
                /* APPLICABLE FOR ALL TABLE */
    /************************************************************/


    public function get_details_for($table,$tin_num) {
        global $db;
        
        return $db->query("SELECT * FROM $table WHERE tin_num=$tin_num");
    }

    public function delete_an_employee($tin_num) {
    	global $db;
    	$info = new Info();
    	$other_info = new Other_info();
    	$work_exp = new Work_exp();
    	$civil = new Civil();
    	$details = new Details();

    	$info->delete_from_tin_num($tin_num);
    	$other_info->delete_from_tin_num($tin_num);
    	$work_exp->delete_from_tin_num($tin_num);
    	$civil->delete_from_tin_num($tin_num);
    	$details->delete_from_tin_num($tin_num);

    }


    public function update_tin_num($tin_num,$new_tin_num) {
        global $db;
        $other_info = new Other_info();
        $work_exp = new Work_exp();
        $civil = new Civil();
        $details = new Details();  

        $other_info->update_tin_num($tin_num,$new_tin_num);
        $work_exp->update_tin_num($tin_num,$new_tin_num);
        $civil->update_tin_num($tin_num,$new_tin_num);
        $details->update_tin_num($tin_num,$new_tin_num);


    }
    
}