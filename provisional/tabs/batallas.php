<style>
    .batalla {
        /* position: absolute; */
        text-align: center;
        padding: 50px 0;
    }

    .batalla .card__creator {
        margin-bottom: 20px;
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

    .card__img {
        visibility: hidden;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        height: 235px;
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
    }

    .card__info {
        z-index: 2;
        background-color: #fff;
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
<?php

    $batallas = obtenerBatallas(false);
    $n = 0;

    if ($batallas) {
        foreach ($batallas as $batalla) {
            $n++;
            $elemento1 = datosElemento($batalla['id_elemento1']);
            $elemento2 = datosElemento($batalla['id_elemento2']);
            $id_creador = selectBD(array('id_usuario'), 'usuario_batalla', 'id_batalla', $batalla['id_batalla'])[0];
            $creador = selectBD(array('nombreusuario'), 'usuario_credencial', 'id_usuario', $id_creador)[0];

            $id_elemento1 = selectBD(array('id_elemento1'), 'batalla_elemento', 'id_batalla', $batalla['id_batalla'])[0];
            $id_elemento2 = selectBD(array('id_elemento2'), 'batalla_elemento', 'id_batalla', $batalla['id_batalla'])[0];

            $id_creador_elemento1 = selectBD(array('id_usuario'), 'usuario_elemento', 'id_elemento', $id_elemento1)[0];
            $id_creador_elemento2 = selectBD(array('id_usuario'), 'usuario_elemento', 'id_elemento', $id_elemento2)[0];

            $nombre_creador1 = selectBD(array('nombreusuario'), 'usuario_credencial', 'id_usuario', $id_creador_elemento1)[0];
            $nombre_creador2 = selectBD(array('nombreusuario'), 'usuario_credencial', 'id_usuario', $id_creador_elemento2)[0];
            
            $votos_elemento1 = selectBD(array('votos_elemento1'), 'batalla_elemento', 'id_batalla', $batalla['id_batalla'])[0];
            $votos_elemento2 = selectBD(array('votos_elemento2'), 'batalla_elemento', 'id_batalla', $batalla['id_batalla'])[0];

            echo '<div class="batalla">
                    <div class="card__creator">'.$lang['batallas_text_creador'].' <a href="#link_a_perfil" class="card__author" title="author">'.$creador.'</a></div>
                    <section class="cards">
                        <article class="card card--'.$n.'">
                        <div class="card__img"></div>
                        <a href="#" class="card_link">
                            <div class="card__img--hover"></div>
                        </a>
                        <div class="card__info">
                            <span class="card__category">'.$votos_elemento1.' '.$lang['batallas_text_votos'].'</span>
                            <h3 class="card__title">'.$elemento1[0].'</h3>
                            <span class="card__by">'.$lang['batallas_text_creador_elemento'].' <a href="#link_a_perfil" class="card__author" title="author">'. $nombre_creador1.'</a></span>
                        </div>
                    </article>';
            echo '<style>
                    .card--'.$n.' .card__img, .card--'.$n.' .card__img--hover {
                        background-image: url("./img/elementos/'.$elemento1[1].'");
                    }
                </style>';
            $n++;
            echo '<article class="card card--'.$n.'">
                        <div class="card__img"></div>
                        <a href="#" class="card_link">
                            <div class="card__img--hover"></div>
                        </a>
                        <div class="card__info">
                        <span class="card__category">'.$votos_elemento2.' '.$lang['batallas_text_votos'].'</span>
                            <h3 class="card__title">'.$elemento2[0].'</h3>
                            <span class="card__by">'.$lang['batallas_text_creador_elemento'].' <a href="#link_a_perfil" class="card__author" title="author">'. $nombre_creador2.'</a></span>
                        </div>
                    </article>
                </section>
            </div>';
            echo '<style>
                    .card--'.$n.' .card__img, .card--'.$n.' .card__img--hover {
                        background-image: url("./img/elementos/'.$elemento2[1].'");
                    }
                </style>';
        }
    } else {
        echo "<div class='error_batallas'>Aún no has creado ninguna batallas, si quieres votar las batallas de otros usuarios deberás crear al menos una.</div>";
        echo "<a class='bat_to_creador' href='creador.php'>CREAR BATALLA</a>";
    }
?>