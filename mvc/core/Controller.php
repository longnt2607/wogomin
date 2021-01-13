<?php
class Controller{

    public function modelAdmin($model){
        require_once "./mvc/admin/models/".$model.".php";
        return new $model;
    }

    public function viewAdmin($view, $data=[]){
        require_once "./mvc/admin/views/layout/".$view.".php";
    }
    

    public function modelUser($model){
        require_once "./mvc/user/models/".$model.".php";
        return new $model;
    }

    public function viewUser($view, $data=[]){
        require_once "./mvc/user/views/layout/".$view.".php";
    }
}
?>