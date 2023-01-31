<?php
	$lang = array(
		"selected_lang" => "English",
		
		// Idiomas
		"lang_en" => "English",
		"lang_es" => "Spanish",
		"footer_text" => "Created by",
		
		// index.php
		"index_title" => "Access to Batallas.com",
		"index_h2" => "Batallas.com",
		
		// sección de logueo
		"logueo_h1" => "Log in",
        "logueo_label_nombre" => "User name *",
        "logueo_label_password" => "Password *",
        "logueo_boton_entrar" => "ACCESS",

		// overlay sección de logueo
        "logueo_cambio_h1" => "It's your first time here?",
        "logueo_cambio_text" => "Enter your personal details and start battling with us",
        "logueo_cambio_registro" => "CREATE ACCOUNT",

		// errores sección de logueo
		"logueo_vacio_usuario" => "User name not inserted",
		"logueo_vacio_password" => "Password not inserted",
		"logueo_error_usuario" => "User not found",
		"logueo_error_password" => "Incorrect password",
		
		// sección de registro
        "registro_h1" => "Create an account",
        "registro_label_nombre" => "User name *",
        "registro_label_password" => "Password *",
        "registro_label_password2" =>"Confirm password *",
        "registro_label_email" => "E-mail *",
        "registro_label_fecha" => "Birth date *",
        "registro_label_avatar" => "Profile photo *",
        "registro_boton_entrar" => "Sign in",
		
		// overlay sección de registro
        "registro_cambio_h1" => "Already have an account?",
        "registro_cambio_text" => "Log in and let's the Battling start",
        "registro_cambio_logueo" => "LOG IN",
		
		// errores sección de registro
		"registro_vacio_usuario" => "User name not inserted",
		"registro_error_usuario" => "Invalid user name",
		"registro_existing_usuario" => "User name is already taken",
		"registro_vacio_password" => "Password not inserted",
		"registro_error_password" => "Password must have at least one number, from 8 to 16 characters and caps",
		"registro_error_match" => "Passwords do not match",
		"registro_vacio_email" => "E-mail not inserted",
		"registro_error_email" => "Invalid e-mail",
		"registro_existing_email" => "Email ya está en uso.",
		"registro_vacio_fecha" => "Birth date not inserted",
		"registro_error_fecha" => "Invalid birth date",
		"registro_error_edad" => "Birth date out of bounds",
		"registro_error_max" => "The selected file exceeds the maximum weight",
		"registro_error_extension" => "Only .jpg, .jpge or .png files are accepted",
		"registro_vacio_foto" => "Profile photo not inserted",
		"registro_failed_new_login" => "Sorry, could not log in with the registered user",

		// user.php
		"user_title" => "Homepage",
		"user_tab_perfil_title" => "Profile",
		"user_tab_batallas_title" => "Battles",
		"user_tab_creador_title" => "Creator",
		"user_tab_logros_title" => "Achivements",
		"user_tab_como_title" => "FAQ",

		// perfil.php
		"perfil_h2" => "User data",
		"perfil_elementos_creados" => "Created elements",
		"perfil_batallas_creadas" => "Created battles",
		"perfil_batallas_votadas" => "Voted battles",
		"perfil_batallas_ignoradas" => "Ignored battles",
		"perfil_batallas_denunciadas" => "Reported battles",
		"perfil_puntos_troll" => "Troll points",
		
		// perfil.php tab batallas creadas
		"tab_bc_title" => "Created battles",
		"tab_bc_id_batallas" => "BATTLE ID",
		"tab_bc_descripcion" => "DESCRIPTION",
		"tab_bc_denuncias" => "COMPLAINTS",
		"tab_bc_fecha" => "CREATION DATE",
		"tab_bc_empty" => "You haven't created any battle yet",

		// perfil.php tab batallas ignoradas
		"tab_bi_title" => "Ignored battles",
		"tab_bi_button" => "STOP IGNORING",
		"tab_bi_empty" => "You haven't ignored any battle",
		
		// perfil.php tab batallas denunciadas
		"tab_bd_title" => "Reported battles",
		"tab_bd_button" => "WITHDRAW COMPLAINT",
		"tab_bd_empty" => "You haven't reported any battle",

		// batallas.php
		"batallas_text_creador" => "Battle created by",
		"batallas_text_votos" => "upvotes",
		"batallas_text_creador_elemento" => "by",

		// creador.php

		// logros.php

		// como.php
		"como_title" => "Frequently-asked questions",
		"como_q1" => "What are battles?",
		"como_a1" => "Battles are confrontations created by users between any two elements, which let the community know which of these elements are the favorites or the most valued thanks to our voting system.",
		"como_q2" => "What are the elements?",
		"como_a2" => "The elements are objects from the same or different environment <em>(languages, series, brands, wines, cars, videogames...)</em> confronted with each other through battles, in which users will vote for the one they like it more.",
		"como_q3" => "What happens if I report a battle?",
		"como_a3" => "By reporting a battle, you will be implying some of the following points:<br><br><ul><li>That the elements has content that may be offensive to other users <em>(Example: homophobia, racism , etc.)</em>.</li></ul><br>Once you have reported a battle the user will automatically receive a <em>troll</em> point in their personal account.",
		"como_q4" => "What are troll points?",
		"como_a4" => "Troll points are negative points that users get for the complaints received by the battles they have created, these points are cumulative and also count as a vote, so you can only vote for one item or report the battle it self.<br><br>When 80% of the total votes of a battle are complaints, it will be deleted for all users and its creator will get a troll point.<br><br>Users with 10 accumulated troll points will be banned from the system and will not be you can register again.",
		"como_q5" => "Can I recover my account if I have been banned?",
		//
		"como_a5" => "Todos los baneos estan sujetos a revisión, por lo que si tu cuenta ha sido baneada de forma injusta deberás esperar a que los administradores 
		comprueben tu caso.<br>",
		"como_q6" => "¿Qué son los logros?",
		"como_a6" => "Los logros son un sistema de recompensas por la interacción con las batallas, tanto propias como de otros usuarios.<br><br>
		Logros por crear batallas:<br><br>
		<ul>
			<li><strong>Comprometido</strong>: Has creado 10 batallas para la comunidad.</li>
			<li><strong>Vicioso</strong>: Has creado 100 batallas para la comunidad.</li>
			<li><strong>Adicto</strong>: Has creado 1000 batallas para la comunidad.</li>
		</ul><br>
		Logros por votar batallas:<br><br>
		<ul>
			<li><strong>Votante</strong>: Has votado en 10 batallas de otros usuarios.</li>
			<li><strong>Sindicalista</strong>: Has votado en 100 batallas de otros usuario.</li>
			<li><strong>Activista</strong>: Has votado en 1000 batallas de otros usuario.</li>
		</ul><br>
		Logros por denunciar batallas:<br><br>
		<ul>
			<li><strong>Vigilante</strong>: Has denunciado 10 batallas.</li>
			<li><strong>Moderador</strong>: Has denunciado 100 batallas.</li>
			<li><strong>Policía</strong>: Has denunciado 1000 batallas.</li>
		</ul><br>",
		"como_q7" => "Has denunciado varias batallas, pero tus logros no avanzan.",
		"como_a7" => "Para que las denuncias contabilicen en los logros, las batallas en cuestion deberán ser eliminadas (80% de los votos totales son denuncias).<br>
		De esta manera se evita que los usuarios denuncien batallas al azar para obtener los logros más rápido.",

		// ajustes.php
		"ajustes_boton_confirmar" => "CONFIRM",
		"ajustes_boton_salir" => "LOG OUT",
		"ajustes_boton_eliminar" => "DELETE ACCOUNT",
		"ajustes_foto_label" => "Change profile photo",
		"ajustes_foto_title" => "CHANGE YOUR PROFILE PHOTO",
		"ajustes_foto_text" => "You can do this whenever you get bored with the one you have.",
		"ajustes_nombre_label" => "Change user name",
		"ajustes_nombre_title" => "CHANGE YOUR USER NAME",
		"ajustes_nombre_text" => "You can do this if you don't like the one you already have.",
		"ajustes_nombre_placeholder" => "New user name *",
		"ajustes_nombre_placeholder2" => "Confirm user name *",
		"ajustes_password_label" => "Change password",
		"ajustes_password_title" => "CHANGE YOUR PASSWORD",
		"ajustes_password_text" => "Performing this action from time to time is good for the security of your account.",
		"ajustes_password_placeholder" => "New password *",
		"ajustes_password_placeholder2" => "Confirm new password *",
		"ajustes_email_label" => "Change e-mail",
		"ajustes_email_title" => "CHANGE YOUR E-MAIL",
		"ajustes_email_text" => "Here you can change the e-mail linked to your account.",
		"ajustes_email_placeholder" => "New e-mail *",
		"ajustes_email_placeholder2" => "Confirm e-mail *",
		"ajustes_fecha_label" => "Change birth date",
		"ajustes_fecha_title" => "CHANGE YOUR BIRHT DATE",
		"ajustes_fecha_text" => "If by any chance you entered your birth date wrong when registering your account, don't worry, we think of everything.",
		"ajustes_fecha_placeholder" => "New birth date *",
		"ajustes_fecha_placeholder2" => "Confirm birth date *",
		"ajustes_logout_label" => "Log out",
		"ajustes_logout_title" => "IT'S NOT A GOODBYE, IT'S A SEE YOU LATER",
		"ajustes_logout_text" => "Keep calm, we will keep everything as you left it until your return.",
		"ajustes_eliminar_label" => "Delete account",
		"ajustes_eliminar_title" => "DELETE YOUR ACCOUNT",
		"ajustes_eliminar_text" => "Are your sure about this?",
		"ajustes_eliminar_confirm" => "Type 'CONFIRM' to make sure it's not an error.",
		"ajustes_eliminar_confirm_placeholder" => "Enter the security word *",
		"ajustes_eliminar_confirm_placeholder2" => "We want to improve and to do so you can let us know the reason why you want to delete your account",

		// errores ajustes.php

	);
?>