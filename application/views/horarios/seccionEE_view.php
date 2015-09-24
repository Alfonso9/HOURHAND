 <div class="row">
  <?php foreach($ee as $e): ?>
    <div 	id="<?php echo $e->nrcEE; ?>" 
    		class="col-md-1 color5 alto2 EE" 
    		onclick="EEdispon(	<?php echo htmlspecialchars(json_encode($e->hrsteoriaEE+$e->hrspractEE)); ?>,
    							<?php echo htmlspecialchars(json_encode($e->nombEE)); ?>,
    							<?php echo htmlspecialchars(json_encode($e->nrcEE)); ?>)">
		    <span value="<?php echo $e->nombEE; ?>">
		    	<?php echo $e->nombEE; ?>
		    </span>
		<br>		
	    <span class="info">
	    	T: <?php echo $e->hrsteoriaEE; ?> 
	    	P: <?php echo $e->hrspractEE; ?> 
	    	C: <?php echo $e->creditEE; ?>
	    </span>
	    <input type="hidden" value="<?php echo $e->nrcEE; ?>">
    </div>
  <?php endforeach; ?>  
</div>