<?php 

	// Clase para conectarse a la base de datos y ejecutar consulta PDO
	class Base {
		private $host = DB_HOST;			// nombre de host
		private $usuario = DB_USUARIO;		// nombre del usuario
		private $password = DB_PASSWORD;	// contraseña
		private $nombre_base = DB_NOMBRE;	// nombre base de datos

		private $dbh; 	// database handler
		private $stmt; 	// Statement
		private $error;

		public function __construct() {
			// Configurar conexión
			$dsn = 'mysql:host='.$this->host.';dbname='.$this->nombre_base;
			$opciones = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);

			// Crear una instancia de PDO
			try {
				$this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
				// Para que no de el error de los acentos o carácteres
				$this->dbh->exec('set names utf8');

			} catch (PDOException $e) {
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}

		// Prepar la consulta
		public function query($sql) {
			$this->stmt = $this->dbh->prepare($sql);
		}

		// Vinculamos la consulata con bind
		public function bind($parmetro, $valor, $tipo = null) {
			if (is_null($tipo)) {
				switch (true) {
					case is_int($valor):
						$tipo = PDO::PARAM_INT;	
					break;
					case is_bool($valor):
						$tipo = PDO::PARAM_BOOL;	
					break;
					case is_null($valor):
						$tipo = PDO::PARAM_NULL;	
					break;
					default:
						$tipo = PDO::PARAM_STR;
					break;
				}
			}
			$this->stmt->bindValue($parametro, $value, $tipo);
		}

		// ejecuta la consulta
		public function execute() {
			return $this->stmt->execute();
		}

		// Obtener los registros de la consulta
		public function registros() {
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// Obtener un solo registro
		public function registro() {
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_OBJ);
		}

		// Obtener cantidad de filas con el método rowCount
		public function rowCount() {
			return $this->stmt->rowCount();
		}

	}


?>