<?php

class Login
{
    public function LogIn(string $user, string $password, string $path)
    {        
        $dataAccess = new DataAccess();        

        if($dataAccess->Login($user, $password, $path))
        {
            $dataAccess->Update($user, '../../database/Database.db', 'users', 'logged', true);
            $_SESSION['username'] = $user;
            $_SESSION['loggedin'] = true;                           
        }
        else
        {
            $_SESSION['wrongLogIn'] = true;            
        }      
    }

    public function LogOut(string $user)
    {
        $dataAccess = new DataAccess();

        $dataAccess->Update($user, '../../database/Database.db', 'users', 'logged', false);
    }
}

?>