<?php foreach($query as $maestro): ?>
	<article class="colornombreMaestros">
		<a onclick="getMaestro(<?php echo htmlspecialchars(json_encode($maestro->numMtro)); ?>)">
			<?php echo $maestro->nombMtro; ?>
		</a>
		<div>
			<a onclick="editMaestro(<?php echo htmlspecialchars(json_encode($maestro->numMtro)); ?>)" class="glyphicon glyphicon-pencil"></a>
			<a onclick="delMaestro(<?php echo htmlspecialchars(json_encode($maestro->numMtro)); ?>)" class="glyphicon glyphicon-remove"></a>
		</div>
	</article>
<?php endforeach; ?>
<?php echo validation_errors(); ?>

