<?php

class Alquiler
{
		private $IdAlquiler;
		private $Fecha;
		private $Pelicula;
		private $Cliente;
		private $Empleado;

		static function getAll($link){
			try{
				$consulta="SELECT * FROM alquileres";
				$result=$link->prepare($consulta);
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
		function __construct($IdAlquiler, $Fecha=NULL, $Pelicula=NULL,$Cliente=NULL,$Empleado=NULL){
			$this->IdAlquiler=$IdAlquiler;
			$this->Fecha=$Fecha;
			$this->Pelicula=$Pelicula;
			$this->Cliente=$Cliente;
			$this->Empleado=$Empleado;
		}
		function buscar ($link){
			try{
				$consulta="SELECT * FROM alquileres where IdAlquiler='$this->IdAlquiler'";
				$result=$link->prepare($consulta);
				$result->execute();
				return $result->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
		
		function insertar ($link){
			try{
				$consulta="INSERT INTO alquileres (Fecha,Pelicula,Cliente,Empleado) VALUES (:Fecha,:Pelicula,:Cliente,:Empleado)";
				$result=$link->prepare($consulta);
				
				$result->bindParam(':Fecha',$Fecha);
				$result->bindParam(':Pelicula',$Pelicula);
				$result->bindParam(':Cliente',$Cliente);
				$result->bindParam(':Empleado',$Empleado);
				
				$Fecha=$this->Fecha;
				$Pelicula=$this->Pelicula;
				$Cliente=$this->Cliente;
				$Empleado=$this->Empleado;
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
		function modificar ($link){
			try{
				$consulta="UPDATE alquileres SET Fecha='$this->Fecha',  Pelicula='$this->Pelicula',  Cliente='$this->Cliente', Empleado='$this->Empleado' WHERE IdAlquiler='$this->IdAlquiler'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
		function borrar ($link){
			try{
				$consulta="DELETE FROM alquileres where IdAlquiler='$this->IdAlquiler'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
		function __get($var){
			return $this->$var;
		}
	
}