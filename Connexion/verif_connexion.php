<?PHP
session_start();
$email=$_POST["email"];
$mdp=$_POST["mdp"];

$cnx=mysqli_connect("localhost","root","","projet_web");

if(mysqli_errno($cnx)){mysqli_error($cnx); exit();}

$query="SELECT * FROM client";

$res=mysqli_query($cnx,$query);

$test=false;

while($ligne=mysqli_fetch_array($res,MYSQLI_BOTH)){
    if($ligne["Email_Cli"]==$email && $ligne["Mdp_Cli"]==$mdp){$test=true;    break;  }                             
                                                    }
 

if($test==true){
    
    $query="SELECT * FROM client WHERE Email_Cli='$email'";

    $res=mysqli_query($cnx,$query);

    $ligne=mysqli_fetch_array($res,MYSQLI_BOTH);

    $valeur=$ligne["Id_Client"];

    mysqli_close($cnx);

    setcookie("compte",$valeur,time()+3600*24*30,"/");
    header("Location:..\Home_Produit\homeproduit.php");
                }
    
else{header("Location:Connexion_error.php");}


?>