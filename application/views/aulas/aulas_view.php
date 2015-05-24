<div class="row paginaAula">
	<div class="col-md-8 grid8Aula">
		<h2 class="tituloAula">AULAS</h2>
		<script src="<?= base_url(); ?>recursos/js/jquery-1.10.2.js"></script>
		<div class="col-md-6" id="div-form-aulas">
			<div id="alertaFormAulas"></div>
			<form class="formularioAula" id="formAula" action="crud/crearAula">
				<span></span>
				<div class="form-group" >
					<label for="">Número</label><br>
					<input type="text" id="numero" placeholder="Ejemplo: 112 ó CC2"
							pattern="[A-Z0-9\s]*" title="Debe contener hasta 30 caracteres.">
				</div>
				<div class="form-group">
					<label for="">Capacidad</label><br>
					<input type="text" id="capacidad" placeholder="Ejemplo: 30"
							pattern="[0-9]{2}" title="Debe contener hasta 2 caracteres.">
				</div>
				<input type="submit" id="submit" class="btn listo" value="Listo"></input>
			</form>
			<script>
				$( "#formAula" ).submit(function( event ) {  
					var numero = $("#numero").val();
					var capacidad = $("#capacidad").val();
					event.preventDefault();
					if (numero == '' || capacidad == '') 
					{
						mostrarAlerta("Complete los <strong>campos vacíos</strong>", "alertaFormAulas");
					}
					else
					{
					  $.ajax
				            ({
				                type: "POST",
				                url: $(this).attr("action"),
				                data: {'numero':numero, 'capacidad':capacidad},
				                success: function(jso)
				                        {
				                            try
				                            {                                        	                           				                              
				                                if (jso.length > 4)
			                            		{
			                            			$("#div-aulas").html(jso);
				                                	window.formCrearAula();
			                            		}
			                            		else if(jso.length < 4)
			                            		{
			                            			mostrarAlerta("El número: <strong>"+numero+"</strong> ya existe", "alertaFormAulas");
			                            		};                               
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
				    };
				});
			</script>
		</div>
		<div class="col-md-6 nombreAulas" id="div-aulas">
			<?php foreach($query as $aula): ?>
				<article class="colornombreAulas">
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
	<div class="col-md-4 infoAulas" id="div-infoAula"></div>
</div>


