<?php
// Rebuda de dades del formulari
$nom = $_POST['nom'] ?? 'Alumne';
$cognoms = $_POST['cognoms'] ?? 'Desconegut';

// Array multidimensional amb la informació de cada casa
$casas_info = [
  "Gryffindor" => [
    "background_color" => "#740001",
    "text_color" => "#FFD700",
    "welcome_message" => "Coratge, valor i determinació. Benvingut a Gryffindor!",
    "message_background" => "#D3A625",
    "image" => "https://1000marcas.net/wp-content/uploads/2021/11/Gryffindor-Logo.png"
  ],
  "Hufflepuff" => [
    "background_color" => "#FFDB00",
    "text_color" => "#60605B",
    "welcome_message" => "Lleialtat, paciència i treball dur. Benvingut a Hufflepuff!",
    "message_background" => "#EEE117",
    "image" => "https://i.pinimg.com/originals/3d/db/2f/3ddb2f1758b2c930a3100aa3c99cd6c7.png"
  ],
  "Ravenclaw" => [
    "background_color" => "#0E1A40",
    "text_color" => "#946B2D",
    "welcome_message" => "Intel·ligència, creativitat i saviesa. Benvingut a Ravenclaw!",
    "message_background" => "#5D5D5D",
    "image" => "https://logos-world.net/wp-content/uploads/2022/11/Ravenclaw-Symbol.png"
  ],
  "Slytherin" => [
    "background_color" => "#1A472A",
    "text_color" => "#AAAAAA",
    "welcome_message" => "Ambició, astúcia i lideratge. Benvingut a Slytherin!",
    "message_background" => "#5D5D5D",
    "image" => "https://static.wikia.nocookie.net/esharrypotter/images/d/d0/Logo_Slytherin_2.png/revision/latest?cb=20160417160853"
  ]
];

// Selecció aleatòria d'una casa
$casas = array_keys($casas_info);
$casa_seleccionada = $casas[array_rand($casas)];
$info = $casas_info[$casa_seleccionada];
?>
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Benvingut a la teva casa de Hogwarts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: <?= $info['background_color'] ?>;
      color: <?= $info['text_color'] ?>;
    }
    .welcome-message {
      background-color: <?= $info['message_background'] ?>;
      color: <?= $info['text_color'] ?>;
      padding: 20px;
      border-radius: 10px;
      display: inline-block;
    }
    img {
      max-width: 200px;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container text-center mt-5">
    <h1>🎩 El Sombrero Seleccionador ha decidit...</h1>
    <h2 class="mt-3">🏠 <strong><?= $casa_seleccionada ?></strong> 🏠</h2>
    <div class="welcome-message mt-4">
      <p><strong><?= htmlspecialchars($nom) . " " . htmlspecialchars($cognoms) ?></strong>,</p>
      <p><?= $info['welcome_message'] ?></p>
    </div>
    <div>
      <img src="<?= $info['image'] ?>" alt="Escut de <?= $casa_seleccionada ?>">
    </div>
    <div class="mt-4">
      <a href="index.php" class="btn btn-light">🔙 Tornar</a>
    </div>
  </div>
</body>
</html>
