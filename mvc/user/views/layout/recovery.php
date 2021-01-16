
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
  <link rel="stylesheet" type="text/css" href="/wogomin/public/css/user/input-verify.css">

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

      <body>
        <header><img src="/wogomin/public/images/user/logo.png" alt=""></header>
        <div class="container">

          <div class="row">
            <div class="col-md-6">
              <div class="hidden-after">
                <img src="/wogomin/public/images/user/bs.png" id="hinhleft">
              </div>
            </div>
            <div class="col-md-6" id="rps">
              <form action="" method="post" id="khung" onsubmit="return false">

                <div id="hinh2">
                  <a href="http://localhost/wogomin/home/forgot"><i class="fa fa-arrow-left" id="back"></i></a>
                  <div class="d-flex">
                    <h3 id="cap"><b>Recovery Password</b></h3>
                    <div id="code-member">
                      <small>Code</small>
                    </div>
                    <div class="input-icons1">
                      <section class="w-100 text-center">
                        <div class="otp-content text-center">
                        </div>
                      </section>
                    </div>
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
                    <div id="recaptcha-container"></div>
                    <div id="ip2">
                      <button type="submit" class="btn-login" id="buttonsubmit">Change Password</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="/wogomin/public/vendor/jquery/jquery.min.js"></script>
        <script src="/wogomin/public/vendor/bootstrap/js/popper.js"></script>
        <script src="/wogomin/public/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="/wogomin/public/vendor/select2/select2.min.js"></script>
        <script src="/wogomin/public/vendor/tilt/tilt.jquery.min.js"></script>
        <script type="text/javascript" src="/wogomin/public/js/user/input-verify.js"></script>
        <script>
          $('.js-tilt').tilt({
            scale: 1.1
          })
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            togglePassword.addEventListener('click', function (e) {
              const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
              password.setAttribute('type', type);
              this.classList.toggle('fa-eye-slash');
            });

            const togglecfPassword = document.querySelector('#togglecfPassword');
            const cfpassword = document.querySelector('#cfpassword');
            togglecfPassword.addEventListener('click', function (e) {
              const type = cfpassword.getAttribute('type') === 'password' ? 'text' : 'password';
              cfpassword.setAttribute('type', type);
              this.classList.toggle('fa-eye-slash');
            });
          });

          let params = new URLSearchParams(location.search);
          var phoneNumber = params.get('phone');

          window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
            "recaptcha-container", {
              size: "invisible",
              callback: function(response) {
                  // submitPhoneNumberAuth();
                }
              }
          );

          firebase.auth().signInWithPhoneNumber("+84"+phoneNumber, window.recaptchaVerifier)
          .then((confirmationResult) => {
            window.confirmationResult = confirmationResult;
          }).catch((error) => {
            swal("Can not send message, please try it later.");
          });

          $('#buttonsubmit').on('click', function () {
            
            var inputValues = $('.otp').map(function() {
              return $(this).val();
            }).toArray().toString();
            inputValues = inputValues.replace(/,/g, "");

            window.confirmationResult.confirm(inputValues)
            .then(function(result) {
              var passValue = $('input[name=pass]').val();
              var cfpassValue = $('input[name=cfpass]').val();

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

              if (cfpassValue == '') {
                $("#cfpass").text("Confirm password required");
                return false;
              } else {
                if (cfpassValue != passValue) {
                  $("#cfpass").text("Confirm password wrong");
                  return false;
                } else {
                  $("#cfpass").text("");
                }
              }

              if (passValue != '' && cfpassValue != '') {
                let params = new URLSearchParams(location.search);
                var phoneNumber = params.get('phone');
                $.post("/wogomin/home/renewPassword", { 
                  phoneNumber: phoneNumber
                }, function(data) {
                  // swal(data);
                  if (data == 1) {
                    // swal('Welcome back');
                    swal({
                      title: "Congratulations",
                      text: "Your password has been update. Please login now.",
                      icon: "success",
                      button: "Login",
                    })
                    .then((value) => {
                      window.location.href = "http://localhost/wogomin/home/login";
                    });
                    // window.location.href = "./index"; // homepage.php
                  } else {
                    swal({
                      title: "Error",
                      text: "There was an error. Please try again later",
                      icon: "error",
                      button: "OK",
                    });
                  }
                });
              }
            }).catch(function(error) {
              swal({
                title: "Error",
                text: "OTP code not correct",
                icon: "error",
                button: "OK",
              });
                // swal(error.message);
            });
          });
        </script>

      </body>

      </html>