<!-- script php -->
<?php
require 'teslogin.php';

// if(!empty($_SESSION["id"]))
// {
// 	header("Location: index.php");
// }

$register = new Register();

if (isset($_POST["submit"])) {
	$result = $register->registration($_POST["nik"], $_POST["username"], $_POST["password"], $_POST["confirmpassword"]);

	if ($result == 1) {
		echo
		"<script> alert('Registrasi Berhasil'); </script>";
	} elseif ($result == 10) {
		echo
		"<script> alert('Username Tidak Tersedia'); </script>";
	} elseif ($result == 100) {
		echo
		"<script> alert('Password Tidak Sesuai'); </script>";
	} elseif ($result == 1000) {
		echo
		"<script> alert('NIK Tidak Terdaftar, Silahkan Hubungi Pejabat yang berwenang'); </script>";
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
	<title>Register</title>
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
			background: lightsteelblue;
		}

		.container {
			width: 100;
			display: flex;
			max-width: 850px;
			background: #fff;
			border-radius: 15px;
			box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
		}

		.regis {
			width: 600px;
		}

		form {
			width: 230px;
			margin: 60px auto;
		}

		/* h4 {
			margin: 20px;
			text-align: justify;
			font-weight: bolder;
			text-transform: uppercase;
		} */

		hr {
			border-top: 2px solid deepskyblue;
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

		select {
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
			background: deepskyblue;
		}

		button:hover {
			background: rgba(214, 86, 64, 1);
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

			.regis {
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
		
		<div class="regis">
			<br>
		<!-- <a href=" " class="btn btn-primary  btn-block">Menu Utama</a> -->
			<form class="" action="regis.php" method="post" autocomplete="off">
				<h3>Registrasi Akun Masyarakat</h3>
				<hr>
				<h5>Register</h5>
				<label for="">Nik </label>
				<input type="text" maxlength="12" name="nik" required value="">
				<label for="">Username </label>
				<input type="text" name="username" require value="">
				<label for="">Password </label>
				<input type="password" name="password" required value="">
				<label for="">Confirm Password </label>
				<input type="password" name="confirmpassword" required value="">
				<button type="submit" name="submit">Register</button>
				<br> <br>
				<a href="regis.php" class="btn btn-danger  btn-block width"  style="width: 233px;">Reset</a>
				<br> <br>
				<a href="login.php" class="btn btn-success  btn-block width"  style="width: 233px;">Login</a>
			</form>
		</div>
		<div class="right">
			<img src="image/human2.png" alt="">
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>