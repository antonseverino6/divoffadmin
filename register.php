<?php 
require_once 'admin/includes/init.php';

$msg = '';
$user = new User();

if($session->isset_id()) {
    redirect('admin/index.php');
}

if(isset($_POST['submit'])) {
    
    if(!$user->register($_POST['username'],$_POST['password'],$_POST['password2'])){
        $msg = $user->error;
    }else {
        $msg  = $user->error;
    } //using the register method of User class

}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <link rel="icon" href="resources/img/background_img.png" type="image/icon type">    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

  <div style="margin-top: 10%;" class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                  <?php 
                  
                    if($msg == 'Two passwords does not match!') {
                        echo $msg;
                    }elseif($msg == 'Username already exists') {
                        echo $msg; 
                    }elseif($msg == 'Register success! Login now') {
                        echo $msg;
                    }
                  
                  ?>
              </div>
              <form action="" method="post" class="user">
<!--
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
-->
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                  </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>

              </form>
<!--
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
-->
              <div  class="text-center" style="padding-top: 5px;"`>
                <a  class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
