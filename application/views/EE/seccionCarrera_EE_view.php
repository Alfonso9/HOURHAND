<?php foreach($query as $carrera): ?>
<<<<<<< HEAD
<div class="form-group">
	<article>
		<a onclick="getCarreraEE(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
=======
<<<<<<< HEAD
<div class="form-group">
	<article>
		<a onclick="getCarreraEE(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
=======
	<article>
		<a onclick="getCarrera(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
>>>>>>> 5cd6bfc06013ac884791a4a45d1b2fad0e31b069
>>>>>>> bf06c066704e35cec9d3c354bdd536517abbc118
			<?php echo $carrera->nombreCarr; ?>
		</a>
		
	</article>
<<<<<<< HEAD
<?php endforeach; ?>

</div>
=======
<<<<<<< HEAD
<?php endforeach; ?>

</div>
=======
<?php endforeach; ?>
>>>>>>> 5cd6bfc06013ac884791a4a45d1b2fad0e31b069
>>>>>>> bf06c066704e35cec9d3c354bdd536517abbc118
