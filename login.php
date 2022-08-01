<?php
session_start();
    include 'DATA/cnxion.php';
   include 'user/presentation/navbar.php';
   if(isset($_POST['connexion'])){
       if(!empty($_POST['speudo']) and !empty($_POST['password'])){
         $default_speudo = 'admin';
         $default_password ='admin12345';

         $speudo = htmlspecialchars($_POST['speudo']);
         $pwd = htmlspecialchars($_POST['password']);

         if($speudo==$default_speudo && $pwd==$default_password){
            $_SESSION['password'] = $pwd;
            header('Location: user/presentation/index.php');
         }else{
            $msg = 'votre speudo ou votre mot de pass est incorrecte merci de reessayer';
         }
     }else{
        $msg ='veuillez rempli tous les champs';
     }
   }
?>
<div class="alert alerte-danger">
    <p><?= $msg; ?></p>
</div>
<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-7">
            <form method="POST" action="">
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">speudo</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="speudo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-sm" id="colFormLabelSm" name="password">
                    </div>
                </div>
                <div class="justify-content-center">
                    <button class="btn btn-info" role="button" name="connexion" type="submit" >connexion</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    