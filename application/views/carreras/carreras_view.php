<div class="row">
	<div class="col-md-8">
		<h2>CARRERAS</h2>
		<br><br><br>
		<script src="<?= base_url(); ?>recursos/js/jquery-1.10.2.js"></script>
		<div class="col-md-6" id="div-form-carreras">
			<form id="formCarrera" action="crud/crearCarrera">
				<span></span>
				<div class="form-group" >
					<label for="">Código</label><br>
					<input type="text" id="codigo" name="codigo" placeholder="Código">
				</div>
				<div class="form-group">
					<label for="">Nombre</label><br>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre">
				</div>
				<div class="form-group">
					<label for="">Créditos</label><br>
					<input type="text" id="creditos" name="creditos" placeholder="Créditos">
				</div>
				<input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
			</form>
			<script>
				$( "#formCarrera" ).submit(function( event ) {
				  
				  var codigo = $("#codigo").val();
				  var nombre = $("#nombre").val();
				  var creditos = $("#creditos").val();

				  //alert($(this).attr("action"));
				  event.preventDefault();
				  $.ajax
			            ({
			                type: "POST",
			                url: $(this).attr("action"),
			                data: {'codigo':codigo, 'nombre':nombre, 'creditos':creditos},
			                success: function(jso)
			                        {
			                            try
			                            {                                          	                           
			                                $("#div-carreras").html(jso);
			                                window.formCrearCarrera();                           
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
		<div class="col-md-6" id="div-carreras">
			<?php foreach($query as $carrera): ?>
				<article>
					<a onclick="getCarrera(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
						<?php echo $carrera->nombreCarr; ?>
					</a>
					<div>
						<a onclick="editCarrera(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)" class="glyphicon glyphicon-pencil"></a>
						<a onclick="delCarrera(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)" class="glyphicon glyphicon-remove"></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-md-4" id="div-infoCarrera"></div>
</div>


