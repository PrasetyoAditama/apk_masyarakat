<?php
require 'teslogin.php';
$select = new Select();

if (!empty($_SESSION["nik"])) {
    $user = $select->selectUserByNik($_SESSION["nik"]);
} else {
    header("Location:login.php");
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

    <title>User - Dashboard</title>

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
                <a class="nav-link" href="dashboarduser.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="inputpengaduan.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pengaduan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tampiluser.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data aduan</span></a>
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
                    <h5>&ensp;SELAMAT DATANG MASYARAKAT </b>| <b>MEDAN TEMBUNG</b></h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Masyarakat</span>
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

                    <?php
                    include 'koneksi.php';
                    $db = new prasetyo();
                    $db->connectMySQL();

                    if (isset($_POST['simpan'])) {
                        $foto    = $_FILES['foto']['name'];
                        $id     = $_POST['id'];
                        $tgl    = date("Y-m-d H:i:s");
                        $nik    = $_POST['nik'];
                        $nama   = $_POST['nama'];
                        $isi    = $_POST['isi'];
                        $status = $_POST['status'];
                        $db->upload($id, $tgl, $nik, $nama, $isi, $foto, $status);
                    }
                    ?>

                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Pengaduan</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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

                    <body>
                        <div class="mx-auto">
                            <div class="card">
                                <div class="card-header text-white bg-dark">
                                    Masukkan Pengaduan
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="id" class="col-sm-2 col-form-label">Id Pengaduan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="id" value="<?php echo $db->kode(); ?>" name="id" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="tgl" class="col-sm-2 col-form-label">Tanggal Pengaduan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tgl" value="<?php echo date('d-m-Y'); ?>" name="tgl" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nik" class="col-sm-2 col-form-label">Nik</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $user["nik"]; ?>" placeholder="Nik" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user["nama"]; ?>" placeholder="Nama" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="isi" class="col-sm-2 col-form-label">Isi Laporan</label>
                                            <div class="col-sm-10">
                                                <p><textarea type="text" class="form-control" id="isi" name="isi" placeholder="Laporan" required></textarea></p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="foto" name="foto" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="kodetarif" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="status" value="0" name="status" readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            <a href="pengaduan.php"><input type="submit" name="simpan" value="Lapor" class="btn btn-success"></a>
                                            <input type="hidden" name="direktori" id="direktori" value="gambar" />
                                            <a href="inputpengaduan.php"><button type="button" class="btn btn-danger">Reset</button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                            <h5 class="modal-title" id="exampleModalLabel"><b>Profil |&ensp;<?php echo $user["username"]; ?></b></h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body"><b>Nik :<?php echo $user["nik"]; ?></b></div>
                        <div class="modal-body"><b>Nama :<?php echo $user["nama"]; ?></b></div>
                        <div class="modal-body"><b>Jenis Kelamin :<?php echo $user["jk"]; ?></b></div>
                        <div class="modal-body"><b>Alamat :<?php echo $user["alamat"]; ?></b></div>
                        <div class="modal-body"><b>No Telp :<?php echo $user["telp"]; ?></b></div>
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