<?php
    $msg ='';
    session_start();
    //if(!$_SESSION['password']){
      //  header('Location: ../../login.php');
    //}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     include '../../DATA/cnxion.php';
     if(isset($_GET['id']) && !empty($_GET['id'])){ 
         $get_id = $_GET['id'];
         $recup_membr = $cnx->prepare('SELECT * membre where id = ?');
         $recup_membr->execute([$get_id]);
        if($recup_membr->rowCount()>0){

        }else{
           $msg = "ce membre n'existe pas dans nos données"; 
        }
        }else{
            $msg = "l'identifiant n'a pas ete recuperé";
        }
            
    ?>
    <h2 align="center"><?= $msg ?></h2>
</body>
</html>