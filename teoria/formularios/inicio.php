<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="inicio.php" method="get">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="number" name="edad" placeholder="Edad">
        <input type="submit" value="Enviar"> > 
    </form>
</body>
</html>

<?php
echo $_GET['nombre'];
echo "<br>";
echo $_GET['edad'];

//ahora con post
echo "<br>";
echo $_POST['nombre'];





?>