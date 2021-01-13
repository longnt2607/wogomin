<?php
class LoginModel extends DB{
    public function loginAccount(){
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : ""; // check SQL injection??
		$password = isset($_POST['password']) ? $_POST['password'] : "";

		$sql = 'select * from user where phone = "'.$phoneNumber.'" and password = "'.md5($password).'"';

		$data = $this->getData($sql);
		if ($data == NULL) { // dont have account
		 	echo 0;
		 	die();
		} else {
			$_SESSION['user'] = $data[0]['id'];
			$_SESSION['userName'] = $data[0]['fullName'];
			echo 1;
			die();
		}
    }
}
?>