<?php
require 'teslogin.php';
if(!empty($_SESSION["nik"])){
	header("");
}

$login=new Login();
if(isset($_POST["submit"])){
	$result=$login->signin($_POST["username"],$_POST["password"]);
	
	if($result ==1){
		$_SESSION["Login"]=true;
		$_SESSION["nik"]=$login->Nikuser();
		
		if($_SESSION["level"]=="admin"){
			header("location:dashboarduser.php");
		}
		elseif($_SESSION["level"]=="petugas"){
			header("Location:dashboarduser.php");
		}
		else{
			header("Location:dashboarduser.php");
		}
	}
	elseif($result == 10){
		echo "<script>alert('Wrong Password');</script>";
	}
	elseif($result == 100){
		echo "<script>alert('User Not Registered');</script>";
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}

		body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			background: #0000CD;
		}

		.container {
			width: 100;
			display: flex;
			max-width: 850px;
			background: #fff;
			border-radius: 15px;
			box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
		}

		.login {
			width: 600px;
		}

		form {
			width: 230px;
			margin: 60px auto;
		}


		hr {
			border-top: 2px solid #0000CD;
		}

		h5 {
			text-align: center;
			margin: 10px;
			font-size: larger;
			font-weight: bolder;
			text-transform: uppercase;

		}

		.right img {
			width: 500px;
			height: 100%;
			border-top-right-radius: 20px;
			border-bottom-right-radius: 20px;
		}

		form label {
			display: block;
			font-size: 15px;
			font-weight: 600;
		}

		input {
			width: 100%;
			margin: 2px;
			border: none;
			outline: none;
			padding: 8px;
			border-radius: 5px;
			border: 1px solid gray;
		}

		button {
			border: none;
			outline: none;
			padding: 10px;
			width: 233px;
			color: white;
			font-size: 16px;
			cursor: pointer;
			margin-top: 20px;
			border-radius: 5px;
			background: #0000CD;
		}

		button:hover {
			background: rgba(0, 0, 205, 1);
		}

		@media (max-width: 880px) {
			.container {
				width: 100%;
				max-width: 750px;
				margin-left: 20px;
				margin-right: 20px;
			}

			form {
				width: 300px;
				margin: 20px auto;
			}

			.login {
				width: 400px;
				padding: 20px;
			}

			button {
				width: 100%;
			}

			.right img {
				width: 100%;
				height: 100%;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="login">
			<form class="" action="" method="post" autocomplete="off">
				<h3>Aplikasi Pelaporan Pengaduan Masyarakat</h3>
				<hr>
				<h5>Login Masyarakat/Warga</h5>
				<label for="">Username</label>
				<input type="text" name="username" required value="" placeholder="Username">
				<label for="">Password </label>
				<input type="password" name="password" required value="" placeholder="Password">
				<button type="submit" name="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; Prasetyo Aditama 2023</p>

			</form>
		</div>
		<div class="right">
			<img src="image/human2.png" alt="">
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>