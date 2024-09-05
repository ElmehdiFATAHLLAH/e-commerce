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
else{$banner='<a href="co_deco.php"> Connexion </a>';}
$process=$_SESSION['processeur'];
$RAM=$_SESSION["RAM"];
$gpu=$_SESSION["gpu"];
$carte_mere=$_SESSION["carte_mere"];
$disque=$_SESSION["disque_dur"];
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration</title>
    <link rel="stylesheet" href="config.css">
    <script src="valider_config.js"></script>
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>	
</head>
<body onload="modif_prix()" onload="modif_couleur()">
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
  <img class="lap" src="boitier_bleu.jpg" id="img"alt="" srcset="">
</section>
    <section class="conf">
            <table class="table">
             <tr>
             <?PHP
             echo '<td>Processeur</td>
                   <td>'.$process.'</td>';                  

              ?>
              </tr>	
              <tr>
              <?PHP
              echo '<td>Carte graphique</td>
                    <td>'.$gpu.'</td>';
              ?>
              </tr>
              <tr>
              <?PHP
              echo '<td>RAM</td>
                    <td>'.$RAM.'</td>';
              ?>      
              </tr>	
              <tr>
              <?PHP
              echo '<td>Disque dur</td>
                    <td>'.$disque.'</td>';
              ?>
              </tr>
              <tr>
              <?PHP
              echo '<td>Carte mere</td>
                    <td>'.$carte_mere.'</td>';
              ?>
              </tr>


            </table>	


         <form action="ajout_config.php" method="POST">
         
         <strong><label for="se"> System d'exploitation :</label></strong><br>
         <select name="se[]" id="se" onchange="modif_prix()">
         <option value="1">Linux</option>
         <option value="2">Windows (+1500 dhs)</option> 
         <option value="3">macOS (+2000 dhs)</option>
         </select>
         
         <br><br>
         
         <strong><label for="couleur"> Couleur du boitier</label></strong><br>
         <select name="couleur[]" id="couleur" onchange="modif_couleur()">
         <option value="1">Bleu	</option>
         <option value="2">Rouge</option>
         <option value="3">Vert</option>
         </select>

         <div class="prix">
         <p>
         Prix de la configuration: <input type="text" name="prix" id="prix" class="text" readonly readonly onmousedown="return false;" onselectstart="return false;" value="3000 dhs"> 
         </p>	
         </div>
         <input type="submit" class="submit" style="cursor: pointer;" value="Valider">
         
         </form>   
    
    </section>	
</body>
</html>