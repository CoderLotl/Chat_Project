<?php

class UI
{
    public static function DrawLoginPanel()
    {
        echo '<link rel="stylesheet" href="./Front/CSS/panelButtons.css">';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {            
            $code =                    
            '<form id="panel" action="/lib/scripts/login.php" method="POST">
                <label id="lUserName">
                    Logged User: 
                </label>
                <label id="lUserNameLogged">'
                    . $_SESSION["username"] .
                '</label><br>
                <button type="submit" id="btnLogOut">
                    Log Out
                </button>
                <input type="hidden" name="type" value="logout">
            </form>';
            echo $code;
        }
        else
        {            
            $code =
            '<form id="panel" action="/lib/scripts/login.php" method="POST">            
                <label for="lUserName" id="lUserName">
                    Username:
                </label>            
                <input type="text" id="userName" name="userName" placeholder="User">            
                <label for="lPassword" id="lPassword">
                    Password:
                </label>            
            <input type="text" id="password" name="password" placeholder="Password">';
    
            if(isset($_SESSION['wrongLogIn']) && $_SESSION['wrongLogIn'] == true)
            {
                $code .="<label id='error'>
                            ERROR. Incorrect user and/or password.
                        </label>";
                $_SESSION['wrongLogIn'] = false;
            }
    
            $code .=
            '<input type="hidden" name="type" value="login">            
            <br>
            <div id="panelButtons">
                <button type="submit" id="btnLogin">
                    Log In
                </button>
                <button href="#" name="signIn">
                    Sign In
                </button>
            </div>
            </form>';
            echo $code;
        } 
    }
}
?>