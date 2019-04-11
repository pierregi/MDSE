<center>
	<img src="../../image/type_search.png" alt="" >
</center>
<div class="container" style="margin-top : 5%;">
  <div class="row justify-content-center">
	<div class="col-md-5">
	  <div class="card mb-5 shadow-sm">
		<center> <img class="" src="../../image/logo_patient.png" alt="logo" width=50%;> </center>
		<div class="card-body">
		  <center>
		  <h2> Patient Request </h2>
		  <p class="card-text"> Searching data of a patient.</p>
			<?php echo form_open('MDSE/vue_formulaire_patient'); ?>
				<input class="btn btn-sm btn-outline-secondary" type="submit" name="formsend" id="formsend" value="Start searching">
			<?php echo form_close(); ?>
		   </center>
		</div>
	  </div>
	</div>
	<div class="col-md-5" >
	  <div class="card mb-5 shadow-sm">
		<center> <img class="" src="../../image/logo_statistic.png" alt="logo" width=50%;> </center>
		<div class="card-body">
			<center>
		  <h2> Statistic Request </h2>
		  <p class="card-text"> Searching for statistic data. </p> 
			<?php echo form_open('MDSE/menu_statistique_vue'); ?>
				<input class="btn btn-sm btn-outline-secondary" type="submit" name="formsend2" id="formsend2" value="Start searching">
			<?php echo form_close(); ?>
		  </center>
		</div>
	  </div>
	</div>       
</div>
          
