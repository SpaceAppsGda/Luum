<?php
extract($_REQUEST);

$ObjPelicula = New Pelicula();
$peliculaArray = $ObjPelicula->getPelicula($id);
extract($peliculaArray);

if(isset($updating)) 	
{					
	$pelicula->iIdSede = $_POST['sede'];
	$pelicula->sTitulo = $_POST['titulo'];	
	$pelicula->sEnlace = $enlace;
	$pelicula->bIsImage = $isImage;
	$pelicula->dtFecha = $_POST['fecha'];
	$pelicula->tHora = $_POST['hora'];				
	$pelicula->sSinopsis = $_POST['sinopsis'];
	$pelicula->iCategoria = $_POST['categoria'];
	$pelicula->bIsOficial = $isOficial;
	$pelicula->sNomCategoria = $_POST['categoria'];

	$pelicula->updatePelicula($idPelicula);
}

?>
			<form  class="texto" method="POST" action="?section=peliculas&op=edit&updating=true&id=<?PHP echo $idPelicula; ?>" id="edit_pelicula" name="edit_pelicula" enctype="multipart/form-data">
				<fieldset>
					<legend>MODIFICAR PELICULA</legend>
					<table>
						<tr>
							<td>Titulo:</td>
							<td><input type="text" id="titulo" name="titulo" size="100" maxlength="45" value="<?PHP echo $titulo; ?>"/></td>
						<tr>
						<tr>
							<td>Sinopsis:</td>
							<td><textarea id="sinopsis" name="sinopsis" cols="60" rows="15"><?PHP echo $sinopsis; ?></textarea></td>
						</tr>
							<td>Sede:</td>
							<td>
								<select id="sede" name="sede">
									 	<?php
										$sql = mysql_query("SELECT idSede, nombre FROM sede ORDER BY nombre");	
    									while($row = mysql_fetch_assoc($sql))
    									{
    										echo "<option value =".$row["idSede"].">".$row["nombre"]."</option>";
    									}
   										?>
								</select>
							</td>
						</tr>

						<tr>
							<td>Fecha:</td>
							<td>
								<select id="fecha" name="fecha">
									<option value="2013-03-01">01/Marzo/2013</option>
									<option value="2013-03-02">02/Marzo/2013</option>
									<option value="2013-03-03">03/Marzo/2013</option>
									<option value="2013-03-04">04/Marzo/2013</option>
									<option value="2013-03-05">05/Marzo/2013</option>
									<option value="2013-03-06">06/Marzo/2013</option>
									<option value="2013-03-07">07/Marzo/2013</option>
									<option value="2013-03-08">08/Marzo/2013</option>
									<option value="2013-03-09">09/Marzo/2013</option>
								</select>	
							</td>
						</tr>
						<tr>
							<td>Hora:</td>
							<td><input type="text" placeholder="hh:mm:ss" id="hora" name="hora" maxlenght="8" size="8"  value="<?PHP  echo $hora; ?>" /></td>
						</tr>
						
						<tr>
							<td>Categoria:</td>
							<td>
									<select id="categoria" name="categoria">
									 	<?php
										$sql = mysql_query("SELECT idcat_pelicula, nombreCategoria FROM cat_pelicula ORDER BY nombreCategoria");	
    									while($row = mysql_fetch_assoc($sql))
    									{
    										echo "<option value =".$row["idcat_pelicula"].">".$row["nombreCategoria"]."</option>";
    									}
   										?>		
								    </select>
							</td>
						</tr>
						<tr></tr>
						<tr>
							<td></td>
							<td><input type="button" onclick="pelicula('3')" value="Guardar" /><input type="button" onclick="history.back()" value="Cancelar" /></td>
							 <input type="hidden" name="idPelicula" value="<?PHP echo $idPelicula; ?>">
							
						</tr>
						
					</table>
				</fieldset>
			</form>
		