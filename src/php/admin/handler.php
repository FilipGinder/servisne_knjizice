<?php 
require_once 'class.php';



if(isset($_POST['verifikacija_pregled_svih_klijenata']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->pregled_svih_klijenata();
  exit(json_encode($rezultat));
}

if(isset($_POST['verifikacija_dod_nov_klijenta']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->dod_nov_klijenta();
  exit(json_encode($rezultat));
}
if(isset($_POST['verifikacija_dod_nov_vozila']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->dod_nov_vozila();
  exit(json_encode($rezultat));
}

if(isset($_POST['verifikacija_sve_o_klijentu']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->sve_o_klijentu();
  exit(json_encode($rezultat));
}


if(isset($_POST['verifikacija_sva_klijentova_vozila']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->sva_klijentova_vozila();
  exit(json_encode($rezultat));
}

if(isset($_POST['verifikacija_odabir_vozila']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->odabir_vozila();
  exit(json_encode($rezultat));
}

if(isset($_POST['verifikacija_svi_servisi_ovog_vozila']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->svi_servisi_ovog_vozila();
  exit(json_encode($rezultat));
}

if(isset($_POST['verifikacija_izm_podataka_ili_dodavanje_nov_servisa']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->izm_podataka_ili_dodavanje_nov_servisa();
  exit(json_encode($rezultat));
}

if(isset($_POST['verifikacija_dodavanje_jos_jednog_vozila']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->dodavanje_jos_jednog_vozila();
  exit(json_encode($rezultat));
}

if(isset($_POST['verifikacija_pretraga_knjizica']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->pretraga_knjizica();
  exit(json_encode($rezultat));
}

if(isset($_POST['verifikacija_svi_servisi_vozila']))
{ 
  $objekat = new class_admin();
  $rezultat = $objekat->svi_servisi_vozila();
  exit(json_encode($rezultat));
}

?>