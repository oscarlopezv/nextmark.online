<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
switch ($id) {
	case "Usuarios":
		$query="select * from usuarios";		
	break;
    case "imagenesindex":
		$query="select * from imagenes_homepage where dispositivo is Null  order by idimagenes_homepage,`index` asc";		
	break;
    case "cont_home":
		$query="select * from contenido_homepage";		
	break;
    case "citas":
		$query="select * from citas order by idcitas desc";		
	break;
    case "reembolsos":
		$query="select * from reembolso order by idreembolso desc";		
	break;
    case "centros":
		$query="select * from centros_salud order by centro asc";		
	break;
}
$resultado=mysql_query($query) or die (mysql_error());
$rows = array();
$i=0;
while( $row = mysql_fetch_array($resultado) ) {
	$rows[] = $row;
}
print json_encode($rows);
?>