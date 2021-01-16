<?php 
    if(!isset($_SESSION['user'])){
      header("Location: home/login");
    } else if ($_SESSION['userName'] == '') {
      header("Location: ./setupProfile_Step_1");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/fontawesome-free/css/font-awesome.min.css">

    <link href="/wogomin/public/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Vendor CSS-->
    <!-- <link href="./public/vendor/animsition/animsition.min.css" rel="stylesheet" media="all"> -->
    <link href="/wogomin/public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/wogomin/public/css/user/profile.css" rel="stylesheet" media="all">
</head>
<body>
    <nav class="navbar navbar-light w3-black">
        <div class="container-fluid">
          	<div class="nav navbar-nav pull-left">
            	<form class="d-flex justify-content-center">
                	<input class="form-control form-control-sm ml-3" type="text" placeholder="Search"
                  aria-label="Search">
            	</form>
        	</div>
          	<div class="nav navbar-nav auto">
              	<a class="nav-link" href="./index"><img src="/wogomin/public/images/user/wogomin.png"></a>
          	</div>
          	<div class="nav navbar-expand-sm navbar-nav pull-right">
            	<ul class="navbar-nav mr-auto">
                	<li class="nav-item">
                  		<a class="nav-link" href="./index">
                  			<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-house-door" viewBox="0 0 16 16">
                    			<path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                  			</svg>
                  		</a>
                	</li>
                	<li class="nav-item">
                  		<a class="nav-link" href="#">
                  			<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-bell" viewBox="0 0 16 16">
                    			<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                  			</svg>
                  		</a>
                	</li>
                	<li class="nav-item">
                    	<a class="nav-link" href="./payByATM">
                    		<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-wallet" viewBox="0 0 16 16">
                        		<path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
                      		</svg>
                      	</a>
                	</li>
                	<li class="nav-item" style="width: 50px;">
                  		<a class="nav-link" href="./profile"><img id="icavt" src="/wogomin/public/images/user/avt.jpg"></a>
                      <!-- <small>Hello (<?php echo $_SESSION['userName'] ?>)</small> -->
                	</li>
                  <li>
                    <a href="./login">Log out</a>
                  </li>
              	</ul>
          	</div>
        </div>
    </nav>
	<div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:60px">
		<a href="#" class="w3-bar-item "><i class="fa fa-bars" aria-hidden="true"></i></a>             
		<a href="#" class="w3-bar-item "><i class="fa fa-newspaper-o" aria-hidden="true"></i></a> 
		<a href="#" class="w3-bar-item "><i class="fa fa-commenting" aria-hidden="true"></i></a>
		<a href="#" class="w3-bar-item "><i class="fa fa-clock-o" aria-hidden="true"></i></a>
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

    <!-- Main JS-->
    <!-- <script src="/wogomin/public/js/admin/main-inpage.js"></script> -->

    <div class="wrapper-inner">
        <?php
          require_once "./mvc/user/views/includes/" . $data["page"] . ".php";
        ?>
    </div>
</body>
</html>