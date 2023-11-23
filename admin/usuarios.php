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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ADMIN- MEMBRESIAS SALUD</title>
	<link href="lib/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="lib/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
    <style>
	.k-grid tr, .k-grid td, .k-grid th.k-header { border:0px;  }
	.k-grid tr td {    border-top: 1px solid #ddd; background:#FFFFFF}
	.k-grid th.k-header { font-weight:bold  }
	</style>
    <script src="lib/kendoui/js/jquery.min.js"></script>
    <script src="lib/kendoui/js/kendo.all.min.js"></script>
    <script src="lib/kendoui/js/cultures/kendo.culture.es-EC.min.js" type="text/javascript"> </script>
    <script>
function filtroesp(){esp={messages:{info:"Ver valor que sea:",filter:"Filtrar",clear:"Limpar",isTrue:"Verdadero",isFalse:"Falso",and:"Y",or:"O"},operators:{string:{eq:"Igual a",neq:"Diferente de",startswith:"Comienze con",contains:"Contenga",endswith:"Termine con"},number:{eq:"Igual a",neq:"Diferente de",gte:"Mayor que o igual a",gt:"Mayor que",lte:"Menor que o igual a",lt:"Menor que"},date:{eq:"Igual a",neq:"Diferente de",gte:"Mayor que o igual a",gt:"Mayor que",lte:"Menor que o igual a",lt:"Menor que"}}};return esp};function columnesp(){esp={sortAscending:"Orden Ascendente",sortDescending:"Orden Descendente",filter:"Filtro",columns:"Columnas"};return esp}
</script>
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
              	  <h5 class="centered">MEMBRESIAS SALUD</h5>
                  
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
							echo '<li';
							if ($datac["idMenu"]==$_GET["mscoll"]) echo ' class="active" '; 
							echo '><a  href="'.$datac["Link"].'?mcoll='.$data["idMenu"].'&mscoll='.$datac["idMenu"].'&dir='.$datac["Descripcion"].'">'.$datac["Descripcion"].'</a></li>';
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
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i><?php echo $_GET["dir"] ?></h3>
				<div class="row">
				
	                  <div class="col-md-12">
	                  	  <div class="content-panel">
		<div id="grid"></div>
        		</div><!-- /col-md-12 -->
              </div><!-- /row -->
</div>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
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
	<script>
<!-- Initialize the Grid -->
$(document).ready(function () {	
	kendo.culture("es-EC")
	var crudServiceBaseUrl = "php/",
	dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: crudServiceBaseUrl+"read.php",
				dataType: "json",
				data:{id:"Usuarios"}
			},
			create:  {
				url: crudServiceBaseUrl+"crear.php",
				dataType: "json",
				data:{id:"Usuarios"},
				complete: function(e) {$("#grid").data("kendoGrid").dataSource.read();}
			},
			update:  {
				url: crudServiceBaseUrl+"update.php",
				dataType: "json",
				data:{id:"Usuarios"},
				complete: function(e) {$("#grid").data("kendoGrid").dataSource.read();}
			},	
			destroy:	{
				url: crudServiceBaseUrl+"delete.php",
				dataType: "json",
				data:{id:"Usuarios"},
				//complete: function(e) {$("#grid").data("kendoGrid").dataSource.read();}
			},		
		},
		pageSize: 15,	
		schema: {				
			model: {
				id:"idUsuarios",
				fields: {
					idUsuarios: {editable: false},
					Nick: {},
					Correo: {},
					fecha_creacion: {editable: false,type:"date"},
				}
			}
								
		}
	});	
	$("#grid").kendoGrid({
		dataSource: dataSource,            
		toolbar: [{name:"create",text:"Agregar Usuario"}],
		pageable: true,
		filterable: filtroesp(),
        sortable: true,
		resizable: true,
		columnMenu: {
			messages:columnesp(),
			columns: false, //enable columns section
			sortable: true, //enable sorting section
			filterable: true, //enable filterable section
		},
		editable:"popup",
		columns: [
			{ field: "idUsuarios", title:"Id"},
			{ field: "Nick", title:"Usuario"},
			{ field: "Correo", title:"E-mail"},
			{ field: "fecha_creacion", title:"Fecha de creacion",format: "{0:dddd dd MMM yyyy}"},
			{ command: [{name: "edit",text: { edit: "Editar", update: "Grabar", cancel: "Cancelar"}},{text: 'Delete', click: deleteItem }]} 
			],
	});	
	function deleteItem(e) {
	  var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
	  if(confirm('Estas seguro de eliminar el Usuario : ' + dataItem.Nick)) {
		var grid = $("#grid").data("kendoGrid");
		grid.dataSource.remove(dataItem);
		grid.dataSource.sync();
		grid.dataSource.read();
	  }  
	}
});
</script>
    <!-- js placed at the end of the document so the pages load faster -->
    
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>	
  

  </body>
</html>
