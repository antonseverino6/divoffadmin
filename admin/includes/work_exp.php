<?php

class Work_exp {

    public function delete_from_tin_num($tin_num) {
        global $db;     

        $result = $db->query("SELECT id FROM work_exp WHERE tin_num= '$tin_num'");

        if($result->num_rows > 0) {
            $db->query("DELETE FROM work_exp WHERE tin_num= '$tin_num'");
        }
    }

    public function update_tin_num($tin_num,$new_tin_num) {
    	global $db;

    	$result = $db->query("SELECT tin_num FROM work_exp WHERE tin_num = '$tin_num'");

    	if($result->num_rows > 0) {
    		$db->query("UPDATE work_exp SET tin_num = '$new_tin_num' WHERE tin_num = '$tin_num'");
    	}

    }     


}