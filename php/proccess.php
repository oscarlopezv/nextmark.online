<?php
session_start();

include_once("../admin/php/conexion.php");
$sql=new conectar();
$sql->mysqlsrv();

extract($_POST);
extract($_GET);
$referido=end(explode("/",$_SERVER['HTTP_REFERER']));
if (isset($id) && trim($id)!=''){
    switch ($id) { 
        
        case "file":
            
            $name=uniqid('',true);

            $array = explode('.', $_FILES['file']['name']);
            $archivo = '.'.end($array);

            if (move_uploaded_file($_FILES['file']['tmp_name'], "../admin/images/".$name.$archivo)) {
                echo $name.$archivo.'|-|'.$_FILES['file']['name'];

            } else {
                  header('HTTP/1.1 500 Internal Server Error');
            }

            break;
        
        default:
        case "cita":
            if ($referido=='citas.php'){
                $query="insert into citas (ciudad, especialidad, nombres, apellidos, centro_salud, desde, hasta, fecha_registro, mail)
                    values ('$ciu', '$esp','$nom','$ape','$centro','$desde','$hasta',now(),'$mail')";
                mysql_query($query);
                $correo="mails/citas.php";
                $título="RESERVA DE CITA";
                
                $from='"MEMBRESIA SALUD" <info@nextmark.online>';
                
                include_once("correo.php");
                echo "<script> alert ('Registro realizado') </script>";
                die ("<script> document.location.href='".$_SERVER["HTTP_REFERER"]."' </script>");
            } else {
                 header('HTTP/1.1 500 Internal Server Error');
            }
            break;
        case "reembolso":
            if ($referido=='reembolso.php'){
                $query="insert into reembolso (archivo,ciudad, nombres, apellidos, centro_salud, fecha_registro, mail)
                    values ('$pdfs','$ciu', '$nom','$ape','$centro',now(),'$mail')";
                mysql_query($query) or die (mysql_error());
                $correo="mails/reembolso.php";
                $título="REEMBOLSO";
                
                $from='"MEMBRESIA SALUD" <info@nextmark.online>';
                
                include_once("correo.php");
                echo "<script> alert ('Registro realizado') </script>";
                die ("<script> document.location.href='".$_SERVER["HTTP_REFERER"]."' </script>");
            } else {
                 header('HTTP/1.1 500 Internal Server Error');
            }
            break;
        case "contacto":
            if ($referido=='contactanos.php'){
                
                $correo="mails/contacto.php";
                $título="CONTACTO";
                
                $from='"MEMBRESIA SALUD" <info@nextmark.online>';
                
                include_once("correo.php");
                echo "<script> alert ('Gracias por contactarnos') </script>";
                die ("<script> document.location.href='".$_SERVER["HTTP_REFERER"]."' </script>");
            } else {
                 header('HTTP/1.1 500 Internal Server Error');
            }
            break;
        
        default:
        case "login":
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://exoeduca.com/procesar/getlogin/");
            curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
            curl_setopt($ch, CURLOPT_POSTFIELDS,"user=$mail&password=$password"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $obj = json_decode($result);
            curl_close($ch);
            //print_r($obj[0]);
            //echo $obj[0]->error;
            if ($obj[0]->error=='no'){
                $_SESSION["mail"]=$obj[0]->mail;
                $_SESSION["nombres"]=$obj[0]->nombres;
                $_SESSION["idest"]=$obj[0]->idestudiantes;
                $_SESSION["tipo"]=$obj[0]->tipo;
                $_SESSION["contrato"]=$obj[0]->contrato;
            } else if ($obj[0]->error=='no_cuenta'){
                echo "<script> alert ('Cuenta no existente') </script>";
                
            } else if ($obj[0]->error=='pass_fail'){
                echo "<script> alert ('Contraseña incorrecta') </script>";
                
            } 
            die ("<script> document.location.href='".$_SERVER['HTTP_REFERER']."' </script>");
            break;
        
        default:
        case "logout":
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]);		 
            }	
            session_destroy();
            die ("<script> document.location.href='".$_SERVER['HTTP_REFERER']."' </script>");
            break;
        
        default:
            die ( "<script> document.location.href='/index.php' </script>");
        break;
        
            
    }
}
?>