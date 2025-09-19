<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria 1</title>
</head>
<body>
    <h1>pp1 teoria</h1>

    <?php
    echo '<h2>Hola subtitulo</h2>';
    echo "Hola mundo con dos comillas ";
    echo "<br>";

        $nom = 'Arnau';
        $apellido = "Agudo";
        $edad = 20;
        $frase = "Hola soy $nom $apellido y tengo $edad años";
        echo "Hola me llamo " . $nom . " tengo " . $edad;
        echo "<br>";
        echo $frase;
        echo "<br>";

        //condicionale

        //if

        if($edad<22){
            echo "eres mayor de edad";
        }else{
            echo "eres menor de edad";
        }
        //==
        //%
        //!=
        //<= <= < >

        //bucles

        
    ?>

    <section class="divPadre">
        <h1>Numeros 0-10</h1>
        <?php
        for($i=0;$i<=10;$i++){
            echo "<div class=\"num-box\">Numero: $i <br></div>";
            echo '<div class="num-box">Numero: ' . $i . ' <br></div>';
            echo "<div class='num-box'>Numero: $i <br></div>";
        }
        ?>
    </section>
    <style>
        .num-box{
            background-color: red;
            padding: 2rem;
        }
        .divPadre{
            background-color: green;
            gap: 1px;
            display: flex;
            flex-wrap: wrap;    
        }
    </style>
</body>
</html>