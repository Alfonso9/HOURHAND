<form id="formCrearEE" action="crud/crearEE">
    <div class="form-group" >
        <label for="">Carrera</label><br>
        <select id="carreraEE" name="carreraEE">
            <option>Selecciona una opción...</option>
            <?php foreach ($query2 as $carrera):     
                if (($ee->codigoCarr) == ($carrera->codigoCarr)){
                  ?>
                    <option selected="selected" id='<?php echo $carrera->codigoCarr; ?>' 
                            onclick="selec(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
                        <?php echo $carrera->nombreCarr; ?>
                    </option>
                 <?php }
                else { 
                  ?>
                   <option  id='<?php echo $carrera->codigoCarr; ?>' 
                            onclick="selec(<?php echo htmlspecialchars(json_encode($carrera->codigoCarr)); ?>)">
                            <?php echo $carrera->nombreCarr; ?>
                    </option>
                <?php  } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group" >
        <label for="">NRC</label><br>
        <input  type="text" id="nrc" value="<?php echo $ee->nrcEE; ?>"
                pattern="[0-9]{5}" placeholder="Ejemplo: 12345" title="Deben ser 5 caracteres">
    </div>
    <div class="form-group">
        <label for="">Nombre</label><br>
        <input  type="text" id="nombreEE" value="<?php echo $ee->nombEE; ?>"
            pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú\s]+" placeholder="Ejemplo: Logica" 
            title="Primera letra mayúscula. Máximo 50 caracteres">
    </div>
    <div class="form-group" >
        <label for="">Periodo</label><br>
        <select id="periodoEE" name="periodoEE" placeholder="Periodo">
            <option>Seleccione una opción..</option>
            <?php foreach ($arreglo3 as $periodos ):
                if (($ee->periodEE) == ($periodos)){  
                ?>
                <option id="<?php echo $periodos;?>" onclick="<?php echo $periodos;?>"
                        selected="selected">
                    <?php echo $periodos;?>
                </option>
                <?php }
                else{ ?>
                <option id="<?php echo $periodos;?>" onclick="<?php echo $periodos;?>">
                    <?php echo $periodos;?>
                </option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group" >
        <label for="">Área</label><br>
        <select id="areaEE" name="areaEE" placeholder="Área">
            <option value="0">Seleccione una opción...</option>
            <?php $i=0 ;
                    foreach ($arreglo as $areas ):
                        $i++;
                        if (($ee->areaEE) == ($areas)){  
                        ?>
                            <option id="area<?php echo $i; ?>" onclick="selec(area<?php echo $i; ?>)"
                                    selected="selected">
                                <?php echo $areas;?>
                            </option>
                        <?php }
                        else{ ?>
                            <option id="area<?php echo $i; ?>" onclick="selec(area<?php echo $i; ?>)">
                                <?php echo $areas;?>
                            </option>
                        <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Créditos</label><br>
        <input type="text" id="creditos" name="creditos" placeholder="Créditos" 
        value="<?php echo $ee->creditEE; ?>">
    </div>
    <div class="form-group">
        <label for="">Créditos</label><br>
        <input type="text" id="creditos" name="creditos" placeholder="Créditos" value="<?php echo $ee->creditEE; ?>">
    </div>
    <div class="form-group" >
        <label for="">Tipo</label><br>
        <select id="tipoEE" placeholder="Tipo">
            <option>Selecione una opción...</option>
            <?php $i = 0;
                foreach ($arreglo2 as $tipos ):
                    $i++;
                    if (($ee->tipoEE) == ($tipos)){ ?>
                        <option id="tipo<?php echo $i; ?>" 
                                onclick="selec(tipo<?php echo $i; ?>)" 
                                selected="selected">
                            <?php echo $tipos;?>
                        </option>
                    <?php }
                        else{ 
                    ?>
                        <option id="tipo<?php echo $i; ?>" 
                                onclick="selec(tipo<?php echo $i; ?>)">
                            <?php echo $tipos;?>
                        </option>
                    <?php   } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group" >
        <label for="">Horas Teóricas</label><br>
        <input type="text" id="hrsT" placeholder="Numero de horas" value="<?php echo $ee->hrsteoriaEE; ?>">
    </div>
    <div class="form-group" >
        <label for="">Horas Prácticas</label><br>
        <input type="text" id="hrsP" name="hrsP" placeholder="Numero de horas" value="<?php echo $ee->hrspractEE; ?>">
    </div>
    <input type="submit" id="submit" class="btn btn-default" value="Listo"></input>
</form>
<script>
    function selec(codigo)
    {
        var sel = document.getElementById(codigo);
        sel.setAttribute("selected", "selected");
    }

    $("#formCrearEE").submit(function( event ) 
    {
        event.preventDefault();
        var carrera = document.getElementById("carreraEE");
        var idCarrera = carrera.options[carrera.selectedIndex].id;
        var nrc = $("#nrc").val();
        var nombre = $("#nombre").val();
        var periodo = document.getElementById("periodoEE");
        var idPeriodo = periodo.options[periodo.selectedIndex].id;
        var area = document.getElementById("areaEE");
        var idArea = area.options[area.selectedIndex].id;
        switch(idArea) 
        {
            case "area1":
                area = "Básica General";
                break;
            case "area2":
                area = "Iniciación  a la Diciplina";
                break;
            case "area3":
                area = "Diciplinaria";
                break;
            case "area4":
                area = "Terminal";
                break;
            default:
                break;
        }
        var creditos = $("#creditos").val();
        var tipo = document.getElementById("tipoEE");
        var idTipo = tipo.options[tipo.selectedIndex].id;
        switch(idTipo) 
        {
            case "tipo1":
                tipo = "Obligatoria";
                break;
            case "tipo2":
                tipo = "Optativa";
                break;
            default:
                break;
        }
        var hrsT = $("#hrsT").val();
        var hrsP = $("#hrsP").val();

        $.ajax
            ({
                type: "POST",
                url: $(this).attr("action"),
                data: { 'carrera': idCarrera,
                        'nrc':nrc,
                        'nombre':nombre,
                        'periodo':idPeriodo,
                        'area':area,
                        'creditos':creditos,
                        'tipo':tipo,
                        'hrsT':hrsT,
                        'hrsP':hrsP},
                success: function(jso)
                        {
                            try
                            {                                                                      
                                alert(jso); 
                                $("#div-ee").html(jso);                       
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