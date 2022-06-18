<!DOCTYPE html>
<html lang="sr" dir="ltr">
<head>

	<meta charset="utf-8">
	<title>Autoservis - RVE</title>

	<!-- jquery -->
<script src="dodaci/jQuery/jQuery 3.5.1.min.js"></script>


<!-- jquery -->



<!-- bootstrap -->
<link rel="stylesheet" id="dod_css" href="dodaci/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dodaci/bootstrap/css/bootstrap-select.css" /> <!-- dodatak za multi select -->
<script src="dodaci/bootstrap/js/bootstrap.bundle.min.js"></script> <!-- dodatak za multi select -->
<script src="dodaci/bootstrap/js/bootstrap-select.min.js"></script> <!-- dodatak za multi select -->
<!-- <script src="dodaci/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script> -->
<!-- <script src="dodaci/bootstrap/js/bootstrap.popper.min.js" crossorigin="anonymous"></script> -->
<!-- bootstrap -->


<script src='dodaci/fontawesome/js/all.js' crossorigin='anonymous'></script>  <!---  ikonica u kalendaru i ostale fa fa ikonice --->



<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 

<!-- moje scripte -->
<script src="src/js/glv_script/script.js"></script>
<!-- moje scripte -->

<!-- moj css -->
<link rel="stylesheet" type="text/css" href="src/css/style-admin.css">
<!-- moj css -->

<!-- datatable -->

<link rel="stylesheet" type="text/css" href="dodaci/datatable/datatables.min.css"/>
<script type="text/javascript" src="dodaci/datatable/datatables.min.js"></script>
<!-- datatable -->



<script src="dodaci/sweetalert/sweetalert.min.js"></script>


<meta name="description" content="Aplikacija za brzo i jednostavno online rezervisanje stolova u restoranima">
<meta name="keywords" content="Rezervacija, brzo, jednostavno, online, restorani,beograd">
<meta name="author" content="Filip Ginder">
<meta charset="utf-8">
<link rel="shortcut icon" href="slike/favicon.ico">
<link rel="apple-touch-icon" href="slike/favicon.png">
<link rel="icon" sizes="192x192" href="slika/favicon.png">

          










</head>
<body> 

<img src="slike/favicon.png" style="display:none;" alt="logo">
<!--- <div id="dugme_za_povratak_na_vrh"><img src="slike/go-to-the-top.png" alt="top"></div>    DUGME ZA POVRATAK NA VRH STRANICE --->

<!--- <div id="wait"><img src='slike/loading.gif' alt="loading" width="100" height="100" /></div>    WAIT GIF  --->




<?php 
      
      include ('stranice/glv/navigacija.php');
      include ('stranice/glv/glv_main.php');

      include ('stranice/glv/servisna_knjizica.php');

   //   include ('stranice/obaveze/prihvatanje_uslova.php');

      
 ?>










</body>
</html>