<?php
	require_once('session.php');
	if(isset($_SESSION['erreurEmailExiste'])){
		$erreurEmailExiste=$_SESSION['erreurEmailExiste'];
		$_SESSION['erreurEmailExiste']="";
	}else{
		$erreurEmailExiste="";
		
	}
?>
<?php
	
	$id=$_GET['id'];
	require_once('connexiondb.php');
	$requete="select * from utilisateur where iduser=$id";
	$resultat = $pdo->query($requete);
	$user=$resultat->fetch();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Editer un utilisateur</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/front.css">
	</head>
	<body>		
		<div class="container col-lg-4 col-md-offset-4">
			<br>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Editer un utilisateur</div>
				<div class="panel-body">
					<form method="post" action="updateUser.php" class="form">
					
						<div class="form-group">
							<label for="id" class="control-label" >
								Id=<?php echo $user['iduser']; ?>
							</label>
							<input type="hidden" name="idUser" 
									id="idUser" class="form-control" 
									value="<?php echo $user['iduser']; ?>"/>
						</div>
						
						<div class="form-group">
							<label for="login" class="control-label">Login</label>
							<input type="text" name="login" id="login" class="form-control"
									value="<?php echo $user['login']; ?>"/>
						</div>
						<div class="form-group">
							<label for="email" class="control-label">Email </label>
							<input type="text" name="email" id="email" class="form-control"
									value="<?php echo $user['email']; ?>"/>
						</div>
						<?php
								if($erreurEmailExiste!=""){?>			
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php echo $erreurEmailExiste ?>
									</div>			
						<?php 	}	?>	
						
							<!---- **************************  -->
						<?php if($_SESSION['user']['role']=="ADMIN") {?>
							
							<div class="form-group">
								<label for="role" class="control-label">Role</label>
								<select name="role" id="role" class="form-control">
										<option value="ADMIN" 
											<?php echo $user['role']=="ADMIN"?"selected":"" ?>>									
											ADMIN
										</option>	
										<option value="VISITEUR" 
											<?php echo $user['role']=="VISITEUR"?"selected":"" ?>>									
											VISITEUR
										</option>										

								</select>
							</div>
						<?php } ?>
					<!---- **************************  -->
							<!-- changer le mot de passe du compte admin -->
						<input type="submit" class="btn btn-primary" value="Enregistrer"/>
							&nbsp &nbsp	&nbsp &nbsp
						<a href="editPwd.php">Changer le mot de passe</a>	
					</form>
				</div>
			</div>		
		</div>
	</body>
</html>

