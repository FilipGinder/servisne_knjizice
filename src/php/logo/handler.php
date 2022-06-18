<?php 
require_once 'class.php';



if(isset($_POST['verifikacija_logovanje']))
{
  $objekat = new class_log();
  $rezultat = $objekat->logovanje();
  exit(json_encode($rezultat));
}



if(isset($_POST['verifikacija_za_handler_logout']))
{
  $objekat = new class_log();
  $rezultat = $objekat->logout();
  exit(json_encode($rezultat));
}



// if(isset($_POST['verifikacija_kreiranje_slanje_emaila_tokena']))
// {
//   $objekat = new class_log();
//   $rezultat = $objekat->kreiranje_slanje_emaila_tokena();
//   exit(json_encode($rezultat));
// }


// if(isset($_POST['verifikacija_provera_tokena']))
// {
//   $objekat = new class_log();
//   $rezultat = $objekat->provera_tokena();
//   exit(json_encode($rezultat));
// }

?>