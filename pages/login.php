<!--  Page de Login  -->
<?php
session_start();
if(isset($_SESSION['erreurLogin']))
    $erreurLogin=$_SESSION['erreurLogin'];
    else{
        $erreurLogin="";
    }
    session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <!--lg(large) md(medium) sm xs sont les differentes tailles   -->
<div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
    <div class="panel panel-primary margetop">
            <div class="panel-heading">Se connecter :</div>
            <div class="panel-body">
                <!-- l'action est vers la page se connecter (à verifier au cas ou) +
               declenchement de l'alerte lorsqu'on fausse uniquement son password ou que le compte est desactiver -->
            <form method="post" action="seConnecter.php" class="form">
                <?php if(!empty($erreurLogin)) {?>    
                    <div class="alert alert-danger">
                    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
                        <?php  echo $erreurLogin ?>
                    </div>
                 <?php } ?>
                    <!-- Login -->
                    <div class="form-group">
                        <label for="login">Login :</label> 
                        <input type="text" name="login" placeholder="login" class="form-control"/>
                    </div>
                    <!-- Mot de passe -->
                    <div class="form-group">
                        <label for="pwd">Mot de passe :</label> 
                        <input type="password" name="pwd" placeholder="Mot de passe" class="form-control"/>
                    </div>
                    
                 <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-log-in"></span>
                    Se connecter 
                 </button>
                  <br><br>
                 <a href="InitialiserPwd.php">Mot de passe Oublié</a>
					&nbsp &nbsp	&nbsp
				 <a href="nouvelUtilisateur.php">Créer un compte</a>
            </form>
            </div>
       </div>  
    </div>
</div>
</body>
</html>
