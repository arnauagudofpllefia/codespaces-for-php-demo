<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $pelicula1= "El caballero oscuro";
    $pelicula2= "Interestelar";
    $pelicula3= "Uno de los nuestros";
    $pelicula4= "gladiator";
    $pelicula5= "El caballero oscuro: La leyenda renace";
    $img1= "<img src='img/batman.jpg' alt='interestelar'>";
    $img2="<img src='img/interestelar.jpg' alt='#'>";
    $img3="<img src='img/goodfellas.jfif' alt='batman'>";
    $img4="<img src='img/gladiator.jpg' alt='batman'>";
    $img5="<td><img src='img/batman2.jpg' alt='batman'>";
    $punt1="9.8";
    $punt1="7.6";
    $punt1="8.8";
    $punt1="6.9";
    $punt1="9.9";
    ?>
    <h1>Peliculas Favoritas</h1>
    <h2>Tabla</h2>
    <table>
        <tbody>
             <?php
            for($i=0;$i<6;$i++){
                echo"<tr>
                    <td>$pelicula . $i</td>;
                    <td>$img . $i</td>;
                    <td>$punt . $i</td>;
                </tr>";
            };
            ?>
        </tbody>
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Valoración</th>
        </tr>
        <tr>
            <?php
            echo "<td>$pelicula1</td>";
            echo "<td><img src='img/batman.jpg' alt='interestelar'></td>";
            echo "<td>9.8</td>";
            ?>
        </tr>
        <tr>
            <?php
            echo "<td>$pelicula2</td>";
            echo "<td></td>";
            echo "<td>8.9</td>";
            ?>
        </tr>
        <tr>
            <?php
            echo "<td>$pelicula3</td>";
            echo "<td></td>";
            echo "<td>7.5</td>";
            ?>
        </tr>
        <tr>
            <?php
            echo "<td>$pelicula4</td>";
            echo "<td></td>";
            echo "<td>6.6</td>";
            ?>
        </tr>
        <tr>
            <?php
            echo "<td>$pelicula5</td>";
            echo "</td>";
            echo "<td>1.8</td>";
            ?>
        </tr>
    </table>
    <style>
        body img{
            width: 50px;
        }
        
    </style>
</body>
</html>