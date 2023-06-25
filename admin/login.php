<?php
session_start();

require 'functions.php';

if( isset($_POST["login"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE `username`='$username' and `password`='$password'");
  $jumlah = mysqli_num_rows($result);
  //konfirmasi password dan username
    if( $jumlah === 1) {
    //set session
    $_SESSION["login"] = true;
    	            //get data
                  while($data = mysqli_fetch_row($result)){
                    $id_admin = $data[0]; //1
                    $level = $data[1]; //speradmin
                    $_SESSION['id_admin']=$id_admin;
                    $_SESSION['level']=$level;
        
      header("Location: index.php");
      exit; 
  }
}

  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Admin | Telkomedika</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color:#4e73df;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="img/admin.jpg" width = "450px;" ></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Admin Telkomedika!</h1>
                  </div>

                  <?php if( isset($error) ) : ?>
                    <span class="text-danger">
									   Username / password salah
									  </span>
                  <?php endif; ?>
                  <form class="user" action="" method="post">
                    <div class="form-group">
					  <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                    </div>
                    
					 <button type ="submit" name="login" value="Login" class="btn-user btn-block" style="background-color:#4e73df; color:white;">
                      Login
                    </button>
				</form>
                    
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


</body>

</html>