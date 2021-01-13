<div class="row">
    <div class="profile col-4">
        <table id="tb-profile">
            <tr>
                <td id="td-profile" class="active"><a id="a-profile" href="./changeProfile">Chỉnh sửa trang cá nhân</a></td>
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
    <form method="" action="">
        <label for="name">Mật khẩu cũ</label><br/>
        <input type="password" id="old-password" name="password"><br/>
        <label for="name">Mật khẩu mới</label><br/>
        <input type="password" id="new-password" name="password"><br/>
        <label for="name">Xác nhận mật khẩu mới</label><br/>
        <input type="password" id="new-password" name="password"><br/>
        <a id="forgotpass" href="#">Quên mật khẩu?</a>
        <button id="changepass" type="button">Đổi mật khẩu</button>
    </form>
</div>
</div>