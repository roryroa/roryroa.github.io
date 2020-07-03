<?php
 $conexion = mysql_connect("mysql.nixiweb.com","u210646419_sam","sam123");
 
 if(!$conexion)
{
die('No se apodido conectar con el servidor'.mysql_error());
} 
echo "Conexion OK!";
echo "<br>";

$db_selected = mysql_select_db("u210646419_sam",$conexion);

if(!$db_selected)
{
die('No se apodido conectar con la DB'.mysql_error());
}

echo "Base OK!";
echo "<br>";
$sql = "SELECT * FROM visitantes";

$resultado = mysql_query($sql,$conexion);

echo "Consulta OK!".mysql_error();
echo "<br>";

while ($fila = mysql_fetch_array($resultado))
{
echo ($fila['nombre']." ".$fila['ip']);
echo "<br>";
}

mysql_close($conexion);
?>