<?php
session_start();
require('config.php');

if ($_SESSION['user_rol'] !== 'admin') exit("Sense permisos");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titol = $_POST['titol'];
    $subtitol = $_POST['subtitol'];
    $cos = $_POST['cos'];
    $imatge = $_POST['imatge'];
    $autor = $_POST['autor'];
    $data_publicacio = $_POST['data_publicacio'];

    $stmt = $mysqli->prepare(
        "INSERT INTO noticies (titol, subtitol, cos, imatge, autor, data_publicacio)
        VALUES (?, ?, ?, ?, ?, NOW())"

    );
    $stmt->bind_param("sssss", $titol, $subtitol, $cos, $imatge, $autor);
    $stmt->execute();

    header("Location: adminNews.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
    }


    .news-form-container {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
    }


    h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }


    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }


    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 14px;
    }


    textarea {
        min-height: 150px;
        resize: vertical;
    }


    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #6086ccff;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #7798d4ff;
    }
</style>

<body>

    <body>
        <div class="news-form-container">
            <h1>Afegir Notícia</h1>
            <form method="POST">
                <label>Títol:</label>
                <input type="text" name="titol" required>

                <label>Subtítol:</label>
                <input type="text" name="subtitol" required>

                <label>Cos:</label>
                <textarea name="cos" required></textarea>

                <label>Imatge:</label>
                <input type="text" name="imatge" required>

                <label>Autor:</label>
                <input type="text" name="autor" required>

                <input type="submit" value="Afegir Notícia">
            </form>
        </div>
    </body>

</body>

</html>