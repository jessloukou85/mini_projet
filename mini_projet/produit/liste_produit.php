<?php
    include '../DATA/cnxion.php';

    $liste_prod = $cnx->prepare('SELECT * from produit');
                  $liste_prod->execute();
    $produits   = $liste_prod->fetchAll();
?>
<table class="table">
  <thead>
    <tr class="text-content-justify-center">
      <th scope="col">References du produit</th>
      <th scope="col">Designation</th>
      <th scope="col">Prix Unitaire</th>
      <th colspan="2">action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($produits as $produit): ?>
    <tr>
      <th scope="row"></th>
      <td><?php echo $produit['ref_prod']; ?></td>
      <td><?php echo $produit['designation']; ?></td>
      <td><?php echo $produit['prix']; ?></td>
      <td><a href="upd_form_produit.php?num_produit=<?= $produit['ref_prod'] ?>" type="button" class="btn btn-primary">modifier</a></td>
      <td><a href="supp_produit.php?num_produit=<?= $produit['ref_prod'] ?>" type="button" class="btn btn-primary">Supprimer</a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>