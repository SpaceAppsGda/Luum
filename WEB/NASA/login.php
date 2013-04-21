<?PHP
session_name('usuarios');
session_start();

require_once("PHP_Resources/ClassConeccion.php");
require_once("PHP_Resources/ClassLogin.php");

$ObjConectar = New Conection();
$ObjConectar->conectar();

$objLogin = New Login();

extract($_REQUEST);

if($objLogin->loginIn($usr,$pass)) 
{
	if($objLogin->checkSession())
	 {
		Header("Location: inicio.php");
	}
	else 
	{
		echo "No se creo la sesion.";
	}
}
else
{
	echo utf8_decode("Acceso denegado, verifique usuario y contraseña.");
	echo "<a href=\"index.php\" >Loggin</a>";

}




?>