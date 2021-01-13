<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	
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
	
	<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/ui/4.7.1/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.7.1/firebase-ui-auth.css" />

    <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyDOmItKUAnSIk3l47vVpyk9B4uQEknHytE",
          authDomain: "chatappntu.firebaseapp.com",
          projectId: "chatappntu",
          storageBucket: "chatappntu.appspot.com",
          messagingSenderId: "510940698531",
          appId: "1:510940698531:web:6e37350055e5fa9d3bec16",
          measurementId: "G-3T2MHNC7DF"
      };
      firebase.initializeApp(config);
  </script>

</head>
<header>
	<img src="/wogomin/public/images/user/logo.png" alt="logo" id="logo">
</header>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-12" id="fom1">
				<img src="/wogomin/public/images/user/bs.png" id="hinhleft1">
			</div>
			<div class="col-md-4 col-12">

				<form action="" method="post" id="khung" onsubmit="return false">

					<div id="hinh2">
						<a href="./login"><i class="fa fa-arrow-left" id="back"></i></a>
						<div class="d-flex">
							<h3 id="cap"><b>Welcome to Wogomin</b></h3>	
							<div class="input-icons"> 
								<select id="sdt">
									<option>+84</option>
								</select>
								<input class="input-field" type="text" name="phone" placeholder="Phone number"> 
							</div> 
							<small id="phoneE"></small>
							<div class="input-icons"> 
								<input class="input-field" type="password" name="pass" id="password" placeholder="Password"> 
								<i class="fa fa-eye" id="togglePassword"> </i>
							</div> 
							<small id="passE"></small>
							<div class="input-icons"> 
								<input class="input-field" type="password" name="cfpass" id="cfpassword" placeholder=" Confirm Password"> 
								<i class="fa fa-eye" id="togglecfPassword"> </i>
								<small id="cfpass"></small>
							</div> 
							<div id="ip2">
								<button type="submit" class="btn-login" id="buttonsubmit">
									Next
								</button>
							</div>
						</div>
						<div class="form-check1">

							<div id="create">
								<a href="./login" class="btn-create">Login</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/wogomin/public/vendor/jquery/jquery.min.js"></script>
	<script src="/wogomin/public/vendor/bootstrap/js/popper.js"></script>
	<script src="/wogomin/public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/wogomin/public/vendor/select2/select2.min.js"></script>
	<script src="/wogomin/public/vendor/tilt/tilt.jquery.min.js"></script>
	<script src="/wogomin/public/js/user/md5.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script>
		// function show password here

		function isPhone(phone) {
			return /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/.test(phone);
		}
		function isPass(pass) {
			return /"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"/.test(pass);
		}
		function iscfPass(cfpass) {
			return /"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"/.test(cfpass);
		}
		$('#buttonsubmit').on('click', function () {
			var phoneValue = $('input[name=phone]').val();
			var passValue = $('input[name=pass]').val();
			var cfpassValue = $('input[name=cfpass]').val();

			$.post("/wogomin/home/checkPhoneNumber", { 
	     		phoneNumber: phoneValue
	     	}, function(data) {
	     		// swal(data);
		        if (data == 1) {
		        	// swal('Welcome back');
		//         	document.cookie = "phone=" + phoneValue;
		//         	document.cookie = "password=" + passValue;

		//         	if (!document.cookie.split('; ').find(row => row.startsWith('doSomethingOnlyOnce'))) {
  //   document.cookie = "doSomethingOnlyOnce=true; expires=Fri, 31 Dec 9999 23:59:59 GMT";
  // }

		        	// swal(document.cookie);
	                window.location.href = "./verify/?phone=" + phoneValue + "&password=" + md5(passValue);
                } else {
                	swal({
                		title: "Error",
                		text: "This phone number has been used",
                		icon: "error",
                		button: "OK",
                	});
                }
			});

			// if (phoneValue == '') {
			// 	$("#phoneE").text("Please fill in this field");
			// 	return false;
			// } else {
			// 	if (!isPhone(phoneValue)) {
			// 		$("#phoneE").text("Enter the phone number in the correct format");
			// 		return false;
			// 	} else {
			// 		$("#phoneE").text("");
			// 	}
			// }

			// if (passValue == '') {
			// 	$("#passE").text("Password required");
			// 	return false;
			// } else {
			// 	if (!isPass(passValue)) {
			// 		$("#passE").text("Wrong password");
			// 		return false;
			// 	} else {
			// 		$("#passE").text("");
			// 	}
			// }
			// if (passValue == '') {
			// 	$("#cfpass").text("Confirm Password required");
			// 	return false;
			// } else {
			// 	if (!iscfPass(passValue)) {
			// 		$("#cfpass").text("Wrong with password");
			// 		return false;
			// 	} else {
			// 		$("#cfpass").text("");
			// 	}
			// }
			// if (  phoneValue != "" && passValue != ""  && cfpassValue != "" ) {
				// var form_data = new FormData();
				// form_data.append('phone', phoneValue); 
				// form_data.append('pass', passValue);
				// form_data.append('cfpass', cfpassValue);   
			// }
		});
	</script>
</body>
</html>