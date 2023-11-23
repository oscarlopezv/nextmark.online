
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
<meta name="author" content="geekdev.ec" />
<!-- Document Title -->
<title>Miembros | Membresía Salud</title>

 
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
<link rel="stylesheet" href="/css/ionicons.min.css">
<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/responsive.css">
<script src="/js/vendors/jquery/jquery.min.js"></script>  
  
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    

<!-- COLORS -->
<link rel="stylesheet" id="color" href="/css/colors/blue.css">
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
    <div class="position-center-center"> <img src="/images/logo.png" alt="">      
      
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
        <div class="logo"> <a href="/index.php"><img src="/images/logo.png" alt=""></a> </div>
        
        <!-- Nav -->
        
      </div>
    </div>
  </header>
  <!-- End Header -->   
  
  
  <!-- Content -->
  <div id="content" style="margin-top:100px; margin-bottom:100px">

    
    <!-- Conatct Pages  -->
    <section>
        
            <div class="col-md-4 col-md-offset-4">
                <h5>Beneficiarios:</h5>
                <ul>
                    <?php
                    $ch = curl_init(); 
                    curl_setopt($ch, CURLOPT_URL, "https://exoeduca.com/procesar/getcontrato/");
                    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
                    curl_setopt($ch, CURLOPT_POSTFIELDS,"contrato=".$_GET['contrato']); 
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    $obj = json_decode($result);
                    curl_close($ch);
                    
                    foreach ($obj as $value) {
                    ?>
                    <li>- <?php  echo $value->nombres.' '.$value->apellidos.' ('.$value->mail.')' ?></li>
                    <?php } ?>
                </ul>
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
    
  <!-- End Footer -->
  
  <!-- GO TO TOP --> 
  	<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 

<!-- End Page Wrapper -->
<!-- JavaScripts --> 

<script src="/js/vendors/wow.min.js"></script> 
<script src="/js/vendors/bootstrap.min.js"></script> 
<script src="/js/vendors/own-menu.js"></script> 
<script src="/js/vendors/flexslider/jquery.flexslider-min.js"></script> 
<script src="/js/vendors/jquery.countTo.js"></script> 
<script src="/js/vendors/jquery.isotope.min.js"></script> 
<script src="/js/vendors/jquery.bxslider.min.js"></script> 
<script src="/js/vendors/owl.carousel.min.js"></script> 
<script src="/js/vendors/jquery.sticky.js"></script> 
<script src="/js/vendors/color-switcher.js"></script>
<script src="/js/vendors/parsley.min.js"></script>
<script src="/js/vendors/pasley.min.es.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="/js/zap.js"></script>
<script src="/js/ds.js"></script>

<!-- begin map script--> 

</body>
</html>