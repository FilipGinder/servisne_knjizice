$(document).ready(function(){

window.pregled_klijenata();
window.dodavanje_novog_klijenata();
window.odabir_vozila();
window.izmena_klijenta_vozila_dod_servisa();
window.dodavanje_jos_jednog_vozila();
})



window.pregled_klijenata = function(){

    $('#prikaz_klijenata_u_tabeli').DataTable().destroy();

var redni_br = 1;

var verifikacija_pregled_svih_klijenata = "verifikacija_pregled_svih_klijenata";

            $.post("../../src/php/admin/handler.php",{
                verifikacija_pregled_svih_klijenata:verifikacija_pregled_svih_klijenata
            },function(data,status){
                
               var data = jQuery.parseJSON(data);
          
                
                var rezultat = "";
                for(var i=0; i<data.length;i++)
                {

           var statuss = data[i][6];

          if(data[i][6] == 1){
            
                       var status = '   <img src="../../slike/aktivno.png" width="28" height="28  alt="some_title">  <br> AKTIVAN';
                        

                    }
                    else{
                        var status = '  <img src="../../slike/neaktivno.png" width="28" height="28" alt="some_title">  <br> NEAKTIVAN';
                    }
     rezultat +='<tr>'+
                    '<td><button class=" linkovi_tabela" onClick="prikaz_klijenta('+data[i][0]+')">'+redni_br+'.</button></td>'+
                    '<td><button class=" linkovi_tabela" onClick="prikaz_klijenta('+data[i][0]+')"><b>'+data[i][1]+'<br>'+data[i][2]+'</b></button></td>'+
                    '<td><button class=" linkovi_tabela" onClick="prikaz_klijenta('+data[i][0]+')">'+data[i][3]+'</button></td>'+
                    '<td><button class=" linkovi_tabela" onClick="prikaz_klijenta('+data[i][0]+')">'+data[i][4]+'</button></td>'+
                    '<td><button class=" linkovi_tabela" onClick="prikaz_klijenta('+data[i][0]+')">'+data[i][5]+'</button></td>'+
                '</tr>';
             
             //DODATI PODATKE KOM GRADU,OPSTINI I VRSTI RESTORANA PRIPADA

               redni_br= redni_br+1;
                }


                $("#prikaz_klijenata_za_izm_u_tabeli tbody").html(rezultat);
                $("#prikaz_klijenata_za_izm_u_tabeli").DataTable({      //OVIM DEFINISEMO DODATAK ZA TABELU
                               "language": {
                                   "lengthMenu": "Prikaži _MENU_",
                                   "zeroRecords": "Nema rezultata pretrage",
                                   "info": "Stranica _PAGE_ od ukupno _PAGES_",    //OVIM DEFINISEMO SRPSKI JEZIK U DODATKU
                                   "infoEmpty": "Nema rezultata",
                                   "infoFiltered": "(od ukupno _MAX_ faktura)",    //OVA DVA PREVODA SU MORALA OVDE DA STOJE JER MORAJU BITI TU ODMAH ISPOD UCITAVANJA
                                   "search":         "Pronadji klijenta:",
                                   "paginate": {
                                               "first":      "Prva",
                                               "last":       "Poslednja",
                                               "next":       "Sledeca",
                                               "previous":   "Predhodna"
                                             },
                                         "loadingRecords": "Ucitavanje...",
                                         "loadingRecords": "Obrada..."
                                     },
                                      "bSort": false,                                     
                                      "pagingType": "full_numbers",  //POKAZUJE SVE BROJEVE PAGINACIJE
                                       "responsive": false,
                                       "retrieve": true,
                                      "scrollCollapse": true,
                               //       "scrollY": 375,
                                  //    "scrollX": true,
                                      "paging":         true,
                                     "searching": true,
                                      "search": {
                                                   "search": ""
                                                 },
                                      "bInfo" : false,
                                    //  "paging": false

                                          });
            })
}



window.dodavanje_novog_klijenata = function(){

$("#dod_nov_klijenta").click(function(){

	$("#tabela_klijenata").css("display","none");
	$("#dodavanje_novog_klijenata").css("display","block");
})

$("#nazad_novi_klijent, #nazad_novi_klijent1").click(function(){
	$("#tabela_klijenata").css("display","block");
	$("#dodavanje_novog_klijenata").css("display","none");
})


$("#sacuvaj_nov_klijenta").click(function(){

	var ime_klijenta = $("#ime_klijenta").val();
	var prezime_klijenta = $("#prezime_klijenta").val();
	var telefon_klijenta = $("#telefon_klijenta").val();
	var email_klijenta = $("#email_klijenta").val();

    if(ime_klijenta != "" || prezime_klijenta != "" || telefon_klijenta != ""){
	    var verifikacija_dod_nov_klijenta = "verifikacija_dod_nov_klijenta";

            $.post("../../src/php/admin/handler.php",{
                verifikacija_dod_nov_klijenta:verifikacija_dod_nov_klijenta,
                ime_klijenta:ime_klijenta,
                prezime_klijenta:prezime_klijenta,
                telefon_klijenta:telefon_klijenta,
                email_klijenta:email_klijenta
            },function(data,status){
                
                
          
                
                
               if(data == 'ponovi'){

                            swal({
                                    title: 'Došlo je do greške - ponovite postupak',
                                  //  text: 'Redirecting...',
                                    icon: 'error',
                                    timer: 2500,
                                    buttons: false,
                                })
                          }
              else{
              	swal({
                    title: 'Uspešno dodat novi klijent!',
                  //  text: 'Redirecting...',
                    icon: 'success',
                    timer: 2500,
                    buttons: false,
                 })
                    
                    $("#sacuvaj_novo_vozilo").val(data); 
                	$("#ime_klijenta").val('');
					$("#prezime_klijenta").val('');
					$("#telefon_klijenta").val('');
					$("#email_klijenta").val('');      
              
	              //  $("#nazad_novi_klijent").click();
	             //   $("#prikaz_klijenata_za_izm_u_tabeli").DataTable().destroy();
	             //   window.pregled_klijenata();
	                $(".div_dod_novog_klijenta").css("display","none");
	                $(".div_dod_novog_vozila").css("display","block");
	                $("#gorivo").chosen({no_results_text: "Oops, nema pronadjenih rezultata!"});
              }
			})
    }else{
    	swal({
                title: 'Ime, prezime i telefon su obavezni podaci',
              //  text: 'Redirecting...',
                icon: 'error',
                timer: 2500,
                buttons: false,
            })
    }
})




$("#sacuvaj_novo_vozilo").click(function(){

         	var naziv_vozila = $("#naziv_vozila").val();
			var godiste_vozila = $("#godiste_vozila").val();
			var kubikaza_vozila = $("#kubikaza_vozila").val();
			var boja_vozila = $("#boja_vozila").val();
			var kilometraza_vozila = $("#kilometraza_vozila").val();
			var gorivo = $("#gorivo").val();
			var id_klijenta = $("#sacuvaj_novo_vozilo").val();

            var opis_servisa = $("#opis_servisa").val();
            var opis_servisa = opis_servisa.replaceAll('w','<br>');

		if(naziv_vozila != "" || godiste_vozila != "" || kilometraza_vozila != "" || gorivo != ""){



			var verifikacija_dod_nov_vozila = "verifikacija_dod_nov_vozila";

            $.post("../../src/php/admin/handler.php",{
                verifikacija_dod_nov_vozila:verifikacija_dod_nov_vozila,
                naziv_vozila:naziv_vozila,
                godiste_vozila:godiste_vozila,
                kubikaza_vozila:kubikaza_vozila,
                boja_vozila:boja_vozila,
                kilometraza_vozila:kilometraza_vozila,
                gorivo:gorivo,
                id_klijenta:id_klijenta,
                opis_servisa:opis_servisa
            },function(data,status){
                
                
            if(data = 'uspesno')
               {
                swal({
                    title: 'Uspešno dodato novo vozilo!',
                  //  text: 'Redirecting...',
                    icon: 'success',
                    timer: 2500,
                    buttons: false,
                 })

                	$("#naziv_vozila").val('');
					$("#godiste_vozila").val('');
					$("#kubikaza_vozila").val('');
					$("#boja_vozila").val('');  
					$("#kilometraza_vozila").val(''); 
                    $("#opis_servisa").val('');  
              
	              //  $("#nazad_novi_klijent").click();
	             //   $("#prikaz_klijenata_za_izm_u_tabeli").DataTable().destroy();
	             //   window.pregled_klijenata();
	                // $("#dodavanje_novog_klijenata").css("display","none");
	                // $("#div_dod_novog_vozila").css("display","block");
	                // $("#gorivo").chosen({no_results_text: "Oops, nema pronadjenih rezultata!"});
                
               }else{

                            swal({
                                    title: 'Došlo je do greške - ponovite postupak',
                                  //  text: 'Redirecting...',
                                    icon: 'error',
                                    timer: 2500,
                                    buttons: false,
                                })
                          }
			})



		}else{
			swal({
                title: 'Naziv, godiste, kilometraža i gorivo su obavezni podaci',
              //  text: 'Redirecting...',
                icon: 'error',
                timer: 2500,
                buttons: false,
            })
		}
	})

}



function  prikaz_klijenta(id_klijenta){
    
    $("#tabela_klijenata").css("display","none");
    $("#klijenat_izm").css("display","block");
       
       var verifikacija_sve_o_klijentu = "verifikacija_sve_o_klijentu";

            $.post("../../src/php/admin/handler.php",{
                verifikacija_sve_o_klijentu:verifikacija_sve_o_klijentu,
                id_klijenta:id_klijenta
            },function(data,status){

               var data = jQuery.parseJSON(data);
               
               $("#odavran_klijent_izm").val(data[0][0]);
               $("#ime_klijenta_izm").val(data[0][1]);
               $("#prezime_klijenta_izm").val(data[0][2]);
               $("#telefon_klijenta_izm").val(data[0][3]);
               $("#email_klijenta_izm").val(data[0][4]);
               $("#unique_key_izm").html(data[0][5]);


                                           var verifikacija_sva_klijentova_vozila = "verifikacija_sva_klijentova_vozila";

                                        $.post("../../src/php/admin/handler.php",{
                                            verifikacija_sva_klijentova_vozila:verifikacija_sva_klijentova_vozila,
                                            id_klijenta:id_klijenta
                                        },function(data,status){

                                           var data = jQuery.parseJSON(data);
                                           var rezultat = "";
                                                for(var i=0; i<data.length;i++){                                      
                                                    rezultat+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                                                 }

                                                 

                                                 $("#vozila").chosen({no_results_text: "Oops, nema pronadjenih rezultata!"});
                                                 $("#vozila").html('<option value="odaberi_vozilo">Dodaj / odaberi vozilo</option>'+rezultat).trigger("chosen:updated"); //ovim ispisujemo podatke u chosen select

                                           
                                        })


            })
            
}




window.odabir_vozila = function(){

$("#vozila").change( window.odabir_vozila_refresh = function(){

   var vozilo = $("#vozila").val();

   if(vozilo == "odaberi_vozilo"){
    $("#dod_novog_vozila_izm").css("visibility", "visible");
    
    $(".div_vozilo_izm").css("display","none");
    $("#servisi_div_okvir").css("display","none");
    $("#novi_servisi_div").css("display","none");
    $(".div_dod_novo_vozilo_izm").css("display","block");
    
   }else{
    $("#dod_novog_vozila_izm").css("visibility", "hidden");

      $(".div_vozilo_izm").css("display","block");
      $("#servisi_div_okvir").css("display","block");
      $("#novi_servisi_div").css("display","block");
      $(".div_dod_novo_vozilo_izm").css("display","none");

   
    

    

       var id_vozila = $("#vozila").val();

       var verifikacija_odabir_vozila = "verifikacija_odabir_vozila";

            $.post("../../src/php/admin/handler.php",{
                verifikacija_odabir_vozila:verifikacija_odabir_vozila,
                id_vozila:id_vozila
            },function(data,status){

               var data = jQuery.parseJSON(data);
               $("#naziv_izm").val(data[0][1]);
               $("#godiste_izm").val(data[0][2]);
               $("#kubikaza_izm").val(data[0][3]);
               $("#boja_izm").val(data[0][4]);
               $("#kilometraza_izm").val(data[0][5]);
               //$("#gorivo_izm").val(data[0][6]);
               $("#odavrano_vozilo_izm").val(data[0][0]);


               $(".vr_goriva").each(function()     //izvrtimo sve postojece opcije selecta
            {   
                $(this).attr('selected',false);                                 
                      if(this.value == data[0][6]) {    //    i kad im uporedimo vrednosti onda ih cekiramo
                        
                        $(this).prop("selected","true")
                      }           

            })
               
                                              


                         var verifikacija_svi_servisi_ovog_vozila = "verifikacija_svi_servisi_ovog_vozila";

                            $.post("../../src/php/admin/handler.php",{
                                verifikacija_svi_servisi_ovog_vozila:verifikacija_svi_servisi_ovog_vozila,
                                id_vozila:id_vozila
                            },function(data,status){

                               var data = jQuery.parseJSON(data);
                               var rezultat = "";
                               var rb = 1;
                               for(var i=0; i<data.length;i++){


                                rezultat+='<div class="accordion-item">'+
                                              '<h2 class="accordion-header" id="flush-headingOne'+data[i][0]+'">'+
                                                  '<button class="accordion-button collapsed" id="vreme_servisa" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne'+data[i][0]+'" aria-expanded="false" aria-controls="flush-collapseOne">'+rb+'.&nbsp;&nbsp;<b>'+data[i][2]+'</b>&nbsp; - &nbsp;'+data[i][1]+'km</button>'+
                                               '</h2>'+
                                              '<div id="flush-collapseOne'+data[i][0]+'" class="accordion-collapse collapse" aria-labelledby="flush-headingOne'+data[i][0]+'" data-bs-parent="#servisi_div">'+
                                                '<div class="accordion-body" id="opis_servisa">'+data[i][3]+'</div>'+
                                               '</div>'+
                                            '</div>';
                                 var rb = rb+1;
                                 }
                                 if(data == ""){rezultat = '<h4>Još uvek nema nijednog servisa.</h4>'}
                               $("#servisi_div").html(rezultat);
                               
                            })

               
            }) //post
        }//odabrano vozilo else
    })
}



window.izmena_klijenta_vozila_dod_servisa = function(){


    $("#nazad_klijent_upd, #nazad_klijent_upd1").click(function(){
    $("#tabela_klijenata").css("display","block");
    $("#klijenat_izm").css("display","none");
})



    $("#dod_novog_servisa_izm").click(function(){
        var id_klijenta = $("#odavran_klijent_izm").val();
        var ime_klijenta_izm = $("#ime_klijenta_izm").val();
        var prezime_klijenta_izm = $("#prezime_klijenta_izm").val();
        var telefon_klijenta_izm = $("#telefon_klijenta_izm").val();
        var email_klijenta_izm = $("#email_klijenta_izm").val();

        var naziv_vozila = $("#naziv_izm").val();
        var godiste_vozila = $("#godiste_izm").val();
        var kubikaza_vozila = $("#kubikaza_izm").val();
        var boja_vozila = $("#boja_izm").val();
        var kilometraza_vozila = $("#kilometraza_izm").val();
        var gorivo = $("#gorivo_izm").val();
        var id_vozila = $("#odavrano_vozilo_izm").val();
        
        var kilometraza_izm_nova = $("#kilometraza_izm_nova").val();
        var servis_opis_nov = $("#nov_opis_servisa_izm").val();
        var servis_opis_nov = servis_opis_nov.replaceAll('q','<br>');



        var verifikacija_izm_podataka_ili_dodavanje_nov_servisa = "verifikacija_izm_podataka_ili_dodavanje_nov_servisa";

                $.post("../../src/php/admin/handler.php",{
                    verifikacija_izm_podataka_ili_dodavanje_nov_servisa:verifikacija_izm_podataka_ili_dodavanje_nov_servisa,
                    id_klijenta:id_klijenta,
                    ime_klijenta_izm:ime_klijenta_izm,
                    prezime_klijenta_izm:prezime_klijenta_izm,
                    telefon_klijenta_izm:telefon_klijenta_izm,
                    email_klijenta_izm:email_klijenta_izm,
                    naziv_vozila:naziv_vozila,
                    godiste_vozila:godiste_vozila,
                    kubikaza_vozila:kubikaza_vozila,
                    boja_vozila:boja_vozila,
                    kilometraza_vozila:kilometraza_vozila,
                    gorivo:gorivo,
                    id_vozila:id_vozila,
                    servis_opis_nov:servis_opis_nov,
                    kilometraza_izm_nova:kilometraza_izm_nova
                },function(data,status){
                      
                      var data = jQuery.parseJSON(data);
                      if(data == "uspesno"){
                        swal({
                                title: 'Uspešno',
                              //  text: 'Redirecting...',
                                icon: 'success',
                                timer: 2500,
                                buttons: false,
                            });
                        window.odabir_vozila_refresh();
                        $("#kilometraza_izm_nova").val('');
                        $("#nov_opis_servisa_izm").val('');
                      }
                })
    })
     


}





window.dodavanje_jos_jednog_vozila = function(){



        $("#dod_novog_vozila_izm").click(function(){
                
                var naziv_vozila_izm = $("#naziv_vozila_izm").val();
                var godiste_vozila_izm = $("#godiste_vozila_izm").val();
                var kubikaza_vozila_izm = $("#kubikaza_vozila_izm").val();
                var boja_vozila_izm = $("#boja_vozila_izm").val();
                var kilometraza_vozila_izm = $("#kilometraza_vozila_izm").val();  
                var gorivo_vozila_izm = $("#gorivo_vozila_izm").val();
                var odavran_klijent_izm = $("#odavran_klijent_izm").val();
            
            if(naziv_vozila_izm != ""){



                var verifikacija_dodavanje_jos_jednog_vozila = "verifikacija_dodavanje_jos_jednog_vozila";

                            $.post("../../src/php/admin/handler.php",{
                                verifikacija_dodavanje_jos_jednog_vozila:verifikacija_dodavanje_jos_jednog_vozila,
                                naziv_vozila_izm:naziv_vozila_izm,
                                godiste_vozila_izm:godiste_vozila_izm,
                                kubikaza_vozila_izm:kubikaza_vozila_izm,
                                boja_vozila_izm:boja_vozila_izm,
                                kilometraza_vozila_izm:kilometraza_vozila_izm,
                                gorivo_vozila_izm:gorivo_vozila_izm,
                                odavran_klijent_izm:odavran_klijent_izm
                            },function(data,status){

                               var data = jQuery.parseJSON(data);
                              if(data == "uspesno"){

                                $("#naziv_vozila_izm").val('');
                                $("#godiste_vozila_izm").val('');
                                $("#kubikaza_vozila_izm").val('');
                                $("#boja_vozila_izm").val('');
                                $("#kilometraza_vozila_izm").val('');
                                $("#gorivo_vozila_izm").val('');

                                swal({
                                    title: 'Uspešno dodato novo vozilo',
                                  //  text: 'Redirecting...',
                                    icon: 'success',
                                    timer: 2500,
                                    buttons: false,
                                })
                                prikaz_klijenta(odavran_klijent_izm);
                              }

                           })
            }else{
                swal({
                        title: 'Naziv vozila je obavezan podatak',
                      //  text: 'Redirecting...',
                        icon: 'error',
                        timer: 2500,
                        buttons: false,
                    })
            }
        })
}


       
         
 