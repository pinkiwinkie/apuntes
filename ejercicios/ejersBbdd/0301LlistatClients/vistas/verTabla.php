<?php

while ($fila = $dato->fetch(PDO::FETCH_ASSOC)) {
	echo $fila['nombre'] . "</br>";
}
