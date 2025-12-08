<?php
session_start();
require_once '../config.php';

if($_SESSION['user_rol'] != 'admin'){

    header('Location: index.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Panel de Administració</h1>
    
    <a href="users/adminUsers.php">Usuarios</a>
    <a href="modulos/adminModulos.php">Modulos</a>
</body>
</html>