<!-- Modification de guide de la base de donnée  -->
<?php require_once('session.php');?>
<?php
    require_once('connexiondb.php');

    $idg=isset($_GET['idG'])?$_GET['idG']:0;
    $requete ="select * from guide where idGuide=$idg";
    $resultat = $pdo->query($requete);
    $guide=$resultat->fetch();
    $nomG=$guide['nomGuide'];
    $niveau=strtolower($guide['niveau']);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modification du guide</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Map.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php include("menub.php"); ?>
<div class="container">
    <div class="panel panel-primary">
            <div class="panel-heading">Modifier un Guide :</div>
            <div class="panel-body">
            <form method="post" action="updateGuide.php" class="form">

                    <div class="form-group">
                        <label for="niveau"> id du guide :<?php echo $idg ?></label> 
                        <input type="hidden" name="idG" class="form-control" value="<?php echo $idg ?>">
                    </div>
                    <!-- Pour recuperer la valeur ; je dois utiliser le php $.. -->
                    <div class="form-group">
                        <label for="niveau">Taper le nom du guide :</label> 
                        <input type="text" name="nomG" 
                        placeholder="Taper le nom du guide" 
                        class="form-control"
                        value="<?php echo $nomG ?>"
                        >
                    </div>

                    <div class="form-group">
                        <label for="niveau">Niveau :</label> 
                        <select name="niveau" class="form-control"id="niveau"> 
                                <option value="N1"<?php if ($niveau=="N1") echo "selected" ?>>Niveau 1</option>
                                <option value="N2"<?php if ($niveau==="N2") echo "selected" ?>>Niveau 2</option>
                                <option value="N3"<?php if ($niveau==="N3") echo "selected" ?>>Niveau 3</option>
                                <option value="N4"<?php if ($niveau==="N4") echo "selected" ?>>Niveau 4</option>
                                <option value="N5"<?php if ($niveau==="N5") echo "selected" ?>>Niveau 5</option>
                        </select>
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