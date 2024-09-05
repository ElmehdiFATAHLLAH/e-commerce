<?PHP
session_start();
$Id=$_COOKIE["compte"];

$cnx=mysqli_connect("localhost","root","","projet_web");
$query="SELECT * FROM client WHERE Id_Client=$Id";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
                            
$banner='<a href="..\connexion\verif_profil.php">'.$ligne["Pre_Cli"].'    <a href="..\connexion\co_deco.php" <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="..\Connexion\connexion.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>
    <script src="mdp.js"> </script>
</head>
<body>
     <header>
        <div class="logo"><span>Nova</span></div>
        <div class="menu">
        <ul>
          <a href="../Home_Produit/homeproduit.php">  <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="../Panier/Panier.php" > <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="../Configuration/laptop.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="../Profil/profil.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>
        <?PHP  echo $banner; ?>
        </ul>
        </div>
    </header>

<div class="left">
    <form  action="verif_mdp.php" method="post" class="form" onSubmit="return check_mdp()">
        <div class="titre">Modifier votre mot de pass</div>
    <div class="container-left">
        <p>
            <label for="email">Ancien mot de pass: </label> <br>
            <input type="password" id="email" name="anc_mdp" class="input">
        </p>
        <p>
            <i id="msg2" class="fa-solid fa-circle-xmark" ></i>   
            <label for="password">Nouveau mot de pass: </label> <br>
            <input type="password" name="nv_mdp" id="mdp"  required class="input" style="margin-bottom:10px;"><br>
            <label for="password">Confirmer mot de pass: </label> <br>
            <input type="password" name="confirm_mdp" id="c_mdp"  required class="input" style="margin-bottom:10px;"><br>
            <input type="submit" class="connexion" value="Envoyer">      
        </p>  
</div>
        
 </div>
    </form> 
  
    </div> 
    
</body>
</html>