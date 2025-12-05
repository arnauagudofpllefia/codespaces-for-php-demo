<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT id, nom, email, password, rol FROM usuaris WHERE email = ?");

    if (!$stmt) {
        die('Error en la preparación: ' . $mysqli->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();


    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_rol'] = $user['rol'];

        header('Location: index.php');
        exit();
    } else {
        echo 'Contraseña incorrecta.';
    }
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuario</title>
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


    form {
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }


    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }


    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }


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


    .error {
        color: red;
        margin-bottom: 10px;
        text-align: center;
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
    <div>
        <h2>Login de Usuario</h2>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <br>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit">
        </form>
    </div>

</body>

</html>