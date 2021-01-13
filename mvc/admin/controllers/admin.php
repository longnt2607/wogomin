<?php
class Admin extends Controller{

    public $lg;
    public $rc, $edit_rc;
    public $us, $tw;

    public function __construct()
    {
        //call model
        $this->lg = $this->modelAdmin("LoginModel");
        $this->rc = $this->modelAdmin("RoomChatModel");
        $this->edit_rc = $this->modelAdmin("RoomChatModel");
        $this->us = $this->modelAdmin("UsersModel");
        $this->tw = $this->modelAdmin("UsersModel");
    }

    function index(){
        $this->viewAdmin("layout_admin", [
            "page"=>"dashboard"
        ]);
    }

    function chatRoom(){
        $this->viewAdmin("layout_admin", [
            "page"=>"chatroom",
            "rc" => $this->rc->roomChat()
        ]);
    }

    function editChatRoom($id){
        $this->viewAdmin("layout_admin", [
            "page"=>"editchatroom",
            "edit_rc" => $this->edit_rc->getDetailRoomChat($id)
        ]);     
    }

    function users(){

        $kq = $this->tw->topWallet();
        $this->viewAdmin("layout_admin", [
            "page"=>"users",
            "us" => $this->us->user(),
            "result" => $kq
        ]);
    }

    function contentChat(){
        $this->viewAdmin("layout_admin", [
            "page"=>"contentchat"
        ]);
    }

    function login(){
        $this->viewAdmin("layout_login", [
            "lg" => $this->lg->account()
        ]);
    }
}
?>