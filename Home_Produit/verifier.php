<?php
session_start();
    if(isset($_COOKIE["compte"])){
    $_SESSION["id_pro"]=$_POST["btn"];
    

    header("Location:..\Produit\Produit.php");
                                    }
    else{header("Location: ..\Connexion\connexion.php");}

?>