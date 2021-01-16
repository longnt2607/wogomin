<?php
class Home extends Controller{

    public $login;
    public $register;
    public $profile;
    public $payment;

    public function __construct()
    {
        //call model
        $this->login = $this->modelUser("LoginModel");
        $this->register = $this->modelUser("RegisterModel");
        $this->profile = $this->modelUser("ProfileModel");
        $this->payment = $this->modelUser("PaymentModel");
    }
    /*--------------------homepage--------------------*/
    function index(){
        $this->viewUser("layout_user", [
            "page"=>"homepage"
        ]);
    }

    /*--------------------register--------------------*/
    function setupProfile_Step_1(){
        $this->viewUser("setupProfile_Step_1", [
            "page"=>"setupProfile_Step_1"
        ]);
    }

    function handling_Step_1(){
        $this->register->handling_Step_1();
    }

    function setupProfile_Step_2(){
        $this->viewUser("setupProfile_Step_2", [
            "page"=>"setupProfile_Step_2"
        ]);
    }

    function handling_Step_2(){
        $this->register->handling_Step_2();
    }

    function register(){
        $this->viewUser("register", [
            "page" => "register"
        ]);
    }

    function checkPhoneNumber(){
        $this->register->checkPhoneNumber();
    }

    function verify(){
        $this->viewUser("verify", [
            "page" => "verify"
        ]);
    }

    function createAccount(){
        $this->register->createAccount();
    }

    /*--------------------login--------------------*/
    function login(){
        $this->viewUser("login", [
            "page" => "login"
        ]);
    }

    function loginAccount() {
        $this->login->loginAccount();
    }

    /*--------------------profile--------------------*/
    function profile(){
        $this->viewUser("layout_user", [
            "page" => "profile",
            "data" => $this->profile->getUserInfor()
        ]);
    }

    function editProfile(){
        $this->viewUser("layout_user", [
            "page" => "editprofile",
            "data" => $this->profile->getUserInfor()
        ]);
    }

    function updateProfile() {
        $this->profile->updateProfile();
    }

    function changePassword(){
        $this->viewUser("layout_user", [
            "page" => "changepassword"
        ]);
    }

    function updatePassword(){
        $this->profile->updatePassword();
    }

    /*--------------------forgot--------------------*/
    function forgot(){
        $this->viewUser("forgot", [
            "page" => "forgot"
        ]);
    }

    function recovery(){
        $this->viewUser("recovery", [
            "page" => "recovery"
        ]);
    }

    function renewPassword(){
        $this->profile->renewPassword();
    }

    function congratulation(){
        $this->viewUser("congratulation", [
            "page" => "congratulation"
        ]);
    }

    /*--------------------payment--------------------*/
    function payByATM(){
        $this->viewUser("layout_user", [
            "page" => "payByATM"
        ]);
    }

    function payByQR(){
        $this->viewUser("layout_user", [
            "page" => "payByQR"
        ]);
    }

    function payByCard(){
        $this->viewUser("layout_user", [
            "page" => "payByCard"
        ]);
    }

    function ATMPayment() {
        $this->payment->popupPayment();
    }
}
?>