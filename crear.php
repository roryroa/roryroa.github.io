<?php
 $conexion = mysql_connect("mysql.nixiweb.com","u210646419_sam","sam123");
 
 if(!$conexion)
{
die('No se apodido conectar con el servidor'.mysql_error());
} 
echo "Conectado!!";

mysql_select_db("u921382023_sam");

$peticion = mysql_query("SELECT * FROM visitantes");

while ($fila = mysql_fetch_array)
{
echo ($fila['visitante']);
echo "<br>";
}

mysql_close($conexion);
?>