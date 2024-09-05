<?PHP
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="form.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>
    <script src="Inscription.js"> </script>
</head>
<body onload="generate()">
     <header>
        <div class="logo"><span>Nova</span></div>
        <ul>
          <a href="../Home_Produit/homeproduit.php">  <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="Form.php" > <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="Form.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="Form.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>
        </ul>
    
    </header>

<div class="left">
    <form action="verif_inscr.php" method="post" class="form">
         <div class="titre">Inscription</div>
    <div class="container-left">
        <p>
            <label for="Nom">Nom: </label> <br>
            <input type="text" class="input" name="nom" required  >
        </p>
        <p>
            <label for="Prenom">Prenom: </label> <br>
            <input type="text" class="input" name="prenom" required >
        </p>
        <p>
            <label for="email">Email: </label> <br>
            <input type="email" id="email" name="email" required onBlur="verif_email()" class="input" >
        </p>
        <p>
            <i id="msg2" class="fa-solid fa-circle-xmark" ></i>   
            <label for="password">Password: </label> <br>
            <input type="password" name="mdp" id="mdp" onblur="verif_mdp()"  required class="input">
             
        </p>
        <p>
            <i id="msg3" class="fa-solid fa-circle-xmark" ></i>   
            <label for="confirmpassword">Confirmer Password: </label> <br>
            <input type="password" name="Confirm_Password" id="c_mdp"  onblur="comfirm_mdp()" required class="input">
        </p>
<div class="captcha">
        <div id="champ" class="inline">
        <input type="text" id="code" placeholder="Captcha " name="captcha" />
        </div>

    <div class="inline" onclick="generate()">
        <i class="fas fa-sync"></i>
    </div> 
<input type="text" id="image" name="image" class="inline" readonly readonly onmousedown="return false;" onselectstart="return false;" >

 
    <p id="res"></p>
<div class="Captcha">
        <p class="buttons" style="cursor: pointer;">
        <button class="button" type="submit" id="valider"> <span> Submit</span></button>
        <button class="button" type="reset">Reset</button>
        </p>
</div>    
    </form> 
  
    </div>   

         
</body>
</html>