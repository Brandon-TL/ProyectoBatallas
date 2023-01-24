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
        <p class="perfil_datos"><?php echo $_SESSION['usuario'] ?><br>
        <?php echo $datos['fechanacimiento'] . " (". $edad .")"; ?><br>
        <?php echo $datos['email']; ?></p>
        <hr class="perfil_stats_hr">
        <table class="perfil_stats">
            <tr>
                <td>Elementos creados:</td>
                <td><?php echo $datos['num_elementos_creados']; ?></td>
            </tr>
            <tr>
                <td>Batallas creadas:</td>
                <td><?php echo $datos['num_batallas_creadas']; ?></td>
            </tr>
            <tr>
                <td>Batallas votadas:</td>
                <td><?php echo $datos['num_batallas_votadas']; ?></td>
            </tr>
            <tr>
                <td>Batallas ignoradas:</td>
                <td><?php echo $datos['num_batallas_ignoradas']; ?></td>
            </tr>
            <tr>
                <td>Batallas denunciadas:</td>
                <td><?php echo $datos['num_batallas_denunciadas']; ?></td>
            </tr>
            <tr>
                <td>Puntos Trol:</td>
                <td><?php echo $datos['puntos_troll']; ?></td>
            </tr>
        </table>
    </aside>
    <main class="perfil_main">
        <div class="perfil_wrapper">
            <div class="perfil_main_tabs">
                <div class="pmt pmt_creadas">
                    <input type="radio" name="css-pmt" id="pmt-1" class="pmt-switch" checked>
                    <label for="pmt-1" class="pmt-label">Batallas creadas</label>
                    <div class="pmt-content">
                        <table class="pmt_table">
                            <?php
                                $batallas = obtenerBatallas(true);
                                if ($batallas) {
                                    echo "<tr>
                                            <th>ID BATALLA</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>DENUNCIAS</th>
                                            <th>FECHA DE CREACIÓN</th>
                                        </tr>";
                                    foreach ($batallas as $batalla) {
                                        $info = info_batalla_creada($batalla['id_batalla']);
                                        echo "<tr class='pmt_tr'>" . 
                                            "<td>" . $batalla['id_batalla'] . "</td>" .
                                            "<td>" . $info['elemento1'] . " VS " . $info['elemento2'] . "</td>" .
                                            "<td class='pmt_table_content'>" . $info['denuncias'] . "</td>" .
                                            "<td>" . $info['fecha'] . "</td>" .
                                        "</tr>";
                                    }
                                } else {
                                    echo "<tr><td>Aún no has creado ninguna batalla</td></tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="pmt pmt_ignoradas">
                    <input type="radio" name="css-pmt" id="pmt-2" class="pmt-switch">
                    <label for="pmt-2" class="pmt-label">Batallas ignoradas</label>
                    <div class="pmt-content">
                        <table class="pmt_table">
                            <?php
                                $batallas = ignoradas_o_denunciadas('ignorar');
                                if ($batallas) {
                                    foreach ($batallas as $batalla) {
                                        echo "<tr class='pmt_tr'>" . 
                                            "<td>" . $batalla['id_batalla'] . "</td>" .
                                            "<td class='pmt_table_content'>" . info_batalla($batalla['id_batalla']) . "</td>" .
                                            "<td>" . $batalla['fecha'] . "</td>" .
                                            "<td>".
                                                "<input type='submit' name='NO_IGNORAR' value='DEJAR DE IGNORAR' class='pmt_submit'>" .
                                            "</td>" .
                                        "</tr>";
                                    }
                                } else {
                                    echo "<tr><td>No has ignorado ninguna batalla</td></tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="pmt pmt_denunciadas">
                    <input type="radio" name="css-pmt" id="pmt-3" class="pmt-switch">
                    <label for="pmt-3" class="pmt-label">Batallas denunciadas</label>
                    <div class="pmt-content">
                        <table class="pmt_table">
                            <?php
                                $batallas = ignoradas_o_denunciadas('denunciar');
                                if ($batallas) {
                                    foreach ($batallas as $batalla) {
                                        echo "<tr class='pmt_tr'>" . 
                                            "<td>" . $batalla['id_batalla'] . "</td>" .
                                            "<td class='pmt_table_content'>" . info_batalla($batalla['id_batalla']) . "</td>" .
                                            "<td>" . $batalla['fecha'] . "</td>" .
                                            "<td>".
                                                "<input type='submit' name='NO_DENUNCIA' value='RETIRAR DENUNCIA' class='pmt_submit'>" .
                                            "</td>" .
                                        "</tr>";
                                    }
                                } else {
                                    echo "<tr><td>No has denunciado ninguna batalla</td></tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>