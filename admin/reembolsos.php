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

    <title>ADMIN - MEMBRESIAS SALUD</title>
	<link href="lib/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="lib/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
    <style>
	.k-grid tr, .k-grid td, .k-grid th.k-header { border:0px;  }
	.k-grid tr td {    border-top: 1px solid #ddd; background:#FFFFFF}
	.k-grid th.k-header { font-weight:bold; border-color:#80C5CE}
	.rojo {color:#FF0000; font-weight:bold}
	.azul {color:#0000FF; font-weight:bold}
    .k-grid td{
        white-space: nowrap;
        text-overflow: ellipsis;
    }
	</style>
    <script src="lib/kendoui/js/jquery.min.js"></script>
    <script src="lib/kendoui/js/kendo.all.min.js"></script>
    <script src="lib/jszip.js"></script>
    <script src="lib/kendoui/js/cultures/kendo.culture.en-US.min.js" type="text/javascript"> </script>
     
    
<script>
var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
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
		<div id="grid" style="height:450px"></div>
        		</div><!-- /col-md-12 -->
              </div><!-- /row -->
</div>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - GEEKDEV.EC
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div> 
      </footer>
      <!--footer end-->
  </section>
  
      <div id="editpaquete"></div>
  <script type="text/x-kendo-template" id="template">
	<div class="detallerow" id="grid22" ></div>
	</script>
  <script id="command-template" type="text/x-kendo-template">		
		
		<button class="k-button" onClick="eliminar(#= idventas#)">Eliminar</button>
	</script>
    <script id="command-templateservi" type="text/x-kendo-template">
    #if (estado=='Pagado'){#
		#if (servientre!=null){#
            #=servientre#
        #} else {#
            <input type='text' id='servt#=idventas#' style='width:70px' /> <button type='button' onclick="enviarserv('#=idventas#','#=mail#')">Enviar</button>
        #}#
    # } #
	</script>
      <script id="command-templatefac" type="text/x-kendo-template">
    #if (estado=='Pagado'){#
		#if (factura!=null){#
            #=factura#
        #} else {#
            <input type='text' id='factn#=idventas#' style='width:70px' /> <button type='button' onclick="enviarfac('#=idventas#','#=mail#')">Enviar</button>
        #}#
    # } #
	</script>
   
  <script>
	
<!-- Initialize the Grid -->

function estadocolor(model) {	    
		if (model.estado=='Ingresado'){
			return "<span style='color:red'>" + model.estado + "</span>"
		}
        if (model.estado=='Pagado'){
			return "<span style='color:blue'>" + model.estado + "</span>"
		} 
        if (model.estado=='Anulado'){
			return "<span style='color:green'>" + model.estado + "</span>"
		} 
        if (model.estado=='Pago Parcial'){
			return "<span style='color:green'>" + model.estado + "</span>"
		} 
    
}
      
$(document).ready(function () {		
	kendo.culture("en-US");
    
		dataSource = new kendo.data.DataSource({
		transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"reembolsos"}
			},	
					
			
		},

		schema: {
		   model: {
			  
			  
		   }
	   },
            
	});		
	var grid =$("#grid").kendoGrid({
		dataSource: dataSource,            
		toolbar: ["excel"],
        //toolbar: [{ 'name': 'actualizar', template: '<button id="bnactualizar" class="k-button icon-repeat"> Actualizar</button>' },"save"],
		excel: {
            fileName: "reembolsos.xlsx",
			proxyURL: "excel/"
        },
        filterable: {
            
            operators: { 
                string: {
                    contains: "Contiene",
                    eq: "Es igual a",                    
                }
            }
        },
        
		columns: [	
            
			
            			
            
			{ field: "nombres", title:"Nombres", width:'215px'},			
            { field: "apellidos", title:"Apellidos", width:'215px'},			
            { field: "mail", title:"Mail", width:'200px'},
            { field: "ciudad", title:"Ciudad", width:'200px'},
            { field: "archivo", title:"Archivo", width:'200px',template:"<a target='_blank' href='/pdfs/#: data.archivo#'> click aquí </a>"},
			{ field: "fecha_registro", title:"Fecha", width:'175px',template: 
'#= kendo.toString(fecha_registro, "dddd, MMMM dd, yyyy") #'},										
			],
	}).data("kendoGrid");
    
    $("#grid").kendoTooltip({
       filter: "td:nth-child(16)", //this filter selects the first column cells
       position: "right",
       animation: {
            open: {
              effects: "slideIn:right",
              duration: 200
            },
            // passing reverse: true reverses the slideIn animation
            close: {
              effects: "slideIn:right",
              reverse: true,
              duration: 200
            }
          },
       
        content: function(e){            
            var dataItem = $("#grid").data("kendoGrid").dataItem(e.target.closest("tr"));        
            console.log(dataItem)
            var content = dataItem.comentarios;
            return content
        }
     }).data("kendoTooltip");
	
	function estadoDropDownEditor(container, options) {
	  if (options.model.estado=="Anulado" || options.model.estado=="Pagado"){
        grid.closeCell(container);
     } else {
		$('<input required data-text-field="estado" data-value-field="estado" data-bind="value:' + options.field + '"/>')
			.appendTo(container)
			.kendoDropDownList({
				autoBind: false,
				dataSource: {
					type: "odata",
					data: [{ estado : "Ingresado"}, { estado : "Pagado"} , { estado : "Pago Parcial"} , { estado : "Anulado"}],
				},
			});
	 } 
        console.log(options.model.estado)
	}
	
	$('#bnactualizar').click(function() {
	  var grid = $("#grid").data("kendoGrid");
      grid.dataSource.read()
	}); 
});
function esTados(estado,id){
    
	span=''
	if (estado=='Pendiente'){
		span= "<span class='rojo'>"+estado+'</span>'	
	} else if (estado=='Pagado'){
		span= "<span class='azul'>"+estado+'</span>'
	} else if (estado=='Pago Parcial'){
		span= "<span class='green'>"+estado+'</span>'
	} 	
	return span
}
function detailInit(e) {
	var detailRow = e.detailRow;
	dataSource22 = new kendo.data.DataSource({
		transport: {
			read:  {
				url: "php/read.php",
				dataType: "json",
				data:{id:"detventas",venta:e.data.idventas}
			},				
			},
	});	
	var grid22=detailRow.find("#grid22").kendoGrid({
		dataSource: dataSource22,
		
		columns: [			
			{ field: "iddetalles_ventas", title:"Id",width:"70px"},
            {
				template: "<div class='customer-photo'" +
								"style='background-image: url(images/#:data.imagenz#);'></div>"
							,
				field: "imagen",
				title: "Imagen",
				width: 100
			},
			{ field: "nombre_zapato", title:"Zapato",width:"170px"},			
            { field: "colornombre", title:"Color",width:"170px"},			
            { field: "talla", title:"Talla",width:"170px"},			            
            { field: "cantidad", title:"Cantidad",width:"170px"},			
            { field: "precio", title:"Precio",width:"150px"},								
            { field: "dcto", title:"Dcto."},								
		]
	}).data("kendoGrid");
    detailRow.find("#grid22").kendoTooltip({
       filter: "td:nth-child(3)", //this filter selects the first column cells
       position: "right",
       animation: {
            open: {
              effects: "slideIn:right",
              duration: 200
            },
            // passing reverse: true reverses the slideIn animation
            close: {
              effects: "slideIn:right",
              reverse: true,
              duration: 200
            }
          },
       
        content: function(e){            
            var dataItem = detailRow.find("#grid22").data("kendoGrid").dataItem(e.target.closest("tr"));        
            var content = 'asdds';
            return content
        }
     }).data("kendoTooltip");
}
function eliminar(e) {
  if (confirm('Desea Eliminar este registro?')) {   
  $.ajax({
	async: false,
	type: "GET",
	url: 'php/delete.php',
	data: {id:'ventas',ide:e},
	success: function(response) {
			  	
		  var grid = $("#grid").data("kendoGrid");
		  grid.dataSource.read()	
		
	},
  });
  }
}
</script>
    <!-- js placed at the end of the document so the pages load faster -->

<style type="text/css">
        .customer-photo {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-size: 40px 40px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }

</style>  
<style scoped>
                #grid .k-grid-toolbar
                {
				background:#979797
                   
                }
				.Menulabel { color:#FC0 }
                .k-widget.k-tooltip-validation {
				  border-color: #80C5CE;
				}
            </style>  
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>	
  

  </body>
</html>
