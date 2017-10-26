<?php
require_once 'User.php';
class LoginController extends Controller{
    function index(){
        if (isset($_REQUEST['submit'])){
            $user = new User($this->db);
            $user->login($_REQUEST['email'],$_REQUEST['password']);
        }

        if (isset($_SESSION['uid'])){
            $this->redirect("/");
        }

        $this->out('login');
    }
}