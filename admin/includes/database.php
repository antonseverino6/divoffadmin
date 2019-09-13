<?php

class Database {
    public $conn;
    
    public function __construct() {
        $this->open_db_conn();
        // $this->set_charset();
    }
    
    public function open_db_conn() {
        $this->conn = new mysqli('localhost','root','','divoffadmin');
        
        if($this->conn->connect_errno) {
            die('Connection failed ' . $this->conn->connect_error);
        }
    }
    
    public function query($sql) {
        $result = $this->conn->query($sql);
        
        $this->confirm_query($result);
        
        return $result;
        
    }
    
    public function confirm_query($result) {
        if(!$result) {
            die('Query Failed ' . $this->conn->error);
            // redirect('404_page.php');
        }
    }
    
    public function fix_string($string) {
        return htmlspecialchars($this->conn->real_escape_string($string));
    }

    public function insert_id() {
        return $this->conn->insert_id;
    }

    // public function set_charset() {
    //     $this->conn->set_charset("utf8");
    // }
}

$db = new Database();