

CREATE TABLE `civil_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `employee_id` varchar(40) NOT NULL,
  `cs_exam` varchar(255) NOT NULL,
  `cs_passed_rating` varchar(40) NOT NULL,
  `cs_date_passed` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




CREATE TABLE `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `employee_id` varchar(40) NOT NULL,
  `special_order_no` varchar(60) NOT NULL,
  `reg_temp_sub` varchar(30) NOT NULL,
  `reg_effective_date` varchar(40) NOT NULL,
  `annual_salary` varchar(20) NOT NULL,
  `source_fund` varchar(30) NOT NULL,
  `nature_of_assignment` varchar(60) NOT NULL,
  `nat_effective_date` varchar(40) NOT NULL,
  `primary_or_intermediate` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




CREATE TABLE `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(150) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` varchar(40) NOT NULL,
  `place_birth` varchar(100) NOT NULL,
  `per_address` varchar(255) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `role_type` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `tin_num` varchar(100) NOT NULL,
  `div_code` varchar(100) NOT NULL,
  `job_title_code` varchar(100) NOT NULL,
  `employ_status` varchar(100) NOT NULL,
  `date_join` varchar(60) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `work_shift` varchar(50) NOT NULL,
  `biometric_id` varchar(100) NOT NULL,
  `region_org_code` varchar(50) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `suffix` varchar(100) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `date_orig_appointment` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;




CREATE TABLE `other_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `spouse_name` varchar(100) NOT NULL,
  `spouse_occ` varchar(100) NOT NULL,
  `spouse_add` varchar(255) NOT NULL,
  `high_deg_received` varchar(100) NOT NULL,
  `year_received` varchar(40) NOT NULL,
  `name_of_institution` varchar(255) NOT NULL,
  `spec_qualification` varchar(255) NOT NULL,
  `prev_experience` varchar(255) NOT NULL,
  `teach_comp_exam_score` varchar(40) NOT NULL,
  `teach_comp_exam_date` varchar(60) NOT NULL,
  `gsis_no` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;




CREATE TABLE `work_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `comp_name` varchar(150) NOT NULL,
  `status` varchar(80) NOT NULL,
  `designation` varchar(70) NOT NULL,
  `salary` varchar(70) NOT NULL,
  `branch` varchar(70) NOT NULL,
  `exp_date_from` varchar(40) NOT NULL,
  `exp_date_to` varchar(40) NOT NULL,
  `leave_abs` varchar(40) NOT NULL,
  `leave_abs_date` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


