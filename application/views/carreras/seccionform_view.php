<form id="formCarrera" method="post">
	<div class="form-group" >
		<label for="">Código</label><br>
		<input type="text" id="codigo" name="codigo" placeholder="Código" value="<?php echo $carrera->codigoCarr; ?>">
	</div>
	<div class="form-group">
		<label for="">Nombre</label><br>
		<input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $carrera->nombreCarr; ?>">
	</div>
	<div class="form-group">
		<label for="">Créditos</label><br>
		<input type="text" id="creditos" name="creditos" placeholder="Créditos" value="<?php echo $carrera->creditosCarr; ?>">
	</div>
	<button type="submit" id="submit" class="btn btn-default">Listo</button>
</form>