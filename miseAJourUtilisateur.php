<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 12:00
 */
session_start();
require 'ConnexionPDO.php';
if (!isset($_SESSION['id'])) { header("Location: login.php");};
if ($_SESSION['role']!=='Admin') {header  ('Location : accessdenied.php');};

if ((preg_match('~[0-9]~', $_GET['nom']))  || (preg_match('~[0-9]~', $_GET['prenom'])))
{

    $_SESSION['error_number'] = "Le nom et le prénom ne doivent pas contenir de nombres";
    header("Location: mettreAJourUtilisateur.php?id=".$_GET['id_user'] );
    exit();
}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_mail'] = "Veuillez insérer un Email valide";
    header("Location: mettreAJourUtilisateur.php?id=".$_GET['id_user'] );
    exit();
}
$connexionPDO = ConnexionPDO::getInstance();
var_dump($_GET['id_user']);
$id=$_GET['id_user'];
var_dump($_GET);
$requete="UPDATE Utilisateur SET id_user= :id_user,prenom= :prenom,nom= :nom,login= :login,password= :password,email= :email, cin= :cin, telephone= :telephone, ville= :ville, code_postal= :code_postal, role= :role WHERE id_user=".$id;

$reponse= $connexionPDO->prepare($requete);
$reponse->execute(array('nom'=>$_GET['nom'],
    'prenom' => $_GET['prenom'],
    'cin'=>$_GET['cin'],
    'id_user'=>$_GET['id_user'],
    'login'=>$_GET['login'],
    'password'=>$_GET['password'],
    'email' => $_GET['email'],
    'telephone'=>$_GET['telephone'],
    'ville'=>$_GET['ville'],
    'code_postal'=>$_GET['code_postal'],
    'role'=>$_GET['role']
    ));

$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);


header("location: listerUtilisateurs.php");