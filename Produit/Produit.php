<?php
session_start();
$Id=$_COOKIE["compte"];   

    $servername = "localhost";
    $username="root";
    $password="";
    $database="projet_web";
    $connection= mysqli_connect( $servername , $username,$password,$database);

    $sql="SELECT * FROM Produit WHERE Id_Prod=$_SESSION[id_pro]";
 
    $result=mysqli_query($connection,$sql);  
    $i=mysqli_fetch_array($result,MYSQLI_ASSOC);
    

    if($i["Qte_Stock"]==0){$msg="<button class='rupture' disabled> Rupture de stock </button>";}
    else{$msg="<button class='cart' name='id' value=".$i['Id_Prod'] ."><i class='fa-sharp fa-solid fa-cart-shopping'></i><span> Add to cart</span></button>
        <input class='qte' type='number' min='0' id='qte' name='qte' value='0'>
        </div>";}  
    
    
    $query="SELECT * FROM client WHERE Id_Client=$Id";
    $res=mysqli_query($connection,$query);
    $ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
                            
    $banner='<a href="..\Profil\verif_profil.php">'.$ligne["Pre_Cli"].'    <a href="..\connexion\co_deco.php">  <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>';    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="./produit.css">
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>
    <script src="produit.js"></script>
</head>
<body>
    <header>
    <div class="logo">Nova</div>
    <ul>
          <a href="../Home_Produit/homeproduit.php" >  <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="../Panier/Panier.php" > <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="../Configuration/laptop.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="../Profil/profil.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>
    <?PHP echo $banner; ?>
    </ul>
    </header>


    <section>
        <form action="buy.php" method="post" onSubmit="return check_qte()">
        <?php 
        $_SESSION['img']=$i["Img_Prod"];
        $_SESSION['id_prod']=$i["Id_Prod"];
         echo "<div class='container'>
        <div class='img'>
             <img src='".$i["Img_Prod"]."' >
        </div>
        <div class='info'>
               
            
         
           <div class='Title'>".$i["Nom_Prod"]."</div>
           <div class='Price'>".$i["Prix_Prod"]." DHS</div>
           <div class='Description'>
            <div class='Text_Desc'>
            ".$i["Desc_Prod"]."
        </div>
        </div>".$msg."
                
        </div>";
    ?>
    </form>
    
    </section>
</body>
</html>
