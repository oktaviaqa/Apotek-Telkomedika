<?php
error_reporting(0);
?>
<?php 
require 'admin/functions.php';

if( isset($_POST["submit"]) ){

  if( register($_POST) > 0 ) {
    echo "
    <script>
        alert('Anda sudah terdaftar');
        document.location.href = 'login.php';
    </script>
    ";
} else {
    echo mysqli_error($conn);
  }

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

  <title>Daftar | Telkomedika</title>

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
              <div class="col-lg-6 d-none d-lg-block"><img src="assets/img/rgs.jpg" width = "450px;" ></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftar yuk!</h1>
                  </div>
                  <form class="user" action="" method="post">
                  <div class="form-group">
					  <input type="text" class="form-control form-control-user" placeholder="Nama" name="nama">
                    </div>
                    <div class="form-group">
					            <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Konfirmasi Password" name="konfirmasi">
                    </div>
	             </div>
					 <button type ="submit" name="submit" value="register" class="btn-user btn-block" style="background-color:#36b9cc; color:white;">
                      register
                    </button>
                    <br>
                    <h6 style="text-align: center;">
                        sudah punya akun ?<a href="login.php"> Masuk</a>
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

</html>
