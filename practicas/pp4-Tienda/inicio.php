<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        text-align: center;
        justify-items: center;
        margin: 200px;
        background-color: lightgreen;
    }
    form{
        height: 400px;
        width: 300px;
        display:grid;
    }
</style>
<body>
    <form action="index.php" method="get">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="number" name="telefono" placeholder="Telefono">
        <input type="url" name="urlImg" placeholder="URL Imagen">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>