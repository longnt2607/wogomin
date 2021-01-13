var url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html?";
var vnp_Amount="10000000";
var vnp_BankCode="NCB";
var vnp_Command="pay";
var vnp_CreateDate="20170829103111";
var vnp_CurrCode="VND";
var vnp_IpAddr="172.16.68.68";
var vnp_Locale="vn";
var vnp_Merchant="DEMO";
var vnp_OrderInfo="Nap+tien+cho+thue+bao+0123456789.+So+tien+100%2c000";
var vnp_OrderType="topup";
var vnp_ReturnUrl="http%3a%2f%2fsandbox.vnpayment.vn%2ftryitnow%2fHome%2fVnPayReturn";
var vnp_TmnCode="2QXUI4J4";
var vnp_TxnRef="23554";
var vnp_Version="2";
var vnp_SecureHashType="SHA256";
var vnp_SecureHash="e6ce09ae6695ad034f8b6e6aadf2726f";


$.ajax({
    url: url,
    type: 'POST',
    data: { 
    	username : username, 
    	password : password,
    	remember : remember
    },
    success : function(response){
		if (response == 1) {
			window.location.replace("admin.php");
		}else{
			alert('Tên đăng nhập hoặc mật khẩu không chính xác !');
		}
	},
    error: function (e) {
        console.log(e.message);
    }
});