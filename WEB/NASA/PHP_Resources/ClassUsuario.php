<?php
Class Usuario
	{
		var $sNombre;
		var $sPass;
		var $iLevel;


	function getUsuario($iIdUsuario) 
		{
		  $sql = "Select * from usuario WHERE idUsuario = $iIdUsuario";
		  $query = mysql_query($sql) or die("ERRROR" . mysql_error());
		  if($query) 
		  {
			$row = mysql_fetch_assoc($query);
			return $row;
		 }
	}  

		Function addUsuario()
		{

			$query =  "INSERT INTO usuario(alias, password, level)VALUES('$this->sNombre', '$this->sPass', '$this->iLevel')";

			try
			{
				if($sql = mysql_query($query))
				{
					echo "Se agrego el usuario a la Base de Datos";
				}
				else
				{
					echo"[ERROR]:".mysql_error();
				}
			}
			catch(Exception $e)
			{
				echo "[ERROR]:".$e->getMessage();
			}
				
		}

		//..............................................................................................................................................
	
		Function updateUsuario($iIdUsuario)
		{

			$query = "UPDATE usuario SET alias = '".$this->sNombre."', password = '".$this->sPass."', level = ".$this->iLevel."  WHERE idUsuario = $iIdUsuario";
				
			try
			{
				if($sql= mysql_query($query))
				{
					echo "Usuario registrado con exito en la base de datos.";
				}
				else
				{
						echo "[ERROR]:".mysql_error();
				}
			}
			catch(Exception $e)
			{
				echo "[ERROR]:".$e->getMessage();
			}
		}

		//..............................................................................................................................................
	

		Function deleteUsuario($iIdUsuario, $usuario)
		{
			$query = "DELETE FROM usuario WHERE idUsuario = $iIdUsuario ";

			try
			{
				if( $sql = mysql_query($query))
				{
					echo "El usuario ".$usuario." fue eliminado ";
				}
				else
				{
					echo "[ERROR]:".mysql_error();
				}
			}
			catch(Exception $e)
			{
				echo  "[ERROR]:".$e->getMessage();
			}

		}

		//..............................................................................................................................................


	}

?>