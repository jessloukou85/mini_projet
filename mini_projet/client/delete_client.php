<?php
    $msg = '';
    $title = 'suppression';
    include '../DATA/cnxion.php';
    
    $supprimer = $cnx -> prepare('DELETE from client where id_client = :num limit 1');
                 $supprimer -> bindValue(':num',$_GET['num_client'],pdo::PARAM_INT);
            $numero = $_GET['num_client'];
    $deleteIsOK = $supprimer ->execute();
    if($deleteIsOK)
        $msg = "le client numero ".$numero." a été supprimé de la liste des clients";
    else
        $msg = " le client dont la suppression devrais etre traité n'a pas pu etre supprimé";
?>
<p><?php echo $msg; ?></p>