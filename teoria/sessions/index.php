<?php

session_start();

$_SESSION['user'] = 'Maria';
$_SESSION['role'] = 'admin';

echo 'Sesion iniciado con  éxito';
echo '<br>';
echo 'Usuario: ' . $_SESSION['user'];
echo '<br>';
echo 'Rol: ' . $_SESSION['role'];
echo '<br>';