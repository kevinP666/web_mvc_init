<?php 
	/*
	Mapear la url ingresada en el navegador
		1 - controlador
		2 - método
		3 - Parámetro
		Ejemplo: /articulo/actualizar/6
	*/

	class Core {
		protected $controladorActual = 'paginas';
		protected $metodoActual = 'index';
		protected $parametros = [];

		// Constructor
		public function __construct() {
			// print_r($this->getUrl());
			$url = $this->getUrl();
			// Buscar en controladores si el controlador existe
			if (file_exists('../app/controladores/'.ucwords($url[0]).'.php')) {
				// Si existe se setea como controlador por defecto
				$this->controladorActual = ucwords($url[0]);

				// Unset indice
				unset($url[0]);
			}
			// Requerir el controlador
			require_once '../app/controladores/'.$this->controladorActual.'.php';
			$this->controladorActual = new $this->controladorActual;

			// Verificar la segunda parte de la url con envía el método
			if (isset($url[1])) {
				if (method_exists($this->controladorActual, $url[1])) {
					// Verificamos el método
					$this->metodoActual = $url[1];
					unset($url[1]);
				}
			}
			// Para probar traer método
			// echo $this->metodoActual;

			$this->parametros = $url ? array_values($url) : [];

			// Llamar callback parametros array
			call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
		}

		public function getUrl() {
			// echo $_GET['url'];
			if (isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}

	}
?>