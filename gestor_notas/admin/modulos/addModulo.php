<?php
session_start();
require('../../config.php');

if ($_SESSION['user_rol'] !== 'admin') exit("Sense permisos");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST['nom'];
    $codi = $_POST['codi'];
    $descripcio = $_POST['descripcio'];


    $stmt = $mysqli->prepare(
        "INSERT INTO MODULS (nom, codi, descripcio)
        VALUES (?, ?, ?)"

    );
    $stmt->bind_param("sss", $nom, $codi, $descripcio);
    $stmt->execute();

    header("Location: adminModulos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddModulos</title>
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
            <h1>Afegir Moduls</h1>
            <form method="POST">
                <label>Nom:</label>
                <input type="text" name="nom" required>

                <label>Codi:</label>
                <input type="text" name="codi" required>

                <label>Descripció:</label>
                <textarea name="descripcio" required></textarea>

                <input type="submit" value="Afegir Modul">
            </form>
        </div>
    </body>

</body>

</html>