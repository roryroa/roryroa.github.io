<?php
$conexion = mysql_connect("mysql.nixiweb.com","u210646419_sam","sam123");
if(!$conexion)
{
die ("No logro conectarse".mysql_error());
}
else
{
echo ("CONECTADO");
}

echo "buenos dias tu estado es "."<br>";

mysql_select_db("u210646419_sam",$conexion);

$resultado = mysql_query("SELECT * FROM visitantes");

echo "<table border=1>";

while($fila = mysql_fetch_array($resultado))
{

echo "<tr><td>".$fila["nombre"]."</td><td>".$fila["ip"]."</td><td>".$fila["fecha"]."</td></tr>";

}

echo "</table>";

mysql_close($conexion);
?>