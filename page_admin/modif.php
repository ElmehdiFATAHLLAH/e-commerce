<?php
session_start();
$nom=$_POST["Nom"];
$liste=$_POST["type"];
for($i=0;$i<sizeof($liste);$i++){if(isset($liste[$i])){$type=$liste[$i]; break;}}
$qte=$_POST["Qte"];
$prix=$_POST["Prix"];
$desc=$_POST["Desc"];
$desc=addcslashes($desc,"'");
$basename=$_FILES["Img"]["name"];
$chemin=$_FILES["Img"]["tmp_name"];
$nv_chemin="../image_produit/".$basename;
move_uploaded_file($chemin,$nv_chemin);


$link=mysqli_connect("localhost", "root", "", "projet_web");
$req="UPDATE produit SET Nom_Prod='$nom', Type_Pro='$type', Prix_Prod='$prix',Desc_Prod='$desc' ,Qte_Stock='$qte', Img_Prod='$nv_chemin' WHERE Id_Prod='$_SESSION[id]'";
$result=mysqli_query($link,$req);

mysqli_close($link);

header("location: admin_produit.php");
?>
