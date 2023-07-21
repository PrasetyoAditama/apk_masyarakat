<?php
include 'teslogin.php';
$db = new connection();

$pass = md5($_POST['password']);
$username = mysqli_escape_string($this->conn,$_POST['username']);
$password = mysqli_escape_string($this->conn,$pass);



?>