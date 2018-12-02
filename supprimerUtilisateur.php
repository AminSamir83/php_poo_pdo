<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 11:33
 */

session_start();
require 'ConnexionPDO.php';
$connexionPDO = ConnexionPDO::getInstance();

if (!isset($_SESSION['id'])) { header("Location: login.php");};
if ($_SESSION['role']!=='Admin') {header  ('Location : accessdenied.php');};

$requete="delete from  Utilisateur where id_user=".$_GET['id'];

$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$utilisateur = $reponse->fetch(PDO::FETCH_OBJ);

header("location: listerUtilisateurs.php");
?>