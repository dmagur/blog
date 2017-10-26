<?php
class Controller{
    protected $db;
    function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    function out($view,$layout = 'default',$data = array()){
        require_once 'views/layouts/'.$layout.'.php';
    }

    function redirect($path){
        header("Location:".$path);
    }
}