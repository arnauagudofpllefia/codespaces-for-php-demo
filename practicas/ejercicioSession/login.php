<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('header.php');
    ?>
    <h1>Iniciar Sesión</h1>
    <form action="home.php" method="post">

    <label for="user">Nombre</label>
    <input type="text" name="user">

    <br>

    <label for="contra">Contraseña</label>
    <input type="text" name="contra">

    <br>

    <input type="submit">
    


    </form>
</body>
</html>