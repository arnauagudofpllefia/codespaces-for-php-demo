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
<style>
 
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}


.form-container {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
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


input[type="email"],
input[type="password"],
input[type="text"] {
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
    background-color: #4CAF50;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}


.error-msg {
    color: #e74c3c;
    margin-bottom: 15px;
    text-align: center;
}

</style>
<body>
     <div class="form-container">
        <h1>Regístrate</h1>

        

        <form action="register.php" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="correo">Email: </label>
            <input type="email" id="correo" name="correo" required>

            <label for="password">Contraseña: </label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>