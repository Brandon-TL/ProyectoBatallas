<div class="perfil_container">
    <?php
        $datos = datos_de_usuario($_SESSION['usuario']);
        // var_dump($datos);

        foreach ($datos as $key => $value) {
            if (!is_numeric($key)) {
                if ($key != 'id' && $key != 'modovis' && $key != 'idioma'
                    && $key != 'rol' && $key != 'foto') {
                    // echo $key ." => " . $value . "<br>";
                }
            }
        }

        $date1 = new DateTime($datos['fechanacimiento']);
        $date2 = new DateTime("now");
        $interval = $date1->diff($date2);
        $edad = $interval->y;
    ?>
    <aside class="perfil_aside">
        <h2>Datos de usuario</h2>
        <div class="foto_perfil" alt="foto de perfil"
            style="background: url(<?php echo $datos['foto']; ?>);
                    background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat;"></div>
        <p><?php echo $_SESSION['usuario'] ?><br>
        <?php echo $datos['fechanacimiento'] . " (". $edad .")"; ?><br>
        <?php echo $datos['email']; ?></p>
        <p>Elementos creados: <?php echo $datos['num_elementos_creados']; ?><br>
        Batallas creadas: <?php echo $datos['num_batallas_creadas']; ?><br>
        Batallas votadas: <?php echo $datos['num_batallas_votadas']; ?><br>
        Batallas ignoradas: <?php echo $datos['num_batallas_ignoradas']; ?><br>
        Batallas denunciadas: <?php echo $datos['num_batallas_denunciadas']; ?><br>
        Puntos Trol: <?php echo $datos['puntos_troll']; ?></p>


    </aside>
    <main class="perfil_main">
        <div class="perfil_wrapper">
            <div class="perfil_main_tabs">
                <div class="pmt">
                    <input type="radio" name="css-pmt" id="pmt-3" class="pmt-switch">
                    <label for="pmt-3" class="pmt-label">Batallas denunciadas</label>
                    <div class="pmt-content">TAB TRES</div>
                </div>
                <div class="pmt">
                    <input type="radio" name="css-pmt" id="pmt-2" class="pmt-switch">
                    <label for="pmt-2" class="pmt-label">Batallas ignoradas</label>
                    <div class="pmt-content">Tab Two</div>
                </div>
                <div class="pmt">
                    <input type="radio" name="css-pmt" id="pmt-1" class="pmt-switch" checked>
                    <label for="pmt-1" class="pmt-label">Batallas creadas</label>
                    <div class="pmt-content">Tab One</div>
                </div>
            </div>
        </div>
    </main>
</div>