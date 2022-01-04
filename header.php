<?php
  if(isset($_SESSION['login'])){
    echo '<nav class="navigation"><a class="box1" href="profil.php"><h2>Accéder à votre profil</h2></a>';
    echo '<a class="box2" href="deconnexion.php"><h2>Déconnexion</h2></a>';
    if($_SESSION['login'] == 'admin'){
      ?>
      <a class="box4" href="admin.php"><h2>Page admin</h2></a></nav>
      <?php
    }
  }
  else{
  ?>
  <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <nav class="navigation">
      <a class="box1" href="connexion.php"><h2>Connexion</h2></a>
      <a class="box2" href="inscription.php"><h2>inscription</h2></a>
    </nav>
  </header>
  <?php
  }
?>

    
