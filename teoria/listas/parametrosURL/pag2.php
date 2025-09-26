<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>esta es la pagina 2</h1>
    <?php
    echo $_GET['nom'];
    echo "<br>";
    echo $_GET['edat'];
    

    //isset -> sirve para comprobar si una variable esta definida
    if(isset($_GET['nom'])){
        $n = $_GET['nom'];
        echo "<br>El nombre es: " . $_GET['nom'];
    } else {
        echo "<br>No hay nombre";
    }
    ?>
</body>
</html>