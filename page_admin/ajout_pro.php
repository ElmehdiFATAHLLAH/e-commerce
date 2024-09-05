<?PHP
$banner='<a href="..\connexion\co_deco.php"> Connexion </a>';                   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://kit.fontawesome.com/e0febe2254.js" crossorigin="anonymous"></script>   
     <link rel="stylesheet" href="admin.css">
     <script src="ajout_modif_pro.js"> </script>
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
        <a href="admin.php">Home</a>
        <a href="admin_client.php">Client</a>
        <a href="admin_produit.php" style="background-color: white; color: #1B1290;">Produit</a>
        
</div>
    

    <div class="ajout">
         <form action="ajout.php" method="post" enctype="multipart/form-data" onSubmit="return check_ajout_modif()">
            <table>
            <tr>
                <td><th class="titre_table" style="font-size: 25px;">Ajouter Produit</th></td></tr>
            <tr>
                <td><label for="Nom_Produit">Nom Produit :</label></td>
                <td><input class="ip" type="text" id="nom" name="Nom"></td></tr>
            <tr>
                <td><label for="type">Type: </label></td>
                <td><select name="type[]" id="type" class="select">
                    <option value="Processeur">Processeur</option>
                    <option value="Carte Mère">Carte Mere</option>
                    <option value="Disque Dur">Disque Dur</option>
                    <option value="RAM">RAM</option>
                    <option value="Carte Graphique">Carte Graphique</option> 
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="Qte">Quantite:</label></td>
                 <td><input class="ip" type="number" name="Qte" id="qte"></td></tr>        
            <tr>
                <td><label for="Prix">Prix</label></td>
                <td><input class="ip" type="number" name="Prix" id="prix"></td></tr>
            <tr>
            <td><label for="Desc">Description: </label></td>
            <td><input class="ip" type="text" name="Desc" id="desc"></td></tr>
            <tr>
            <td><label for="Img">Image: </label></td>
                <td><input class="img" type="file" name="Img" id="img"> </td>
                
            </tr>     
                
            </table>  
            <input type="submit" name="ajouter" class="ajouter" value="Ajouter">

         </form>
    </div>
</body>
</html>

