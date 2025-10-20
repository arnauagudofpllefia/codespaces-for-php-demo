<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="get">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="number" name="password" placeholder="Contraseña">
        <input type="submit" value="Enviar"> >
    </form>

    <?php

    echo $_GET['nombre'];
    echo "<br>";
    echo $_GET['password'];

    ?>
</body>
</html>