<?php

include 'koneksi.php';
                        $db = new prasetyo();
                        $db->connectMySQL();
//aksi upload

if($_GET['act']=='simpan'):
	$tipe =$_FILES['foto']['type'];
	if(	$tipe != "image/jpg" AND
		$tipe != "image/jpeg" AND
		$tipe != "image/pjpeg" AND
		$tipe != "image/png" AND
		$tipe != "image/gif"
		)
	echo '<p><b>Upload Gagal</b></p>
		<p>Tipe file yang diperbolehkan jpg, jpeg, pjpeg, png atau gif.</p>
		<p><a href="pengaduan.php">ULANGI</p></p>';	
		
	else{	
		$foto	=$_FILES['foto']['name'];
		$id     = $_POST['id'];
		$tgl    = date("Y-m-d H:i:s");
		$nik    = $_POST['nik'];
		$nama   = $_POST['nama'];
		$isi    = $_POST['isi'];
		$status = $_POST['status'];
		
		$direktori="gambar/";
			//upload gambar
			move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$foto);
			
			//simpan data gambar
			mysqli_query($db->koneksi,"INSERT INTO pengaduan VALUES 
			                          ('$id', '$tgl', '$nik', '$nama','$isi','$foto','$status')")or die(mysqli_error($db->koneksi));
			echo"<script>
		alert('Simpan data sukses');
		header('location:tes.php');
		    </script>";
			header('location:pengaduan.php');
		}
		
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<title>User</title>
	<style>
	body{
		background-repeat: no-repeat;
		backgorund-attachment: fixed;
		background-size: 100% 100%;
	}
	
	.satu{
		font-size:25px;
	}
	.dua{
		font-size:27px;
	}
	.tiga{
		font-size:15px;
	}
	</style>
</head>
<body background="gambar/SAVE_20220907_105946.jpg">


<br>
<br>
 <center> 
 <a href="pengaduan.php"><button type="button" class="btn btn-danger">Kembali</button></a>
 <font color="white">
<p class="satu">Welcome Admin 
<br>
<br>

<p class="dua">Selamat Datang di Website Pembayaran Listrik Pascabayar</p>
<p class="dua">Manfaatkan Semua Layanan Kami Untuk </p>
<p class="dua">Membantu Anda Melakukan Transaksi PLN dengan efisien</p>
</font
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<p class="tiga">&copy;Prasetyo Aditama 2023</p>
</center>