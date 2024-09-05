<?PHP
session_start();
$anc_mdp=$_POST["anc_mdp"];
$nv_mdp=$_POST["nv_mdp"];
$Id=$_COOKIE["compte"];

$cnx=mysqli_connect("localhost","root","","projet_web");
$query="SELECT * FROM client WHERE Id_Client='$Id'";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$mdp=$ligne["Mdp_Cli"];
if($anc_mdp==$mdp){
	$query="UPDATE client SET Mdp_Cli='$nv_mdp' WHERE Id_Client='$Id'";
	$res=mysqli_query($cnx,$query);
	header("Location: profil.php");
                               }
else{header("Location: changer_mdp_error.php");}

?>