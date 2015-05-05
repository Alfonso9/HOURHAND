<div class="row">
	<div class="col-md-8">
		<h2>MAESTROS</h2>
		<br><br><br>
		<script src="<?= base_url(); ?>recursos/js/jquery-1.10.2.js"></script>
		<div class="col-md-6" id="div-form-maestros">
			<form id="formMaestro" action="crud/crearMaestro">
				<span></span>
				<div class="form-group" >
					<label for="">Número</label><br>
					<input type="text" id="numero" name="numero" placeholder="Número">
				</div>
				<div class="form-group">
					<label for="">Nombre</label><br>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre">
				</div>
				<div class="form-group" >
					<label for="">Tipo</label><br>
					<input type="text" id="tipo" name="tipo" placeholder="Tipo">
				</div>
				<div class="form-group">
					<label for="">Horas</label><br>
					<input type="text" id="horas" name="horas" placeholder="Horas">
				</div>
				<input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
			</form>
			<script>
				$( "#formMaestro" ).submit(function( event ) {
				  
				  var numero = $("#numero").val();
				  var nombre = $("#nombre").val();
				  var tipo = $("#tipo").val();
				  var horas = $("#horas").val();

				  //alert($(this).attr("action"));
				  event.preventDefault();
				  $.ajax
			            ({
			                type: "POST",
			                url: $(this).attr("action"),
			                data: {'numero':numero, 'nombre':nombre, 'tipo':tipo, 'horas':horas},
			                success: function(jso)
			                        {
			                            try
			                            {                                          	                           
			                                $("#div-maestros").html(jso);
			                                window.formCrearMaestro();                           
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
		<div class="col-md-6" id="div-maestros">
			<?php foreach($query as $maestro): ?>
				<article>
					<a onclick="getMaestro(<?php echo htmlspecialchars(json_encode($maestro->numMtro)); ?>)">
						<?php echo $maestro->nombMtro; ?>
					</a>
					<div>
						<a onclick="editMaestro(<?php echo htmlspecialchars(json_encode($maestro->numMtro)); ?>)" class="glyphicon glyphicon-pencil"></a>
						<a onclick="delMaestro(<?php echo htmlspecialchars(json_encode($maestro->numMtro)); ?>)" class="glyphicon glyphicon-remove"></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-md-4" id="div-infoMaestro"></div>
</div>


