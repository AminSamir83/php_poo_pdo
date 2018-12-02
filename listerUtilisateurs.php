<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 14:41
 */
session_start();
require 'ConnexionPDO.php';



$connexionPDO = ConnexionPDO::getInstance();

$requete="select * from Utilisateur ";

$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$utilisateurs = $reponse->fetchAll(PDO::FETCH_OBJ);
if (!isset($_SESSION['id'])) { header("Location: login.php");};


?>
<html>
<head>
    <title>Liste des utilisateurs</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-left" href="#">GoMyCode Events</a>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li ><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
</header>
<span style="display:block;text-align: center;color: green;font-size:larger; ">Liste des utilisateurs</span>

<table class = "table" style="margin-left:auto;margin-right:auto;display:block;width:100%;">
    <thead class="thead-dark">
    <tr>
        <th>
            ID
        </th>
        <th>
            Prénom
        </th>
        <th>
            Nom
        </th>
        <th>
            Login
        </th>
        <th>
            Email
        </th>
        <th>
            CIN
        </th>
        <th>
            Téléphone
        </th>
        <th>
            Adresse
        </th>
        <th>
            Code Postal
        </th>
        <th>
            Role
        </th>
        <?php if ($_SESSION['role']==='Admin') { ?>
        <th>
            Update
        </th>
        <th>
            Delete
        </th>
        <?php };?>
    </tr>
    </thead>
    <?php foreach ($utilisateurs as $utilisateur) { ?>
        <tr>
            <td>
                <?= $utilisateur->id_user ?>
            </td>
            <td>
                <?= $utilisateur->prenom ?>
            </td>
            <td>
                <?= $utilisateur->nom ?>
            </td>
            <td>
                <?= $utilisateur->login ?>
            </td>
            <td>
                <?= $utilisateur->email ?>
            </td>
            <td>
                <?= $utilisateur->cin ?>
            </td>
            <td>
                <?= $utilisateur->telephone ?>
            </td>
            <td>
                <?= $utilisateur->ville ?>
            </td>
            <td>
                <?= $utilisateur->code_postal ?>
            </td>
            <td>
                <?= $utilisateur->role ?>
            </td>
            <?php if ($_SESSION['role']==='Admin') { ?>
            <td>
                <form action="mettreAJourUtilisateur.php" method="get">
                    <a class="btn btn-dark" value="Update" name="update" href="mettreAJourUtilisateur.php?id=<?=$utilisateur->id_user?>" ?>Update</a>
                </form>
            </td>
            <td>
                <form action="supprimerUtilisateur.php" method="get">
                    <a class="btn btn-dark" value="Delete" name="delete" href='supprimerUtilisateur.php?id=<?= $utilisateur->id_user?>'>Delete</a>
                </form>
            </td>
            <?php }; ?>
        </tr>
    <?php } ?>
</table>



</body>
</html>