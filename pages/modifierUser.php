<!-- Modification de guide de la base de donnée  -->
<?php require_once('session.php');?>
<?php
    require_once('connexiondb.php');
    //les requetes
    $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
    $requeteUser ="select * from utilisateur where idUser=$idUser";
    $resultatUser = $pdo->query($requeteUser);
    $user=$resultatUser->fetch();
    //les données
    $login=$user['login'];
    $email=$user['email'];
    $role=strtoupper($user['role']); // pour avoir le champ de text toujours en majuscule
  

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modification d'utilisateur</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Map.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php include("menub.php"); ?>
<div class="container">

    <div class="panel panel-primary">
            <div class="panel-heading">Modifier de l'utilisateur :</div>
            <div class="panel-body">
            <form method="post" action="updateUser.php" class="form">
                        <!-- id -->
                    <div class="form-group">
                        <label for="idUser"> id utilisateur :<?php echo $idUser ?></label> 
                        <input type="hidden" name="idUser" class="form-control" value="<?php echo $idUser ?>">
                    </div>
                    <!-- Le LOGIN -->
                    <div class="form-group">
                        <label for="login">Login :</label> 
                        <input type="text" name="login" placeholder="Taper le nouveau login" class="form-control" value="<?php echo $login ?>"/>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="login">Email :</label> 
                        <input type="text" name="email" placeholder="email" class="form-control" value="<?php echo $email ?>"/>
                    </div>
                    <!-- LE ROLE -->
                    <div class="form-group">
                        <select name="role" class="form-control">
                            <option value="ADMIN" <?php if($role=="ADMIN") echo 'selected' ?>>Administrateur</option>
                            <option value="VISITEUR"<?php if($role=="VISITEUR") echo 'selected' ?>>Visiteur</option>
                        </select>   
                    </div>
                    
                 <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-save"></span>
                    Enregistrer
                 </button>
                 &nbsp;&nbsp;
                <a href="modifierPwd.php?idUser=<?php echo $idUser ?>">Changer le mot de passe</a>
            </form>
            </div>
       </div>
      
    </div>
</div>
</body>
</html>
<!-- onchange="this.form.submit()" -->