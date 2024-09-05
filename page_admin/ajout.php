<?PHP
$nom=$_POST["Nom"];
$liste=$_POST["type"];
for($i=0;$i<sizeof($liste);$i++){if(isset($liste[$i])){$type=$liste[$i]; break;}}
$qte=$_POST["Qte"];
$prix=$_POST["Prix"];
$desc=$_POST["Desc"];
$desc=addcslashes($desc,"'");
$basename=$_FILES["Img"]["name"];
$chemin=$_FILES["Img"]["tmp_name"];
$nv_chemin="../image_produit/".$basename;
move_uploaded_file($chemin,$nv_chemin);


$servername = "localhost";
$username="root";
$password="";
$database="projet_web";
$connection= mysqli_connect($servername,$username,$password,$database);
$sql="INSERT INTO produit VALUES (' ','$nom','$type','$prix','$desc','$qte','$nv_chemin')";
$result=mysqli_query($connection,$sql);  

mysqli_close($connection);
header("location: admin_produit.php")

?>  