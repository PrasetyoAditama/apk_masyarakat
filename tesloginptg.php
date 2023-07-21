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

class Login_petugas extends connection{
    public $id_petugas;
    public $level;

    public function __construct(){
        parent::__construct(); // call parent constructor to initialize $conn
    }

    public function signin($username, $password) {
        $conn = $this->getconnection();
        $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' OR password = '$password'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0)
        {
            if($password == $row["password"])
            {
                $this->id_petugas = $row["id_petugas"];
                $this->level 	= $row["level"];
                return 1;
                // Login successful
            }
            else{
                return 10;
                // Wrong password
            }
        }
        else{
            return 100;
            // User not registered
        }
    }

    public function idPetugas()
    {
        return $this->id_petugas;
    }

    public function levelPetugas()
    {
        return $this->level;
    }

}


class Select_petugas extends Connection{
    public function selectUserById($id_petugas){
        $result = mysqli_query($this->conn, "SELECT * FROM petugas WHERE id_petugas = $id_petugas");
        return mysqli_fetch_assoc($result);
    }
}
?>
