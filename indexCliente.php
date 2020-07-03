<?php

	require_once "lib/nusoap.php";

	$cliente = new nusoap_client("http:/samuelroa.tk/webservice_soap.php");

	$usuarios = $cliente->call("muestraUsuarios");

	echo "<h1>Lista de Usuarios</h1>";
	
	echo $usuarios;
	// foreach ($usuarios as $item ){

		// echo '<li>';
		// echo "<strong>".$item['nombre']."</strong><br>";
		// echo "</li>";
	// }

	$planetas = $cliente->call("muestraPlanetas");

	echo '<h1>Planetas</h1>';

	echo "<p>".$planetas."</p>";

	$imagen = $cliente->call("muestraImagen", array("categoria" => "espacio"));

	echo $imagen;



?>
