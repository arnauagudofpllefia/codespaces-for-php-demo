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

    header a {
        color: white;
        text-decoration: none;
        font-size: 14px;
    }


    .user-info {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    main {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
        max-width: 1200px;
        margin: 20px auto;
    }

    
    main div {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    main div:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    main h2 {
        font-size: 20px;
        color: #1f2937;
        margin-bottom: 8px;
    }

    main h4 {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 12px;
    }

    main p {
        font-size: 14px;
        color: #374151;
        line-height: 1.5;
    }
</style>

<body>

    <header>
        <div class="user-info">
            <?php
            
            echo "<a href='student-dashboard.php'><h3>" . $user['name'] . $user['surname'] . "</h3></a>";
            echo "<h4>" . $user['rol'] . "</h4>";
            if ($_SESSION['user_rol'] == 'admin') {
                echo "<a href='admin/dashboard.php'>Admin Dashboard</a>";
            }
            ?>
        </div>

        <?php
        
        echo "<a href='student-dashboard.php'><img src='" . $user['avatar'] . "' alt='avatar'></a>";
        echo "<a href='logout.php'>Cerrar Sesion</a>";
        ?>
    </header>
<a href=""></a>
    <main>
        <?php
       
            $resultModulos = $mysqli->query("SELECT * FROM MODULS ");
            $moduls = $resultModulos->fetch_all(MYSQLI_ASSOC);

            foreach ($moduls as $m) {
                echo "<div>";
                echo "<h2>" . $m['nom'] . "</h2>";
                echo "<h4>" . $m['codi'] . "</h4>";
                echo "<p>" . $m['descripcio'] . "</p>";

                echo "</div>";
            }
        


        ?>
    </main>


</body>

</html>