
<?php 
    session_start();
    if(isset($_SESSION['user'])){	//si la variable $_SESSION['user'] n'existe pas
    
        require_once("connexiondb.php");  
        $idT=isset($_GET['idT'])?$_GET['idT']:0;

        $requete="delete from tourisme where idTourisme=?";
        $params=array($idT);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);
        header('location:tourisme.php');
}else{
    header('location:login.php');
}
?>
