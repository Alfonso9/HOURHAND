<?php for ($i=0; $i < $rows; $i++) {?>  
	<div class="row-fluid">
		<div class="col-md-1 color4">
			<p><?php echo $entrada+$i; ?>:00</p>
		</div>
		<div 	id="lunes:<?php echo $entrada+$i; ?>:<?php echo $numeroaula; ?>" 
				class="col-md-1 color1 alto EE" 
				ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		<div 	id="martes:<?php echo $entrada+$i; ?>:<?php echo $numeroaula; ?>" 
				class="col-md-1 color1 alto EE" 
				ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		<div 	id="miercoles:<?php echo $entrada+$i; ?>:<?php echo $numeroaula; ?>" 
				class="col-md-1 color1 alto EE" 
				ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		<div 	id="jueves:<?php echo $entrada+$i; ?>:<?php echo $numeroaula; ?>"
				class="col-md-1 color1 alto EE" 
				ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		<div 	id="viernes:<?php echo $entrada+$i; ?>:<?php echo $numeroaula; ?>" 
				class="col-md-1 color1 alto EE" 
				ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		<!--div 	id="sabado:<?php echo $entrada+$i; ?>:<?php echo $numeroaula; ?>" 
				class="col-md-1 color1 alto EE" 
				ondrop="drop(event)" ondragover="allowDrop(event)"></div-->
	</div>	
<?php } ?>