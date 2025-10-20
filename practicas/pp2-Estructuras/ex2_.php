<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
</head>

<body>
    
    <style>
        body {
            justify-content: center;
            text-align: center;
        }

        .tablas {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .divTabla{
            background-color: lightgreen;
            border: 2px;
            border-radius: 8px;
            padding: 10px;
        }
    </style>
    <h1>Tablas de multiplicar del 1 al 11</h1>
    <div class="tablas">
        <?php
        for ($i = 1; $i <= 11; $i++) {
            echo "<div class='divTabla'>";
            echo "<h2>Tabla del $i</h2>";

            for ($x = 1; $x <= 9; $x++) {
                $resultado = $i * $x;
                echo "$i x $x = $resultado <br>";
            }

            echo "</div>";
        }
        ?>
    </div>

</body>

</html>