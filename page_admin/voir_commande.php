<?PHP
$banner='<a href="..\connexion\co_deco.php"> Connexion </a>';
session_start();
$Id=$_POST["btn"];
$cnx=mysqli_connect("localhost","root","","projet_web");

$i=0;
$query="SELECT * FROM commande WHERE Id_Client='$Id'";
$res=mysqli_query($cnx,$query);
while($lignes=mysqli_fetch_array($res,MYSQLI_BOTH)){$i++;}

$sommeprix=0;
$query1="SELECT * FROM commande WHERE Id_Client='$Id'";    
$res1=mysqli_query($cnx,$query1);
while($lignes1=mysqli_fetch_array($res1,MYSQLI_BOTH)){
        $Id_Prod=$lignes1['Id_Prod'];
        $query2="SELECT * FROM produit WHERE Id_Prod='$Id_Prod'";
        $res2=mysqli_query($cnx,$query2);
        $ligne1=mysqli_fetch_array($res2,MYSQLI_BOTH);
        $sommeprix=$sommeprix+($lignes1["Qte"]*$ligne1["Prix_Prod"]);
                                                    }
$query="SELECT * FROM client WHERE Id_Client='$Id'";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$prenom=$ligne["Pre_Cli"];
$nom=$ligne["Nom_Cli"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://kit.fontawesome.com/e0febe2254.js" crossorigin="anonymous"></script>   
     <link rel="stylesheet" href="voir_commande.css">
</head>
<body>
    <div class="heade">
    <header>
    <div class="logo">Nova</div>
     <ul>
          <a href="../Home_Produit/homeproduit.php" > <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="../Panier/verif_panier.php"> <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="../Configuration/verif_config.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="../Profil/verif_profil.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>    
        <?PHP  echo $banner; ?>       
    </ul>
    </header>
    </div>
        <div class="slide">
        <a href="admin.php">Home</a>
        <a href="admin_client.php" style="background-color: white; color: #1B1290;">Client</a>
        <a href="admin_produit.php">Produit</a>
        
    </div>
<?PHP
echo    '<div class="infos_commande">
        <h3>Commandes du client: <span style="font-weight:bold; color:blue; font-size:24px;">'.$nom.' '.$prenom.'</span></h3>
        <p>
        <span> Nombre total de commandes: <span style="color:blue; font-weight:bold;">'.$i.'</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
        <span> Prix total depense dans le site: <span style="color:blue; font-weight:bold;">'.$sommeprix.' dhs</span></span><br>'. 
        '<table>
        <thead> 
        <tr>
        <th> Produit </th>
        <th> Quantite </th>
        <th> Date de la commande </th>
        <th> Prix de la commande </th>
        </tr>
        </thead>
        <tbody>';
        $query="SELECT * FROM commande WHERE Id_Client='$Id'";    
        $res=mysqli_query($cnx,$query);        
        while($lignes=mysqli_fetch_array($res,MYSQLI_BOTH)){
        $Id_Prod=$lignes['Id_Prod'];    
        $query2="SELECT * FROM produit WHERE Id_Prod='$Id_Prod'";
        $res2=mysqli_query($cnx,$query2);
        $ligne2=mysqli_fetch_array($res2,MYSQLI_BOTH);
        $prixtotal=$lignes['Qte']*$ligne2["Prix_Prod"];
echo    '<tr>
        <td>'.$ligne2["Type_Pro"].'</td>'.
        '<td>'.$lignes["Qte"].'</td>'. 
        '<td>'.$lignes["Dat_Commande"].'</td>
        <td>'.$prixtotal.' DHS</td>
        </tr>'; 
                                                            }
echo ' </tbody>
       </table>
        </p> 
      </div> ';
      mysqli_close($cnx);
?> 
</body>
</html>
