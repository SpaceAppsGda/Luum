<?php 
Class Sede
{
	var $sNombre;
	var $sCalle;
	var $sNumero;
	var $sColonia;
	var $sCP;
	var $bIsSede;
	var $dLongitud;
	var $dLatitud;


	function getSede($iIdSede)
	 {
		$sql = "Select * from sede WHERE idSede = '$iIdSede'";
		$query = mysql_query($sql) or die("ERRROR" . mysql_error());
		if($query) {
			$row = mysql_fetch_assoc($query);
			
			return $row;
		}
   }

	Function addSede()
	{	

		$query = "INSERT INTO sede(nombre, calle, numero, colonia, cPostal, isSede, longitud, latitud) 
		VALUES('$this->sNombre', '$this->sCalle', '$this->sNumero', '$this->sColonia', '$this->sCP', '$this->bIsSede', '$this->dLongitud', '$this->dLatitud')";

		try
		{
			if($sql = mysql_query($query))
			{
				//Update Sedes.xml
				$objXML = new XML();
				$objXML->sedeXML();
				echo "Se agrego la sede a la Base de Datos";
			}
			else
			{
				echo "[ERROR]:",mysql_error();
			}
		}
		catch(Exception $e)
		{
			echo "[ERROR]:".$e->getMessage();
		}

	}

	//..............................................................................................................................................

	Function updateSede($iIdSede)
	{
	    $query = "
	    UPDATE sede SET 
	    nombre = '$this->sNombre', 
	    calle = '$this->sCalle', 
	    numero = '$this->sNumero',
	    colonia = '$this->sColonia', 
	    cPostal = '$this->sCP', 
	    isSede = '$this->bIsSede', 
	    longitud = '$this->dLongitud', 
	    latitud = '$this->dLatitud'
	    WHERE '$iIdSede' = idSede
	    ";

	    try
	    {
	    	if( $sql = mysql_query($query))
	    	{
	    		//Update Sedes.xml
				$objXML = new XML();
				$objXML->sedeXML();
	    		echo "Se actualizo la informacion de una sede";
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

	Function deleteSede($iIdSede, $nombre)
	{  
	   $sqlPeliculas = mysql_query("select count(*) as \"NumeroPeliculas\" from pelicula where iSede =$iIdSede");
	   $sqlEventos = mysql_query("select count(*) as \"NumeroEventos\" from evento where iSede =$iIdSede");


		while($rowP = mysql_fetch_assoc($sqlPeliculas))
		{
			$numPe = $rowP["NumeroPeliculas"];
		}

		while($rowE = mysql_fetch_assoc($sqlEventos))
		{
			$numEve = $rowE["NumeroEventos"];
		}

		if($numPe == 0 && $numEve == 0)
		{
			$sqlSede = "DELETE FROM sede WHERE idSede = $iIdSede";

			if($response = mysql_query($sqlSede))
			{
					//Update Sedes.xml
				$objXML = new XML();
				$objXML->sedeXML();
				echo utf8_decode("Sé eliminó la sede $nombre de la base de datos.");
			}
			else
			{
				echo "[ERROR]:".mysql_error();
			}
		}
		else
		{		
			echo "La sede $nombre esta asociada a $numPe peliculas y $numEve eventos por lo que no puede ser eliminada.";
		}



	}
}

?>




