<form id="formMaestro" action="crud/actualizarMaestro">
	<div class="form-group" >
		<label for="">Número</label><br>
		<input type="text" id="numero" name="numero" 
				placeholder="Número" 
				value="<?php echo $maestro->numMtro; ?>">
	</div>
	<div class="form-group">
		<label for="">Nombre</label><br>
		<input type="text" id="nombre" name="nombre" 
				placeholder="Nombre" 
				value="<?php echo $maestro->nombMtro; ?>">
	</div>
	<div class="form-group">
		<label for="">Tipo</label><br>
		<input type="text" id="tipo" name="tipo" 
				placeholder="Tipo" 
				value="<?php echo $maestro->tipoMtro; ?>">
	</div>
	<div class="form-group">
		<label for="">Horas</label><br>
		<input type="text" id="horas" name="horas" 
				placeholder="Horas" 
				value="<?php echo $maestro->horasMtro; ?>">
	</div>
	<input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
</form>

<script>
	$( "#formMaestro" ).submit(function( event ) {
	  
	  var numero = $("#numero").val();
	  var nombre = $("#nombre").val();
	  var tipo = $("#tipo").val();
	  var horas = $("#horas").val();
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