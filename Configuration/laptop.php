<?PHP
session_start();
if(isset($_COOKIE["compte"])){
    $Id=$_COOKIE["compte"];

$cnx=mysqli_connect("localhost","root","","projet_web");
$query="SELECT * FROM client WHERE Id_Client=$Id";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
                            
$banner='<a href="../Profil/verif_profil.php">'.$ligne["Pre_Cli"].'    <a href="..\connexion\co_deco.php">  <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>';
                            }
else{header("Location: ../Connexion/connexion.php");}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="laptop.css">
    <script src="laptop.js"></script>
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


<section>
  <img class="lap" src="boitier_bleu.jpg" alt="" srcset="">
</section>
<form action="config.php" method="POST" onsubmit="return valider()"> 
<section class="conf">
  <p>
   <span class="titre"> Configuration </span>
   <label for="Processeur">Processeur: </label>
   <select name="processeur[]" id="processeur">
      <?php 
    

$connection = mysqli_connect('localhost', 'root', '', 'projet_web');


$query = "SELECT DISTINCT Id_Prod FROM config WHERE Id_Client=$Id";
$results_Processeur = mysqli_query($connection, $query);


while ($row_Processeur = mysqli_fetch_assoc($results_Processeur)) {
    $id_processeur = $row_Processeur['Id_Prod'];
    $query = "SELECT Id_Prod, Nom_Prod FROM Produit WHERE Type_Pro='Processeur' AND Id_Prod='$id_processeur' ";
    $processeur = mysqli_fetch_assoc(mysqli_query($connection, $query));


    if ($processeur){
    $query="SELECT SUM(Qte) AS Qte FROM config WHERE Id_Client=$Id AND Id_Prod=$id_processeur";
    $ligne=mysqli_fetch_array(mysqli_query($connection,$query),MYSQLI_BOTH);
    $unites=$ligne["Qte"];
        echo "<option value='{$processeur['Id_Prod']}' >{$processeur['Nom_Prod']}&nbsp;&nbsp;&nbsp;<span class='unites'>(".$unites." unités)</span></option>";
                    }
 }


mysqli_close($connection);
               
       ?>
  
    </select>
  </p>

  <p>

  <label for="Carte_mere">Carte mere: </label>
   <select name="carte_mere[]" id="carte_mere">
      <?php 
    
                 
$connection = mysqli_connect('localhost', 'root', '', 'projet_web');


$query = "SELECT DISTINCT Id_Prod FROM config WHERE Id_Client=$Id";
$results_cm = mysqli_query($connection, $query);

while ($row_cm = mysqli_fetch_assoc($results_cm)) {
    $id_cm = $row_cm['Id_Prod'];
    $query = "SELECT Id_Prod, Nom_Prod FROM Produit WHERE Type_Pro='Carte mere' AND Id_Prod='$id_cm'";
    $cm = mysqli_fetch_assoc(mysqli_query($connection, $query));


    if ($cm) {
    $query="SELECT SUM(Qte) AS Qte FROM config WHERE Id_Client=$Id AND Id_Prod=$id_cm";
    $ligne=mysqli_fetch_array(mysqli_query($connection,$query),MYSQLI_BOTH);
    $unites=$ligne["Qte"];

    echo "<option value='{$cm['Id_Prod']}'>{$cm['Nom_Prod']}&nbsp;&nbsp;&nbsp;<span class='unites'>(".$unites." unités)</span></option>";

                }

}

mysqli_close($connection);
               
       ?>

    </select>
  </p>



  <p>

<label for="Carte_graphique">Carte graphique: </label>
 <select name="carte_graphique[]" id="carte_graphique">
    <?php 
  
               
$connection = mysqli_connect('localhost', 'root', '', 'projet_web');


$query = "SELECT DISTINCT Id_Prod FROM config WHERE Id_Client=$Id";
$results_cg = mysqli_query($connection, $query);


while ($row_cg = mysqli_fetch_assoc($results_cg)) {
  $id_cg = $row_cg['Id_Prod'];
  $query = "SELECT Id_Prod, Nom_Prod FROM Produit WHERE Type_Pro='Carte graphique' AND Id_Prod='$id_cg'";
  $cg = mysqli_fetch_assoc(mysqli_query($connection, $query));
  if ( $cg) {
    $query="SELECT SUM(Qte) AS Qte FROM config WHERE Id_Client=$Id AND Id_Prod=$id_cg";
    $ligne=mysqli_fetch_array(mysqli_query($connection,$query),MYSQLI_BOTH);
    $unites=$ligne["Qte"];
      echo "<option value='{$cg['Id_Prod']}'>{$cg['Nom_Prod']}&nbsp;&nbsp;&nbsp;<span class='unites'>(".$unites." unités)</span></option>";
  }
}


mysqli_close($connection);
             
     ?>

</select>
</p>
<p>

<label for="RAM">RAM: </label>
 <select name="RAM[]" id="RAM">
    <?php 
  
               
$connection = mysqli_connect('localhost', 'root', '', 'projet_web');


$query = "SELECT DISTINCT Id_Prod FROM config WHERE Id_Client=$Id";
$results_RAM = mysqli_query($connection, $query);


while ($row_RAM = mysqli_fetch_assoc($results_RAM)) {
  $id_RAM = $row_RAM['Id_Prod'];
  $query = "SELECT Id_Prod, Nom_Prod FROM Produit WHERE Type_Pro='RAM' AND Id_Prod='$id_RAM'";
  $RAM = mysqli_fetch_assoc(mysqli_query($connection, $query));
  if ( $RAM) {
    $query="SELECT SUM(Qte) AS Qte FROM config WHERE Id_Client=$Id AND Id_Prod=$id_RAM";
    $ligne=mysqli_fetch_array(mysqli_query($connection,$query),MYSQLI_BOTH);
    $unites=$ligne["Qte"];
      echo "<option value='{$RAM['Id_Prod']}'>{$RAM['Nom_Prod']}&nbsp;&nbsp;&nbsp;<span class='unites'>(".$unites." unités)</span></option>";
  }
}


mysqli_close($connection);
             
     ?>

</select>
</p>
<p>

<label for="disque_dur[]">Disque Dur: </label>
 <select name="disque_dur[]" id="disque_dur">
    <?php 
  
               
$connection = mysqli_connect('localhost', 'root', '', 'projet_web');


$query = "SELECT DISTINCT Id_Prod FROM config WHERE Id_Client=$Id";
$results_dd = mysqli_query($connection, $query);


while ($row_dd = mysqli_fetch_assoc($results_dd)) {
  $id_dd = $row_dd['Id_Prod'];
  $query = "SELECT Id_Prod, Nom_Prod FROM Produit WHERE Type_Pro='Disque Dur' AND Id_Prod='$id_dd'";
  $dd = mysqli_fetch_assoc(mysqli_query($connection, $query));
  if ($dd) {
    $query="SELECT SUM(Qte) AS Qte FROM config WHERE Id_Client=$Id AND Id_Prod=$id_dd";
    $ligne=mysqli_fetch_array(mysqli_query($connection,$query),MYSQLI_BOTH);
    $unites=$ligne["Qte"];
      echo "<option value='{$dd['Id_Prod']}'>{$dd['Nom_Prod']}&nbsp;&nbsp;&nbsp;<span class='unites'>(".$unites." unités)</span></option>";
  }
}


mysqli_close($connection);
             
     ?>

</select>

<input type="submit" class="submit" value="Configurer">


</p>



</section>
</form>




</body>
</html>