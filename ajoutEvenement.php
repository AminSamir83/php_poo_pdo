<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 15:03
 */
session_start();
require 'ConnexionPDO.php';


$date_now = date("Y-m-d");
echo " <br> date courante = $date_now ";
$date_debut    = $_POST['date_debut'];
echo " <br> date courante = $date_debut ";
$date_fin = $_POST['date_fin'];
echo " <br> date courante = $date_fin ";
echo "<br>";
var_dump($date_now > $date_debut);


if ($date_now > $date_debut==true) {
    $_SESSION['error_date'].=" La date du début doit être supérieure à la date courante ";
    header ('Location: ajouterEvenement.php');
    die();
}
if($date_fin<$date_debut)
{
    $_SESSION['error_date'].=" La date de fin doit être supérieure à la date courante ";
    header ('Location: ajouterEvenement.php');
    die();
}
if ($date_fin<$date_now)
{
    $_SESSION['error_date'].= " La date de fin doit être supérieure à la date courante ";
    header ('Location: ajouterEvenement.php');
    die();
}


if (!isset($_SESSION['id'])) { header("Location: login.php");};
if ($_SESSION['role']!=='Admin') {header  ('Location : accessdenied.php');};




$connexionPDO = ConnexionPDO::getInstance();

$requete="insert into Evenement (nom,date_debut,date_fin,emplacement,places_total,places_rest) values (:nom,:date_debut,:date_fin,:emplacement,:places_total,:places_total)";

$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('nom'=>$_POST['nom'],
    'date_debut' => $_POST['date_debut'],
    'date_fin'=>$_POST['date_fin'],
    'emplacement'=>$_POST['emplacement'],
    'places_total'=>$_POST['places_total']
     ));

$evenement = $reponse->fetchAll(PDO::FETCH_OBJ);

header("location: listerEvenements.php");