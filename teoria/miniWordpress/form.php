<?php
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

<form method="POST" action="">
    <label>Título:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Contenido:</label><br>
    <textarea name="content" rows="5" cols="40" required></textarea><br><br>

    <label>Fecha:</label><br>
    <input type="date" name="date" required><br><br>

    <label>Imagen (URL):</label><br>
    <input type="url" name="image" placeholder="https://example.com/imagen.jpg" required><br><br>

    <label>Categoría:</label><br>
    <input type="text" name="category" required><br><br>

    <button type="submit">Añadir Noticia</button>
</form>

<?php


