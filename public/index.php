<?php
    ini_set('include_path','../'.PATH_SEPARATOR.'../core'.PATH_SEPARATOR.'../controllers'.PATH_SEPARATOR.'../config'.PATH_SEPARATOR.'../models'.PATH_SEPARATOR. ini_get('include_path'));
    require_once 'Application.php';
    require_once 'Config.php';
    require_once 'Controller.php';
    require_once 'Database.php';

    session_start();
    try {
        $routes = new Config('routes');
        $dbconfig = new Config('database');
        $dbconnection = new Database($dbconfig);

        $app = new Application(($_REQUEST['action'])??'default',$routes,$dbconnection->connection);
        $res = $app->run();
    }
    catch (Exception $e){
        var_dump($e);
    }
    session_write_close();