<?php
require 'tesloginptg.php';
$select = new Select_petugas();

if (!empty($_SESSION["id_petugas"])) {
    $user = $select->selectUserById($_SESSION["id_petugas"]);
} else {
    header("Location:loginptg.php");
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

    <title>Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-comments"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Prasetyo Report</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboardadmin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tampilpengaduan2.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data aduan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tanggapan.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tanggapan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tampilpengaduan.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="inputpetugas.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Input Petugas</span></a>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar -->
                    <h5>&ensp;SELAMAT DATANG ADMIN </b>| <b>MEDAN TEMBUNG</b></h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profilModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Content Row -->

                <div class="row">


                    <!-- Card Body -->

                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Halaman|Petugas</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                        <style>
                            .mx-auto {
                                width: 960px
                            }

                            .card {
                                margin-top: 20px;
                                border-style: solid;
                            }

                            .table {

                                align-content: center;
                            }

                            body {
                                background-repeat: no-repeat;
                                background-attachment: fixed;
                                background-size: 100% 100%;
                            }


                            .card-header {
                                text-align: center;
                                font-size: large;

                            }
                        </style>
                    </head>

                    <body background="">

                        <div class="mx-auto">


                            <div class="card">
                                <div class="card-header  table-dark table-striped text-white bg-dark">
                                    <b>Masukkan data petugas</b>
                                </div>

                                <div class="card-body">
                                    <?php
                                    include 'koneksi.php';
                                    $db = new prasetyo();
                                    $db->connectMySQL();

                                    if (isset($_POST['SAVE'])) {
                                        $id_petugas     = $_POST['id_petugas'];
                                        $nama_petugas   = $_POST['nama_petugas'];
                                        $username       = $_POST['username'];
                                        $password       = $_POST['password'];
                                        $telp           = $_POST['telp'];
                                        $level          = $_POST['level'];
                                        $input = $db->inputpetugas($id_petugas, $nama_petugas, $username, $password, $telp, $level);
                                    }
                                    ?>

                                    <form action="inputpetugas.php" method="post">
                                        <div class="mb-3 row">
                                            <label for="id_petugas" class="col-sm-2 col-form-label">ID</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="id_petugas" class="form-control" maxlength="4" placeholder="Masukkan ID" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama_petugas" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama_petugas" class="form-control" placeholder="Masukkan Nama" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="password" class="form-control" placeholder="Masukkan Password" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="telp" class="form-control" maxlength="12" placeholder="Masukkan Telp" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="level" class="col-sm-2 col-form-label">Level</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example" name="level" id="level" style="width: 800px;">
                                                    <option selected disabled>Pilih Level</option>
                                                    <option disabled value="admin">admin</option>
                                                    <option value="petugas">petugas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
											<a href="inputpetugas.php"><input type="submit" name="SAVE" value="Simpan" class="btn btn-success btn-block"></a> <br>
											<br>
											<a href="inputpetugas.php" class="btn btn-danger  btn-block">Reset</a>
										</div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </body>

                    </html>

                    <br>
                    <br>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Data Petugas</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                        <style>
                            body {
                                background-repeat: no-repeat;
                                background-attachment: fixed;
                                background-size: 100% 100%;
                            }

                            .table {
                                width: 977px;
                            }

                            p {
                                text-align: center;
                                font-family: 'Roboto', serif;
                                font-size: 24px;
                            }

                            .mx-auto {
                                width: 1000px
                            }

                            .card {
                                margin-top: 10px
                            }

                            .card-header {
                                text-align: center;
                                font-size: large;

                            }
                        </style>
                    </head>

                    <body background="">
                        <!--ganti -->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                        <div class="mx-auto">
                            <br>
                            <div class="card">

                                <div class="card-header text-white bg-dark">
                                    <b>Data Petugas</b>
                                </div>

                            </div>

                            <?php

                            $db->connectMySQL();

                            if (isset($_GET['aksi'])) {
                                if ($_GET['aksi'] == 'hapus') {
                                    $id_petugas = $_GET['id_petugas'];
                                    $delete = $db->hapuspetugas($id_petugas);
                                }
                            }

                            ?>



                            <?php
                            if (isset($_POST['update'])) {
                                $id_petugas = $_POST['id_petugas'];
                                $nama_petugas = $_POST['nama_petugas'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $telp = $_POST['telp'];
                                $level = $_POST['level'];
                                $update = $db->updatepetugas($id_petugas, $nama_petugas, $username, $password, $telp, $level);
                            }

                            $prasetyoarray = $db->tampilpetugas();


                            echo "<table class='table table-white table-striped table-bordered text-align-middle text-dark bg-body' cellpadding = '10'>
		<tr><th>No</th>
			<th>ID Petugas</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
            <th>Telp</th>
            <th>Level</th>
			<th>Aksi</th>
		</tr>";

                            $v = 1;
                            foreach ($prasetyoarray as $data) {
                                echo "<tr><td>" . $v . "</td>
				<td>" . $data['id_petugas'] . "</td>
				<td>" . $data['nama_petugas'] . "</td>
				<td>" . $data['username'] . "</td>
				<td>" . $data['password'] . "</td>
                <td>" . $data['telp'] . "</td>
                <td>" . $data['level'] . "</td>
			<td><a <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop" . $data['id_petugas'] . "'>Edit</button></a>
			 <a href = '" . $_SERVER['PHP_SELF'] . "?aksi=hapus&id_petugas=" . $data['id_petugas'] . "'><button type='button' class='btn btn-danger'>Hapus</button></a></td>
				</tr>";
                                $v++;
                            }
                            echo "</table>";

                            foreach ($prasetyoarray as $data) {
                                echo '<div class="modal fade" id="staticBackdrop' . $data['id_petugas'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="staticBackdropLabel">Data Petugas</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form action="inputpetugas.php" method="post">
		<div class="mb-3 row">
			<label for="id_petugas" class="col-sm-2 col-form-label">ID</label>
			<div class="col-sm-10">
				<input type="text" name="id_petugas" class="form-control" maxlength="4" value="' . $data['id_petugas'] . '"  required disabled>
			</div>
		</div>
		<div class="mb-3 row"> 
			<label for="nama_petugas" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama_petugas" class="form-control" value="' . $data['nama_petugas'] . '" required>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="username" class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" value="' . $data['username'] . '" required>
			</div>
		</div>
        <div class="mb-3 row">
			<label for="password" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="text" name="password" class="form-control" value="' . $data['password'] . '" required>
			</div>
		</div><div class="mb-3 row">
        <label for="telp" class="col-sm-2 col-form-label">Telp</label>
        <div class="col-sm-10">
            <input type="text" name="telp" class="form-control" value="' . $data['telp'] . '" required>
        </div>
    </div>
		<div class="mb-3 row">
						<label for="level" class="col-sm-2 col-form-label">Level</label>
						<div class="col-sm-10">
						
						<select class="form-select" value="' . $data['level'] . '"   required name="level" style="width: 382px;">	
                        <option selected disabled>Pilih Level</option>
								<option value="petugas">petugas</option>
							</select>
						</div>
					</div>
		<div class="col-12">
			<input type = "hidden" name = "id_petugas" value="' . $data['id_petugas'] . '">
			<button type="submit" name="update" value="Update data" class="btn btn-success">Update data</button>

		</div>
	</form>
		</div>
		<div class="modal-footer">
		  
		</div>
	  </div>
	</div>
  </div>';
                            }
                            ?>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Prasetyo Aditama 2023</span>
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

           <!-- Profil Modal-->
        <div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Profile |&ensp;<?php echo $user["username"]; ?></b></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"><b>Id Petugas :<?php echo $user["id_petugas"]; ?></b></div>
                    <div class="modal-body"><b>Nama :<?php echo $user["nama_petugas"]; ?></b></div>
                    <div class="modal-body"><b>No Telp :<?php echo $user["telp"]; ?></b></div>
                    <div class="modal-body"><b>Level :<?php echo $user["level"]; ?></b></div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Apakah anda yakin untuk Logout</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-primary" href="login.php">Logout</a>
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