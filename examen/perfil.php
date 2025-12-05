<?php

$stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE nombre = ?");

$stmt->bind_param("s", $_SESSION['user_nom']);
$stmt->execute();

$resultPerfil = $stmt->get_result();

$perfil = $resultPerfil->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
            <?php foreach($perfil as $p): ?>
            <tr>
                <td><?= $p['nombre'] ?></td>
                <td><?= $p['correo'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>