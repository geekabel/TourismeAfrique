<!-- Modification de guide de la base de donnée  -->
<?php require_once('session.php');?>
<?php
    require_once('connexiondb.php');

    $idT=isset($_GET['idT'])?$_GET['idT']:0;
    $requeteT ="select * from tourisme where idTourisme=$idT";
    $resultatT = $pdo->query($requeteT);
    $tourisme=$resultatT->fetch();

    $nom=$tourisme['nom'];
    $prenom=$tourisme['prenom'];
    $civilite= strtoupper($tourisme['civilite']);
    $idGuide=$tourisme['idGuide'];
    $nomPhoto=$tourisme['photo'];

    $requeteG ="select * from guide";
    $resultatG = $pdo->query($requeteG);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modification des touristes</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Map.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php include("menub.php"); ?>
<div class="container">

    <div class="panel panel-primary">
            <div class="panel-heading">Modifier un touriste :</div>
            <div class="panel-body">
            <form method="post" action="updateTourisme.php" class="form" enctype="multipart/form-data">
                        <!-- id -->
                    <div class="form-group">
                        <label for="idT"> id du touriste :<?php echo $idT ?></label> 
                        <input type="hidden" name="idT" class="form-control" value="<?php echo $idT ?>">
                    </div>
                    <!-- Le nom -->
                    <div class="form-group">
                        <label for="nom">nom du Touriste :</label> 
                        <input type="text" name="nom" placeholder="Taper le nom du touriste " class="form-control" value="<?php echo $nom ?>"/>
                    </div>
                    <!-- Prenom -->
                    <div class="form-group">
                        <label for="prenom">Prenom :</label> 
                        <input type="text" name="prenom" placeholder="prenom" class="form-control" value="<?php echo $prenom ?>"/>
                    </div>
                    <!-- La civilité -->
                    <div class="form-group">
                        <label for="civilite">civilité : </label> 
                            <div  class="radio">
                                    <label><input type="radio" name="civilite" value="F" <?php if ($civilite==="F")echo "checked"?>/> F </label><br>
                                    <label><input type="radio" name="civilite" value="M"<?php if ($civilite==="M")echo "checked"?>/> M </label>     
                            </div> 
                    </div>
                    <div class="form-group">
                            <!-- Nom des guide->liaison -->
                        <label for="idGuide">Guide :</label> 
                        <select name="idGuide" class="form-control"id="idGuide"> 
                                <?php while ($guide=$resultatG->fetch()) { ?>
                                    <option value="<?php  echo $guide['idGuide']?>"
                                     <?php if($idGuide===$guide['idGuide']) echo "selected"?>>
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
