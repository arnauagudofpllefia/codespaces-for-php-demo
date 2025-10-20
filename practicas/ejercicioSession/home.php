<?php

include('header.php');
$_SESSION['user'] = 'admin';
$_SESSION['contra'] = '1234';


if($_SESSION['user'] === $_POST['user'] && $_SESSION['contra'] = $_POST['contra']){
    echo 'SUPERHEROE';
    echo '<form action="home.php" method="post">';
    echo '<label for="user"></label>';
    echo '<input type="text" name="user">';

}else{
    echo 'Usuario o contraseña incorrectos';
}


?>