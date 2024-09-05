<?PHP
session_start();
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
          <a href="../Panier/verif_panier.php"> <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
          <a href="../Configuration/verif_config.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
          <a href="../Profil/verif_profil.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>    
        <?PHP  echo $banner; ?>       
    </ul>    
    </header>

    <div class="slide">
        <a href="admin.php">Home</a>
        <a href="admin_client.php" style="background-color: white; color: #1B1290;">Client</a>
        <a href="admin_produit.php">Produit</a>
        
</div>
   

    <section class="tableau_cli">
        <div class="table_cli_scroll_op">
        <table >
            <thead>
                <tr>
                    <th class="titre_table">Table Clients</th>
                </tr>
                <tr>    
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Options</th>
                </tr >
            </thead>
            <tbody>
                <form action="supp.php" method="post">
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
                    <td>
                    <div style='display: inline-block;'>
                    <form action='supp.php' method='post'><button class='btn' name='btn' value=".$i["Id_Client"] .">Supprimer</button></form>
                    </div>
                    <div style='display: inline-block;'>
                    <form action='voir_commande.php' method='POST'>
                    <button class='btn' name='btn' value=".$i["Id_Client"].">Voir Commandes</button></form> 
                    </div>
                    <div style='display: inline-block;'>
                    <form action='voir_pcs.php' method='POST'>
                    <button class='btn' name='btn' value=".$i["Id_Client"].">Voir PCs</button></form> 
                    </div>
                    </td>
                 </tr>";

                   }


                  mysqli_close($connection);
 
               
                ?>
               
            </tbody>
        </table>
    </div>
        <br><br><br><br><br>
        <br>
        <br>
    </section>
</body>
</html>

