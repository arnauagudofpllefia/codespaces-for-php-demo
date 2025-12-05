<?php
session_start();
require_once ('config.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = $_POST['correo'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT id, nombre, correo, contrasena_hash, rol FROM usuarios WHERE correo=?");

    if(!$stmt){
        die('Error en la preparación: ' . $mysqli->error);
    };

    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result= $stmt->get_result();

    if($result->num_rows===1){
        $user= $result->fetch_assoc();
    }

    if(password_verify($password,$user['contrasena_hash'])){
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_nom']=$user['nombre'];
        $_SESSION['user_correo']=$user['correo'];
        $_SESSION['user_rol']=$user['rol'];

        header('Location: index.php');
        exit();

    }else{
        echo'contrasña incorrecta';
    }



}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    
    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="post">

    <label for="email">Email: </label>
    <input type="email" id="correo" name="correo">

    <label for="password">Contraseña: </label>
    <input type="password" id="password" name="password">

    <input type="submit">

    </form>
</body>
</html>