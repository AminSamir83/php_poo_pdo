<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 29/11/2018
 * Time: 09:42
 */
session_start();
require 'ConnexionPDO.php';

if (!isset($_SESSION['id'])) { header("Location: login.php");};
if ($_SESSION['role']!=='Admin') {header  ('Location : accessdenied.php');};


$connexionPDO = ConnexionPDO::getInstance();
var_dump($_GET['id_event']);
var_dump($_GET['id_user']);
var_dump($_GET['places_rest']);
var_dump($_GET);
$nbp=$_GET['places_rest'];
$requete="UPDATE user_event SET valide=1 WHERE id_event= :id_event and id_user= :id_user";
$nbp --;
$requete2="update evenement set places_rest= :places_rest where id_event= :id_event";
$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array(
    'id_event' => $_GET['id_event'],
    'id_user'=>$_GET['id_user']
));
$reponse2= $connexionPDO->prepare($requete2);
$reponse2->execute(array(
    'places_rest' => $nbp,
    'id_event' => $_GET['id_event']
));
echo "<br>";

$validation = $reponse->fetchAll(PDO::FETCH_OBJ);
$decrementation= $reponse2->fetchAll(PDO::FETCH_OBJ);
var_dump($evenement);

header("location: participationAValider.php");