<?php
	$lang = array(
		"selected_lang" => "Español",
		
		// Idiomas
		"lang_en" => "Inglés",
		"lang_es" => "Español",
		
		// index.php
		"index_title" => "Acceso a Batallas.com",
		"index_h2" => "Batallas.com",
		"index_footer_text" => "Creado por",
		
		// sección de logueo
		"logueo_h1" => "Iniciar sesión",
        "logueo_label_nombre" => "Nombre de usuario *",
        "logueo_label_password" => "Contraseña *",
        "logueo_boton_entrar" => "ENTRAR",

        "logueo_cambio_h1" => "¿Aún no tienes cuenta?",
        "logueo_cambio_text" => "Introduce tus datos y empieza a luchar con nosotros",
								// Enter your personal details and battling with us
        "logueo_cambio_registro" => "CREAR CUENTA",

		// errores sección de logueo
		"logueo_vacio_usuario" => "Nombre de usuario no introducido",
		"logueo_vacio_password" => "Contraseña no introducida",
		"logueo_error_usuario" => "Usuario no encontrado",
		"logueo_error_password" => "Contraseña incorrecta",
		
		// sección de registro
        "registro_h1" => "Crea una cuenta",
        "registro_label_nombre" => "Nombre de usuario *",
        "registro_label_password" => "Contraseña *",
        "registro_label_password2" =>"Repetir contraseña *",
        "registro_label_email" => "E-mail *",
        "registro_label_fecha" => "Fecha de nacimiento *",
        "registro_label_avatar" => "Foto de perfil *",
        "registro_boton_entrar" => "REGISTRARSE",
		
        "registro_cambio_h1" => "¿Ya tienes cuenta?",
        "registro_cambio_text" => "Inicia sesión y que empiecen las batallas",
        "registro_cambio_logueo" => "INICIAR SESIÓN",
		
		// errores sección de registro
		"registro_vacio_usuario" => "Campo de usuario vacío",
		"registro_error_usuario" => "Nombre de usuario no válido",
		"registro_existing_usuario" => "Nombre de usuario ya está en uso.",
		"registro_vacio_password" => "Campo de contraseña vacío",
		"registro_error_password" => "La contraseña debe contener dígitos, mayúsculas, minusculas y de 8 a 16 caracteres",
		"registro_error_match" => "Las contraseñas no coinciden",
		"registro_vacio_email" => "Campo de email vacío",
		"registro_error_email" => "Campo de email no válido",
		"registro_existing_email" => "Email ya está en uso.",
		"registro_vacio_fecha" => "Campo de fecha de nacimiento vacío",
		"registro_error_fecha" => "Campo de fecha de nacimiento no válido",
		"registro_error_edad" => "Fecha de nacimiento fuera de los limites",
		"registro_error_max" => "El archivo seleccionado supera el peso máximo",
		"registro_error_extension" => "Solo se acepta archivos jpg, jpge o png.",
		"registro_vacio_foto" => "Campo de foto de perfil vacío",
		"registro_failed_new_login" => "Lo sentimos, no se ha podido iniciar sesión con el usuario registrado",

		// inicio.php
		"inicioPerfil" => "Perfil",
		"inicioBatalla" => "Batallas",
		"inicioElemento" => "Elementos",
		"inicioLogro" => "Logros",
		"inicioInstrucciones" => "¿Como jugar?",

		// HASTA AQUI ESTA FUNCIONANDO « /provisional »
		

		"elementNameErr" => "Campo nombre vacío",
		"elementNameErr2" => "Nombre de elemento no válido",

		// -- PERFIL TAB AYUDA --
		"perfilTitle" => "Batallas",
		"perfilClose" => "Cerrar sesión",
		"ayudaContent" => '<h1 class="faq-h1">Preguntas más frecuentes</h1>
							<div class="faq-container">
								<div class="questions">
									<div class="faq faq-one">
										<h2 class="faq-title">¿Qué son las batallas?</h2>
										<div class="faq-answer">
											Las batallas son enfrentamientos creados por los usuarios entre dos elementos cualesquiera, las cuales dan a saber a la comunidad cual de dichos 
											elementos son los favoritos o los más valorados gracias al sistema de votos.
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-two">
										<h2 class="faq-title">¿Qué son los elementos?</h2>
										<div class="faq-answer">
											Los elementos son objetos de un mismo entorno <em>(leguajes, series, marcas...)</em> efrentados entre sí a través de batallas.
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-three">
										<h2 class="faq-title">¿Qué pasa si denuncio un batalla?</h2>
										<div class="faq-answer">
											Al denunciar una batallas, estarás dando a entender algunos de los siguientes puntos:<br><br>
											<ul>
												<li>Que los elementos no tiene relación alguna entre sí <em>(Ejemplo: Fuego vs. Audi)</em>.</li>
												<li>Que los elemetos poseen contenido que puede resultar ofensivo para el resto de usuarios <em>(Ejemplo: homofobia, racismo, odio hacia algun 
													conjunto de personas, etc.)</em>.</li>
											</ul><br>
											Una vez hayas denunciado una batalla el usuario automáticamente recibirá un punto de <em>troll</em> en su cuenta personal.
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-four">
										<h2 class="faq-title">¿Qué son los puntos troll?</h2>
										<div class="faq-answer">
											Los puntos de <em>troll</em> son puntos negativos que obtienen los usuarios por cada denuncia de las batallas que hayan creado, estos puntos son 
											acumulativos y tambien cuentan como voto, por lo que solo se podrá votar un elemento o denunciar la batalla del mismo. Cuando el 80% de los votos 
											totales de una batalla son denuncias, esta será eliminada para todos los usuarios y su creador obtendrá un punto de <em>troll</em>.<br><br>
											Los usuario con 10 puntos <em>troll</em> acumulados seran baneados del sistema y no se podrá registrar de nuevo con las mismas credenciales.
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-five">
										<h2 class="faq-title">¿Puedo recuperar mi cuenta si ha sido baneada?</h2>
										<div class="faq-answer">
											Todos los baneos estan sujetos a revisión, por lo que si tu cuenta ha sido baneada de forma injusta deberás esperar a que los administradores 
											comprueben tu caso.<br>
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-six">
										<h2 class="faq-title">¿Qué son los logros?</h2>
										<div class="faq-answer">
											Los logros son un sistema de recompensas por la interacción con las batallas, tanto propias como de otros usuarios.<br><br>
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
											</ul><br>
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-three">
										<h2 class="faq-title">Has denunciado varias batallas, pero tus logros no avanzan.</h2>
										<div class="faq-answer">
											Para que las denuncias contabilicen en los logros, las batallas en cuestion deberán ser eliminadas (80% de los votos totales son denuncias).<br>
											De esta manera se evita que los usuarios denuncien batallas al azar para obtener los logros más rápido.
										</div>
									</div>
								</div>
							</div>',

		// -- LOGROS --

		"achievementTittle" => "Tus logros",

		//ELEMENTOS CREADOS
		"achievementCrEl" => "El logro se desbloquea a los 10 elementos creados, tu tienes: ",
		"CrEl" => "Elementos creados: ",
		"CrEl1" => ". Principiante",
		"CrEl2" => ". Magnate",
		"CrEl3" => ". Dios de la Guerra",

		//BATALLAS CREADAS
		"achievementCrBt" => "El logro se debloquea a las 10 batallas creadas, tu tienes: ",
		"CrBt" => "Batallas creadas: ",
		"CrBt1" => ". Comprometido",
		"CrBt2" => ". Vicioso",
		"CrBt3" => ". Adicto",

		//BATALLAS VOTADAS
		"achievementVtBt" => "El logro se desbloquea a las 10 batallas votadas, tu tienes: ",
		"VtBt" => "Batallas votadas: ",
		"VtBt1" => ". Votante",
		"VtBt2" => ". Sindicalista",
		"VtBt3" => ". Activista",

		//BATALLAS IGNORADAS
		"achievementIgBt" => "El logro se desbloquea a las 10 batallas ignoradas, tu tienes: ",
		"IgBt" => "Batallas ignoradas: ",
		"IgBt1" => ". Ignorante",
		"IgBt2" => ". Pasota",
		"IgBt3" => ". ¿Para que te creas una cuenta? PENDEJO",

		//BATALLAS DENUNCIADAS
		"achievementRpBt" => "El logro se desbloquea a las 10 batallas denunciadas, tu tienes: ",
		"RpBt" => "Batallas denunciadas: ",
		"RpBt1" => ". Vigilante",
		"RpBt2" => ". Moderador",	
	);
?>