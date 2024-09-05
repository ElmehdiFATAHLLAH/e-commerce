<?php
$id_sup=$_POST["id_sup"];

    $link=mysqli_connect("localhost","root","","projet_web");


    $requete="SELECT count(Id_Prod) AS n FROM produit WHERE Id_Prod=$id_sup";
    $result=mysqli_query($link, $requete);
    $row=mysqli_fetch_assoc($result);

    if($row['n']>0){

    $requete="DELETE FROM produit WHERE Id_Prod=$id_sup";
    $res=mysqli_query($link,$requete);
    mysqli_close($link);

header("location:admin_produit.php");
                    }


      else{
        header("location:suppression_impossible.php");
      }              

?>