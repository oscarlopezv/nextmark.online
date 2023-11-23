<?php 
session_start();
if (!isset($_SESSION["usuario"])) {
    echo '<script> document.location.href="sign-in.php" </script>' ;
}
include_once("php/conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
//$queryimgs="select * from imagenes_index where susc='1'";
//$resimgs=mysql_query($queryimgs) or die ('error'.mysql_error());
//$rowimgs=mysql_fetch_assoc($resimgs);

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
              
              	  <p class="centered"><a href="index.php"><img src="img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">MEMBRESIAS SALUD</h5>
                  
                  <?php 
                  
                    
					$query="Select * from menu where Jerarquia='P' $filtromenu order by nivel";
					$resultado=mysql_query($query) or die (mysql_error());
					$querychildren="Select * from menu where Jerarquia='H'  ";
					$resultadochildren=mysql_query($querychildren) or die (mysql_error());
					while ($data= mysql_fetch_assoc($resultado)){		  					
					echo '<li class="sub-menu">
							<a ';
					if ($_GET["mcoll"]==$data["idMenu"]) echo 'class="active" '; 
					echo 'href="Javascript:" >
						<i class="'.$data["icono"].'"></i>
						<span>'.$data["Descripcion"] .'</span>
						</a>
						<ul class="sub">';
					  while ($datac= mysql_fetch_assoc($resultadochildren)){
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
                              <div id="tabstrip">
                                  <ul> 
                                    <li class="k-state-active">Imagen full-screen</li>
                                    <li>Contenido</li>
                                    <!--<li>Modalidad presencial</li>
                                    <li>Modalidad online</li>
                                    <li>Contenido del curso</li> !-->
                                    
                                  </ul>
                                  <div>
                                    <?php
                                    $query="select * from page where idpage='fscreen'";
                                    $res=mysql_query($query);
                                    $rowd=mysql_fetch_assoc($res);
                                    ?> 
                                    <!--<h5>Palabras (Presentación):</h5>
                                    <input id="keywords" type="text" name="keywords" value="<?php echo $rowd['titulo']; ?>" class="k-textbox" style="width: 100%; display:inline-block" /> <br>  
                                    <h5>Frase (Presentación):</h5>
                                    <input id="frase" type="text" name="frase" value="<?php echo $rowd['descripcion']; ?>" class="k-textbox" style="width: 100%; display:inline-block" /> <br>  
                                    <h5>Imagen:</h5>
                                    <img id="image" style="width:250px; display:inline-block" src="images/<?php echo $rowd['multimedia'] ?>"> 
                                    <input type="hidden" id="imagehidden" value="<?php echo $rowd['multimedia'] ?>"><p></p>
                                    <div class="uploaddiv" style=" width:200px">
                                    <input name="archivo" id="upload" type="file"/>
                                    </div><br>
                                      
                                    <h5>Imagen (Movil):</h5>
                                    <img id="imagem" style="width:250px; display:inline-block" src="images/<?php echo $rowd['multimedia_m'] ?>"> 
                                    <input type="hidden" id="imagehiddenm" value="<?php echo $rowd['multimedia_m'] ?>"><p></p>
                                    <div class="uploaddiv" style=" width:200px">
                                    <input name="archivo" id="uploadm" type="file"/>
                                    </div><br>
                                      -->
                                    <input type="hidden" id="item_imgs"  />
                                    
                                    <h5>Imagenes:</h5>   
                                    <input name="archivo" id="slide" type="file"/>
                                    <div class="demo-section">  
                                        <div id="listView"></div>
                                        <div id="pager" class="k-pager-wrap"></div>
                                    </div>
                                    
                                    <!--
                                    <h5>Imagenes para dispositivo moviles:</h5>   
                                    <input name="archivo" id="slide_m" type="file"/>
                                    <div class="demo-section">  
                                        <div id="listView_m"></div>
                                        <div id="pager_m" class="k-pager-wrap"></div>
                                    </div>  
                                    
                                      
                                    <!--<button class="k-button" id="updatefs" style="padding-top:5px">Update</button>-->
                                    
                                  </div>
                                  <div>
                                    <?php
                                    $query="select * from page where idpage='desc1'";
                                    $res=mysql_query($query);
                                    $rowd=mysql_fetch_assoc($res);
                                    ?>
                                    
                                    
                                      <div id="grid"></div>
                                    <!--<textarea id="descripcion" ><?php echo $rowd['descripcion']; ?></textarea>-->
                                    <br> 
                                    
                                  </div>
                                  <!--<div>
                                    <?php
                                    $query="select * from page where idpage='desc2'";
                                    $res=mysql_query($query);
                                    $rowd=mysql_fetch_assoc($res);
                                    ?>
                                    <h5>Titulo:</h5>
                                    <input id="titulod2" type="text" name="keywords" value="<?php echo $rowd['titulo']; ?>" class="k-textbox" style="width: 100%; display:inline-block" /> <br> 
                                    <h5>Descripción:</h5>
                                    <textarea id="descripcion2" ><?php echo $rowd['descripcion']; ?></textarea><br> 
                                    <h5>Imagen:</h5>
                                    <img id="image2" style="width:250px; display:inline-block" src="images/<?php echo $rowd['multimedia'] ?>"> 
                                    <input type="hidden" id="imagehidden2" value="<?php echo $rowd['multimedia'] ?>"><p></p>
                                    <div class="uploaddiv" style=" width:200px">
                                    <input name="archivo" id="upload2" type="file"/>
                                    </div><br>
                                    <button class="k-button" id="updatedesc2" style="padding-top:5px">Update</button>
                                  </div>
                                  <div>
                                    <?php
                                    $query="select * from page where idpage='desc3'";
                                    $res=mysql_query($query);
                                    $rowd=mysql_fetch_assoc($res);
                                    ?>
                                    <h5>Titulo:</h5>
                                    <input id="titulod3" type="text" name="keywords" value="<?php echo $rowd['titulo']; ?>" class="k-textbox" style="width: 100%; display:inline-block" /> <br> 
                                    <h5>Descripción:</h5>
                                    <textarea id="descripcion3" ><?php echo $rowd['descripcion']; ?></textarea><br> 
                                    <h5>Imagen:</h5>
                                    <img id="image3" style="width:250px; display:inline-block" src="images/<?php echo $rowd['multimedia'] ?>"> 
                                    <input type="hidden" id="imagehidden3" value="<?php echo $rowd['multimedia'] ?>"><p></p>
                                    <div class="uploaddiv" style=" width:200px">
                                    <input name="archivo" id="upload3" type="file"/>
                                    </div><br>
                                    <button class="k-button" id="updatedesc3" style="padding-top:5px">Update</button>
                                  </div>
                                  <div>
                                    <?php
                                    $query="select * from page where idpage='desc4'";
                                    $res=mysql_query($query);
                                    $rowd=mysql_fetch_assoc($res);
                                    ?>
                                    <h5>Titulo:</h5>
                                    <input id="titulod4" type="text" name="keywords" value="<?php echo $rowd['titulo']; ?>" class="k-textbox" style="width: 100%; display:inline-block" /> <br> 
                                    <h5>Descripción:</h5>
                                    <textarea id="descripcion4" ><?php echo $rowd['descripcion']; ?></textarea><br> 
                                    <h5>Imagen:</h5>
                                    <img id="image4" style="width:250px; display:inline-block" src="images/<?php echo $rowd['multimedia'] ?>"> 
                                    <input type="hidden" id="imagehidden4" value="<?php echo $rowd['multimedia'] ?>"><p></p>
                                    <div class="uploaddiv" style=" width:200px">
                                    <input name="archivo" id="upload4" type="file"/>
                                    </div><br>
                                    <button class="k-button" id="updatedesc4" style="padding-top:5px">Update</button>
                                  </div>-->
                                  
                                  
                              </div>
        		          </div><!-- /col-md-12 -->
                     </div><!-- /row -->
</div>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 - GEEKDEV.EC
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end--> 
  </section>
  <div id="editpaquete"></div>
      
<script type="text/x-kendo-template" id="templatetool">
    <button class="k-button" onClick="nuevo()">Agregar</button>		
</script>
<script type="text/x-kendo-template" id="template">
<div class="product" onclick="product(this,'#: uid#')">
	<img src="images/#= kendo.toString(imagen, 'n0') #"  />	
	<p>&nbsp<a href="Javascript:"  onClick="deleteimg(#: idimagenes_homepage #)"><i class="fa fa-times"></i></a></p>
</div> 
</script>
<script id="command-template" type="text/x-kendo-template">		
    <button class="k-button" onClick="editar(#= idcontenido_homepage#)">Editar</button>		
    <button class="k-button" onClick="eliminar(#= idcontenido_homepage#)">Eliminar</button>
</script>
<script>
    
$( "#update_url_imgs" ).click(function() {
    if ($("#item_imgs").val()==''){
        alert ("Debe seleccionar una imagen")
        return
    }
    if ($("#url_imgs").val()!="" || $("#mask_imgs").val()!=""){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'url_imgs', url:$("#url_imgs").val(), mask:$("#mask_imgs").val(), item:$("#item_imgs").val()},
          success: function(){ 					
                    alert ('Su registro ha sido actualizado')
                    $("#url_imgs").val('')
                    $("#mask_imgs").val('')
                    var listView = $("#listView").data("kendoListView");
                    listView.dataSource.read(); 
                    var listView = $("#listView_m").data("kendoListView");
                    listView.dataSource.read(); 
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
    } else {
          alert ("No puede dejar espacios en blanco")
      }
});   
$( "#updatefs" ).click(function() {
    
    if ($("#keywords").val()!="" || $("#frase").val()!=""){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'page', idp:'fscreen', kword:$("#keywords").val(), frase:$("#frase").val(), imgm:$("#imagehiddenm").val(), img:$("#imagehidden").val()},
          success: function(){ 					
                    alert ('Su registro ha sido actualizado')
                    window.parent.$("#editwindow").data("kendoWindow").close(); 
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
    } else {
          alert ("No puede dejar espacios en blanco")
      }
});
$( "#updatedesc2" ).click(function() {
    
    if ($("#descripcion2").data("kendoEditor").value()!=""){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'page', idp:'desc2', kword:$("#titulod2").val(), frase:window.btoa($("#descripcion2").data("kendoEditor").value()), img:$("#imagehidden2").val(), },
          success: function(){ 					
                    alert ('Su registro ha sido actualizado')
                    window.parent.$("#editwindow").data("kendoWindow").close(); 
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
    } else {
          alert ("No puede dejar espacios en blanco")
      }
});
$( "#updatedesc3" ).click(function() {
    
    if ($("#descripcion3").data("kendoEditor").value()!=""){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'page', idp:'desc3', kword:$("#titulod3").val(), frase:window.btoa($("#descripcion3").data("kendoEditor").value()), img:$("#imagehidden3").val(), },
          success: function(){ 					
                    alert ('Su registro ha sido actualizado')
                    window.parent.$("#editwindow").data("kendoWindow").close(); 
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
    } else {
          alert ("No puede dejar espacios en blanco")
      }
});
$( "#updatedesc5" ).click(function() {
    
    if ($("#descripcion5").data("kendoEditor").value()!=""){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          
          data: {id:'page', idp:'about', frase:window.btoa($("#descripcion5").data("kendoEditor").value()), img:$("#idyoutube2").val(), },
          success: function(){ 					
                    alert ('Su registro ha sido actualizado')
                    window.parent.$("#editwindow").data("kendoWindow").close(); 
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
    } else {
          alert ("No puede dejar espacios en blanco")
      }
});
$( "#updatedesc4" ).click(function() {
    
    if ($("#descripcion4").data("kendoEditor").value()!=""){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'page', idp:'desc4', kword:$("#titulod4").val(), frase:window.btoa($("#descripcion4").data("kendoEditor").value()), img:$("#imagehidden4").val(), },
          success: function(){ 					
                    alert ('Su registro ha sido actualizado')
                    window.parent.$("#editwindow").data("kendoWindow").close(); 
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
    } else {
          alert ("No puede dejar espacios en blanco")
      }
});
$( "#updatedesc1" ).click(function() {
    if ($("#descripcion").data("kendoEditor").value()!=""){
      $.ajax({
          type: "POST",
          url: 'php/update.php',
          data: {id:'page', idp:'desc1', kword:$("#titulod1").val(), frase:window.btoa($("#descripcion").data("kendoEditor").value()), img:$("#idyoutube").val(), },
          success: function(){ 					
                    alert ('Su registro ha sido actualizado')
                    window.parent.$("#editwindow").data("kendoWindow").close(); 
                },	
          error: function() {  alert( "Ha ocurrido un error" );}  
        });
    } else {
          alert ("No puede dejar espacios en blanco")
      }
});
function deleteimg(idimg){
	$.ajax({
	  type: "GET",
	  url: 'php/delete.php',
	  data: {id:'imagenindex',idimg:idimg},
	  success: function(){ 	  		
	  		var listView = $("#listView").data("kendoListView");
			listView.dataSource.read(); 
            var listView = $("#listView_m").data("kendoListView");
			listView.dataSource.read(); 
	  },	
	});
}
var onSelect2 = function(e) {
	if(e.files.length > 1) { 
            e.preventDefault();
            alert('Solo Puede escoger un archivo');
    } 
    
};
var onSelect = function(e) {
	if(e.files.length > 1) { 
            e.preventDefault();
            alert('Solo Puede escoger un archivo');
    }
    $.each(e.files, function(index, value) {
	  ok=[".jpg",".JPG",".gif",".GIF",".PNG",".png"]
      if($.inArray(value.extension,ok)==-1) {
        e.preventDefault();
        alert("Por favor cargue un archivo tipo imagen");
      }
    });
};
var onSuccess=function(e){
    $.ajax({
	  type: "GET",
	  url: 'php/update.php',
	  data: {id:'imagenesindex',imagen:e.response.newName,susc:'1'},
	  complete: function(){ 
	  		$("#image").attr("src","images/"+e.response.newName+'?' + new Date().getTime());
	       $("#imagehidden").val(e.response.newName)
	  },
	  
	});	
}
var onSuccessm=function(e){
    $.ajax({
	  type: "GET",
	  url: 'php/update.php',
	  data: {id:'imagenesindexm',imagen:e.response.newName,susc:'1'},
	  complete: function(){ 
	  		$("#imagem").attr("src","images/"+e.response.newName+'?' + new Date().getTime());
	       $("#imagehiddenm").val(e.response.newName)
	  },
	  
	});	
}
var onSuccess2=function(e){
    $.ajax({
	  type: "GET",
	  url: 'php/update.php',
	  data: {id:'imagenesindex',imagen:e.response.newName,susc:'1'},
	  complete: function(){ 
	  		$("#image2").attr("src","images/"+e.response.newName+'?' + new Date().getTime());
	       $("#imagehidden2").val(e.response.newName)
	  },
	  
	});	
}
var onSuccessSlide=function(e){
    $.ajax({
	  type: "GET",
	  url: 'php/crear.php',
	  data: {id:'imagenesindex',imagen:e.response.newName,susc:'1'},
	  complete: function(){ 
	  		var listView = $("#listView").data("kendoListView");
			listView.dataSource.read(); 
	  },
	  
	});	
}
var onSuccessSlide_m=function(e){
    $.ajax({
	  type: "GET",
	  url: 'php/crear.php',
	  data: {id:'imagenesindex_m',imagen:e.response.newName,susc:'1'},
	  complete: function(){ 
	  		var listView = $("#listView_m").data("kendoListView");
			listView.dataSource.read(); 
	  },
	  
	});	
}
var onSuccess3=function(e){
    $.ajax({
	  type: "GET",
	  url: 'php/update.php',
	  data: {id:'imagenesindex',imagen:e.response.newName,susc:'1'},
	  complete: function(){ 
	  		$("#image3").attr("src","images/"+e.response.newName+'?' + new Date().getTime());
	       $("#imagehidden3").val(e.response.newName)
	  },
	  
	});	
}
var onSuccess4=function(e){
    $.ajax({
	  type: "GET",
	  url: 'php/update.php',
	  data: {id:'imagenesindex',imagen:e.response.newName,susc:'1'},
	  complete: function(){ 
	  		$("#image4").attr("src","images/"+e.response.newName+'?' + new Date().getTime());
	       $("#imagehidden4").val(e.response.newName)
	  },
	  
	});	
}


function getFileInfo(e) {
	return $.map(e.files, function(file) {
		var info = file.name+'.'+file.extension;
		return info;
	}).join(", ");
}
<!-- Initialize the Grid -->
$(document).ready(function () {	
    
    
    
    
    
    $("#tabstrip").kendoTabStrip({
        animation:  { 
            open: {
                effects: "fadeIn"
            }
        }
    });
    
    $("#descripcion").kendoEditor({
        tools: [
            "bold",
            "italic",
            "underline",
            "justifyLeft",
            "justifyCenter",
            "justifyRight",
            "justifyFull",
            "insertUnorderedList",
            "insertOrderedList",
            "indent",
            "outdent",
            "createLink",
            "unlink",
            "foreColor",
            "cleanFormatting",
            "fontSize",
            
        ]
     });
    $("#descripcion5").kendoEditor({
        tools: [
            "bold",
            "italic",
            "underline",
            "justifyLeft",
            "justifyCenter",
            "justifyRight",
            "justifyFull",
            "insertUnorderedList",
            "insertOrderedList",
            "indent",
            "outdent",
            "createLink",
            "unlink",
            "foreColor",
            "cleanFormatting",
            "fontSize",
                
        ]
     });
     $("#descripcion2").kendoEditor({
        tools: [
            "bold",
            "italic",
            "underline",
            "justifyLeft",
            "justifyCenter",
            "justifyRight",
            "justifyFull",
            "insertUnorderedList",
            "insertOrderedList",
            "indent",
            "outdent",
            "createLink",
            "unlink",
            "foreColor",
            "cleanFormatting",
            "fontSize",
                
        ]
     });
     $("#descripcion3").kendoEditor({
        tools: [
            "bold",
            "italic",
            "underline",
            "justifyLeft",
            "justifyCenter",
            "justifyRight",
            "justifyFull",
            "insertUnorderedList",
            "insertOrderedList",
            "indent",
            "outdent",
            "createLink",
            "unlink",
            "foreColor",
            "cleanFormatting",
            "fontSize",
                
        ]
     });
    $("#descripcion4").kendoEditor({
        tools: [
            "bold",
            "italic",
            "underline",
            "justifyLeft",
            "justifyCenter",
            "justifyRight",
            "justifyFull",
            "insertUnorderedList",
            "insertOrderedList",
            "indent",
            "outdent",
            "createLink",
            "unlink",
            "foreColor",
            "cleanFormatting",
            "fontSize",
                
        ]
     });
    $("#upload").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccess,
    });
    $("#uploadm").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccessm,
    });
    $("#upload2").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccess2,
    });
    $("#upload3").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccess3,
    });
    $("#upload4").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccess4,
    });
	kendo.culture("es-EC");
    $("#slide").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect2,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccessSlide,
    });	
    $("#slide_m").kendoUpload({
        async: {
            saveUrl: "php/subir-archivo.php",
            autoUpload: true,							
        },
        showFileList: false,
        select: onSelect2,
        upload: function (e) {
            var ext
            var date = new Date();
            $.each(e.files, function(index, value) {
              ext=value.extension
            });		
            e.data = { id:"Subir",archivo:ext};
        },
        success: onSuccessSlide_m,
    });	

    var dsslide = new kendo.data.DataSource({
        transport: {
            read: {
                url: "php/read.php",
                dataType: "json",
                data:{id:"imagenesindex"}
            }
        },
    });
    $("#listView").kendoListView({
        dataSource: dsslide,
        selectable:true,
        template: kendo.template($("#template").html())
    });
    
    var dsslide_m = new kendo.data.DataSource({
        transport: {
            read: {
                url: "php/read.php",
                dataType: "json",
                data:{id:"imagenesindex_m"}
            }
        },
    });
    $("#listView_m").kendoListView({
        dataSource: dsslide_m,
        selectable:true,
        template: kendo.template($("#template").html())
    });
    
    dataSource = new kendo.data.DataSource({
        transport: {
            read:  {
                url: "php/read.php",
                dataType: "json",
                data:{id:"cont_home"}
            },				
        },	
        serverFiltering: false,
    });		
    var grid =$("#grid").kendoGrid({
        dataSource: dataSource,            
        sortable: true,
        toolbar: kendo.template($("#templatetool").html()),
        filterable: {
                            extra: false,
                            operators: {
                                string: {
                                    startswith: "Empieza con",
                                    eq: "Es igual a:",
                                    neq: "No es igual a:"
                                }
                            }
                        },
        columns: [						
            
            {
				template: "<div class='customer-photo'" +
								"style='background-image: url(images/#:data.imagen#);'></div>"
							,
				field: "imagen",
				title: "Imagen",
				width: 100
			},
            { field: "descripcion", title:"Descripcion", template: "<div >#=data.descripcion#</div>"},
            
            { template: kendo.template($("#command-template").html()),width:"200px"}
        ],
    }).data("kendoGrid"); 
    
})
function product(a,uid){
    $("#listView").data("kendoListView").clearSelection();
    $("#listView_m").data("kendoListView").clearSelection();
    dataItem=$(a).parent().data("kendoListView").dataSource.getByUid(uid);
    $("#url_imgs").val(dataItem.url)
    $("#mask_imgs").val(dataItem.mascara)
    $("#item_imgs").val(dataItem.idimagenes_homepage)
     //var listView = $("#listView").data("kendoListView");
     //ds = listView.dataSource.getByUid(a)
    console.log($(a).parent().data("kendoListView").dataSource.getByUid(uid))
    //dataSource.getByUid
}  
function nuevo(e) {     
  $("#editpaquete").append("<div id='editwindow'></div>");
  wnd = $("#editwindow")
  .kendoWindow({
	  title: "Actualizar",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "cont_home.php?idc=<?php echo $_GET['id'] ?>",
	  	  width:"700px",
		  height:"400px",
	      deactivate: function() {
		  var grid = $("#grid").data("kendoGrid");
		  grid.dataSource.read()
		  this.destroy();                                           
	  },	  
  }).data("kendoWindow");	 
  wnd.center().open();
}
function editar(e) {  
  $("#editpaquete").append("<div id='editwindow'></div>");
  wnd = $("#editwindow")
  .kendoWindow({
	  title: "Actualizar",
	  modal: true,
	  visible: false,
	  resizable: false,
	  iframe: true,
	  open: function (e) {
		  this.wrapper.css({ top: 30 });
	  },		
	  content: "cont_home.php?id="+e,
	  	  width:"700px",
		  height:"600px",
	      deactivate: function() {
		  var grid = $("#grid").data("kendoGrid");
		  grid.dataSource.read()
		  this.destroy();                                           
	  },	  
  }).data("kendoWindow");	 
  wnd.center().open();
}
function eliminar(e) {
  if (confirm('Desea Eliminar este registro?')) {   
  $.ajax({
	async: false,
	type: "GET",
	url: 'php/delete.php',
	data: {id:'cont_home',ide:e},
	success: function(response) {
		if ($.trim(response)!='') {
		  alert (response);
		} else{		  	
		  var grid = $("#grid").data("kendoGrid");
		  grid.dataSource.read()	
		}
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
      <style>
                #grid .k-grid-toolbar
                {
                    padding: .6em 1.3em;
                }
                .category-label
                {
                    vertical-align: middle;
                    padding-right: .5em;
                }
                #category
                {
                    vertical-align: middle;
                }
                .toolbar {
                    float: right;
                }
            </style>
<style>
                #grid .k-grid-toolbar
                {
				background:#979797
                   
                }
				.Menulabel { color:#FC0 }
                
            </style>  
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>	
  
<style>

#grid22 .k-grid-toolbar{
  background: #866464
}
#grid32 .k-grid-toolbar{
  background: #c7bcbf
}
    
</style>
<style scoped>
        .demo-section {
            border: 0;
            background: none;
        }
        #listView {
            padding: 10px;
            margin-bottom: -1px;
        }
        .product {
            float: left;
            position: relative;
            width: 150px;
            height: 110px;
            margin: 10px;
            padding: 0;
        }
        .product img {
            width: 150px;
            height: 110px;
        }
		.product button {
            width: 110px;
			height:30px;
        }
        .product h3 {
            margin: 0;
            padding: 3px 5px 0 0;
            max-width: 96px;
            overflow: hidden;
            line-height: 1.1em;
            font-size: .9em;
            font-weight: normal;
            text-transform: uppercase;
            color: #999;
        }
        .product p {
            visibility: hidden;
        }
        .product:hover p {
			cursor:move;
            visibility: visible;
            position: absolute;
            width: 150px;
            height: 110px;
            top: 0;
            margin: 0;
            padding: 0;
			text-align:center;
            line-height: 110px;			           
            color:#FFFFFF;
            background-color: rgba(0,0,0,0.75);
            transition: background .2s linear, color .2s linear;
            -moz-transition: background .2s linear, color .2s linear;
            -webkit-transition: background .2s linear, color .2s linear;
            -o-transition: background .2s linear, color .2s linear;
        }
		.product:hover p a i {			
			color:#FFFFFF; position:absolute; margin:5px 55px 
        }
        .k-listview:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden; 
        }
        .product.k-state-selected {
            width: 170px;
            height: 130px;
            margin: 0px;
            border: solid;
            border-width: 4px;
            border-color: #e27462;
        }
        .product.k-state-selected img, .product:hover.k-state-selected p:hover{
            width: 170px;
            height: 130px;
            
        }
        
    </style>
  </body>
</html>
