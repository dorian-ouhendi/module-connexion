<?php 
session_start();

if(isset($_POST['login']) && isset($_POST['password'])){

    $co = mysqli_connect('localhost','root','','module-connexion');
    $login_data = $_POST['login'];
    $verif_user = mysqli_query($co,"SELECT `login` FROM `utilisateurs` WHERE `login`= '$login_data'");
    $result_verif_user = mysqli_fetch_all($verif_user, MYSQLI_ASSOC);

    if(!empty($result_verif_user)){
        $password = $_POST['password'];
        $verif_password = mysqli_query($co,"SELECT * FROM `utilisateurs` WHERE `login`= '$login_data'");
        $result_verif_password = mysqli_fetch_all($verif_password, MYSQLI_ASSOC);
        $password_data = $result_verif_password[0]['password'];

        if(password_verify($password, $password_data)==TRUE){
            $_SESSION['login']= $result_verif_password[0]['login'];
            $_SESSION['prenom']= $result_verif_password[0]['prenom'];
            $_SESSION['nom']= $result_verif_password[0]['nom'];
            $_SESSION['password'] = $result_verif_password[0]['password'];
            if(($result_verif_password[0]['login']) == 'admin'){
                header('location: admin.php');
                 exit();
             }
             else {
            header('location: index.php');
            exit();
            }
        }
        $message = "Votre mot de passe est incorrect";
    }
    else $message = 'Votre login est incorrect';
}
?>
<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>connexion</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <header>
     <?php require ('header.php'); ?>
    </header>
    <main class="costyles">
        <div class="form-container">
            <h1>Welcome</h1>
            <form action="connexion.php" method="POST">
                <div class="login">
                    <input class ="log" type="texte" name="login" placeholder="login..."
                <?php
                    if(isset($_SESSION['login'])){
                    ?>
                    value="<?=$_SESSION['login']?>"
                <?php } ?>>
                    <input class="mdp" type="password" name="password" placeholder="mot de passe...">
                    <input class="bouton" type="submit" value="connexion">
                </div>
                <?php if(isset($message)){ ?>  
                    <h3><?=$message?></h3>
                <?php
                }
                ?>
            </form>
        </div>
    </main>
<footer>
</footer>
</body>
</html>
