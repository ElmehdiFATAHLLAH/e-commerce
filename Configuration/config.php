<?PHP
session_start();
$tab=$_POST['processeur'];

for($i=0;$i<sizeof($tab);$i++){if(isset($tab[$i])){$Id_process=$tab[$i]; $_SESSION["id_processeur"]=$Id_process;}}

$tab=$_POST["carte_mere"];
for($i=0;$i<sizeof($tab);$i++){if(isset($tab[$i])){$Id_carte_mere=$tab[$i]; $_SESSION["id_carte_mere"]=$Id_carte_mere;}}

$tab=$_POST["RAM"];
for($i=0;$i<sizeof($tab);$i++){if(isset($tab[$i])){$Id_RAM=$tab[$i]; $_SESSION["id_RAM"]=$Id_RAM;}}

$tab=$_POST["disque_dur"];
for($i=0;$i<sizeof($tab);$i++){if(isset($tab[$i])){$Id_disque=$tab[$i]; $_SESSION["id_disque"]=$Id_disque;}}

$tab=$_POST["carte_graphique"];
for($i=0;$i<sizeof($tab);$i++){if(isset($tab[$i])){$Id_gpu=$tab[$i]; $_SESSION["id_gpu"]=$Id_gpu;}}

$cnx=mysqli_connect("localhost","root","","projet_web");

$query="SELECT Nom_Prod from produit WHERE Id_Prod='$Id_process'";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$_SESSION["processeur"]=$ligne["Nom_Prod"];

$query="SELECT Nom_Prod from produit WHERE Id_Prod='$Id_carte_mere'";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$_SESSION["carte_mere"]=$ligne["Nom_Prod"];

$query="SELECT Nom_Prod from produit WHERE Id_Prod='$Id_RAM'";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$_SESSION["RAM"]=$ligne["Nom_Prod"];

$query="SELECT Nom_Prod from produit WHERE Id_Prod='$Id_disque'";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$_SESSION["disque_dur"]=$ligne["Nom_Prod"];

$query="SELECT Nom_Prod from produit WHERE Id_Prod='$Id_gpu'";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$_SESSION["gpu"]=$ligne["Nom_Prod"];


header("Location:valider_config.php");

?>