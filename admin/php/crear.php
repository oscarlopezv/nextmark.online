<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);

switch ($id) {
	case "Usuarios":
		$query="Insert into usuarios (nick,correo,password,fecha_creacion) values ('$Nick','$Correo',MD5('$Nick'),now())";		
	break;
    case "imagenesindex":
        $query="insert into imagenes_homepage (imagen) values  ('$imagen') ";
    break;
    case "cont_home":
        $query="insert into contenido_homepage (imagen,descripcion) values  ('$imagen','".base64_decode($desc)."') ";
    break;
    case "centros":
        $query="insert into centros_salud (centro) values  ('$centro') ";
    break;
}
$stmt= mysql_query($query) or die ("Fallo la creacion".mysql_error());
?>