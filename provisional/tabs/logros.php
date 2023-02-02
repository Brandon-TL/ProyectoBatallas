<?php
    $id_usuario = selectBD(array('id_usuario'), 'usuario_credencial', 'nombreusuario', $_SESSION['usuario'])[0];
    $logros = obtenerLogros($id_usuario);
    $no_logro = '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><ion-icon name="help-outline"></ion-icon></div><div class="flip-card-back"><p>'.$lang["logros_not_found"].'</p></div></div></div>';
    $obtenidos = 0;

    /* LOGROS DE BATALLAS CREADAS */
    $num_batallas_creadas = intval($logros['num_batallas_creadas']);
    echo '<div class="logros_container">';
    if ($num_batallas_creadas > 10) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/oro.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_comprometido_title"].'</h2><p>'.$lang["logros_comprometido_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}
    if ($num_batallas_creadas > 100) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/plata.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_vicioso_title"].'</h2><p>'.$lang["logros_vicioso_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}
    if ($num_batallas_creadas > 1000) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/bronce.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_adicto_title"].'</h2><p>'.$lang["logros_adicto_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}

    /* LOGROS DE BATALLAS VOTADAS  */
    $num_batallas_votadas = intval($logros['num_batallas_votadas']);
    if ($num_batallas_votadas > 10) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/oro.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_votante_title"].'</h2><p>'.$lang["logros_votante_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}
    if ($num_batallas_votadas > 100) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/plata.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_sindicalista_title"].'</h2><p>'.$lang["logros_sindicalista_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}
    if ($num_batallas_votadas > 1000) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/bronce.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_activista_title"].'</h2><p>'.$lang["logros_activista_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}

    /* LOGROS DE BATALLAS DENUNCIADAS */
    $num_batallas_denunciadas = intval($logros['num_batallas_denunciadas']);
    if ($num_batallas_denunciadas > 10) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/oro.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_vigilante_title"].'</h2><p>'.$lang["logros_vigilante_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}
    if ($num_batallas_denunciadas > 100) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/plata.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_moderador_title"].'</h2><p>'.$lang["logros_moderador_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}
    if ($num_batallas_denunciadas > 1000) {
        $obtenidos++;
        echo '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front"><img src="./img/logros/bronce.png" alt="medalla logro"></div><div class="flip-card-back"><h2>'.$lang["logros_policia_title"].'</h2><p>'.$lang["logros_policia_desc"].'</p></div></div></div>';
    } else {echo $no_logro;}
    echo '<div class="logros_obtenidos">'.$lang['logros_total'].': '.$obtenidos.'/9</div>';
    echo '</div>';
?>