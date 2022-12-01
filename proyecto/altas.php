<?php
$servername = "localhost";
$database = "articulos";
$username = "root";
$password = "";
// Create connection
$link = mysqli_connect($servername, $username, $password);
mysqli_select_db($link, $database);
//$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$link) {
      die("Connection failed: " . mysqli_connect_error());
}
 
//echo "Connected successfully";
			$codigo  = $_POST["codigo"];
			$nombre  = $_POST["nombre"];
			$categorias  = $_POST["categorias"];
			$precio  = $_POST["precio"];
			$cantidad  = $_POST["cantidad"];
			
	// echo 'codigo ', $codigo, 'nombre ', $nombre,  'categorias ', $categorias,'precio ', $precio, 'cantidad ', $cantidad, 'datos formulario1';
	
	$result = mysqli_query($link, "SELECT * FROM articulos WHERE codigo= $codigo");
	if (mysqli_data_seek ($result, 0)){
	
		$extraido= mysqli_fetch_array($result);
		//echo "ya existe ";
		print "<SCRIPT LANGUAGE=\"JavaScript\">
					alert('El codigo ya existe o fue registrado con anterioridad favor de verificar');
					window.location='javascript:window.history.back()';
					</script>";
		}
	else{
		$sql = "INSERT INTO articulos (codigo, nombre, categorias, precio, cantidad) VALUES ($codigo, '$nombre', $precio, '$categorias', $cantidad)";

		if (mysqli_query($link, $sql)) {
      			//echo "dato guardado con exito";
      			print "<SCRIPT LANGUAGE=\"JavaScript\">
					alert('datos guardados con exito');
					window.location=\"formulario1.html#.reset()\";
					</script>";
		} else {
    			echo "Error estoy en error: " . $sql . "<br>" . mysqli_error($link);
		}
	}	
	
mysqli_free_result($result);
 
mysqli_close($link);
 
 		
?>	
	
 		 
