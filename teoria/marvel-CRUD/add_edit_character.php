

<?php
session_start();
require_once "functions.php";

//comprovar si venimos para editar o para añadir
$editMode = false; //Nos dice que estamos editando o añadiendo
$id = null;
$nombre = $imagen = $poder = $desc = "";

//Si hay un id en la url estamos editando
if(isset($_GET['id'])){
    $id = $GET['id'];

    if(isset($_SESSION['personajes'][$id])){
        $editMode = true;
        $personaje = $_SESSION['personajes'][$id];

        $nombre = $personaje['nombre'];
        $img = $personaje['imagen'];
        $poder = $personaje['poder'];
        $desc = $personaje['descripcion'];
    
    }
}

//Procesar el form (POST)
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = $_POST['nombre'];
    $img = $_POST['img'];
    $poder = $_POST['poder'];
    $desc = $_POST['descripcion'];
}

if($editMode){
    editarPersonaje($id, $nombre, $img, $poder, $desc);
}else{
    agregarPersonaje($nombre, $img, $poder, $desc);
}