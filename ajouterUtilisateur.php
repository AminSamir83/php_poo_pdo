<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 13:56
 */
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>
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

<?php if (isset($_SESSION['error_number'])){
    ?>
    <div class="container">
        <div class="alert alert-danger" style="margin: 0 !important;"><?= $_SESSION['error_number'] ?></div></div>
    <?php
    unset($_SESSION['error_number']);
}
if (isset($_SESSION['id'])) { header("Location: accessdenied.php");};
 if (isset($_SESSION['error_mail'])){
    ?>
    <div class="container">
        <div class="alert alert-danger" style="margin: 0 !important;"><?= $_SESSION['error_mail'] ?></div></div>
    <?php
    unset($_SESSION['error_mail']);
}

?>


<form method="post" action="ajoutUtilisateur.php" >
    <span style="display:block;text-align: center;color: darkblue;font-size:larger ">Ajouter un utilisateur</span><br><br>
    <table class = "table" style="margin-left:auto;margin-right:auto;display:block;width:30%;">

        <tr><td><label for="prenom">Prénom </label></td><td><input type="text" class="form-control enter-text" required  maxlength="30" name="prenom" id="prenom" </td></tr>
        <tr><td><label for="nom">Nom </label></td><td><input type="text" required class="form-control enter-text" name="nom"  maxlength="30" id="nom" ></td></tr>
        <tr><td><label for="login">Login </label></td><td><input type="text" required class="form-control enter-text" name="login" id="login" maxlength="30"></td></tr>
        <tr><td><label for="login">Password</label></td><td><input type="password" required class="form-control enter-text" name="password" id="password"n maxlength="30" ></td></tr>
        <tr><td><label for="email">Email </label></td><td><input class="form-control enter-text" type="text" required name="email" id="email" maxlength="30" ></td></tr>
        <tr><td><label for="cin">CIN </label></td><td><input type="number" class="form-control enter-text" required  max="99999999" min ="1" name="cin" id="cin" ></td></tr>
        <tr><td><label for="telephone">Téléphone </label></td><td><input type="number" required class="form-control enter-text" min="20000000" max="99999999" name="telephone"  id="telephone" ></td></tr>
        <tr><td><label for="ville">Adresse </label></td><td><input type="text" required class="form-control enter-text" name="ville" id="ville"  maxlength="30" ></td></tr>
        <tr><td><label for="code_postal">Code Postal </label></td><td><input class="form-control enter-text" type="number" required name="code_postal" id="code_postal" min="1000" max="9999" ></td></tr>

                </td></tr>
    </table>
        <input class="btn btn-primary" type="submit" style="margin-left:auto;margin-right:auto;display:block;width:20%;" id="button-send" onclick="verify()" value="Ajouter">


</form>

</body>
</html>