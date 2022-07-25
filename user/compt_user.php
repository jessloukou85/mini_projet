<?php
echo var_dump($_POST['sauvegarder']);
include '../DATA/cnxion.php';
$msg = '';
    if(isset($_POST['nom'],$_POST['prenom'],$_POST['dat_naiss'],$_POST['speudo'],$_POST['email'],$_POST['mot_de_pass'],$_POST['dat_inscription'])){
        $no = (string)htmlspecialchars($_POST['nom']);
        $pr = (string)htmlspecialchars($_POST['prenom']);
        $dat = date('y-m-d', strtotime($_POST['dat_naiss']));
        $sp = (string)htmlspecialchars($_POST['speudo']);
        $ml = (string)htmlspecialchars($_POST['email']);
        $pw = (string)htmlspecialchars(password_hash($_POST['mot_de_pass'],PASSWORD_DEFAULT));
        $date = date('y-m-d',strtotime($_POST['dat_inscription']));
        if(!empty($no) and !empty($no) and !empty($no) and !empty($no) and !empty($no) and !empty($no) and !empty($no)){
            $mel = $cnx->prepare('SELECT * from user where mail = ?');
            $mel->execute([$ml]);
            $melExist = $mel->rowcount();
            
            if($melExist == 0){
                $insert = $cnx->prepare('INSERT into user values (null,?,?,?,?,?,?,?)');
                $insert_Is_Ok = $insert->execute([$no,$pr,$dat,$sp,$ml,$pw,$date]);
                
                if($insert_Is_Ok){
                    $msg = 'inscription reussie';
                }else{
                    $msg = "une euureur s'est produit lors de linsertion";
                }
            }else{
                $msg = 'ce mail existe deja veuillez modifier cette addresse mail car un utilisateur utilise votre address mail';
            }
        }else{
            $msg = 'veuillez remplir tous les champs';
        }

    }
    //include '../presentation/navbar.php';
?>
<p><?php echo $msg; ?></p>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
        <form method="POST" action="#" >
  <div class="form-row">
    <div class="col-md-4 mb-2">
      <input type="text" class="form-control" name="nom" required placeholder="last name" >
    </div>
    <div class="col-md-4 mb-2">
      <input type="text" class="form-control" name="prenom" required placeholder="first name">
    </div>
    <div class="col-md-4 mb-2">
      <input type="date" class="form-control" name="dat_naiss" required placeholder="date of birth">
    </div>
    <div class="col-md-4 mb-2">
      <input type="text" class="form-control" name="speudo" required placeholder="login" >
    </div>  
    <div class="col-md-4 mb-2">
      <input type="email" class="form-control" name="email" required placeholder="email" >
    </div>
    <div class="col-md-4 mb-2">
      <input type="password" class="form-control" name="mot_de_pass" required placeholder="password" >
    </div>
    <div class="col-md-4 mb-2">
      <input type="date" class="form-control" name="dat_inscription" required placeholder="date of sign" >
    </div>
</div>
</div>
</div>
<div>
      <button class="btn btn-primary col-6" type="submit" name="sauvegarder">sauvegarder</button>
</div>
</form>
        </div>
    </div>
</div>