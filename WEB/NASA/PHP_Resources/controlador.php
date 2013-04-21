<?php

$opc = $_POST['opc'];
$task = $_POST['task'];

	switch($opc)
	{
		case 1: //Add

					switch($task)
					{
						case 1: // Pelicula

								require_once("files.class.php");
								require_once("ClassPelicula.php");

								//Instancia de la clase Pelicula.
								$pelicula = new Pelicula();

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
								$pelicula->sCategoria = $_POST['categoria'];

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
									$pelicula->file_imagen = $_POST['imagenPelicula'];
									$pelicula->bIsImage = 1;
									
								}
								else if($pelicula->bIsImage == "video")
								{
									$pelicula->sEnlace = $_POST['enlace'];
									$pelicula->bIsImage = 0;
								}				

								$pelicula->addPelicula();

						break;

						case 2: // Evento

								require_once("files.class.php");
								require_once("ClassEvento.php");

								$evento = new Evento();

								$evento->sNombre = $_POST['nombre'];
								
								$evento->sEnlace = "No hay";
								$evento->bIsImage = $_POST['isImage'];

								$evento->dtFecha = $_POST['fecha'];
								$evento->tHora = $_POST['hora'];
								$evento->iIdSede = $_POST['sede'];
								$evento->sDescripcion = $_POST['descripcion'];
								$evento->iIdCategoria = $_POST['tEvento'];

								if($evento->bIsImage == "imagen")
								{
									//Cargar la imagen y enviarla al servidor
									$evento->file_imagen = $_POST['imagenEvento'];
									$evento->bIsImage = 1;
									
								}
								else if($evento->bIsImage == "video")
								{
									$evento->sEnlace = $_POST['enlace'];
									$evento->bIsImage = 0;
								}

								$evento->addEvento();



								//Creamos el objeto.

						break;

						case 3: // Sede

								require_once("ClassSede.php");

								$sede = new Sede();

								$sede->sNombre = $_POST['nombre'];
								$sede->sCalle = $_POST['calle'];
								$sede->sNumero = $_POST['numero'];
								$sede->sColonia= $_POST['colonia'];
								$sede->sCP = $_POST['cPostal'];
								$sede->dLongitud = $_POST['longitud']; 
								$sede->dLatitud = $_POST['latitud'];

								if (isset($_POST['punto_interes'])) 
								{
    								$sede->bIsSede = 1;
    									//echo "checked!";
								}
								else
								{ // Punto de interes
									$sede->bIsSede = 0;
								}

								$sede->addSede();



						break;

						case 4: // Informacion

								require_once("Class.php");

								$info = new Informacion();

								$info->
								$info->
								$info->







						break;

						case 5: // categoria de evento

								require_once("files.class.php");
								require_once("ClassTipoEvento.php");

								$categoria = new TipoEvento();

								$categoria->sNombre = $_POST['nombre'];
								$categoria->sImagen = $_POST['imagenEvento'];

								$categoria->addTipoEvento();


						break;

						case 6: // Agregar usuario


								$usuario = new Usuario();

								$usuario->sNombre = $_POST['usr'];
								$usuario->sPass = $_POST['pass'];
								$usuario->iLevel = $_POST['tipo_usr'];	

								$usuario->addUsuario();

					}


				break;
		// ...............................................................................		


		case 2: //Update

				break;

		// ...............................................................................
		


		case 3: //Delete

		// ...............................................................................
				break;
		

	}

?>