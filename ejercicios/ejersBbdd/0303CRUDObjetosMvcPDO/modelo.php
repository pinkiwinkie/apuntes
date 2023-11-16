<?php

class Bd	
{
	private $link;
	function __construct()
	{
		
		try{
			$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT =>true);
			$this->link= new PDO("mysql:host=localhost;dbname=virtualmarket", "root", "",$opciones);
		}
		catch(PDOException $e){
			$dato= "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
 		
	}
		
	function __get($var){
		return $this->$var;
	}
}
class Cliente
{
		private $dniCliente;
		private $nombre;
		private $direccion;
		private $email;
		private $pwd;

		static function getAll($link){
			try{
				$consulta="SELECT * FROM clientes";
				$result=$link->prepare($consulta);
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "vistas/mensaje.php";
 				die();
 			}
		}
		function __construct($dni, $nombre='', $direccion='',$email='',$pwd=''){
			$this->dniCliente=$dni;
			$this->nombre=$nombre;
			$this->direccion=$direccion;
			$this->email=$email;
			$this->pwd=$pwd;
		}
		function buscar ($link){
			try{
				$consulta="SELECT * FROM clientes where dniCliente='$this->dniCliente'";
				$result=$link->prepare($consulta);
				$result->execute();
				return $result->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "vistas/mensaje.php";
 				die();
 			}
		}
		function insertar ($link){
			try{
				$consulta="INSERT INTO clientes VALUES (:dniCliente,:nombre,:direccion,:email,:pwd, false)";
				$result=$link->prepare($consulta);
				$result->bindParam(':dniCliente',$dniCliente);
				$result->bindParam(':nombre',$nombre);
				$result->bindParam(':direccion',$direccion);
				$result->bindParam(':email',$email);
				$result->bindParam(':pwd',$pwd);
				$dniCliente=$this->dniCliente;
				$nombre=$this->nombre;
				$direccion=$this->direccion;
				$email=$this->email;
				$pwd=$this->pwd;
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "vistas/mensaje.php";
 				die();
 			}
		}
		function modificar ($link){
			try{
				$consulta="UPDATE clientes SET nombre='$this->nombre',  direccion='$this->direccion',  email='$this->email', pwd='$this->pwd' WHERE dniCliente='$this->dniCliente'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "vistas/mensaje.php";
 				die();
 			}
		}
		function borrar ($link){
			try{
				$consulta="DELETE FROM clientes where dniCliente='$this->dniCliente'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "vistas/mensaje.php";
 				die();
 			}
		}
}