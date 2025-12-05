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
<style>
    .form-container {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    width: 90%;
    max-width: 400px;
    margin: 50px auto;
    text-align: left;
}

h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #FF9800;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #FB8C00;
}

</style>
<body>
    
<div class="form-container">
    <h1>Añadir Producto</h1>

    <form action="addProducto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>

        <label for="cantidad_stock">Stock:</label>
        <input type="number" id="cantidad_stock" name="cantidad_stock" min="0" required>

        <label for="precio">Precio (€):</label>
        <input type="number" id="precio" name="precio" step="0.01" min="0" required>

        <input type="submit" value="Añadir Producto">
    </form>
</div>
</body>
</html>