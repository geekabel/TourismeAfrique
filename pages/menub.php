<?php require_once('session.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>menu</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/Map.css"> -->
</head>
<body>   
   <nav class="navbar navbar-inverse nav-fixed-top">
       <div class="container-fluid">
           <div class="navbar-header">
               <!-- redirection vers le menu et apres un clic de plus vers l'onglet guide -->
                <a href="guide.php" class="navbar-brand">Gestions de reservations</a> 
           </div>
           <ul class="nav navbar-nav">
              <li><a href="tourisme.php">Les touristes</a></li>
              <li><a href="guide.php">Les guides</a></li>
              <!-- il verifie si c'est bien un admin  -->
              <?php if($_SESSION['user']['role']=="ADMIN") {?>
                    <li><a href="utilisateur.php">Les utilisateurs</a></li>
              <?php } ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
				<li>
					<a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'];?>">
						<span class="glyphicon glyphicon-user"></span> 
						<?php echo $_SESSION['user']['login'];?>
					</a>
				</li>
				<li>
					<a href="SeDeconnecter.php">
						<span class="glyphicon glyphicon-log-out"></span>
						Se Deconnecter
					</a>
				</li>
			</ul>
        </div>
    </nav>
    <!-- <div class="container">
    <h1>Bienvenue sur votre espace personnel</h1>
    </div> -->
    
</body>
</html>