<?php 
	class PaymentModel extends DB{

		public function popupPayment() {
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
			
			// $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
			// $vnp_OrderInfo = $_POST['order_desc'];
			// $vnp_OrderType = $_POST['order_type'];
			// $vnp_Amount = str_replace(',', '', $_POST['amount']) * 100;
			// $vnp_Locale = $_POST['language'];
			// $vnp_BankCode = $_POST['bank_code'];
			// $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
// ?order_type=billpayment&order_id=20210117082532&amount=10003&order_desc=Noi+dung+thanh+toan+haha&bank_code=NCB&language=vn
			$vnp_TxnRef = date("YmdHis");
			$vnp_OrderInfo = 'Mua gói chatting';
			$vnp_OrderType = 'billpayment';
			$vnp_Amount = str_replace(',', '', $_POST['amount']) * 100;
			$vnp_Locale = 'vn';
			$vnp_BankCode = $_POST['bank_code'];
			$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

			$vnp_TmnCode = "Y4U88XFK"; //Mã website tại VNPAY 
			$vnp_HashSecret = "DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV"; //Chuỗi bí mật
			$vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
			$vnp_Returnurl = "http://localhost/wogomin/home/updateWallet/";

			$inputData = array(
			    "vnp_Version" => "2.0.0",
			    "vnp_TmnCode" => $vnp_TmnCode,
			    "vnp_Amount" => $vnp_Amount,
			    "vnp_Command" => "pay",
			    "vnp_CreateDate" => date('YmdHis'),
			    "vnp_CurrCode" => "VND",
			    "vnp_IpAddr" => $vnp_IpAddr,
			    "vnp_Locale" => $vnp_Locale,
			    "vnp_OrderInfo" => $vnp_OrderInfo,
			    "vnp_OrderType" => $vnp_OrderType,
			    "vnp_ReturnUrl" => $vnp_Returnurl,
			    "vnp_TxnRef" => $vnp_TxnRef,
			);

			if (isset($vnp_BankCode) && $vnp_BankCode != "") {
			    $inputData['vnp_BankCode'] = $vnp_BankCode;
			}
			ksort($inputData);
			$query = "";
			$i = 0;
			$hashdata = "";
			foreach ($inputData as $key => $value) {
			    if ($i == 1) {
			        $hashdata .= '&' . $key . "=" . $value;
			    } else {
			        $hashdata .= $key . "=" . $value;
			        $i = 1;
			    }
			    $query .= urlencode($key) . "=" . urlencode($value) . '&';
			}

			$vnp_Url = $vnp_Url . "?" . $query;
			if (isset($vnp_HashSecret)) {
			   // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
			   	$vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
			    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
			}
			$returnData = array('code' => '00'
			    , 'message' => 'success'
			    , 'data' => $vnp_Url);
			// header("Location: $vnp_Url");
			echo json_encode($returnData);
		}

		public function updateWallet() {

			$amount = isset($_GET['vnp_Amount']) ? $_GET['vnp_Amount']/100 : '1';
			$data = $this->updateData('user', 'wallet', $amount, 'id', $_SESSION['user']);
			if ($data === false) { // cant update to database
			 	echo 0;
			 	// die();
			} else {
				header("Location: http://localhost/wogomin/home/profile");
				echo $amount;
				// die();
			}
		}
	}
?>