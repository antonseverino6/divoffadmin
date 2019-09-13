<?php


class Other_info {
    public function get_details_for($tin_num) {
        global $db;

        return $db->query("SELECT * FROM other_info WHERE tin_num='$tin_num'");
    }


    public function check_if_has_other_info($tin_num) {
        global $db;

        $result = $db->query("SELECT tin_num FROM other_info WHERE tin_num='$tin_num'");

        if($result->num_rows > 0) {
            return true;
        }
        return false; 
    }

    public function get_for_service_card($tin_num) {
        global $db;

        $result = $db->query("SELECT * FROM other_info WHERE tin_num= '$tin_num'");

        return $result->fetch_array();
    }

    public function delete_from_tin_num($tin_num) {
        global $db;     

        $result = $db->query("SELECT id FROM other_info WHERE tin_num= '$tin_num'");

        if($result->num_rows > 0) {
            $db->query("DELETE FROM other_info WHERE tin_num= '$tin_num'");
        }
    }

    public function update_tin_num($tin_num,$new_tin_num) {
        global $db;

        $result = $db->query("SELECT tin_num FROM other_info WHERE tin_num = '$tin_num'");

        if($result->num_rows > 0) {
            $db->query("UPDATE other_info SET tin_num = '$new_tin_num' WHERE tin_num = '$tin_num'");
        }

    }

    public function pick_level_civil() {
        return ['','FIRST LEVEL - SG 1-9','SECOND LEVEL - SG 10-24','THIRD LEVEL - SG 25-UP'];
    }

    public function teacher_choices() {
        return ['KINDER','ELEMENTARY','JUNIOR HIGH SCHOOL','SENIOR HIGH SCHOOL'];
    }

    public function sdo_based_choices() {
        return ["OSDS","CID","SGOD"];
    }

    public function teaching_choices() {
        return ['TEACHER I','TEACHER II','TEACHER III','SPECIAL SCIENCE TEACHER I','SPECIAL EDUCATION TEACHER I','SPECIAL EDUCATION TEACHER II',
                'SPECIAL EDUCATION TEACHER III','MASTER TEACHER I','MASTER TEACHER II','MASTER TEACHER III','MASTER TEACHER IV'];
    }   

    public function non_teaching_position_choices() {
        return ['SENIOR BOOKKEEPER','DISBURSING OFFICER II','ADMINISTRATIVE ASSISTANT I','ADMINISTRATIVE ASSISTANT II',
                'ADMINISTRATIVE ASSISTANT III','ADMINISTRATIVE AIDE I','ADMINISTRATIVE AIDE II','ADMINISTRATIVE AIDE III',
                'ADMINISTRATIVE AIDE IV','ADMINISTRATIVE AIDE V','ADMINISTRATIVE AIDE VI','SCHOOL PRINCIPAL I','SCHOOL PRINCIPAL II',
                'SCHOOL PRINCIPAL III','SCHOOL PRINCIPAL IV','ASSISTANT SCHOOL PRINCIPAL II','HEAD TEACHER I','HEAD TEACHER II',
                'HEAD TEACHER III','HEAD TEACHER IV','HEAD TEACHER V','HEAD TEACHER VI','GUIDANCE COUNSELOR I',
                'GUIDANCE COUNSELOR II','REGISTRAR I','SCHOOL LIBRARIAN I','SCHOOL LIBRARIAN II','SECURITY GUARD I','DRIVER'];
    }

    public function sdo_based_position_choices() {
        return [    'SCHOOLS DIVISION SUPERINTENDENT',
                    'ASSISTANT SCHOOLS DIVISION SUPERINTENDENT',
                    'ATTORNEY III',
                    'ACCOUNTANT III',
                    'ACCOUNTANT I',
                    'CHIEF EDUCATION SUPERVISOR',
                    'EDUCATION PROGRAM SUPERVISOR',
                    'PUBLIC SCHOOLS DISTRICT SUPERVISOR',
                    'SENIOR EDUCATION PROGRAM SPECIALIST',
                    'INFORMATION TECHNOLOGY OFFICER I',
                    'EDUCATION PROGRAM SPECIALIST II',
                    'ADMINISTRATIVE OFFICER V',
                    'ADMINISTRATIVE OFFICER IV',
                    'ADMINISTRATIVE OFFICER II',
                    'ADMINISTRATIVE OFFICER I',
                    'LEGAL ASSISTANT I',
                    'SENIOR BOOKKEEPER',
                    'DISBURSING OFFICER II',
                    'ADMINISTRATIVE ASSISTANT III',
                    'ADMINISTRATIVE ASSISTANT II',
                    'ADMINISTRATIVE ASSISTANT I',
                    'ADMINISTRATIVE AIDE VI',
                    'ADMINISTRATIVE AIDE V',
                    'ADMINISTRATIVE AIDE IV',
                    'ADMINISTRATIVE AIDE III',
                    'ADMINISTRATIVE AIDE II',
                    'ADMINISTRATIVE AIDE I',
                    'MEDICAL OFFICER III',
                    'ENGINEER III',
                    'PLANNING OFFICER III',
                    'DENTIST II',
                    'NURSE II',
                    'DENTAL AIDE',
                    'PROJECT DEVELOPMENT OFFICER II',
                    'PROJECT DEVELOPMENT OFFICER I',
                    'SECURITY GUARD I',
                    'DRIVER'  ];
    }    


    public function employee_type_choices() {
        return ["",'KINDER','ELEMENTARY','JUNIOR HIGH SCHOOL','SENIOR HIGH SCHOOL',"OSDS","CID","SGOD"];
    }

    
    public function position_choices() {
        return [   


                '','TEACHER I','TEACHER II','TEACHER III','SPECIAL SCIENCE TEACHER I','SPECIAL EDUCATION TEACHER I',
                'SPECIAL EDUCATION TEACHER II','SPECIAL EDUCATION TEACHER III','MASTER TEACHER I','MASTER TEACHER II',
                'MASTER TEACHER III','MASTER TEACHER IV',
                
                'SENIOR BOOKKEEPER','DISBURSING OFFICER II','ADMINISTRATIVE ASSISTANT I','ADMINISTRATIVE ASSISTANT II',
                'ADMINISTRATIVE ASSISTANT III','ADMINISTRATIVE AIDE I','ADMINISTRATIVE AIDE II','ADMINISTRATIVE AIDE III',
                'ADMINISTRATIVE AIDE IV','ADMINISTRATIVE AIDE V','ADMINISTRATIVE AIDE VI','SCHOOL PRINCIPAL I','SCHOOL PRINCIPAL II',
                'SCHOOL PRINCIPAL III','SCHOOL PRINCIPAL IV','ASSISTANT SCHOOL PRINCIPAL II','HEAD TEACHER I','HEAD TEACHER II',
                'HEAD TEACHER III','HEAD TEACHER IV','HEAD TEACHER V','HEAD TEACHER VI','GUIDANCE COUNSELOR I',
                'GUIDANCE COUNSELOR II','REGISTRAR I','SCHOOL LIBRARIAN I','SCHOOL LIBRARIAN II','SECURITY GUARD I','DRIVER',


                    'SCHOOLS DIVISION SUPERINTENDENT',
                    'ASSISTANT SCHOOLS DIVISION SUPERINTENDENT',
                    'ATTORNEY III',
                    'ACCOUNTANT III',
                    'ACCOUNTANT I',
                    'CHIEF EDUCATION SUPERVISOR',
                    'EDUCATION PROGRAM SUPERVISOR',
                    'PUBLIC SCHOOLS DISTRICT SUPERVISOR',
                    'SENIOR EDUCATION PROGRAM SPECIALIST',
                    'INFORMATION TECHNOLOGY OFFICER I',
                    'EDUCATION PROGRAM SPECIALIST II',
                    'ADMINISTRATIVE OFFICER V',
                    'ADMINISTRATIVE OFFICER IV',
                    'ADMINISTRATIVE OFFICER II',
                    'ADMINISTRATIVE OFFICER I',
                    'LEGAL ASSISTANT I',
                    'SENIOR BOOKKEEPER',
                    'DISBURSING OFFICER II',
                    'ADMINISTRATIVE ASSISTANT III',
                    'ADMINISTRATIVE ASSISTANT II',
                    'ADMINISTRATIVE ASSISTANT I',
                    'ADMINISTRATIVE AIDE VI',
                    'ADMINISTRATIVE AIDE V',
                    'ADMINISTRATIVE AIDE IV',
                    'ADMINISTRATIVE AIDE III',
                    'ADMINISTRATIVE AIDE II',
                    'ADMINISTRATIVE AIDE I',
                    'MEDICAL OFFICER III',
                    'ENGINEER III',
                    'PLANNING OFFICER III',
                    'DENTIST II',
                    'NURSE II',
                    'DENTAL AIDE',
                    'PROJECT DEVELOPMENT OFFICER II',
                    'PROJECT DEVELOPMENT OFFICER I',
                    'SECURITY GUARD I',
                    'DRIVER'  ];
    }        


    // public function 

    public function employee_count($employee) {
        global $db;

        $result = $db->query("SELECT id FROM other_info WHERE employee='$employee'");

        return $result->num_rows;        
    }


    public function employee_type_count($employee_type) {
        global $db;

        $result = $db->query("SELECT id FROM other_info WHERE employee_type='$employee_type'");

        return $result->num_rows;
    }

    public function levels_of_civil_count($employee_type) {
        global $db;

        $result = $db->query("SELECT id FROM other_info WHERE level_civil_service='$employee_type'");

        return $result->num_rows;
    }

    public function position_count($position) {
        global $db;

        $result = $db->query("SELECT id FROM other_info WHERE position='$position'");

        return $result->num_rows;
    }        
 

}