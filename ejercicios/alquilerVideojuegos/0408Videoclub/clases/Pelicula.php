<?php

class Pelicula
{
		private $IdPelicula;
		private $Titulo;
		private $Descripcion;
		private $FechaEstreno;
		private $foto;

		static function getAll($link){
			try{
				$consulta="SELECT * FROM peliculas";
				$result=$link->prepare($consulta);
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
		function __construct($dni, $Titulo=NULL, $Descripcion=NULL,$FechaEstreno=NULL,$foto=NULL){
			$this->IdPelicula=$dni;
			$this->Titulo=$Titulo;
			$this->Descripcion=$Descripcion;
			$this->FechaEstreno=$FechaEstreno;
			$this->foto=$foto;
		}
		function buscar ($link){
			try{
				$consulta="SELECT * FROM peliculas where IdPelicula='$this->IdPelicula'";
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
		function subir($fichero){
            if (is_uploaded_file($fichero['tmp_name'])){
                $nombre=$fichero['name'];
                $dir='../img/';
                if(!is_dir($dir)) mkdir($dir);
                if(is_file($dir.$nombre)){
                    $idUnico=uniqid();
                    $partes=explode('.',$nombre);
                    $extension=array_pop($partes);
                    $nombre=implode('.',$partes);                    
                    $nombre.="_$idUnico.$extension";
                }
                move_uploaded_file($fichero['tmp_name'], $dir.$nombre);
                $this->foto=$dir.$nombre;
                return true;               
            }else 
                return false;
            
        }
		function insertar ($link){
			try{
				$consulta="INSERT INTO peliculas (Titulo,Descripcion,FechaEstreno,foto) VALUES (:Titulo,:Descripcion,:FechaEstreno,:foto)";
				$result=$link->prepare($consulta);
				
				$result->bindParam(':Titulo',$Titulo);
				$result->bindParam(':Descripcion',$Descripcion);
				$result->bindParam(':FechaEstreno',$FechaEstreno);
				$result->bindParam(':foto',$foto);
				
				$Titulo=$this->Titulo;
				$Descripcion=$this->Descripcion;
				$FechaEstreno=$this->FechaEstreno;
				$foto=$this->foto;
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
		function modificar ($link){
			try{
				$consulta="UPDATE peliculas SET Titulo='$this->Titulo',  Descripcion='$this->Descripcion',  FechaEstreno='$this->FechaEstreno', foto='$this->foto' WHERE IdPelicula='$this->IdPelicula'";
			
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
		function borrar ($link){
			try{
				$consulta="DELETE FROM peliculas where IdPelicula='$this->IdPelicula'";
				$result=$link->prepare($consulta);
				return $result->execute();
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