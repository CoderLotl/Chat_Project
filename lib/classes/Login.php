<?php

class Login
{
    public function LogIn(string $user, string $password)
    {    
        $dataAccess = new DataAccess();
        
        if($dataAccess->Login($_SESSION['username'], $_SESSION['password']))
        {
            $_SESSION['username'] = $user;
            $_SESSION['loggedin'] = true;                
            header("Location: ../index.php");            
        }
        else
        {
            $_SESSION['wrongLogIn'] = true;
            header("Location: ../index.php");
        }      
    }
}

?>