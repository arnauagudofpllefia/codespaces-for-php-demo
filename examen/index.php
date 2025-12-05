<?php
session_start();
require_once ('config.php');

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
    body{
        background-color: gainsboro;
        justify-items: center;
        justify-content: center;
        text-align: center;
        

        & a{
            text-decoration: none;
            padding: 10px;
            background-color: lightblue;
            color: black;
            border-radius: 10px;
            margin-top: 50px;
            
        }
    }
    .tarjeta{
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-top: 50px;
    }
</style>
<body>
    <header>
        <a href="perfil.php">Ver tu Perfil</a>
    </header>
    <h1>Almacen</h1>
    <a href="addProducto.php">Crear Producto</a>
    <?php foreach ($productos as $p):?>
    <div class="tarjeta">
        <h3><?= $p['nombre'] ?> </h3>
        <p>Descripción: <?= $p['descripcion'] ?> </p>
        <p>Stock: <?= $p['cantidad_stock'] ?> en Stock </p>
        <p>Precio: <?= $p['cantidad_stock'] ?> Euros </p>
        <?php
            if($_SESSION['user_rol'] === 'admin'){
                echo "<a href='editProducto.php?id=" . $p['id'] . "'>Editar</a>";
                echo "<a href='deleteProducto.php?id=" . $p['id'] . "'>Eliminar</a>";
            }
        
        ?>
    </div>
    <?php endforeach?>
</body>
</html>