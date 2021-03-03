<?php

class Conexion {
	private $conexion;
	private $configuracion = [
		"driver" => "mysql",
		"host" => "us-cdbr-east-03.cleardb.com",
		"database" => "heroku_4508b8af49308d8",
		"username" => "b6e038dc526164",
		"password" => "9ee0c2b4",
		"port" => "3306",
		"charset" => "utf8mb4"
	];
	
	public function __construct(){
		
	}
	
	public function conectar(){
		try{
			$CONTROLADOR = $this->configuracion["driver"];
			$SERVIDOR = $this->configuracion["host"];
			$BASE_DATOS = $this->configuracion["database"];
			$USUARIO = $this->configuracion["username"];
			$PASS = $this->configuracion["password"];
			$PUERTO = $this->configuracion["port"];
			$CODIFICACION = $this->configuracion["charset"];
			
			$con="{$CONTROLADOR}:host={$SERVIDOR}:{$PUERTO};"."dbname={$BASE_DATOS};charset={$CODIFICACION}";
			//Se crea conexion
			$this->conexion = new PDO($con, $USUARIO, $PASS);
			echo '<div class="alert alert-success">CONECTADO</div>';
			return $this->conexion;
		}catch (Exception $exc){
			echo '<div class="alert alert-danger">NO SE PUDO CONECTAR</div>';
			echo $exc->getTraceAsString();
		}
	}

}
//include 'lib.php';
