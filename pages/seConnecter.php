<?php
    require_once('connexiondb.php');
    session_start();

    $login=isset($_POST['login'])?$_POST['login']:"";
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";
    // $login=$_POST['login'];
	// $pwd=$_POST['pwd'];
    
    $requete ="select * from utilisateur where login='$login' and pwd=MD5('$pwd')";
    $resultat = $pdo->query($requete);
    
    if ($user=$resultat->fetch()) {
       if ($user['etat']==1) {
           $_SESSION['user']=$user;
            header('location:menub.php');
       }else{
           $_SESSION['erreurLogin']="<strong>Erreur!!</strong>Votre compte n'est pas actif.<br>Essayer d'activer votre compte";
           header('location:login.php');
       }
    }else{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
           header('location:login.php');
    }
?>
