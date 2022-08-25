<?php
    $msg ='';
    session_start();
    if(!$_SESSION['password']){
          header('Location: ../../login.php');
        }
        include '../../DATA/cnxion.php';
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
     if(isset($_GET['id']) and !empty($_GET['id'])){ 
        $get_id = $_GET['id'];
        $recup_membr = $cnx->prepare('SELECT * membre WHERE id=?');
                       $recup_membr->execute(array($get_id));
                       $membre = $recup_membr->rowCount();
        if($membre >0){
                $bannir_membr = $cnx->prepare('DELETE from membre where id = ? limit 1');
                $bannir = $bannir_membr->execute([$get_id]);
            if($bannir){
                header('Location: user/membre/membre.php');
                $msg = "le membre a ete bannir ";
            }else{
               header('location: membre.php');
               $msg = "le membre existe toujours";
            }
        }else{
            header('Location : membre.php') ;
            $msg = "Aucun membre n'a ete trouvé";
        }
        }else{
            $msg = "l'identifiant n'a pas ete recuperé";
        }          
    ?>
    <h2 align="center"><?= $msg ?></h2>
</body>
</html>