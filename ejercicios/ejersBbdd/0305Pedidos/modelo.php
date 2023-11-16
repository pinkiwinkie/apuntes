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
			if(property_exists(__CLASS__, $propiedad)){
				$this->$propiedad = $var;
			}
		}
		public function __get($propiedad){
			if(property_exists(__CLASS__, $propiedad)){
				return $this->$propiedad;
			}
		}
		static function getall($link){
			try{
				$strSql="SELECT P.idPedido, fecha, O.nombre, L.cantidad, O.precio FROM pedidos P LEFT JOIN ";
				$strSql.="(lineaspedidos L INNER JOIN productos O ON L.idProducto=O.idProducto) ";
				$strSql.=" ON P.idPedido=L.idPedido order by P.idPedido";
				$consulta = $link->prepare($strSql);
				$consulta->execute();
				return $consulta;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
				require "vistas/mensaje.php";
				die();
			}
		}
		function Existe($link){
			try{
				$consulta = $link->prepare("SELECT * FROM pedidos where idPedido='$this->idPedido'");
				$consulta->execute();
				return $consulta->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
				require "vistas/mensaje.php";
				die();
			}
		}
		function Insertar($link){
			try{
				// hemos de poner la dirección de entrega porque no se puede dejar vacía.
				$consulta = $link->prepare("INSERT into pedidos (idPedido, fecha, dniCliente,dirEntrega) values ('$this->idPedido','$this->fecha','$this->dniCliente', '')");
				$consulta->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
				require "vistas/mensaje.php";
				die();
			}
		}
	}
	class Linea 
	{
		private $idPedido;
		private $nlinea;	
		private $idProducto;
		private $cantidad;
		
		public function __construct($idPedido, $idProducto,$cantidad){
			$this->idPedido = $idPedido;
			
			$this->idProducto = $idProducto;
			$this->cantidad = $cantidad;
			
		}
				
		public function __set($propiedad, $var){
			if(property_exists(__CLASS__, $propiedad)){
				$this->$propiedad = $var;
			}
		}
		public function __get($propiedad){
			if(property_exists(__CLASS__, $propiedad)){
				return $this->$propiedad;
			}
		}
		
		function Insertar($link){
			try{
				$consulta=$link->prepare("SELECT max(nlinea) as max FROM lineaspedidos WHERE IdPedido=:idPedido");
				$consulta->bindParam(':idPedido',$this->idPedido);	
				$consulta->execute();
				$fila=$consulta->fetch(PDO::FETCH_ASSOC);
				$this->nlinea=$fila['max']+1;
				$consulta = $link->prepare("INSERT into lineaspedidos (idPedido, nlinea,  idProducto, cantidad) values (:idPedido,:nlinea, :idProducto, :cantidad)");
				$consulta->bindParam(':idPedido',$this->idPedido);
				$consulta->bindParam(':nlinea',$this->nlinea);					
				$consulta->bindParam(':idProducto',$this->idProducto);
				$consulta->bindParam(':cantidad',$this->cantidad);
				$consulta->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
				require "vistas/mensaje.php";
				die();
			}
				
		
		}
		
	}
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





?>