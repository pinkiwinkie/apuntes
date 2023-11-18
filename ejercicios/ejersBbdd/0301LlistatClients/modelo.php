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
			require "vista/mostrar.php";
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
 				require "vista/mostrar.php";
 				die();
 			}
		}
		
		
}