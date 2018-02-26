<?php
# on spécifie que l'on va utiliser les sessions PHP
session_start();
setcookie('id');
$_SESSION['flottant']=2.35;
#traitement PHP
$error="";

#traitement de la deconnection
if(isset($_GET['deconnexion'])){
	#on vide la session
	foreach ($_SESSION as $key => $value) {
	unset($_SESSION[$key]);

	}
}
var_dump($_SESSION);

#traitement du formulaire de connexion
if (isset($_POST['btnSubmit'])) {
	#vérifier les données
	if($_POST['username'] != "" ) {
		if($_POST['pswd'] != "") {
			#remplir la session
			$_SESSION['banjo']="tout le monde";
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['pswd'] = $_POST['pswd'];
			$_SESSION['money'] = 500;
			#puis direction la roulette
			header("Location: roulette.php");
		}
		else { $error = "Mot de passe incorrect";}
	} else { $error = "Nom d'utilisateur incorrect";}
}
if (isset($_POST['btnInscri'])) {
	header("Location: inscription.php");
}


?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8"/>
  <meta name="author" content="Fossier">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Le jeu de la Roulette</title>
  </head>
  <body>
  <h1> Connectez-vous pour jouer à la roulette</h1>
     <?php if($error != "");
		echo '<div id=error>'.$error.'</div>' ?>
	 

	<form method="post" action="index.php">
		User Name : <br>  <input id="userInput" type="text" name="username" placeholder="Username"><br>
		Mot de passe :<br> <input id="userInput" type="password" name="pswd" placeholder="Password"><br>
		<input type="submit" name="btnSubmit" value="Envoyer">
		<input type="reset" name="btnReset" value="Effacer">
	</form>
	
	<p>Pas encore de compte ?</p>
	<form method="post" action="index.php">
		<input type="submit" name="btnInscri" value="Inscrivez-vous">
	</form>
	<?php echo 'ça roule !'?>	
  </body>
</html>