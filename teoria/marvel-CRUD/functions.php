<?php
session_start();

if(!isset($_SESSION['personajes'])){
    $_SESSION['personajes'] = 
    [
        "id" => 0,
        "nombre" => "Iron Man",
        "imagen" => "https://static.wikia.nocookie.net/disney/images/9/96/Iron-Man-AOU-Render.png/revision/latest?cb=20180410032118&path-prefix=es",
        "poder" => "volar",
        "descripcion" => "Tony Stark en modo robot"
    ];
}


//funcion para añadir personajes
function agregarPersonaje( $nombre, $img, $poder, $desc){
    array_push($_SESSION['personajes'],
    [
        
        "nombre" => $nombre,
        "imagen" => $img,
        "poder" => $poder,
        "descripcion" => $desc
    ]
    );
}

function editarPersonaje($id, $nombre, $img, $poder, $desc) {
   
    if (isset($_SESSION['personajes'][$id])) {
        $_SESSION['personajes'][$id] = [
            "nombre" => $nombre,
            "imagen" => $img,
            "poder" => $poder,
            "descripcion" => $desc
        ];
    }
}
