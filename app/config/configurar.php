<?php 
	// Definiendo constantes

	// Configuración de acceso a la base de datos
	define('DB_HOST', '_NOMBRE_DE_HOST');  		// Nombre de host
	define('DB_USUARIO', '_NOMBRE_USUARIO');	// Nombre de usuario
	define('DB_PASSWORD', '_CONTRASEÑA_');		// Contraseña
	define('DB_NOMBRE', '_NOMBRE_BASE_DATOS_');	// Nombre de base de datos

	// Ruta de la aplicación
	// dirname: devuelve la ruta de un directorio padre.
	// __FILE__ : ruta completa y nombre del fichero con enlaces simbólicos resueltos. 
	define('RUTA_APP', dirname(dirname(__FILE__)));
	
	// para poder establecer conexión con los archivos del public.
	// Ruta url ejemplo: http://localhost/render2web_mvc/
	define('RUTA_URL', '_NOMBRE_RUTA_');

	// Nombre del sitio web (<title>_NOMBRE_DEL_SITIO_WEB_</title>);
	define('NOMBRESITIO', '_NOMBRE_DEL_SITIO_WEB_');
?>