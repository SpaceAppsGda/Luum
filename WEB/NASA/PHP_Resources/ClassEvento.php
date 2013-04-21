<?php


Class Evento 
{
	var $sNombre;
	var $sEnlace;
	var $bIsImage;
	var $dtFecha;
	var $tHora;
	var $iIdSede;
	var $sDescripcion;
	var $file_imagen;

function getEvento($iIdEvento) {
		$sql = "Select * from evento WHERE idEvento = '$iIdEvento'";
		$query = mysql_query($sql) or die("ERROR" . mysql_error());
		if($query) {
			$row = mysql_fetch_assoc($query);
			return $row;
		}
	}

Function addEvento()
{
		if($this->bIsImage == 1)
		{
			//Proceso para alamacenar la imagen en el directorio correspondiente
			// Obtener el nombre encriptado de la imagen y almacenarlo en la propiedad enalce.

			require_once("files.class.php");

    		$fupload = new Upload();
			$fupload->setMaxSize('5000');
    		$fupload->setPath("imagenes/img_eventos/");
    		$fupload->setFile('imagenEvento');
    		
    		 if($fupload->save() != false)
    		 {
    		 	$this->sEnlace = $fupload->cuerpo;	
    		 }
    		 else
    		 {
    		 	echo "[ERROR]:".$fupload->message;
    		 	return;
    		 }
		}

	$query = "
	INSERT INTO evento(nombre, enlace, isImage, fecha, hora, iSede, descripcion, iCatEvento) 
	VALUES('$this->sNombre', '$this->sEnlace', '$this->bIsImage', '$this->dtFecha', '$this->tHora', '$this->iIdSede', '$this->sDescripcion', 1)";

	try
	{
		if($sql=	$sql = mysql_query($query))
		{
			//Update Eventos.xml
			$objXML = new XML();
			$objXML->eventoXML();

			echo "Evento guardado en la Base de Datos";
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

Function updateEvento($iIdEvento)
{
	
	$query = "
	UPDATE evento SET 
	nombre = '".$this->sNombre."', 
	enlace = '".$this->sEnlace."', 
	isImage = ".$this->bIsImage.", 
	fecha = '".$this->dtFecha."',
	hora = '".$this->tHora."', 
	iSede = ".$this->iIdSede.", 
	descripcion = '".$this->sDescripcion."', 
	iCatEvento = 1
	WHERE idEvento = $iIdEvento
	";

	try
	{
		if($sql = mysql_query($query))
		{
			//Update Eventos.xml
			$objXML = new XML();
			$objXML->eventoXML();
			echo utf8_decode("Se actualizó la información del evento exitosamente.");
		}
		else
		{
			echo "[ERROR]: ".mysql_error();
		}
	}
	catch(Exception $e)
	{
		echo "[ERROR]:". $e->getMessage();
	}

}

//..............................................................................................................................................

Function deleteEvento($iIdEvento, $nombre)
{
	$query = "DELETE FROM evento WHERE idEvento ='$iIdEvento'"; 

	try
	{
		if($sql=mysql_query($query))
		{
			//Update Eventos.xml
			$objXML = new XML();
			$objXML->eventoXML();

			echo  utf8_decode("La película ".$sNombre." fue borrada de la base de datos.");
		}
		else
		{
			echo "[ERROR]:".mysql_error();
		}
	}
	catch(Exception $e)
	{
		echo "[ERROR]:". $e->getMessage();
	}
}

}

?>