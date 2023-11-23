<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);
switch ($id) {
	case "Usuarios":
		$query="Delete From usuarios where idUsuarios=$idUsuarios";		
	break;
    case "imagenindex":
		$query="Delete From imagenes_homepage where idimagenes_homepage=$idimg";		
	break;
    case "centros":
		$query="Delete From centros_salud where idcentros_salud=$ide";		
	break;
}
$stmt= mysql_query($query) or die ("Fallo la creacion".mysql_error());
?>