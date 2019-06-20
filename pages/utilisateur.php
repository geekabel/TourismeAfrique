<?php require_once('session.php');?>
<?php
        require_once("connexiondb.php");
    
        $login=isset($_GET['login'])?$_GET['login']:"";
        

        $taille=isset($_GET['taille'])?$_GET['taille']:3;
        $page=isset($_GET['page'])?$_GET['page']:1;
        $offset=($page-1)*$taille;
        
         $requeteUser = "select * from utilisateur where login like '%$login%'";
         $requeteCount ="select count(*) countUser from utilisateur";

       $resultatUser = $pdo->query($requeteUser);
    
       // construction de la pagination
       $resultatCount=$pdo->query($requeteCount);

       $tabCount = $resultatCount->fetch();
       $nbrUser=$tabCount['countUser'];
       $reste= $nbrUser % $taille; 
                                 
        if ($reste===0){
            $nbrPage =$nbrUser/$taille;
         }
         else{
            $nbrPage=floor($nbrUser/$taille)+1; //floor : la partie entiere d'un nombre decimal
         }     
?>
 <!-- Debut de la partie HTML -->
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Map.css">

    <!-- <script src="../js/main.js"></script> -->
</head>
<body>
     <?php include("menub.php"); ?>

    <div class="container">
        <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher les utilisateurs...</div>
            <div class="panel-body">
                <form method="get" action="utilisateur.php" class="form-inline">
                    
                    <div class="form-group">
                       <input type="text" name="login" placeholder="Login"class="form-control" value="<?php echo $login ?>">
                    </div>
                 <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>
                    Chercher...
                 </button>
                 &nbsp &nbsp
                </form>
            </div>
       </div>
        <!-- c'est la fin de premier petit box . -->
       <div class="panel panel-primary">
            <div class="panel-heading">Liste des Touristes (<?php echo $nbrUser ?> utilisateurs )</div>
            <div class="panel-body">
            <!-- Affichage sous forme de tableau de la requete lancé plus haut -->
               <table class="table table-striped table-bordered"> 
                   <thead>
                       <tr>   
                           <th>Login</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                        <?php while($user=$resultatUser-> fetch()){?>
                            <!-- Pour chaque guide je dois creer une ligne . j'avais le tr hors de la boucle et ca me donne un autre resultat  -->
                            <tr class="<?php echo $user['etat']==1?'success':'danger'?>">
                                <td><?php echo $user['login'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><?php echo $user['role'] ?></td>
                                <td>
                                    <!-- Pour chaque icône,on realise des actions de modification et de suppression -->
                                    <a href="modifierUser.php?idUser=<?php echo $user['iduser'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                    &nbsp;&nbsp;
                                    <a onClick="return confirm('Etes-vous sûr de vouloir supprimer cet utilisateur')" href="supprimerUser.php?idUser=<?php echo $user['iduser'] ?>">
                                       <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="activerUser.php?idUser=<?php echo $user['iduser'] ?>&etat=<?php echo $user['etat']?>">
                                        <?php 
                                             if($user['etat']==1){
                                                  echo'<span class="glyphicon glyphicon-remove"></span>';
                                             }else{
                                                  echo'<span class="glyphicon glyphicon-ok"></span>';
                                             }
                                        ?>
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
                                <a href="utilisateur.php?page=<?php echo $i; ?>&login=<?php echo $login ?>">
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