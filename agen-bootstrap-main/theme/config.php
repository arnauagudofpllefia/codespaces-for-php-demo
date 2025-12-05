<?php
$host = 'mysql-arnauagudo.alwaysdata.net';
$dbname = 'arnauagudo_pp6';
$username = '439979';
$password = 'Daw2_2526';



$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error){
    die("Error de conexión: " . $mysqli->connect_error);
}//else{
 //   echo "Conexion existosa a la base de datos gestor_notas_uab";
//}

