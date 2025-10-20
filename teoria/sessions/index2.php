<?php
session_start();
echo 'Bienvenidos a Index2.php';
echo '<br>';

echo 'Usuario: ' . $_SESSION['user'];

?>