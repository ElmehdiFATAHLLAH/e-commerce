<?php 
session_start();
require_once('tcpdf/tcpdf.php');
$Id=$_COOKIE["compte"];
$prix_total=$_SESSION["prix"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$connexion = mysqli_connect("localhost", "root", "", "projet_web");

$req2 = "SELECT Adr_Cli FROM client WHERE Id_Client = '$Id'";
$result2 = mysqli_query($connexion, $req2);
$adresse = mysqli_fetch_assoc($result2);

if ($adresse["Adr_Cli"] == NULL) {
    header("location:../Profil/profil.php");
} else {

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Shopping Cart');
$pdf->SetSubject('Shopping Cart');
$pdf->SetKeywords('PDF, shopping cart, PHP');


$pdf->AddPage();    
    $req = "SELECT * FROM client WHERE Id_Client = '$Id'";
    $result = mysqli_query($connexion, $req);
    $row = mysqli_fetch_assoc($result);
    $email = $row["Email_Cli"];

    $table = "<table style='text-align:center;'>
        <tr>
        <th> Produit </th>
        <th> Unités </th>
        <th> Prix </th>
        </tr>";

    $query = "SELECT * FROM panier WHERE Id_Client = '$Id'";    
    $res = mysqli_query($connexion, $query);        
    while ($lignes = mysqli_fetch_array($res, MYSQLI_BOTH)){
        $Id_Prod = $lignes['Id_Prod'];    
        $query2 = "SELECT * FROM produit WHERE Id_Prod = '$Id_Prod'";
        $res2 = mysqli_query($connexion, $query2);
        $ligne2 = mysqli_fetch_array($res2, MYSQLI_BOTH);
        $prixtotal = $lignes['Qte'] * $ligne2["Prix_Prod"];
        $table.= "<tr>
            <td>".$ligne2["Nom_Prod"]."</td>
            <td >".$lignes['Qte']."</td>
            <td>".$prixtotal." DHS</td>
                  </tr>";  
       
    $pdf->Cell(40, 10, $ligne2["Nom_Prod"], 1, 0, 'C');
    $pdf->Cell(60, 10, $ligne2["Prix_Prod"]." DH", 1, 0, 'C');
    $pdf->Cell(60, 10, $lignes['Qte'], 1, 1, 'C');

                                                            }

    $pdf->Cell(40, 10, 'Total Price:', 1, 0, 'C');
    $pdf->Cell(60, 10,  $prix_total." DH", 1, 0, 'C');

    $pdf->Output('Recu_Panier.pdf', 'D');


        $table.="</table>";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host= 'smtp.gmail.com';
    $mail->SMTPAuth= true;
    $mail->Username = 'novatechofficiel@gmail.com';
    $mail->Password = 'wfvsbagvkwjfovwa';
    $mail->SMTPSecure= 'ssl';
    $mail->Port = 465;

    $mail->setFrom('novatechofficiel@gmail.com');
    $mail->addAddress($email);
    $mail->IsHTML(true);
    $mail->Subject= "Recu commande";
    $mail->Body= '<p> Cher <strong>'.$row['Pre_Cli'].' '.$row['Nom_Cli'].', </strong></p><br> Le montant total a payer est <strong><span style="color:red;">'.$prix_total.' DHS</span></strong>. Le paiement se fait au moment de la livraison. La livraison à votre adresse:'.$row["Adr_Cli"].' se fera dans les 7 prochains jours. Voici les produits commandés: <br>:'.$table;
    $mail->send(); 


    $req1 = "SELECT * FROM panier WHERE Id_Client = '$Id'";
    $result1 = mysqli_query($connexion, $req1);
    while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
        $req2 = "INSERT INTO commande (Qte, Dat_Commande, Id_Client, Id_Prod) VALUES ($row[Qte], '$row[Dat_Commande]', $row[Id_Client], $row[Id_Prod])";
        $result2 = mysqli_query($connexion, $req2);

        $req3 = "DELETE FROM panier WHERE Id_Panier = $row[Id_Panier]";
        $result3 = mysqli_query($connexion, $req3);

        $req4 = "SELECT Qte_Stock FROM produit WHERE Id_Prod = $row[Id_Prod]";
        $result4 = mysqli_query($connexion, $req4);

        while ($row1 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
            $req5 = "UPDATE produit SET Qte_Stock = $row1[Qte_Stock] - $row[Qte] WHERE Id_Prod = $row[Id_Prod]";
            $result5 = mysqli_query($connexion, $req5);
        }

        $req6 = "INSERT INTO config (Qte, Dat_Config, Id_Client, Id_Prod) VALUES ($row[Qte], '$row[Dat_Commande]', $row[Id_Client], $row[Id_Prod])";
        $result6 = mysqli_query($connexion, $req6);
                                                                }
   
}

mysqli_close($connexion);


?>
