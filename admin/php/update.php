<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
$costosocio=0;
$costonosocio=0;
extract($_GET);
extract($_POST);


switch ($id) {
	case "Usuarios":
		$query="Update usuarios set Nick='$Nick',Correo='$Correo',fecha_creacion=now() where idUsuarios=$idUsuarios";
	break;
    case "imageindex":
        $query="update ventas set estado='$estado' where idventas='$idventas'";
    break;
    case "cont_home":
        $query="update contenido_homepage set imagen='$imagen',descripcion='".base64_decode($desc)."' where idcontenido_homepage='$idcont'";
    break;
    
}

$stmt= mysql_query($query) or die ($query.mysql_error());
?>