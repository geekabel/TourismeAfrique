<?php require_once('session.php');?>
<?php
    require_once("connexiondb.php");
    // if (isset($_GET['nomPrenom'])) 
    //     $nomG=$_GET['nomPrenom'];
    // else 
    //     $nomPrenom=$_GET[""];
   
  
        $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
        $idguide=isset($_GET['idguide'])?$_GET['idguide']:"0";

        $taille=isset($_GET['taille'])?$_GET['taille']:3;
        $page=isset($_GET['page'])?$_GET['page']:1;
        $offset=($page-1)*$taille;

        $requeteGuide="select * from guide";
     
        if ($idguide==0) {
            // jointure de table
         $requeteTourisme = "select idTourisme,nom,prenom,nomGuide,photo,civilite
                     from guide as g,tourisme as t 
                     where g.idGuide=t.idGuide 
                     and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                     order by idTourisme
                     limit $taille 
                     offset $offset";
         $requeteCount ="select count(*) countT from tourisme 
                               where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
        }else{
            // deuxieme requete à revoir
            //03/2019: ma nouvelle reque va essayer de compter le nombre de guidue si on en a plusieurs (10,20, etc..);
            $requeteTourisme = "select idTourisme,nom,prenom,nomGuide,photo,civilite
                     from guide as g,tourisme as t where g.idGuide=t.idGuide 
                     and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') 
                     and g.idGuide=$idguide
                     order by idTourisme
                     limit $taille 
                     offset $offset";
         $requeteCount ="select count(*) countT from tourisme 
                               where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                               and idGuide=$idguide";
        }

    $resultatGuide = $pdo->query($requeteGuide);
    
    $resultatTourisme= $pdo->query($requeteTourisme);
    // construction de la pagination
    $resultatCount=$pdo->query($requeteCount);

    $tabCount = $resultatCount->fetch();
    $nbrTouriste=$tabCount['countT'];
    $reste= $nbrTouriste % $taille; 
                                 
    if ($reste===0){
        $nbrPage =$nbrTouriste/$taille;
    }
    else{
        $nbrPage=floor($nbrTouriste/$taille)+1; //floor : la partie entiere d'un nombre decimal
    }     
 ?>
 <!-- Debut de la partie HTML -->
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion de touristes</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Map.css">

    <!-- <script src="main.js"></script> -->
</head>
<body>
     <?php include("menub.php"); ?>

    <div class="container">
        <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher les touristes...</div>
            <div class="panel-body">
                <form method="get" action="tourisme.php" class="form-inline">
                    
                    <div class="form-group">
                       <input type="text" name="nomPrenom" placeholder="Nom et prenom du touriste"class="form-control" value="<?php echo $nomPrenom ?>">
                    </div>

                   <label for="idguide">Tourisme :</label> 
                    <select name="idguide" class="form-control"id="idguide" 
                            onchange="this.form.submit()">
                            <option value="0">Tout les guides</option>    
                        <?php while ($guide= $resultatGuide->fetch()) {  ?>
                           <option value="<?php echo $guide['idGuide'] ?>"
                                <?php if($guide['idGuide']===$idguide) echo "selected"?>>
                                <?php echo $guide['nomGuide'] ?>
                           </option>
                        <?php } ?> 
                    </select>
                 <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>
                    Chercher...
                 </button>
                 &nbsp &nbsp
                 <!-- seul celui qui dispose des droits admin peuvent ajouter un touriste -->
                 <?php if($_SESSION['user']['role']=="ADMIN") {?>
                 <a href="newTouriste.php"><span class="glyphicon glyphicon-plus"></span>
                 Nouveau Touriste</a>
                 <?php } ?>
                </form>
            </div>
       </div>
        <!-- c'est la fin de premier petit box . -->
       <div class="panel panel-primary">
            <div class="panel-heading">Liste des Touristes (<?php echo $nbrTouriste ?> Touristes )</div>
            <div class="panel-body">
            <!-- Affichage sous forme de tableau de la requete lancé plus haut -->
               <table class="table table-striped table-bordered"> 
                   <thead>
                       <tr>
                           <th>Id Touriste</th>
                           <th>Nom</th>
                           <th>Prenom</th>
                           <th>Guide</th>
                           <th>Photo</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                      
                        <?php while($tourisme=$resultatTourisme-> fetch()){?>
                            <!-- Pour chaque guide je dois creer une ligne . j'avais le tr hors de la boucle et ca me donne un autre resultat  -->
                            <tr>
                                <td><?php echo $tourisme['idTourisme'] ?></td>
                                <td><?php echo $tourisme['nom'] ?></td>
                                <td><?php echo $tourisme['prenom'] ?></td>
                                <td><?php echo $tourisme['nomGuide'] ?></td>
                                <td>
                                    <img src="../images/<?php echo $tourisme['photo'] ?>" alt="" width="50px" height="40px" class="img-thumbnail">
                                </td>
                                <td>
                                    <!-- Pour chaque icône,on realise des actions de modification et de suppression -->
                                    <a href="modifierTourisme.php?idT=<?php echo $tourisme['idTourisme'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                    &nbsp
                                    <a onClick="return confirm('Etes-vous sûr de vouloir supprimer le touriste')" href="supprimerTourisme.php?idT=<?php echo $tourisme['idTourisme'] ?>">
                                       <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                   </tbody>
               </table>
               <!-- fin du tableau -->
               <div>
                    <ul class="pagination">
                        <?php for ($i=1; $i <= $nbrPage ; $i++) { ?>
                              <li class="<?php if ($i==$page) echo 'active'?>"> 
                                <a href="tourisme.php?page=<?php echo $i; ?>&nomPrenom=<?php echo $nomPrenom ?>&idguide=<?php echo $idguide ?>">
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