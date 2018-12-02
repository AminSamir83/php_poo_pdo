<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 28/11/2018
 * Time: 10:18
 */
session_start();
require 'ConnexionPDO.php';


$connexionPDO = ConnexionPDO::getInstance();

$requete= "
select e.id_event,e.nom,e.date_debut,e.date_fin,e.emplacement,e.places_total,e.places_rest,ue.valide 
from Evenement e 
inner join user_event ue on e.id_event = ue.id_event 
inner join Utilisateur u  on ue.id_user = u.id_user 
where u.id_user =".$_SESSION['id'];
$reponse= $connexionPDO->prepare($requete);
$reponse->execute( );

$events = $reponse->fetchAll(PDO::FETCH_OBJ);
//echo "<br> evenements auxquels je participe <br>";
//var_dump($events);
$tab = array();

foreach ($events as $event)
{ array_push($tab,$event->id_event);}
//echo "<br> tableau <br>";
//var_dump($tab);
$str=implode(",",$tab);
$str2="(".$str.")";
//echo "<br> chaine <br>";
//echo "$str2";
if ($str2!=="()") {
$requete2= "
select * from Evenement 
where id_event not in $str2";
}
else {
    $requete2= "
select * from Evenement 
";
}
$reponse2= $connexionPDO->prepare($requete2);
$reponse2->execute( );
//echo "<br> requete<br>";
//var_dump($requete2);
$events2 = $reponse2->fetchAll(PDO::FETCH_OBJ);
//echo "<br> reponse <br> ";
//var_dump($events2);
if (!isset($_SESSION['id'])) { header("Location: login.php");};


?>
<html>
<head>
    <title>Participer à un événement</title>
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
<span style="display:block;text-align: center;color: green;font-size:larger ">Participer à un événement</span><br><br>
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
            Particper
        </th>

    </tr>
    </thead>



    <?php foreach ($events2 as $event2) { ?>
        <tr>
            <td>
                <?= $event2->id_event ?>
            </td>
            <td>
                <?= $event2->nom ?>
            </td>
            <td>
                <?= $event2->date_debut ?>
            </td>
            <td>
                <?= $event2->date_fin ?>
            </td>
            <td>
                <?= $event2->emplacement ?>
            </td>
            <td>
                <?= $event2->places_total ?>
            </td>
            <td>
                <?= $event2->places_rest ?>
            </td>
            <td>
            <form action="participerEvenement.php" method="get">
                <a class="btn btn-dark" value="Participer" name="participer" href='participerEvenement.php?id_event=<?= $event2->id_event?>&id_user=<?= $_SESSION['id']?>'>Participer</a>
            </form>
            </td>

        </tr>
    <?php } ?>
</table>



</body>
</html>