<?php
session_start();
require_once 'config.php';


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
</head>
<style>
    body{
        
        text-align: center;
        margin-top: 100px;
    }

    a {
        text-decoration: none;
        color: white;
        padding: 10px;
        background-color: midnightblue;
        border-radius: 3px;
    }
</style>
<body>
    <div class="divIndex">
        <a href="login.php">Iniciar Sesion</a>
        <a href="register.php">Registrar</a>
    </div>
    
</body>
</html>