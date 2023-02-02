<?php
    $batallas = obtenerBatallas(false);
    $id_usuario = selectBD(array('id_usuario'), 'usuario_credencial', 'nombreusuario', $_SESSION['usuario'])[0];
    $n = 0;

    if ($batallas && $batallas != 'votos') {
        echo '<div class="batallas">';
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
                        <a href="user.php?id='.$id_usuario.'&batalla='.$batalla['id_batalla'].'&voto='.$id_elemento1.'" class="card_link">
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
                        <a href="user.php?id='.$id_usuario.'&batalla='.$batalla['id_batalla'].'&voto='.$id_elemento2.'" class="card_link">
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
        echo '</div>';
    } else {
        echo '<div class="error_batallas">';
        if ($batallas = 'votos') {
            echo "Alto ahí vaquero, dale un poco de tiempo a los demás usuario para crear más batallas. ¿Porqué no te tomas un descanso?";
        } else {
            echo "Aún no has creado ninguna batallas, si quieres votar las batallas de otros usuarios deberás crear al menos una.";
        }
        echo '</div>';
    }
?>