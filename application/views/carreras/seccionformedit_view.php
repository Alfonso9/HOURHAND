<form id="formCarrera" action="crud/actualizarCarrera">
	<div class="form-group" >
		<label for="">Código</label><br>
		<input type="text" id="codigo" name="codigo" 
				placeholder="Código" 
				value="<?php echo $carrera->codigoCarr; ?>">
	</div>
	<div class="form-group">
		<label for="">Nombre</label><br>
		<input type="text" id="nombre" name="nombre" 
				placeholder="Nombre" 
				value="<?php echo $carrera->nombreCarr; ?>">
	</div>
	<div class="form-group">
		<label for="">Créditos</label><br>
		<input type="text" id="creditos" name="creditos" 
				placeholder="Créditos" 
				value="<?php echo $carrera->creditosCarr; ?>">
	</div>
	<input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
</form>

<script>
	$( "#formCarrera" ).submit(function( event ) {
	  
	  var codigo = $("#codigo").val();
	  var nombre = $("#nombre").val();
	  var creditos = $("#creditos").val();
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