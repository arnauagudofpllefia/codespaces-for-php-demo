<?php 
session_start();
require_once ('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT id, nom, email, password, rol FROM usuaris WHERE email = ?");

    if (!$stmt){
        die('Error en la preparación: ' . $mysqli->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();
    

    if ($result->num_rows === 1){
        $user = $result->fetch_assoc();
        
    }

    if (password_verify($password, $user['password'])){
        $_SESSION['user_id']= $user['id'];
        $_SESSION['user_nom']= $user['nom'];
        $_SESSION['user_email']= $user['email'];
        $_SESSION['user_rol']= $user['rol'];

        header('Location: index.php');
        exit();
    }else{
        echo 'Contraseña incorrecta.';

    }

}else{
    echo 'No se encontró ningún usuario con ese emali';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuario</title>
</head>
<body>
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
</body>
</html>