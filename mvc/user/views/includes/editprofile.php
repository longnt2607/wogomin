<?php 
    $data = json_decode($data["data"]);
    foreach($data as $item) {
?>
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
                <?php echo $item->fullName; ?>
                <br>
                <a id="a-avt" href="#">Chỉnh sửa ảnh đại diện</a>
            </div>
        </div>
        <p id="info-account">Account Information</p>
        <form id="editForm">
            <label for="name">Tên người dùng</label><br/>
            <input type="text" id="name" name="name" value="<?php echo $item->fullName; ?>"><br/>

            <label for="fname">Full Name</label><br/>
            <input type="text" id="fname" name="fname" value="<?php echo $item->fullName; ?>"><br/>

            <label for="location">Location</label><br/>
            <input type="text" id="location" name="location" value="<?php echo $item->address; ?>"><br/>

            <label for="email">Email</label><br/>
            <input type="email" id="email" name="email" value="<?php echo $item->email; ?>"><br/>

            <label for="phone">Phone Number</label><br/>
            <input type="text" id="phone" name="phone" value="<?php echo $item->phone; ?>"><br/>
            
            <button id="save" type="button">Save change</button>
        </form>
    </div>
</div>
<?php } ?>

<script type="text/javascript">
    $('#save').on('click', function () {
        var name = $('#name').val();
        var fullName = $('#fname').val();
        var address = $('#location').val();
        var email = $('#email').val();
        var phone = $('#phone').val();

        $.post("/wogomin/home/updateProfile", { 
            name: name,
            fullName: fullName,
            address: address,
            email: email,
            phone: phone
        }, function(data) {
            swal(data);
            if (data == 1) {
                swal({
                    title: "Congratulations",
                    text: "Your profile information has been saved.",
                    icon: "success",
                    button: "OK",
                })
                .then((value) => {
                    window.location.href = "./profile";
                });
            } else {
                swal({
                    title: "Error",
                    text: "There was an error. Please try again later",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    })
</script>