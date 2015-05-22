<?php foreach ($query as $it): ?>
	<p>
		<a onclick="llenarReporte('<?php echo $it->id; ?>')">
			<?php echo $it->nombre; ?>
		</a>
	</p>
<?php endforeach; ?>