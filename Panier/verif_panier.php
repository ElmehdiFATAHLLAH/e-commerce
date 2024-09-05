<?PHP
if(isset($_COOKIE["compte"])){header("Location: Panier.php");}
else{header("Location: ../Connexion/connexion.php");}
?>