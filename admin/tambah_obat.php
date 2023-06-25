<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';

//cek tombol tambah sudah ditekan apa belum
if( isset($_POST["submit"]) ){


    //cek apakah data berhasil ditambahkan atau tidak
    if( tambahobat($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href ='dataobat.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert ('data gagal ditambahkan!');
            document.location.href = 'dataobat.php';
            </script>
            ";
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

    <title>Admin Telkomedika</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                <img class="sidebar-card-illustration mb-2" src="img/logotrans.png" alt="" style="width: 200px;">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Profil -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span> Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Admin-->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-user-edit"></i>
                    <span>Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-user-edit"></i>
                    <span>User</span></a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

            
            <!-- Heading -->
            <div class="sidebar-heading">
                Tampilan
            </div>

             <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="pegawai.php">
                    <i class="fas fa-fw fa-users"></i>
                        <span>Data pegawai</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="dataobat.php">
                    <i class="fas fa-fw fa-notes-medical"></i>
                        <span>Data obat</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="jenisobat.php">
                    <i class="fas fa-fw fa-pills"></i>
                        <span>Data jenis obat</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign"></i>
                    <span>Sign out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="background: blue;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group" >
                        <a href="admin.php" class="logo me-auto"><strong> Halaman data obat!</strong></a>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->
                        <?php
                    if(isset($_SESSION['id_admin'])){
	                $id_admin = $_SESSION['id_admin'];
	                //get profil
	                $result = mysqli_query($conn, "select `nama`, `email`, `level`,`foto` from `admin`
	                where `id_admin`='$id_admin'");
	                //echo $sql;

	                while($data = mysqli_fetch_row($result)){
		            $nama = $data[0];
		            $email = $data[1];
		            $level = $data[2];
		            $foto = $data[3];
	                    }
                    }
                    ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/upload/<?php echo $foto; ?>">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="index.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
  

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="margin: 10px;">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="pegawai.php">Data obat</a></li>
              <li class="breadcrumb-item active">Tambah data obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid"
    <section class="content">
      <!-- form start -->
	 <div class="col-sm-10">
	</div>
     <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			
     <div class="card shadow mb-4">
    <div class="card-header py-3" style="background: #4e73df;" style="margin-top: 5px;">
        <h6 style="color: white;">Tambah data obat</h6>
    </div>
    
               <div class="card-body">
               <div class="form-group row">
					<label for="kemasan" class="col-sm-3 col-form-label">Kemasant</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="kemasan" id="kemasan" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-sm-3 col-form-label">Jenis obat</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="jenis_obat" id="nama" value="">
					</div>
				</div>
                	<div class="form-group row">
					<label for="nama_obat" class="col-sm-3 col-form-label">Nama obat</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="nama_obat" id="nama_obat" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="alamat" class="col-sm-3 col-form-label">Harga</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="harga" id="alamat" value="">
					</div>
				</div>
                <div class="form-group row">
					<label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="deskripsi" id="deskripsi" value="">
					</div>
				</div>
				<div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                    <div class="col-sm-7">
                    <input type="file" class="form-control" name="foto" id="foto" value="">
                    </div>
	             </div>
			<!-- /.card-body -->
            <div class="card-footer">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-info float-right" name="submit" style="background: #4e73df ;">
							<i class="fas fa-plus"></i> 
							Tambah
						</button>
					</div>  
				</div>
			<!-- /.card-footer -->
		</form>
    </div>
    <!-- /.card -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admin Telkomedika</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>