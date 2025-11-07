<?php
session_start();

if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "lector") {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$photo = $_SESSION['fotoPerfil'];
$role = $_SESSION['role'];


if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [
        [
            "id" => "0",
            "titulo" => "Las aventuras de Joel e Ivan",
            "autor" => "Joel e Ivan",
            "descripcion" => "Un libro que narra las emocionantes aventuras de dos amigos inseparables.",
            "imagen" => "https://www.mumuchu.com/media/catalog/product/cache/babc9c3930426724bed95a50193e0e01/l/i/libro-puedo-mirar-tu-pa_al-1.jpg"
        ],
        [
            "id" => "1",
            "titulo" => "Simón el cochino",
            "autor" => "María Roxana Muñoz",
            "descripcion" => "Un libro que narra las emocionantes aventuras de Simón el cochino.",
            "imagen" => "https://static.comunicae.com/photos/notas/1190604/1509154737_Simo_n_Web.jpg"
        ]
    ];
    $libro = $_SESSION['libros'];
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Encabezado del usuario -->
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <?php echo "<img src=" . $photo . " alt='Foto de perfil' class='w-25 rounded-circle me-3'>" ?>
                <div>
                    <?php echo "<h4 class='m-0'>👋 Bienvenido, " . $username . "</h4>";

                    if ($role === "admin") {
                        echo "<p class='text-muted m-0'><i class='fas fa-user-shield text-success'></i> Admin ✏️</p>";
                    } else {

                        echo "<p class='text-muted m-0'>Lector 📚</p>";
                    }
                    ?>

                </div>
            </div>
            <a href="logout.php" class="btn btn-warning btn-sm">
                Cerrar sesión ❌
            </a>
            <a href="destroy.php" class="btn btn-warning btn-sm">
                Destroy Session ❌
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Biblioteca Virtual</h1>
            <p class="lead">Disfruta explorando nuestra colección de libros</p>
        </div>

        <!-- Botón de agregar libro (solo visible para el admin) -->
        <?php if ($role === "admin") {
            echo "<div class='text-center mb-4'>";
            echo "<a href='add_edit_book.php' class='btn btn-outline-success btn-lg'>";
            echo "<i class='fas fa-plus-circle me-2'></i>Agregar Nuevo Libro";
            echo "</a>";
            echo "</div>";
        }
        ?>


        <!-- Mostrar lista de libros en un grid de tarjetas con tamaño uniforme -->
        <?php
        foreach ($_SESSION['libros'] as $libro) {
            echo "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4'>";

            echo "<div class='col'>";
            echo "<div class='card h-100 shadow-sm'>";

            echo "<img src=" . $libro['imagen'] . " class='card-img-top' alt='' style='height: 400px; object-fit: cover;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'> Titulo: " . $libro["titulo"] . "</h5>";
            echo "<p class='card-text'><strong>Autor: </strong>" . $libro["autor"] . "</p>";
            echo "<p class='card-text'>" . $libro["descripcion"] . "</p>";


            echo "</div>";

            //<!-- Botones de editar y eliminar (solo visible para el admin) -->
            if ($role === "admin") {
                echo "<div class='card-footer d-flex justify-content-between'>";
                echo "<a href='add_edit_book.php?id=" . $libro['id'] ."' class='btn btn-outline-primary btn-sm'>";
                echo "<i class='fas fa-edit'></i> Editar";
                echo "</a>";
                echo "<a href='delete_book.php?id='" . $libro['id'] ." class='btn btn-outline-danger btn-sm'>";
                echo "<i class='fas fa-trash-alt'></i> Eliminar";
                echo "</a>";
                echo "</div>";
            }

            echo "</div>";
            echo "</div>";
        

    echo "</div>";
    }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>