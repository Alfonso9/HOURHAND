<div class="row paginaReporte">
	<div class="col-md-12 grid8Reporte">
		<h2 class="tituloReporte">REPORTES</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="imgReporte imgnombreReporte">
	  		<h2> AULAS-MAESTROS-OFERTA </h2>
		</div>
		<div class="col-md-12 formularioReporte">
			<h2>Horarios</h2>
			<select>
				<option>Seleccione una opción...</option>
                <option onclick="subTiposReporte('aulas')">AULAS</option>
                <option onclick="subTiposReporte('maestros')">MAESTROS</option>
                <option onclick="subTiposReporte('oferta')">OFERTA</option>                                    
            </select>          
		</div>
		<div id="info_report" class="col-md-12 nombreReportes">
			
		</div>
	</div>
	<div id="area_report" class="col-md-8">
		<object data="<?= base_url(); ?>recursos/pdf/temporal.pdf" 
				type="application/pdf" width="800" height="500">
		</object>
	</div>
</div>