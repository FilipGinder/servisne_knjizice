<div class="container-fluid" id="dodavanje_novog_klijenata">
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-3 col-sm-12"></div>

			<div class="col-lg-12 col-md-6 col-sm-12 div_dod_novog_klijenta">
               		
               			<span>Ime</span>
			            <br>
						<input type="text" class="input2" id="ime_klijenta">
			            <br>
						<span>Prezime</span>
						<br>
						<input type="text" class="input2" id="prezime_klijenta">

						<br>
						<span>Telefon</span>
						<br>
						<input type="text" class="input2" id="telefon_klijenta">

						<br>
						<span>Email</span>
						<br>
						<input type="text" class="input2" id="email_klijenta">
						<br>
						<br>
						<input type="button" class="btn btn-danger" id="sacuvaj_nov_klijenta" value="Sačuvaj">

						<input type="button" class="btn btn-primary" id="nazad_novi_klijent" value="Nazad">
			</div>





			<div class="col-lg-12 col-md-6 col-sm-12 div_dod_novog_vozila">
               		
               			<span>Naziv vozila</span>
			            <br>
						<input type="text" class="input2" id="naziv_vozila">
			            <br>
						<span>Godina proizvodnje</span>
						<br>
						<input type="text" class="input2" id="godiste_vozila">

						<br>
						<span>Kubikaza</span>
						<br>
						<input type="text" class="input2" id="kubikaza_vozila">

						<br>
						<span>Boja</span>
						<br>
						<input type="text" class="input2" id="boja_vozila">
						<br>
						<span>Kilometraza</span>
						<br>
						<input type="text" class="input2" id="kilometraza_vozila">
						<br>
						<br>

						<div class="form-group">
                               <select  data-placeholder="Vrsta goriva" id="gorivo" class="form-control">
                                   	<option value="Benzin">Benzin</option>
					            	<option value="Dizel">Dizel</option>
					            	<option value="Plin">Plin</option>
					            	<option value="Metan">Metan</option>
                               </select>
                            </div>
			            <br>
			            <span>Opis radova</span>
			            <br>
						<textarea class="input11" placeholder="Opis servisa" autofocus id="opis_servisa"></textarea>
						<br>
			            <button type="button" class="btn btn-danger" id="sacuvaj_novo_vozilo">Sačuvaj</button>
			</div>






               
			

		</div>
	</div>
</div>