<head>
	<style>
		p{white-space: nowrap;}
		
		
	</style>
</head>

<center>
	<img src="../../image/statistic_search.png" alt="" >
</center>

<br>
<br>

<div>
	<?php echo form_open('MDSE/recherche_statistique'); ?>
	<div class="row justify-content-center">
		<div>
			<div>
				<input type="radio" id="genre" name="form" value="genre" checked>
				<label for="genre">Genre</label>
			</div>
			<div>
				<input type="radio" id="age" name="form" value="age">
				<label for="age">Age</label>
			</div>
			<div>
				<input type="radio" id="catage" name="form" value="catage">
				<label for="catage">Age category</label>
			</div>
			<div>
				<input type="radio" id="taille" name="form" value="taille">
				<label for="taille">Sizes</label>
			</div>
			<div>
				<input type="radio" id="masse" name="form" value="masse">
				<label for="masse">Body mass</label>
			</div>
			<div>
				<label>Display type :</label>
				<select name="optionaffichage" id="optionaffichage">
					<option value = "bar" >Stick diagram </option>
					<option value = "camenbert" >Pie chart </option>
					<option value = "graph" >Graphic </option>
				</select>
			</div>
			<div>
			  <label><?php echo $type?>* :</label>
			  <input type="text" id="reptype" name="reptype" required>
			</div>
			<div>
				<input type="text" id="type" name="type" value="<?php echo $type?>" hidden>
			</div>
						
			<div class="justify-content-center" style="margin-top :10%;">
				<input class="btn btn-lg btn-primary margebutton" type="submit" name="formsend" id="formsend" value="Start">
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	
	<div style="margin-left : 1%; margin-top : 2.5%;">
		<p> * : Mandatory for a search </p>
	</div>
	
</div>








