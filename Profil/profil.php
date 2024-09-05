<?PHP
session_start();
if(isset($_COOKIE["compte"])){
    $Id=$_COOKIE["compte"];

$cnx=mysqli_connect("localhost","root","","projet_web");
$query="SELECT * FROM client WHERE Id_Client=$Id";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
                            
$banner='<a href="..\Profil\verif_profil.php">'.$ligne["Pre_Cli"].'    <a href="..\connexion\co_deco.php">  <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>';
                            
$nom=$ligne["Nom_Cli"];
$prenom=$ligne["Pre_Cli"];
$email=$ligne["Email_Cli"];
$img=$ligne["Image_src"];
if($ligne["Adr_Cli"]==NULL){$adr="<form method='POST' action='adresse.php' class='form'> <input type='text' name='adresse' class='champ'>&nbsp;&nbsp; <input type='submit' value='Envoyer' class='adr'><br> <span class='oblig'>Obligatoire pour les livraisons </span></form>";}
else{
    $adr=$ligne["Adr_Cli"];
    }
if($img!=NULL){$output='<div class="contour"><img src="./'.$img.'" class="position" > </div>';}    
else{
         $output='<div class="contour"></div>
         <form class="boutons" method="POST" action="import_img.php" enctype="multipart/form-data"> 
         <input type="file" class="import" name="image">
         <button type="submit" class="soumettre"> Soumettre</button>
         </form>';
                }                    

$i=0;
$query="SELECT * FROM commande WHERE Id_Client=$Id";
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
                               

                               }
                                
else{$banner='<a href="..\Connexion\co_deco.php"> Connexion </a>';}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profil3.css">
    <script src=".js"></script>
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

      <div class="slide">
        <a href="profil.php" style="background-color: white; color: #1B1290;">INFORMATIONS PERSONNELS</a>
        <a href="infos_commande.php">INFORMATIONS COMMANDES</a>
        <a href="infos_pc.php">INFORMATIONS PC</a>
        
</div>


<div class="contenu">
<?PHP
echo   	'<div class="info">
	     <h3> Informations personnels: </h3> 	
         <p>

         Nom: <strong>'.$nom.'</strong><br>
         Prenom: <strong>'.$prenom.'</strong><br>
         Adresse mail: <strong>'.$email.'</strong><br>'.
         '<a href="changer_mdp.php"> <button class="changer_mdp"> Changer votre mot de pass </button> </a> <br>
         Adresse domicile: <strong>'.$adr.'</strong><br>'.         
         '</p>
         <div class="image">'.$output.
         '</div> 
   	    </div>';


?>
</div>
<div class="pied"></div>
<br><br>
</body>
</html>

