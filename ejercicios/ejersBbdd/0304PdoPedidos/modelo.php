<?php

	class Base{
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

	/**
	* 
	*/
	class Cliente{
		static function getall($link){
			$consulta = $link->prepare("SELECT * FROM clientes");
			$consulta->execute();
			return $consulta;
			
		}
	}
	class Producto{
		static function getall($link){
			$consulta = $link->prepare("SELECT * FROM productos");
			$consulta->execute();
			return $consulta;
			
		}
	}
	class Pedido 
	{
		private $idPedido;
		private $fecha;	
		private $dniCliente;
		
		
		public function __construct($idPedido, $fecha, $dniCliente){
			$this->idPedido = $idPedido;
			$this->fecha = date('Y-m-d', strtotime($fecha));
			$this->dniCliente = $dniCliente;
			
		}
		
		
		public function __set($propiedad, $var){
			
				$this->$propiedad = $var;
			
		}
		public function __get($propiedad){
			
				return $this->$propiedad;
			
		}
		function Existe($link){
			$consulta = $link->prepare("SELECT * FROM pedidos where idPedido='$this->idPedido'");
			$consulta->execute();
			return $consulta->fetch(PDO::FETCH_ASSOC);
			
		}
		function Insertar($link){
			// hemos de poner la dirección de entrega porque no se puede dejar vacía.
			$consulta = $link->prepare("INSERT into pedidos (idPedido, fecha, dniCliente,dirEntrega) values ('$this->idPedido','$this->fecha','$this->dniCliente','')");
			$consulta->execute();
		}
	}
	class Linea 
	{
		private $idPedido;
		private $idProducto;
		private $cantidad;
		
		public function __construct($idPedido, $idProducto,$cantidad){
			$this->idPedido = $idPedido;
			$this->idProducto = $idProducto;
			$this->cantidad = $cantidad;
			
		}
		
		
		public function __set($propiedad, $var){
		
				$this->$propiedad = $var;
			
		}
		public function __get($propiedad){
			
				return $this->$propiedad;
			
		}
		static function getall($link){
			$consulta = $link->prepare("SELECT * FROM lineaspedidos");
			$consulta->execute();
			return $consulta;
			
		}
		function Insertar($link){
			$consulta = $link->prepare("SELECT MAX(nlinea) as max from lineaspedidos where idPedido=$this->idPedido");
			$consulta->execute();
			$numeroLinea=$consulta->fetch(PDO::FETCH_ASSOC);
			$nl=(int)$numeroLinea['max']+1;
			$consulta = $link->prepare("INSERT into lineaspedidos (idPedido,  idProducto, cantidad,nlinea) values (:idPedido,:idProducto, :cantidad, :numL)");
			$consulta->bindParam(':idPedido',$this->idPedido);		
			$consulta->bindParam(':idProducto',$this->idProducto);
			$consulta->bindParam(':cantidad',$this->cantidad);
			$consulta->bindParam(':numL',$nl);
			$consulta->execute();
				
		}

	}





?>