<?php
session_start();
include_once("admin/php/conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="geekdev.ec" />
<!-- Document Title -->
<title>Membresía Salud</title>
 
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
<link rel="manifest" href="images/manifest.json">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#000000">    


<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

<!-- StyleSheets -->
<link rel="stylesheet" href="css/ionicons.min.css">
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css?v=1">
<link rel="stylesheet" href="css/responsive.css">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

<!-- COLORS -->
<link rel="stylesheet" id="color" href="css/colors/blue.css">

<style>
#hoverd {
  <?php if ($_GET['ver']=='y'){ ?>
    display: none;
  <?php } ?>
  position: fixed;
  background: #fff;
  width: 100%;
  height: 100%;
  opacity: 0.9;
    z-index:90000;
	margin-top:-30px;
	overflow:hidden;
}
#flags a{
    text-align: left;
     display: grid; 
     align-items: center;
}          
#flags {
  margin-top: 30px;
  top:30%;
  position: fixed;
  padding: 0px 0px;
  /* height/2 + padding-top */
  text-align: center;
 z-index:909090909090909099;
}
.link-popup{
    color:#000;
    text-align: center
}
a:hover .link-popup {
    color: #2c1eff;
}
@media only screen and (max-width: 1024px) {
    #flags a{
        display: inline-flex;  
    }
}
.row tr, .row tr, .row td, .row div, .row span, .row img, .row table{
    background: transparent !important
}
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>    
    
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://wa.me/593981160259" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
    
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
      <div class="col-md-6 text-right social-top"> 
          
          <a href="https://www.facebook.com/nextmarktravel/"><i class=" fa fa-facebook"></i></a>
          <a href="https://www.instagram.com/nextmarktravel/"><i class=" fa fa-instagram"></i></a>
      </div>
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
            <li class="active"><a href="index.php">Inicio</a>
              
            </li>
            <li><a href="citas.php">Citas</a> 
              
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
  
  <!--======= HOME MAIN SLIDER =========-->
  <section class="home-slider">
    <div class="tp-banner-container">
      <div class="tp-banner-fix">
        <ul>
          <?php
            $query_slide="select * from imagenes_homepage order by `index`";
            $res_slide=mysql_query($query_slide);
            while ($row_slide=mysql_fetch_assoc($res_slide)){
          ?>
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7"> 
            <!-- MAIN IMAGE --> 
            <img src="imgs/<?php echo $row_slide['imagen'] ?>"  alt="home7_slider2"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <!-- LAYERS --> 
              
            
          </li>
          <?php } ?>
        </ul>
      </div> 
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
      
    <?php
      $query="select * from contenido_homepage order by idcontenido_homepage";
      $res=mysql_query($query);
      $a=0;
      while ($row=mysql_fetch_assoc($res)){
          $a++;
          if ($a%2==0){
    ?>
    <!-- Intoro APP -->
    <section class="intro style-4 padding-bottom-80 padding-top-80">
      <div class="container">
        <div class="row"> 
          <!-- APP Img -->
          <div class="col-md-6 animate fadeInRight" data-wow-delay="0.4s"> <img class="img-responsive" src="imgs/<?php echo $row['imagen'] ?> " alt="" > </div>
          
          <!-- Content -->
          <div class="col-md-6 animate fadeInLeft" data-wow-delay="0.4s">
            <div class="relative">
              
              <?php echo $row['descripcion'] ?>    
              
              </div>
          </div>
        </div>
      </div>
    </section>
      <?php } else { ?>
      
      <!-- Intoro APP -->
    <section class="intro style-4 padding-bottom-80 padding-top-80">
      <div class="container">
        <div class="row"> 
          <!-- APP Img -->
          
          
          <!-- Content -->
          <div class="col-md-6 animate fadeInRight" data-wow-delay="0.4s">
            <div class="relative margin-top-20">
              <p>
              <?php echo $row['descripcion'] ?>  
              </p>
              </div>
          </div>
            
            
          <div class="col-md-6 animate fadeInLeft" data-wow-delay="0.4s"> <img class="img-responsive" src="imgs/<?php echo $row['imagen'] ?> " alt="" > </div>    
        </div>
      </div>
    </section>
      
    <?php }} ?>
      
      
    
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
</div>
<!-- End Page Wrapper -->


<!-- JavaScripts --> 
<script src="js/vendors/jquery/jquery.min.js"></script>  
<script src="js/vendors/parsley.min.js"></script>
<script src="js/vendors/pasley.min.es.js"></script>
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

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="js/zap.js"></script>
</body>
</html>