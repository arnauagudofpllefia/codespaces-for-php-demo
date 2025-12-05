<?php
session_start();
require('config.php');

if ($_SESSION['user_rol'] !== 'admin') exit("Sense permisos");

$result = $mysqli->query("SELECT * FROM testimonis");
$testimonios = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.admin-container {
    max-width: 1100px;
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
    background-color: #6086cc;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
    font-weight: bold;
    transition: background-color 0.3s;
}

a.add-news:hover {
    background-color: #7798d4;
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
    background-color: #6086cc;
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
    <div class="admin-container">
        <h1>Testimonis</h1>
        <a href="addTestimonios.php" class="add-news">+ Afegir Testimonis</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Cognom</th>
                <th>Testimoni</th>
                <th>Imatge</th>
            </tr>
            <?php foreach($testimonios as $t): ?>
            <tr>
                <td><?= $t['id'] ?></td>
                <td><?= $t['nom'] ?></td>
                <td><?= $t['cognom'] ?></td>
                <td><?= $t['testimoni'] ?></td>
                <td><?= $t['imatge'] ?></td>
                <td>
                    <a href="editTestimonios.php?id=<?= $t['id'] ?>">Editar</a> |
                    <a onclick="return confirm('Segur?')" href="deleteTestimonios.php?id=<?= $t['id'] ?>">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</body>
</html>
