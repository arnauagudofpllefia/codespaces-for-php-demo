<?php
session_start();
require('config.php');

$id = (int) $_GET['id'];

$result = $mysqli->query("SELECT * FROM USERS WHERE id = $id");
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar']; 

    $stmt = $mysqli->prepare("UPDATE USERS SET name=?, surname=?, email=?, avatar=? WHERE id=?");
    $stmt->bind_param("ssssi", $nom, $surname, $email, $avatar, $id);
    $stmt->execute();

    header("Location: student-dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Perfil</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
}

.edit-news-container {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 600px;
}

h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="email"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
    box-sizing: border-box;
}

img.avatar-preview {
    display: block;
    margin-bottom: 15px;
    max-width: 150px;
    max-height: 150px;
    border-radius: 50%;
    object-fit: cover;
}

input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #1a73e8;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.2s;
}

input[type="submit"]:hover {
    background-color: #0c47b7;
}
</style>
</head>
<body>
<div class="edit-news-container">
    <h1>Editar Perfil</h1>

    <form action="editarPerfil.php" method="POST">
        <label>Nom:</label>
        <input type="text" name="name" value="<?= $user['name'] ?>" required>

        <label>Cognom:</label>
        <input type="text" name="surname" value="<?= $user['surname'] ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>

        <label>Avatar:</label>
        <input type="text" name="avatar" value="<?= $user['avatar'] ?>" required>

        <input type="submit" value="Guardar Canvis">
    </form>
</div>
</body>
</html>
