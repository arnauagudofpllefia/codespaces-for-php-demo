<?php

$alumnos = [
    [
        'nombre' => 'Juan',
        'apellido' => 'Pérez',
        'edad' => 20,
        'cursos' => 'Daw2',
        'inteligente' => true
    ],
    [
        'nombre' => 'María',
        'apellido' => 'Gómez',
        'edad' => 22,
        'cursos' => 'Daw2',
        'inteligente' => false
    ],
    [
        'nombre' => 'Luis',
        'apellido' => 'Martínez',
        'edad' => 21,
        'cursos' => 'Daw2',
        'inteligente' => true
    ]
];

foreach ($alumnos as $alumno) {
    echo "<h2>Alumno: " . $alumno['nombre'] . " " . $alumno['apellido'] . "</h2>";
    echo "<p>Edad: " . $alumno['edad'] . "</p>";
    echo "<p>Cursos: " . $alumno['cursos'] . "</p>";
    echo "<p>Inteligente: " . ($alumno['inteligente'] ? 'Sí' : 'No') . "</p>";
    echo "<hr>";


}

?>