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
             <img src="/wogomin/public/images/user/bs.png" id="hinhleft1">
         </div>
         <div class="col-md-4 col-12">

          <form action="login.php" method="post" id="khung" onsubmit="return false">

              <div id="hinh2">
                  <a href="./login"><i class="fas fa-arrow-left" id="back"></i></a>
                  <div class="d-flex">
                    <small id="step">Step 1 of 2</small>
                    <h3 id="cap"><b>Your Profile</b></h3>	
                    <div class="input-icons" id="avata"> 
                        <img src="/wogomin/public/images/user/doan.JPG" alt="" id="avt">
                    </div> 
                    <div class="input-icons"> 
                        <input class="input-field" type="text" name="name" id="name" placeholder="Fullname">  
                    </i>
                </div> 
                <small id="nameE"></small>
                <div class="input-icons"> 

                    <input class="input-field" type="text" name="email" id="email" placeholder=" Email"> 
                </div> 
                <small id="emailE"></small>
                <div id="ip2">
                    <button type="submit" class="btn-login" id="buttonsubmit">Continue</button>
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

<script type="text/javascript">
    $('#buttonsubmit').click(function() {
        var fullName = $('input[name=name]').val();
        var email = $('input[name=email]').val();
        
        $.post("/wogomin/home/handling_Step_1", { 
            fullName: fullName,
            email: email
        }, function(data) {
            // swal(data);
            if (data == 1) {
                // swal('Welcome back');
                window.location.href = "./setupProfile_Step_2";
            } else {
                swal({
                    title: "Error",
                    text: "There was an error. Please try again later.",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    });
</script>
</body>
</html>