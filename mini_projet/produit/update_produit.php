<?php
    $msg = '';
    $title = 'mise à jour';
    include '../DATA/cnxion.php';

    $update_prod = $cnx->prepare('UPDATE produit set ref_prod = : reference, designation = :nom, prix = :pu where ref_prod = :reference limit 1');
    //$update_prod->bindValue(':reference',$_POST['ref_prod'],pdo::PARAM_STR);
    $update_prod->bindValue(':reference',$_POST['num_produit'],pdo::PARAM_STR);
    $update_prod->bindValue(':nom',$_POST['designation'],pdo::PARAM_STR);
    $update_prod->bindValue(':pu',$_POST['prix_unitaire'],pdo::PARAM_INT);
    
    $update_prod_Ok =$update_prod->execute();

    if($update_prod_Ok){
        $msg = 'la modifiaction est effective merci';
    }else{
        $msg = 'erreur de modification';
    }
    ?>
    <h1><?php echo $msg; ?></h1>