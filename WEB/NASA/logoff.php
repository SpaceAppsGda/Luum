<?PHP
session_name('usuarios');
session_start();
require_once("PHP_Resources/ClassLogin.php");
$objLogin = New Login();
$objLogin->destroySession();

?>