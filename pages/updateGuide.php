<?php require_once('session.php');?>
<?php 

 require_once("connexiondb.php");
    

 $idG=isset($_POST['idG'])?$_POST['idG']:0;
 $nomG=isset($_POST['nomG'])?$_POST['nomG']:"";
 $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";

   $requete="update guide set nomGuide=?,niveau=? where idGuide=?";
   $params=array($nomG,$niveau,$idG);
   $resultat=$pdo->prepare($requete);
   $resultat->execute($params);

   header('location:guide.php');

?>