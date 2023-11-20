<?php

class Bd
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

	function __get($var)
	{
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
	private $administrador;
	function __construct($dni, $nombre, $direccion, $email, $pwd, $administrador)
	{
		$this->dniCliente = $dni;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->email = $email;
		$this->pwd = $pwd;
		$this->administrador = $administrador;
	}
	function buscar($link)
	{
		try {
			$consulta = "SELECT * FROM clientes where dniCliente='$this->dniCliente'";
			$result = $link->prepare($consulta);
			$result->execute();
			return $result->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
	}
	function insertar($link)
	{
		try {
			$consulta = "INSERT INTO clientes VALUES (:dniCliente,:nombre,:direccion,:email,:pwd,:administrador)";
			$result = $link->prepare($consulta);
			$result->bindParam(':dniCliente', $this->dniCliente);
			$result->bindParam(':nombre', $this->nombre);
			$result->bindParam(':direccion', $this->direccion);
			$result->bindParam(':email', $this->email);
			$result->bindParam(':pwd', $this->pwd);
			$result->bindParam(':administrador', $this->administrador);

			$result->execute();
			return $result;
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
	}
}
