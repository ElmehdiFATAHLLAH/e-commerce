<?PHP
if(isset($_COOKIE["compte"])){header("Location:..\Profil\profil.php");}
else{header("Location:../Connexion/Connexion.php");}
?>