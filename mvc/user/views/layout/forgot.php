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
			<div class="col-md-6">
				<div class="hidden-after">
					<img src="/wogomin/public/images/user/bs.png" id="hinhleft">
				</div>
			</div>
			<div class="col-md-6" id="rps">
				<form action="" method="post" id="khung" onsubmit="return false">
					<div  id="hinh1">
						<a href="./login"><i class="fa fa-arrow-left" id="back"></i></a>
						<div class="d-flex">
							<h3 id="cap1"><b>Forgot Password</b></h3>	
							<div id="m-member">
								<small>Please enter your number phone</small>
							</div>
							<div class="input-icons"> 
								<i class="fa fa-mobile icon" id="icon1"> 
								</i> 
								<select id="country-codes" onmousedown="if(this.options.length>10){this.size=10;}"  onchange='this.size=0;' onblur="this.size=0;">
									<option>+84</option>
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
		$(document).ready(function() {
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

			if (  phoneValue != "") {
				// $.post("/wogomin/home/renewPassword", { 
		  //    		phoneNumber: phoneValue
		  //    	}, function(data) {
		  //    		// swal(data);
			 //        if (data == 1) {
    //                     // swal('Welcome back');
                        window.location.href = "./recovery/?phone=" + phoneValue;
    //                     // window.location.href = "./index"; // homepage.php
    //                 } else {
    //                     swal({
    //                         title: "Error",
    //                         text: "There was an error. Please try again later",
    //                         icon: "error",
    //                         button: "OK",
    //                     });
    //                 }
				// });
			}
		});
	</script>
</body>
</html>