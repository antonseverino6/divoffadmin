<?php
	require_once '../includes/init.php';

	$db_object = new Db_object();

	if(isset($_POST['tin_num'])) {
		$tin_num = $db->fix_string($_POST['tin_num']);

		$db_object->delete_an_employee($tin_num);

	}


