<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 29/11/2018
 * Time: 11:03
 */
session_start();
if (!isset($_SESSION['id'])) { header("Location: login.php");};
if (isset($_SESSION['id'])) {
    session_destroy();

}
header('Location: login.php');
