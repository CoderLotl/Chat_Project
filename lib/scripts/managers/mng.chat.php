<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
{
    require_once __DIR__ . '/../../tpl/index.chat.tpl';
}

?>