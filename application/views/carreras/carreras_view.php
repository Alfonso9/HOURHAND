<div class="row paginacarrera">
	<div class="col-md-8 grid8carrera">
		<h2 class="titulocarrera">CARRERAS</h2>
		
		<script src="<?= base_url(); ?>recursos/js/jquery-1.10.2.js"></script>
		<div class="col-md-6" id="div-form-carreras">
			<div id="alertaFormCarreras"></div>
			<form id="formCarrera" action="crud/crearCarrera">
				<span></span>
				<div class="form-group" >
					<label for="">Código</label><br>
					<input type="text" id="codigo" pattern="[0-9]{5}" title="Debe ser de 5 caracteres" placeholder="Ejemplo: 11111">
				</div>
				<div class="form-group">
					<label for="">Nombre</label><br>
					<input type="text" id="nombre" pattern="[A-ZÀÈÌÒÙ]{1}[[a-záéíóú\s]+" title="Debe contener primera letra mayúscula y hasta 60 caracteres" placeholder="Ejemplo: Informática">
				</div>
				<div class="form-group">
					<label for="">Créditos</label><br>
					<input type="text" id="creditos" pattern="[0-9]{3}" title="Debe ser de 3 caracteres" placeholder="Ejemplo: 380">
				</div>
				<input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
			</form>
			<script>
				$( "#formCarrera" ).submit(function( event ) {
				  event.preventDefault();
				  var codigo = $("#codigo").val();
				  var nombre = $("#nombre").val();
				  var creditos = $("#creditos").val();

				  if (codigo == '' || nombre == '' || creditos == '') 
				  {
				  	mostrarAlerta("Complete los campos vacíos", "alertaFormCarreras");
				  }else
				  {
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
				    }
				});
				
			</script>
		</div>
		<div class="col-md-6 nombrecarreras" id="div-carreras">
			<?php foreach($query as $carrera): ?>
				<article class="colornombrecarreras">
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
	<div class="col-md-4 infocarreras" id="div-infoCarrera"></div>
</div>