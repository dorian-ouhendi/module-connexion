<?php
session_start();
$co = mysqli_connect('localhost:3306','Lira','!Hj67oj1','dorian-ouhendi_module-connexion');
// $co = mysqli_connect('localhost','root','','module-connexion');
$login_data = $_SESSION['login'];
$verif_user = mysqli_query($co,"SELECT * FROM `utilisateurs` WHERE `login`= '$login_data'");
$result_select_data = mysqli_fetch_all($verif_user, MYSQLI_ASSOC);
$pass_data = $result_select_data[0]['password'];
?>

<!DOCTYPE html>
<html lang="fr">
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
  <header>
    <nav class="navigation">
      <a class="box1" href="index.php"><h2>Acceuil</h2></a>
      <a class="box2" href="deconnexion.php"><h2>Déconnexion</h2></a>
    </nav>
  </header>
  <main class="costyles">
    <form class="form-container" action="" method="POST">
      <input class="log" type="text" name="login" value="<?=$_SESSION['login']?>">
      <input class="prenom" type="text" name="prenom" value="<?=$_SESSION['prenom']?>">
      <input class="name" type="text" name="nom" value="<?=$_SESSION['nom']?>">
      <input class="mdp" type="password" name="password"  value="<?=$pass_data?>">
      <input class="bouton" type="submit" value="changer">
      <?php
        if(isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])){
          $login = $_POST['login'];
          $prenom = $_POST['prenom'];
          $nom = $_POST['nom'];
          $pass_post = $_POST['password'];
          if($pass_post!=$pass_data){
            $password = password_hash($pass_post, PASSWORD_DEFAULT);
          }
          else{
            $password = $pass_post;
          }
        
            $verif_login = mysqli_query($co,"SELECT * FROM `utilisateurs` WHERE `login`= '$login'");
            $result_verif_login = mysqli_fetch_all($verif_login, MYSQLI_ASSOC);
         
               if(empty($result_verif_login) || ($result_select_data[0]['id'] == $result_verif_login[0]['id'])){    
           
                  $requete_update_data = mysqli_query($co, "UPDATE `utilisateurs` SET `login`='$login',`prenom`='$prenom',`nom`='$nom',`password`='$password' WHERE `login` = '$login_data'");
                  $request = mysqli_query($co, "SELECT*FROM utilisateurs WHERE login = '$login'");
                  $result = $request-> fetch_array(MYSQLI_ASSOC);
                  unset($_POST);
                  $_SESSION['login']= $login;
                  $_SESSION['prenom']= $prenom;
                  $_SESSION['nom']= $nom;
                  header('location: index.php');
                  exit();
                }
                else{
                  echo '<h3>Ce login est indisponible</h3>';
                }
        }
      ?>
    </form>
  </main>
<footer>

</footer>
</body>
</html>