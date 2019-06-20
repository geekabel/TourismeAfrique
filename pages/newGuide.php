<?php require_once('session.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Map.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php include("menub.php"); ?>
<div class="container">
    <div class="panel panel-primary">
            <div class="panel-heading">Veuillez ajouter un nouveau guide</div>
            <div class="panel-body">
            <!-- insertGuide.php me permet d'enregistrer le niveau et nomGuide dans la base de donnée -->
            <form method="post" action="insertGuide.php" class="form">

                    <div class="form-group">
                        <label for="niveau">Taper le nom du guide :</label> 
                        <input type="text" name="nomG" placeholder="Taper le nom du guide"class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="niveau">Niveau :</label> 
                        <select name="niveau" class="form-control"id="niveau"> 
                                <option value="N1"selected >Niveau 1</option>
                                <option value="N2">Niveau 2</option>
                                <option value="N3">Niveau 3</option>
                                <option value="N4">Niveau 4</option>
                                <option value="N5">Niveau 5</option>
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
<!-- onchange="this.form.submit()" -->