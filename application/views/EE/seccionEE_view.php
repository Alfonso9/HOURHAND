<?php foreach($query as $exp): ?>
	<article>
		<a onclick="getEE(<?php echo htmlspecialchars(json_encode($exp->nrcEE)); ?>)">
			<?php echo $exp->nombEE; ?>
		</a>
		<div>
			<a onclick="editEE(<?php echo htmlspecialchars(json_encode($exp->nrcEE)); ?>)" class="glyphicon glyphicon-pencil"></a>
			<a onclick="delEE(<?php echo htmlspecialchars(json_encode($exp->nrcEE)); ?>)" class="glyphicon glyphicon-remove"></a>
	</article>
<?php endforeach; ?>