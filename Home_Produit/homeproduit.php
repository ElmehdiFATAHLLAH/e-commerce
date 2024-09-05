<?PHP
session_start();
if(isset($_COOKIE["compte"])){
    $Id=$_COOKIE["compte"];

$cnx=mysqli_connect("localhost","root","","projet_web");
$query="SELECT * FROM client WHERE Id_Client=$Id";
$res=mysqli_query($cnx,$query);
$ligne=mysqli_fetch_array($res,MYSQLI_BOTH);
$_SESSION['id_cli']=$ligne['Id_Client'];
                            
$banner='<a href="..\Profil\profil.php">'.$ligne["Pre_Cli"].'</a>    <a href="..\Connexion\co_deco.php" <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>';
                            }
else{$banner='<a href="..\connexion\co_deco.php"> Connexion </a>';}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homeproduit.css">
 

     <script src="homeproduit.js"></script>
    <script src="https://kit.fontawesome.com/345710b615.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="heade">
<header>
        <div class="logo">Nova</div>
        <input type="text" id="search"  placeholder="Search..." class="input">
        <ul>
          <a href="../Home_Produit/homeproduit.php" > <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="../Panier/verif_panier.php"> <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="../Configuration/verif_config.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="../Profil/verif_profil.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>    
        <?PHP  echo $banner; ?>       
        </ul>
    </header>
      <div class="search"  id="searchres"></div>

      </div>
      <section class="content">
      <div class="wrapper">
        <div class="Banner">
         Carte Mère
        </div>
      </div>
     <div class="row">
        <?php 
 


     




                  $servername = "localhost";
                  $username="root";
                  $password="";
                  $database="projet_web";
                  
                  $connection= mysqli_connect( $servername , $username,$password,$database);
                 
                 
                 
                  $sql="SELECT Id_Prod,Nom_Prod,Prix_Prod, Img_Prod FROM produit WHERE Type_Pro='Carte Mère' ORDER BY RAND() LIMIT 4";
                  $result=mysqli_query($connection,$sql);
                 




                   while (  $i=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo "  <div class='card'>
                    <div class='img'>
                      <img src='$i[Img_Prod]'>
                    </div>
                    <div class='info'>
                      <div>".$i["Nom_Prod"]."
                      </div>
                      <div>".$i["Prix_Prod"]." DHS
                      </div>
                      <form action='verifier.php' method='post'>
                  <button class='cart' name='btn' value=".$i["Id_Prod"]."><i class='fa-sharp fa-solid fa-cart-shopping'></i><span> Add to cart</span></button> </form>
                    </div>
                </div>";
                 
                   }


                 
 
               
                ?>
              </div>
        


    </section>

    <section class="content">
   



      <div class="wrapper">
        <div class="Banner">
          Carte Graphique
        </div>
      </div>
     <div class="row">
        <?php 
 


     




                  $servername = "localhost";
                  $username="root";
                  $password="";
                  $database="projet_web";
                  
                  $connection= mysqli_connect( $servername , $username,$password,$database);
                 
                 
                 
                  $sql="SELECT Id_Prod,Nom_Prod,Prix_Prod,Img_Prod FROM produit WHERE Type_Pro='Carte Graphique' ORDER BY RAND() LIMIT 4";
                  $result=mysqli_query($connection,$sql);
                 




                   while (  $i=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo" 
                    <div class='card'>
                        <div class='img'>
                          <img src='$i[Img_Prod]'>
                        </div>
                        <div class='info'>
                          <div>".$i["Nom_Prod"]."
                          </div>
                          <div>".$i["Prix_Prod"]." DHS
                          </div>
                          <form action='verifier.php' method='post'>
                      <button class='cart' name='btn' value=".$i["Id_Prod"]."><i class='fa-sharp fa-solid fa-cart-shopping'></i><span> Add to cart</span></button> </form>
                        </div>
                    </div>
        
                 ";
                 
                   }


                 
 
               
                ?>
              </div>
        


    </section>

    <section class="content">
   



      <div class="wrapper">
        <div class="Banner">
         Processeur
        </div>
      </div>
     <div class="row">
        <?php 
 


     




                  $servername = "localhost";
                  $username="root";
                  $password="";
                  $database="projet_web";
                  
                  $connection= mysqli_connect( $servername , $username,$password,$database);
                 
                 
                 
                  $sql="SELECT Id_Prod,Nom_Prod,Prix_Prod, Img_Prod FROM produit WHERE Type_Pro='Processeur' ORDER BY RAND() LIMIT 4";
                  $result=mysqli_query($connection,$sql);
                 




                   while (  $i=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo "  <div class='card'>
                    <div class='img'>
                      <img src='$i[Img_Prod]'>
                    </div>
                    <div class='info'>
                      <div>".$i["Nom_Prod"]."
                      </div>
                      <div>".$i["Prix_Prod"]." DHS
                      </div>
                      <form action='verifier.php' method='post'>
                  <button class='cart' name='btn' value=".$i["Id_Prod"]."><i class='fa-sharp fa-solid fa-cart-shopping'></i><span> Add to cart</span></button> </form>
                    </div>
                </div>";
                 
                   }


                 
 
               
                ?>
              </div>
  
    </section>





    <section class="content">
      <div class="wrapper">
        <div class="Banner">
         Disque Dur
        </div>
      </div>
     <div class="row">
        <?php 
 


     




                  $servername = "localhost";
                  $username="root";
                  $password="";
                  $database="projet_web";
                  
                  $connection= mysqli_connect( $servername , $username,$password,$database);
                 
                 
                 
                  $sql="SELECT Id_Prod,Nom_Prod,Prix_Prod, Img_Prod FROM produit WHERE Type_Pro='Disque Dur' ORDER BY RAND() LIMIT 4";
                  $result=mysqli_query($connection,$sql);
                 




                   while (  $i=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo "  <div class='card'>
                    <div class='img'>
                      <img src='$i[Img_Prod]'>
                    </div>
                    <div class='info'>
                      <div>".$i["Nom_Prod"]."
                      </div>
                      <div>".$i["Prix_Prod"]." DHS
                      </div>
                      <form action='verifier.php' method='post'>
                  <button class='cart' name='btn' value=".$i["Id_Prod"]."><i class='fa-sharp fa-solid fa-cart-shopping'></i><span> Add to cart</span></button> </form>
                    </div>
                </div>";
                 
                   }


                 
 
               
                ?>
              </div>
        


    </section>






       <section class="content">
      <div class="wrapper">
        <div class="Banner">
         RAM
        </div>
      </div>
     <div class="row">
        <?php 
 


     




                  $servername = "localhost";
                  $username="root";
                  $password="";
                  $database="projet_web";
                  
                  $connection= mysqli_connect( $servername , $username,$password,$database);
                 
                 
                 
                  $sql="SELECT Id_Prod,Nom_Prod,Prix_Prod, Img_Prod FROM produit WHERE Type_Pro='RAM' ORDER BY RAND() LIMIT 4";
                  $result=mysqli_query($connection,$sql);
                 




                   while (  $i=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo "  <div class='card'>
                    <div class='img'>
                      <img src='$i[Img_Prod]'>
                    </div>
                    <div class='info'>
                      <div>".$i["Nom_Prod"]."
                      </div>
                      <div>".$i["Prix_Prod"]." DHS
                      </div>
                      <form action='verifier.php' method='post'>
                  <button class='cart' name='btn' value=".$i["Id_Prod"]."><i class='fa-sharp fa-solid fa-cart-shopping'></i><span> Add to cart</span></button> </form>
                    </div>
                </div>";
                 
                   }


                 
 
               
                ?>
              </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</section>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="SM">

<img src="NovaTok.png" >
<img src="Novatwit.png" >

</section>

<script>
     
     $(document).ready(function(){

$("#search").keyup(function(){
   var input = $(this).val();
      if (input != "") {
        $.ajax({
           url:"live.php",
           methode:"POST",
           data:{input:input},

           success:function(data){
            $("#searchres").html(data);
            $("#searchres").css("display","inline");
            $("#searchres").css("background-color","#2519d477");
           }


        });
      }else{
        $("#searchres").css("display","none");
        
      }


});
});
</script>

  

  </body>
</html>