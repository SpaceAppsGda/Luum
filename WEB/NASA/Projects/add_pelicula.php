<?php
if(isset($uploading)) 
{

								$pelicula->iIdSede = $_POST['sede'];
								$pelicula->sTitulo = $_POST['titulo'];	
								
								// Si es imagen, el enlace es vacio.
								// Si es video se asignara directamente la URL del video.
								$pelicula->sEnlace = "no hay enlace."; 
								$pelicula->file_imagen = "no hay imagen.";

								// es imagen = 1, es video = 0	
								$pelicula->bIsImage = $_POST['isImage'];
								$pelicula->dtFecha = $_POST['fecha'];
								$pelicula->tHora = $_POST['hora'];				
								$pelicula->sSinopsis = $_POST['sinopsis'];
								$pelicula->sNomCategoria = $_POST['categoria']; 
								$pelicula->iCategoria = $_POST['categoria'];

								if (isset($_POST['oficial'])) 
								{
    								$pelicula->bIsOficial = 1;
    									//echo "checked!";
								}
								else
								{
								$pelicula->bIsOficial = 0;
								}		
						
								if($pelicula->bIsImage == "imagen")
								{
									//Cargar la imagen y enviarla al servidor
									$pelicula->bIsImage = 1;
									
								}
								else if($pelicula->bIsImage == "video")
								{
									$pelicula->sEnlace = $_POST['enlace'];
									$pelicula->bIsImage = 0;
								}				

								$pelicula->addPelicula();
}
?>
			<form  class="texto" method="POST" action="?section=peliculas&op=add&uploading=true" name="add_pelicula" enctype="multipart/form-data">
				<fieldset>
					<legend>AGREGAR PELICULA</legend>
					<table>
						<tr>
							<td>Titulo:</td>
							<td><input type="text" id="titulo" name="titulo" size="100" maxlength="100" /></td>
						<tr>
						<tr>
							<td>Sinopsis:</td>
							<td><textarea id="sinopsis" name="sinopsis" cols="60" rows="15"></textarea></td>
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
							<td><input type="text" placeholder="hh:mm:ss" id="hora" name="hora" maxlength="8" size="8"/></td>
						</tr>
						<tr>
							<td>Oficial:</td>
							<td><input type="checkbox" value="1" id="oficial" name="oficial" /></td>
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
						<tr>
							<td>Grafico:</td>
							<td>
								<input type="radio" id="grafico" name = "grafico" value = "1" onClick="changeEvent('imagen')" checked = "checked" /> Imagen
							    <input type="radio" id="grafico" name = "grafico" value = "0" onClick="changeEvent('video')"  /> Video
							    <input type="hidden" name="isImage" id="isImage" value="imagen">
							</td>
						</tr>

						<tr>
							<td>Enlace:</td>

							<td>
								<input  type="file" name="imagenEvento" id="imagenEvento">
								<input  style="display:none" type="text" placeholder="http://youtube.com/video" id="enlace" name="enlace" size="100" maxlenght="100">
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type="button" onclick="pelicula('1')" value="Guardar" /><input type="button" onclick="history.back()" value="Cancelar" /></td>
							
							 
						</tr>
						
					</table>
				</fieldset>
			</form>
		