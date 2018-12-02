<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 15:42
 */
session_start();
require 'ConnexionPDO.php';

if (!isset($_SESSION['id'])) { header("Location: login.php");};
if ($_SESSION['role']!=='Admin') {header  ('Location : accessdenied.php');};

$date_now = new DateTime();
$date_debut  = $_GET['date_debut'];
$date_fin = $_GET['date_fin'];

if($date_fin<$date_debut)
{
    $_SESSION['error_date'].=" La date de fin doit être supérieure à la date courante ";
    header ('Location: mettreAJourEvenement.php');
    die();
}





$connexionPDO = ConnexionPDO::getInstance();
$requete2="select count(*) as NBR from user_event where id_event=:id_event";
$reponse2= $connexionPDO->prepare($requete2);
$reponse2->execute(array(
    'id_event' => $_GET['id_event'],
));
$nombre = $reponse2->fetch(PDO::FETCH_OBJ);
echo "<br> nombre <br>";
var_dump($nombre);
echo "<br> int nombre nbr <br>";
$nbr= (int)$nombre->NBR;
var_dump($nbr );
echo "<br> _get places_total<br>";
var_dump((int)($_GET['places_total']));
echo "<br> comparaison <br>";
var_dump($nbr >(int)($_GET['places_total']));
if ($nbr >(int)($_GET['places_total']))
{
    $_SESSION['error_nbr'].= " Le nombre de places totales doit être supérier au nombre de réservations validées ";
    header ('Location: mettreAJourEvenement.php?id='.$_GET['id_event']);
    die();
}


$places_rest= (int)$_GET['places_total']-$nbr;
echo "<br>places_rest <br>";
var_dump($places_rest);
$requete="UPDATE Evenement SET id_event= :id_event,nom= :nom,date_debut= :date_debut, date_fin= :date_fin,emplacement= :emplacement, places_total= :places_total, places_rest= :places_rest WHERE id_event= :id_event";
$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('nom'=>$_GET['nom'],
    'id_event' => $_GET['id_event'],
    'date_debut'=>$_GET['date_debut'],
    'date_fin'=>$_GET['date_fin'],
    'emplacement'=>$_GET['emplacement'],
    'places_total'=>$_GET['places_total'],
    'places_rest' => "".$places_rest
));
echo "<br>";

$evenement = $reponse->fetchAll(PDO::FETCH_OBJ);
echo "<br> evenement <br>";
var_dump($evenement);
header("location: listerEvenements.php");