<?php require_once('session.php');?>
<?php 

 require_once("connexiondb.php");
    

 $nomG=isset($_POST['nomG'])?$_POST['nomG']:"";
 $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";

   $requete="insert into guide(nomGuide,niveau) values(?,?)";
   $params=array($nomG,$niveau);
   $resultat=$pdo->prepare($requete);
   $resultat->execute($params);

   header('location:guide.php');

?>