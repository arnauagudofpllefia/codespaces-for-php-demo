<?php
session_start();
require_once ('config.php');

if($_SESSION['user_rol'] !== 'admin')exit('Sin permisos');

$id=(int) $_GET['id'];
$result = $mysqli->query("SELECT * FROM productos WHERE id=$id");

$producto = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['cantidad_stock'];
    $precio = $_POST['precio'];

    $stmt = $mysqli->prepare("UPDATE productos SET nombre=?,descripcion=?,cantidad_stock=?,precio=? WHERE id=?");

    $stmt->bind_param("ssssi",$nombre,$descripcion,$stock,$precio,$id);
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
    <h1>Editar Producto</h1>
    <form action="editProducto.php" method="post">

    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>">

    <label for="text">descripción: </label>
    <input type="text" id="descripcion" name="descripcion" value="<?= $producto['descripcion'] ?>">

    <label for="catidad_stock">Stock: </label>
    <input type="text" id="catidad_stock" name="catidad_stock" value="<?= $producto['cantidad_stock'] ?>">

    <label for="precio">Precio: </label>
    <input type="text" id="precio" name="precio" value="<?= $producto['precio'] ?>">

    <input type="submit">

    </form>
</body>
</html>

