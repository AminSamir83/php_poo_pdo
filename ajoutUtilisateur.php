<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 14:31
 */

session_start();
require 'ConnexionPDO.php';


if ((preg_match('~[0-9]~', $_POST['nom']))  || (preg_match('~[0-9]~', $_POST['prenom'])))
{

    $_SESSION['error_number'] = "Le nom et le prénom ne doivent pas contenir de nombres";
    header('Location: ajouterUtilisateur.php');
    exit();
}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_mail'] = "Veuillez insérer un Email valide";
    header("Location: ajouterUtilisateur.php?id=".$_GET['id_user'] );
    exit();
}



$connexionPDO = ConnexionPDO::getInstance();
$mdp=md5($_POST['password']);
$requete="insert into Utilisateur (prenom,nom,login,password,email,cin,telephone,ville,code_postal,role) values (:prenom,:nom,:login,:password,:email,:cin,:telephone,:ville,:code_postal,'User')";

$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('nom'=>$_POST['nom'],'prenom' => $_POST['prenom'],'cin'=>$_POST['cin'],'login'=>$_POST['login'],'password'=>$mdp,'email' => $_POST['email'],'telephone'=>$_POST['telephone'],'ville'=>$_POST['ville'],'code_postal'=>$_POST['code_postal'] ));
var_dump($reponse);
var_dump($_POST);
$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);
var_dump($utilisateurs);
header("location: listerUtilisateurs.php");
