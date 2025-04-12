<?php 

	class conectar{
		private $servidor = "mysql-demos.mysql.database.azure.com";
		private $usuario = "Demos";
		private $password = "Demo@2025";
		private $bd = "ventas";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}

 ?>