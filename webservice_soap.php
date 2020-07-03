<?php

	require_once("lib/nusoap.php");

	$username = "u210646419_sam";
	$password = "sam123456";
	$hostname = "mysql.nixiweb.com";

	$server = new soap_server();

	function muestraUsuarios(){

		$resultado = mysql_query("SELECT * FROM usuarios");

		while ($row = mysql_fetch_array($resultado)){

			$all[] = $row;
		}

		return $all;
	}

	function muestraPlanetas(){

		$planetas = "Son los planetas ....";

		return $planetas;
	}

	function muestraImagen($categoria){

		if ($categoria == 'espacio'){

			$imagen = 'CC3000.jpg';
		}else{
			$imagen = 'CC3000.jpg';
		}

		$resultado = '<img src="img/'.$imagen.'">"';
		return $resultado;

	}

	if ( !isset($HTTP_RAW_POST_DATA)){

		$HTTP_RAW_POST_DATA = file_get_contents('php://input');

	}

	
	$server->configureWSDL("Info Blog", "urn: InfoBlog");

	$server->register("muestraUsuarios");
	$server->register("muestraImagen");
	$server->register("muestraPlanetas", 
			array(),  //Parametro
			array('return' => 'xsd:string'),  //Respuesta
			'urn:InfoBlog',  //namespace
			'urn:InfoBlog#muestraPlanetas',  //accion
			'rpc',   //estilo
			'encoded',   //uso
			'Muestra el contenido para el Blog');

	$server->service('$HTTP_RAW_POST_DATA');


	$dbhabdke = mysql_connect($hostname,$username,$password) or die("No se conecto al Servidor!");

	$seleccion = mysql_select_db("u210646419_sam", $dbhabdke) or die("BD no disponible");
	
	muestraUsuarios();
	
	<h1>Uusarios</h1>
	
	foreach ($all as $item ){

		echo '<li>';
		echo "<strong>".$item['nombre']."</strong><br>";
		echo "</li>";
	}
	
	

?>