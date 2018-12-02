<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 15:03
 */

session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un événement</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">

        function verify() {
            var myInputList = document.getElementsByClassName("enter-text");
            for (let e of myInputList) {

                if (e.value === null || e.value === "" || e.value === undefined) {
                    alert("Please Fill All Required Fields");
                    //return false;
                }
            }
        }
        document.getElementById("button-send").addEventListener("click", verify);

    </script>
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

<?php if (isset($_SESSION['error_date'])){
    ?>
    <div class="container">
        <div class="alert alert-danger" style="margin: 0 !important;"><?= $_SESSION['error_date'] ?></div></div>
    <?php
    unset($_SESSION['error_date']);
}
if (!isset($_SESSION['id'])) { header("Location: login.php");};
if ($_SESSION['role']!=='Admin') {header  ('Location : accessdenied.php');};
?>


<form method="post" action="ajoutEvenement.php" >
    <span style="display:block;text-align: center;color: darkblue;font-size:larger ">Ajouter un événement</span><br><br>
    <table class = "table" style="margin-left:auto;margin-right:auto;display:block;width:30%;">

        <tr><td><label for="nom">Nom </label></td><td><input type="text" class="form-control enter-text" required  maxlength="30" name="nom" id="nom" </td></tr>
        <tr><td><label for="date_debut">Date du début </label></td><td><input type="date" required class="form-control enter-text" name="date_debut"   id="date_debut" ></td></tr>
        <tr><td><label for="date_fin">Date de fin </label></td><td><input type="date" required class="form-control enter-text" name="date_fin" id="date_fin" ></td></tr>
        <tr><td><label for="emplacement">Emplacement</label></td><td><input type="text" required class="form-control enter-text" name="emplacement" id="emplacement" maxlength="30" ></td></tr>
        <tr><td><label for="places_total">Nombre de places totales: </label></td><td><input class="form-control enter-text" type="number" required name="places_total" id="places-total" min="1" ></td></tr>

    </table>
    <input class="btn btn-primary" type="submit" style="margin-left:auto;margin-right:auto;display:block;width:20%;" id="button-send" onclick="verify()" value="Ajouter">


</form>

</body>
</html>