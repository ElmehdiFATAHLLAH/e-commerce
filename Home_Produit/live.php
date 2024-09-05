<?php

session_start();




     




    $servername = "localhost";
    $username="root";
    $password="";
    $database="projet_web";
    
    $connection= mysqli_connect( $servername , $username,$password,$database);
   


    
        $input = $_GET['input'];
        $sql = "SELECT * FROM produit WHERE Nom_Prod LIKE '{$input}%' OR Type_Pro LIKE '{$input}%' ";
    $result=mysqli_query($connection,$sql);
   

    


     while (  $i=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    
         
       
                $type = $i['Type_Pro'];
                $nom = $i['Nom_Prod'];
             
                echo "<form action='verifier.php' method='post'>
                <button class='cart' name='btn' value=".$i["Id_Prod"]."> ".$type." : ".$nom."  </button> </form>
                <br> ";
               
                
            }
         
  





 
  ?>
  
   
 

