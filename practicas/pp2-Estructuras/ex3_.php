<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero aleatorio par o impar</title>
</head>
<style>
    body {
        justify-content: center;
        text-align: center;
    }

    .numero{
        padding-left: 800px;
    }

    .par {
        color: white;
        background-color: blue;
        padding: 20px;
        margin: 20px;
        text-align: center;
        border-radius: 8px;
        font-size: 24px;
        width: 200px;
    }

    .inpar {
        background-color: red;
        padding: 20px;
        margin: 20px;
        text-align: center;
        border-radius: 8px;
        font-size: 24px;
        width: 200px;
    }
</style>

<body>
    <h1>Numero aleatorio par o inpar</h1>
    <div class="numero">
        <?php
        $num = rand(0, 100);

        if ($num % 2 == 0) {
            echo "<div class='par'>$num es par</div>";
        } else {
            echo "<div class='inpar'>$num es inpar</div>";
        }
        ?>

    </div>

</body>

</html>