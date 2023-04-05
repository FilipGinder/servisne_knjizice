<?php 

use PHPMailer\PHPMailer\PHPMailer;
include_once "../../../dodaci/PHPMailer/PHPMailer.php";
include_once "../../../dodaci/PHPMailer/Exception.php";
include_once "../../../dodaci/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



session_start();
class class_log
{
 
function logovanje()
    {
                    include ('../konekcija/konekcija.php');

                    $email = mysqli_real_escape_string($konekcija,$_POST['email']);
                    $email = htmlspecialchars($email);
                    $password = mysqli_real_escape_string($konekcija,$_POST['lozinka']);
                    $password = htmlspecialchars($password);

                       

                    if(isset($_POST['zapamti_me'])){
                      $zapamti_me = $_POST['zapamti_me'];   //PREUZIMAMO VREDNOST checkbox-a BILO PRAZNA ILI NE
                    }
                    // if(!empty($zapamti_me))   //AKO NIJE PRAZNA PRAVIMO KOLACICE
                    //        {
                    //          setcookie("Un", $email, time() + (86400 * 30), "/");
                    //        }


                    setcookie($email, $password, time() + (10), "/");


                    $upit="SELECT id,password FROM admini WHERE email='$email'";
                    $rezultat=$konekcija->prepare($upit);
                    $rezultat->execute();
                    $rezultat->bind_result($id,$lozinka_iz_baze);

                    $brojac=0;
                    while($rezultat->fetch()){
                      $brojac++;
                    }
                    $konekcija->close();
                     
                    if($brojac==1 && $password === $lozinka_iz_baze){ //AKO JE LOZINKA INDENTICNA LOGOVANJE JE DOZVOLJENO

                      if(!empty($zapamti_me))   //AKO NIJE PRAZNA PRAVIMO KOLACICE
                           {  

                                                     $passwordhash = base64_encode($password);
                                                     setcookie("Un", $email, time() + (86400 * 300), "/");
                                                     setcookie("pass", $passwordhash, time() + (86400 * 300), "/");  //FORMIRANI KOLACICI ZA EMAIL I PASSWORD KOJI TRAJU MESECDANA. BRAUZER IH PAMTI
                                                     $_SESSION['id']=$id;
                                                     exit(json_encode('uspesno'));

                           }   

                       else{
                                                  $_SESSION['id']=$id;
                                                  exit(json_encode('uspesno'));
                           }

                    }

                                else if ($brojac==1 && base64_encode($password) == $lozinka_iz_baze){ 
                                  if(!empty($zapamti_me))   //AKO NIJE PRAZNA PRAVIMO KOLACICE
                                       {   

                                                           $passwordhash = base64_encode($password);
                                                           setcookie("Un", $email, time() + (86400 * 300), "/");
                                                           setcookie("pass", $passwordhash, time() + (86400 * 300), "/");  //FORMIRANI KOLACICI ZA EMAIL I PASSWORD KOJI TRAJU MESECDANA. BRAUZER IH PAMTI
                                                           $_SESSION['id']=$id;
                                                           exit(json_encode('uspesno'));

                                        }
                                    else{  

                                                       $_SESSION['id']=$id;
                                                       exit(json_encode('uspesno'));


                                }
                              }
                    else if ($brojac==0){
                        exit(json_encode('Nismo pronasli vas EMAIL!'));
                      }
                    else if ($brojac==1 && base64_encode($password) != $lozinka_iz_baze)
                                  {exit(json_encode("Pogresna lozinka"));
                    }
                    else {
                      exit(json_encode('ERROR'));
                    }
                  }







function logout()
  {

              unset($_SESSION['id']);                     
              header('location:../../../index.php');  

                //Reset sesije i slanje na pocetnu...na ponovno logovanje

  }





function kreiranje_slanje_emaila_tokena()
  {
    $user_ili_email = $_POST['user_ili_email'];


         include ('../konekcija/konekcija.php');
         $upit = "SELECT id,email,COUNT(*) FROM admini WHERE email = '$user_ili_email' OR username = '$user_ili_email'";
         $rezultat = $konekcija->prepare($upit);
         $rezultat->execute();
         $rezultat->bind_result($id,$email,$broj);
         $rezultat_niz = array();
          while ($rezultat->fetch())
          {
           $rezultat_niz[]=array($id,$email,$broj);
          }
          $konekcija->close();


          if($broj == 1)
          {           
                    function random_strings($length_of_string)  //prvo kreiramo random string
                   {
                    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    return substr(str_shuffle($str_result), 0, $length_of_string);
                   }
                   
                   $token = random_strings(6);

                                 $mail = new PHPMailer();
                                 $mail -> CharSet = "UTF-8";
                                 $mail->Host = "mail.online-rezervacije.rs";
                                 $mail->isSMTP();
                                 // $mail->SMTPDebug  = 2; 
                                 $mail->SMPTAuth = true;
                                  $mail->Username = "token@online-rezervacije.rs";
                                  $mail->Password = "Sigurnosni*token2022";

            

                                 $mail->SMTPSecure = "ssl";
                                 $mail->Port = 465;
                                 $mail->addAddress($email); //ovde definisemo kome saljemo
                                 $mail->setFrom('token@online-rezervacije.rs');   //ovde definisemo za koji restoran saljemo poruku
                                 $mail->Subject = 'Token online-rezervacije.rs';   //ovde samo da je naslov
                                 $mail->isHTML(true);
                                 $poruka_obavest = '<p>'.$token.'</p>';
                                 $poruka_obavest .= '<p>Vaš token važi 10 minuta</p>';
                                 $mail->Body = $poruka_obavest;  // poruka

                                 if($mail->send()){
                                  // exit(json_encode('Email je uspesno poslat!'));
                                            include ('../konekcija/konekcija.php');
                                            $upit = "UPDATE admini SET  token = '$token', vreme_tokena = CURRENT_TIMESTAMP WHERE  id = '$id'";
                                                    if(mysqli_query($konekcija, $upit)){
                                                        exit(json_encode('uspesno'));
                                                    } else {
                                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                    }


                                  //unost tokena i u bazu
                                 }
                                 else{

                                   exit(json_encode('Doslo je do greske prilikom slanja Emaila-a!'));
                                 }
          }else{
            exit(json_encode('Ima vise korisnika sa ovim emailom ili korisnickim imenom!'));
          }
                  

  }




function provera_tokena()
  {
    $user_ili_email = $_POST['user_ili_email'];
    $unesen_token = $_POST['unesen_token'];

      
    include ('../konekcija/konekcija.php');
         $upit = "SELECT dozvola,COUNT(*) FROM admini WHERE email = '$user_ili_email' OR username = '$user_ili_email' AND token = '$unesen_token' AND ADDTIME(vreme_tokena, '1000') > NOW() ";
         $rezultat = $konekcija->prepare($upit);                                         
         $rezultat->execute();
         $rezultat->bind_result($dozvola,$broj);
         $rezultat_niz = array();
          while ($rezultat->fetch())
          {
           $rezultat_niz[]=array($dozvola,$broj);
          }
          $konekcija->close();  


          if($broj > 0 ){
            exit(json_encode($rezultat_niz));
          }else{
            exit(json_encode('ne odgovarajuci token'));
          }

  }



}