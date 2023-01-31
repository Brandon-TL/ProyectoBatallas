<?php
    $batallas = obtenerBatallas(false);
    // var_dump($batallas);

    foreach ($batallas as $batalla) {
        echo "id batalla = " . $batalla['id_batalla'] . "<br>";
        $elemento1 = datosElemento($batalla['id_elemento1']);
        $elemento2 = datosElemento($batalla['id_elemento2']);
        echo "id elemento 1 = " . $batalla['id_elemento1'] . ", $elemento1[0] , $elemento1[1]" . "<br>";
        echo "id elemento 2 = " . $batalla['id_elemento2'] . ", $elemento2[0] , $elemento2[1]" ."<br><br>";
    }
?>
<style>
    .card__creator {
  text-align: center;
  padding: 20px 0;
    width: max-content;
  margin: auto;
}

.cards {
    width: 100%;
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    -webkit-justify-content: center;
    max-width: 820px;
    max-height: 400px;
  margin: auto;
}

.card--1 .card__img, .card--1 .card__img--hover {
    background-image: url('https://i.pinimg.com/originals/6f/0a/9a/6f0a9a9e171cad11416988caf7589a5e.jpg');
}

.card--2 .card__img, .card--2 .card__img--hover {
    background-image: url('https://otakukart.com/wp-content/uploads/2022/05/Naruto-Shippuden-1.jpg');
}


.card__img {
  visibility: hidden;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    height: 235px;
  border-top-left-radius: 12px;
border-top-right-radius: 12px;
  
}

.card__info-hover {
    position: absolute;
    padding: 16px;
  width: 100%;
  opacity: 0;
  top: 0;
}

.card__img--hover {
  transition: 0.2s all ease-out;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
  position: absolute;
    height: 235px;
  border-top-left-radius: 12px;
border-top-right-radius: 12px;
top: 0;
  
}
.card {
  margin-right: 25px;
  transition: all .4s cubic-bezier(0.175, 0.885, 0, 1);
  background-color: #fff;
    width: 33.3%;
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0px 13px 10px -7px rgba(0, 0, 0,0.1);
}
.card:hover {
  box-shadow: 0px 30px 18px -8px rgba(0, 0, 0,0.1);
    transform: scale(1.10, 1.10);
}

.card__info {
z-index: 2;
  background-color: #fff;
  border-bottom-left-radius: 12px;
border-bottom-right-radius: 12px;
   padding: 16px 24px 24px 24px;
}

.card__category {
    font-family: 'Raleway', sans-serif;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 2px;
    font-weight: 500;
  color: #868686;
}

.card__title {
    margin-top: 5px;
    margin-bottom: 10px;
    font-family: 'Roboto Slab', serif;
}

.card__by {
    font-size: 12px;
    font-family: 'Raleway', sans-serif;
    font-weight: 500;
}

.card__author {
    font-weight: 600;
    text-decoration: none;
    color: #AD7D52;
}

.card:hover .card__img--hover {
    height: 100%;
    opacity: 0.3;
}

.card:hover .card__info {
    background-color: transparent;
    position: relative;
}

.card:hover .card__info-hover {
    opacity: 1;
}

</style>
<div class="card__creator">Batalla creada por <a href="#link_a_perfil" class="card__author" title="author">TimeLeaper</a></div>
<section class="cards">
      <article class="card card--1">
            <div class="card__img"></div>
            <a href="#" class="card_link">
                  <div class="card__img--hover"></div>
             </a>
            <div class="card__info">
                  <span class="card__category"> 99998 VOTOS</span>
                  <h3 class="card__title">NARUTO</h3>
                  <span class="card__by">de <a href="#link_a_perfil" class="card__author" title="author">Tu abuela</a></span>
            </div>
      </article>
      <article class="card card--2">
            <div class="card__img"></div>
            <a href="#" class="card_link">
                  <div class="card__img--hover"></div>
             </a>
            <div class="card__info">
                  <span class="card__category"> 99999 VOTOS</span>
                  <h3 class="card__title">SASUKE</h3>
                  <span class="card__by">de <a href="#link_a_perfil" class="card__author" title="author">Tu otra abuela</a></span>
            </div>
      </article>
</section>