<?php
$dies=['dilluns','dimarts','dimecres','dijous','divendres'];


echo $dies[0]; //dilluns
echo $dies[2]; //dimecres             
echo $dies[4];//divendres

// Afegir un element al final de l'array
$dies[]='dissabte';
array_push($dies,'diumenge');
// eliminar un element al final de l'array
array_pop($dies);

//recorrer con foreach
foreach($dies as $dia){
    echo "<p>$dia</p>";
}
?>