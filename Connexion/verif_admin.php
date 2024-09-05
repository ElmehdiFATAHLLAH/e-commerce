<?PHP
$mdp=$_POST["mdp"];


$connexion=mysqli_connect("localhost", "root", "", "projet_web");
$req="SELECT * FROM admin";
$result=mysqli_query($connexion, $req);
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	if($row['Mdp_Admin']==$mdp){
		$mot_passe=$row['Mdp_Admin'];
		header("Location: ..\page_admin\admin.php");		
		break;
	}

}

if($mot_passe!=$mdp){

	header("Location:..\page_admin\admin_error.php");
}
mysqli_close($connexion);

?>