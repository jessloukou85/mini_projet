<?php
$msg='';
try {
  $cnx = new PDO('mysql:host=localhost;dbname=gestion_commerciale_2022','root','bostam');
} catch (PDOException $cnx) 
{
    print 'erreur'. $cnx ->getMessage() . '<br/>';
    die;
}
    //if($cnx)
        //$msg = 'base de donnée connectée';
   // else
     //   $msg = 'base de donnée pas connectée';
     //   echo $msg;
?>