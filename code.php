<?php
 
$koneksi=mysqli_connect("localhost","root","","pengaduan_masyarakat");

$query = mysqli_query($koneksi, "SELECT max(id_tanggapan) as kodeTerbesar FROM tanggapan");
$data = mysqli_fetch_array($query);
$kode = $data['kodeTerbesar'];
 
$urutan = (int) substr($kode, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
$huruf = "T";
$kode = $huruf . sprintf("%02s", $urutan);
echo $kode;

?>