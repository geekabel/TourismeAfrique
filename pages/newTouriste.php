<!--  Ajouter Nouveau touriste  -->
<?php require_once('session.php');?>
<?php
    require_once('connexiondb.php');

    $requeteG ="select * from guide";
    $resultatG = $pdo->query($requeteG);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter un nouveau touriste</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Map.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php include("menub.php"); ?>
<div class="container">

    <div class="panel panel-primary">
            <div class="panel-heading">Les infos du nouveau touriste :</div>
            <div class="panel-body">
            <form method="post" action="insertTourisme.php" class="form" enctype="multipart/form-data">
                    <!-- Le nom -->
                    <div class="form-group">
                        <label for="nom">nom du Touriste :</label> 
                        <input type="text" name="nom" placeholder="Taper le nom du touriste " class="form-control"/>
                    </div>
                    <!-- Prenom -->
                    <div class="form-group">
                        <label for="prenom">Prenom :</label> 
                        <input type="text" name="prenom" placeholder="prenom" class="form-control"/>
                    </div>
                    <!-- La civilité -->
                    <div class="form-group">
                        <label for="civilite">civilité : </label> 
                            <div  class="radio">
                                    <label><input type="radio" name="civilite" value="F" checked /> F </label><br>
                                    <label><input type="radio" name="civilite" value="M"/> M </label>     
                            </div> 
                    </div>
                    <div class="form-group">
                            <!-- Nom des guide->liaison -->
                        <label for="idGuide">Guide :</label> 
                        <select name="idGuide" class="form-control" id="idGuide"> 
                                <?php while ($guide=$resultatG->fetch()) { ?>
                                    <option value="<?php  echo $guide['idGuide']?>">
                                        <?php  echo $guide['nomGuide']?>
                                    </option>
                                <?php }?>   
                        </select>   
                    </div>  
                      <!-- L'image -->
                    <div class="form-group">
                        <label for="photo" class="control-label">Photo :</label> 
                        <input type="file" name="photo" id="photo" />
                    </div>
                 <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-save"></span>
                    Enregistrer
                 </button>
            </form>
            </div>
       </div>
      
    </div>
</div>
</body>
</html>
