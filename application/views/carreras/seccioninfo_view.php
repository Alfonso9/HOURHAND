<div>
	<figure>
		<img 	src="<?= base_url(); ?>recursos/images/carreras/<?php echo $carrera->nombreCarr?>.png" 
				alt=""
				style="width:300px; heigth: 150px;">
	</figure>
	<h2><?php echo $carrera->nombreCarr; ?></h2>
</div>
<div class="form-group" >
	<label for="">Código</label><br>
	<label for=""><?php echo $carrera->codigoCarr; ?></label>
</div>
<div class="form-group">
	<label for="">Nombre</label><br>
	<label for=""><?php echo $carrera->nombreCarr; ?></label>
</div>
<div class="form-group">
	<label for="">Créditos</label><br>
	<label for=""><?php echo $carrera->creditosCarr; ?></label>
</div>