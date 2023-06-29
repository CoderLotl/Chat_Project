<?php

class UI
{
    public static function DrawLoginPanel()
    {        
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {            
            $code =                    
            '<form id="panel" action="./lib/scripts/login.php" method="POST">
            <label id="lUserName">Logged User: </label><label id="lUserNameLogged">' . $_SESSION["username"] . '</label>            
            <br><button type="submit" id="btnLogOut" value="Log Out">Log Out</button>
            <input type="hidden" name="type></form>';
            echo $code;
        }
        else
        {            
            $code =
            '<form id="panel" action="./lib/scripts/login.php" method="POST">            
            <label for="lUserName" id="lUserName">Username:</label>            
            <input type="text" id="userName" name="userName" placeholder="User">            
            <label for="lPassword" id="lPassword">Password:</label>            
            <input type="text" id="password" name="password" placeholder="Password">';
    
            if(isset($_SESSION['wrongLogIn']) && $_SESSION['wrongLogIn'] == true)
            {
                $code .= "<label id='error'>ERROR. Incorrect user and/or password.</label>";
                $_SESSION['wrongLogIn'] = false;
            }
    
            $code .=
            '<input type="hidden" name="type" value="login">            
            <br><button type="submit" id="btnLogin">Log In</button>            
            </form>';
            echo $code;
        } 
    }
}
?>