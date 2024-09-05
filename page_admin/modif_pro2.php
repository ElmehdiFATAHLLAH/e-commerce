<?php
    session_start();
    $id=$_POST['id'];
    $_SESSION['id']=$id;
    $cnx=mysqli_connect("localhost","root","","projet_web");

    $requete="SELECT count(Id_Prod) AS n FROM produit WHERE Id_Prod='$id'";
    $result=mysqli_query($cnx, $requete);
    $row=mysqli_fetch_assoc($result);


    if($row['n']>0){

    $query="SELECT * FROM produit WHERE Id_Prod='$id'";
    $res=mysqli_query($cnx,$query);
    $ligne=mysqli_fetch_assoc($res);

    $nom=$ligne["Nom_Prod"];
    $type=$ligne["Type_Pro"];

    $qte=$ligne["Qte_Stock"];
    $prix=$ligne["Prix_Prod"];
    $desc=$ligne["Desc_Prod"];
    $img=$ligne["Img_Prod"];
    $banner='<a href="..\connexion\co_deco.php"> Connexion </a>';

                }

    else{
        header("location:produit_intouvable.php");
    }            
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
     <script src="ajout_modif_pro.js"></script>
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
    
    <div class="modif">
         <form action="modif.php" method="post" enctype="multipart/form-data" onSubmit="return check_ajout_modif()">
             <table>
            <tr>
                <td><th class="titre_table" style="font-size: 25px;">Modifier Produit</th></td></tr>
            <tr>
                <td><label for="Nom_Produit">Nom Produit :</label></td>
                <td><input class="ip" type="text" name="Nom" id="nom" value="<?PHP echo $nom; ?>"></td></tr>
            <tr>
                <td><label for="type">Type: </label></td>
                <td><select name="type[]" id="type" class="select" >
                    <option value="Processeur" <?PHP if($type=="Processeur"){echo "selected";} ?>>Processeur</option>
                    <option value="Carte Mère" <?PHP if($type=="Carte Mère"){echo "selected";} ?>>Carte Mere</option>
                    <option value="Disque Dur" <?PHP if($type=="Disque Dur"){echo "selected";} ?>>Disque Dur</option>
                    <option value="RAM" <?PHP if($type=="RAM"){echo "selected";} ?>>RAM</option>
                    <option value="Carte Graphique" <?PHP if($type=="Carte Graphique"){echo "selected";} ?>>Carte Graphique</option> 
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="Qte">Quantite:</label></td>
                 <td><input class="ip" type="number" name="Qte" id="qte" value="<?PHP echo $qte; ?>"></td></tr>        
            <tr>
                <td><label for="Prix">Prix</label></td>
                <td><input class="ip" type="number" name="Prix" id="prix" value="<?PHP echo $prix; ?>"></td></tr>
            <tr>
            <td><label for="Desc">Description: </label></td>
            <td><input class="ip" type="text" name="Desc" id="desc" value="<?PHP echo $desc; ?>"></td></tr>
            <tr>
            <td><label for="Img">Image: </label></td>
                <td><input class="img" type="file" name="Img" id="img" value="<?PHP echo $img; ?>"> </td>
                
            </tr>     
                
            </table>   
            <input type="submit" name="modifier" class="modifier" value="Modifier">
         </form>
    </div>
</body>
</html>

