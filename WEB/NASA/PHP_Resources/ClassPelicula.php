<?php
require_once("PHP_Resources/ClassXML.php");

Class Pelicula{

//Propiedades de la clase
	var $iIdSede;
	var $sTitulo;
	var $sEnlace;  //URL del video o el nombre de la imagen.
	var $bIsImage; // Determinar si se cargará una imagen o video.
	var $dtFecha;
	var $tHora;
	var $sSinopsis;
	var $sNomCategoria; // Nombre de la categoria
	var $iCategoria; // id de la categoria.
	var $bIsOficial;
	var $file_imagen; // Contiene la imagen de la pelicula si es imagen. 

	
// Metodo de la clase	
	function getPelicula($idPelicula) {
		$sql = "Select * from pelicula WHERE idPelicula = '$idPelicula'";
		$query = mysql_query($sql) or die("ERRROR" . mysql_error());
		if($query) {
			$row = mysql_fetch_assoc($query);
			return $row;
		}
	}

	Function addPelicula()
	{
		// Hacer conexion con la BD.
	
		if($this->bIsImage == 1)
		{
			//Proceso para alamacenar la imagen en el directorio correspondiente
			// Obtener el nombre encriptado de la imagen y almacenarlo en la propiedad enalce.

			require_once("files.class.php");

    		$fupload = new Upload();
			$fupload->setMaxSize('5000');
    		$fupload->setPath("imagenes/peliculas/");
    		$fupload->setFile('imagenEvento');
    		
    		 if($fupload->save() != false)
    		 {
    		 	$this->sEnlace = $fupload->cuerpo;	
    		 	//echo "".$this->sEnlace;
    		 }
    		 else
    		 {
    		 	echo "[ERROR]:".$fupload->message;
    		 	return;
    		 }

		}
		//echo "".$this->bIsImage;
		//Definomos el INSERT
		$query = "INSERT INTO pelicula(iSede, titulo, enlace, isImage, fecha, hora, sinopsis, categoria, isOficial, cat_pelicula_idcat_pelicula)
		VALUES('$this->iIdSede', '$this->sTitulo', '$this->sEnlace', '$this->bIsImage', '$this->dtFecha', '$this->tHora', '$this->sSinopsis', '$this->sNomCategoria', '$this->bIsOficial', '$this->iCategoria')";
											
		try{
				$sql = mysql_query($query);

				if($sql)
				{ 
					//Update Peliculas.xml
					$objXML = new XML();
					$objXML->peliculaXML();
					echo "Se registro la pelicula con exito";
				}
				else
				{ 
				echo "[ERROR]: Invalid query:".mysql_error();
				}
				
		}
		catch(Exception $e){

			echo "[Error]:".$e->getMessage();

		}
	}

//..............................................................................................................................................
	
	Function updatePelicula($iIdPelicula)
	{
		// Hacer conexion con la BD.
		$sede = $this->bIsImage;
		
		$query = "UPDATE pelicula 
		SET iSede= '".$this->iIdSede."', 
		titulo = '".$this->sTitulo."',  
		enlace = '$this->sEnlace',  
		isImage = '".$this->bIsImage."', 
		fecha = '".$this->dtFecha."', 
		hora = '".$this->tHora."', 
		sinopsis ='".$this->sSinopsis."', 
		categoria = '".$this->iCategoria."', 
		isOficial = ".$this->bIsOficial.", 
		cat_pelicula_idcat_pelicula = ".$this->iCategoria."
		WHERE idPelicula = '$iIdPelicula'
		"; 
			
		try{
			 if($sql = mysql_query($query))
			 {
			 	//Update Peliculas.xml
				$objXML = new XML();
				$objXML->peliculaXML();

			 	echo utf8_decode("Se actualizó la información de la película ".$this->sTitulo." exitosamente.");
			 	echo "<script>document.edit_pelicula.reset()</script>";
			 }
			 else
				{ 
				echo "[ERROR]: Invalid query:".mysql_error();
				}	
			}	
		catch(Exception $e){

			echo "[Error]:".$e->getMessage();
		}
	}

//..............................................................................................................................................
	
	Function deletePelicula($iIdPelicula, $sTituloP)
	{
		

		$query = "DELETE FROM pelicula  WHERE '$iIdPelicula' = idPelicula";		
		try
		{
				if($sql = mysql_query($query))
				{
					//Update Peliculas.xml
					$objXML = new XML();
					$objXML->peliculaXML();
					echo "La pelicula ".$sTituloP." se eliminó de la base de datos.";
				}
				else
				{
					echo "[ERROR]: Invalid query:".mysql_error();
				}
		}
		catch(Exception $e)
		{

			echo "[Error]:".$e->getMessage();

		}

	}

	//..............................................................................................................................................

	Function viewPeliculas()
	{

		// Hacer conexion con la BD.
	
		$query = "SELECT titulo, sinopsis, 'sede.nombre', fecha, hora, isOficial, enlace,
				CASE isOficial 
				WHEN 1 THEN 'SI'
				WHEN 0 THEN 'NO' 
				END
				FROM pelicula, sede 
				ORDER BY  titulo";

		$sql = mysql_query($query); 

		if($sql)
		{
			while($row = mysql_fetch_array($sql))
			{
				extract($row);

				echo "
					<table>
						<tr>
							<th>Agregar  un registro:</th>
							<td><input type='button' value='Nuevo registro'></td>
						</tr>
						<tr>
							<td>$titulo</td>
							<td>$sinopsis</td>
							<td>$sede.nombre</td>
							<td>$fecha</td>
							<td>$hora</td>
							<td>$CASEisOficial</td>
							<td>$enlace</td>
							<td>
								<input type='button' value='Modificar'/> 
							</td>
							<td>
								<input type='button' value='Eliminar'/> 
							</td>
						</tr>
					</table>	
					";	
			}
		}
	}

}

?>



