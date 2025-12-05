<?php
session_start();
require_once('config.php');

$result = $mysqli->query("SELECT * FROM productos");
$productos = $result->fetch_all(MYSQLI_ASSOC);


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
        background-color: gainsboro;
        justify-items: center;
        justify-content: center;
        text-align: center;


        & a {
            text-decoration: none;
            padding: 10px;
            background-color: lightblue;
            color: black;
            border-radius: 10px;
            margin-top: 50px;

        }
    }

    .tarjeta {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-top: 50px;
    }
</style>
<style>
    body {
        background-color: gainsboro;
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 0;
        padding: 0;
    }

    header {
        padding: 20px;
        background-color: #333;
    }

    header a {
        text-decoration: none;
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border-radius: 6px;
        margin: 0 5px;
        transition: background-color 0.3s ease;
    }

    header a:hover {
        background-color: #45a049;
    }

    h1 {
        margin-top: 30px;
    }

    .tarjeta {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        margin: 20px auto;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .tarjeta h3 {
        margin-top: 0;
    }

    .tarjeta a {
        text-decoration: none;
        padding: 8px 12px;
        background-color: #2196F3;
        color: white;
        border-radius: 5px;
        margin: 5px;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .tarjeta a:hover {
        background-color: #1976D2;
    }

    .create-producto {
        display: inline-block;
        margin: 20px;
        padding: 10px 15px;
        background-color: #FF9800;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .create-producto:hover {
        background-color: #FB8C00;
    }
</style>

<body>
    <header>
        <a href="perfil.php">Ver tu Perfil</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </header>
    <h1>Almacen</h1>
    <a href="addProducto.php" class="create-producto">Crear Producto</a>
    <?php foreach ($productos as $p): ?>
        <div class="tarjeta">
            <h3><?= $p['nombre'] ?></h3>
            <p>Descripción: <?= $p['descripcion'] ?></p>
            <p>Stock: <?= $p['cantidad_stock'] ?> en Stock</p>
            <p>Precio: <?= $p['precio'] ?> Euros</p>

            <?php if ($_SESSION['user_rol'] === 'admin'): ?>
                <a href='editProducto.php?id=<?= $p['id'] ?>'>Editar</a>
                <a href='deleteProducto.php?id=<?= $p['id'] ?>'>Eliminar</a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</body>

</html>