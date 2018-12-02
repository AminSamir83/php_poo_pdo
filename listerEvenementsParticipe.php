<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 28/11/2018
 * Time: 09:44
 */
session_start();
require 'ConnexionPDO.php';

if (!isset($_SESSION['id'])) { header("Location: login.php");};
$connexionPDO = ConnexionPDO::getInstance();

$requete= "select e.id_event,e.nom,e.date_debut,e.date_fin,e.emplacement,e.places_total,e.places_rest,ue.valide from Evenement e 
inner join user_event ue on e.id_event = ue.id_event 
inner join Utilisateur u  on ue.id_user = u.id_user 
where u.id_user =".$_SESSION['id'];
$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$events = $reponse->fetchAll(PDO::FETCH_OBJ);


?>
<html>
<head>
    <title>Liste de mes événements</title>
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
<span style="display:block;text-align: center;color: green;font-size:larger ">Liste de mes événements</span><br><br>
<table  class = "table" style="margin-left:auto;margin-right:auto;display:block;width:100%;">
    <thead class="thead-dark">
    <tr>
        <th>
            ID
        </th>
        <th>
            Nom de l'évenement
        </th>
        <th>
            Date du début
        </th>
        <th>
            Date de la fin
        </th>
        <th>
            Emplacement
        </th>
        <th>
            Nombre de places totales
        </th>
        <th>
            Nombre de place restantes
        </th>
        <th>
            Particpation Validée
        </th>

    </tr>
    </thead>



    <?php foreach ($events as $event) { ?>
        <tr>
            <td>
                <?= $event->id_event ?>
            </td>
            <td>
                <?= $event->nom ?>
            </td>
            <td>
                <?= $event->date_debut ?>
            </td>
            <td>
                <?= $event->date_fin ?>
            </td>
            <td>
                <?= $event->emplacement ?>
            </td>
            <td>
                <?= $event->places_total ?>
            </td>
            <td>
                <?= $event->places_rest ?>
            </td>

            <td>
                <?php  if ($event->valide) {echo "Oui";} else {echo "En attente de validation";}?>
            </td>

        </tr>
    <?php } ?>
</table>


</body>
</html>