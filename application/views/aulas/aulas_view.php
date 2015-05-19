<div class="row">
	<div class="col-md-8">
		<h2>AULAS</h2>
		<br><br><br>
		<script src="<?= base_url(); ?>recursos/js/jquery-1.10.2.js"></script>
		<div class="col-md-6" id="div-form-aulas">
			<form id="formAula" action="crud/crearAula">
				<span></span>
				<div class="form-group" >
					<label for="">Número</label><br>
					<input type="text" id="numero" name="numero" placeholder="Número">
				</div>
				<div class="form-group">
					<label for="">Capacidad</label><br>
					<input type="text" id="capacidad" name="capacidad" placeholder="Capacidad">
				</div>
				<input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
			</form>
			<script>
				$( "#formAula" ).submit(function( event ) {
				  
				  var numero = $("#numero").val();
				  var capacidad = $("#capacidad").val();

				  //alert($(this).attr("action"));
				  event.preventDefault();
				  $.ajax
			            ({
			                type: "POST",
			                url: $(this).attr("action"),
			                data: {'numero':numero, 'capacidad':capacidad},
			                success: function(jso)
			                        {
			                            try
			                            {                                          	                           
			                                $("#div-aulas").html(jso);
			                                window.formCrearAulas();                           
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
		<div class="col-md-6" id="div-aulas">
			<?php foreach($query as $aula): ?>
				<article>
					<a onclick="getAula(<?php echo htmlspecialchars(json_encode($aula->numeroAula)); ?>)">
						<?php echo $aula->numeroAula; ?>
					</a>
					<div>
						<a onclick="editAula(<?php echo htmlspecialchars(json_encode($aula->numeroAula)); ?>)" class="glyphicon glyphicon-pencil"></a>
						<a onclick="delAula(<?php echo htmlspecialchars(json_encode($aula->numeroAula)); ?>)" class="glyphicon glyphicon-remove"></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-md-4" id="div-infoAula"></div>
</div>


