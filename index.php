<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Acceuil</title>
</head>
<body>
  <header>
    <?php
      require ('header.php');
      if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
    ?>
  </header>
  <main class="wallpaper">
      <h1>Bienvenu</h1>
      <a class="link" href="https://github.com/dorian-ouhendi/module-connexion.git"><h2>Github</h2></a>
  </main>
</body>
</html>