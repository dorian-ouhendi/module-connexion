<?php
session_start();
$co = mysqli_connect('localhost:3306','Lira','!Hj67oj1','dorian-ouhendi_module-connexion');
// $co = mysqli_connect('localhost','root','','module-connexion');
$requete = mysqli_query ($co, "SELECT * FROM `utilisateurs`");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navigation">
            <a class="box1" href="index.php"><h2>Acceuil</h2></a>
            <a class="box3" href="profil.php"><h2>Accéder à votre profil</h2></a>
            <a class="box2" href="deconnexion.php"><h2>Déconnexion</h2></a>
        </nav>
    </header>
    <main class="infos">
        <?php 
            while($r = $requete -> fetch_array(MYSQLI_ASSOC)) { 
        ?>
            <table>
                <td>   
                    <tr><h2><?php echo $r['login']; ?> ,</h2></tr>
                    <tr><h2><?php echo $r['prenom']; ?> ,</h2></tr>
                    <tr><h2><?php echo $r['nom']; ?> ,</h2></tr> 
                    <tr><?php echo '<a href="delete.php?id='.$r['id'] . '"><h1>delete<h1></a>';?></tr> 
                </td>
            </table>
        <?php 
            } 
        ?>
    </main>
</body>
<footer>
    
</footer>
</html>
