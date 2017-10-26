<?php
class Application
{
    private $route;
    private $config;
    private $db_connection;


    function __construct($route,$route_config,$db_connection)
    {
        $this->route = $route;
        $this->route_config = $route_config;
        $this->db_connection = $db_connection;
    }

    function run()
    {
        $controller = $this->route_config->get($this->route);
        require_once $controller['class'].'.php';
        $str = "\$controller_class = new " . $controller['class'] . "(\$this->db_connection);return \$controller_class->" . $controller['method'] . "();";
        eval($str);
    }
}