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
<?php echo validation_errors(); ?>

