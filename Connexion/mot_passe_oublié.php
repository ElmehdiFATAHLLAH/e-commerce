<?PHP
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération</title>
    <link rel="stylesheet" href="connexion.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>
    <script src="connexion.js"> </script>
</head>
<body onload="generate()">
     <header>
        <div class="logo">Nova</div>
        <div class="menu">
        <ul>
          <a href="../Home_Produit/homeproduit.php" >  <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="email.php" > <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="email.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="email.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>
        </ul>
        </div>
    </header>

<div class="left">
    <form  action="mot_passe_oublié_1.php" method="post" class="form">
        <div class="titre">Récupération</div>
    <div class="container-left">
        <p>
<br><?PHP       echo "<span style=\"color:red\">* </span><span>Vous récupérer votre mot de passe dans votre email.</span>";   ?><br>
            <label for="password">Email: </label> <br>
            <input type="email" name="email" id="mdp" required class="input">
            <input type="submit" class="connexion" value="Récupérer"><br>          
        </p>  
</div>
        
 </div>
    </form> 
  
    </div> 
    
</body>
</html>