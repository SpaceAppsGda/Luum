<?PHP
$op = "";
extract($_REQUEST);
$usuario = new Usuario();

switch($op) 
{
	case 'edit':		
		require_once("Usuarios/edit_usuario.php");
		break;

	case 'add':
		require_once("Usuarios/add_usuarios.php");
		break;

	case 'delete':
		require_once("Usuarios/delete_usuario.php");
		break;
			
	default:
		require_once("Usuarios/see_usuarios.php");
	break;
}

?>