<?php
session_start();
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>

body {
    background-color: #f4f6f8;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}


h1 {
    margin-bottom: 40px;
    color: #2c3e50;
    font-size: 2.5rem;
}

a {
    text-decoration: none;
    color: #fff;
    background-color: #3498db;
    padding: 15px 30px;
    border-radius: 8px;
    margin: 10px;
    display: inline-block;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.2s;
}


a:hover {
    background-color: #2980b9;
    transform: translateY(-3px);
}


body > a {
    margin: 10px 0;
}
</style>
<body>
    <h1>Panel d'Estudiant</h1>
    
    <a href="editarPerfil.php?id=<?= $_SESSION['user_id'] ?>">Editar Perfil</a> |

</body>
</html>