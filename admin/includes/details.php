<?php 


class Details {
	public function get_details_for($tin_num) {
		global $db;
        
        return $db->query("SELECT * FROM details WHERE tin_num='$tin_num'");
	}

	 public function pick_reg_temp_sub() {
        return ['REGULAR','TEMPORARY','SUBTITUTE'];
    } 

	 public function pick_pri_inter() {
        return ['PRIMARY','INTERMEDIATE'];
    }  

	 public function pick_source_fund() {
        return ['NATIONAL','CAPITAL'];
    }  

    public function get_for_service_card($tin_num) {
        global $db;

        return $db->query("SELECT * FROM details WHERE tin_num= '$tin_num'");
    }

    public function delete_from_tin_num($tin_num) {
        global $db;     

        $result = $db->query("SELECT id FROM details WHERE tin_num= '$tin_num'");

        if($result->num_rows > 0) {
            $db->query("DELETE FROM details WHERE tin_num= '$tin_num'");
        }
    }

    public function update_tin_num($tin_num,$new_tin_num) {
        global $db;

        $result = $db->query("SELECT tin_num FROM details WHERE tin_num = '$tin_num'");

        if($result->num_rows > 0) {
            $db->query("UPDATE details SET tin_num = '$new_tin_num' WHERE tin_num = '$tin_num'");
        }

    }


}