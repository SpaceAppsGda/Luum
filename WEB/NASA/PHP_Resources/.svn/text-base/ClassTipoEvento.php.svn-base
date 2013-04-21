<?php


Class TipoEvento
{
	var $sNombre;
	var $sImagen;


	Function addTipoEvento()
	{	
		

		
			//Proceso para alamacenar la imagen en el directorio correspondiente
			// Obtener el nombre encriptado de la imagen y almacenarlo en la propiedad enalce.

			require_once("files.class.php");

    		$fupload = new Upload();
			$fupload->setMaxSize('5000');
    		$fupload->setPath("../imagenes/categoria_evento/");
    		$fupload->setFile('imagenEvento');
    		
    		 if($fupload->save() != false)
    		 {
    		 	$this->sImagen = $fupload->cuerpo;	
    		 	//echo "".$this->sEnlace;
    		 }
    		 else
    		 {
    		 	echo "[ERROR]:".$fupload->message;
    		 	return;
    		 }

		$query = "INSERT INTO cat_evento(nombre, imagen)VALUES('$this->sNombre', '$this->sImagen')";

		try
		{
			if( $sql = mysql_query($query))
			{
				echo "Se agrego una categoria de evento a la Base de datos";
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

	Function updateTipoEvento($iIdCatEvento)
	{
		
		$query = "UPDATE FROM cat_evento SET nombre = '$this->sNombre', imagen = '$this->sImagen' WHERE '$iIdCatEvento' == idCatEvento";

		try
		{
			mysql_query($query);
		}
		catch(Exception $e)
		{
			echo "[ERROR]:".$e->getMessage();
		}

	}


//..............................................................................................................................................

	Function deleteTipoEvento($iIdCatEvento)
	{	

		$query = "DELETE FROM cat_evento WHERE '$iIdCatEvento' == idCatEvento";

	}
}

?>