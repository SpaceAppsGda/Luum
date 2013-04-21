
	/*function  task_conection(url, parametros)
	{
		$.post(url,parametros,function(data) 
		{
			if(data == "1")	
			{ 
				alert("Operacion realizada correctamente.");
				//Una vez confirmado el exito de la operacion limpiamos los campos de texto.	
				$("input[type=text],input[type=password],textarea").attr("value","")
         	}
         	else 
         	{ 
         		alert("Algo anda mal: # " + data);
     		}
     	})

	} */

// ..........................................................................................................
 
 function changeEvent(evento)
  {
    	document.getElementById("isImage").value = evento;
		
		if(evento == "video") {
			$('#enlace').show();
			$('#imagenEvento').hide();
		}
		else {
			$('#enlace').hide();
			$('#imagenEvento').show();
		}

	}

// ..........................................................................................................

 	function isAlfanumerico(valor)
	{
		var estatus = (/^[a-zA-Z0-9 áéíóúAÉÍÓÚÑñ]+$/.test(valor))? true : false;
		return estatus;
	}

// ..........................................................................................................

	 function isDate(valor)
	{
		 var estatus =  (/^\d{4}-(0?[1-9]|1[012])-(3[01]|0?[1-9]|[12]\d)$/.test(valor))? true : false;
		 return estatus;	
	}

// ..........................................................................................................
	
	 function isUrl(valor)
	{
		var estatus = (/^www\.\w+\.[a-zA-Z]{2,4}(\/?\w+)*$/.test(valor))? true : false;
		return estatus;		
	}

//..........................................................................................................
	function isVacio(valor)
	{
		var estatus = false;
		
		if(valor.length == 0)
		{
			estatus = true;

		}
	return estatus;

	}

// ..........................................................................................................

function Usuario(task)
{

	switch(task)
	{
		case '1': 

					// Obtenemos los datos de los campos de texto
		usuario = document.add_usuario.usr.value;
		password = document.add_usuario.pass.value;

		if(isVacio(usuario) || !isAlfanumerico(usuario)){
					alert("El nombre de usuario esta vacio o contiene caracteres no validos.");
					document.add_usuario.usr.focus();
					return;
				}
		if(isVacio(password)){
					alert("La contraseña no puede ser un campo vacío.");
					document.add_usuario.pass.focus();
					return;
				}

				document.add_usuario.submit();

		break;

//.........................................................................................
		case '2':

					// Obtenemos los datos de los campos de texto
		usuario = document.edit_usuario.usr.value;
		password = document.edit_usuario.pass.value;

		if(isVacio(usuario) || !isAlfanumerico(usuario))
    {
					alert("El nombre de usuario no puede ser un campo vacío");
					document.edit_usuario.usr.focus();
					return;
				}
		if(isVacio(password)){
					alert("La contraseña no puede ser un campo vacío.");
					document.edit_usuario.pass.focus();
					return;
				}

			document.edit_usuario.submit();
		 break;
	}
		
				//Realizamos la tarea requerida una vez validado que los campos no sean vacio.
}
	
// ..........................................................................................................


function pelicula(task)
{          
	switch(task)
	{
		case '1': // Add
					
				// Obtenemos el valor de cada campo
			  	titulo = document.add_pelicula.titulo.value;
				  sinopsis = document.add_pelicula.sinopsis.value;
				  idSede = document.add_pelicula.sede.selectedIndex;
	  			sede =  document.add_pelicula.sede.options[idSede].value
	  			fecha = document.add_pelicula.fecha.value;
	  			hora = document.add_pelicula.hora.value;	
      		oficial = (document.add_pelicula.oficial.checked) ? 0 : 1;	
      		categoria = document.add_pelicula.categoria.value;    					
      		grafico = document.add_pelicula.isImage.value;
          enlace =  document.add_pelicula.enlace.value;
      				
      		//  Hacemos las validaciones a cada campo	
          if( isVacio(titulo))
     				 { 
      					alert("El titulo capturado esta vacio o contiene caracteres no validos.");
      					document.add_pelicula.titulo.focus(); 
      					return; 
      			 }

          if(isVacio(sinopsis))
            {
              alert("La sinopsis capturado es vacio o contiene caracateres no validos.");
              document.add_pelicula.sinopsis.focus();
              return; 
            }

          if( sinopsis.length > 2000)
            {
              alert("La sinopsis excede los 2000 caracteres permitidos.");
              document.add_pelicula.sinopsis.focus();
              return; 
            }   

      		if(isVacio(fecha) || !isDate(fecha) )
      			{
      				alert("La fecha capturada es vacio o contiene caracateres no validos.");
       				document.add_pelicula.fecha.focus(); 
       				return; 
      			}

      			if(isVacio(hora))
      			{
      	 			alert("La hora capturado es vacio o contiene caracateres no validos.");
      	 			document.add_pelicula.hora.focus(); 
      	 			return; 
      	    }

      	     if(grafico == "imagen")
                 {
      						if(isVacio(document.add_pelicula.imagenEvento.value))
      						 {
      						  	alert("Debe cargar una imagen.");
      							  document.add_pelicula.imagen.focus(); 
      							  return;
      					  	}
      				   }
      				
              if(grafico == "video")
              {
      					if( isVacio(document.add_pelicula.enlace.value))
      						{
      							alert("No hay una URL de YouTube para direccionar a un video.");
      							document.add_pelicula.enlace.focus(); 
      							return;
      						}
      				}

      	        document.add_pelicula.submit();
		break;

		//------------------------------
		case '3': //Update

				  titulo = document.edit_pelicula.titulo.value;
				  sinopsis = document.edit_pelicula.sinopsis.value;
				  idSede = document.edit_pelicula.sede.selectedIndex;
	  			sede =  document.edit_pelicula.sede.options[idSede].value
	  			fecha = document.edit_pelicula.fecha.value;
	  			hora = document.edit_pelicula.hora.value;	
      			
          //oficial = (document.add_pelicula.oficial.checked) ? 0 : 1;	
      			
      		//  Hacemos las validaciones a cada campo
      				if(isVacio(titulo))
     				 { 
      					alert("El titulo capturado esta vacio o contiene caracteres no validos.");
      					document.edit_pelicula.titulo.focus(); 
      					return; 
      				}

            if(isVacio(sinopsis))
            {
              alert("La sinopsis capturado es vacio o contiene caracateres no validos.");
              document.edit_pelicula.sinopsis.focus();
              return; 
            }  

              if( sinopsis.length > 2000)
            {
              alert("La sinopsis excede los 2000 caracteres permitidos.");
              document.add_pelicula.sinopsis.focus();
              return; 
            }  

      			if(isVacio(fecha) || !isDate(fecha) )
      			{
      				alert("La fecha capturada es vacio o contiene caracateres no validos.");
       				document.edit_pelicula.fecha.focus(); 
       				return; 
      			}

      			if(isVacio(hora))
      			{
      	 			alert("La hora capturado es vacio o contiene caracateres no validos.");
      	 			document.edit_pelicula.hora.focus(); 
      	 			return; 
      	        }

      	        document.edit_pelicula.submit();	
		break;
		//------------------------------
	}
}

// ..........................................................................................................

function tipo_evento(task)
{
	switch(task)
	{
		case '1': // Add
	
 				nombre =  document.add_tEvento.nombre.value;
 				imagen = document.add_tEvento.enlace.value;

 				if(isVacio(nombre) || !isAlfanumerico(nombre))
 					{
 						alert("El campo nombre esta vacio o contiene caracteres no validos.")
 	 					document.add_tEvento.nombre.focus();
 	 					return;
 					}

					if(isVacio(imagen))
 					{
 						alert("El campo URL de imagen esta vacio o contiene caracteres no validos.")
 	 					document.add_tEvento.enlace.focus();
 	 					return;
 					}

 				//parametros = "&nombre="+nombre + "&enlace="+ enlace + "&opc=1" + "&task=5";
    			//url = "../PHP_Resources/ToDo.php"; 

    			//task_conection(url, parametros);

    			document.add_tEvento.submit();

		break;
	  //------------------------
		
	}
}


// ..........................................................................................................

function evento(task)
{
	switch(task)
	{
		case '1': // Add

					idSede = document.add_evento.sede.selectedIndex;
	  				sede = document.add_evento.sede.options[idSede].value;

					nombre = document.add_evento.nombre.value;
					descripcion = document.add_evento.descripcion.value;
					fecha =  document.add_evento.fecha.value;
					hora = document.add_evento.hora.value;
					grafico =  document.add_evento.grafico.value;
					enlace =  document.add_evento.enlace.value;

					grafico = document.add_evento.isImage.value;

					if(isVacio(nombre))
 					{
 						alert("El campo nombre esta vacio o contiene caracteres no validos.")
 	 					document.add_evento.nombre.focus();
 	 					return;
 					}


          if(isVacio(descripcion))
          {
            alert("La descripcion esta vacio o contiene caracteres no validos.")
            document.add_evento.descripcion.focus();
            return;
          }

           if( descripcion.length > 2000)
          {
              alert("La sinopsis excede los 2000 caracteres permitidos.");
              document.add_pelicula.sinopsis.focus();
              return; 
          }   

 					if(!isDate(fecha) || isVacio(fecha))
 					{
 						alert("La fecha esta vacio o contiene caracteres no validos.")
 	 					document.add_evento.fecha.focus();
 	 					return;
 					}

 					if(isVacio(hora))
 					{
 						alert("La hora esta vacio o contiene caracteres no validos.")
 	 					document.add_evento.hora.focus();
 	 					return;
 					}


 					if(grafico == "imagen")
 					{
      						if( isVacio(document.add_evento.imagenEvento.value))
      						{
      							alert("Debe cargar una imagen.");
      							document.add_evento.imagen.focus(); 
      							return;
      						}
      		}
      		else if(grafico == "video")
          {
      					if( isVacio(document.add_evento.enlace.value))
      						{
      							alert("No hay una direccion de enlace para el video.");
      							document.add_evento.enlace.focus(); 
      							return;
      						}
      		}	
 			
 					document.add_evento.submit();

		break;
		
		case '2': // Update

           nombre = document.edit_evento.nombre.value;
					 descripcion = document.edit_evento.descripcion.value;
					 fecha =  document.edit_evento.fecha.value;
					 hora = document.edit_evento.hora.value;
					
					if(isVacio(nombre))
 					{
 						alert("El campo nombre esta vacio o contiene caracteres no validos.")
 	 					document.edit_evento.nombre.focus();
 	 					return;
 					}

          if(isVacio(descripcion))
          {
            alert("La descripcion esta vacio o contiene caracteres no validos.")
            document.edit_evento.descripcion.focus();
            return;
          }

          if( descripcion.length > 2000)
            {
              alert("La sinopsis excede los 2000 caracteres permitidos.");
              document.edit_evento.descripcion.focus();
              return; 
            }  


 					if(!isDate(fecha) || isVacio(fecha))
 					{
 						alert("La fecha esta vacio o contiene caracteres no validos.")
 	 					document.edit_evento.fecha.focus();
 	 					return;
 					}

 					if(isVacio(hora))
 					{
 						alert("La hora esta vacio o contiene caracteres no validos.")
 	 					document.edit_evento.hora.focus();
 	 					return;
 					}

 					document.edit_evento.submit();
 			
		break;
	
	}
}

// ..........................................................................................................

function sede(task)
{
	switch(task)
	{
		case '1': // Add

				nombre = document.add_sede.nombre.value;
				calle = document.add_sede.calle.value;
				numero = document.add_sede.numero.value;
				colonia = document.add_sede.colonia.value;
				cPostal = document.add_sede.cPostal.value;
				latitud = document.add_sede.latitud.value;
				longitud = document.add_sede.longitud.value;


					if( isVacio(nombre))
     				 { 
      					alert("El nombre capturado esta vacio o contiene caracateres no validos.");
      					document.add_sede.nombre.focus(); 
      					return; 
      				}	

    				 if( isVacio(calle))
     				 { 
      					alert("El calle capturado esta vacio o contiene caracateres no validos.");
      					document.add_sede.calle.focus(); 
      					return; 
      				}

      				if( isVacio(numero))
     				 { 
      					alert("El nombre capturado esta vacio o contiene caracateres no validos.");
      					document.add_sede.numero.focus(); 
      					return; 
      				}
      				if( isVacio(colonia))
     				 { 
      					alert("El colonia capturado esta vacio o contiene caracateres no validos.");
      					document.add_sede.colonia.focus(); 
      					return; 
      				}
      				if( isVacio(cPostal) || !isAlfanumerico(nombre))
     				 { 
      					alert("El cPostal capturado esta vacio o contiene caracateres no validos.");
      					document.add_sede.cPostal.focus(); 
      					return; 
      				}
      				
      				if( isVacio(latitud))
     				 { 
      					alert("El nombre capturado esta vacio o contiene caracateres no validos.");
      					document.add_sede.nombre.focus(); 
      					return; 
      				}
      				if( isVacio(longitud))
     				 { 
      					alert("El nombre capturado esta vacio o contiene caracateres no validos.");
      					document.add_sede.nombre.focus(); 
      					return; 
      				}

      				 

      	    	     //parametros = "&nombre="+nombre + "&calle=" + calle +"&numero=" + numero + "&colonia=" + colonia + "&cPostal=" +cPostal + "&latitud="+latitud + "&longitud="+longitud + "&punto_interes="+punto_interes + "&opc=1" + "&task=3";
     				 //url = "../PHP_Resources/ToDo.php"; 

     				 document.add_sede.submit();

     				 //task_conection(url, parametros);
		break;
		case '2': // edit
				nombre = document.edit_sede.nombre.value;
				calle = document.edit_sede.calle.value;
				numero = document.edit_sede.numero.value;
				colonia = document.edit_sede.colonia.value;
				cPostal = document.edit_sede.cPostal.value;
				latitud = document.edit_sede.latitud.value;
				longitud = document.edit_sede.longitud.value;


					if( isVacio(nombre))
     				 { 
      					alert("El nombre capturado esta vacio o contiene caracateres no validos.");
      					document.edit_sede.nombre.focus(); 
      					return; 
      				}	

    				 if( isVacio(calle))
     				 { 
      					alert("El calle capturado esta vacio o contiene caracateres no validos.");
      					document.edit_sede.calle.focus(); 
      					return; 
      				}

      				if( isVacio(numero))
     				 { 
      					alert("El nombre capturado esta vacio o contiene caracateres no validos.");
      					document.edit_sede.numero.focus(); 
      					return; 
      				}
      				if( isVacio(colonia))
     				 { 
      					alert("El colonia capturado esta vacio o contiene caracateres no validos.");
      					document.edit_sede.colonia.focus(); 
      					return; 
      				}
      				if( isVacio(cPostal))
     				 { 
      					alert("El cPostal capturado esta vacio o contiene caracateres no validos.");
      					document.edit_sede.cPostal.focus(); 
      					return; 
      				}
      				
      				if( isVacio(latitud))
     				 { 
      					alert("El nombre capturado esta vacio o contiene caracateres no validos.");
      					document.edit_sede.nombre.focus(); 
      					return; 
      				}
      				if( isVacio(longitud))
     				 { 
      					alert("El nombre capturado esta vacio o contiene caracateres no validos.");
      					document.edit_sede.nombre.focus(); 
      					return; 
      				}

      				

      	    	     //parametros = "&nombre="+nombre + "&calle=" + calle +"&numero=" + numero + "&colonia=" + colonia + "&cPostal=" +cPostal + "&latitud="+latitud + "&longitud="+longitud + "&punto_interes="+punto_interes + "&opc=1" + "&task=3";
     				 //url = "../PHP_Resources/ToDo.php"; 

     				 document.edit_sede.submit();

     				 //task_conection(url, parametros);
		break;
		case '3': // Modificar 
		break;
	}
}

// ..........................................................................................................

function informacion(task)
{

	switch(task)
	{

		case '1':
					var titulo = document.add_informacion.titulo.value;
	var detalle = document.add_informacion.detalle_informacion.value;
	var enlace = document.add_informacion.img_informacion.value;


	if(isVacio(titulo))
	{
		alert("El campo titulo esta vacio.");
		document.add_informacion.titulo.focus();
		return;
	}

	if(isVacio(detalle))
	{
		alert("El campo detalle esta vacio.");
		document.add_informacion.detalle_informacion.focus();
		return;
	}

	if(isVacio(enlace))
	{
		alert("El campo enlace esta vacio.");
		document.add_informacion.img_informacion.focus();
		return;
	}



	document.add_informacion.submit();

		break;
		
		case '2':

	var titulo = document.edit_informacion.titulo.value;
	var detalle = document.edit_informacion.descripcion.value;

	if(isVacio(titulo))
	{
		alert("El campo titulo esta vacio.");
		document.edit_informacion.titulo.focus();
		return;
	}

  if(isVacio(detalle))
  {
    alert("El campo detalle esta vacio.");
    document.edit_informacion.detalle_informacion.focus();
    return;
  }

  if( detalle.length > 2000)
  {
    alert("La sinopsis excede los 2000 caracteres permitidos.");
    document.add_pelicula.sinopsis.focus();
    return; 
  }  

  	document.edit_informacion.submit();
		break;

	}

	

}


// ..........................................................................................................


	




