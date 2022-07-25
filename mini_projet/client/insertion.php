<?php 
    $title = 'insertion de client';
    $msg = '';
    include '../DATA/cnxion.php';

    if (isset($_POST['last_name'], $_POST['first_name'], $_POST['town'], $_POST['address'], $_POST['phone'], $_POST['mail'])){
        if (!empty($_POST['last_name']) and !empty($_POST['first_name']) and !empty($_POST['town']) and !empty($_POST['address']) and !empty($_POST['phone']) and !empty($_POST['mail'])){   
            $no = (string)htmlspecialchars($_POST['last_name']);
            $pr = (string)htmlspecialchars($_POST['first_name']);
            $tw = (string)htmlspecialchars($_POST['town']);
            $ad = (string)htmlspecialchars($_POST['address']);
            $ph = (string)htmlspecialchars($_POST['phone']);
            $ml = (string)htmlspecialchars($_POST['mail']);
            $mel = $cnx->prepare('SELECT * from client where mail = ?');
            $mel-> execute([$ml]);
            $melExist = $mel->rowCount();
        if($melExist == 0){
            $insertion = $cnx->prepare('INSERT into client values (null,?,?,?,?,?,?)');
            $insertionIsOK = $insertion->execute([$no,$pr,$tw,$ad,$ph,$ml]);
            
            if($insertionIsOK){   
                $msg = 'le client a ete ajouté avec success felicitations';
            }else{
                $msg = "une erreur s'est produite lors de l'insertion du client veuillez reessayer ";   
            }   
        }else{
                $msg = "cette adresse mail existe dejà dans dans notre base ";
            }
        }else{
            $msg = "veuillez renseigner les champs vides";
        }
    }
    
    
    ?>
    >
    <h1><?php echo $msg; ?></h1>
<div class="container">

    <form class="row g-3 needs-validation" method="POST" action="">
        <div class="col-3">
            <label class="form-label">Nom du client</label>
            <input type="text" class="form-control" name="last_name" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Prenoms du client</label>
            <input type="text" class="form-control" name="first_name" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Ville</label>
            <input type="text" class="form-control" name="town" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Adresse</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Telephone</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">email</label>
            <input type="email" class="form-control" name="mail" required>
        </div>  
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
        </div>  
    </form>
</div>
