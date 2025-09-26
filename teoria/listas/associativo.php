<?php

$alumno = [
    'nombre' => 'Juan',
    'apellido' => 'Pérez',
    'edad' => 20,
    'cursos' => 'Daw2',
    'inteligente' => true
];

//echo $alumno;
//var_dump($alumno);
print_r($alumno);

echo $alumno['nombre']; // Juan
echo $alumno['edad']; // 20 
echo $alumno['inteligente']; // 1 (true)


//agregar un elemento
$alumno['ciudad'] = 'Madrid';

echo "<br>";
print_r($alumno);

foreach ($alumno as $clave => $valor) {
    echo "<p>$clave: $valor</p>";
}


?>