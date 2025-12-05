<?php
session_start();
require_once('config.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = 'user';


    $password_hasheada = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO usuaris (nom, email, password, rol, data_registre) VALUES (?, ?, ?, 'user', NOW())");

    if (!$stmt) {
        die('Error en la preparacion: ' . $mysqli->error);
    }

    $stmt->bind_param('sss', $nom, $email, $password_hasheada);

    if ($stmt->execute()) {
        echo 'Usuario registrado correctamente. <a href="login.php">Iniciar Sesión</a>';
    } else {
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
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    padding: 20px;
}


h2 {
    color: #333;
    margin: 0;
    font-size: 28px;
}

form {
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
}


label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}


input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 4px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}


input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #6086ccff;
    border: none;
    border-radius: 4px;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #7798d4ff;
}


a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>

<body>
    <div class="container">
        <h2>Registro de Usuario</h2>

        <form action="register.php" method="POST">
            <label for="nom">Nombre:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit">

        </form>
    </div>

</body>

</html>