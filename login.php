<?php
session_start();
require 'admin/functions.php';

if( isset($_POST["login"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  //cek username
  if( mysqli_num_rows($result) === 1 ) {

    //cek password
    $row = mysqli_fetch_assoc($result);
    if( password_verify($password, $row["password"]) ){
      //set session
      $_SESSION["login"]= true;
      //get data
      while($data = mysqli_fetch_row($result)){
        $iduser = $data[0]; //1
        $nama = $data[1]; //
        $username = $data[2];//
        $_SESSION['id_user']=$iduser;
        $_SESSION['nama']=$nama;
        $_SESSION['username']=$username;
      }
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

  <title>Login | Telkomedika</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color:LightBlue;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="assets/img/loginn.jpg" width = "450px;" float="center" ></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
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
                    
					 <button type ="submit" name="login" value="Login" class="btn-user btn-block" style="background-color:#65c6bb; color:white;">
                      Login
                    </button>
                    <br>
                    <h6 style="text-align: center;">
                        belum punya akun ?<a href="register.php"> Daftar</a>
                    </h6>
</br>
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

</html> -->
