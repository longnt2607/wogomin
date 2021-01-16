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
	<link rel="icon" type="image/png" href="/wogomin/public/images/admin/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/fontawesome-free/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/wogomin/public/css/user/style.css">
</head>

<body>

	<header>
		<img src="/wogomin/public/images/user/logo.png" alt="logo" id="logo">
	</header>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="hidden-after">
					<img src="/wogomin/public/images/user/bs.png" id="hinhleft">
				</div>
			</div>
			<div class="col-md-6" id="rps">
				<form action="" method="post" id="khung" onsubmit="return false">
					<div  id="hinh1">
						<div class="d-flex">
							<h3><b>Welcome back!</b></h3>	
							<div class="input-icons"> 
								<i class="fa fa-mobile icon" id="icon1"></i> 
								<select id="country-codes" onmousedown="if(this.options.length>10){this.size=10;}"  onchange='this.size=0;' onblur="this.size=0;">
									<option>+84</option>
								</select>
								<input class="input-field" type="text" name="phone" placeholder="Phone number"> 
							</div> 
							<small id="phoneE"></small>
							<div class="input-icons"> 
								<i class="fa fa-lock icon" id="icon"></i> 
								<input class="input-field" type="password" name="pass" id="password" placeholder="Password"> 
								<i class="fa fa-eye" id="togglePassword"></i>
							</div> 
							<small id="passE"></small>
							<div id="ip2">
								<button type="submit" class="btn-login" id="buttonsubmit">Login</button>
							</div>
						</div>
						<div class="form-check">
							<div id="forgot">
								<a href="./forgot"><small>Forgot password?</small></a>
							</div>
							<div id="n-member">
								<small>Don't have an account?</small>
							</div>
							<div id="create">
								<a href="./register" class="btn-create">Create account</a>
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
		// togglePassword
		$(document).ready(function() {
			const togglePassword = document.querySelector('#togglePassword');
			const password = document.querySelector('#password');
			togglePassword.addEventListener('click', function (e) {
			    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			    password.setAttribute('type', type);
			    this.classList.toggle('fa-eye-slash');
			});

		    $.ajax({
		        type: "GET",
		        url: "/wogomin/public/data/country-codes.json",
		        dataType: "text",
		        success: function(data) {
		        	var data = JSON.parse(data);
		        	for (var i = data.length - 1; i >= 0; i--) {
		        		// console.log(data[i].dial_code);

		        		var node = document.createElement("option");
						var textnode = document.createTextNode(data[i].dial_code);
						node.appendChild(textnode);
						document.getElementById("country-codes").appendChild(node);
		        	}
		        },
		        error: function (e) {
		        	console.log(e);
		        }
		     });
		});

		function isPhone(phone) {
			return /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/.test(phone);
		}

		function isPass(pass) {
			return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(pass);
		}

		$('#buttonsubmit').click(function() {
			var phoneValue = $('input[name=phone]').val();
			var passValue = $('input[name=pass]').val();
			// console.log(phoneValue + passValue);

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

	        if (passValue == '') {
	            $("#passE").text("Password required");
	            return false;
	        } else {
	            if (!isPass(passValue)) {
	                $("#passE").text("Wrong password");
	                return false;
	            } else {
	                $("#passE").text("");
	            }
	        }

	        if (phoneValue != '' && passValue != '') {
	     		$.post("/wogomin/home/loginAccount", { 
		     		phoneNumber: phoneValue,
		     		password: passValue
		     	}, function(data) {
		     		// swal(data);
			        if (data == 1) {
			        	// swal('Welcome back');
		                window.location.href = "./index"; // homepage.php
	                } else {
	                	swal({
	                		title: "Error",
	                		text: "Your phone number or your password is not correct",
	                		icon: "error",
	                		button: "OK",
	                	});
	                }
				});
	     	}
		});
	</script>
</body>

</html>