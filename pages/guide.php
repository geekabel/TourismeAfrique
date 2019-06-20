 <?php require_once('session.php');?>
 <?php
    
    require_once("connexiondb.php");
    // if (isset($_GET['nomG'])) 
    //     $nomG=$_GET['nomG'];
    // else 
    //     $nomG=$_GET[""];

    // $taille="5";
    // recherche en fonction des differents niveaux
        $nomG=isset($_GET['nomG'])?$_GET['nomG']:"";
        $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";

        $taille=isset($_GET['taille'])?$_GET['taille']:6;
        $page=isset($_GET['page'])?$_GET['page']:1;
        $offset=($page-1)*$taille;
     
        if ($niveau="all") {
         $requete = "select * from guide where nomGuide like '%$nomG%'
         limit $taille 
         offset $offset";
         $requeteCount ="select count(*) countG from guide 
                               where nomGuide like '%$nomG%' ";
        }else{
            // deuxieme requete à revoir
            //03/2019: ma nouvelle reque va essayer de compter le nombre de guidue si on en a plusieurs (10,20, etc..);
            $requete = "select * from guide 
                    where nomGuide like '%$nomG%' 
                    and niveau='$niveau'
                    limit $taille
                    offset $offset";
            $requeteCount ="select count(*) countG from guide 
                    where nomGuide like '%$nomG%' 
                    and niveau='$niveau'";
        }
    // $requete = "select * from guide";
    
    $resultatG = $pdo->query($requete);
    // construction de la pagination
    $resultatCount=$pdo->query($requeteCount);
    $tabCount = $resultatCount->fetch();
    $nbrGuide=$tabCount['countG'];
    $reste= $nbrGuide % $taille; //division euclidienne du nbrGuide/taille + operateur modulo 
                                 
    if ($reste===0){
        $nbrPage =$nbrGuide/$taille;
    }
    else{
        $nbrPage=floor($nbrGuide/$taille)+1; //floor : la partie entienre d'un nombre decimal
    }     
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des guides</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Map.css">

    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php include("menub.php"); ?>

    <div class="container">
        <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher des guides...</div>
            <div class="panel-body">
                <form method="get" action="guide.php" class="form-inline">
                    
                    <div class="form-group">
                       <input type="text" name="nomG" placeholder="Taper le nom du guide"class="form-control" value="<?php echo $nomG ?>">
                    </div>

                   <label for="niveau">Niveau :</label> 
                    <select name="niveau" class="form-control"id="niveau" 
                            onchange="this.form.submit()"> 
                        <option value="all"<?php if ($niveau==="all") echo "selected" ?>>Tous les niveaux</option>
                        <option value="N1"<?php if ($niveau==="N1") echo "selected" ?>>Niveau 1</option>
                        <option value="N2" <?php if ($niveau==="N2") echo "selected" ?>>Niveau 2</option>
                        <option value="N3" <?php if ($niveau==="N3") echo "selected" ?>>Niveau 3</option>
                        <option value="N4" <?php if ($niveau==="N4") echo "selected" ?>>Niveau 4</option>
                        <option value="N5" <?php if ($niveau==="N5") echo "selected" ?>>Niveau 5</option>
                    </select>
                 <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>
                    Chercher...
                 </button>
                 &nbsp &nbsp
                 <a href="newGuide.php"><span class="glyphicon glyphicon-plus"></span>
                 Nouveau Guide</a>
                </form>
            </div>
       </div>
        <!-- c'est la fin de premier petit box . -->
       <div class="panel panel-primary">
            <div class="panel-heading">Liste des Guides (<?php echo $nbrGuide ?> Guides )</div>
            <div class="panel-body">
            <!-- Affichage sous forme de tableau de la requete lancé plus haut -->
               <table class="table table-striped table-bordered"> 
                   <thead>
                       <tr>
                           <th>Id guide</th>
                           <th>Nom guide</th>
                           <th>Niveau</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                      <!--  -->
                        <?php while($guide=$resultatG->fetch()){?>
                            <!-- Pour chaque guide je dois creer une ligne . j'avais le tr hors de la boucle et ca me donne un autre resultat  -->
                            <tr>
                                <td><?php echo $guide['idGuide'] ?></td>
                                <td><?php echo $guide['nomGuide'] ?></td>
                                <td><?php echo $guide['niveau'] ?></td>
                                <td>
                                    <a href="modifierGuide.php?idG=<?php echo $guide['idGuide'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                    &nbsp
                                    <a onClick="return confirm('Etes-vous sûr de vouloir supprimer le guide')" href="supprimerGuide.php?idG=<?php echo $guide['idGuide'] ?>">
                                       <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                      
                   </tbody>
               </table>
               <!-- fin du tableau -->
               <div>
                    <ul class="pagination">
                        <?php for ($i=1; $i <= $nbrPage ; $i++) { ?>
                              <li class="<?php if ($i==$page) echo 'active'?>"> 
                              <a href="guide.php?page=<?php echo $i; ?>&nomG=<?php echo $nomG ?>&niveau=<?php echo $niveau ?>">
                                     <?php echo $i; ?>
                                   </a>
                              </li>  
                        <?php }?>
                    </ul>
               </div>
            </div>
       </div>

   </div>
</body>
</html>