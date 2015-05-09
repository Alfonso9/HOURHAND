<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bf06c066704e35cec9d3c354bdd536517abbc118
<?php foreach($query as $exp): ?>
	<article>
		<a onclick="getEE(<?php echo htmlspecialchars(json_encode($exp->nrcEE)); ?>)">
			<?php echo $exp->nombEE; ?>
		</a>
		<div>
			<a onclick="editEE(<?php echo htmlspecialchars(json_encode($exp->nrcEE)); ?>)" class="glyphicon glyphicon-pencil"></a>
			<a onclick="delEE(<?php echo htmlspecialchars(json_encode($exp->nrcEE)); ?>)" class="glyphicon glyphicon-remove"></a>
<<<<<<< HEAD
=======
=======
<?php foreach($query as $ee): ?>
	<article>
		<a onclick="getEE(<?php echo htmlspecialchars(json_encode($ee->nrcEE)); ?>)">
			<?php echo $ee->nombEE; ?>
		</a>
		<div>
			<a onclick="editEE(<?php echo htmlspecialchars(json_encode($ee->nrcEE)); ?>)" class="glyphicon glyphicon-pencil"></a>
			<a onclick="delEE(<?php echo htmlspecialchars(json_encode($ee->nrcEE)); ?>)" class="glyphicon glyphicon-remove"></a>
>>>>>>> 5cd6bfc06013ac884791a4a45d1b2fad0e31b069
>>>>>>> bf06c066704e35cec9d3c354bdd536517abbc118
		</div>
	</article>
<?php endforeach; ?>