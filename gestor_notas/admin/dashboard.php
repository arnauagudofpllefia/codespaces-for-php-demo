<?php
session_start();

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
    <?php
    echo "<h3>" . $_SESSION['user_nom'] . "</h3>";
    echo "<h4>" . $_SESSION['user_rol'] . "</h4>";
    echo "<img src='" . $_SESSION['user_avatar'] . "' alt='avatar'>";
    ?>
    <a href="users/adminUsers.php">Usuarios</a>
    <a href="modulos/adminModulos.php">Modulos</a>
</body>
</html>