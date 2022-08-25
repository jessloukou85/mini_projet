<?php 
$msg = '';
    session_start();
    include '../../DATA/cnxion.php';
    if(!$_SESSION['password']){
        header('Location: ../../login.php');
    }
    $recup_membres = $cnx->query('SELECT * from membre');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>membres</title>
</head>
<body>
    <h3 align="center" style="color:green;"><?php echo $msg; ?></h3>
    <p align="center">les membres de la table membre</p>
    <table border="1" align="center">
        <?php    
        while($membre = $recup_membres->fetch()){
            ?>
            <tr><td><?= $membre['speudo'] ?><a href="bannir.php?id=<?= $membre['id']; ?>" style="color:red; text-decoration: none">bannir un membre</a></td></tr>
            <?php
        }    
        ?>
    </table>
</body>
</html>