<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ProfileModel extends DB{
    public function getUserInfor()
    {
    	$sql = 'select * from user where id = "'.$_SESSION['user'].'"';
    	return json_encode($this->getData($sql));
    }

    public function updateProfile()
    {
    	$name = isset($_POST['name']) ? $_POST['name'] : '';
    	$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
    	$address = isset($_POST['address']) ? $_POST['address'] : '';
    	$email = isset($_POST['email']) ? $_POST['email'] : '';
    	$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    	$sql = 'update user set
    			fullName = "'.$fullName.'", 
    			phone = "'.$phone.'", 
    			email = "'.$email.'", 
    			address = "'.$address.'" 
    			where id = "'.$_SESSION['user'].'"';
        $data = mysqli_query($this->con, $sql);
        if ($data == false) { // can not update
		 	echo 0;
		 	die();
		} else {
			$_SESSION['userName'] = $fullName;
			echo 1;
			die();
		}
    }

    public function updatePassword()
    {
    	$oldPassword = isset($_POST['oldPass']) ? $_POST['oldPass'] : '';
    	$newPassword = isset($_POST['newPass']) ? $_POST['newPass'] : '';

    	$sql = 'select * from user where id = "'.$_SESSION['user'].'"';
    	$data = $this->getData($sql);
    	if ($data != NULL) {
    		if ($data[0]['password'] == $oldPassword) { // correct old password
    			$t = $this->updateData('user', 'password', $newPassword, 'id', $_SESSION['user']);
    			if ($t === false) { // can not update
    				echo 0;
    				die();
    			} else {
    				echo 1;
    				die();
    			}
    		} else { // old password not correct
    			echo 2;
    			die();
    		}
    	} else {
    		echo 0;
    		die();
    	}
    }

    public function renewPassword()
    {
    	$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : ""; // check SQL injection??
        $newPassword = isset($_POST['newPass']) ? $_POST['newPass'] : '';

        $sql = 'select * from user where phone = "'.$phoneNumber.'"';
        $data = $this->getData($sql);
        if ($data != NULL) {
            $t = $this->updateData('user', 'password', md5($newPassword), 'phone', $phoneNumber);
            if ($t === false) { // can not update
                echo 0;
                die();
            } else {
                echo 1;
                die();
            }
        } else {
            echo 0;
            die();
        }       

    	// $sql = 'select * from user where phone = "'.$phoneNumber.'"';
    	// $data = $this->getData($sql);

  //   	$length = 8;
  //   	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%^&*(){}[],./?';
  //   	$mailBody = substr(str_shuffle($chars), 0, $length);



		// require 'PHPMailer_5.2.0/Exception.php';
		// require 'PHPMailer_5.2.0/PHPMailer.php';
		// require 'PHPMailer_5.2.0/SMTP.php';

		// $mail = new PHPMailer();
		// $mail->isSMTP();
		// $mail->Host = "smtp.gmail.com";  // specify main and backup server
		// $mail->SMTPAuth = true;     // turn on SMTP authentication
		// $mail->SMTPSecure = "tls";
		// $mail->Port = 587;

		// $mail->Username = "cuong3600@gmail.com";  // SMTP username
		// $mail->Password = "Scolllock210"; // SMTP password

		// $mail->setFrom('cuong3600@gmail.com', 'Mailer');

		// $mail->addAddress($data[0]['email'], $data[0]['fullName']);
		// // $mail->addAddress("huynhkynhatcuong@gmail.com", "CuongHuynh");

		// $mail->WordWrap = 50;
		// $mail->isHTML(true);
		// $mail->Subject = "You have received new password from Wogomin!";

		// $mail->Body    = $mailBody;
		// $mail->AltBody = $mailBody;

		// if(!$mail->Send()) {
		// 	// echo "Mailer Error: " . $mail->ErrorInfo;
		// 	echo 0;
		// 	exit;
		// } else {
		// 	$t = $this->updateData('user', 'password', md5($mailBody), 'id', $_SESSION['user']);
		// 	if ($t === false) { // can not update
		// 		echo 0;
		// 		die();
		// 	} else {
		// 		echo 1;
		// 		die();
		// 	}
		// }
    }
}
?>