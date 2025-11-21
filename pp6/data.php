<?php 

require 'config.php';

$users = $mysqli->query("SELECT * FROM usuaris");
echo "<br>";
var_dump($users);

$resultUsers = $users->fetch_all(MYSQLI_ASSOC);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


function returnUserData(){
    global $mysqli;
    $users = $mysqli->query("SELECT * FROM usuaris");
    $resultUsers = $users->fetch_all(MYSQLI_ASSOC);
    return $resultUsers;
}