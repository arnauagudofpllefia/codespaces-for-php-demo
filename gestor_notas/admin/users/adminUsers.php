<?php
session_start();
require('../../config.php');

if ($_SESSION['user_rol'] !== 'admin') exit("Sense permisos");

$result = $mysqli->query("SELECT * FROM USERS");
$users = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor Usuaris</title>
</head>
<style>
  
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}


.admin-container {
    max-width: 1500px;
    margin: 0 auto;
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}


h1 {
    text-align: center;
    color: #333;
    margin-bottom: 25px;
}


a.add-news {
    display: inline-block;
    background-color: #6086ccff;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
    font-weight: bold;
    transition: background-color 0.3s;
}

a.add-news:hover {
    background-color: #7798d4ff;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

td {
    max-width: 180px;      
    white-space: nowrap;   
    overflow: hidden;      
    text-overflow: ellipsis; 
}


th {
    background-color: #6086ccff;
    color: white;
}


tr:nth-child(even) {
    background-color: #f9f9f9;
}


td a {
    text-decoration: none;
    color: #1a73e8;
    margin-right: 10px;
    font-weight: bold;
    transition: color 0.2s;
}

td a:hover {
    color: #0c47b7;
}

</style>
<body>
    <body>
       <?php include_once '../../data/header.php' ?> 
    <div class="admin-container">
        <h1>Usuaris</h1>
        <a href="addUser.php" class="add-news">+ Afegir Usuaris</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Cognom</th>
                <th>email</th>
                <th>avatar</th>
                <th>rol</th>
                <th>Data de registre</th>
                <th>Accions</th>
            </tr>
            <?php foreach($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['name'] ?></td>
                <td><?= $u['surname'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['avatar'] ?></td>
                <td><?= $u['rol'] ?></td>
                <td><?= $u['date_register'] ?></td>

                <td>
                    <a href="editUser.php?id=<?= $u['id'] ?>">Editar</a> |
                    <a onclick="return confirm('Segur?')" href="deleteUser.php?id=<?= $u['id'] ?>">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</body>
</html>