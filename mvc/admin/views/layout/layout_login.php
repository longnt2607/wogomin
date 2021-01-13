<?php 
  session_destroy();
  session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../public/images/admin/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/vendor/fontawesome-free/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../public/css/admin/util.css">
	<link rel="stylesheet" type="text/css" href="../public/css/admin/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../public/images/admin/img-01.png" alt="IMG">
				</div>

				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Wogomin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="submit" value="Login" class="login100-form-btn">

						
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="../public/vendor/jquery/jquery.min.js"></script>
	<!--===============================================================================================-->
	<script src="../public/vendor/bootstrap/js/popper.js"></script>
	<script src="../public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../public/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../public/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="../public/js/admin/main.js"></script>

</body>

</html>

<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$mang = json_decode($data["lg"]);
foreach($mang as $m){
	
		if($username  == $m->username && md5($password)  == $m->password){

			$_SESSION['user']  = $username;
			header("Location: ./index");
			
}
}
?>