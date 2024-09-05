<?PHP
session_start();

$servername = "localhost";
$username="root";
$password="";
$database="projet_web";
$connection= mysqli_connect( $servername , $username,$password,$database);


$qte=$_POST["qte"];
$id=$_POST["id"];

$qte_panier=0;
$sql="SELECT * FROM panier WHERE Id_Prod=$id";
$res=mysqli_query($connection,$sql);
$ligne=mysqli_fetch_assoc($res);
@$qte_panier=$ligne["Qte"];

$qte_total=$qte+$qte_panier; 

$sql="SELECT * FROM produit WHERE Id_Prod=$id";
$ligne=mysqli_fetch_array(mysqli_query($connection,$sql),MYSQLI_BOTH);
$qte_stock=$ligne["Qte_Stock"];

if($qte_total<=$qte_stock && $qte_panier!=0){
         $sql="UPDATE panier SET Qte='$qte_total' WHERE Id_Prod=$id";
         $res=mysqli_query($connection,$sql);    
         
         header("Location: ../Home_Produit/homeproduit.php");
                                            }
else if($qte_total<=$qte_stock && $qte_panier==0){

$date=date('Y-m-d');
$sql="INSERT INTO  panier (Qte, Dat_Commande, Img_Prod, Id_Client, Id_Prod) VALUES ($qte,'$date','$_SESSION[img]','$_SESSION[id_cli]','$_SESSION[id_prod]')";


$result=mysqli_query($connection,$sql);

mysqli_close($connection);

header("Location: ../Home_Produit/homeproduit.php");
                                                    }
                            
else{
	 mysqli_close($connection);

     header("Location: Produit_error.php");
    }               


?>  