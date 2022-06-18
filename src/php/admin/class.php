<?php 

use PHPMailer\PHPMailer\PHPMailer;
include_once "../../../dodaci/PHPMailer/PHPMailer.php";
include_once "../../../dodaci/PHPMailer/Exception.php";
include_once "../../../dodaci/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
class class_admin
{
 
function pregled_svih_klijenata()
{

                    include ('../konekcija/konekcija.php');
                    $upit = "

                    SELECT
                    
                    k.id,
                    k.ime,
                    k.prezime,
                    k.telefon,
                    k.email,            
                    k.unique_key               
                  
                    FROM klijenti k
                    ORDER BY k.id DESC                   
                    ";
                    $rezultat = $konekcija->prepare($upit); 
                    $rezultat->execute();
                    $rezultat->bind_result($id,$ime,$prezime,$telefon,$email,$unique_key);


                    $rezultat_niz = array();

                          while ($rezultat->fetch())
                          {
                           $rezultat_niz[]=array($id,$ime,$prezime,$telefon,$email,$unique_key);
                          }
                          $konekcija->close();
                      exit(json_encode($rezultat_niz));
}


function dod_nov_klijenta(){
    

     $ime_klijenta = $_POST['ime_klijenta'];
     $prezime_klijenta = $_POST['prezime_klijenta'];
     $telefon_klijenta = $_POST['telefon_klijenta'];
     $email_klijenta = $_POST['email_klijenta'];
                   function random_strings($length_of_string)
                   {
                    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    return substr(str_shuffle($str_result), 0, $length_of_string);
                   }
     $unique_key = random_strings(7);


    include ('../konekcija/konekcija.php');
     $upit = "SELECT COUNT(*) FROM klijenti  WHERE unique_key = '$unique_key'";
     $rezultat_provere=$konekcija->prepare($upit);        
     $rezultat_provere->execute();                                                                                
     $rezultat_provere->bind_result($brojj); 
     $rezultat_niz = array();
      while ($rezultat_provere->fetch())
        {
         $rezultat_niz[]=array($brojj);
        }
     $konekcija->close();
     if($brojj == 0) {
         include ('../konekcija/konekcija.php');
         $upit="INSERT INTO klijenti(ime,prezime,telefon,email,unique_key) VALUES('$ime_klijenta','$prezime_klijenta','$telefon_klijenta','$email_klijenta','$unique_key')";
         $rezultat = $konekcija->prepare($upit);
         $rezultat->execute();
         $IDtog_novog_reda_u_bazi = mysqli_insert_id($konekcija); //i ovim odmah vracamo ID tog novog reda u bazi
         $konekcija->close();
         exit(json_encode($IDtog_novog_reda_u_bazi));
     }else{
         exit(json_encode('ponovi'));
     }
                   
                   

     
}



function dod_nov_vozila(){
    

     $naziv_vozila = $_POST['naziv_vozila'];
     $godiste_vozila = $_POST['godiste_vozila'];
     $kubikaza_vozila = $_POST['kubikaza_vozila'];
     $boja_vozila = $_POST['boja_vozila'];
     $kilometraza_vozila = $_POST['kilometraza_vozila'];
     $gorivo = $_POST['gorivo'];
     $id_klijenta = $_POST['id_klijenta'];

     $opis_servisa = $_POST['opis_servisa'];
     


     include ('../konekcija/konekcija.php');
     $upit="INSERT INTO vozila(id_klijenta,naziv,godiste,kubikaza,boja,kilometraza,vrsta_goriva) VALUES($id_klijenta,'$naziv_vozila','$godiste_vozila','$kubikaza_vozila','$boja_vozila','$kilometraza_vozila','$gorivo')";
     $rezultat = $konekcija->prepare($upit);
     $rezultat->execute();
     $IDtog_novog_reda_u_bazi = mysqli_insert_id($konekcija);
     $konekcija->close();


     include ('../konekcija/konekcija.php');
     $upit1="INSERT INTO servisi(id_vozila,kilometraza,opis) VALUES($IDtog_novog_reda_u_bazi,$kilometraza_vozila,'$opis_servisa')";
     $rezultat1 = $konekcija->prepare($upit1);
     $rezultat1->execute();
     $konekcija->close();


     exit(json_encode('uspesno'));

                   
                   

     
}




function sve_o_klijentu(){
    
    $id_klijenta = $_POST['id_klijenta'];
 
              include ('../konekcija/konekcija.php');
                    $upit = "

                    SELECT
                    
                    k.id,
                    k.ime,
                    k.prezime,
                    k.telefon,
                    k.email,
                    k.unique_key            
                  
                    FROM klijenti k
                    WHERE k.ID = $id_klijenta

                    ";
                    $rezultat = $konekcija->prepare($upit); 
                    $rezultat->execute();
                    $rezultat->bind_result($id_klijenta,$ime,$prezime,$telefon,$email,$unique_key);


                    $rezultat_niz = array();

                          while ($rezultat->fetch())
                          {
                           $rezultat_niz[]=array($id_klijenta,$ime,$prezime,$telefon,$email,$unique_key);
                          }
                          $konekcija->close();
                      exit(json_encode($rezultat_niz));            
                   

     
}


function sva_klijentova_vozila(){
    
    $id_klijenta = $_POST['id_klijenta'];
 
              include ('../konekcija/konekcija.php');
                    $upit = "

                    SELECT
                    
                    v.id,
                    v.naziv           
                  
                    FROM vozila v
                    WHERE v.id_klijenta = $id_klijenta
                    ORDER BY v.id DESC

                    ";
                    $rezultat = $konekcija->prepare($upit); 
                    $rezultat->execute();
                    $rezultat->bind_result($id,$naziv);


                    $rezultat_niz = array();

                          while ($rezultat->fetch())
                          {
                           $rezultat_niz[]=array($id,$naziv);
                          }
                          $konekcija->close();
                      exit(json_encode($rezultat_niz));            
                   

     
}

function odabir_vozila(){
    
    $id_vozila = $_POST['id_vozila'];
 
              include ('../konekcija/konekcija.php');
                    $upit = "

                    SELECT
                    
                    v.id,
                    v.naziv,
                    v.godiste,  
                    v.kubikaza,
                    v.boja, 
                    v.kilometraza, 
                    v.vrsta_goriva

                  
                    FROM vozila v
                    WHERE v.id = $id_vozila

                    ";
                    $rezultat = $konekcija->prepare($upit); 
                    $rezultat->execute();
                    $rezultat->bind_result($id,$naziv,$godiste,$kubikaza,$boja,$kilometraza,$vrsta_goriva);


                    $rezultat_niz = array();

                          while ($rezultat->fetch())
                          {
                           $rezultat_niz[]=array($id,$naziv,$godiste,$kubikaza,$boja,$kilometraza,$vrsta_goriva);
                          }
                          $konekcija->close();
                      exit(json_encode($rezultat_niz));            
                   

     
}


function svi_servisi_ovog_vozila(){
    
    $id_vozila = $_POST['id_vozila'];
 
              include ('../konekcija/konekcija.php');
                    $upit = "

                    SELECT
                    
                    s.id,
                    s.kilometraza, 
                    DATE_FORMAT(s.vreme_servisa,'%d/%m/%Y') AS vreme_servisa,
                    s.opis

                  
                    FROM servisi s
                    WHERE s.id_vozila = $id_vozila
                    ORDER BY s.vreme_servisa DESC

                    ";
                    $rezultat = $konekcija->prepare($upit); 
                    $rezultat->execute();
                    $rezultat->bind_result($id,$kilometraza,$vreme_servisa,$opis);


                    $rezultat_niz = array();

                          while ($rezultat->fetch())
                          {
                           $rezultat_niz[]=array($id,$kilometraza,$vreme_servisa,$opis);
                          }
                          $konekcija->close();
                      exit(json_encode($rezultat_niz));            
                   

     
}



function izm_podataka_ili_dodavanje_nov_servisa(){
    
    $id_klijenta = $_POST['id_klijenta'];
    $ime_klijenta_izm = $_POST['ime_klijenta_izm'];
    $prezime_klijenta_izm = $_POST['prezime_klijenta_izm'];
    $telefon_klijenta_izm = $_POST['telefon_klijenta_izm'];
    $email_klijenta_izm = $_POST['email_klijenta_izm'];

    $naziv_vozila = $_POST['naziv_vozila'];
    $godiste_vozila = $_POST['godiste_vozila'];
    $kubikaza_vozila = $_POST['kubikaza_vozila'];
    $boja_vozila = $_POST['boja_vozila'];
    $kilometraza_vozila = $_POST['kilometraza_vozila'];
    $gorivo = $_POST['gorivo'];
    $id_vozila = $_POST['id_vozila'];

    $servis_opis_nov = $_POST['servis_opis_nov'];
    $kilometraza_izm_nova = $_POST['kilometraza_izm_nova'];
    
 
     include ('../konekcija/konekcija.php');
     $upit = "UPDATE klijenti SET  
     ime = '$ime_klijenta_izm', 
     prezime = '$prezime_klijenta_izm' , 
     telefon = '$telefon_klijenta_izm', 
     email = '$email_klijenta_izm'
     WHERE  id = $id_klijenta"; 
     mysqli_query($konekcija, $upit);


     include ('../konekcija/konekcija.php');
     $upit = "UPDATE vozila SET  
     naziv = '$naziv_vozila', 
     godiste = '$godiste_vozila' , 
     kubikaza = '$kubikaza_vozila', 
     boja = '$boja_vozila',
     kilometraza = '$kilometraza_vozila',
     vrsta_goriva = '$gorivo'
     WHERE  id = $id_vozila"; 
     mysqli_query($konekcija, $upit);

     
     if($servis_opis_nov != ""){
      include ('../konekcija/konekcija.php');
      $upit1="INSERT INTO servisi(id_vozila,kilometraza,opis) VALUES($id_vozila,$kilometraza_izm_nova,'$servis_opis_nov')";
      $rezultat1 = $konekcija->prepare($upit1);
      $rezultat1->execute();
      $konekcija->close();
     }
     


            exit(json_encode('uspesno'));
                   
                   

     
}



function dodavanje_jos_jednog_vozila(){
    

     $naziv_vozila_izm = $_POST['naziv_vozila_izm'];
     $godiste_vozila_izm = $_POST['godiste_vozila_izm'];
     $kubikaza_vozila_izm = $_POST['kubikaza_vozila_izm'];
     $boja_vozila_izm = $_POST['boja_vozila_izm'];
     $kilometraza_vozila_izm = $_POST['kilometraza_vozila_izm'];
     $gorivo_vozila_izm = $_POST['gorivo_vozila_izm'];
     $id_klijenta = $_POST['odavran_klijent_izm'];


     


     include ('../konekcija/konekcija.php');
     $upit="INSERT INTO vozila(id_klijenta,naziv,godiste,kubikaza,boja,kilometraza,vrsta_goriva) VALUES($id_klijenta,'$naziv_vozila_izm','$godiste_vozila_izm','$kubikaza_vozila_izm','$boja_vozila_izm','$kilometraza_vozila_izm','$gorivo_vozila_izm')";
     $rezultat = $konekcija->prepare($upit);
     $rezultat->execute();
     $IDtog_novog_reda_u_bazi = mysqli_insert_id($konekcija);
     $konekcija->close();

     exit(json_encode('uspesno'));

                   
                   

     
}


function pretraga_knjizica(){
    

      $pretraga = $_POST['pretraga'];
 
      include ('../konekcija/konekcija.php');
      $upit = "

       SELECT
       
       k.id,
       k.ime,
       k.prezime, 
       k.telefon,
       k.email

    
       FROM klijenti k
       WHERE k.unique_key LIKE '$pretraga'
    

      ";
      $rezultat = $konekcija->prepare($upit); 
      $rezultat->execute();
      $rezultat->bind_result($id,$ime,$prezime,$telefon,$email);


      $rezultat_niz = array();

            while ($rezultat->fetch())
            {
             $rezultat_niz[]=array($id,$ime,$prezime,$telefon,$email);
            }
            $konekcija->close();
        exit(json_encode($rezultat_niz)); 
    
}



function svi_servisi_vozila(){
    

      $id_vozila = $_POST['id_vozila'];
 
      include ('../konekcija/konekcija.php');
      $upit = "

       SELECT
       
       s.id,
       s.kilometraza,
       s.vreme_servisa, 
       s.opis

       FROM servisi s
       WHERE s.id_vozila = '$id_vozila'";
      $rezultat = $konekcija->prepare($upit); 
      $rezultat->execute();
      $rezultat->bind_result($id,$kilometraza,$vreme_servisa,$opis);


      $rezultat_niz = array();

            while ($rezultat->fetch())
            {
             $rezultat_niz[]=array($id,$kilometraza,$vreme_servisa,$opis);
            }
            $konekcija->close();
        exit(json_encode($rezultat_niz)); 
    
}

}