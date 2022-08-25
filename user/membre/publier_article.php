<?php
    session_start();
    if(!$_SESSION['password']){
        header('Location: ../../login.php');
    }
    include '../../DATA/cnxion.php';
    if(isset($_POST['envoyer'])){
        if(!empty($_POST['title']) and !empty($_POST['content'])){
            $titre = (String)htmlspecialchars($_POST['title']);
            $content = nl2br((String) htmlspecialchars($_POST['content']));

            $req = $cnx->prepare('INSERT into article (title,content) values(?,?)');
            if($insert = $req->execute([$titre,$content])){
                $msg ="l'insertion de larticle est une reussite";
            };

        }else{
            $msg = "veuillez rempli tous les champs";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h4 align="center" style="color:green; text-decoration:underline"><?php echo $msg; ?></h4>
        <form action="" method="post">
            <input type="text" name="title" placeholder="entrez le titre de votre article">
            <br>
            <textarea name="content" placeholder="entrez le contenu de votre article" >
                </textarea>
                <br>
                <input type="submit" name="envoyer">
            </form>
    </div>
</body>
</html>
