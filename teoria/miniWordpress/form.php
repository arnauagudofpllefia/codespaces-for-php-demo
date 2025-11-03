<?php
include_once 'data.php';
?>

<form method="POST" action="index.php">
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




