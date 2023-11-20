<?php

class Cliente
{

	static function getAll($link)
	{
		try {
			$consulta = "SELECT * FROM clientes";
			$result = $link->prepare($consulta);
			$result->execute();
			return $result;
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "../vistas/mensaje.php";
			die();
		}
	}
}
