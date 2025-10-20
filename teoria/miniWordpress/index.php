<?php

include_once 'inc/header.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/index.css">
</head>

<body>
    <?php
    include 'inc/header.php'
    ?>

    <main>
        <section class="news-grid-display">
            <?php
            include_once 'data.php';

            foreach ($noticias as $noticia) {
                echo '<article class="news-item">';
                echo '<h2>' . htmlspecialchars($noticia['title']) . '</h2>';
                echo '<img src="' . htmlspecialchars($noticia['image']) . '" alt="' . htmlspecialchars($noticia['title']) . '">';
                echo '<p>' . htmlspecialchars($noticia['content']) . '</p>';
                echo '<p><strong>Fecha:</strong> ' . htmlspecialchars($noticia['date']) . '</p>';
                echo '<p><strong>Categoría:</strong> ' . htmlspecialchars($noticia['category']) . '</p>';
                echo '</article>';
            }
            ?>
        </section>

        <?php var_dump($noticias) ?>
    </main>

    <?php
    include 'inc/footer.php'

    ?>
</body>

</html>