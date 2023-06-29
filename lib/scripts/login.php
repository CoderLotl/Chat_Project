<?php
//session_start();

$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == 'POST')
{
    if($_POST['type'] == 'login')
    {        
        $login = new DataAccess();
    }
    elseif($_POST['type'] == 'logout')
    {
        header("Location: ../index.php");
        session_unset();
        session_destroy();
    }
}
?>