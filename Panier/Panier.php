<?PHP
session_start();
if(isset($_COOKIE["compte"])){
    $Id=$_COOKIE["compte"];
    $_SESSION["id_cli"]=$Id;

$cnx=mysqli_connect("localhost","root","","projet_web");
$query="SELECT * FROM client WHERE Id_Client=$Id";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
                            
$banner='<a href="..\Profil\verif_profil.php">'.$ligne["Pre_Cli"].'  </a>  <a href="..\Connexion\co_deco.php"> <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>';
                            }
else{$banner='<a href="..\connexion\co_deco.php"> Connexion </a>';}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Panier.css">
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>
</head>
<body>
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

<section class="content">

<div class="wrapper">
     
   </div>
   
   <div class="row">
  <?php 
  $connection = mysqli_connect('localhost', 'root', '', 'projet_web');
  $query = "SELECT * FROM panier WHERE Id_Client=$_SESSION[id_cli]";
  $results_panier = mysqli_query($connection, $query);

  $Prix = 0;
  while ($row_panier = mysqli_fetch_assoc($results_panier)) {
    $id_panier = $row_panier['Id_Prod'];
    $query = "SELECT Id_Prod,Nom_Prod,Prix_Prod, Img_Prod FROM Produit WHERE Id_Prod='$id_panier'";
    $panier = mysqli_fetch_assoc(mysqli_query($connection, $query));

    if ($panier) {
      echo "<div class='card'>
              <div class='img'>
                <img src='$panier[Img_Prod]'>
              </div>
              <div class='info'>
                <div>" . $panier["Nom_Prod"] . "</div>
                <div>" . $row_panier["Qte"] . " unités</div>
              <form method='POST' action='supp_commande.php'><button class='cart' name='id' value=".$row_panier["Id_Panier"] ."><span>Supprimer</span></button></form>
              </div>
            </div>";
    
           $Prix=$Prix+($panier["Prix_Prod"]* $row_panier["Qte"]);
    
    }
  }

  $query="SELECT count(*) AS nb_prod FROM panier WHERE Id_Client='$Id'";
  $res=mysqli_query($connection,$query);
  $ligne=mysqli_fetch_array($res,MYSQLI_ASSOC);
  $nb_prod=$ligne["nb_prod"];

  mysqli_close($connection);
  ?>
</div>
<p class="Panier">Panier</p>
<div class="Box">
 
  <form action="check_panier.php" method="POST">
    
    <p class="para">Prix total: <span> <?php   
    echo $Prix." DHS";
    $_SESSION["prix"]=$Prix;
    
    ?> </span>  </p><br><br><br><br><br><br>
    <p class="para">Nombre de produits: <span>
     <?PHP
     echo $nb_prod;
     $_SESSION["nb_prod"]=$nb_prod;
     ?> 
     <br><br>
  <input type="submit" name="valider" value="Valider" class="valid">
  <form>
</div>
</section>



</body>
</html>