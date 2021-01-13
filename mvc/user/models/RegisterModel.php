<?php
class RegisterModel extends DB{

	public function checkPhoneNumber() {
		$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : "";
	
		$sql = 'select * from user where phone = "'.$phoneNumber.'"';

		$data = $this->getData($sql);
		if ($data != NULL) { // already exist this phone number
		 	echo 0;
		 	die();
		} else {
			echo 1;
		}
	}

    public function handling_Step_1() {
    	$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : ""; // check SQL injection??
		$email = isset($_POST['email']) ? $_POST['email'] : "";

		$data = $this->updateData('user', 'fullName', $fullName, 'id', $_SESSION['user']);
		$data = $this->updateData('user', 'email', $email, 'id', $_SESSION['user']);
		if ($data === false) { // cant update to database
		 	echo 0;
		 	die();
		} else {
			$_SESSION['userName'] = $fullName;
			echo 1;
			die();
		}
    }

    public function handling_Step_2() {
    	$sex = isset($_POST['sex']) ? $_POST['sex'] : ""; // check SQL injection??
		$date = isset($_POST['date']) ? $_POST['date'] : "";
		$address = isset($_POST['address']) ? $_POST['address'] : "";

		$data = $this->updateData('user', 'sex', $sex, 'id', $_SESSION['user']);
		$data = $this->updateData('user', 'address', $address, 'id', $_SESSION['user']);
		if ($data === false) { // cant update to database
		 	echo 0;
		 	die();
		} else {
			echo 1;
			die();
		}
    }

    public function createAccount() {
		$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		$currentDate = date("Y/m/d");

		$sql = 'insert into user value ("", "", "'.$phoneNumber.'", "'.$password.'", "", "", "1", "'.$currentDate.'", "0")';

		$data = $this->insertData($sql);
		if ($data === false) { // cannot insert to database
		 	echo 0;
		 	die();
		} else {
			echo 1;
		}
	}
}
?>