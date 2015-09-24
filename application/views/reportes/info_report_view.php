<article class="colornombreReportes">
	<?php foreach ($query as $it): ?>
	<p>
		<a onclick="previaReporte('<?php echo $it->id; ?>')">
			<?php echo $it->nombre; ?>
		</a>
	</p>
<?php endforeach; ?>
</article>
