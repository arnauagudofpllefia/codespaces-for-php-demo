<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background: #f4f4f4;
        font-family: 'Segoe UI', Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .divGeneral {
        max-width: 1300px;
        margin: 30px auto;
        background: #fff;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        padding: 32px;
    }

    .cartelera {
        display: flex;
        flex-wrap: wrap;
        gap: 32px;
        justify-content: center;
    }

    .cartelera img {
        border-radius: 10px;
        margin-bottom: 16px;
        width: 200px;
        height: 300px;
        transition: transform 0.3s;
    }

    .cartelera img:hover {
        transform: scale(1.07);
        opacity: 0.85;
    }

    .cartelera h2 {
        margin: 10px 0 8px 0;

    }

    .cartelera p {
        margin: 4px 0;
    }

    .cartelera button {
        margin: 8px 4px 0 4px;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        background: #c91212ff;
        color: #fff;

    }

    .cartelera a {
        color: inherit;
        text-decoration: none;
    }

    .divGeneral {
        padding: 10px;
        
    }

    .cartelera {
        gap: 16px;
        

    }
    .pelis{
        display: flex;
        flex-direction: column;
 
    }
    


</style>

<body>
    <div class="divGeneral">
        <img src="https://cinesocine.es/storage/media/6825f573-6a30-4973-b9db-64b818301f52.webp" alt="logoOcine">
        <div class="cartelera">
            <?php
            include 'peliculas.php';
            foreach ($cartelera as $pelicula) {
                echo "<div class='pelis'>";
                echo "<img src='" . $pelicula['imatge'] . "' alt='" . $pelicula['nom'] . "' ;'><br>";
                echo "<div class='infoPeli'>";
                echo " <h2>" . $pelicula['nom'] . "</h2> <br>";
                foreach ($pelicula['horaris'] as $horari) {
                    echo "<p>" . $horari . "</p> ";
                }

                echo "<button><a href='" . $pelicula['trailer'] . "' target='_blank'>Ver Trailer</a></button>";
                echo "<button><a href='detall.php?" . $pelicula['nom'] . "' target='_blank'>Ver Detalles</a></button>";
                echo "</div>";
            }
            echo "</div>";
            ?>
        </div>
    </div>


</body>

</html>