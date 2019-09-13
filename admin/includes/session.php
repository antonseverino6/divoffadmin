<?php

class Session {
    public $logged_in = false;
    public $user_id;
    public $message;

    function __construct() {
        session_start();
        $this->check_if_logged_in();
        $this->check_message();
    }
    
    public function isset_id() {
        if(isset($_SESSION['id'])) {
            return true;
        }
    }
    
    public function is_logged_in() {
        return $this->logged_in;
    }
    
    public function check_if_logged_in() {
        if(isset($_SESSION['id'])) {
            $this->logged_in = true;
            $this->user_id = $_SESSION['id'];
        }else {
            unset($_SESSION['id']);
            $this->logged_in = false;
        }
    }
    
    public function logout() {
        session_destroy();
        unset($_SESSION['id']);
        $this->logged_in = false;
        $this->user_id = '';
    }

    public function message($msg=""){

      if(!empty($msg)){
          $_SESSION['message'] = $msg;
      }else{
          return $this->message;
      }

    }

    public function check_message(){

        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $this->message = "";
        }

    }    
    
}

$session = new Session();
$message = $session->message();