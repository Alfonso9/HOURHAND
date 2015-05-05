<span><?php echo validation_errors(); ?></span>

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
	<div class="form-group">
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