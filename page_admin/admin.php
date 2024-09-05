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
</head>
<body>
    <header>
    <div class="logo">Nova</div>
    <ul>
          <a href="../Home_Produit/homeproduit.php" > <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
          <a href="../Connexion/connexion.php"> <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="../Connexion/connexion.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="../Connexion/connexion.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>    
        <?PHP  echo $banner; ?>       
    </ul>
    </header>

    <div class="slide">
        <a href="admin.php" style="background-color: white; color: #1B1290;">Home</a>
        <a href="admin_client.php">Client</a>
        <a href="admin_produit.php">Produit</a>
     </div>
    <section class="container-card">
           <div class="card">
                   <div>
                      <?php
                    $connection=mysqli_connect("localhost", "root", "", "projet_web");
                    $req="SELECT count(Id_Client) AS count FROM client";
                    $result=mysqli_query($connection,$req);
                    $nb_cli=mysqli_fetch_assoc($result);
                    mysqli_close($connection);
                    ?>
                    <div class="number"><?php echo $nb_cli["count"];?></div>
                      <div class="namecard">Clients</div>
                   </div>
                   <div class="icone">
                    <i class="fa-solid fa-eye"></i>
                   </div>
           </div>
           <div class="card">
                    <div>
                    <?PHP
                    $prix_total=0;
                    $connection=mysqli_connect("localhost","root","","projet_web");
                    $query="SELECT * FROM commande";
                    $result=mysqli_query($connection,$query);
                    while($ligne=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    $Id_Prod=$ligne["Id_Prod"];
                    $query2="SELECT * FROM produit WHERE Id_Prod='$Id_Prod'";
                    $result1=mysqli_query($connection,$query2);
                    $ligne2=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                    $prix_total=$prix_total+$ligne["Qte"]*$ligne2["Prix_Prod"];
                    }
                    mysqli_close($connection);
                    ?>
                    <div class="number" style="font-size: 25px;">
                    <?php  echo $prix_total." DHS"; ?>
                    </div>
                      <div class="namecard">Money</div>
                   </div>
                   <div class="icone">
                    <i class="fa-sharp fa-solid fa-money-bill"></i>
                   </div>
           </div>
           <div class="card">
            <div>
                <?php
                    $connection=mysqli_connect("localhost", "root", "", "projet_web");
                    $req="SELECT count(Id_Prod) AS count FROM produit";
                    $result=mysqli_query($connection,$req);
                    $nb_prod=mysqli_fetch_assoc($result);
                    mysqli_close($connection);
                    ?>
                <div class="number"><?php echo $nb_prod["count"];?></div>
                <div class="namecard">Produits</div>
             </div>
             <div class="icone">
                <i class="fa-solid fa-cart-shopping"></i>
             </div>
           </div>
    </section>





    <section>
        <div  class="table_cli_scroll">
        <table class="t_cli">
            <thead>
                <tr>
                    <th class="titre_table">Table Clients</th></tr>
                    <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                </tr >
            </thead>
            <tbody>
                <?php 
                  $servername = "localhost";
                  $username="root";
                  $password="";
                  $database="projet_web";
                  
                  $connection= mysqli_connect( $servername , $username,$password,$database);
                 
                 
                 
                  $sql="SELECT * FROM client";
                  $result=mysqli_query($connection,$sql);

                   while ($i=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo" <tr class='trow'>
                    <td>".$i["Id_Client"]."</td>
                     <td>".$i["Nom_Cli"]."</td>
                     <td>".$i["Pre_Cli"]."</td>
                    <td>".$i["Email_Cli"]."</td>
                    <td>".$i["Mdp_Cli"]."</td>
                 </tr>";

                   }


                  mysqli_close($connection);
 
               
                ?>
               
            </tbody>
        </table>
    </section>

    <br><br>

     <section>
        <div class="table_pro_scroll">
        <table class="t_pro">
            <thead>
                <tr>
                    <th class="titre_table">Table Produits</th></tr>
                    <tr>
                    <th>ID</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Qte</th>
                </tr >
            </thead>
            <tbody>
                <?php 
                  $connection= mysqli_connect("localhost", "root", "", "projet_web");
                  $sql="SELECT * FROM produit ORDER BY Qte_Stock ASC";
                  $result=mysqli_query($connection,$sql);
                   while ($i=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<tr class='trow'>";
                    if($i['Qte_Stock']==0)
                    {
                        echo "<td>".$i["Id_Prod"]."</td>
                        <td>".$i["Nom_Prod"]."</td>
                        <td>".$i["Prix_Prod"]." DHS</td>
                        <td style='color:red;'>QUANTITE RUPTURER</td></tr>";
                        continue;                        
                    }

                    echo "<td>".$i["Id_Prod"]."</td>
                    <td>".$i["Nom_Prod"]."</td>
                    <td>".$i["Prix_Prod"]." DHS</td>
                    <td>".$i["Qte_Stock"]."</td></tr>";
                    
                                                                        }


                  mysqli_close($connection);
 
               
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    </section>
</body>
</html>
