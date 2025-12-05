<?php

require 'config.php';

// Obtener todos los registros de la tabla portafolio
$portafolios = $mysqli->query("SELECT * FROM portfolio");

if (!$portafolios) {
    die("Error en la consulta: " . $mysqli->error);
}

$resultPortafolios = $portafolios->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        img{
            width: 100px;
        }

        header{
            background-color: #343a40;
            padding: 10px 0;
        }

        .container {
            max-width: 1200px;
            margin: 200px auto;

        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

       
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        
        .card {
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            border-radius: 10px;
            max-height: 200px;
            object-fit: cover;
        }

        .card h3 {
            margin: 15px 0 10px;
            color: #333;
            font-size: 18px;
        }

       


    </style>
</head>

<body>

    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="index.html"><img src="images/logoArcanau.png" alt="Egen"></a>
            

            <div class="collapse navbar-collapse text-center" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="portafolio.php">Portfolio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="team.html">Team</a>
                            <a class="dropdown-item" href="team-single.html">Team Details</a>
                            <a class="dropdown-item" href="career.html">Career</a>
                            <a class="dropdown-item" href="career-single.html">Career Details</a>
                            <a class="dropdown-item" href="blog-single.html">Blog Details</a>
                            <a class="dropdown-item" href="pricing.html">Pricing</a></a>
                            <a class="dropdown-item" href="faqs.html">FAQ's</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>Catálogo</h1>

        <div class="cards">
            <?php foreach ($resultPortafolios as $portafolio): ?>

                <div class="card">
                    <?php
                    echo "<h1>" . $portafolio["titol"] . "</h1>";
                    echo '<img src="' . $portafolio["imatge"] . '" alt="Imagen">';
                    echo "<p>" . $portafolio["descripcio"] . "</p>";
                    echo "<p>" . $portafolio["categoria"] . "</p>";
                    ?>

                </div>

            <?php endforeach; ?>
        </div>

    </div>

</body>

</html>