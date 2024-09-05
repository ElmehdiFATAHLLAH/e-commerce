<?PHP
session_start();
$basename=$_FILES["image"]["name"];
$chemin=$_FILES["image"]["tmp_name"];
$nv_chemin="Image Clients/".$basename;
move_uploaded_file($chemin,$nv_chemin);
$Id=$_COOKIE["compte"];

$cnx=mysqli_connect("localhost","root","","projet_web");
if(mysqli_errno($cnx)){mysqli_error($cnx);  exit();}
$query="UPDATE client SET Image_src='$nv_chemin' WHERE Id_Client='$Id'";
$res=mysqli_query($cnx,$query);

mysqli_close($cnx);           
                   
header("Location:profil.php");                   

?>