<form id="formCarrera" method="post">
    <div class="form-group" >
        <label for="">Carrera</label><br>
        <select id="carreraEE" name="carreraEE" placeholder="Carrera"></select>
    </div>
    <div class="form-group" >
        <label for="">NRC</label><br>
        <input type="text" id="nrc" name="nrc" placeholder="" value="<?php echo $ee->nrcEE; ?>">
    </div>
    <div class="form-group">
        <label for="">Nombre</label><br>
        <input type="text" id="nombreEE" name="nombreEE" placeholder="Nombre" value="<?php echo $ee->nombEE; ?>">
    </div>
    <div class="form-group" >
        <label for="">Periodo</label><br>
        <select id="periodoEE" name="periodoEE" placeholder="Periodo">
            <option value="0">Seleccione una opción..</option>
            <option value="1">FEB-JUL</option>
            <option value="2">AGO-ENE</option>

        </select>
    </div>
    <div class="form-group" >
        <label for="">Área</label><br>
        <select id="areaEE" name="areaEE" placeholder="Área">
            <option value="0">Seleccione una opción...</option>
            <option value="1">Básica General</option>
            <option value="2">Iniciación  a la Diciplina</option>
            <option value="3">Diciplinaria</option>
            <option value="4">Terminal</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Créditos</label><br>
        <input type="text" id="creditos" name="creditos" placeholder="Créditos" value="<?php echo $ee->creditEE; ?>">
    </div>
    <div class="form-group" >
        <label for="">Tipo</label><br>
        <select id="tipoEE" name="tipoEE" placeholder="Tipo">
            <option value="0">Selecione una opción...</option>
            <option value="1">Obligatoria</option>
            <option value="2">Optativa</option>
        </select>
    </div>
    <div class="form-group" >
        <label for="">Horas Teóricas</label><br>
        <input type="text" id="hrsT" name="hrsT" placeholder="Numero de horas" value="<?php echo $ee->hrsteoriaEE; ?>">
    </div>
    <div class="form-group" >
        <label for="">Horas Prácticas</label><br>
        <input type="text" id="hrsP" name="hrsP" placeholder="Numero de horas" value="<?php echo $ee->hrspractEE; ?>">
    </div>
    <button type="submit" id="submit" class="btn btn-default">Listo</button>
</form>