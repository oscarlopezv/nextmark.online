
<?php
session_start();
include_once("admin/php/conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="M_Adnan" />
<!-- Document Title -->
<title>Citas | Membresía Salud</title>

<!-- Favicon -->
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#000000">   
<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<style>
    .dropdown-menu{
        max-height: 180px !important
    }
</style>
<!-- StyleSheets -->
<link rel="stylesheet" href="css/ionicons.min.css">
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css?v=1">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/vendors/jquery/jquery.min.js"></script>  
  
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="js/dropzone/basic.css">
    <link rel="stylesheet" href="js/dropzone/dropzone.css">
    <script src="/js/dropzone/dropzone.js"></script>

<!-- COLORS -->
<link rel="stylesheet" id="color" href="css/colors/blue.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- JavaScripts -->
<script src="js/vendors/modernizr.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- LOADER ===========================================-->
<div id="loader">
  <div class="loader">
    <div class="position-center-center"> <img src="images/logo.png" alt="">      
      
      <div class="loading">
      	<div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Wrapper -->
<div id="wrap"> 
  
  <!-- Top bar -->
  <div class="top-bar">
    <div class="container">
        <div class="row">
      <div class="col-md-6">
        <ul class="row">
          <li class="margin-right-20">
            <p><i class="fa fa-phone margin-right-10"></i>  +593980796924 - +593939908465</p>
          </li>
          <li>
            <p><i class="fa fa-envelope-o margin-right-10"></i> info@nextmark.online</p>
          </li>
        </ul>
      </div>
      
      <!-- Social Icon -->
      <div class="col-md-6 text-right social-top"> <a href="https://www.facebook.com/nextmarktravel/"><i class=" fa fa-facebook"></i></a><a href="https://www.instagram.com/nextmarktravel/"><i class=" fa fa-instagram"></i></a></div>
    </div>
        </div>
  </div>
  
  <!-- Header -->
  <header class="header coporate-header">
    <div class="sticky">
      <div class="container">
        <div class="logo"> <a href="index.php"><img src="images/logo.png" alt=""></a> </div>
        
        <!-- Nav -->
        <nav>
          <ul id="ownmenu" class="ownmenu">
            <li><a href="index.php">Inicio</a>
              
            </li>
            <li   class="active"><a href="citas.php">Citas</a> 
              
            </li>
            <li><a href="reembolso.php">Reembolso</a>
              
            </li>
            <li><a href="nosotros.php">Nosotros</a>
              
            </li>
            <li><a href="contactanos.php">Contactanos</a>
              
            <li class="right btnlogin">
             <a href="#."> 
              <?php
                if ($_SESSION['mail']!=''){
             ?>
             <i class="hidden-xs fa fa-user"></i><span ><?php echo $_SESSION['nombres'] ?></span></a>
              <ul class=" dropdown animated-3s fadeInUp">
                  <li> <a href="Javascript:" data-toggle="modal" data-target="#modalqr">Codigo Qr</a>  </li>
                <li> <a href="procesar/logout">Cerrar sesión</a>
                  </li>
                  
                </ul>
              
              <?php
                } else {
              ?>
              <i class="hidden-xs fa fa-user"></i><span >Login</span></a>
              <ul class="login dropdown animated-3s fadeInUp">
                <li>
                
                   <form  data-parsley-validate method="post" action="procesar/login">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="mail" required placeholder="Ingrese su email">
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Password">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </li>
              </ul>
                <?php } ?>
            </li>
            
            
            
            
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!-- End Header -->   
  
  
  <!-- Content -->
  <div id="content">

    
    <!-- Conatct Pages  -->
    <section>
      
      <div class="container">
        <div class="row padding-top-40 padding-bottom-40">
            
           
            
          <!-- Phone Number  -->
          <div class="col-md-4 animate fadeInUp" data-wow-delay="0.4s">
            <div class="icon-box ib-style-1 ib-circle ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-text-alt i-xlarge dark-text">
              <div class="ib-icon"> <i class="fa fa-mobile text-primary"></i> </div>
              <div class="ib-info text-dark">
                <p> +593980796924 - +593939908465</p>
                
              </div>
            </div>
          </div>
          
          <!-- Address -->
          <div class="col-md-4 animate fadeInUp" data-wow-delay="0.6s">
            <div class="icon-box ib-style-1 ib-circle ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-text-alt i-large">
              <div class="ib-icon"> <i class="fa fa-map-marker text-primary"></i> </div>
              <div class="ib-info text-dark">
                <p>av. Juan Tanca Marengo Edificio Francisco Sánchez  Piso 2- Oficina 5</p>
                
              </div>
            </div>
          </div> 
          
          <!-- Email  -->
          <div class="col-md-4 animate fadeInUp" data-wow-delay="0.8s">
            <div class="icon-box ib-style-1 ib-circle ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-text-alt i-large">
              <div class="ib-icon"> <i class="fa fa-envelope-o text-primary"></i> </div>
              <div class="ib-info text-dark">
                <p class="no-margin-bottom"><a href="#." class="text-dark">info@nextmark.online</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <!-- Contact  -->
      
    </section>
      
      
    <section class="padding-top-10 padding-bottom-80 pages-in chart-page">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-8">
                <?php 
                if ($_SESSION['mail']!=''){  
                ?>
                <h5 class="font-14px margin-bottom-30 letter-space-2">SEPARE SU CITA</h5>
                  
                <form action="php/proccess.php" id="form" method="post">
                  <ul class="row">
                    
                    <!-- *COUNTRY -->
                    <li class="col-md-12">
                      <label> *CIUDAD
                        <select class="selectpicker" name="ciu" requiredds>
                          <?php
                           $query_ciu="select * from ciudades order by ciudad" ;
                           $res_ciu=mysql_query($query_ciu);
                           while ($row_ciu=mysql_fetch_assoc($res_ciu)){
                           ?>
                          <option><?php echo $row_ciu['ciudad'] ?></option>
                          <?php } ?>
                        </select>
                      </label>
                    </li>
                    <!-- *especialidad -->
                    <li class="col-md-12">
                      <label> *ESPECIALIDAD
                        <select class="selectpicker" name="esp" requiredds>
                          <?php
                           $query_ciu="select * from especialidades order by especialidad" ;
                           $res_ciu=mysql_query($query_ciu);
                           while ($row_ciu=mysql_fetch_assoc($res_ciu)){
                           ?>
                          <option><?php echo $row_ciu['especialidad'] ?></option>
                          <?php } ?>
                        </select>
                      </label>
                    </li>
                    <!-- Name -->
                    <li class="col-md-6">
                      <label> *NOMBRES (*)
                        <input type="text" requiredds name="nom" value="" placeholder="">
                      </label>
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label> *APELLIDOS (*)
                        <input type="text" requiredds name="ape" value="" placeholder="">
                      </label>
                    </li>
                    <li class="col-md-12">
                      <label> *MAIL (*)
                        <input type="text" requiredds name="mail" value="" placeholder="">
                      </label>
                    </li>
                  
                      
                    <li class="col-md-12">
                      <label> *CIUDAD
                        <select class="selectpicker" name="centro" requiredds>
                          <?php
                           $query_ciu="select * from centros_salud order by centro" ;
                           $res_ciu=mysql_query($query_ciu);
                           while ($row_ciu=mysql_fetch_assoc($res_ciu)){
                           ?>
                          <option><?php echo $row_ciu['centro'] ?></option>
                          <?php } ?>
                        </select>
                      </label>
                    </li>
                    
                    <li class="col-md-6"> 
                      <!-- COMPANY NAME -->
                      <label>RANGO DE FECHAS (*)
                        <input type="text" requiredds class="col-md-6" id="fdesde" name="desde" value="" placeholder="DESDE">
                        
                      </label>
                    </li>
                    <li class="col-md-6"> 
                      <!-- COMPANY NAME -->
                      <label>&nbsp;
                        <input type="text" requiredds class="col-md-6" id="fhasta" name="hasta" value="" placeholder="HASTA">
                        
                      </label>
                    </li>
                    <div class="col-md-12 alert alert-warning alert-dismissible style-2" style="display:none" id="error_login"></div>
                      <input type="hidden" name="id" value="cita"/>
                    <li class="col-sm-12">
                      <button type="button" value="enviar" class="btn btn-small btn-dark pull-right" id="btn_submit" onClick="form_submit()">ENVIAR</button>
                    </li>
                    
                  </ul>
                </form>
                <?php 
                } else {
                    echo 'Debe iniciar sesión para solicitar citas';
                }
                ?>
              </div>
              
              <!-- SUB TOTAL -->
              <div class="col-md-4 hidden-xs">
                <img class="col-md-12 mt-5" src="images/citas.jpeg"/>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- End Content --> 

  <!-- Footer -->
  <footer id="footer">
    <div class="footer-wrapper"> 
      
      <!-- Footer Top -->
      <div class="footer-top">
        <div class="footer-top-wrapper">
          <div class="container">
            <div class="row"> 
              <!-- About Block -->
              <div class="col-md-6 col-offset-3">
                <div class="block block-about">
                  <h3 class="block-title no-underline"><span class="text-primary">Membresía Salud</span></h3>
                  <div class="block-content">
                    <p>MEMBRESÍA SALUD, asesoramos a nuestros Clientes, Familia y Patrimonio, en su protección, respaldo, progreso y tranquilidad, con un servicio integral y personalizado en seguros de Salud, vida, con un equipo de trabajo capacitado y el uso adecuado de la tecnología.</p>
                    <img class="footer-logo" src="images/logo_blanco.png" alt="" /> </div>
                </div>
              </div>
              <!-- End About Block --> 
              
              <!-- Footer Links Block -->
              
              <!-- End Footer Links Block --> 
              
              
              
              
              <!-- End Instagram Widget Block --> 
              
            </div>
          </div>
        </div>
      </div>
      <!-- End Footer Top --> 
      
      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <div class="footer-bottom-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-md-6 copyright">
                <p>&copy; Copyright. GEEKDEV.EC</p>
              </div>
              <div class="col-md-6 social-links">
                <ul class="right">
                    
                    
                  <li><a href="https://www.facebook.com/nextmarktravel/"><i class=" fa fa-facebook"></i></a></li>
                  <li><a href="https://www.instagram.com/nextmarktravel/"><i class=" fa fa-instagram"></i></a></a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Footer Bottom --> 
    </div>
  </footer>
<div class="modal fade" id="modalqr" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <h5>Escanee el codigo QR</h5>
              
            <img src="qr-generator.php" style="width:250px; height:250px" />  
          </div>
          
        </div>
      </div> 
    </div> 
  <!-- End Footer --> 
  
  <!-- GO TO TOP --> 
  	<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 

<!-- End Page Wrapper -->
<!-- JavaScripts --> 

<script src="js/vendors/wow.min.js"></script> 
<script src="js/vendors/bootstrap.min.js"></script> 
<script src="js/vendors/own-menu.js"></script> 
<script src="js/vendors/flexslider/jquery.flexslider-min.js"></script> 
<script src="js/vendors/jquery.countTo.js"></script> 
<script src="js/vendors/jquery.isotope.min.js"></script> 
<script src="js/vendors/jquery.bxslider.min.js"></script> 
<script src="js/vendors/owl.carousel.min.js"></script> 
<script src="js/vendors/jquery.sticky.js"></script> 
<script src="js/vendors/color-switcher.js"></script>
<script src="js/vendors/parsley.min.js"></script>
<script src="js/vendors/pasley.min.es.js"></script>
<script src="js/ds.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="js/zap.js"></script>

<!-- begin map script--> 

<script type="text/javascript">
/*==========  Map  ==========*/
Dropzone.autoDiscover = false;

$( function() {
   
    var dateFormat = "yy-mm-dd",
      from = $( "#fdesde" )
        .datepicker({
            dateFormat:"yy-mm-dd"
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#fhasta" ).datepicker({
          dateFormat:"yy-mm-dd"
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
        
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
    
    
} );

</script>
 
</body>
</html>