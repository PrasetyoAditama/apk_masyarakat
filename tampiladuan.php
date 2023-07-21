<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 1050px
        }

        .card {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-dark">
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
							
                            if(isset($_POST['simpan']))
                            {
                                $id      =$_POST['id'];
                                $tgl     =$_POST['tgl'];
	                            $nik     =$_POST['nik'];
	                            $nama    =$_POST['nama'];
								$isi     =$_POST['isi'];
								$status  =$_POST['status'];
	                            
	                            $db->updateData1($id,$tgl,$nik,$nama,$isi,$status);
                            }
						
							?>


                        <?php                            
                        
                       
                        $arrayData = $db->tampilall();
                        $i = 1;
                        foreach ($arrayData as $data) {
                            $id      = $data['Id_pengaduan'];
                            $tgl     = $data['Tgl_pengaduan'];
                            $nik   = $data['Nik'];
                            $nama  = $data['Nama'];
							$isi   = $data['Isi_laporan'];
                            $foto   = $data['Foto'];
                            $status  = $data['Status'];
                        ?>
                        <tr>
                            <th scope="data"><?php echo $i++ ?></th>
                            <td scope="row"><?php echo $id ?></td>
                            <td scope="row"><?php echo $tgl ?></td>
                            <td scope="row"><?php echo $nik ?></td>
                            <td scope="row"><?php echo $nama ?></td>
							<td scope="row"><?php echo $isi ?></td>
							<td align="center"><img src="gambar/<?php echo $data['Foto']; ?>"width="80" height="80"></td>
							<td scope="row"><?php echo $status ?></td>
                            <td scope="row">
                        
                            </td>
                        </tr>
						
<div class="modal fade modal-lg" id="edit<?php echo $id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php $_SERVER['PHP_SELF']?>?op=Update" method="post" >
					<div class="mb-3 row">
						<label for="id" class="col-sm-2 col-form-label">Id Pengaduan</label>
						<div class="col-sm-10">
							<input type="text"  class="form-control" id="id" name="id" 
							value="<?php echo $db->bacaData1('Id_pengaduan',$id);?>" readonly>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="tgl" class="col-sm-2 col-form-label">Tanggal Pengaduan</label>
						<div class="col-sm-10">
							<input type="date"  class="form-control" id="tgl" name="tgl" 
							value="<?php echo $db->bacaData1('Tgl_pengaduan',$id);?>" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nik" class="col-sm-2 col-form-label">Nik</label>
						<div class="col-sm-10">
							<input type="text"  class="form-control" id="nik" name="nik" 
							value="<?php echo $db->bacaData1('Nik',$id);?>" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="nama" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text"  class="form-control" id="nama" name="nama" 
							value="<?php echo $db->bacaData1('Nama',$id);?>" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="isi" class="col-sm-2 col-form-label">Isi Laporan</label>
						<div class="col-sm-10">
							<textarea type="text" class="form-control" name="isi"><?php echo $db->bacaData1('Isi_laporan',$id);?></textarea>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="kodetarif" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-10">
							<input type="text"  class="form-control" id="status" 
							value="Proses" name="status" readonly>
						</div>
					</div>
					<div class="col-12">
						<a href="tampilpengaduan2.php"><input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"></a>
						<input type="hidden" name="direktori" id="direktori" value="gambar"	/>
						<a href="tampilpengaduan2.php"><button type="button" class="btn btn-secondary">Kembali</button></a>
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