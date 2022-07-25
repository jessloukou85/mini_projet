<?php 
    include '../DATA/cnxion.php';

    $modifier = $cnx->prepare('UPDATE client set last_name = :nom, first_name = :prenom, town = :ville, address = :adresse, phone = :telephone, mail = :email where id_client = :num limit 1');
                $modifier->bindValue(':num',$_POST['num_client'],pdo::PARAM_INT);
                $modifier->bindValue(':nom',$_POST['last_name'],pdo::PARAM_STR);
                $modifier->bindValue(':prenom',$_POST['first_name'],pdo::PARAM_STR);
                $modifier->bindValue(':ville',$_POST['town'],pdo::PARAM_STR);
                $modifier->bindValue(':adresse',$_POST['address'],pdo::PARAM_STR);
                $modifier->bindValue(':telephone',$_POST['phone'],pdo::PARAM_STR);
                $modifier->bindValue(':email',$_POST['mail'],pdo::PARAM_STR);
    $updateIsOk = $modifier->execute(); 

    if ($updateIsOk)
        $msg = "les donnée du client ont bien été modifié";
    else
        $msg = "la modification des données du client a echoué";
?>