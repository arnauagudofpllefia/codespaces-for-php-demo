<?php 
session_start();
require_once('config.php');

if(!isset($_SESSION['user_rol']) || $_SESSION['user_rol'] !== 'admin'){
    header('Location: ../../nopermission.php');
    exit();
}

if(!isset($_GET['id']) || empty($_GET['id'])){

}

$stmt = $mysqli->prepare("DELETE FROM noticies WHERE id = ?");
if(!$stmt){
    die('Error rn la preparación: ' . $mysqli->error);
}

$stmt->bind_param('i', $news_id);

