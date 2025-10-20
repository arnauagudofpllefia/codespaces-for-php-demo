<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
</head>
<style>
    header{
        background-color: gray;
        margin: 0;
        justify-content: space-between;
    }
    header img{
        width: 100px;
    }
</style>
<body>
    <header>
        <img src="https://static.wikia.nocookie.net/leagueoflegendsoficial/images/8/8c/LOL_Logo.png/revision/latest?cb=20180119195439&path-prefix=es" alt="logo">
        <?php
        if(isset($_SESSION['user'])){
            echo '<h2>Bienvenido' . $_SESSION['user'] . '</h2>';
            echo '<a href="logout.php"><img src="https://cdn-icons-png.flaticon.com/512/4400/4400629.png" alt="logo2"></a>';
        };
        ?>
    </header>
</body>
</html>