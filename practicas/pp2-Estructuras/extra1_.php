<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        text-align: center;
        padding: 30px;
    }

    .div {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .divisor {
        width: 60px;
        padding: 10px;
        background-color: lightblue;
        border-radius: 8px;
    }

    .primo {
        margin-top: 30px;
        font-size: 20px;
        font-weight: bold;

    }
</style>

<body>
    <?php

    $num = rand(1, 100);
    echo "<h2>Numero: $num</h2>";


    $cont = 0;
    echo "<h2>Divisores de $num: ";
    echo "<div class='div'>";
    
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0) {
            echo "<div class='divisor'>$i</div>";
            $cont++;
        }
    }
    echo "</div>";


    if ($cont == 2) {
        echo "<div class='primo'>$num es un numero primo</div>";
    } else {
        echo "<div class='primo'>$num no es un numero primo</div>";
    }
    ?>
</body>

</html>