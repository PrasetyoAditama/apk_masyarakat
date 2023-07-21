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

                    <!doctype html>
                    <html lang="en">

                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Verifikasi Pengaduan</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
                        <style>
     body {
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
		}

		.table {
			width: 1100px;
		}

		p {
			text-align: center;
			font-family: 'Roboto', serif;
			font-size: 24px;
		}

		.mx-auto {
			width: 1200px
		}

		.card {
			margin-top: 50px
		}

		.card-header {
			text-align: center;
			font-size: large;

		}
    </style>
                    </head>

                    <body>
                        <div class="mx-auto">
                            <div class="card">
                                <div class="card-header text-white bg-secondary">
                                    Laporan Warga
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Id Tanggapan</th>
                                                <th scope="col">Id Pengaduan</th>
                                                <th scope="col">Tanggal Tanggapan</th>
                                                <th scope="col">Tanggapan</th>
                                                <th scope="col">Id Petugas</th>
                                                <th scope="col">Status</th>

                                            </tr>
                                        <tbody>


                                            <?php
                                            include 'koneksi.php';
                                            $db = new prasetyo();
                                            $db->connectMySQL();
                                            if (isset($_GET['op'])) {
                                                if ($_GET['op'] == 'hapus') {
                                                    $id = $_GET['Id'];
                                                    $db->hapusData1($id);
                                                }
                                            }
                                            ?>


                                            <?php


                                            $arrayData = $db->tampilData3();
                                            $i = 1;
                                            foreach ($arrayData as $data) {
                                                $idtgp      = $data['id_tanggapan'];
                                                $idpgn    = $data['id_pengaduan'];
                                                $tgl   = $data['tgl_tanggapan'];
                                                $tgp  = $data['tanggapan'];
                                                $idptg   = $data['id_petugas'];
                                                $status   = $data['status'];
                                            ?>
                                                <tr>
                                                    <th scope="data"><?php echo $i++ ?></th>
                                                    <td scope="row"><?php echo $idtgp ?></td>
                                                    <td scope="row"><?php echo $idpgn ?></td>
                                                    <td scope="row"><?php echo $tgl ?></td>
                                                    <td scope="row"><?php echo $tgp ?></td>
                                                    <td scope="row"><?php echo $idptg ?></td>
                                                    <td scope="row"><?php echo $status ?></td>
                                                    <td scope="row">
                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
                    </body>

                    </html>
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
                            <a class="btn btn-primary" href="loginptg.php">Logout</a>
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