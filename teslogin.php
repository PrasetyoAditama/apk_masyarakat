<?php
session_start();

class connection{
	public $host   ="localhost";
	public $user   ="root";
	public $pass   ="";
	public $dbname ="pengaduan_masyarakat";
	public $conn;
	
	public function __construct(){
		$this->conn =mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);
	}
	public function getconnection(){
		return $this->conn;
	}
}

class Login extends connection{
	public $nik;
	public function signin($username,$password){
		$result=mysqli_query($this->conn,"SELECT * FROM masyarakat WHERE username ='$username'");
		$row= mysqli_fetch_assoc ($result);
		
		if(mysqli_num_rows($result)>0)
		{
			if($password ==$row["password"])
			{
				$this->nik   =$row["nik"];
				
				return 1;
			}
			else{
				return 10;
			}
		}
		else{
			return 100;
		}
	}
	public function Nikuser()
	{
		return $this->nik;
	}
}
class Register extends connection{
	public function registration($nik, $username, $password, $confirmpassword)
	{
		$conn = $this->getconnection();

		$duplicate = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username = '$username'");
		$verf = mysqli_query($conn, "SELECT * FROM masyarakat WHERE nik = '$nik'");

		if(mysqli_num_rows($duplicate)>0)
		{
			return 10; // Account already exists
		} else if (mysqli_num_rows($verf)==0) {
			return 1000;
		} else if (mysqli_num_rows($verf)==1) {
			if($password == $confirmpassword)
			{
				$query = "UPDATE masyarakat SET username = '$username', password = '$password' WHERE masyarakat.nik = '$nik'";
				$data = mysqli_query($conn, $query);
				if ($data) {
					return 1; // Registration successful
				} else {
					return 100; // Error during registration
				}
			}
			else{
				return 100; // Passwords dont match
			}
		}
	}
}

class Select extends connection{
	public function selectUserByNik($nik){
		$result=mysqli_query($this->conn,"SELECT *FROM masyarakat WHERE nik='$nik'");
		return mysqli_fetch_assoc($result);
	}
	public function tampilDatanik($nik){
		$query=mysqli_query($this->conn,"SELECT *FROM pengaduan WHERE nik='$nik' ");
		while($row=mysqli_fetch_array($query))
			$data[]=$row;
		return $data;
	}
}
?>
