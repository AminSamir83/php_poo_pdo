<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 11:06
 */
session_start();

if (!isset($_SESSION['id'])) { header("Location: login.php");};
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil Evénements</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="color:white;background-image: url(images/bg.png)">
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
<main>
<?php
if (isset($_SESSION['succes'])) echo "<div class='alert container alert-success'>".$_SESSION['succes']."</div>";
unset($_SESSION['succes']);

?>
<div style="background-image:none;background:black;">
<div style="text-align:right;display:inline-block;width:50%">Accèder à la liste des utilisateurs : &nbsp;</div><a class="btn btn-light" href="listerUtilisateurs.php">Utilisateurs</a><br>
<div style="text-align:right;display:inline-block;width:50%">Accèder à la liste de mes événements : &nbsp;</div><a class="btn btn-light" href="listerEvenementsParticipe.php">Mes Evénements </a>
<div style="text-align:right;display:inline-block;width:50%">Participer à un événement : &nbsp;</div><a class="btn btn-light" href="listerEvenementsAutres.php">Participer A Un Evénement </a>
    <?php if ($_SESSION['role']==='Admin') {?>
<div style="text-align:right;display:inline-block;width:50%">Valider les participations : &nbsp;</div><a class="btn btn-light" href="participationAValider.php">Valider Participations </a>
<div style="text-align:right;display:inline-block;width:50%">Accèder à la liste des événements : &nbsp;</div><a class="btn btn-light" href="listerEvenements.php">Evénements </a>
    <?php } ?>
</div>
</main>
</body>
</html>
