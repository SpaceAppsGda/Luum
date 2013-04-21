			<div id="Cabecera" style="width:1000px; border:0px solid #333;">
				<h1>Lista de usuarios FICG28</h1>
				<table class="" border="1"  cellpadding="3" cellspacing="1" rules="cols" frame="vsides" style="background-color:lightblue";>
					<tr>
						<th width="500" height="50">Usuario</th>
						<th width="120" height="50">Tipo usuario</th>
						
						
						<td width="120" ><a href="?section=usuarios&op=add">Add usuario</a></td>
					</tr>
				</table>
			</div>
			
			<div id="Cuerpo" style="width:1000px; height:600px; overflow:scroll">
				<table>
				<?php

						// Hacer conexion con la BD.
							$conexion =  new Conection(); 
							$conexion->conectar();

							$query = "SELECT idUsuario, alias, level, 
									  (CASE level
									   WHEN 1 THEN 'Administrador'
									   WHEN 0 THEN 'Capturista'
									   END) as tipo  
							          FROM usuario ORDER BY alias";
							

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
										
										switch ($bandera) 
											{
												case 0:
														echo "
															   <tr class=\"$estilo\">
															   <td height=\"50\"  width=\"500\" >$alias</td>
															   <td height=\"50\" width=\"120\">$tipo</td>
											
															  <td height=\"50\"  ><a href=\"?section=usuarios&op=edit&id=$idUsuario\">Modificar</a></td>
															  <td height=\"50\" ><a href=\"?section=usuarios&op=delete&id=$idUsuario&updating=true\">Eliminar</a></td>
															  </tr>
															";	
												
												break;
											
												case 1:

														echo "
														<tr class=\"$estilo\">
														<td height=\"50\"  width=\"500\" >$alias</td>
														<td height=\"50\"  width=\"120\">$tipo</td>
											
														<td><a href=\"?section=usuarios&op=edit&id=$idUsuario\">Modificar</a></td>
														<td><a href=\"?section=usuarios&op=delete&id=$idUsuario&updating=true\">Eliminar</a></td>
														</tr>
											";	
												
												break;
										}


										
									}
							}


 					?>

 				</table>

			</div>
					