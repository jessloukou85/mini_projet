<?php
session_start();
if(isset($_POST['connexion'])){
    if(!empty($_POST['login']) and !empty($post['password'])){   
        $def_log = 'admin';
        $def_pwd = 'administrateur';
        $login = (string)htmlspecialchars($_POST['login']);
        $pwd = (string)htmlspecialchars($_POST['password']);
        if ($login == $def_log && $pwd == $def_pwd){
            $_SESSION['pwd'] = $pwd ;
            header('location: insert.php');
        }else{
            $msg = "le login ou le mot de pass n'est pas valide";
        }
    }else{
        $msg = " veuillez remplir tous les champs";
    }
}