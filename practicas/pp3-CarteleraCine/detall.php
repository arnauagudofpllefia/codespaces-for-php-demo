<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detall</title>
</head>
<style>
    body {
        background: #f4f4f4;
        margin-left: 200px;
        padding: 0;

    }

    h1 {
        margin-top: 20px;
    }

    img {
        border-radius: 10px;
        margin: 20px 0;
        width: 300px;
        height: auto;
    }

    p {
        font-size: 18px;
        margin: 10px 0;
    }

    .pelisDetall{
        display: flex;
        gap: 20px;
    }

    .infoPeliDetall{
        width: 600px;
    }
    .infoPeliDetall button{
        margin: 8px 4px 0 4px;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        background: #c91212ff;
        color: #fff;
    }
    .infoPeliDetall button a{
        color: white;
        text-decoration: none;
    }
    
</style>
<body>
    <img src="https://www.ocinemagic.es/images/logo-ocine-mag.png#joomlaImage://local-images/logo-ocine-mag.png?width=240&height=119" alt="logo">
    <?php
    include 'peliculas.php';
    $peliculaNombre = $_GET['nom'];
    foreach ($cartelera as $pelicula) {
        if ($pelicula['nom'] == $peliculaNombre) {
            echo "<h1>" . $pelicula['nom'] . "</h1>";
            echo "<div class='pelisDetall'>";
            echo "<img src='" . $pelicula['imatge'] . "' alt='" . $pelicula['nom'] . "' />";
            echo "<div class='infoPeliDetall'>";
            echo "<p><strong>Sinopsi: </strong> " . $pelicula['sinopsi'] . "</p>";
            echo "<p><strong>Durada: </strong> " . $pelicula['durada'] . "</p>";
            echo "<p><strong>Director: </strong> " . $pelicula['director'] . "</p>";
            echo "<p><strong>Actors: </strong> " . $pelicula['repartiment'] . "</p>";
            echo "<p><strong>Qualificació: </strong>" . $pelicula['qualificacio'] . "</p>";
            echo "<p><strong>Gènere: </strong>" . $pelicula['genere'] . "</p>";
            foreach ($pelicula['horaris'] as $horari) {
                    echo "<p>" . $horari . "</p>";
                }
            echo "<button><a href='" . $pelicula['trailer'] . "' target='_blank'>Ver Trailer</a></button>";
            echo "</div>";
            echo "</div>";
            
        }
    }
            
    ?>
</body>
</html>