<nav class="row paginaHorario">
  <div class="col-md-12 grid8Horario">
  <h2 class="tituloHorario">HORARIOS</h2>
  </div>
</nav>
<div id="alertaHorarios"></div>
<nav class="aulasnav">
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
<div class="col-xs-12 col-md-12 col-lg-12">
  <div class="col-xs-2 col-md-2 col-lg-2">
    <div class="container-fluid canvasHor">
      <div class="show-grid selectCarr">
        <select name="carreras">
          <?php foreach($carreras as $carrera): ?>
            <option onclick="verEE('<?php echo $carrera->codigoCarr; ?>')" >
                      <a><?php echo $carrera->nombreCarr; ?></a>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div id="iMaestro"></div>
  </div>
  <div class="col-xs-7 col-md-7 col-lg-7">
      <div class="show-grid horario">
        <div class="row-fluid">
          <div class="col-md-1 color4"><p>Hora/Dia</p></div>
          <div class="col-md-1 color4"><p>Lunes</p></div>
          <div class="col-md-1 color4"><p>Martes</p></div>
          <div class="col-md-1 color4"><p>Miercoles</p></div>
          <div class="col-md-1 color4"><p>Jueves</p></div>
          <div class="col-md-1 color4"><p>Viernes</p></div>
          <!--div class="col-md-1 color4"><p>Sabado</p></div-->
        </div>
        <div id="row-horas"></div>
      </div>
  </div>
  <div id="EEdisp" class="col-md-1 show-grid EE EEdispo"></div>
  <div id="EE" class="col-md-1 show-grid EE"></div>
</div>