<div class="row">
	<div class="col-md-12">
		<h2>MATERIAS</h2>
		<br><br><br>
	<?php echo validation_errors(); ?>
		<div class="col-md-3" id="div-form-ee">
			<form id="target" action="#">
                                <div class="form-group" >
					<label for="">Carrera</label><br>
                                        <select id="carreraEE" name="carreraEE" placeholder="Carrera">
                                            <option value="0">Seleccione una opción...</option>
                                            <?php foreach ($query2 as $carrera): ?>
                                            <option value='<?php echo $carrera->codigoCarr; ?>'><?php echo $carrera->nombreCarr; ?></option>
                                            <?php endforeach; ?>
                                        </select>
				</div>
				<div class="form-group" >
					<label for="">Nrc</label><br>
					<input type="text" id="codigo" name="NRC" placeholder="NRC">
				</div>
				<div class="form-group">
					<label for="">Nombre</label><br>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre">
				</div>
                                <div class="form-group" >
					<label for="">Periodo</label><br>
                                        <select id="periodoEE" name="periodoEE" placeholder="Periodo">
                                            <option value="0">Seleccione una opción..</option>
                                            <option value="1">FEB-JUL</option>
                                            <option value="2">AGO-ENE</option>
                                            
                                        </select>
				</div>
                                <div class="form-group" >
					<label for="">Área</label><br>
                                        <select id="areaEE" name="areaEE" placeholder="Área">
                                            <option value="0">Seleccione una opción...</option>
                                            <option value="1">Básica General</option>
                                            <option value="2">Iniciación  a la Diciplina</option>
                                            <option value="3">Diciplinaria</option>
                                            <option value="4">Terminal</option>
                                        </select>
				</div>
				
                                <div class="form-group" >
					<label for="">Tipo</label><br>
                                        <select id="tipoEE" name="tipoEE" placeholder="Tipo">
                                            <option value="0">Selecione una opción...</option>
                                            <option value="1">Obligatoria</option>
                                            <option value="2">Optativa</option>
                                        </select>
                                </div>
                                <div class="form-group" >
					<label for="">Horas Teóricas</label><br>
					<input type="text" id="hrsT" name="hrsT" placeholder="Numero de horas">
				</div>
                                <div class="form-group" >
					<label for="">Horas Prácticas</label><br>
					<input type="text" id="hrsP" name="hrsP" placeholder="Numero de horas">
				</div>
                                <div class="form-group">
					<label for="">Créditos</label><br>
					<input type="text" id="creditos" name="creditos" placeholder="Créditos">
				</div>
				<input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
			</form>
		</div><span></span>
                <div class="col-md-3" id="div-carrerasEE">
                    <?php foreach($query3 as $carrera): ?>
	<article>
		<a onclick="getCarreraEE(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
			<?php echo $carrera->nombreCarr; ?>
		</a>
		
	</article>
<?php endforeach; ?>
	</div>
	<div class="col-md-3" id="div-ee">
             
	</div>
        <div class="col-md-3" id="div-infoEE">
                    
         </div>        
               
</div>
