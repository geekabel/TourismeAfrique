<?php require_once('session.php');?>
<?php 
session_start();
if(isset($_SESSION['user'])){
 require_once("connexiondb.php");  
 $idG=isset($_GET['idG'])?$_GET['idG']:0;

 $requeteTour ="select count(*) countTour from tourisme where idGuide=$idG";
 $resultatTour=$pdo->query($requeteTour);
 $tabCountTour=$resultatTour->fetch();
 $nbrTour=$tabCountTour['countTour'];

 if($nbrTour== 0){
    $requete="delete from guide where idGuide=?";
    $params=array($idG);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    header('location:guide.php');
 }
 else{
    $msg="suppression impossible: vas supprimer tout les touristes d'abord";
    header("location:alert.php?message=$msg");
   }
}else{
   header('location:login.php');
   }
   
?>
