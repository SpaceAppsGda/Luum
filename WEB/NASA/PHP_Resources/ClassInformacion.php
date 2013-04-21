<?php


Class Informacion
{
	var $sTitulo;
	var $sImagen;
	var $sDetalle;

		function getInformacion($iIdInformacion) 
		{
		  $sql = "Select * from informacion WHERE idInformacion = '$iIdInformacion'";
		  $query = mysql_query($sql) or die("ERRROR" . mysql_error());
		  if($query) 
		  {
			$row = mysql_fetch_assoc($query);
			return $row;
		 }
	}  
	
	Function addInformacion()
	{
		require_once("files.class.php");

    		$fupload = new Upload();
			$fupload->setMaxSize('5000');
    		$fupload->setPath("imagenes/informacion/");
    		$fupload->setFile('img_informacion');
    		
    		 if($fupload->save() != false)
    		 {
    		 	$this->sImagen = $fupload->cuerpo;	
    		 }
    		 else
    		 {
    		 	echo "[ERROR]:".$fupload->message;
    		 	return;
    		 }

		$query = "INSERT INTO informacion(titulo, imagen, detalle)VALUES('$this->sTitulo', '$this->sImagen', '$this->sDetalle')";
		
		try
		{
			if( $sql = mysql_query($query))
			{
				//Update pelicula.xml
				$objXML = new XML();
				$objXML->informacionXML();
				echo "Se agrego la informacion a la Base de Datos.";
			}
			else
			{
				echo "[ERROR]: ".mysql_error();
			}
		}
		catch(Exception $e)
		{
			echo "[ERROR]:".$e->getMessage();
		}
	}

	//..............................................................................................................................................

	Function updateInformacion($iIdInformacion)
	{
	
		$query = "UPDATE informacion SET titulo = '".$this->sTitulo."', imagen = '".$this->sImagen."', detalle = '".$this->sDetalle."' WHERE idInformacion = '$iIdInformacion' ";

		

		try
		{
			if( $sql = mysql_query($query))
				{
					//Update pelicula.xml
					$objXML = new XML();
					$objXML->informacionXML();
					echo "Se actualizo la informacion";
				}
				else
				{
					echo "[ERROR]:".mysql_error();
				}
		}
		catch(Exception $e)
		{
			echo "[ERROR]:".$e->getMessage();
		}
	}

	//..............................................................................................................................................

	Function deleteInformacion($iIdInformacion, $titulo)
	{
		$query = "DELETE FROM informacion WHERE idInformacion = $iIdInformacion";

		try
		{
		      if($sql =mysql_query($query))
		      {
		      	//Update pelicula.xml
				 $objXML = new XML();
				 $objXML->informacionXML();
		      	 echo "Se elimino la informacion  '".$titulo."' de base de datos.";
		      }
		      else
		      { 
		      	echo "[ERROR]:".mysql_error();
			  }
		}
		catch(Exception $e)
		{
			echo "[ERROR]:".$e->getMessage();
		}
	}

}

?>