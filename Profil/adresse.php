<?PHP
$adr=$_POST["adresse"];
$Id=$_COOKIE["compte"];
$cnx=mysqli_connect("localhost","root","","projet_web");
$query="UPDATE client SET Adr_Cli='$adr' WHERE Id_Client='$Id'";
$res=mysqli_query($cnx,$query);
header("Location: profil.php");
?>