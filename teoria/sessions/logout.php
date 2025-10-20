<?php
session_start();
$nombre = $_SESSION['user'];
echo 'Cerrando sesion... de ' . $nombre;
echo '<br>';


echo 'Se ha cerrado con éxito';
echo '<br>';

//borrar solo role
unset( $_SESSION['role']);

//cerrar session
session_destroy();

//redirigir a index.php
header('Location: index.php');

exit();