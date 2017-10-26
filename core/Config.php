<?php
class Config{
    private $config;
    function __construct($name)
    {
        if (file_exists('../config/'.$name.'.php')) {
            require_once '../config/' . $name . '.php';
            $this->config = $config;
        }
        else{
            throw new Exception('config with name '.$name.' not found');
        }
    }

    function get($name){
        if (isset($this->config[$name])){
            return $this->config[$name];
        }
        else
            return null;
    }
}