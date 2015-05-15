<nav>
  <h2>HORARIOS</h2>
</nav>
<nav>
    <ul class="nav nav-tabs aulas">
      <?php foreach($aulas as $aula): ?>
        <li id="<?php echo $aula->numeroAula; ?>" role="presentation">
            <a onclick="verHorario('<?php echo $aula->numeroAula; ?>')">
              <?php echo $aula->numeroAula; ?>
            </a>
        </li>
      <?php endforeach; ?>
    </ul>
</nav>
<div class="container-fluid canvasHor">
  <div class="col-md-1 show-grid">
    <select name="carreras">
      <?php foreach($carreras as $carrera): ?>
        <option onclick="verEE('<?php echo $carrera->codigoCarr; ?>')" >
                  <?php echo $carrera->nombreCarr; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-8 show-grid horario">
    <div class="row-fluid">
      <div class="col-md-1 color4"><p>Hora/Dia</p></div>
      <div class="col-md-1 color4"><p>Lunes</p></div>
      <div class="col-md-1 color4"><p>Martes</p></div>
      <div class="col-md-1 color4"><p>Miercoles</p></div>
      <div class="col-md-1 color4"><p>Jueves</p></div>
      <div class="col-md-1 color4"><p>Viernes</p></div>
      <div class="col-md-1 color4"><p>Sabado</p></div>
    </div>
    <div id="row-horas"></div>
  </div>
  <div id="disponibles" class="col-md-1 show-grid"></div>
  <div id="EE" class="col-md-1 show-grid EE"></div>
  <div id="sinUso" class="col-md-1 show-grid EE"></div>
  </div>
</div>
<script>
  
</script>