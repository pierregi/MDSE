<center>
	<img src="../../image/patient_search.png" alt="" >
</center>

<br>
<br>

<div>

	<?php echo form_open('MDSE/recherche_patient'); ?>
		<div class="row justify-content-center">
			<div class="col-md-3 col-10 p-2">
			  <label for="nom">Name of the patient *</label>
			  <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
			</div>
			<div class="col-md-3 col-10 p-2">
			  <label for="prenom">First name of the patient *</label>
			  <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom">
			</div>
			<div class="col-md-3 col-10 p-2">
			  <label for="num_secu">Social security number **</label>
			  <input type="text" maxlength=15 class="form-control" id="num_secu" name="num_secu" placeholder="num_secu">
			</div>
		 
			<div class="col-md-4 col-10 p-2">
			  <label for="date_naiss">Date of birth</label>
			  <input type="text" class="form-control" id="date_naiss"  placeholder="Date de naissance" disabled>
			</div>
			<div class="col-md-4 col-10 p-2">
			  <label for="lieu_naiss">Place of birth</label>
			  <input type="text" class="form-control" id="lieu_naiss" placeholder="Lieu de naissance" disabled>
			</div>
			<div class="col-md-12 row justify-content-center p-5">
				<input class="btn btn-lg btn-primary margebutton" type="submit" name="formsend" id="formsend" value="Start">
			</div>
		</div>

	<?php echo form_close(); ?>
	
	<div style="margin-left : 1%;">
		<p> * : Mandatory for a search with name and first name</p>
		<p> ** : Mandatory for a search with social security number</p>
	</div>
	
</div>
        






