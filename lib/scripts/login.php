<?php
session_start();
require_once '../classes/Login.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == 'POST')
{
    require_once '../services/DataAccess.php';
    $login = new Login();
    if ($_POST['type'] == 'login')
    {        
        $login->LogIn($_POST['userName'], $_POST['password']);
        header("Location: {$__DIR__}/index.php");
    }
    elseif ($_POST['type'] == 'logout')
    {
        $login->LogOut();
        session_unset();
        session_destroy();
        
        header("Location: {$__DIR__}/index.php");
    }
}
?>
