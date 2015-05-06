<?php foreach($query as $ee): ?>
	<article>
		<a onclick="getEE(<?php echo htmlspecialchars(json_encode($ee->nrcEE)); ?>)">
			<?php echo $ee->nombEE; ?>
		</a>
		<div>
			<a onclick="editEE(<?php echo htmlspecialchars(json_encode($ee->nrcEE)); ?>)" class="glyphicon glyphicon-pencil"></a>
			<a onclick="delEE(<?php echo htmlspecialchars(json_encode($ee->nrcEE)); ?>)" class="glyphicon glyphicon-remove"></a>
		</div>
	</article>
<?php endforeach; ?>