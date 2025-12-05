<?php
session_start();
require_once ('config.php');

if($_SESSION['user_rol'] !== 'admin')exit('Sin permisos');

$id = (int) $_GET['id'];
$stmt = $mysqli->prepare("DELETE FROM productos WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
header('Location: index.php');
exit();
