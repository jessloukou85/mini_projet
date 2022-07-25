<?php
    $msg = '';
    $title ='formulaire de modification de produit';
    include '../DATA/cnxion.php';

    $extract_prod = $cnx->prepare('SELECT * from produit where ref_prod = :num ');
                    $extract_prod->bindValue(':num',$_GET['num_produit'],pdo::PARAM_STR);
                    $extract_prod->execute();
    $produit      = $extract_prod->fetch();
?>
<form class="row g-3 needs-validation" novalidate method="post" action="update_produit.php">
  <div class="col-md-4">
    <label class="form-label">Reference du Produit</label>
    <input type="text" class="form-control" name="num_produit" value="<?= $produit['ref_prod'] ?>" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Désignation</label>
    <input type="text" class="form-control" name="designation" value="<?= $produit['designation'] ?>" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Prix Unitaire</label>
    <input type="text" class="form-control" name="prix_unitaire" value="<?= $produit['prix'] ?>" required>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">enregistrer les modifications</button>
    <button class="btn btn-primary" type="submit">annuler</button>
  </div>
</form>