<?php

	// Cargar el estado actual
    $string = file_get_contents("robot_state.json");
    $json_a= json_decode($string,true);

    // Handle GET request
    $json_a['baccion'] = $_GET["baccion"];
    $json_a['velocidad'] = $_GET["velocidad"];

    // Graba el archivo JSON
    $fp = fopen('robot_state.json', 'w');
    fwrite($fp, json_encode($json_a));
    fclose($fp);

    // Crea un Socket TCP/IP & conecta al servidor
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $result = socket_connect($socket, "192.168.1.102", "3000");

    // Peticion
    $in = "HEAD / HTTP/1.1\r\n";
    $in .= "Content-Type: text/html\r\n";
    $in .= $json_a['baccion'] . "," . 
    $json_a['velocidad'] . ",\r\n\r\n";
    $out = '';

    // Envia Peticion
    socket_write($socket, $in, strlen($in));

    // Lee Respuesta
    while ($out = socket_read($socket, 4096)) {
        echo $out;
    }

    // Cierra socket
    socket_close($socket);

?>