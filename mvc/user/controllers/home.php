<?php
class Home extends Controller{

	// public $profile;
    public $login;
    // public $forgot;
    public $register;

    public function __construct()
    {
        //call model
        // $this->profile = $this->modelUser("ProfileModel");
        $this->login = $this->modelUser("LoginModel");
        // $this->forgot = $this->modelUser("ForgotModel");
        $this->register = $this->modelUser("RegisterModel");
    }

    function index(){
        $this->viewUser("layout_user", [
            "page"=>"homepage"
        ]);
    }

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

    function login(){
        $this->viewUser("login", [
            "page" => "login"
        ]);
    }

    function loginAccount() {
        $this->login->loginAccount();
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

    function profile(){
        $this->viewUser("layout_user", [
            "page" => "profile"
        ]);
    }

    function changeProfile(){
        $this->viewUser("layout_user", [
            "page" => "changeprofile"
        ]);
    }

    function changePassword(){
        $this->viewUser("layout_user", [
            "page" => "changepassword"
        ]);
    }
}
?>