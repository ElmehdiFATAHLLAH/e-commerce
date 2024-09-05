<?PHP
session_start();
if(isset($_COOKIE["compte"])){
setcookie("compte","",time()-3600,"/");
unset($_COOKIE["compte"]);
header("Location: ..\Home_Produit\homeproduit.php");
                              }
else{header("Location:Connexion.php");}                               
?>