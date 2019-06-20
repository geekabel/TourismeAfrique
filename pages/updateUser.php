<?php require_once('session.php');?>
<?php 

 require_once("connexiondb.php");
    

 $idUser=isset($_POST['idUser'])?$_POST['idUser']:0;
 $login=isset($_POST['login'])?$_POST['login']:"";
 $email=isset($_POST['email'])?$_POST['email']:"";
 $role=isset($_POST['role'])?$_POST['role']:"";



   $requete="UPDATE utilisateur set login=?,email=?,role=? where idUser=?";
   $params=array($login,$email,$role,$idUser);
   $resultat=$pdo->prepare($requete);
   $resultat->execute($params);

   header('location:utilisateur.php');

?>