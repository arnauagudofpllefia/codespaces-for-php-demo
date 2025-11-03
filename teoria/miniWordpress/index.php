<?php
session_start();
include_once 'inc/header.php';
include_once 'data.php';

//compruebo si el formulario a sido enviado
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    //RECOJO LOS DATOS DE LOS FORMULARIOS
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $image = $_POST['image'];
    $category = $_POST['category'];

    

    //validamos con trim y con empty y con isset
    if (
        isset($title) && !empty(trim($title)) &&
        isset($content) && !empty(trim($content)) &&
        isset($date) && !empty(trim($date)) &&
        isset($image) && !empty(trim($image)) &&
        isset($category) && !empty(trim($category))
    ) {
        //añadir datos al array
        array_push($noticias, [
            'title' => $title,
            'content' => $content,
            "date" => $date,
            "image" => $image,
            "category" => $category

        ]);

        echo "Noticia añadida correctamente";
        echo '<p style="color:red">Error: Todos los campos son obligatorios';

    }else{
        echo '<p style="color:red">Error: El formulario no ha sido enviado correctamente';
    }
}
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
    include_once 'inc/header.php'
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