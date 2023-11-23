<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_POST);
switch ($id) {
	case "Sign-in":
		$query="Select * from usuarios where nick='$usuario' and password=md5('$password')";
		$resultado=mysql_query($query) or die (mysql_error());
		while ($data= mysql_fetch_array($resultado)){
			$_SESSION["usuario"] = $data["Nick"];
			$_SESSION["usuario-id"] = $data["idUsuarios"];
		}
		$filas=mysql_num_rows($resultado);
		if ($filas==1) {
	  		echo "<script> document.location='../' </script>";			
		} else {
			echo "<script> alert ('Revise el Usuario y Password') </script>";
	  		echo "<script> document.location='../sign-in.php' </script>";
		}
	break;
	case "Sign-out": 
		if (ini_get("session.use_cookies")) {
		  $params = session_get_cookie_params();
		  setcookie(session_name(), '', time() - 42000,
		  $params["path"], $params["domain"],
		  $params["secure"], $params["httponly"]);		 
		}	
		session_destroy();
		echo "<script> document.location='../sign-in.php' </script>";
	break;
}
?>