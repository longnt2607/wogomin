<div class="row">
    <div class="profile col-4">
        <table id="tb-profile">
            <tr>
                <td id="td-profile" class="active"><a id="a-profile" href="./editProfile">Chỉnh sửa trang cá nhân</a></td>
         </tr>
         <tr>
            <td id="td-profile"><a id="a-profile" href="./changePassword">Đổi mật khẩu</a></td>
        </tr>
        <!-- <tr>
            <td id="td-profile"><a id="a-profile" href="#">Mật khẩu</a></td>
        </tr> -->
    </table>
</div>
<div class="avt col-8">
    <div class="row">
        <div class="col-2">
            <img id="avatar" src="/wogomin/public/images/user/avt.jpg">
        </div>
        <div class="info-avt col-10">
            Sebastian
        </div>
    </div>
    <p id="info-account">Change Password</p>
    <form method="post" action="" onsubmit="return false">
        <label for="name">Mật khẩu cũ</label><br/>
        <input type="password" id="oldpassword" name="password">
        <small id="oldPassE" class="text-danger"></small>
        <br/>

        <label for="name">Mật khẩu mới</label><br/>
        <input type="password" id="newpassword" name="password">
        <small id="newPassE" class="text-danger"></small>
        <br/>

        <label for="name">Xác nhận mật khẩu mới</label><br/>
        <input type="password" id="cfpassword" name="password">
        <small id="cfPassE" class="text-danger"></small>
        <br/>

        <a id="forgotpass" href="./forgot">Quên mật khẩu?</a>
        <button id="changepass" type="button">Đổi mật khẩu</button>
    </form>
</div>
</div>

<script type="text/javascript">
    $('#changepass').on('click', function () {
        var oldPassword = $('#oldpassword').val();
        var newPassword = $('#newpassword').val();
        var cfPassword = $('#cfpassword').val();

        if (oldPassword == '') {
            $('#oldPassE').text('Please fill in this field');
            return false;
        } else {
            oldPassword = md5(oldPassword);
            $('#oldPassE').text('');
        }

        if (newPassword == '') {
            $('#newPassE').text('Please fill in this field');
            return false;
        } else {
            newPassword = md5(newPassword);
            $('#newPassE').text('');
        }

        if (cfPassword == '') {
            $('#cfPassE').text('Please fill in this field');
            return false;
        } else {
            cfPassword = md5(cfPassword);
            $('#cfPassE').text('');
        }
        // swal(oldPassword + " " + newPassword);

        if (newPassword != cfPassword) {
            swal({
                title: "Error",
                text: "Your confirm password is not correct",
                icon: "error",
                button: "OK",
            });
        } else {
            $.post("/wogomin/home/updatePassword", { 
                oldPass: oldPassword,
                newPass: newPassword
            }, function(data) {
                // swal(data);
                switch(data) {
                    case '0':
                        swal({
                            title: "Error",
                            text: "There was an error. Please try again later",
                            icon: "error",
                            button: "OK",
                        });
                        break;
                    case '1':
                        swal({
                            title: "Congratulations",
                            text: "Your password has been saved.",
                            icon: "success",
                            button: "OK",
                        })
                        .then((value) => {
                            window.location.href = "./profile";
                        });
                        break;
                    case '2':
                        swal({
                            title: "Error",
                            text: "Your password is not correct",
                            icon: "error",
                            button: "OK",
                        });
                        break;
                }
            });
        }
    });
</script>