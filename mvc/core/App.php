<?php
    class App{

        protected $controller="home";
        protected $action="index";
        protected $params=[];

        function __construct(){

            $arr = $this->UrlProcess();

            if( file_exists("./mvc/user/controllers/".$arr[0].".php") ){
                $this->controller = $arr[0];
                unset($arr[0]);
                require_once "./mvc/user/controllers/". $this->controller .".php";
                $this->controller = new $this->controller;
            }
            else if( file_exists("./mvc/admin/controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
                unset($arr[0]);
                require_once "./mvc/admin/controllers/". $this->controller .".php";
                $this->controller = new $this->controller;
            }
            else{
                require_once "./mvc/user/controllers/". $this->controller .".php";
                $this->controller = new $this->controller;
            }
            
            if(isset($arr[1])){
                if( method_exists( $this->controller , $arr[1]) ){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }

            $this->params = $arr?array_values($arr):[];
            call_user_func_array([$this->controller, $this->action], $this->params );
            
        }

        function UrlProcess(){
            if( isset($_GET["url"]) ){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>