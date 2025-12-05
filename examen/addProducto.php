<?php
session_start();
require_once ('config.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $stock=$_POST['catidad_stock'];
    $precio=$_POST['precio'];

    $stmt = $mysqli->prepare("INSERT INTO productos (nombre, descripcion, cantidad_stock, precio, creado_en ) VALUES (?,?,?,?, NOW())");

    $stmt->bind_param("ssss", $nombre, $descripcion, $stock, $precio);
    $stmt->execute();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Añadir Producto</h1>
    <form action="addProducto.php" method="post">

    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="nombre">

    <label for="text">descripción: </label>
    <input type="text" id="descripcion" name="descripcion">

    <label for="catidad_stock">Stock: </label>
    <input type="number" id="catidad_stock" name="catidad_stock">

    <label for="precio">Precio: </label>
    <input type="number" id="precio" name="precio">

    <input type="submit">

    </form>
</body>
</html>