$(document).ready(function(){

window.pretraga_knjizica();
window.odabir_vozila();
window.navigacija();

})


window.pretraga_knjizica = function(){

$("#pretrazi_butt").click(function(){
 
    
    

	var pretraga = $("#pretrazi_knjizice").val();

	//if(pretraga.length == 7){

		var verifikacija_pretraga_knjizica = "verifikacija_pretraga_knjizica";

            $.post("src/php/admin/handler.php",{
                verifikacija_pretraga_knjizica:verifikacija_pretraga_knjizica,
                pretraga:pretraga
            },function(data,status){
                
               var data = jQuery.parseJSON(data);

               if(data != ""){

               $("#sajt").css("display","none");
               $("#servisna_knjizica_div").css("display","block");
               $('head').append('<link id="css_accordion" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">');
               $('head').append('<script id="js_accordion" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>');
               // $('head').find('link#css_accordion').remove();  

               $("#zatvori_sk").css("display","block");

                if($(window).width() < 600){
                   $("#zatvori_sk1").css("display","block");
                   $("#zatvori_sk").css("display","none");
                }

               $("#ime_sk").html(data[0][1]+' '+data[0][2]);
               $("#tel_sk").html(data[0][3]);
               $("#email_sk").html(data[0][4]);


               var id_klijenta = data[0][0]



						               var verifikacija_sva_klijentova_vozila = "verifikacija_sva_klijentova_vozila";

                                        $.post("src/php/admin/handler.php",{
                                            verifikacija_sva_klijentova_vozila:verifikacija_sva_klijentova_vozila,
                                            id_klijenta:id_klijenta
                                        },function(data,status){

                                           var data = jQuery.parseJSON(data);
                                           var rezultat = "";
                                                for(var i=0; i<data.length;i++){ 
                                                   if(i==0){
                                                     var prvo_vozilo = data[i][0];
                                                   }   
                                                                                            
                                                    rezultat+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                                                 }
                                                 $("#vozila_klijenta").html(rezultat).trigger("chosen:updated"); 



                                                            window.promena_vozila = function(prvo_vozilo){
                                                                             var verifikacija_svi_servisi_vozila = "verifikacija_svi_servisi_vozila";

                                                                                $.post("src/php/admin/handler.php",{
                                                                                    verifikacija_svi_servisi_vozila:verifikacija_svi_servisi_vozila,
                                                                                    id_vozila:prvo_vozilo
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
                                                            }
                                                            window.promena_vozila(prvo_vozilo);
                                           
                                        })
                    $("#pretrazi_knjizice").val('');
                }else{
                	swal({
                            title: 'Pogrešan pin kod',
                          //  text: 'Redirecting...',
                            icon: 'error',
                            timer: 2500,
                            buttons: false,
                        })
                    $("#pretrazi_knjizice").val('');
                }
          

          })

	//}
})


}


window.odabir_vozila = function(){
    //ovom funkcijom pozivamo funnkciju koja je deo funkcije  window.pretraga_knjizica
    $("#vozila_klijenta").change(function(){
        var prvo_vozilo = $("#vozila_klijenta").val();
        window.promena_vozila(prvo_vozilo);
    })
}



window.navigacija = function(){




     $("#nav_ka_pocetku").click(function(){

        $('head').find('link#css_accordion').remove();
        $('head').find('script#js_accordion').remove();

        $("#sajt").css("display","block");
        $("#servisna_knjizica_div").css("display","none");
        $("#zatvori_sk").css("display","none");
        $("#zatvori_sk1").css("display","none");
     
        $('html, body').animate({
            scrollTop: $("#prva_slika").offset().top
        },1000);

    })


    $("#nav_ka_usluge").click(function(){

        $('head').find('link#css_accordion').remove();
        $('head').find('script#js_accordion').remove();

        $("#sajt").css("display","block");
        $("#servisna_knjizica_div").css("display","none");
        $("#zatvori_sk").css("display","none");
        $("#zatvori_sk1").css("display","none");
     
        $('html, body').animate({
            scrollTop: $("#usluge_div").offset().top
        },1000);

    })


    $("#nav_ka_kontakt").click(function(){

        $('head').find('link#css_accordion').remove();
        $('head').find('script#js_accordion').remove();

        $("#sajt").css("display","block");
        $("#servisna_knjizica_div").css("display","none");
        $("#zatvori_sk").css("display","none");
        $("#zatvori_sk1").css("display","none");
     
        $('html, body').animate({
            scrollTop: $("#mapa").offset().top
        },1000);

    })

    

    $("#zatvori_sk").click(function(){

        $('head').find('link#css_accordion').remove();
        $('head').find('script#js_accordion').remove();

        $("#sajt").css("display","block");
        $("#servisna_knjizica_div").css("display","none");
        $("#zatvori_sk").css("display","none");
        $("#zatvori_sk1").css("display","none");
     
        $('html, body').animate({
            scrollTop: $("#prva_slika").offset().top
        },1000);

    })

    $("#zatvori_sk1").click(function(){

        $('head').find('link#css_accordion').remove();
        $('head').find('script#js_accordion').remove();

        $("#sajt").css("display","block");
        $("#servisna_knjizica_div").css("display","none");
        $("#zatvori_sk").css("display","none");
        $("#zatvori_sk1").css("display","none");
     
        $('html, body').animate({
            scrollTop: $("#prva_slika").offset().top
        },1000);

    })


    

}

