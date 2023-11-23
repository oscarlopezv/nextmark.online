<?php 
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="sign-in.php" </script>' ;
}
include_once("php/conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ADMIN-MEMBRESIA SALUD</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />    
    <link rel="stylesheet" type="text/css" href="js/gritter/css/jquery.gritter.css" />   
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<form action="php/login-out.php" hidden method="post" name="formlogout"><input type="hidden" name="id" value="Sign-out"  /></form>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>ADMIN</b></a>
            <!--logo end-->
 
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                   <li><a class="logout" href="Javascript:" onClick="document.formlogout.submit()">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">MEMBRESIA SALUD</h5>
                  
                  <?php 
					$query="Select * from menu where Jerarquia='P' order by nivel";
					$resultado=mysql_query($query) or die (mysql_error());
					$querychildren="Select * from menu where Jerarquia='H'";
					$resultadochildren=mysql_query($querychildren) or die (mysql_error());
					while ($data= mysql_fetch_array($resultado)){		  					
					echo '<li class="sub-menu">
							<a ';
					if ($_GET["mcoll"]==$data["idMenu"]) echo 'class="active" '; 
					echo 'href="Javascript:" >
						<i class="'.$data["icono"].'"></i>
						<span>'.$data["Descripcion"] .'</span>
						</a>
						<ul class="sub">';
					  while ($datac= mysql_fetch_array($resultadochildren)){
						  if ($datac["Nivel"]==$data["Nivel"]) {
							echo '<li><a ';
							if ($datac["idMenu"]==$_GET["mscoll"]) echo 'class="active" '; 
							echo ' href="'.$datac["Link"].'?mcoll='.$data["idMenu"].'&mscoll='.$datac["idMenu"].'&dir='.$datac["Descripcion"].'">'.$datac["Descripcion"].'</a></li>';
						  }
					  }
					  mysql_data_seek($resultadochildren, 0);
					  echo '</ul><li>';
					}
				  ?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - NIVEKSTUDIO
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>	
  

  </body>
</html>
