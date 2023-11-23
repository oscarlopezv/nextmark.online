<?php
session_start();
    include('php/phpqrcode/qrlib.php');
    
     // Configuring SVG
    
    $dataText   = 'PHP QR Code :)';
    $svgTagId   = 'aaa';
    $saveToFile = false;
    $imageWidth = 250; // px
    
    // SVG file format support
    $svgCode = QRcode::svg('https://salud.nextmark.online/qr/'.$_SESSION['contrato']);
    
    echo $svgCode;