<?php
session_start();
require_once("functions.php");
$cnx=connect();
$login=$_POST["login"];
$pass=$_POST["pass"];
$req=mysqli_query($cnx,"select * from user where login='{$login}'");
$exist=0;
while($d=mysqli_fetch_array($req)){

    if(password_verify($pass,$d["password"])){
        $_SESSION["user"]=$d["login"];
        $_SESSION["id_user"]=$d["id"];
        $da=date("Y-m-d H:i:s");
        $exist=1;
    }
}
if($exist==0){
    $_SESSION["erreur"]="Verifier votre login ou mot de passe !!!";
    $_SESSION["type"]="warning";
    header("location:login.php");
}
else{
    header("location:liste.php");
}
?>