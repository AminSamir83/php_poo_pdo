<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 14:17
 */
session_start();
require 'ConnexionPDO.php';


/*if ((preg_match('~[0-9]~', $_POST['nom']))  || (preg_match('~[0-9]~', $_POST['prenom'])))
{

    $_SESSION['error'] = "Le nom et le prénom ne doivent pas contenir de nombres";
    header('Location: ajouterUtilisateurs.php');
    }*/







$connexionPDO = ConnexionPDO::getInstance();

$requete="insert into Utilisateur (prenom,nom,login,password,email,cin,telephone,ville,code_postal,role) values (:prenom,:nom,:login,:password,:email,:cin,:telephone,:ville,:code_postal,:role)";

$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('nom'=>$_POST['nom'],'prenom' => $_POST['prenom'],'cin'=>$_POST['cin'],'login'=>$_POST['login'],'password'=>$_POST['password'],'email' => $_POST['email'],'telephone'=>$_POST['telephone'],'ville'=>$_POST['ville'],'code_postal'=>$_POST['code_postal'],'role' => $_POST['role'] ));

$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);

header("location: listerEvenements.php");
