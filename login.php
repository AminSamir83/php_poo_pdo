<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 16:19
 */
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="color:white;background-image: url(images/bg.png)">
<?php if (isset($_SESSION['error'])) { echo "<div class='alert alert-danger container'>".$_SESSION['error']."</div><br>";}
if (isset($_SESSION['id'])) { header("Location: accessdenied.php");};
?>
<div style="display:block;margin:auto;width:50%">
<form method="post" action="checklogin.php">
    <div>
        <div><div style="width:50%;display:inline-block;">Login</div> <input type="text" name="login"></div>
        <div><div style="width:50%;display:inline-block;">Password</div><input type="password" name="password"></div>
        <div div style="width:50%;display:block;margin-right:auto;margin-left:auto"><input type="submit" class="btn btn-light" value="Se Connecter">
            <a  class="btn btn-light" style="color:black" href="ajouterUtilisateur.php">S'enregistrer</a>
        </div>
    </div>
</form>
</div>
</form>
</body>
</html>