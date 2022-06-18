<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Online rezervacije</title>

<!-- jquery -->
<script src="../dodaci/jQuery/jQuery 3.5.1.min.js"></script>
<!-- jquery -->


<!-- bootstrap -->
<link rel="stylesheet" href="../dodaci/bootstrap/css/bootstrap.min.css">
<script src="../dodaci/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
<!-- bootstrap -->

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 


<!-- moje scripte -->
<script src="../src/js/login/log.js"></script>
<!-- moje scripte -->


 <script src="../dodaci/jQuery/jQuery-vibracija-ui-1.13.1/jquery-ui.js"></script>  <!-- DODATAK ZA VIBRACIJU INPUTA PRILIKOM PRAZNOG POLJA-->


<!-- moj css -->
<link rel="stylesheet" type="text/css" href="../src/css/style-login-registracija.css">
<!-- moj css -->



<script src="../dodaci/sweetalert/sweetalert.min.js"></script>



<link rel="shortcut icon" href="../slike/favicon.ico">
<link rel="apple-touch-icon" href="../slike/favicon.png">
<link rel="icon" sizes="192x192" href="../slika/favicon.png">


</head>
<body class="d-flex justify-content-between"> 





<?php
if(isset($_COOKIE['Un']))
{

	?>
<script type="text/javascript">

	$(document).ready(function(){

     $("#email_login").val("<?php echo  $_COOKIE['Un'] ?>");

	})
</script>

	<?php
}
//OVIM PUNIMO INPUTE SA KOLACICIMA AKO IH IMA
 ?>


 

<!-- col-sm col col-md col-lg-12 -->

<div  id="login_box_ceo">

	<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" id="login_box">
		
		<span>Email - korisničko ime</span>
		<input type="text" name="" id="email_login">
		<br>
		<br>
		<span>Lozinka</span>
		<input type="password" name="" id="password_login">
		<br>
<!-- 
		<div id="div_token">
			<br>
			<span>Unesite kod koji Vam je poslat na email</span>
			<input type="text" name="" id="token_unos" maxlength="6">
			<br>
        </div>
 -->
		<p id="capslock">UPOZORENJE! Caps lock je ukljucen.</p>
		<br>
		<input type="checkbox" name="" id="checkbox_zapamti">&nbsp;
		<span>Zapamti me</span>
		<br>
		<div id="login_dugme_div">
		
			<button type="button" class="btn btn-primary" id="nazad"><i class="bi-arrow-bar-left"></i> <a href="../index.php">Nazad</a></button>
			<a href="">Zaboravili ste sifru?</a> &nbsp;



			<button type="button" id="logovanje"  class="btn btn-dark">Prijavite se<i class="bi-arrow-bar-right"></i></button>
			
		</div>
		
	</div>
 
</div>

	








</body>
</html>