<?PHP
session_start();
$n=$_SESSION["nb_prod"];
if($n==0){header("Location: ../Home_Produit/homeproduit.php");}
else{header("Location: convert_commande.php");}
?>
