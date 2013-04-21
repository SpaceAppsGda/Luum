<?PHP
Class Login {


	function constructor()
	{
		echo "constructor";
	}

	function loginIn($user,$pass) {
		$pass = md5($pass);
		$sql = "SELECT * FROM usuario WHERE alias = '$user' AND password = '$pass' LIMIT 1";
		$query = mysql_query($sql) or die("Error: " . mysql_error());
		if($query) 
		{
			if(mysql_num_rows($query)==1)
			 {
				$row = mysql_fetch_assoc($query);
				extract($row);
				$_SESSION['activa'] = TRUE;
				$_SESSION['usuario'] = $alias;
				return TRUE;
			}
		}
	}

	function checkSession() {
		if(isset($_SESSION['activa']) && isset($_SESSION['usuario'])) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	function destroySession() 
	{
		session_name('usuarios');
		session_start();
		$_SESSION = NULL;
		session_destroy();
		echo "<script>document.location.href='index.php'</script>";
		//header("Location:index.php");
	}
}


?>