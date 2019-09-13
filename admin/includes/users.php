<?php

require_once 'info.php';

$info = new Info();

class User {
    public $error = array();

    public function uname_exists($username) { // checks if username already exists
        global $db;
        
        $result = $db->query("SELECT username FROM users WHERE username='$username'");
        
        if($result->num_rows > 0){
            return true;
        }
        return false;
    }
        
    public function register($uname,$pass,$pass2) { // for register
        global $db;
        $uname = trim($db->fix_string($uname));
        $pass = trim($db->fix_string($pass));
        $pass2 = trim($db->fix_string($pass2));
        
        if($this->uname_exists($uname)){
            $this->error = "Username already exists";
            return false;
        }        
        
        if($pass !== $pass2) {
            $this->error = "Two passwords does not match!";
            return false;
        } 
        
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

       $db->query("INSERT INTO users(username,password) VALUES('$uname','$hashed_password')");
        $this->error = "Register success! Login now";
    }
    
    public function login($uname,$pass) { // for login
        global $db;
        global $info;
        $uname = trim($db->fix_string($uname));
        $pass = trim($db->fix_string($pass));
        
        $result = $db->query("SELECT id,password FROM users WHERE BINARY username='$uname'");
         $row = $result->fetch_array();
        
        if($result->num_rows > 0) {
            if(password_verify($pass, $row['password'])) {
                $_SESSION['id'] = $row['id'];
                $info->update_all_age();
                redirect('admin/index');        
            }else {
                $this->error = 'Maybe Username or Password is Incorrect!';
                return false;
            }
           

            
        }else {
            $this->error = 'Maybe Username or Password is Incorrect!';
            return false;
        }

    }
    
    public function get_username() {  // gets the username
        global $db;
        global $session;
        
        if($session->isset_id()) {
            $result = $db->query("SELECT username FROM users WHERE id= " . $_SESSION['id'] . "");
            $row = $result->fetch_array();
            return ucwords(strtolower($row['username']));
        }  
    }
    
    public function get_one_info($info) { // get info
        global $db;
        global $session;
        
        if($session->isset_id()) {
            $result = $db->query('SELECT ' .$info. ' FROM users WHERE id= '. $_SESSION['id'] .'');
            $row = $result->fetch_array();
            
            return $row["$info"];
        }
        
    }

    public function change_password($current_password,$new_password,$confirm_new_password) {
        global $db;
        global $session;

        
        $current_password = trim($db->fix_string($current_password));
        $new_password = trim($db->fix_string($new_password));
        $confirm_new_password = trim($db->fix_string($confirm_new_password));

        if(empty($confirm_new_password) || empty($current_password) || empty($new_password)) {
            $this->msg = "Fields should not be left empty!";
            return false;
        }

        if($new_password !== $confirm_new_password) {
            $this->msg = "New and Confirm Password does not match!";
            return false;   
        }

        $result = $db->query("SELECT id,password FROM users WHERE id= ".$_SESSION['id']. "");
        $row = $result->fetch_array();
        $user_id = $row['id'];
        if($result->num_rows > 0) {
            if(password_verify($current_password, $row['password'])) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $db->query("UPDATE users SET password='$hashed_password' WHERE id=$user_id");
                return true;                
            }else {
                $this->msg = "Incorrect Current Password!";
                return false;
            } 
        }
    }

        
    
}