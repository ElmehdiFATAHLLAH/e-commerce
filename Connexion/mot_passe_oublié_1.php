<?PHP
    session_start();
    
    $email=$_POST['email'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    
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


    $connexion=mysqli_connect("localhost", "root", "", "projet_web");
    $req="SELECT * FROM client WHERE Email_Cli='$email'";
    $result=mysqli_query($connexion, $req);
    
    
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
    {

        $mail->Subject= "Recuperation";
        $mail->Body= '<p> cher <strong>'.$row["Pre_Cli"].' '.$row["Nom_Cli"].', </strong></p><br><p>Votre mot de passe récupérée : <font color=\"#194a8d\">'.$row["Mdp_Cli"].'</font><br><br>Cordialement,</p>';
        $mail->send();
    }
    header("location:connexion.php");
?>