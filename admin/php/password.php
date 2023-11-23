<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_POST);
if ($newpassword==$confirm){
	$query="Update usuarios set password=md5('$newpassword') where idUsuarios=".$_SESSION["usuario-id"]." and password=md5('$password')";
	$resultado=mysql_query($query) or die (mysql_error());
	if (mysql_affected_rows()==0){
		echo "<script> alert ('Revise la password ingresada') </script>";
		echo "<script> document.location='../cambiar_password.php' </script>";
	} else {
		echo "<script> alert ('Cambiada correctamente') </script>";
		echo "<script> document.location='../cambiar_password.php' </script>";
	}
}else {
	echo "<script> alert ('No coinciden las password') </script>";
	echo "<script> document.location='../cambiar_password.php' </script>";
}
?>