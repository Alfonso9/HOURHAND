<?php foreach($query as $carrera): ?>
	<article>
		<a onclick="getCarrera(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
			<?php echo $carrera->nombreCarr; ?>
		</a>
		
	</article>
<?php endforeach; ?>