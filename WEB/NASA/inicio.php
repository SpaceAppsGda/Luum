<?php
//session_name('usuarios');
//session_start();
require_once("PHP_Resources/ClassLogin.php");

//$objSession = New Login();
//if($objSession->checkSession()) 
//{

require_once("PHP_Resources/ClassConeccion.php");
require_once("PHP_Resources/ClassUsuario.php");
require_once("PHP_Resources/ClassPelicula.php");
require_once("PHP_Resources/files.class.php");
require_once("PHP_Resources/ClassEvento.php");
require_once("PHP_Resources/ClassSede.php");
require_once("PHP_Resources/ClassInformacion.php");
require_once("PHP_Resources/ClassXML.php");

echo "Welcome" . $_SESSION['usuario'];
//}
//else
//{
//	header("Location: index.php");
//}

//Object connection

//		$conectarBD = mysql_connect("luum.criptotartaro.com", "cryptotta_luum", "luum00@@") or die("ERROR: " . mysql_error());
//		$selecBD = mysql_select_db("cryptotta_luum", $conectarBD) or die("ERROR: " .  mysql_error());

?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
			<script type="text/javascript" src="Js_Resources/js_jQuery_v183.js"></script>
			<script type="text/javascript" src="Js_Resources/js_validations.js"></script>
		</head>
		<body>

		<div id="menu">
			<ul>
				<li>
					<a a href="?section=persons.php">Persons</a>
				</li>	
				<li>
					<a  href="?section=projects.php">Projects</a>
 				</li>
				<li>
					<a href="?section=records.php">Records</a>
				</li>  
				<li>
					<a href="?section=management">Management</a>
				</li>
				<li>
					<a href="?section=salir">Exit</a>
				</li>

		   </ul> 
		</div>
		<div id="bloque" style="width:1000px; margin-left:0 auto 0 auto;height:600px; " >

		<?php
			$section = "";
			extract($_GET);
			switch ($section) 
			{
				case 'persons':
								require_once("Persons/person.php");
								break;

				case 'projects':
								require_once("Project/projects.php");
					            break;

				case 'records':

								require_once("Records/records.php");
					            break;

				case 'management':

								require_once("Management/management.php");	
					            break;

				case 'exit': 
								$objSession->destroySession();
								break;				
						
				default:
								echo "Welcome Citizen  LUUM";
					break;
			}
		?>
	</div>
		</body>
	</html>


