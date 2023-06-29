<?php
session_start();
require_once '../services/DataAccess.php';

class Login
{
    public function LogIn(string $user, string $password)
    {        
        $dataAccess = new DataAccess();
        
        if($dataAccess->Login($user, $password))
        {
            $_SESSION['username'] = $user;
            $_SESSION['loggedin'] = true;                     
        }
        else
        {
            $_SESSION['wrongLogIn'] = true;            
        }      
    }

    public function LogOut()
    {
        $dataAccess = new DataAccess();


    }
}

?>