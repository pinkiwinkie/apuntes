<?php

class Base
{
	private $link;

	function __construct()
	{

		try {
			$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true);
			$this->link = new PDO("mysql:host=localhost;dbname=virtualmarket", "root", "", $opciones);
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
	}
	public function __get($link)
	{
		if (property_exists(__CLASS__, $link)) {
			return $this->$link;
		}
		return NULL;
	}
}

/**
 * 
 */
class Cliente
{
	static function getall($link)
	{
		try {
			$consulta = $link->prepare("SELECT * FROM clientes");
			$consulta->execute();
			return $consulta;
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
	}
}
class Producto
{
	static function getall($link)
	{
		try {
			$consulta = $link->prepare("SELECT * FROM productos");
			$consulta->execute();
			return $consulta;
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
	}
}
class Pedido
{
	private $idPedido;
	private $fecha;
	private $dniCliente;


	public function __construct($idPedido, $fecha, $dniCliente)
	{
		$this->idPedido = $idPedido;
		$this->fecha = date('Y-m-d', strtotime($fecha));
		$this->dniCliente = $dniCliente;
	}
	public function guardar()
	{
		$_SESSION['idPedido'] = $this->idPedido;
		$_SESSION['fecha'] = $this->fecha;
		$_SESSION['dniCliente'] = $this->dniCliente;
	}

	public function __set($propiedad, $var)
	{
		if (property_exists(__CLASS__, $propiedad)) {
			$this->$propiedad = $var;
		}
	}
	public function __get($propiedad)
	{
		if (property_exists(__CLASS__, $propiedad)) {
			return $this->$propiedad;
		}
	}
	function Existe($link)
	{
		try {
			$consulta = $link->prepare("SELECT * FROM pedidos where idPedido='$this->idPedido'");
			$consulta->execute();
			return $consulta->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
	}
	function Insertar($link)
	{
		try {
			$consulta = $link->prepare("INSERT into pedidos (idPedido, fecha, dniCliente) values ('$this->idPedido','$this->fecha','$this->dniCliente')");
			$consulta->execute();
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
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

	public function __construct($idPedido, $nlinea, $idProducto, $cantidad)
	{
		$this->idPedido = $idPedido;
		$this->nlinea = $nlinea;
		$this->idProducto = $idProducto;
		$this->cantidad = $cantidad;
	}
	public function guardar()
	{
		$indice = $_SESSION['linea'];
		$_SESSION['nlinea'][$indice] = $this->nlinea;
		$_SESSION['idProducto'][$indice] = $this->idProducto;
		$_SESSION['cantidad'][$indice] = $this->cantidad;
	}

	public function __set($propiedad, $var)
	{
		if (property_exists(__CLASS__, $propiedad)) {
			$this->$propiedad = $var;
		}
	}
	public function __get($propiedad)
	{
		if (property_exists(__CLASS__, $propiedad)) {
			return $this->$propiedad;
		}
	}
	static function getall($link)
	{
		try {
			$consulta = $link->prepare("SELECT * FROM lineaspedidos");
			$consulta->execute();
			return $consulta;
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
	}
	static function InsertarTodas($link)
	{
		try {
			$consulta = $link->prepare("INSERT into lineaspedidos (idPedido, nlinea, idProducto, cantidad) values (:idPedido,:nlinea,:idProducto, :cantidad)");
			$consulta->bindParam(':idPedido', $idPedido);
			$consulta->bindParam(':nlinea', $nlinea);
			$consulta->bindParam(':idProducto', $idProducto);
			$consulta->bindParam(':cantidad', $cantidad);
			$string = "<table><tr><td>Pedido</td><td>Nlinea</td><td>producto</td><td>cantidad</td></tr>";
			foreach ($_SESSION['idProducto'] as $indice => $value) {
				$idPedido = $_SESSION['idPedido'];
				$nlinea = $_SESSION['nlinea'][$indice];
				$idProducto = $_SESSION['idProducto'][$indice];
				$cantidad = $_SESSION['cantidad'][$indice];
				$consulta->execute();
				$string .= "<tr><td>$idPedido</td><td> $nlinea </td><td>$idProducto</td><td> $cantidad </td></tr>";
			}
			$string .= "</table>";
			session_destroy();
			return $string;
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
	}
}
