<?PHP
session_start();
if($_SESSION["erreur1"]){$msg="placeholder='Adresse mail existante'";}
else{$msg="value='".$_SESSION["email"]."'";}
if($_SESSION["erreur2"]){$msg1="Mot de pass min. 8 caracteres";}
else{$msg1="";}
if($_SESSION["erreur3"]){$msg2="Mot de pass incoherent";}
else{$msg2="";}
if($_SESSION["erreur4"]){$msg3="Captcha invalide";}
else{$msg3="Refaire Captcha";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="form_error.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>
    <script src="Inscription.js"> </script>
</head>
<body onload="generate()">
     <header>
        <div class="logo"><span>Nova</span></div>
       <ul>
          <a href="../Home_Produit/homeproduit.php" >  <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="Form_error.php" > <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="Form_error.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="Form_error.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>
        </ul>
    
    </header>

<div class="left">
    <form action="verif_inscr.php" method="post" class="form" >
         <div class="titre">Inscription</div>
    <div class="container-left">
        <p>
            <label for="Nom">Nom: </label> <br>
 <?PHP   echo   '<input type="text" class="input" name="nom" required value="'.$_SESSION["nom"].'" >';    ?>
        </p>
        <p>
            <label for="Prenom">Prenom: </label> <br>
<?PHP   echo    '<input type="text" class="input" name="prenom" required value="'.$_SESSION["prenom"].'">';   ?>
        </p>
        <p>
            <label for="email">Email: </label> <br>
<?PHP   echo      '<input type="email" id="email" name="email" required onBlur="verif_email()" class="input" '.$msg.'>';   ?> 
        </p>
        <p>
            <i id="msg2" class="fa-solid fa-circle-xmark" ></i>   
            <label for="password">Password: </label> <br>
<?PHP   echo '<input type="password" name="mdp" id="mdp" onblur="verif_mdp()"  required class="input" placeholder="'.$msg1.'">';  ?>
             
        </p>
        <p>
            <i id="msg3" class="fa-solid fa-circle-xmark" ></i>   
            <label for="confirmpassword">Confirmer Password: </label> <br>
<?PHP   echo '<input type="password" name="Confirm_Password" id="c_mdp" onblur="comfirm_mdp()" required class="input" placeholder="
        '.$msg2.'">'; ?>
        </p>
<div class="captcha">
        <div id="champ" class="inline">
<?PHP   echo  '<input type="text" id="code" placeholder="'.$msg3.'" name="captcha" style="#code::placeholder{color: red;}"/>'; ?>
        </div>

    <div class="inline" onclick="generate()">
        <i class="fas fa-sync"></i>
    </div> 
<input type="text" id="image" name="image" class="inline" readonly readonly onmousedown="return false;" onselectstart="return false;" >

 
    <p id="res"></p>
<div class="Captcha">
        <p class="buttons">
        <button class="button" type="submit" id="valider"> <span> Submit</span></button>
        <button class="button" type="reset">Reset</button>
        </p>
</div>    
    </form> 
  
    </div>   

        
     

    
</body>
</html>