<?php
Class Conection
{
	var $conectarBD;
	var $selecBD;

	//Connecting and selecting a Database
	Function conectar()
	{
	
		$conectarBD = mysql_connect("luum.criptotartaro.com", "cryptotta_luum", "luum00@@") or die("ERROR: " . mysql_error());
		$selecBD = mysql_select_db("cryptotta_luum", $conectarBD) or die("ERROR: " .  mysql_error());
		
	}

}	
?>