<?php
    session_start();
    if(!$_SESSION['password']){
        header('Location: ../../login.php');
    }
    include '../../DATA/cnxion.php';
    if(isset($_GET['s']) and !empty($_GET['s'])){
        $membre = htmlspecialchars($_GET['s']);
        $all_membre = $cnx->query('SELECT * from membre where speudo like "%'.$membre.'%" order by id');
    }
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
      <form class="d-flex" role="search">
        <input name="s" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <input class="btn btn-outline-success" type="submit" value="rechercher">
      </form>
      <?php
            if($all_membre->rowCount() > 0){
                while($user = $all_membre->fetch()){
                    ?>
                    <p align="center" style="color:red;text-decoration:underline"><?= $user['speudo']; ?></p>
                    <?php
                }
            }else{
                ?>
                <p align="center">Aucun membre n'est enregistré sous ce speudo...</p>
                <?php
            }
      ?>
</body>
</html>