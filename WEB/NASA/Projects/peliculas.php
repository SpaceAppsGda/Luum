<?PHP
$op = "";
extract($_REQUEST);
$pelicula = new Pelicula();

switch($op)
{
	case 'edit':		
		require_once("Peliculas/edit_pelicula.php");
		break;
	case 'add':
		require_once("Peliculas/add_pelicula.php");
		break;
	case 'delete':
		require_once("Peliculas/delete_pelicula.php");
		break;	
	default:
		require_once("Peliculas/ver_peliculas.php");
	break;
}

?>