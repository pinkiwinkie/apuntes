<?php

class Empleado
{
		
		private $Email;
		private $pass;

		
		function __construct($Email,$pass=NULL){
			
			$this->Email=$Email;
			$this->pass=$pass;
		}
		function buscar ($link){
			try{
				$consulta="SELECT * FROM empleados where Email='$this->Email'";
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
		function validar ($link){
			try{
				$cli=$this->buscar($link);
                if (password_verify($this->pass,$cli['pass']))
				    return $cli;
                else return false;
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