<form class="formularioAula" id="formAula" action="crud/actualizarAula">
	<div class="form-group" >
		<label for="">Número</label><br>
		<input type="text" id="numero" name="numero" 
				placeholder="Número" 
				value="<?php echo $aula->numeroAula; ?>">
	</div>
	<div class="form-group">
		<label for="">Capacidad</label><br>
		<input type="text" id="capacidad" name="capacidad" 
				placeholder="Capacidad" 
				value="<?php echo $aula->capacidAula; ?>">
	</div>
	<input type="submit" id="submit" class="btn listo" value="Listo"></input>
</form>

<script>
	$( "#formAula" ).submit(function( event ) {
	  
	  var numero = $("#numero").val();
	  var capacidad = $("#capacidad").val();
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
	});
</script>