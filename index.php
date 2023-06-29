<?php
    session_start();
    require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Front/CSS/index.css">
    <title>Document</title>
</head>
<body>
    <header>
        "Simple Chat Project"
    </header>
    <div id="userPanel">        
        <?php                                    
            UI::DrawLoginPanel();            
        ?>
    </div>
</body>
</html>