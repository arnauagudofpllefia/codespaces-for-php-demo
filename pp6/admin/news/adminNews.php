<?php 
session_start();

require '../../config.php';

if(!isset($_SESSION['user_rol']) || $_SESSION['user_rol'] !== 'admin'){
    header('Location: ../../nopermission.php');
    exit();
}

$result = $mysqli->query('SELECT * FROM noticies ORDER BY data_publicacion DESC');
$news = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS PANNEL</title>
</head>
<body>
    <h1>Gestión de Noticias</h1>
    <a href="createNews.php">Crear Noticias</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Subtitul</th>
            <th>Cuerpo</th>
            <th>Fecha de publicacion</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($news as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['id']) ?></td>
                <td><?= htmlspecialchars($item['titol']) ?></td>
                <td><?= htmlspecialchars($item['subtitol']) ?></td>
                <td><?= htmlspecialchars($item['cos']) ?></td>
                <td><?= htmlspecialchars($item['data_publicacio']) ?></td>
                <td>
                    <a href="editaNews.php?=<?= $item['id'] ?>">editar</a>
                    <a href="deleteNews.php?=<?= $item['id'] ?>" onclick="return confirm('¡estas seguro?')">Eliminar</a>
                </td>
            </tr>
         <?php endforeach ?>   
    </table>
</body>
</html>