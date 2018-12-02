<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 16:54
 */

session_start();
$_SESSION['user']=$_POST['login'];
$_SESSION['pwd']=md5($_POST['password']);
echo ($_SESSION['pwd']);
echo "login ".$_SESSION['user']."<br>";
echo "pwd ".$_SESSION['pwd']."<br>";
require 'ConnexionPDO.php';
$connexionPDO = ConnexionPDO::getInstance();
$requete="select id_user,login,password from Utilisateur ";
$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );
$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);

//exit();
$test=false;
foreach ($utilisateurs as $utilisateur)
{
    echo $utilisateur->login;

    //exit();
    if ($_SESSION['user']==$utilisateur->login){
        $test=true;



        $requete2="select password from Utilisateur where id_user=".$utilisateur->id_user;
        var_dump($requete2);

        $reponse2= $connexionPDO->prepare($requete2);
        $reponse2->execute( );
        $password_true = $reponse2->fetch(PDO::FETCH_OBJ);
        echo " password true = <br>";
        var_dump($password_true);

        if ($password_true->password === $_SESSION['pwd'])
        {
            $_SESSION['id']=$utilisateur->id_user;
            $_SESSION['succes']="Bienvenue!";
            $requete3="select role from Utilisateur where id_user=".$_SESSION['id'];
            var_dump($requete3);

            $reponse3= $connexionPDO->prepare($requete3);
            $reponse3->execute( );
            $role_user = $reponse3->fetch(PDO::FETCH_OBJ);
            echo "<br> role_user = <br>";
            var_dump($role_user);
            $_SESSION['role']=$role_user->role;
            echo "<br> session role <br>";
            var_dump($_SESSION['role']);

            header('Location:index.php');

        }
        else {
            $_SESSION['error']="mot de passe incorrect";
            header ('Location: login.php');
        }

    }
}
if ($test === false) { $_SESSION['error']="Utilisateur introuvable";
header('Location:login.php');
}