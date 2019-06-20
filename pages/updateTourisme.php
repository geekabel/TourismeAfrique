<?php require_once('session.php');?>
<?php 

 require_once("connexiondb.php");
    

 $idT=isset($_POST['idT'])?$_POST['idT']:0;
 $nom=isset($_POST['nom'])?$_POST['nom']:"";
 $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
 $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
 $idGuide=isset($_POST['idGuide'])?$_POST['idGuide']:1;

      $nomPhoto=$_FILES['photo']['name']; // recuperation du nom de la photo envoyé
      $imagetemp=$_FILES['photo']['tmp_name']; //Récuperer le Nom du fichier image temporaire sur le serveur
       
           //Déplacer le fichier temporaire vers le dossier images de mon application
      move_uploaded_file($imagetemp,"../images/".$nomPhoto); 

//  echo $nomPhoto . "<br>";
// echo $imagetemp;

// variante mois
if (!empty($nomPhoto)) {// empty($nomPhoto):$nomPhoto est vide (Photo non envoyée)
    // !empty($nomPhoto):$nomPhoto non vide (Photo envoyée)
   $requete="update tourisme set nom=?,prenom=?,civilite=?,idGuide=?,photo=? where idTourisme=?";
   $params=array($nom,$prenom,$civilite,$idGuide,$nomPhoto,$idT);
   $resultat=$pdo->prepare($requete);
   $resultat->execute($params);

//    var_dump($resultat);
}else{

    $requete="update tourisme set nom=?,prenom=?,civilite=?,idGuide=? where idTourisme=?";
    $params=array($nom,$prenom,$civilite,$idGuide,$idT);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
// var_dump($resultat);
   
}

    header('location:tourisme.php');

// variante 1
// if (isset($_FILES['photo']['name'])){
//       $nomPhoto=$_FILES['photo']['name'];
//       $imagetemp=$_FILES['photo']['tmp_name'];

 
//     move_uploaded_file($imagetemp,"../images/".$_FILES['photo']['name']); 
//     $requete="update tourisme set nom=?,prenom=?,civilite=?,idGuide=?,photo=? where idTourisme=?";
//    $params=array($nom,$prenom,$civilite,$idGuide,$nomPhoto,$idT);
//    $resultat=$pdo->prepare($requete);
//    $resultat->execute($params);
// //    var_dump($resultat);
//    header('location:tourisme.php');
// }else{
//     $requete="update tourisme set nom=?,prenom=?,civilite=?,idGuide=?, where idTourisme=?";
//     $params=array($nom,$prenom,$civilite,$idGuide,$idT);
    
// // var_dump($resultat);
//     header('location:tourisme.php');
// }
//     $resultat=$pdo->prepare($requete);
//     $resultat->execute($params);


   
?>
<!-- IMPORTANT : NOte: verification si l'image a eté bien mis ou non idée: utilisation d'un if ..ecris 29/03/2019 à 03h20 -->