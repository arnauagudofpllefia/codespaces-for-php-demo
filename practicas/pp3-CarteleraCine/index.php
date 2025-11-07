<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocine</title>
</head>
<style>
    body {
        background: #f4f4f4;
        font-family: 'Segoe UI', Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .divGeneral {
        width: 1300px;
        margin: 30px auto;
        background: #fff;
        padding: 32px;
    }

    .cartelera {
        display: grid;
        grid-template-columns: repeat(3, 1fr); 
        gap: 32px;
        justify-items: center;
        padding: 20px 0;
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
        color: white;
        text-decoration: none;
    }

    .divGeneral {
        padding: 10px;
        
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
                echo "<img src='" . $pelicula['imatge'] . "' alt='" . $pelicula['nom'] . "' ;'>";
                echo "<div class='infoPeli'>";
                echo " <h2>" . $pelicula['nom'] . "</h2> ";
                foreach ($pelicula['horaris'] as $horari) {
                    echo "<p>" . $horari . "</p> ";
                }

                echo "<button><a href='" . $pelicula['trailer'] . "' target='_blank'>Ver Trailer</a></button>";
                echo "<button><a href='detall.php?nom=" . $pelicula['nom'] . "' target='_blank'>Ver Detalles</a></button>";
                echo "</div>";
            }
            echo "</div>";
            ?>
        </div>
    </div>


</body>

</html>