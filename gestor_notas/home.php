<?php
session_start();
require_once 'config.php';

$result = $mysqli->query("SELECT * FROM USERS WHERE id = " . $_SESSION['user_id']);
$user = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6f8;
    }

    header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #1f2937;
        padding: 12px 20px;
        color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }

    header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    header h4 {
        margin: 0;
        font-size: 14px;
        font-weight: normal;
        color: #9ca3af;
    }

    header img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #3b82f6;
        background: white;
    }

    header a{
        color: white;
        text-decoration: none;
        font-size: 14px;
    }

    
    .user-info {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
</style>
<body>

    <header>
        <div class="user-info">
            <?php
            echo "<h3>" . $user['name'] . $user['surname'] . "</h3>";
            echo "<h4>" . $user['rol'] . "</h4>";
            if ($_SESSION['user_rol'] == 'admin') {
                echo "<a href='admin/dashboard.php'>Admin Dashboard</a>";
            }
            ?>
        </div>

        <?php
        echo "<img src='" . $user['avatar'] . "' alt='avatar'>";
        echo "<a href='logout.php'>Cerrar Sesion</a>";
        ?>

    </header>


</body>

</html>