<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/ui/4.7.1/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.7.1/firebase-ui-auth.css" />

    <link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/fontawesome-free/css/font-awesome.min.css">
    <link href="/wogomin/public/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/wogomin/public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<link rel="stylesheet" type="text/css" href="/wogomin/public/css/user/payment.css">
	<title>Document</title>
</head>
<body>
	<div class="p-3">
		<div id="option" class="d-flex mt-3 mb-3">
			<div id="QR-item" class="option-item text-center ml-3 p-2">
				<a href="./payByQR">
					<div class="item-header">
						<img class="h-100" src="/wogomin/public/images/user/qr-code [Converted].png">
					</div>
					<div class="item-content w-100">
						<span>QR Code</span>
					</div>
					<div class=" d-flex justify-content-center">
						<div class="arrow-down">
						</div>
					</div>
				</a>
			</div>
			<div id="ATM-item" class="option-item text-center ml-3 p-2">
				<a href="./payByATM">
					<div class="item-header">
						<img class="h-100" src="/wogomin/public/images/user/CARD READER 3 [Converted].png">
					</div>
					<div class="item-content w-100">
						<span>ATM Online</span>
					</div>
					<div class=" d-flex justify-content-center">
						<div class="arrow-down">
						</div>
					</div>
				</a>
			</div>
			<div id="card-item" class="option-item text-center ml-3 p-2">
				<a href="./payByCard">
					<div class="item-header">
						<img class="h-100" src="/wogomin/public/images/user/CARD READER 4[Converted].png">
					</div>
					<div class="item-content w-100">
						<span>Mobile Card</span>
					</div>
					<div class=" d-flex justify-content-center">
						<div class="arrow-down">
						</div>
					</div>
				</a>
			</div>
		</div>
		<div id="QR" class="payment w-100 m-0 p-3">
			<h3>Payment via QR Code</h3>
			<hr>
			<div class="row">
				<div class="col-md-5">
					<form action="" method="post">
						<select name="" id="" class="">
							<option value="">Choose the amount to deposit *</option>
						</select>
						<div id="reCAPTCHA"></div>
						<button class="btn btn-confirm">Confirm Payment</button>
					</form>
				</div>
				<div class="col-md-6">
					<li>Payment for by QR code on Mobile Banking of banks</li>
					<li>See instructions for scanning QR with <span class="text-blue">AGRIBANK</span></li>
					<li>See instructions for scanning QR with <span class="text-blue">VIETINBANK</span></li>
					<li>See instructions for scanning QR with <span class="text-blue">TP BANK</span></li>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/wogomin/public/vendor/jquery/jquery.min.js"></script>
    <script src="/wogomin/public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/wogomin/public/vendor/slick/slick.min.js"></script>
    <script src="/wogomin/public/vendor/wow/wow.min.js"></script>
    <script src="/wogomin/public/vendor/animsition/animsition.min.js"></script>
    <script src="/wogomin/public/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/wogomin/public/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/wogomin/public/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="/wogomin/public/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/wogomin/public/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/wogomin/public/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/wogomin/public/vendor/select2/select2.min.js"></script>
    <script src="/wogomin/public/js/user/md5.min.js"></script>

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
	<script type="text/javascript">
		window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('reCAPTCHA', {
			'callback': (response) => {
			// reCAPTCHA solved, allow signInWithPhoneNumber.
			// ...
			},
			'expired-callback': () => {
			// Response expired. Ask user to solve reCAPTCHA again.
			// ...
			}
		});
		window.recaptchaVerifier.render();
	</script>
</body>
</html>