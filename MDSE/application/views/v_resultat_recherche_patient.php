<script src="<?php echo base_url();?>dwv/dist/dwv.js"></script>
<script>
    // base function to get elements
    dwv.gui.getElement = dwv.gui.base.getElement;
    dwv.gui.displayProgress = function (percent) {};
    dwv.image.decoderScripts = {
        "jpeg2000": "<?php echo base_url();?>dwv/decoders/pdfjs/decode-jpeg2000.js",
        "jpeg-lossless": "<?php echo base_url();?>dwv/decoders/rii-mango/decode-jpegloss.js",
        "jpeg-baseline": "<?php echo base_url();?>dwv/decoders/pdfjs/decode-jpegbaseline.js"
    };
    
</script>
<center>
	<h2> Result of the request </h2>
</center>

<br>
<br>

<div>

	<table align='center' width='75%' border='10px' cellspacing='2' cellpadding='8' style="margin-bottom : 5%;">
		<tr>
			<th align='center'>Nom</th>
			<th align='center'>Prénom</th>
			<th align='center'>N° de sécurité social</th>
			<th align='center'>Libellé</th>
			<th align='center'>lien</th>
		</tr>
        <?php $i=0;?>

		<?php foreach($patientlist as $patient_item): ?>
        
		<tr align='center'> 
			<td><?php echo $patient_item['nom'];?></td>
			<td><?php echo $patient_item['prenom'];?></td>
			<td><?php echo $patient_item['secu'];?></td>
			<td><?php echo $patient_item['libelle'];?></td>		
			<td>
                <a href="<?php echo base_url()."index.php/MDSE/dicom_viewer/${patient_item['ref_dicom']}/${patient_item['nb_image_dicom']}"?>">
                    
                <div style='width:100px;'id="<?php echo "dwv".$patient_item['secu'].$i;?>">
                <?php $i++;?>
                    <div class="layerContainer">
                        <canvas class="imageLayer"></canvas>
                    </div>
                </div>
                <a Href=# >  </a>
                </a>
			</td>
            		</tr>
        <?php endforeach ?>
	</table>
	
	<?php echo form_open('MDSE/vue_formulaire_patient'); ?>		
		
			<input style="position: relative; bottom: -50px; left: 50%; margin-left: -90px;" class="btn btn-lg btn-primary margebutton" type="submit" name="formsend" id="formsend" value=" Retour ">
		
	<?php echo form_close(); ?>
    <script>
        <?php $i=0;?>
        <?php foreach($patientlist as $patient_item): ?>
            var <?php echo "app".$patient_item['secu'].$i?> = new dwv.App();
            // initialise with the id of the container div
            <?php echo "app".$patient_item['secu'].$i;?>.init({
                "containerDivId": "<?php echo "dwv".$patient_item['secu'].$i;?>"
            });
            // load dicom data
            <?php echo "app".$patient_item['secu'].$i.'.loadURLs(["'.base_url().'dicom/'.$patient_item["ref_dicom"].'/image-000001.dcm'.'"]);';?>
            <?php $i++;?>

        <?php endforeach ?>
        </script>
    
	
</div>
