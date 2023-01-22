<ul class="settings_accordion">
    <!-- DROPDOWN CAMBIAR FOTO DE PERFIL-->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_foto">
        <label for="ajustes_foto" class="settings_label">
            <ion-icon class="icon" name="image-outline"></ion-icon>
            <p class="settings_option">Cambiar foto de perfil</p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title">CAMBIA TU FOTO DE PERFIL</h2>
            <p class="grid_text">Puedes hacer esto cuando te hayas aburrido de la que tienes.</p>

            <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>

            <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
            <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

            <input class="grid_input_avatar" type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" value="<?php if (isset($_)) echo $_avatar; ?>" placeholder="<?php echo $lang['registro_label_avatar']; ?>">
            <?php if (isset($_registro_avatar_err)) echo '<span class="error">'.$_registro_avatar_err.'</span>'; ?>

            <input class="grid_button1" type="submit" name="CAMBIAR_AVATAR" value="CONFIRMAR">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CAMBIAR NOMBRE DE USUARIO -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_nombre">
        <label for="ajustes_nombre" class="settings_label">
            <ion-icon class="icon" name="person-outline"></ion-icon>
            <p class="settings_option">Cambiar nombre de usuario</p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title">CAMBIA TU NOMBRE DE USUARIO</h2>
            <p class="grid_text">Puedes hacer esto si no te convence el que tienes.</p>

            <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>

            <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
            <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

            <input class="grid_input_new" type="text" name="new_usuario" value="<?php if (isset($_new_usuario)) echo $_new_usuario;?>" placeholder="Nuevo nombre de usuario *">
            <?php if (isset($_registro_new_usuario_err)) echo '<span class="error">'.$_registro_new_usuario_err.'</span>'; ?>

            <input class="grid_input_remake" type="text" name="new_usuario2" value="<?php if (isset($_new_usuario2)) echo $_new_usuario2;?>" placeholder="Confirmar nombre *">
            <?php if (isset($_registro_new_usuario2_err)) echo '<span class="error">'.$_registro_new_usuario2_err.'</span>'; ?>

            <input class="grid_button1" type="submit" name="CAMBIAR_NOMBRE" value="CONFIRMAR">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CAMBIAR CONTRASEÑA -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_password">
        <label for="ajustes_password" class="settings_label">
            <ion-icon class="icon" name="key-outline"></ion-icon>
            <p class="settings_option">Cambiar contraseña</p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title">CAMBIA TU CONTRASEÑA</h2>
            <p class="grid_text">Realizar esta acción cada cierto tiempo es bueno para la seguridad de tu cuenta.</p>

                <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
                <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>

                <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
                <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

                <input class="grid_input_new" type="password" name="password" value="<?php if (isset($_password)) echo $_password; ?>" placeholder="<?php echo $lang['registro_label_password']; ?>">
                <?php if (isset($_registro_password_err)) echo '<span class="error">'.$_registro_password_err.'</span>'; ?>

                <input class="grid_input_remake" type="password" name="password2" value="<?php if (isset($_password)) echo $_password; ?>" placeholder="<?php echo $lang['registro_label_password2']; ?>">
                <?php if (isset($_registro_password2_err)) echo '<span class="error">'.$_registro_password2_err.'</span>'; ?>

                <input class="grid_button1" type="submit" name="CAMBIAR_PASSWORD" value="CONFIRMAR">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CAMBIAR CORREO ELECTRONICO -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_email">
        <label for="ajustes_email" class="settings_label">
            <ion-icon class="icon" name="mail-outline"></ion-icon>
            <p class="settings_option">Cambiar correo electronico</p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title">CAMBIA TU CORREO ELECTRÓNICO</h2>
            <p class="grid_text">Aqui puedes cambiar el correo electrónico asociado a tu cuenta.</p>
            
            <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>
                        
            <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
            <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>
                        
            <input class="grid_input_new" type="email" name="email" value="<?php if (isset($_email)) echo $_email; ?>" placeholder="Nueva dirección e-mail *">
            <?php if (isset($_registro_email_err)) echo '<span class="error">'.$_registro_email_err.'</span>'; ?>
            
            <input class="grid_input_remake" type="email" name="email" value="<?php if (isset($_email)) echo $_email; ?>" placeholder="Confirmar e-mail *">
            <?php if (isset($_registro_email_err)) echo '<span class="error">'.$_registro_email_err.'</span>'; ?>            

            <input class="grid_button1" type="submit" name="CAMBIAR_EMAIL" value="CONFIRMAR">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CAMBIAR FECHA DE NACIMIENTO -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_fecha">
        <label for="ajustes_fecha" class="settings_label">
            <ion-icon class="icon" name="calendar-number-outline"></ion-icon>
            <p class="settings_option">Cambiar fecha de nacimiento</p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title">CAMBIA TU FECHA DE NACIMIENTO</h2>
            <p class="grid_text">Si por algún casual indrodujiste mal tu fecha de nacimiento al registrar tu cuenta, no te preocupes, nosotros pensamos en todo.</p>
            
            <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>
                        
            <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
            <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

            <input class="grid_input_new" type="text" name="fecha" value="<?php if (isset($_fecha)) echo $_fecha; ?>" placeholder="<?php echo $lang['registro_label_fecha']; ?>" onfocus="(this.type='date')">
            <?php if (isset($_registro_fecha_err)) echo '<span class="error">'.$_registro_fecha_err.'</span>'; ?>
                        
            <input class="grid_button1" type="submit" name="CAMBIAR_EMAIL" value="CONFIRMAR">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CERRAR SESIÓN -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_salir">
        <label for="ajustes_salir" class="settings_label">
            <ion-icon class="icon" name="log-out-outline"></ion-icon>
            <p class="settings_option">Cerrar sesión</p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title">NO ES UN ADIÓS, ES UN HASTA LUEGO</h2>
            <p class="grid_text">Manten la calma, nosotros guardaremos todo tal y como lo dejaste hasta tu regreso.</p>
            <input class="grid_button1" type="submit" name="CERRAR_SESION" value="SALIR">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN ELIMINAR CUENTA -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_eliminar">
        <label for="ajustes_eliminar" class="settings_label">
            <ion-icon class="icon" name="trash-outline"></ion-icon>
            <p class="settings_option">Eliminar cuenta</p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title">ELIMINAR CUENTA</h2>
            <p class="grid_text">¿Estás seguro de esto?</p>
            <table>
                <input type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
                <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>

                <input type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
                <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

                <label class="grid_input_text_confirm" for="confirmar">Escribe "CONFIRMAR" para estar seguros de que no es un error.</label>
                <input class="grid_input_confirm" type="text" name="password" id="confirmar" placeholder="">

                <textarea class="grid_textarea" name="reason" id="reason" placeholder="Queremos mejorar, dejanos saber la razón por la que quieres eliminar tu cuenta."></textarea>

                <input class="grid_button2" type="submit" name="CAMBIAR_AVATAR" value="CONFIRMAR">
        </div>
    </li>
</ul>