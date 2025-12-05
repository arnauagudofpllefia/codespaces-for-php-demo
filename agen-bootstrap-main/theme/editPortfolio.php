<?php
session_start();
require('config.php');

if ($_SESSION['user_rol'] !== 'admin') exit("Sense permisos");

$id = (int) $_GET['id'];

$result = $mysqli->query("SELECT * FROM portfolio WHERE id = $id");
$portfolio = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titol = $_POST['titol'];
    $descripcio = $_POST['descripcio'];
    $imatge = $_POST['imatge'];
    $categoria = $_POST['categoria'];

    $stmt = $mysqli->prepare(
        "UPDATE portfolio SET titol=?, descripcio=?, imatge=?, categoria=? WHERE id=?"
    );
    $stmt->bind_param("ssssi", $titol, $descripcio, $imatge, $categoria, $id);
    $stmt->execute();

    header("Location: adminPorfolio.php");
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
        <h1>Editar Portfolio</h1>

        <form method="POST">

            <label>Títol:</label>
            <input type="text" name="titol" value="<?= $portfolio['titol'] ?>" required>

            <label>Descripcio:</label>
            <input type="text" name="descripcio" value="<?= $portfolio['descripcio'] ?>">

            <label>Imatge:</label>
            <input type="text" name="imatge" value="<?= $portfolio['imatge'] ?>" required>

            <label>Categoría:</label>
            <input type="text" name="categoria" value="<?= $portfolio['categoria'] ?>" required>

            <input type="submit" value="Guardar Canvis">
        </form>

    </div>
</body>

</body>
</html>


