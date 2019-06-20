<?php require_once('session.php');?>
<?php 
//cette page met une alerte lorsqu'on supprime l'id en tout debut 
$message =isset($_GET['message'])?$_GET['message']:"Erreur";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alertes</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Map.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php include("menub.php"); ?>

    <div class="container">
        <div class="panel panel-danger margetop">
            <div class="panel-heading">Erreur :</div>
            <div class="panel-body">
            <h3><?php  echo $message ?></h3> 
             <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour  >>></a></h4>           
            </div>
       </div>
   </div>
</body>
</html>