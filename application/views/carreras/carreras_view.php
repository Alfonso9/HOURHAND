<div class="row">
	<div class="col-md-8">
		<h2>CARRERAS</h2>
		<br><br><br>
	<?php echo validation_errors(); ?>
		<div class="col-md-6" id="div-form-carreras">
			<form id="target" action="#">
				<div class="form-group" >
					<label for="">Código</label><br>
					<input type="text" id="codigo" name="codigo" placeholder="Código">
				</div>
				<div class="form-group">
					<label for="">Nombre</label><br>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre">
				</div>
				<div class="form-group">
					<label for="">Créditos</label><br>
					<input type="text" id="creditos" name="creditos" placeholder="Créditos">
				</div>
				<input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
			</form>
		</div><span></span>
		<div class="col-md-6" id="div-carreras">
			<?php foreach($query as $carrera): ?>
				<article>
					<a onclick="getCarrera(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
						<?php echo $carrera->nombreCarr; ?>
					</a>
					<div>
						<a onclick="editCarrera(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)" class="glyphicon glyphicon-pencil"></a>
						<a onclick="delCarrera(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)" class="glyphicon glyphicon-remove"></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-md-4" id="div-infoCarrera">
		
	</div>
</div>
