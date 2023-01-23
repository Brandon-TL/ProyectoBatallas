<ul class="settings_accordion">
    <!-- DROPDOWN CAMBIAR FOTO DE PERFIL-->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_foto">
        <label for="ajustes_foto" class="settings_label">
            <ion-icon class="icon" name="image-outline"></ion-icon>
            <p class="settings_option"><?php echo $lang['ajustes_foto_label']; ?></p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title"><?php echo $lang['ajustes_foto_title']; ?></h2>
            <p class="grid_text"><?php echo $lang['ajustes_foto_text']; ?></p>

            <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>

            <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
            <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

            <input class="grid_input_avatar" type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" value="<?php if (isset($_)) echo $_avatar; ?>" placeholder="<?php echo $lang['registro_label_avatar']; ?>">
            <?php if (isset($_registro_avatar_err)) echo '<span class="error">'.$_registro_avatar_err.'</span>'; ?>

            <input class="grid_button1" type="submit" name="CAMBIAR_AVATAR" value="<?php echo $lang['ajustes_boton_confirmar']; ?>">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CAMBIAR NOMBRE DE USUARIO -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_nombre">
        <label for="ajustes_nombre" class="settings_label">
            <ion-icon class="icon" name="person-outline"></ion-icon>
            <p class="settings_option"><?php echo $lang['ajustes_nombre_label']; ?></p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title"><?php echo $lang['ajustes_nombre_title']; ?></h2>
            <p class="grid_text"><?php echo $lang['ajustes_nombre_text']; ?></p>

            <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>

            <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
            <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

            <input class="grid_input_new" type="text" name="new_usuario" value="<?php if (isset($_new_usuario)) echo $_new_usuario;?>" placeholder="<?php echo $lang['ajustes_nombre_placeholder'] ?>">
            <?php if (isset($_registro_new_usuario_err)) echo '<span class="error">'.$_registro_new_usuario_err.'</span>'; ?>

            <input class="grid_input_remake" type="text" name="new_usuario2" value="<?php if (isset($_new_usuario2)) echo $_new_usuario2;?>" placeholder="<?php echo $lang['ajustes_nombre_placeholder2'] ?>">
            <?php if (isset($_registro_new_usuario2_err)) echo '<span class="error">'.$_registro_new_usuario2_err.'</span>'; ?>

            <input class="grid_button1" type="submit" name="CAMBIAR_NOMBRE" value="<?php echo $lang['ajustes_boton_confirmar']; ?>">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CAMBIAR CONTRASEÑA -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_password">
        <label for="ajustes_password" class="settings_label">
            <ion-icon class="icon" name="key-outline"></ion-icon>
            <p class="settings_option"><?php echo $lang['ajustes_password_label']; ?></p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title"><?php echo $lang['ajustes_password_title']; ?></h2>
            <p class="grid_text"><?php echo $lang['ajustes_password_text']; ?></p>

                <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
                <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>

                <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
                <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

                <input class="grid_input_new" type="password" name="password" value="<?php if (isset($_password)) echo $_password; ?>" placeholder="<?php echo $lang['ajustes_password_placeholder']; ?>">
                <?php if (isset($_registro_password_err)) echo '<span class="error">'.$_registro_password_err.'</span>'; ?>

                <input class="grid_input_remake" type="password" name="password2" value="<?php if (isset($_password)) echo $_password; ?>" placeholder="<?php echo $lang['ajustes_password_placeholder2']; ?>">
                <?php if (isset($_registro_password2_err)) echo '<span class="error">'.$_registro_password2_err.'</span>'; ?>

                <input class="grid_button1" type="submit" name="CAMBIAR_PASSWORD" value="<?php echo $lang['ajustes_boton_confirmar']; ?>">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CAMBIAR CORREO ELECTRONICO -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_email">
        <label for="ajustes_email" class="settings_label">
            <ion-icon class="icon" name="mail-outline"></ion-icon>
            <p class="settings_option"><?php echo $lang['ajustes_email_label']; ?></p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title"><?php echo $lang['ajustes_email_title']; ?></h2>
            <p class="grid_text"><?php echo $lang['ajustes_email_text']; ?></p>
            
            <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>
                        
            <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
            <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>
                        
            <input class="grid_input_new" type="email" name="email" value="<?php if (isset($_email)) echo $_email; ?>" placeholder="<?php echo $lang['ajustes_email_placeholder']; ?>">
            <?php if (isset($_registro_email_err)) echo '<span class="error">'.$_registro_email_err.'</span>'; ?>
            
            <input class="grid_input_remake" type="email" name="email" value="<?php if (isset($_email)) echo $_email; ?>" placeholder="<?php echo $lang['ajustes_email_placeholder2']; ?>">
            <?php if (isset($_registro_email_err)) echo '<span class="error">'.$_registro_email_err.'</span>'; ?>            

            <input class="grid_button1" type="submit" name="CAMBIAR_EMAIL" value="<?php echo $lang['ajustes_boton_confirmar']; ?>">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CAMBIAR FECHA DE NACIMIENTO -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_fecha">
        <label for="ajustes_fecha" class="settings_label">
            <ion-icon class="icon" name="calendar-number-outline"></ion-icon>
            <p class="settings_option"><?php echo $lang['ajustes_fecha_label']; ?></p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title"><?php echo $lang['ajustes_fecha_title']; ?></h2>
            <p class="grid_text"><?php echo $lang['ajustes_fecha_text']; ?></p>
            
            <input class="grid_input_name" type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>
                        
            <input class="grid_input_password" type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
            <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

            <input class="grid_input_new" type="text" name="fecha" value="<?php if (isset($_fecha)) echo $_fecha; ?>" placeholder="<?php echo $lang['ajustes_fecha_placeholder']; ?>" onfocus="(this.type='date')">
            <?php if (isset($_registro_fecha_err)) echo '<span class="error">'.$_registro_fecha_err.'</span>'; ?>

            <input class="grid_input_remake" type="text" name="fecha" value="<?php if (isset($_fecha)) echo $_fecha; ?>" placeholder="<?php echo $lang['ajustes_fecha_placeholder2']; ?>" onfocus="(this.type='date')">
            <?php if (isset($_registro_fecha_err)) echo '<span class="error">'.$_registro_fecha_err.'</span>'; ?>
                        
            <input class="grid_button1" type="submit" name="CAMBIAR_EMAIL" value="<?php echo $lang['ajustes_boton_confirmar']; ?>">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN CERRAR SESIÓN -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_salir">
        <label for="ajustes_salir" class="settings_label">
            <ion-icon class="icon" name="log-out-outline"></ion-icon>
            <p class="settings_option"><?php echo $lang['ajustes_logout_label']; ?></p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title"><?php echo $lang['ajustes_logout_title']; ?></h2>
            <p class="grid_text"><?php echo $lang['ajustes_logout_text']; ?></p>
            <input class="grid_button1" type="submit" name="CERRAR_SESION" value="<?php echo $lang['ajustes_boton_salir']; ?>">
        </div>
    </li>
    <hr class="settings_hr"><!-- DROPDOWN ELIMINAR CUENTA -->
    <li class="settings_dropdown">
        <input type="radio" class="settings_radio" name="accordion" id="ajustes_eliminar">
        <label for="ajustes_eliminar" class="settings_label">
            <ion-icon class="icon" name="trash-outline"></ion-icon>
            <p class="settings_option"><?php echo $lang['ajustes_eliminar_label']; ?></p>
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </label>
        <div class="settings_content">
            <h2 class="grid_title"><?php echo $lang['ajustes_eliminar_title']; ?></h2>
            <p class="grid_text"><?php echo $lang['ajustes_eliminar_text']; ?></p>
                <input type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
                <?php if (isset($_logueo_usuario_err)) echo '<span class="error">'.$_logueo_usuario_err.'</span>'; ?>

                <input type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
                <?php if (isset($_logueo_password_err)) echo '<span class="error">'.$_logueo_password_err.'</span>'; ?>

                <label class="grid_input_text_confirm" for="confirmar"><?php echo $lang['ajustes_eliminar_confirm']; ?></label>
                <input class="grid_input_confirm" type="text" name="password" id="confirmar" placeholder="<?php echo $lang['ajustes_eliminar_confirm_placeholder']; ?>">

                <textarea class="grid_textarea" name="reason" id="reason" placeholder="<?php echo $lang['ajustes_eliminar_confirm_placeholder2']; ?>"></textarea>

                <input class="grid_button2" type="submit" name="CAMBIAR_AVATAR" value="<?php echo $lang['ajustes_boton_eliminar']; ?>">
        </div>
    </li>
</ul>