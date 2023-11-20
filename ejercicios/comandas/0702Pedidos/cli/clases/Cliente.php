<?php

class Cliente
{
	private $dniCliente;
	private $nombre;
	private $direccion;
	private $email;
	private $pwd;

	static function getAll($link)
	{
		try {
			$consulta = "SELECT * FROM clientes";
			$result = $link->prepare($consulta);
			$result->execute();
			return $result;
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			return $dato;
			die();
		}
	}
	function __construct($dni, $nombre, $direccion, $email, $pwd)
	{
		$this->dniCliente = $dni;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->email = $email;
		$this->pwd = $pwd;
	}
	function __get($var)
	{
		return $this->$var;
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
			return $dato;
			die();
		}
	}
}
