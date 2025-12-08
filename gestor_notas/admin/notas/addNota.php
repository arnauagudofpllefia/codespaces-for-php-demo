<?php
session_start();
require('../../config.php');

if ($_SESSION['user_rol'] !== 'admin') exit("Sense permisos");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_alumne = $_POST['id_alumne'];
    $id_modul = $_POST['id_modul'];
    $nota = $_POST['nota'];


    $stmt = $mysqli->prepare(
        "INSERT INTO NOTES (id_alumne, id_modul, nota, data_avaluacio)
        VALUES (?, ?, ?, NOW())"

    );
    $stmt->bind_param("iii", $id_alumne, $id_modul, $nota);
    $stmt->execute();

    header("Location: adminNotas.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddNotas</title>
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


    <div class="news-form-container">
        <h1>Afegir Notas</h1>
        <form method="POST">
            <label>ID_Alumne:</label>
            <input type="text" name="id_alumne" required>

            <label>ID_Modul:</label>
            <input type="text" name="id_modul" required>

            <label>Nota:</label>
            <input type="text" name="nota" required>

            <input type="submit" value="Afegir Notas">
        </form>
    </div>


</body>

</html>