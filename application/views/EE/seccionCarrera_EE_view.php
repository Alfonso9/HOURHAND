<?php foreach($query as $carrera): ?>
<div class="form-group">
	<article class="colornombreMaterias">
		<a onclick="getCarreraEE(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
			<?php echo $carrera->nombreCarr; ?>
		</a>
	</article>
</div>
<?php endforeach; ?>
