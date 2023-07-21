<?php
class prasetyo{
	var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $dbname = "pengaduan_masyarakat";
	var $koneksi ="";
	
	function __construct(){
		$this->koneksi=mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);
		if(mysqli_connect_errno()){
			echo"Koneksi gagal:".mysqli_connect_error();
		}
		
	}
	function connectMySQL(){
		$koneksi=mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);
		if(!$koneksi){
			die("Koneksi gagal:".mysqli_connect_error());
		}
	}
	function addData1($id,$tgl,$nik,$nama,$isi,$foto,$status){
		$query="INSERT INTO pengaduan(Id_pengaduan,Tgl_pengaduan,Nik,Nama,Isi_laporan, Foto, Status)
		        VALUES('$id','$tgl','$nik','$nama','$isi','$foto','$status')";
		$hasil=mysqli_query($this->koneksi,$query);
        if($hasil)echo"<script>
		alert('Laporan sukses');
		header('location:inputpengaduan.php');
		    </script>";
        else echo "gagal";		
	}
	function upload($id,$tgl,$nik,$nama,$isi,$foto,$status){
	$tipe =$_FILES['foto']['type'];
	if(	$tipe != "image/jpg" AND
		$tipe != "image/jpeg" AND
		$tipe != "image/pjpeg" AND
		$tipe != "image/png" AND
		$tipe != "image/gif"
		)
	echo '<p><b>Upload Gagal</b></p>
		<p>Tipe file yang diperbolehkan jpg, jpeg, pjpeg, png atau gif.</p>
		<p><a href="inputpengaduan.php">ULANGI</p></p>';	
		
	
		
		$direktori="gambar/";
			//upload gambar
			move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$foto);
			
			//simpan data gambar
			mysqli_query($this->koneksi,"INSERT INTO pengaduan VALUES 
			                          ('$id', '$tgl', '$nik', '$nama','$isi','$foto','$status')")or die(mysqli_error($this->koneksi));
			echo"<script>
		alert('Simpan data sukses');
		header('location:inputpengaduan.php');
		    </script>";
		
	}
	function tanggapan($idtgp,$idpgn,$tgl,$tgp,$idptg,$status){
		$query="INSERT INTO tanggapan(Id_tanggapan,Id_pengaduan,Tgl_tanggapan,Tanggapan,Id_petugas,Status)
		        VALUES('$idtgp','$idpgn','$tgl','$tgp','$idptg','$status')";
		$hasil=mysqli_query($this->koneksi,$query);
        if($hasil)echo"<script>
		alert('Tanggapan sukses');
		header('location:tanggapan.php');
		    </script>";
        else echo "gagal";		
	}
	function tampilData1(){
		$query=mysqli_query($this->koneksi,"SELECT *FROM pengaduan WHERE Status='0' ");
		$data=[];
		while($row=mysqli_fetch_array($query))
			$data[]=$row;
		return $data;
	}
	function tampilData2(){
		$query=mysqli_query($this->koneksi,"SELECT *FROM pengaduan WHERE Status='Proses' ");
		while($row=mysqli_fetch_array($query))
			$data[]=$row;
		return $data;
	}
	function tampilall(){
		$query=mysqli_query($this->koneksi,"SELECT *FROM pengaduan");
		while($row=mysqli_fetch_array($query))
			$data[]=$row;
		return $data;
	}
	function tampilDatanik($nik){
		$query=mysqli_query($this->koneksi,"SELECT * FROM pengaduan WHERE Nik='$nik' ");
		while($row=mysqli_fetch_array($query))
			$data[]=$row;
		return $data;
	}
	function tampilData3(){
		$query=mysqli_query($this->koneksi,"SELECT * FROM tanggapan Id");
		while($row=mysqli_fetch_array($query))
			$data[]=$row;
		return $data;
	}
	function tampilData4($nik){
		$query=mysqli_query($this->koneksi,"SELECT * FROM tanggapan WHERE Nik='$nik'");
		while($row=mysqli_fetch_array($query))
			$data[]=$row;
		return $data;
	}
	function updateData1($id,$tgl,$nik,$nama,$isi,$status){
		$query="UPDATE pengaduan SET Id_pengaduan='$id',Tgl_pengaduan='$tgl',Nik='$nik',Nama='$nama',Isi_laporan='$isi',Status='$status' WHERE Id_pengaduan='$id'";
		mysqli_query($this->koneksi,$query);
		echo"<script>
		alert('Verifikasi sukses');
		header('location:tampilpengaduan.php');
		    </script>";
	}
	function updateData2($id,$status){
		$query="UPDATE pengaduan SET Status='$status'WHERE Id_pengaduan='$id'";
		mysqli_query($this->koneksi,$query);
		
	}
	function hapusData1($id){
		$query=mysqli_query($this->koneksi,"DELETE FROM pengaduan WHERE Id_pengaduan='$id'");
		echo"<script>
		alert('Hapus laporan sukses');
		header('location:tes.php');
		    </script>";
	}
	function kode(){
		$query = mysqli_query($this->koneksi, "SELECT max(Id_pengaduan) as kodeTerbesar FROM pengaduan");
$data = mysqli_fetch_array($query);
$kode = $data['kodeTerbesar'];
 
$urutan = (int) substr($kode, 2, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
$huruf = "P";
$kode = $huruf . sprintf("%03s", $urutan);
echo $kode;
		
	}
	function codetgp(){
		$query = mysqli_query($this->koneksi, "SELECT max(Id_tanggapan) as kodeTerbesar FROM tanggapan");
$data = mysqli_fetch_array($query);
$kode = $data['kodeTerbesar'];
 
$urutan = (int) substr($kode, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
$huruf = "TGP";
$kode = $huruf . sprintf("%02s", $urutan);
echo $kode;
	}
	function bacaData1($field,$id){
		$query="SELECT *FROM pengaduan WHERE id_pengaduan='$id'";
		$hasil=mysqli_query($this->koneksi,$query);
		$data=mysqli_fetch_array($hasil);
		if($field=='id_pengaduan')
			return $data['id_pengaduan'];
   else if($field=='tgl_pengaduan')
	        return $data['tgl_pengaduan'];
   else if($field=='nik')
	        return $data['nik'];
   else if($field=='nama')
	        return $data['nama'];
   else if($field=='isi_laporan')
	        return $data['isi_laporan'];
   else if($field=='foto')
	        return $data['foto'];
   else if($field=='status')
	        return $data['status'];
	}
	function inputpetugas($id_petugas, $nama_petugas, $username, $password, $telp, $level)
	{ 
		$query = "INSERT INTO petugas (id_petugas, nama_petugas, username, password, telp, level)
					VALUES ('$id_petugas', '$nama_petugas', '$username', '$password', '$telp', '$level')";
		$data = mysqli_query($this->koneksi, $query);
		if ($data)
			echo "<script> 
			alert('Data petugas berhasil dibuat');
			header('location:test.php');
			</script>";
	}

	function tampilpetugas()
	{ //function tampil
		$query = mysqli_query($this->koneksi, "SELECT * FROM petugas order by id_petugas");
		while ($row = mysqli_fetch_array($query))
			$data[] = $row;
		return $data;
	}

	function updatepetugas($id_petugas, $nama_petugas, $username, $password, $telp, $level)
	{ //function update
		$query = 	"UPDATE petugas SET nama_petugas = '$nama_petugas', username = '$username',
						password = '$password', telp = '$telp', level = '$level' WHERE petugas.id_petugas = '$id_petugas'";
		$data = mysqli_query($this->koneksi, $query);
		if ($data)echo "<script> 
		alert('Data petugas berhasil diupdate');
		header('location:test.php');
		</script>";
	}

	function hapuspetugas($id_petugas)
	{ //function hapus
		$query = mysqli_query($this->koneksi, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");
		if ($query) echo "<script> 
		alert('Data petugas berhasil dihapus');
		header('location:test.php');
		</script>";
	}
}
?>