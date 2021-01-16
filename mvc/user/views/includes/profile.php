<?php 
    $data = json_decode($data["data"]);
    foreach($data as $item) {
?>
<div class="row">
    <div class="col-3">
        <img id="pro" src="/wogomin/public/images/user/avt.jpg">
    </div>
    <div class="add col-3">
        <h3><?php echo $item->fullName; ?></h3>
        <p><?php echo $item->address; ?></p>
    </div>
    <div class="col-6">
        <div>
            <button id="change-avtpro" type="button"><a href="./editProfile">Chỉnh sửa trang cá nhân</a></button>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div>
            <div id="phonenumber">
                <span><b>Phone number</b></span><br>
                <span><?php echo $item->phone; ?></span>
            </div>
            <div id="pass">
                <span><b>Password</b></span><br>
                <span>********</span>
            </div>
            <div id="mail">
                <span><b>Email</b></span><br>
                <span><?php echo $item->email; ?></span>
            </div>
            <div id="wallet">
                <span><b>Số tiền</b></span><br>
                <span><?php echo $item->wallet; ?> VND</span>
            </div>
        </div>
    </div>
</div>
<?php } ?>