<?php
	
	require_once('connexiondb.php');
	
	if(isset($_GET['login']))
		$login=$_GET['login'];
	else
		$login="";
	
	if(isset($_GET['email']))
		$email=$_GET['email'];
	else
		$email="";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Création d'un nouveau compte utilisateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>
 
	<div class="container">
	  <h2>Création d'un nouveau compte utilisateur</h2>
	  
	  <div class="card bg-success text-white">
		<div class="card-body">La création de votre compte est achevée avec succes </div>
		<p><label for="login" class="control-label" >lOGIN :<?php echo $login; ?></label></p>
		<p><label for="email" class="control-label" >EMAIL :<?php echo $email; ?></label></p>
		<p><a href="login.php">Se connecter</a>	</p>
	  </div>
	 
	</div>

</body>
</html>