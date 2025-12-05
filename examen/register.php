<?php
session_start();
require_once ('config.php');


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nom = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $rol = 'operario';

    $password_hasheada = password_hash($password,PASSWORD_DEFAULT);
    $stmt= $mysqli->prepare("INSERT INTO usuarios (nombre,correo,contrasena_hash,rol,creado_en)VALUES (?,?,?,'operario', NOW())");

    if(!$stmt){
        die('Error en la preparación: ' . $mysqli->error);
    };

    $stmt->bind_param('sss', $nom,$correo,$password_hasheada);

    if($stmt->execute()){
        echo 'Usuario registrado correctamente <a href="login.php">Iniciar Sessión</a>';
        
    }else{
        echo 'Error' . $stmt->error;
    };

    $stmt->close();
    $mysqli->close();

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
</head>
<body>
    <h1>Registrate</h1>
    <form action="register.php" method="post">

    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="nombre">

    <label for="email">Email: </label>
    <input type="email" id="correo" name="correo">

    <label for="password">Contraseña: </label>
    <input type="password" id="password" name="password">

    <input type="submit">

    </form>
</body>
</html>