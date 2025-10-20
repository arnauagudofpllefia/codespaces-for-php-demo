<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros pares entre 50 y 500</title>
</head>

<body>
    
    <style>
        body{
            text-align: center;
            justify-content: center;
        }
        .numeros{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            width: 800px;
            margin-left: 550px;
            background-color: paleturquoise;
            border: 2px;
            border-radius: 8px;
            padding: 20px;
        }
    </style>
    <h2>Numeros pares entre 50 y 500</h2>
    <div class="numeros">
        <?php
        for ($i = 50; $i <= 500; $i++) {
            if ($i % 2 == 0) {
                echo "<div>$i</div>";
            }
        }
        ?>
    </div>
    


</body>

</html>