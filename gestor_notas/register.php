<?php 
session_start();
require_once ('config.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nom = $_POST['nom'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $avatar = $_POST['avatar'];
    $rol = 'user';
    

    $password_hasheada = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO USERS (name, surname, email, password, avatar, rol, date_register) VALUES (?, ?, ?, ?, ?, 'estudiant', NOW())");

    if (!$stmt){
        die('Error en la preparacion: ' . $mysqli->error);
    }

    $stmt->bind_param('sssss', $nom, $surname, $email, $password_hasheada, $avatar);

    if ($stmt->execute()){
        echo 'Usuario registrado correctamente. <a href="login.php">Iniciar Sesión</a>';

    }else {
        echo 'Error al registrar el usuario: ' . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>

    <form action="register.php" method="POST">
        <label for="nom">Nombre:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="surname">Apellido:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <label for="avatar">Avatar:</label>
        <input type="text" id="avatar" name="avatar" required>

        <input type="submit">

    </form>
</body>
</html>