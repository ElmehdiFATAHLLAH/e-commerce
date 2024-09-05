<?PHP
session_start();
$email=$_POST["email"];
$mdp=$_POST["mdp"];
$c_mdp=$_POST["Confirm_Password"];
$captcha=$_POST["captcha"];
$img=$_POST["image"];
$n=strlen($mdp);
$_SESSION["erreur1"]=false;
$_SESSION["erreur2"]=false;
$_SESSION["erreur3"]=false;
$_SESSION["erreur4"]=false;

$_SESSION["prenom"]=$_POST['prenom'];
$_SESSION["nom"]=$_POST['nom'];

$cnx=mysqli_connect("localhost","root","","projet_web");
$query="SELECT Email_Cli FROM client";
$res=mysqli_query($cnx,$query);
while($ligne=mysqli_fetch_array($res,MYSQLI_BOTH)){
	if($email==$ligne["Email_Cli"]){
		$_SESSION["erreur1"]=true; 
        break;
                                    }
                                                   }
if(!$_SESSION["erreur1"]){$_SESSION["email"]=$_POST['email'];}
if($n<8){$_SESSION["erreur2"]=true;}
else{$_SESSION["mdp"]=$_POST['mdp'];}
if($mdp!=$c_mdp){$_SESSION["erreur3"]=true;}
if($captcha!=$img){$_SESSION["erreur4"]=true;}
if($_SESSION["erreur1"] || $_SESSION["erreur2"] || $_SESSION["erreur3"] || $_SESSION["erreur4"]){header("Location: Form_error.php");}
else{
	header("Location: email.php");
    }

?>