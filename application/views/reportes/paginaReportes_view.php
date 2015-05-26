<div class="container-fluid show-grid">
	<div class="col-md-6">
		<h4>REPORTES</h1>
	</div>
	<div class="col-md-6">
		<h4>AULAS-MAESTROS-OFERTA</h1>
	</div>
</div>
<div class="container-fluid show-grid">
	<div class="col-md-4">
		<div class="col-md-12">
			<h5>Horarios</h5>
			<select>
				<option>Seleccione una opción...</option>
                <option onclick="subTiposReporte('aulas')">AULAS</option>
                <option onclick="subTiposReporte('maestros')">MAESTROS</option>
                <option onclick="subTiposReporte('oferta')">OFERTA</option>                                    
            </select>          
		</div>
		<div id="info_report" class="col-md-12">
			<h1>AREA DE INFO</h1>
		</div>
	</div>
	<div id="area_report" class="col-md-8">
		<object data="<?= base_url(); ?>recursos/pdf/temporal.pdf" 
				type="application/pdf" width="800" height="500">
		</object>
	</div>
</div>