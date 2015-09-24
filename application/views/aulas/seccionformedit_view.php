<div id="alertaFormAulas"></div>
<form class="formularioAula" id="formAula" action="crud/actualizarAula">
	<div class="form-group" >
		<label for="">Número</label><br>
		<input type="text" id="numero"  placeholder="Ejemplo: 112 ó CC2" disabled="true"
				pattern="[A-Z0-9\s]*" title="Debe contener hasta 30 caracteres."
				value="<?php echo $aula->numeroAula; ?>">
	</div>
	<div class="form-group">
		<label for="">Capacidad</label><br>
		<input type="text" id="capacidad" placeholder="Ejemplo: 30"
				pattern="[0-9]{2}" title="Debe contener hasta 2 caracteres."
				value="<?php echo $aula->capacidAula; ?>">
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
			                    $("#div-aulas").html(jso);
			                    window.formCrearAula();                           
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