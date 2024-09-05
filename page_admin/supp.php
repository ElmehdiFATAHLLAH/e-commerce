<?php
$btn=$_POST["btn"];
if (isset($btn)){
    $link=mysqli_connect("localhost","root","","projet_web");
    $requete="DELETE FROM client WHERE Id_Client=$btn";
    $res=mysqli_query($link,$requete);
    mysqli_close($link);
    
                }

header("location: admin_client.php");

?>