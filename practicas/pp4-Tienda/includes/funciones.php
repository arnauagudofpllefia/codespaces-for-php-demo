<?php
include '../data/productos.php';
function generarTablaProductos($productos) {
    echo "<table>";
    echo "<tr><th>Nombre<th/><th>Precio<th/><th>Disponibilidad<th/><tr/>";

    foreach($productos as $producto) {
        $nombre = ucfirst($producto['nombre']); 
        $precio = number_format($producto['precio'], 2); 
        $disponible = $producto['disponibilidad'] ? "En stock" : "Agotado";

        $colorProducto = $producto['disponibilidad'] ? "" : "style='background-color: red;'";

        echo "<tr $colorProducto><td>$nombre<td/><td>$precio<td/><td>$disponible<td/><tr/>";
    };

    echo "<table/>";
    
};

function muestraInfoContacto(){
    echo '<p>Información de contacto: <p/>';
    echo '<p>Arnau Agudo<p/>';
    echo '<p>654332556<p/>';
    echo "<img src=" . $_GET['urlImg'] . " alt='imgPerfil'>";
}

?>