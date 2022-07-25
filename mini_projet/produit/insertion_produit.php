<?php
    $msg = "";
    $title = 'insertion de produit';
    include "../DATA/cnxion.php";
    var_dump($_POST);

    if(isset($_POST['ref_prod'], $_POST['designation'], $_POST['prix_unitaire'])){

        if (!empty($_POST['ref_prod']) and !empty($_POST['designation']) and !empty($_POST['prix_unitaire'])){
            $rp = (string)htmlspecialchars($_POST['ref_prod']);
            $dg = (string)htmlspecialchars($_POST['designation']);
            $pu = (int)htmlspecialchars($_POST['prix_unitaire']);
            $ref = $cnx->prepare('SELECT * from produit where ref_prod = ?');
                   $ref->execute([$rp]);
            $ref_Exist = $ref->rowCount();
    
            $n_pdt = $cnx->prepare('SELECT * from produit where designation = ?');
            $n_pdt->execute([$dg]);
            $n_pdtExist = $n_pdt->rowCount();
            $insert_produit = $cnx->prepare('INSERT into produit values (?,?,?)');
            $insert_produit_ok = $insert_produit->execute([$rp,$dg,$pu]);
            if($insert_produit_ok){
                $msg = "produit est enregister";
            }else{
                $msg = "le produit n'est pas enregistrer";
            }
            if($ref_Exist == 0){
                if($n_pdtExist == 0){
                    if($pu < 0){
                    }else{
                        $msg ="veuilez saisir un montant positif";
                    }
                }else{
                    $msg ="cette designation existe dejà";
                }
            } else{
                $msg = " cette reference de ce produit existe déjà ";
            }
        }else{
            $msg = "veuillez reseigner le champs vide";
        }

    }
?>
<form class="row g-3 needs-validation" novalidate method="post" action="">
  <div class="col-md-4">
    <label class="form-label">Reference du Produit</label>
    <input type="text" class="form-control" name="ref_prod" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Désignation</label>
    <input type="text" class="form-control" name="designation" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Prix Unitaire</label>
    <input type="text" class="form-control" name="prix_unitaire" required>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">enregistrer</button>
    <button class="btn btn-primary" type="submit">annuler</button>
  </div>
</form>
<h1><?php echo $msg; ?></h1>