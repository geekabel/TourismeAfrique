<?php require_once('session.php');?>
<?php 

 require_once("connexiondb.php");
    
 $nom=isset($_POST['nom'])?$_POST['nom']:"";
 $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
 $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
 $idGuide=isset($_POST['idGuide'])?$_POST['idGuide']:1;

 $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
 $imagetemp=$_FILES['photo']['tmp_name'];

 move_uploaded_file($imagetemp,"../images/".$nomPhoto); 


   $requete="insert into tourisme(nom,prenom,civilite,idGuide,photo) values(?,?,?,?,?)";//faire attention avec les requete
   $params=array($nom,$prenom,$civilite,$idGuide,$nomPhoto);
   $resultat=$pdo->prepare($requete);
   $resultat->execute($params);

   header('location:tourisme.php');

?>
