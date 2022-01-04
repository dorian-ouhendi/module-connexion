<?php 
session_start();
$co = mysqli_connect('localhost','root','','module-connexion');
$test = $_GET['id'];
echo $test;
$delete = mysqli_query ($co,"DELETE FROM `utilisateurs` WHERE `id` = '$test'");
header('location:'.'admin.php');
?>