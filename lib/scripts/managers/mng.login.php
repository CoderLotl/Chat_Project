<?php
session_start();
include_once __DIR__ . '/../../classes/Login.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod === 'POST')
{
    require_once __DIR__ . '/../../services/DataAccess.php';
    $login = new Login();
    if ($_POST['type'] == 'login')
    {        
        $login->LogIn($_POST['userName'], $_POST['password'], '../../database/Database.db');
        header("Location: {$__DIR__}/index.php");        
    }
    elseif ($_POST['type'] == 'logout')
    {
        $login->LogOut($_POST['userName']);
        session_unset();
        session_destroy();
        
        header("Location: {$__DIR__}/index.php");
    }
}
?>
