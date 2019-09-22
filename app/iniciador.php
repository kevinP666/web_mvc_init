<?php 

	// configuración
	require_once 'config/configurar.php';

	// Cargar todas los DOC .php que estén dentro de la carpeta 'libreria' con la función 'spl_autoload_register'
	spl_autoload_register(function($nombreClase) {
		// Requiriendo todos los doc .php
		require_once 'librerias/'.$nombreClase.'.php';
	});

?>