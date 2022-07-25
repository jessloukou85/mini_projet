<?php
    $msg = '';
    $title = 'formulaire de modification';
    include '../DATA/cnxion.php';

    $extract = $cnx->prepare ('SELECT * from client where id_client = :num');
               $extract -> bindValue(':num',$_GET['num_client'],pdo::PARAM_INT);
    $num     = $_GET['num_client'];
               $extract->execute();
    $client  = $extract->fetch(); 
?>

<div class="row">
    <form class="row g-3 needs-validation" method="POST" action="update_client.php">
        <div class="col-md-4">
            <label class="form-label">Identifiant du client</label>
            <input type="text" class="form-control" name="num_client" value="<?= $client['id_client']; ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Nom du client</label>
            <input type="text" class="form-control" name="last_name" value="<?= $client['last_name'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Prenoms du client</label>
            <input type="text" class="form-control" name="first_name" value="<?= $client['first_name'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Ville</label>
            <input type="text" class="form-control" name="town" value="<?= $client['town'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Adresse</label>
            <input type="text" class="form-control" name="address" value="<?= $client['address'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Telephone</label>
            <input type="text" class="form-control" name="phone" value="<?= $client['phone'] ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">email</label>
            <input type="text" class="form-control" name="mail" value="<?= $client['mail'] ?>" required>
        </div>  
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
        </div>
    </form>
</div>
