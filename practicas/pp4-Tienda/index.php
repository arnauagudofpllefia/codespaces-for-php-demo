<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    include 'includes/header.php';
    include 'includes/footer.php';
    include 'includes/funciones.php';
    include 'data/productos.php';
    
    echo generarTablaProductos($productos);
    echo muestraInfoContacto();
    
    ?>
</body>

</html>