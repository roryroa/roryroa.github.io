<?php

 //call library
 require_once ('lib/nusoap.php');

 //using soap_server to create server object
 $server = new soap_server();

 // create the function
 function getallbook()
 {

	$conn = mysql_connect('mysql.nixiweb.com','u210646419_sam','sam123456');
	mysql_select_db('u210646419_sam', $conn);

	$sql = "SELECT * FROM usuarios";
	$q = mysql_query($sql);

	while($r = mysql_fetch_array($q))
	{
		//echo $r['nombre'];
	 	$items[] = array('nombre'=>$r['nombre'], 'clave'=>$r['clave']);

	//return $items[0]["nombre"];
	}

 	return $items;
 }

 //register a function that works on server
 $server->configureWSDL("Info Book", "urn: InfoBook");
 $server->register("getallbook");
 $server->service('$HTTP_RAW_POST_DATA');
 // create HTTP listener
 // $server‐>service($HTTP_RAW_POST_DATA);

 
 exit();




 ?>
