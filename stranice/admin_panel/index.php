<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Online rezervacije</title>

<!-- jquery -->
<script src="../../dodaci/jQuery/jQuery 3.5.1.min.js"></script>
<!-- jquery -->


<!-- bootstrap -->
<link rel="stylesheet" href="../../dodaci/bootstrap/css/bootstrap.min.css">
<script src="../../dodaci/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
<!-- bootstrap -->

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 


<!-- moje scripte -->
<script src="../../src/js/admin/admin_script.js"></script>
<!-- moje scripte -->

<!-- moj css -->
<link rel="stylesheet" type="text/css" href="../../src/css/style-admin.css">
<!-- moj css -->

<script src="../../dodaci/sweetalert/sweetalert.min.js"></script>

<link rel="shortcut icon" href="../../slike/favicon.ico">
<link rel="apple-touch-icon" href="../../slike/favicon.png">
<link rel="icon" sizes="192x192" href="../../slika/favicon.png">


<!-- datatable -->
<link rel="stylesheet" type="text/css" href="../../dodaci/datatable/datatables.min.css"/>
<script type="text/javascript" src="../../dodaci/datatable/datatables.min.js"></script>


<script type="text/javascript" src="../../dodaci/datatable/Dodatak-excel/jszip.min.js"></script> <!-- dodatak za export u excel -->

<link rel="stylesheet" type="text/css" href="../../dodaci/datatable/Dodatak-print/print1.css"/>
<script type="text/javascript" src="../../dodaci/datatable/Dodatak-print/print1.js"></script>

<!-- datatable -->

<!-- select chosen jquery -->
<script src="../../dodaci/chosen_select/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="../../dodaci/chosen_select/chosen.min.css">
<!-- select chosen jquery -->

</head>
<body class="d-flex justify-content-between"> 


	



<div class="container-fluid" id="tabela_klijenata">
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-3 col-sm-12"></div>

			<div class="col-lg-12 col-md-6 col-sm-12 glv_div">
               		<table style="width: 100%;" class="table table-bordered table-striped" id="prikaz_klijenata_za_izm_u_tabeli">

			                <thead>
			                 <tr>
			                   <th><b>R.B</b></th>
			                   <th><b>Klijent</b></th>
			                   <th><b>Telefon</b></th>
			                   <th><b>Email</b></th>			                   
			                   <th><b>Ključ</b></th>	                   
			                 </tr>
			                 </thead>
			                 <tbody id="modal_body_prikaz_klijenata_za_izm">

			                </tbody>
			                <tfoot>
			                 <tr>
			                   <th><b>R.B</b></th>
			                   <th><b>Klijent</b></th>
			                   <th><b>Telefon</b></th>
			                   <th><b>Email</b></th>			                   
			                   <th><b>Ključ</b></th>
			                 </tr>
			                 </tfoot>
			            
			     	</table>
			</div>

			<div class="col-lg-12 col-md-3 col-sm-12"></div>


			<div class="col-lg-12 col-md-12 col-sm-12 dod_nov_klijenta">
                <input type="button" class="btn btn-danger" id="dod_nov_klijenta" value="Dodaj novog klijenta">
			</div>

		</div>
	</div>
</div>


<?php 
	include ('dodavanje_novog_klijenta.php');
	include ('klijent.php');
  ?>

</body>
</html>