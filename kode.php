<?php
 
$koneksi=mysqli_connect("localhost","root","","pengaduan_masyarakat");

$query = mysqli_query($koneksi, "SELECT max(id_pengaduan) as kodeTerbesar FROM pengaduan");
$data = mysqli_fetch_array($query);
$kode = $data['kodeTerbesar'];
 
$urutan = (int) substr($kode, 2, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
$huruf = "P";
$kode = $huruf . sprintf("%03s", $urutan);
echo $kode;

?>