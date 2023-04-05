<div class="container-fluid" id="klijenat_izm">
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-3 col-sm-12"></div>

			<div class="col-lg-12 col-md-6 col-sm-12 div_klijent_izm">
               		<h4>Podaci o klijentu</h4>
               			<span>Ime</span>
			            <br>
						<input type="text" class="input2" id="ime_klijenta_izm">
			            <br>
						<span>Prezime</span>
						<br>
						<input type="text" class="input2" id="prezime_klijenta_izm">

						<br>
						<span>Telefon</span>
						<br>
						<input type="text" class="input2" id="telefon_klijenta_izm">

						<br>
						<span>Email</span>
						<br>
						<input type="text" class="input2" id="email_klijenta_izm">
						<br>
						<br>
						<h3>Ključ</h3>
						<h1 id="unique_key_izm"></h1>
						<br>
						<input type="hidden" class="input2" id="odavran_klijent_izm">
						<div class="form-group">
                               <select  data-placeholder="Vozila" id="vozila" class="form-control">
                                    
                               </select>
                        </div>
			</div>

			<div class="col-lg-12 col-md-6 col-sm-12 div_vozilo_izm">
               		<h4>Podaci o vozilu</h4>
               			<span>Naziv</span>
			            <br>
						<input type="text" class="input2" id="naziv_izm">
			            <br>
						<span>Godište</span>
						<br>
						<input type="text" class="input2" id="godiste_izm">

						<br>
						<span>Kubikaža</span>
						<br>
						<input type="text" class="input2" id="kubikaza_izm">

						<br>
						<span>Boja</span>
						<br>
						<input type="text" class="input2" id="boja_izm">
						<br>
						<span>Početna kilometraža</span>
						<br>
						<input type="text" class="input2" id="kilometraza_izm">
						<br>
						<span>Vrsta goriva</span>
						<br>
						<div class="form-group">
                               <select  data-placeholder="Vrsta goriva" id="gorivo_izm" class="form-control input2">
                                   	<option class="vr_goriva" value="Benzin">Benzin</option>
					            	<option class="vr_goriva" value="Dizel">Dizel</option>
					            	<option class="vr_goriva" value="Plin">Plin</option>
					            	<option class="vr_goriva" value="Metan">Metan</option>
                               </select>
                        </div>
						

						<input type="hidden" class="" id="odavrano_vozilo_izm">
						<br>
						<br>
						

						<!-- <input type="button" class="btn btn-danger" id="klijent_izm" value="Sačuvaj">

						<input type="button" class="btn btn-primary" id="nazad_klijent_izm" value="Nazad"> -->
			</div>

            

             <div class="" id="servisi_div_okvir">
			      <h4>Pregled svih servisa</h4>
		            <div class="accordion accordion-flush" id="servisi_div">
					
		            </div>
            </div>


            





            <div class="col-lg-12 col-md-6 col-sm-12 novi_servis_izm" id="novi_servisi_div">
            	   <br>
            	   <h4>Podaci o novom servisu</h4>
            	   <span>Kilometraža</span>
					<br>
					<input type="text" class="input2" id="kilometraza_izm_nova">
                     <br>
                     <br>
			       <textarea class="input2" placeholder="Opis servisa" autofocus id="nov_opis_servisa_izm"></textarea>
			       <br><br>
			       
			       <input type="button" class="btn btn-danger" id="dod_novog_servisa_izm" value="Dodaj - Sačuvaj"><br><br>
			       <input type="button" class="btn btn-primary" id="nazad_klijent_upd1" value="Nazad">
            </div>





            <div class="col-lg-12 col-md-6 col-sm-12 div_dod_novo_vozilo_izm">
               		<h4>Podaci o novom vozilu</h4>
               			<span>Naziv</span>
			            <br>
						<input type="text" class="input2" id="naziv_vozila_izm">
			            <br>
						<span>Godište</span>
						<br>
						<input type="text" class="input2" id="godiste_vozila_izm">

						<br>
						<span>Kubikaža</span>
						<br>
						<input type="text" class="input2" id="kubikaza_vozila_izm">

						<br>
						<span>Početna kilometraža</span>
						<br>
						<input type="text" class="input2" id="kilometraza_vozila_izm">


						<br>
						<span>Boja</span>
						<br>
						<input type="text" class="input2" id="boja_vozila_izm">
						<br>
						<br>
						<div class="form-group">
                               <select  data-placeholder="Vozila" id="gorivo_vozila_izm" class="form-control">
                               		<option value="Benzin">Benzin</option>
					            	<option value="Dizel">Dizel</option>
					            	<option value="Plin">Plin</option>
					            	<option value="Metan">Metan</option>
                                    
                               </select>
                        </div>
                        <input type="button" class="btn btn-danger input2" id="dod_novog_vozila_izm" value="Dodaj novo vozilo"><br><br>
                        <input type="button" class="btn btn-primary input2" id="nazad_klijent_upd" value="Nazad">
                        <br>
			</div>





		</div>
	</div>
</div>

