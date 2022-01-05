<?php
  session_start();
  $co = mysqli_connect('localhost:3306','Lira','!Hj67oj1','dorian-ouhendi module-connexion');
  $requete = mysqli_query($co,"SELECT * FROM `utilisateurs`");
  $requete1 = mysqli_fetch_all($requete, MYSQLI_ASSOC);
  if(!empty($_POST['login'])&& !empty($_POST['prenom'])&& !empty($_POST['nom']) &&!empty($_POST['password']) &&!empty($_POST['passwordv'])){

    if($_POST['password'] == $_POST['passwordv']){
      $login_data = $_POST['login'];
      $verif_user = mysqli_query($co,"SELECT `login` FROM `utilisateurs` WHERE `login`= '$login_data'");
      $result_verif_user = mysqli_fetch_all($verif_user, MYSQLI_ASSOC);

      if($result_verif_user==NULL){
        $prenom_data = $_POST['prenom'];
        $nom_data = $_POST['nom'];
        $pass = $_POST['password'];
        $password_data = password_hash($pass, PASSWORD_DEFAULT);
        $query_insert = mysqli_query($co, "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login_data','$prenom_data','$nom_data','$password_data')");
        $_SESSION['login']= $login_data;
        header('location:'.'index.php');
        exit();
      }
      else $message = "choisissez un autre login";
    }
    else $message = 'Veuillez mettre les mêmes mot de passe';
  }
  else $message= 'remplir tout les champs';
//   if(isset($_POST['prenom'])){
// $index = 0;
//   while(isset($requete1[$index])){
//     if($_POST['prenom']== $requete1[$index]['prenom']){
//       echo $requete1[$index]['prenom'].' '.$requete1[$index]['nom'];
//       break;
//     }
//     elseif($requete1[$index]==$requete1[7]){
//       echo "j'ai pas trouvé !";
//     }
//     $index = $index +1;
//   }
// }
?>
<!DOCTYPE html>
<html lang="fr">
<html>
  <head>
    <link rel="styleshseet" href="styles.css">
    <meta charset="UTF-8">
    <?php require 'header.php';?>
  </head>
  <body>
  <main class="form-box">
    <form class="form-container" action="" method="post">
      <input class="log" type="text" name="login" placeholder="login...">
      <input class="prenom" type="text" name="prenom" placeholder="prénom...">
      <input class="name" type="text" name="nom" placeholder="nom...">
      <input class="mdp" type="password" name="password" placeholder="mot de passe...">
      <input class="mdp" type="password" name="passwordv" placeholder="reecrir mot de passe...">
      <input class="bouton" type="submit" value="s'incrire">
        <?php if(isset($message)){ ?>
          <h3><?=$message?></h3>
        <?php } ?>
    </form>
  </main>
</body>
</html>