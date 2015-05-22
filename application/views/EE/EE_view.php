<div class="row paginaMateria">
	<div class="col-md-12 grid8Materia">
		<h2 class="tituloMateria">MATERIAS</h2>
		<br><br><br>
		<?php echo validation_errors(); ?>
		<div class="col-md-3" id="div-form-ee">
			<form class="formularioMateria" id="formCrearEE" action="crud/crearEE">
                <div class="form-group" >
					<label for="">Carrera</label><br>
                    <select id="carreraEE" name="carreraEE">
                        <option>Seleccione una opción...</option>
                        <?php foreach ($query2 as $carrera): ?>
	                        <option id='<?php echo $carrera->codigoCarr; ?>'  
	                        		onclick="selec(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
	                        	<?php echo $carrera->nombreCarr; ?>
	                        </option>
                        <?php endforeach; ?>
                    </select>
				</div>
				<div class="form-group" >
					<label for="">NRC</label><br>
                                        <input type="text" id="nrc" name="nrc"	
					pattern="[0-9]{5}" placeholder="Ejemplo: 12345" title="Deben ser 5 caracteres">
				</div>
				<div class="form-group">
					<label for="">Nombre</label><br>
                                        <input type="text" id="nombre" name="nombre" 
					pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú\s]+" placeholder="Ejemplo: Logica" title="Primera letra mayúscula. Máximo 50 caracteres">
				</div>
                <div class="form-group" >
					<label for="">Periodo</label><br>
                    <select id="periodoEE" name="periodoEE" placeholder="Periodo">
                        <option>Seleccione una opción..</option>
                        <option id="FEB-JUL" onclick="selec(FEB-JUL)">FEB-JUL</option>
                        <option id="AGO-ENE" onclick="selec(AGO-ENE)">AGO-ENE</option>                                            
                    </select>
				</div>
                <div class="form-group" >
					<label for="">Área</label><br>
                    <select id="areaEE" name="areaEE">
                        <option>Seleccione una opción...</option>
                        <option id="area1"  onclick="selec(area1)">Básica General</option>
                        <option id="area2"  onclick="selec(area2)">Iniciación  a la Diciplina</option>
                        <option id="area3"  onclick="selec(area3)">Diciplinaria</option>
                        <option id="area4"  onclick="selec(area4)">Terminal</option>
                    </select>
				</div>
				<div class="form-group">
					<label for="">Créditos</label><br>
					<input type="text" id="creditos" name="creditos" placeholder="Créditos">
				</div>
                <div class="form-group" >
					<label for="">Tipo</label><br>
                    <select id="tipoEE" placeholder="Tipo">
                        <option >Selecione una opción...</option>
                        <option id="tipo1" onclick="selec(tipo1)">Obligatoria</option>
                        <option id="tipo2" onclick="selec(tipo2)">Optativa</option>
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
				<input type="submit" id="submit" class="btn listo" value="Listo"></input>
			</form>
			<script>
				function selec(codigo)
				{
				    var sel = document.getElementById(codigo);
				    sel.setAttribute("selected", "selected");
				}

				$("#formCrearEE").submit(function( event ) 
				{
					event.preventDefault();
					var carrera = document.getElementById("carreraEE");
					var idCarrera = carrera.options[carrera.selectedIndex].id;
					var nrc = $("#nrc").val();
					var nombre = $("#nombre").val();
					var periodo = document.getElementById("periodoEE");
					var idPeriodo = periodo.options[periodo.selectedIndex].id;
					var area = document.getElementById("areaEE");
					var idArea = area.options[area.selectedIndex].id;
					switch(idArea) 
					{
						case "area1":
						    area = "Básica General";
						    break;
						case "area2":
						    area = "Iniciación  a la Diciplina";
						    break;
						case "area3":
						    area = "Diciplinaria";
						    break;
						case "area4":
						    area = "Terminal";
						    break;
						default:
						    break;
					}
					var creditos = $("#creditos").val();
					var tipo = document.getElementById("tipoEE");
					var idTipo = tipo.options[tipo.selectedIndex].id;
					switch(idTipo) 
					{
						case "tipo1":
						    tipo = "Obligatoria";
						    break;
						case "tipo2":
						    tipo = "Optativa";
						    break;
						default:
						    break;
					}
					var hrsT = $("#hrsT").val();
					var hrsP = $("#hrsP").val();

				 	$.ajax
			            ({
			                type: "POST",
			                url: $(this).attr("action"),
			                data: {	'carrera': idCarrera,
			            			'nrc':nrc,
			            			'nombre':nombre,
			            			'periodo':idPeriodo,
			            			'area':area,
			            			'creditos':creditos,
			            			'tipo':tipo,
			            			'hrsT':hrsT,
			            			'hrsP':hrsP},
			                success: function(jso)
			                        {
			                            try
			                            {                                          	                           
			                                $("#div-ee").html(jso);     
			                                document.getElementById("formCrearEE").reset(); 			                           
			                            }catch(e)
			                            {
			                                alert('Exception while resquest...');
			                            }                       
			                        },
			                error:  function()
			                        {
			                            alert('Error while resquest..');
			                        }
			            });
				});
			</script>
		</div>
        <div class="col-md-3 nombreMaterias" id="div-carrerasEE">
            <?php foreach($query3 as $carrera): ?>
				<article>
					<a onclick="getCarreraEE(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
						<?php echo $carrera->nombreCarr; ?>
					</a>					
				</article>
			<?php endforeach; ?>
		</div>
				
		<div class="col-md-2" id="div-ee">
			
		</div>
		<div class="col-md-3 infoMaterias" id="div-infoEE"></div>
		
</div>
