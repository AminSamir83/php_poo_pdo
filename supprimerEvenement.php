<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 14:57
 */
session_start();
require 'ConnexionPDO.php';

if (!isset($_SESSION['id'])) { header("Location: login.php");};
if ($_SESSION['role']!=='Admin') {header  ('Location : accessdenied.php');};
$connexionPDO = ConnexionPDO::getInstance();

$requete="delete from  Evenement where id_event=".$_GET['id'];

$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$evenement = $reponse->fetch(PDO::FETCH_OBJ);

header("location: listerEvenements.php");
?>