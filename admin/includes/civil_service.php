<?php


class Civil {

    public function get_details_for($tin_num) {
        global $db;
        
        return $db->query("SELECT * FROM civil_service WHERE tin_num='$tin_num'");
        
    }

    public function get_for_service_card($tin_num) {
		global $db;

		return $db->query("SELECT * FROM civil_service WHERE tin_num = '$tin_num'");

	}

	public function delete_from_tin_num($tin_num) {
		global $db;		

		$result = $db->query("SELECT id FROM civil_service WHERE tin_num= '$tin_num'");

		if($result->num_rows > 0) {
			$db->query("DELETE FROM civil_service WHERE tin_num= '$tin_num'");
		}
    }

    public function update_tin_num($tin_num,$new_tin_num) {
    	global $db;

    	$result = $db->query("SELECT tin_num FROM civil_service WHERE tin_num = '$tin_num'");

    	if($result->num_rows > 0) {
    		$db->query("UPDATE civil_service SET tin_num = '$new_tin_num' WHERE tin_num = '$tin_num'");
    	}

    }
    
}