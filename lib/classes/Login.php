<?php

class Login
{
    public function LogIn(string $user, string $password, string $path)
    {        
        $dataAccess = new DataAccess();        

        if($dataAccess->Login($user, $password, $path))
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