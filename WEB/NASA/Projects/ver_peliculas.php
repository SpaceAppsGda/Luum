				<div id="Cabecera" style="width:1000px; border:0px solid #333;">

					<h1>Listado de peliculas FICG28</h1>
				
				<table class="" border="1"  cellpadding="3" cellspacing="1" rules="cols" frame="vsides" style="background-color:lightblue";>
					<tr>
						<th width="100">Titulo</th>
						<th width="400">Sinopsis</th>
						<th width="150">Grafico</th>
						<th width="150">Sede</th>
						<th width="150">Fecha</th>
						<th width="150">Hora</th>
						<th width="150">Categoria</th>
						<th width="150">Pelicula-Oficial</th>
					
						<th><a href="?section=peliculas&op=add">Add pelicula</a></th>
						
					</tr>

					
				</table>
				</div>	

				<div id="Cuerpo" style="width:1000px; height:600px; overflow:scroll">

					<table class"">
					<?php

						// Hacer conexion con la BD.
							$conexion =  new Conection(); 
							$conexion->conectar();

				$query = "SELECT idPelicula, isImage,titulo, sinopsis, enlace, sede.nombre AS sede,fecha, hora, cat_pelicula.nombreCategoria AS categoria,
						  (CASE isOficial 
							WHEN 1 THEN 'SI'
							WHEN 0 THEN 'NO' 
							END) AS pelicula_oficial
						  FROM pelicula
						  LEFT JOIN sede ON sede.idSede = pelicula.iSede
						  LEFT JOIN cat_pelicula ON cat_pelicula.idcat_pelicula = cat_pelicula_idcat_pelicula
						  ORDER BY titulo";

				/*$query = "SELECT idPelicula, titulo, isImage, sinopsis, sede.nombre, fecha, hora, isOficial, enlace, categoria,
				(CASE isOficial 
				WHEN 1 THEN 'SI'
				WHEN 0 THEN 'NO' 
				END) as peliculaOficial
				FROM pelicula
				left join sede on sede.idSede = pelicula.iSede 
				ORDER BY titulo"; */

							$sql = mysql_query($query); 

							if($sql)
							{	
								$bandera = 1;

								while($row = mysql_fetch_array($sql))
									{
										if($bandera == 1) 
										{
											$estilo = "fila1";
											$bandera = 0;
										}
										else
										{
											$estilo = "fila2";
											$bandera = 1;
										} 

										extract($row);

										switch($bandera)
										{
										  case 0: 
													if($isImage == 1) 	// si es IMAGEN
													{
					  									echo "
																<tr class=\"$estilo\">
																<td>$titulo</td>
																<td width=\"600\" >$sinopsis</td>
																<td><img src=\"imagenes/peliculas/$enlace\" width=\"150\" height=\"150\"></td>
																<td>$sede</td>
																<td>$fecha</td>  
																<td>$hora</td>
																<td>$categoria</td>
																<td>$pelicula_oficial</td>																									
																<td><a href=\"?section=peliculas&op=edit&id=$idPelicula\">Modificar</a></td>
																<td><a href=\"?section=peliculas&op=delete&id=$idPelicula&updating=true\">Eliminar</a></td>
																</tr>
															";
													}
													else if($isImage == 0)
													//si es VIDEO
										            {
										
													   echo "
															<tr class \"$estilo\">
															<td>$titulo</td>\
															<td width=\"600\">$sinopsis</td>
															<td><a href=\"$enlace\" target=\"_blank\" >".$enlace."</a></td>
															<td>$sede</td>
															<td>$fecha</td>
															<td>$hora</td>
															<td>$categoria</td>
															<td>$pelicula_oficial</td>
															<td><a href=\"?section=peliculas&op=edit&id=$idPelicula\">Modificar</a></td>
															<td><a href=\"?section=peliculas&op=delete&id=$idPelicula&updating=true\">Eliminar</a></td>
															</tr>
														";
												    }		
													
												break;
									
											case 1:

										       if($isImage == 1) 	// si es IMAGEN
													{
					  									echo "
																<tr class=\"$estilo\">
																<td>$titulo</td>
																<td width=\"500\">$sinopsis</td>
																<td><img  src=\"imagenes/peliculas/$enlace\"  width=\"150\" height=\"150\"></td>
																<td>$sede</td>
																<td>$fecha</td>  
																<td>$hora</td>
																<td>$categoria</td>
																<td>$pelicula_oficial</td>																									
																<td><a href=\"?section=peliculas&op=edit&id=$idPelicula\">Modificar</a></td>
																<td><a href=\"?section=peliculas&op=delete&id=$idPelicula&updating=true\">Eliminar</a></td>
																</tr>
															";
													}
													else if($isImage == 0)
													//si es VIDEO
										            {
										
													   echo "
															<tr class \"$estilo\">
															<td>$titulo</td>
															<td width=\"500\">$sinopsis</td>
															<td><a href=\"$enlace\" target=\"_blank\" >".$enlace."</a></td>
															<td>$sede</td>
															<td>$fecha</td>
															<td>$hora</td>
															<td>$categoria</td>
															<td>$pelicula_oficial</td>
															<td><a href=\"?section=peliculas&op=edit&id=$idPelicula\">Modificar</a></td>
															<td><a href=\"?section=peliculas&op=delete&id=$idPelicula&updating=true\">Eliminar</a></td>
															</tr>
														";
												    
												    }		
													
												break;
													
												break;
									    }
										
									}
							}
						 

 					?>

 				</table>
				</div>
				
					