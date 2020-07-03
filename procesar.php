<?php
echo "el nombre es ".$_GET['caja'];


$tuip=getenv(REMOTE_ADDR);

echo $tuip;
echo "<br>";
$tunavegador = $_SERVER["HTTP_USER_AGENT"];
echo $tunavegador;
?>