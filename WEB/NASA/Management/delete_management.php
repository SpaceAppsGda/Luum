<?PHP
extract($_REQUEST);

$ObjUsuario = new Usuario();
$usuarioArray = $ObjUsuario->getUsuario($id);
extract($usuarioArray);

if(isset($updating)) 	
{
	$usuario->deleteUsuario($idUsuario, $alias);	
}

?>