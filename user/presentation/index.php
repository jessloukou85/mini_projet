<?php
session_start();
if(!$_SESSION['password']){
 header('location: ../../login.php');
}
  setcookie('lang','fr',time()+3600*24*365,null,null,false,true);

    include "../../DATA/cnxion.php";
?>

 <?php include "navbar.php"; ?> 
 <nav class="nav">
    <ul class="nav">
      <li class="nav-item">
        <a href="users.php" class="btn btn-info" role="button">se connecter</a>
      </li>
      <li class="nav-item">
        <a href="../user/compt_user.php" class="btn btn-info" role="button">creer un compte</a>
      </li>
    </ul>
 </nav>
 <a href="../membre/membre.php">afficher tous les membres</a>
 <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../images/v1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../../images/v2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item ">
      <img src="../../images/mesneveux.jpg" class="d-block w-100 h-90" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="row">
  <article class="col-3 jl">
      <h1>debutant</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque aquis a molestias vel ullam dolores? Perferendis eius id dolore conseqquae nobis ad veritatis eaque sed excepturi. Quidem, temporibus.</p>
                </article>
  <article class="col-3 jl">
      <h1>intermediaire</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque aquis a molestias vel ullam dolores? Perferendis eius id dolore conseqquae nobis ad veritatis eaque sed excepturi. Quidem, temporibus.</p>
  </article>
  <article class="col-3 jl">
      <h1>professionnel</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque aquis a molestias vel ullam dolores? Perferendis eius id dolore conseqquae nobis ad veritatis eaque sed excepturi. Quidem, temporibus.</p>
  </article>
</div>


