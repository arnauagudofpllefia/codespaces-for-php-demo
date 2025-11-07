<?php
session_start();

function editarLibro($id, $titulo, $autor, $imagen, $descripcion)
{
    if (isset($_SESSION['libros'][$id])) {
        $_SESSION['libros'][$id] = ["titulo" => $titulo, "autor" => $autor, "imagen" => $imagen, "descripcion" => $descripcion];
    }
}


function agregarLibro($titulo, $autor, $imagen, $descripcion)
{
    
    array_push($_SESSION['libros'], [
        "id" => 3,
        "titulo" => $titulo,
        "autor" => $autor,
        "imagen" => $imagen,
        "descripcion" => $descripcion
    ]);
}

function eliminarLibro($id)
{

    foreach ($_SESSION['libros'] as $libro)
        if ($libro['id'] === $id) {
            unset($_SESSION['libros']);
        }
}
