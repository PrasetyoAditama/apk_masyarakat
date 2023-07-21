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

    <title>Petugas - Dashboard</title>

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
                <a class="nav-link" href="dashboardpetugas.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tampilpengaduanptg.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data aduan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tanggapanptg.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tanggapan</span></a>
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
                    <h5>&ensp;SELAMAT DATANG PETUGAS </b>| <b>MEDAN TEMBUNG</b></h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Petugas</span>
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
                                    Laporan Pengaduan
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Id</th>
                                                <th scope="col">Tanggal Pengaduan</th>
                                                <th scope="col">Nik</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Isi Laporan</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>

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

                                            if (isset($_POST['simpan'])) {
                                                $idtgp   = $_POST['id'];
                                                $idpgn   = $_POST['idpgn'];
                                                $tgl     = date("Y-m-d H:i:s");
                                                $tgp     = $_POST['tgp'];
                                                $idptg   = $_POST['idptg'];
                                                $status  = $_POST['status'];
                                                $db->tanggapan($idtgp, $idpgn, $tgl, $tgp, $idptg, $status);
                                            }
                                            if (isset($_POST['simpan'])) {
                                                $id      = $_POST['idpgn'];
                                                $status  = $_POST['status'];

                                                $db->updateData2($id, $status);
                                            }


                                            ?>


                                            <?php


                                            $arrayData = $db->tampilData2();
                                            $i = 1;
                                            foreach ($arrayData as $data) {
                                                $id      = $data['id_pengaduan'];
                                                $tgl     = $data['tgl_pengaduan'];
                                                $nik   = $data['nik'];
                                                $nama  = $data['nama'];
                                                $isi   = $data['isi_laporan'];
                                                $foto   = $data['foto'];
                                                $status  = $data['status'];
                                            ?>
                                                <tr>
                                                    <th scope="data"><?php echo $i++ ?></th>
                                                    <td scope="row"><?php echo $id ?></td>
                                                    <td scope="row"><?php echo $tgl ?></td>
                                                    <td scope="row"><?php echo $nik ?></td>
                                                    <td scope="row"><?php echo $nama ?></td>
                                                    <td scope="row"><?php echo $isi ?></td>
                                                    <td align="center"><img src="gambar/<?php echo $data['foto']; ?>" width="100" height="100"></td>
                                                    <td scope="row"><?php echo $status ?></td>
                                                    <td scope="row">
                                                        <a href="tanggapan.php" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id ?>">Tanggapi</a>
                                                        
                                                    </td>
                                                </tr>

                                                <div class="modal fade modal-lg-center" id="edit<?php echo $id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tanggapan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php $_SERVER['PHP_SELF'] ?>?op=Update" method="post">
                                                                    <div class="mb-3 row">
                                                                        <label for="id" class="col-sm-2 col-form-label">Id Tanggapan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $db->codetgp(); ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="tgl" class="col-sm-2 col-form-label">Id Pengaduan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="tgl" name="idpgn" value="<?php echo $db->bacaData1('id_pengaduan', $id); ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="nik" class="col-sm-2 col-form-label">Tanggal Tanggapan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="nik" value="<?php echo date('d-m-Y'); ?>" name="tgl" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="nama" class="col-sm-2 col-form-label">Tanggapan</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea type="text" class="form-control" id="nama" name="tgp" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="isi" class="col-sm-2 col-form-label">Id Petugas</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="nama" name="idptg" value="<?php echo $user["id_petugas"]; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="kodetarif" class="col-sm-2 col-form-label">Status</label>
                                                                        <div class="col-sm-10">
                                                                            <select class="form-control" id="status" name="status" placeholder="Kode Tarif" required>
                                                                                <option value="" disabled>- Status-</option>
                                                                                <option value="Proses">Proses</option>
                                                                                <option value="Selesai">Selesai</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <a href="tanggapan.php"><input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"></a>
                                                                        <input type="hidden" name="direktori" id="direktori" value="gambar" />
                                                                        <a href="tanggapan.php"><button type="button" class="btn btn-secondary">Kembali</button></a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                </div>

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