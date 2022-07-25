<?php
    $title = 'liste des clients';
    include '../DATA/cnxion.php';

    $liste_client = $cnx -> prepare('SELECT * from client');
                    $liste_client -> execute();
    $clients      = $liste_client -> fetchAll();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id_client</th>
      <th scope="col">Nom du client</th>
      <th scope="col">Prenoms du client</th>
      <th scope="col">Ville</th>
      <th scope="col">Adresse</th>
      <th scope="col">N° Telephone</th>
      <th scope="col">Email</th>
      <th scope="colspan-2" style="text-align:center">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($clients as $client): ?> 
    <tr>
      <th scope="row"><?= $client['id_client']; ?></th>
      <td><?= $client['last_name'] ?></td>
      <td><?= $client['first_name'] ?></td>
      <td><?= $client['town'] ?></td>
      <td><?= $client['address'] ?></td>
      <td><?= $client['phone'] ?></td>
      <td><?= $client['mail'] ?></td>
      <td>
        <button>
            <a href="upd_form_client?num_client=<?= $client['id_client'] ?>">Modifier</a>
        </button>
    </td>
      <td>
        <button>
            <a href="delete_client.php?num_client=<?= $client['id_client'] ?>">Supprimer</a>
        </button>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>