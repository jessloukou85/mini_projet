<?php
    include '../DATA/cnxion.php';
    $delete_prod = $cnx->prepare('DELETE from produit where ref_prod = :num limit 1');
                   $delete_prod->bindValue(':num',$_GET['num_produit'],pdo::PARAM_STR);
    $num         = $_GET['num_produit'];
    $delete_prod_Is_OK = $delete_prod->execute();

    if($delete_prod_Is_OK){
        $msg = "le produit referencé par la valeur ".$num." a été supprimé de la liste";
    }else{
        $msg = "le produit referencé par la valeur ".$num." n'a pas été supprimé de la liste";
    }
?>
    <h1><?php echo $msg; ?></h1>