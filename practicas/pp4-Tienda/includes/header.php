<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    header{
        background-color: green;
        width: 100%;
        position: fixed;
        left: 0;
        top: 0;
        padding: 10px;
    }
    .divHeader{
        display: flex;
        align-items: center
    }

    .divHeader a{
        margin-left: 20px;
    }
    .divBienvenida{
        margin-left: 40%;
        margin-right: auto;
        text-align: center;
    }
    .divBienvenida h2{
        color: white;
    }
    img{
        height: 80px;
        border-radius: 50%;
    }
</style>
<body>
    <header>
        <div class="divHeader">
            <a href="../inicio.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQ_SBE1RV_EuwFRroHCV7u6y-19iA5vIOovg&s" alt="logoMercadona"></a>
            <div class="divBienvenida">
                <?php
                if(isset($_GET['nombre']) && isset($_GET['urlImg']  )) {
                    echo "<h2>Bienvenido: " . $_GET['nombre'] . "</h2>";
                    echo "<img src=" . $_GET['urlImg'] . " alt='imgPerfil'>";
                } 
                
                ?>
            </div>
        </div>
    </header>


</body>
</html>