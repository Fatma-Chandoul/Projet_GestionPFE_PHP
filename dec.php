<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["id_user"]);
$_SESSION["erreur"]="Merci Mr/Mlle pour votre visite";
$_SESSION["type"]="info";
header("location:login.php");
?>