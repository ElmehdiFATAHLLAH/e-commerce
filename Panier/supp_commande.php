<?php
session_start();
$id=$_POST["id"];
if (isset($id)){
$connexion=mysqli_connect("localhost","root","","projet_web");
$req="DELETE FROM panier WHERE Id_Panier=$id";
$result=mysqli_query($connexion, $req);
mysqli_close($connexion);
}
header("location:Panier.php");


?>
