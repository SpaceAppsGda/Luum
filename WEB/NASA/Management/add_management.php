<?php
if(isset($uploading)) 
{
	$usuario = new Usuario();
	$usuario->sNombre = $_POST['usr'];
	$usuario->sPass = $_POST['pass'];
	$usuario->iLevel = $_POST['tipo_usr'];	
	$usuario->addUsuario();
}
?>
			<form name="add_usuario"  id="add_usuario" class="texto" method="POST" action="?section=usuarios&op=add&uploading=true"  enctype="multipart/form-data">
				<fieldset>
					<legend>Add Management</legend>
					<table>
						<tr>
							<td>Usure:</td>
							<td><input type="text" id="usr" name="usr"  maxlength="15" size="30" />   </td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" id="pass" name="pass" maxlength="6" size="30" /></td>
						</tr>
						</tr>
							<td>Tipo de usuario:</td>
							<td>
								<select id="tipo_usr" name="tipo_usr" >
									<option value="1" >Administrador</option>
									<option value="0" >Capturista</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="button" onclick="Usuario('1')" value="Guardar" />
								<input type="button" onclick="history.back()" value="Cancelar" />
							</td>
							
						</tr>	
					</table>
				</fieldset>

			</form>
