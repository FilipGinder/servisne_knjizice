$(document).ready(function () {


    //upozorenje za caps lock
    window.addEventListener( 'keydown', function( event ) {

              if(event.getModifierState("CapsLock") == true){
                capslock.style.display = "block";
                }else{
                    capslock.style.display = "none";
                }     
    });
    //upozorenje za caps lock

$("#logovanje").click(function () {


        var email = $("#email_login").val();
        var lozinka = $("#password_login").val();
        if ($("#checkbox_zapamti").is(":checked")) {
            //PROVERAVAMO DA LI JE CEKIRANO POLJE ZA PAMCENJE EMAILA I LOZINKE
            var zapamti_me = "1"; //AKO JESTE DODELJUJEMO NEKU BEZVEZE VREDNOST VARIJABLI KOJU SALJEMO NA LOGIN.PHP
        } else {
            var zapamti_me = ""; //A AKO NIJE CEKIRANO ONDA SALJEMO KAO PRAZNU VREDNOST NA LOGIN.PHP PA SA empty() OPCIJOM PROVERAVAMO DA LI JE
        } //PRAZNO / CEKIRANO ILI NE

        if (email == "" && lozinka == "") {
            $("#email_login").effect("shake"); //U ZAVISNOSTI OD TOGA STA JE PRAZNO/NE POPUNJENO...TO VIBRIRA
            $("#password_login").effect("shake"); //ZA OVO JE OBAVEZNO UVEZTI JQUERY DODATAK
            return; //PREKID KODA
        } else if (email == "" || email == null) {
            $("#email_login").effect("shake");
            return; //PREKID KODA
        } else if (lozinka == "" || lozinka == null) {
            $("#password_login").effect("shake");
            return; //PREKID KODA
        }
        var verifikacija_logovanje = "verifikacija_logovanje";
        $.post(
            "../src/php/logo/handler.php",
            {
                verifikacija_logovanje: verifikacija_logovanje,
                email: email,
                lozinka: lozinka,
                zapamti_me: zapamti_me,
            },
            function (data, status) {
                var data = jQuery.parseJSON(data);

                if(data === "neaktivan"){
                    swal({
                        title: "Vaš nalog je trenutno neaktivan!",
                        icon: "warning", //ALERT BOX
                        timer: 2000,
                        buttons: false,
                        closeOnClickOutside: false,
                    });
                    return;
                }

                else if (data === "Nismo pronasli vas EMAIL!") {
                    swal({
                        title: "Nismo pronašli vaše korisničko ime ili EMAIL!",
                        icon: "warning", //ALERT BOX
                        timer: 2000,
                        buttons: false,
                        closeOnClickOutside: false,
                    });
                    return;
                } else if (data === "Pogresna lozinka") {
                    swal({
                        title: "Pogresna lozinka!",
                        icon: "warning", //ALERT BOX
                        timer: 2000,
                        buttons: false,
                        closeOnClickOutside: false,
                    });
                    return;
                } else { 

                                   
                                if (data == "uspesno") {
                                                     
                                        window.location.href ="../stranice/admin_panel/index.php";
                                        } 
                            
                    
                                
                        }
            }
        );

    });
});
