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
                <br>
                <a id="a-avt" href="#">Chỉnh sửa ảnh đại diện</a>
            </div>
        </div>
        <p id="info-account">Account Information</p>
        <form>
            <label for="name">Tên người dùng</label><br/>
            <input type="text" id="name" name="name"><br/>

            <label for="fname">Full Name</label><br/>
            <input type="text" id="fname" name="fname"><br/>

            <label for="location">Location</label><br/>
            <input type="text" id="location" name="location"><br/>

            <label for="email">Email</label><br/>
            <input type="email" id="email" name="email"><br/>

            <label for="phone">Phone Number</label><br/>
            <input type="text" id="phone" name="phone"><br/>
            
            <button id="save" type="button">Lưu</button>
        </form>
    </div>
</div>