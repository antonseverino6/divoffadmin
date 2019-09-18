<?php


class Info {

	public function get_details_for($tin_num) {
		global $db;

		return $db->query("SELECT * FROM info WHERE tin_num='$tin_num'");
	}

	public function employees_count() {
		global $db;

		$result = $db->query("SELECT id FROM info");

		return $result->num_rows;
	}

	public function get_for_service_card($tin_num) {
		global $db;

		$sql = "SELECT first_name,last_name,middle_name,place_birth,birth_date,per_address,";
		$sql .= "civil_status,employee_id,tin_num FROM info WHERE tin_num= '$tin_num'";

		$result = $db->query($sql);

		return $result->fetch_array();
	}

	public function employee_already_exists($tin_num) {
		global $db;

		$result = $db->query("SELECT tin_num FROM info WHERE tin_num= '$tin_num'");

		if($result->num_rows > 0) {
			return true;
		} 
		return false;
	}

	public function employee_id_already_exists($employee_id) {
		global $db;

		$result = $db->query("SELECT id FROM info WHERE employee_id='$employee_id'");

		if($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	

	public function delete_from_tin_num($tin_num) {
		global $db;

		$result = $db->query("SELECT id FROM info WHERE tin_num= '$tin_num'");

		if($result->num_rows > 0) {
			$db->query("DELETE FROM info WHERE tin_num= '$tin_num'");
		}

	}

	public function compute_age($birth_date) {
	  $birthDate = $birth_date;
	  //explode the date to get month, day and year
	  $birthDate = explode("-", $birthDate);
	  //get age from date or birthdate
	  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
	  return $age;
	}

	// public function age_count($start_age,$end_age) {
	// 	global $db;

	// 	$age_around_array = [];

	// 	$result = $db->query("SELECT birth_date FROM info");

	// 	while($row = $result->fetch_array()) {

	// 	  $birthDate = $row['birth_date'];
	// 	  //explode the date to get month, day and year
	// 	  $birthDate = explode("-", $birthDate);
	// 	  //get age from date or birthdate
	// 	  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));

	// 	  if(($age >= $start_age && $age <= $end_age)) {
	// 	  	array_push($age_around_array,$age);
	// 	  }
	// 	}	

	// 	return count($age_around_array);

	// }
	
	// public function compute_age($birth_date) {
	//   $birthDate = $birth_date;
	//   //explode the date to get month, day and year
	//   $birthDate = explode("-", $birthDate);
	//   //get age from date or birthdate
	//   $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
	//   return $age;
	// }

	public function update_all_age() {
		global $db;

		$result = $db->query("SELECT id,birth_date FROM info");

		while($row = $result->fetch_array()) {
			$id = $row['id'];
			$birth_date = $row['birth_date'];
		  	$birthDate = $birth_date;
		  	//explode the date to get month, day and year
		  	$birthDate = explode("-", $birthDate);
		  	//get age from date or birthdate
			$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));

			$db->query("UPDATE info SET age='$age' WHERE id=$id");
		}

	}

	public function insert_age($birth_date) {
		  	$birthDate = $birth_date;
		  	//explode the date to get month, day and year
		  	$birthDate = explode("-", $birthDate);
		  	//get age from date or birthdate
			$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));

			return $age;
	}	

	public function count_gender_for_age($gender,$min,$max) {
		global $db;

		$result = $db->query("SELECT id FROM info WHERE gender='$gender' AND age BETWEEN $min and $max");	

		return $result->num_rows;
	
	}

	public function age_count($min,$max) {
		global $db;

		$result = $db->query("SELECT id FROM info WHERE age BETWEEN $min and $max");

		return $result->num_rows;
	}		


	public function highest_count_of_age() {
		global $db;

		return max($this->age_count(20,30),$this->age_count(31,40),$this->age_count(41,50),$this->age_count(51,60));
	}			

	public function pick_gender() {
		return ['FEMALE','MALE'];
	}

	public function pick_title() {
		return ['MR','MRS','MISS'];
	}

	public function pick_civil_status() {
		return ['SINGLE','MARRIED','WIDOWED','DIVORCED','SEPARATED'];
	}

	public function male_count() {
		global $db;

		$result = $db->query("SELECT id FROM info WHERE gender='MALE'");

		return $result->num_rows;
	}

	public function female_count() {
		global $db;

		$result = $db->query("SELECT id FROM info WHERE gender='FEMALE'");

		return $result->num_rows;
	}

	public function no_employee_id_count() {
		global $db;

		$result = $db->query("SELECT * FROM info WHERE employee_id = ''");

		return $result->num_rows;
	}

	public function school_name_choices() {
		global $db;

		return $db->query("SELECT DISTINCT school_name FROM info");
	}				

}
