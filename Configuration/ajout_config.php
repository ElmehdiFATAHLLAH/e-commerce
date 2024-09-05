<?PHP
session_start();
$cnx=mysqli_connect("localhost","root","","projet_web");
$nom_process=$_SESSION["processeur"];
$nom_gpu=$_SESSION["gpu"];
$nom_RAM=$_SESSION["RAM"];
$nom_disque=$_SESSION["disque_dur"];
$nom_carte_mere=$_SESSION["carte_mere"];
$Id_Cli=$_COOKIE["compte"];
$dat_config=date("Y-m-d");

$prix_config=$_POST["prix"];

$query="INSERT INTO pc VALUES ('','$nom_process','$nom_gpu','$nom_RAM','$nom_disque','$nom_carte_mere','$prix_config','$dat_config','$Id_Cli')";
$res=mysqli_query($cnx,$query);


$Id_process=$_SESSION["id_processeur"];
$Id_carte_mere=$_SESSION["id_carte_mere"];
$Id_RAM=$_SESSION["id_RAM"];
$Id_disque=$_SESSION["id_disque"];
$Id_gpu=$_SESSION["id_gpu"];

$query="UPDATE config SET Qte=Qte-1 WHERE Id_Prod=$Id_process AND Id_Client=$Id_Cli LIMIT 1";
$res=mysqli_query($cnx,$query);


$query="UPDATE config SET Qte=Qte-1 WHERE Id_Prod=$Id_carte_mere AND Id_Client=$Id_Cli LIMIT 1";
$res=mysqli_query($cnx,$query);

$query="UPDATE config SET Qte=Qte-1 WHERE Id_Prod=$Id_RAM AND Id_Client=$Id_Cli LIMIT 1";
$res=mysqli_query($cnx,$query);

$query="UPDATE config SET Qte=Qte-1 WHERE Id_Prod=$Id_disque AND Id_Client=$Id_Cli LIMIT 1";
$res=mysqli_query($cnx,$query);

$query="UPDATE config SET Qte=Qte-1 WHERE Id_Prod=$Id_gpu AND Id_Client=$Id_Cli LIMIT 1";
$res=mysqli_query($cnx,$query);


$query="DELETE FROM config WHERE Qte=0";
$res=mysqli_query($cnx,$query);

mysqli_close($cnx);

header("Location: ../Home_Produit/homeproduit.php");

?>