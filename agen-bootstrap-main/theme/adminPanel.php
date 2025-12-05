<?php
session_start();
require 'config.php';
if ($_SESSION['user_rol'] !== 'admin') {
    exit("No tens permisos.");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
    }

   
    .admin-panel {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }

    
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

   
    .admin-panel a {
        display: block;
        background-color: #6086ccff;
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        margin-bottom: 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-weight: bold;
        text-align: center;
    }

    .admin-panel a:hover {
        background-color: #7798d4ff;
    }
</style>

<body>
    <div class="admin-panel">
        <h1>Panell d'Administració</h1>

        <a href="adminNews.php">Gestionar Notícies</a><br>
        <a href="adminPorfolio.php">Gestionar Porfolio</a><br>
        <a href="adminTestimonios.php">Gestionar Testimonis</a><br>
        <a href="adminFaqs.php">Gestionar FAQs</a><br>
    </div>
</body>

</html>