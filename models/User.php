<?php
require_once 'Model.php';
class User extends Model{
    protected $table = 'user';
    function login($email,$pass){
        if ($stmt = $this->db->prepare("SELECT id,password FROM `user` WHERE `email`=?")) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id,$dbpass);
            $stmt->fetch();
            if ($id){
                if (password_verify($pass, $dbpass)) {
                    $_SESSION['uid'] = $id;
                }
                else
                    return array('error' => 'Password incorrect');
            }
            else{
                return array('error' => 'User with such email not found');
            }
            
            $stmt->close();
        }
        else{
            throw new Exception('Error on login');
        }
    }
}