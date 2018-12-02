<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 28/11/2018
 * Time: 09:33
 */
session_start();
require 'ConnexionPDO.php';
$connexionPDO = ConnexionPDO::getInstance();
if (!isset($_SESSION['id'])) { header("Location: login.php");};

$requete="insert into user_event (id_user,id_event) values (:id_user,:id_event)";

$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('id_user'=>$_GET['id_user'],'id_event' => $_GET['id_event'] ));

$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);

header("location: listerEvenementsParticipe.php");