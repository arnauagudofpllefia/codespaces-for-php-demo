<?php 
session_start();

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] === 'admin' ){


}else{
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Panel d'administrador</h1>
    <nav>
        <ul>
            <li><a href="news/adminNews.php">Gestionar noticies</a></li>
            <li>Gestionar Projectes</li>
            <li>Gestionar Testimonis</li>
            <li>Gestionar FAQ's</li>
        </ul>

    </nav>
</body>
</html>