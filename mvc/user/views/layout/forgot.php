<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/wogomin/public/images/admin/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/fontawesome-free/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/css/user/style.css">

</head>
<header>
	<img src="/wogomin/public/images/user/logo.png" alt="logo" id="logo">
</header>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-12" id="fom1">
				<img src="/wogomin/public/images/user/bs.png" id="hinhleft">
			</div>
			<div class="col-md-4 col-12">
				<form action="login.php" method="post" id="khung">
					<div  id="hinh1">
						<a href="./login"><i class="fa fa-arrow-left" id="back"></i></a>
						<div class="d-flex">
							<h3 id="cap1"><b>Forgot Password</b></h3>	
							<div id="m-member">
								<a href="profile.php"><small>Please enter your number phone</small></a>
							</div>
							<div class="input-icons"> 
								<i class="fa fa-mobile icon" id="icon1"> 
								</i> 
								<select>
									<ins><option>+84</option></ins>
								</select>
								<input class="input-field" type="text" name="phone" placeholder="Phone number"> 
							</div> 
							<small id="phoneE"></small>
							<div id="ip3">
								<button type="submit" class="btn-login" id="buttonsubmit">Send</button>
							</div>
							<div class="form-check">
								<div id="create">
									<button type="submit" class="btn-create" ><a href="./login">Login</a></button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/wogomin/public/vendor/jquery/jquery.min.js"></script>
	<script src="/wogomin/public/vendor/bootstrap/js/popper.js"></script>
	<script src="/wogomin/public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/wogomin/public/vendor/select2/select2.min.js"></script>
	<script src="/wogomin/public/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script>
		$('#buttonsubmit').click(function() {
			var phoneValue = $('input[name=phone]').val();


			if (phoneValue == '') {
				$("#phoneE").text("Please fill in this field");
				return false;
			} else {
				if (!isPhone(phoneValue)) {
					$("#phoneE").text("Enter the phone number in the correct format");
					return false;
				} else {
					$("#phoneE").text("");
				}
			}
			if (  phoneValue != "" ) {
				var form_data = new FormData();
				form_data.append('phone', phoneValue); 

			}
		});
	</script>
</body>
</html>