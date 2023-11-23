<?php 
include_once("php/conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
$rowd['imagen']='jpg.png';
if (isset($_GET['id'])){
$queryd="select * from contenido_homepage where idcontenido_homepage=".$_GET["id"];
$resultadod=mysql_query($queryd) or die (mysql_error());
$rowd=mysql_fetch_array($resultadod);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="lib/kendoui/styles/kendo.common.min.css" rel="stylesheet" />
<link href="lib/kendoui/styles/kendo.default.min.css" rel="stylesheet" />
<script src="lib/kendoui/js/jquery.min.js"></script>
<script src="lib/kendoui/js/kendo.all.min.js"></script>
<script src="lib/kendoui/js/cultures/kendo.culture.es-EC.min.js" type="text/javascript"> </script>
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />   
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">
<!-- Demo page code -->
<style>
h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{font-family:inherit;font-weight:500;line-height:1.1;color:inherit}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small,.h1 small,.h2 small,.h3 small,.h4 small,.h5 small,.h6 small,h1 .small,h2 .small,h3 .small,h4 .small,h5 .small,h6 .small,.h1 .small,.h2 .small,.h3 .small,.h4 .small,.h5 .small,.h6 .small{font-weight:400;line-height:1;color:#777}h1,.h1,h2,.h2,h3,.h3{margin-top:20px;margin-bottom:10px}h1 small,.h1 small,h2 small,.h2 small,h3 small,.h3 small,h1 .small,.h1 .small,h2 .small,.h2 .small,h3 .small,.h3 .small{font-size:65%}h4,.h4,h5,.h5,h6,.h6{margin-top:10px;margin-bottom:10px}h4 small,.h4 small,h5 small,.h5 small,h6 small,.h6 small,h4 .small,.h4 .small,h5 .small,.h5 .small,h6 .small,.h6 .small{font-size:75%}h1,.h1{font-size:36px}h2,.h2{font-size:30px}h3,.h3{font-size:24px}h4,.h4{font-size:18px}h5,.h5{font-size:14px}h6,.h6{font-size:12px}</style>
<style type="text/css">
ul{display:block}.textboxlist{cursor:text;width:100%}.textboxlist-ul{overflow:hidden;margin:0;padding:3px 4px 0;border:1px solid #CCC}.textboxlist-li{list-style-type:none;float:left;display:block;padding:0;margin:0 5px 3px 0;cursor:default}.textboxlist-li-editable{border:1px solid #fff}.textboxlist-li-editable-input{border:0;padding:2px 0;padding-bottom:0;height:14px}.textboxlist-li-editable-input:focus{outline:0}.textboxlist-li-box{position:relative;line-height:18px;padding:0 5px;border:1px solid #CAD8F3;background:#DEE7F8;cursor:default}.textboxlist-li-box-deletable{padding-right:15px}.textboxlist-li-box-deletebutton{position:absolute;right:4px;top:6px;display:block;width:7px;height:7px;font-size:1px;background:url(img/close.gif)}.textboxlist-li-box-deletebutton:hover{border:none;background-position:7px;text-decoration:none}div{display:block}
</style>
<style>
    .datcheck{margin-right: 20px}
</style>
  </head>
  <body style="background:#FFFFFF">

                <table><tr><td valign="top" style="padding:5px;">
                 <h5>Imagen:</h5>
                <img id="logo" style="width:150px; display:inline-block" src="images/<?php echo $rowd['imagen'] ?>"> 
                <input type="hidden" id="logohidden" value="<?php echo $rowd['imagen'] ?>"><p></p>                
                <input name="archivo" id="uploadl" type="file"/> <br> 
                 <h5>Detalle :</h5>
                <textarea id="descripcion" ><?php echo html_entity_decode($rowd['descripcion']) ?></textarea><br>
                   
                
                         
    			<p></p>
                <?php if (isset($_GET['id'])){ ?>
                <button class="k-button" id="updateb" style="padding-top:5px">Update</button>
                <?php } else { ?>
                <button class="k-button" id="crearb" style="padding-top:5px">Guardar</button>
                <?php } ?>
            
                </td></tr></table>
      <div id="editinmueble"></div>
    </div>

<script>

  
$( "#crearb" ).click(function() {
  if ($("#nombre").val()=='' ){
      alert ('Debe llenar los campos principales')
      return;
  }
  $.ajax({
	  type: "POST",
	  url: 'php/crear.php',
	  data: {id:'cont_home', imagen:$("#logohidden").val(), desc:window.btoa($("#descripcion").data("kendoEditor").value())},
	  success: function(){ 					
	  			alert ('Su registro se ha grabado')
				window.parent.$("#editwindow").data("kendoWindow").close(); 
			},	
	  error: function() {  alert( "Ha ocurrido un error" )}  
	});
});

$( "#updateb" ).click(function() {
  if ($("#nombre").val()=='' ){
      alert ('Debe llenar los campos principales')
      return;
  }
  $.ajax({
	  type: "POST",
	  url: 'php/update.php',
	  data: {id:'cont_home', imagen:$("#logohidden").val(), desc:window.btoa($("#descripcion").data("kendoEditor").value()),idcont:'<?php echo $_GET['id'] ?>'},
	  success: function(){ 					
	  			alert ('Su registro ha sido actualizado')
				window.parent.$("#editwindow").data("kendoWindow").close(); 
			},	
	  error: function() {  alert( "Ha ocurrido un error" );}  
	});
});

var onSelect2 = function(e) {
    $.each(e.files, function(index, value) {
	  ok=[".jpg",".JPG",".gif",".GIF",".PNG",".png"]
      if($.inArray(value.extension,ok)==-1) {
        e.preventDefault();
        alert("Por favor cargue un archivo tipo imagen");
      }
    });
};
var onSuccess=function(e){
	$("#logo").attr("src","images/"+e.response.newName+'?' + new Date().getTime());
	$("#logohidden").val(e.response.newName)
}

var onSuccess2=function(e){
	$.ajax({
	  type: "GET",
	  url: 'php/crear.php',
	  data: {id:'imagenesnoticias',imagen:e.response.newName,noticia:'<?php echo $_GET["id"] ?>'},
	  complete: function(){ 
	  		var listView = $("#listView").data("kendoListView");
			listView.dataSource.read();
	  },	  
	});
}

function getFileInfo(e) {
	return $.map(e.files, function(file) {
		var info = file.name+'.'+file.extension;
		return info;
	}).join(", ");
}
$(document).ready(function() {
    
      


	
$("#uploadl").kendoUpload({
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
	success: onSuccess,
});	


var defaultTools = kendo.ui.Editor.defaultTools;
defaultTools["insertParagraph"].options.shift = true;
$("#descripcion").kendoEditor({
            tools: [
                "viewHtml",
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
                "backColor",
				"cleanFormatting",
                "fontSize",
            ]
        });
    


});

</script>

<script src="lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
$("[rel=tooltip]").tooltip();
$(function() {
	$('.demo-cancel-click').click(function(){return false;});
});
</script>
<style>
.togglebox{z-index:2050;display:inline-block;border:1px solid #AAA;width:90px;height:26px;position:relative;left:4px;border-radius:0;color:#FFF;font-weight:700;overflow:hidden;box-shadow:0 1px 0 #FFF}.togglebox label{z-index:2050;width:200%;height:100%;line-height:30px;border-radius:.4em;position:absolute;top:0;left:0;z-index:1;font-size:1.1em;cursor:pointer;-webkit-transition:.12s;-moz-transition:.12s;transition:.12s}.togglebox label::before{z-index:2050;content:'SI';width:62px;float:left;margin-right:-16px;padding-right:13px;text-align:center;background:#007FEA;text-shadow:0 -1px 0 #093B5C;box-shadow:0 4px 5px -2px rgba(0,0,0,0.3) inset}.togglebox label b{z-index:2050;display:block;height:100%;width:30px;float:left;position:relative;z-index:1;border:1px solid #AAA;background:#F6F6F6;box-shadow:0 4px 0 -2px #F1F1F1 inset,0 2em 2em -2em #AAA inset,0 0 2px rgba(0,0,0,.5);border-radius:3px}.togglebox label:hover b{z-index:2050;background:#E5E5E5}.togglebox label::after{z-index:2050;content:'NO';width:62px;float:left;margin-left:-15px;padding-left:13px;text-align:center;color:#999;background:#FFF;box-shadow:0 4px 5px -2px rgba(0,0,0,0.3) inset}.togglebox input:checked ~ label{z-index:2050;left:-60px}.demo-section{border:0;background:none}#listView{padding:10px;margin-bottom:-1px}.product{float:left;position:relative;width:111px;height:170px;margin:0;padding:0}.product img{width:110px;height:110px}.product button{width:110px;height:30px}.product h3{margin:0;padding:3px 5px 0 0;max-width:96px;overflow:hidden;line-height:1.1em;font-size:.9em;font-weight:400;text-transform:uppercase;color:#999}.product p{visibility:hidden}.product:hover p{cursor:move;visibility:visible;position:absolute;width:110px;height:110px;top:0;margin:0;padding:0;text-align:center;line-height:110px;color:#FFF;background-color:rgba(0,0,0,0.75);transition:background .2s linear,color .2s linear;-moz-transition:background .2s linear,color .2s linear;-webkit-transition:background .2s linear,color .2s linear;-o-transition:background .2s linear,color .2s linear}.product:hover p a i{color:#FFF;position:absolute;margin:0 15px}.k-listview:after{content:".";display:block;height:0;clear:both;visibility:hidden}
</style>
</body>
</html>


