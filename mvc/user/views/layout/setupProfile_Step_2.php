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
          <img src="/wogomin/public/images/user/bs.png" id="hinhleft1">
        </div>
      </div>
      <div class="col-md-6" id="rps">

        <form action="" method="post" id="khung" onsubmit="return false">

          <div id="hinh2">
            <a href="./setupProfile_Step_1"><i class="fa fa-arrow-left" id="back"></i></a>
            <div class="d-flex">
              <small id="step">Step 2 of 2</small>
              <h3 id="cap"><b>Orther Information</b></h3>	
              <div class="input-icons" id="avata"> 
                
                <input type="radio" name="payment" id="cash" value="1" checked="checked">
                <label for="cash">
                  <i class="fa fa-male"  id="gioitinh"></i>	
                </label>

                <input type="radio" name="payment" id="card" value="0">
                <label for="card">
                  <i class="fa fa-female" id="gioitinh"></i>
                </label>
              </div> 
              <div class="input-icons"> 
                <i class="far fa-calendar-alt" id="date"></i>
                <input class="input-field" type="date" name="name" id="name" placeholder="Date of birth">  
              </div> 
              <small id="dateE"></small>
              <div class="input-icons"> 

                <input class="input-field" type="text" name="address" id="email" placeholder=" Address">
              </div> 
              <small id="addressE"></small>
              <div id="ip2">
                <button type="submit" class="btn-login" id="buttonsubmit">Done</button>
              </div>

            </div>	
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="/wogomin/public/vendor/jquery/jquery.min.js"></script>
  <!-- <script src="/wogomin/public/vendor/bootstrap/js/popper.js"></script> -->
  <script src="/wogomin/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/wogomin/public/vendor/select2/select2.min.js"></script>
  <script src="/wogomin/public/vendor/tilt/tilt.jquery.min.js"></script>

  <script type="text/javascript">
    $('#buttonsubmit').on('click', function () {
      var sex = document.getElementById('cash').checked ? '1' : '0';
      var date = $('input[type=date]').val();
      var address = $('input[name=address]').val();

      if (date == '') {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        date = today;
      }
      
      if (address == '') {
        $("#addressE").text("Please fill in this field");
        return false;
      } else {
        $("#addressE").text("");
      }

      if (address != '') {
        $.post("/wogomin/home/handling_Step_2", { 
          sex: sex,
          date: date,
          address: address
        }, function(data) {
        // swal(data);
        if (data == 1) {
            // swal('Welcome back');
            window.location.href = "./index";
          } else {
            swal({
              title: "Error",
              text: "There was an error. Please try again later.",
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