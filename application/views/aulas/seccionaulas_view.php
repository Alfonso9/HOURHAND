<?php foreach($query as $aula): ?>
	<article>
		<a onclick="getAula(<?php echo htmlspecialchars(json_encode($aula->numeroAula)); ?>)">
			<?php echo $aula->numeroAula; ?>
		</a>
		<div>
			<a onclick="editAula(<?php echo htmlspecialchars(json_encode($aula->numeroAula)); ?>)" class="glyphicon glyphicon-pencil"></a>
			<a onclick="delAula(<?php echo htmlspecialchars(json_encode($aula->numeroAula)); ?>)" class="glyphicon glyphicon-remove"></a>
		</div>
	</article>
<?php endforeach; ?>
<?php echo validation_errors(); ?>
