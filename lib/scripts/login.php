<?php
require_once '../classes/Login.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == 'POST')
{
    if($_POST['type'] == 'login')
    {        
        $login = new Login();
    }
    elseif($_POST['type'] == 'logout')
    {
        header("Location: {$__DIR__}/index.php");
        session_unset();
        session_destroy();
    }
}
?>