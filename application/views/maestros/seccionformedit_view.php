<div id="alertaFormMaestros"></div>
<form class="formularioMaestro" id="formMaestro" action="crud/actualizarMaestro">
	<div class="form-group" >
		<label for="">Número</label><br>
		<input type="text" id="numero" disabled="true"
				placeholder="Ejemplo: S11045032"
				pattern="[A-Z]{1}[0-9]{8}" title="Debe contener una letra Mayúscula y 8 números."
				value="<?php echo $maestro->numMtro; ?>">
	</div>
	<div class="form-group">
		<label for="">Nombre</label><br>
		<input type="text" id="nombre" placeholder="Ejemplo: Antonio A. Hernandez Andrade ó Antonio Antonio Hernandez Andrade"
				pattern="[A-Z]{1}[a-z]+[\s]{0,1}[A-Z]{0,1}[.a-z]*[\s][A-Z]{1}[a-z]+[\s][A-Z]{1}[a-z]+" 
				title="Debe contener máximo 60 caracteres."
				value="<?php echo $maestro->nombMtro; ?>">
	</div>
	<div class="form-group">
		<label for="">Tipo</label><br>
		<input type="text" id="tipo" placeholder="Ejemplo: Por contrato, Tiempo completo ó Medio tiempo"
				pattern="[A-Z]{1}[a-z]+[\s][a-z]+" 
				title="Debe contener máximo 20 caracteres."
				value="<?php echo $maestro->tipoMtro; ?>">
	</div>
	<div class="form-group">
		<label for="">Horas</label><br>
		<input type="text" id="horas" placeholder="Ejemplo: 4"
				pattern="[0-9]{1,2}" 
				title="Debe contener máximo 2 caracteres."
				value="<?php echo $maestro->horasMtro; ?>">
	</div>
	<input type="submit" id="submit" class="btn listo" value="Listo"></input>
</form>

<script>
	$( "#formMaestro" ).submit(function( event ) {
	  
	  var numero = $("#numero").val();
	  var nombre = $("#nombre").val();
	  var tipo = $("#tipo").val();
	  var horas = $("#horas").val();
	  event.preventDefault();
	  if (numero == '' || nombre == '' || tipo == '' || horas == '') 
		{
			mostrarAlerta("Complete los <strong>campos vacíos</strong>", "alertaFormMaestros");
		}
		else
		{
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
	    };
	});
</script>