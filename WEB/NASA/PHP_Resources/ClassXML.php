<?php
Class XML {
	function peliculaXML() {
		$conectarBD = mysql_connect("72.167.44.88","ficg28", "Chacarron19#") or die("ERROR: " . mysql_error());
		$selecBD = mysql_select_db("ficg28", $conectarBD) or die("ERROR: " .  mysql_error());
		$consulta = mysql_query("SELECT idPelicula,iSede,sede.nombre as nombreSede, titulo,enlace,isImage,fecha,hora,sinopsis,isOficial FROM pelicula,sede WHERE pelicula.iSede = sede.idSede ORDER BY titulo ASC;");
    	$xml = "<?xml version = '1.0' encoding = 'UTF-8' ?>";	
		$xml .= "<Peliculas>";
		while($row = mysql_fetch_array($consulta)) {
			$xml .="<Pelicula id='" .  utf8_encode($row["idPelicula"]) . "'>";
			$xml .="<iSede>". utf8_encode($row["iSede"]) ."</iSede>";
			$xml .="<nombreSede>". utf8_encode($row["nombreSede"]) ."</nombreSede>";
			$xml .="<titulo>". utf8_encode($row["titulo"]) ."</titulo>";			
			$xml .="<enlace>".utf8_encode( $row["enlace"]) ."</enlace>";
			$xml .="<isImage>" .utf8_encode($row["isImage"])."</isImage>";
			$xml .="<fecha>" .utf8_encode($row["fecha"])."</fecha>";
			$xml .="<hora>" .utf8_encode($row["hora"]). "</hora>";
			$xml .="<sinopsis>" .utf8_encode($row["sinopsis"])."</sinopsis>";
			$xml .="<isOficial>" .utf8_encode($row["isOficial"])."</isOficial>";		
			$xml .="</Pelicula>";		
		}
		$xml .= "</Peliculas>";	
		if(file_exists("Peliculas.xml"))
			unlink("Peliculas.xml");
			$file = fopen('Peliculas.xml','w+') or die("Do not open file");	
			$resultado = fwrite($file, $xml) or die("File peliculas.xml do not write");	
	}

	function eventoXML() {
		$conectarBD = mysql_connect("72.167.44.88","ficg28", "Chacarron19#") or die("ERROR: " . mysql_error());
		$selecBD = mysql_select_db("ficg28", $conectarBD) or die("ERROR: " .  mysql_error());
		$consulta = mysql_query("SELECT idEvento,iSede,sede.nombre as nombreSede, nombre,enlace,isImage,fecha,hora,descripcion FROM evento,sede WHERE evento.iSede = sede.idSede ORDER BY nombre ASC;");
    	$xml = "<?xml version = '1.0' encoding = 'UTF-8' ?>";	
		$xml .= "<Eventos>";
		while($row = mysql_fetch_array($consulta)) {
			$xml .="<Evento id='" .  utf8_encode($row["idEvento"]) . "'>";
			$xml .="<iSede>". utf8_encode($row["iSede"]) ."</iSede>";
			$xml .="<nombreSede>". utf8_encode($row["nombreSede"]) ."</nombreSede>";
			$xml .="<nombre>". utf8_encode($row["nombre"]) ."</nombre>";			
			$xml .="<enlace>".utf8_encode( $row["enlace"]) ."</enlace>";
			$xml .="<isImage>" .utf8_encode($row["isImage"])."</isImage>";
			$xml .="<fecha>" .utf8_encode($row["fecha"])."</fecha>";
			$xml .="<hora>" .utf8_encode($row["hora"]). "</hora>";
			$xml .="<descripcion>" .utf8_encode($row["descripcion"])."</sinopsis>";
			$xml .="<iCatEvento>" .utf8_encode($row["iCatEvento"])."</iCatEvento>";		
			$xml .="</Evento>";		
		}
		$xml .= "</Eventos>";	
		if(file_exists("Eventos.xml"))
			unlink("Eventos.xml");
			$file = fopen('Eventos.xml','w+') or die("Do not open file");	
			$resultado = fwrite($file, $xml) or die("File eventos.xml do not write");	
	}
	
	function sedeXML() {
		$conectarBD = mysql_connect("72.167.44.88","ficg28", "Chacarron19#") or die("ERROR: " . mysql_error());
		$selecBD = mysql_select_db("ficg28", $conectarBD) or die("ERROR: " .  mysql_error());
		$consulta = mysql_query("SELECT * FROM sede ORDER BY nombre ASC");
    	$xml = "<?xml version = '1.0' encoding = 'UTF-8' ?>";	
		$xml .= "<Sedes>";
		while($row = mysql_fetch_array($consulta)) {
			$xml .="<Sede id='" .  utf8_encode($row["idSede"]) . "'>";
			$xml .="<nombre>". utf8_encode($row["nombre"]) ."</nombre>";			
			$xml .="<calle>".utf8_encode( $row["calle"]) ."</calle>";
			$xml .="<colonia>" .utf8_encode($row["colonia"])."</colonia>";
			$xml .="<cPostal>" .utf8_encode($row["cPostal"])."</cPostal>";
			$xml .="<isSede>" .utf8_encode($row["isSede"]). "</isSede>";
			$xml .="<longitud>" .utf8_encode($row["longitud"])."</longitud>";
			$xml .="</Sede>";		
		}
		$xml .= "</Sedes>";	
		if(file_exists("Sedes.xml"))
			unlink("Sedes.xml");
			$file = fopen('Sedes.xml','w+') or die("Do not open file");	
			$resultado = fwrite($file, $xml) or die("File Sedes.xml do not write");	
	}

	function informacionXML() {
		$conectarBD = mysql_connect("72.167.44.88","ficg28", "Chacarron19#") or die("ERROR: " . mysql_error());
		$selecBD = mysql_select_db("ficg28", $conectarBD) or die("ERROR: " .  mysql_error());
		$consulta = mysql_query("SELECT * FROM informacion ORDER BY titulo ASC");
    	$xml = "<?xml version = '1.0' encoding = 'UTF-8' ?>";	
		$xml .= "<Informaciones>";
		while($row = mysql_fetch_array($consulta)) {
			$xml .="<Informacion id='" .  utf8_encode($row["idInformacion"]) . "'>";
			$xml .="<titulo>". utf8_encode($row["titulo"]) ."</titulo>";			
			$xml .="<imagen>".utf8_encode( $row["imagen"]) ."</imagen>";
			$xml .="<detalle>" .utf8_encode($row["detalle"])."</detalle>";
			$xml .="</Informacion>";		
		}
		$xml .= "</Informaciones>";	
		if(file_exists("Informacion.xml"))
			unlink("Informacion.xml");
			$file = fopen('Informacion.xml','w+') or die("Do not open file");	
			$resultado = fwrite($file, $xml) or die("File Informacion.xml do not write");	
	}
}
   	
?>