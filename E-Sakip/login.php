<?php
session_start();

require "koneksi.php";

if(!empty($_POST['usernameunit'])){
	$usernameunit = $_POST['usernameunit'];
	$passwordunit = $_POST['passwordunit'];
	$cek_login = mysqli_query($config,"SELECT * FROM unitkerja where usernameunit='$usernameunit' and passwordunit='$passwordunit'");
	if(mysqli_num_rows($cek_login) > 0){
		$data_login = mysqli_fetch_assoc($cek_login);
		$_SESSION['usernameunit'] = $usernameunit;
		$_SESSION['namaunit'] = $data_login['namaunit'];
		$_SESSION['operatorunit'] = $data_login['operatorunit'];
		if($_SESSION['operatorunit'] !== 'super_admin')
			header('Location:index.html');
		else
			header('Location:unit-index.html');
	}
	else{
	?>
	<script>
		alert("Username atau Password Salah!");
	</script>
	<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-SAKIP | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="login.php">
					<span class="login100-form-title">
						E-SAKIP
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Masukkan Username">
						<input class="input100" type="text" name="usernameunit" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Masukkan Password">
						<input class="input100" type="password" name="passwordunit" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="flex-col-c p-t-30 p-b-40">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>