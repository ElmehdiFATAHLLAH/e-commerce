<?PHP
session_start();
$banner='<a href="..\connexion\co_deco.php"> Connexion </a>';
$Id=$_POST["btn"];
$cnx=mysqli_connect("localhost","root","","projet_web");

$nbr_pcs=0;
$query="SELECT * FROM pc WHERE Id_Client='$Id'";
$res=mysqli_query($cnx,$query);
while($ligne=mysqli_fetch_array($res,MYSQLI_BOTH)){$nbr_pcs++;}

$query="SELECT * FROM client WHERE Id_Client='$Id'";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$prenom=$ligne["Pre_Cli"];
$nom=$ligne["Nom_Cli"];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://kit.fontawesome.com/e0febe2254.js" crossorigin="anonymous"></script>   
     <link rel="stylesheet" href="voir_pcs.css">
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
echo '<div class="infos_pcs"
      <h2> PCs configurés par le client: <span style="font-weight:bold; color:blue; font-size:24px;">'.$nom.' '.$prenom.'</span></h2>
      <p>
      <span> Nombre: <span style="color:blue; font-weight:bold;">'.$nbr_pcs.'</span>
      <table>
      <thead>
      <tr>
      <th>Processeur</th>
      <th>Carte graphique</th>
      <th>RAM</th>
      <th>Disque dur</th>
      <th>Carte mere</th>
      <th>Prix configuration</th>
      <th>Date configuration</th>
      </tr>
      </thead>
      <tbody>';
      $query="SELECT * FROM pc WHERE Id_Client='$Id'";
      $res=mysqli_query($cnx,$query);
      while($ligne=mysqli_fetch_array($res,MYSQLI_BOTH)){
echo '<tr>
      <td>'.$ligne["Processeur"].'</td>           
      <td>'.$ligne["Carte_Graphique"].'</td>
      <td>'.$ligne["Ram"].'</td>
      <td>'.$ligne["Disque_Dur"].'</td>
      <td>'.$ligne["Carte_Mere"].'</td>
      <td>'.$ligne["Prix_Config"].' DHS</td>
      <td>'.$ligne["Dat_Config"].'</td>
      </tr>';
                                                         }     
echo '</tbody>
      </table>
      </p>
      </div>';
      mysqli_close($cnx);
?> 
</body>
</html>