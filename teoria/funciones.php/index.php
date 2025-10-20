<?php

//funcines en php
function suma($a, $b){
    return $a + $b;
}


generarSaludo("pepe");

function generarSaludo($nombre){
    return "Hola $nombre";
}

echo generarSaludo("Juan");

function calcularTotal($precio, $cantidad, $impuesto){
    $subtotal = $precio * $cantidad;
    $total = $subtotal + ($subtotal * $impuesto / 100);
    return $total;
}

echo calcularTotal(10, 2, 21);

echo "<br>";
echo "<br>";

$palabras = ["hola", "mundo", "esto", "es", "php"];
$palabras_implode = implode(",", $palabras);
echo $palabras_implode;

echo "<br>";

$cadena = "Hola,mundo,esto,es,php";
$palabras_explode = explode(",", $cadena);
print_r($palabras_explode);

?>