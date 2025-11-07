<?php
session_start();
require_once "functions.php";


if ($_SESSION['role'] !== "admin") {
    header("Location: home.php");
    exit();
}

$id = $_GET['id'];

eliminarLibro($id);

header('Location: home.php');
exit();