<?PHP
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>
    <script src="connexion.js"> </script>
</head>
<body>
     <header>
        <div class="logo"><span>Nova</span></div>
        <div class="menu">
        <ul>
          <a href="../Home_Produit/homeproduit.php" >  <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="connexion.php" > <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="connexion.php"> <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="connexion.php"> <li><i class="fa-sharp fa-solid fa-user"></i></li></a>
        </ul>
        </div>
    </header>

<div class="left">
    <form  action="verif_connexion.php" method="post" class="form">
        <div class="titre">CONNEXION</div>
    <div class="container-left">
        <p>
            <label for="email">Email: </label> <br>
            <input type="email" id="email" name="email" required class="input">
        </p>
        <p>
            <i id="msg2" class="fa-solid fa-circle-xmark" ></i>   
            <label for="password">Password: </label> <br>
            <input type="password" name="mdp" id="mdp"  required class="input" style="margin-bottom:10px;"><br>
            <span class="error" style="color: red; padding-left: 110px;"> Adresse mail ou mot de pass invalide.</span><br>
            <input type="submit" class="connexion" value="Connexion"><br>       
            
            <div class="liens"><span> Vous n'avez pas un compte ?<a href="Form.php"> Creez-en un </a></span><br><br>
            <a href="connexion_admin.php" id="lien2">Je suis admin</a></div>      
        </p>  
</div>
        
 </div>
    </form> 
  
    </div> 
    
</body>
</html>