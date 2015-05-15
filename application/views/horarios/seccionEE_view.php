 <div class="row">
  <?php foreach($ee as $e): ?>
    <div 	id="<?php echo $e->nrcEE; ?>" 
    		class="col-md-1 color5 alto2" 
    		draggable="true" 
    		ondragstart="drag(event)">
      <p value="<?php echo $e->nombEE; ?>"><?php echo $e->nombEE; ?></p>
      <input type="hidden" value="<?php echo $e->nrcEE; ?>">
    </div> 
  <?php endforeach; ?>  
</div>