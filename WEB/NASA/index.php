<html>
	<head>
		<script type="text/javascript" src="Js_Resources/js_jQuery_v183.js"></script>
		<script type="text/javascript" src="Js_Resources/js_validations.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
		
    </head>
		<body>	
		    <form class="texto" method="POST" action="login.php">
		        <table>
		            <tr>
		                <td>
		                    <strong>User:</strong>
		                </td>
		                <td>
		                    <input type="text" id="usr" name="usr" size="30" maxlength="15" />
		                </td>
		            </tr>
		            <tr>
		            	<td>
		            		<strong>Password:</strong>
		            	</td>
		            	<td>
		            		<input type="password" id="pass" name="pass"  size="30" maxlength="6"/>
		            	</td>
		            </tr>
		            <tr>
		            	<td>          		
		            	</td>
		            	<td>
		            		<input type="submit" value="Send" />
		            	</td>
		            </tr>
		            <tr>
		            	<td></td>
		            	<td><a href="project.php" target="_blank">New user</a></td>
		            </tr>
		        </table>
		    </form>
		</body>
</html>