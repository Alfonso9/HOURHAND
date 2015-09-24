<style type="text/css">
  .reporteaula
  {
    margin-left: 50px;
    margin-right: 50px;
  }

  .tftable 
  {
    font-size:12px;
    color:#333333;
    width:100%;
    border-width: 1px;
    border-color: #9dcc7a;
    border-collapse: collapse;
  }

  .tftable th 
  {
    font-size:12px;
    background-color:#abd28e;
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #9dcc7a;
    text-align:left;
  }

  .tftable tr 
  {
    background-color:#ffffff;
  }

  .tftable td 
  {
    font-size:12px;
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #9dcc7a;
  }

  </style>


<div class="reporteaula">
  <h2>HORARIO / AULA / CC2</h2>
  <table class="tftable" border="1">
    <tr>
      <th>NRC</th>
      <th>MATERIA</th>
      <th>LUNES</th>
      <th>MARTES</th>
      <th>MIERCOLES</th>
      <th>JUEVES</th>
      <th>VIERNES</th>
    </tr>
    <?php print_r($arr); ?>
    <?php  foreach ($arr as $value): ?>
      <tr>
        <?php $arrayDias = array( '0' => 'lunes', 
                                  '1' => 'martes', 
                                  '2' => 'miercoles', 
                                  '3' => 'jueves', 
                                  '4' => 'viernes'); ?>
        <td><?php echo $value[0]; ?></td>
        <td><?php echo $value[1]; ?></td>
        <?php for ($i=2; $i <= count($value) ; $i++) { ?>       
              <?php                 
                //print_r($value);
                if (in_array($arrayDias[$i-2], $value)) { 
                  $clave = array_search($arrayDias[$i-2], $value);
                  $cadena =  $value[$clave+1];                                  
                  unset($value[$clave+1]);

                  echo $arrayDias[$i-2];
                  print_r($value);                  
                  echo in_array($arrayDias[$i-2], $value);

                  while(in_array($arrayDias[$i-2], $value) == 0)
                  {
                    echo "repetido".$value[$cl];
                    $cl = array_search($arrayDias[$i-2], $value);
                    $cadena.='/'.$value[$cl+1];                    
                    unset($value[$cl+1]);

                  }
                  ?>
                  <td><?php echo $cadena; ?></td>                 
              <?php  }
              else {?> <td> <?php echo '-';} ?></td>    
        <?php }; ?>
        
      </tr>
    <?php endforeach; ?>
  </table>
</div>  
