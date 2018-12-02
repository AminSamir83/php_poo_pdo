<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 29/11/2018
 * Time: 09:27
 */
session_start();
require 'ConnexionPDO.php';
$connexionPDO = ConnexionPDO::getInstance();

if (!isset($_SESSION['id'])) { header("Location: login.php");};
if ($_SESSION['role']!=='Admin') {header  ('Location : accessdenied.php');};

$requete="delete from  user_event where id_event=".$_GET['id_event']." and id_user=".$_GET['id_user'];

$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$evenement = $reponse->fetch(PDO::FETCH_OBJ);
var_dump($evenement);

die($requete);
header("location: participationAValider.php");