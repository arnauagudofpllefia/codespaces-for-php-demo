<?php
session_start();
require('../../config.php');

if ($_SESSION['user_rol'] !== 'admin') exit("Sense permisos");

$id = (int) $_GET['id'];

$result = $mysqli->query("SELECT * FROM NOTES WHERE id = $id");
$notes = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_alumne = $_POST['id_alumne'];
    $id_modul = $_POST['id_modul'];
    $nota = $_POST['nota'];

    $stmt = $mysqli->prepare(
        "UPDATE NOTES SET id_alumne=?, id_modul=?, nota=? WHERE id=?"
    );
    $stmt->bind_param("iiii", $id_alumne, $id_modul, $nota, $id);
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
    <title>EditNotas</title>
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


.edit-news-container {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
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
    font-size: 14px;
    box-sizing: border-box;
}

textarea {
    min-height: 160px;
    resize: vertical;
}


input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #1a73e8;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.2s;
}

input[type="submit"]:hover {
    background-color: #0c47b7;
}

</style>
<body>
<body>
    <div class="edit-news-container">
        <h1>Editar Notes</h1>

        <form method="POST">

            <label>id_alumne:</label>
            <input type="text" name="id_alumne" value="<?= $notes['id_alumne'] ?>" required>

            <label>id_modul:</label>
            <input type="text" name="id_modul" value="<?= $notes['id_modul'] ?>" required>

            <label>Notas:</label>
            <input type="text" name="notas" value="<?= $notes['notas'] ?>">

            <input type="submit" value="Guardar Canvis">
        </form>
    </div>
</body>

</body>
</html>


