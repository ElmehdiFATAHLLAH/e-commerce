<?PHP
session_start();
$verif=$_POST["code"];
$nom=$_SESSION["nom"];
$prenom=$_SESSION["prenom"];
$email=$_SESSION["email"];
$mdp=$_SESSION["mdp"];


if($verif==$_SESSION["code"]){

	$cnx=mysqli_connect("localhost","root","","projet_web");
    
    if(mysqli_errno($cnx)){mysqli_error($cnx);  exit();}

    $query="INSERT INTO client VALUES ('','$nom','$prenom','$email','$mdp','','')";

    $res=mysqli_query($cnx,$query);

    $query="SELECT * FROM client WHERE Email_Cli='$email'";

    $res=mysqli_query($cnx,$query);

    $ligne=mysqli_fetch_array($res,MYSQLI_BOTH);

    $valeur=$ligne["Id_Client"];
    
    setcookie("compte",$valeur,time()+3*3600*24*30,"/");

    mysqli_close($cnx);
    header("Location: ../Home_Produit/homeproduit.php");
 
                                }
else{header("Location:vérification_code_copie.php");} 