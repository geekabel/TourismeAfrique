<?php
	require_once('connexiondb.php');
	
	
	if(isset($_POST['email']))
	    
		$email=$_POST['email'];
	
	else
	    
		$email="";
	
	$requete1="select * from utilisateur where EMAIL='$email'";
	
	$resultat1 = $con->query($requete1);
	
	
	if($user=$resultat1->fetch()){
	    
		$id=$user['ID'];
		
		$pwd="0000";
		
		$requete="update utilisateur set pwd=MD5(?) where id=?";	
		
		$param=array($pwd,$id);	
		
		$resultat = $con->prepare($requete);	
		
		$resultat->execute($param);
	
		$to = $user['email'];
		
		$subject = "INITIALISATION DE MOT DE PASSE";
		
		$txt = "Votre nouveau mot de passe de discover est :$pwd";
		
		$headers = "From: discover" . "\r\n" ."CC: koffigodwin96@gmail.com";
		
		mail($to,$subject,$txt,$headers);
		
		header("location:confirmationResetPwd.php");
	
	}else{
	    
		$_SESSION['erreurLogin']="<strong>Erreur!</strong> L'Email est incorrecte!!!";
		
         header("Location:initialiserPwd.php");
	}	
			
	
?>