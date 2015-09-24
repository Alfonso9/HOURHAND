<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	public function index()
	{        
        $this->load->model("crud_model");
		$this->load->view('pagina_principal/principal_view');
	}
	
	function paginaCarreras()
	{
		$this->data['query'] = $this->crud_model->getNombreCarr();
		$this->load->view('carreras/carreras_view', $this->data);
	}

	function crearCarrera()
	{
		$this->load->library('form_validation');

		$data = array(	'codigoCarr' => $this->input->post('codigo'),
						'nombreCarr' => $this->input->post('nombre'),
						'creditosCarr' => $this->input->post('creditos') );

		$existe = $this->crud_model->validaCarrera($data['codigoCarr']);
		if ($existe == 0) 
		{
			$this->crud_model->createCarrera($data);
	        $this->data['query'] = $this->crud_model->getNombreCarr();
			$this->load->view('carreras/seccioncarreras_view', $this->data);
		}
		elseif ($existe == 1) 
		{
			echo json_encode($existe);
		}
		
	}

	function actualizarCarrera()
	{
		$data = array(
						'nombreCarr' => $this->input->post('nombre'),
						'creditosCarr' => $this->input->post('creditos') );
		$id = $this->input->post('codigo');
		$this->crud_model->updateCarrera($id, $data);
        $this->data['query'] = $this->crud_model->getNombreCarr();
		$this->load->view('carreras/seccioncarreras_view', $this->data);	
	}

	function getCarrera()
	{
		$id = $this->input->post('id');
		$this->data['carrera'] = $this->crud_model->getCarrera($id);
		$this->load->view('carreras/seccioninfo_view', $this->data);
	}

	function editarCarrera()
	{
		$codigo = $this->input->post('codigo');
		$this->data['carrera'] = $this->crud_model->getCarrera($codigo);
		$this->load->view('carreras/seccionformedit_view', $this->data);
	}
	
	function eliminarCarrera()
	{
		$id = $this->input->post('id');
		$this->crud_model->delCarrera($id);
		$this->data['query'] = $this->crud_model->getNombreCarr();
		$this->load->view('carreras/seccioncarreras_view', $this->data);
	}

	function formcrearcarrera()
	{
		$this->load->view('carreras/seccionformcrear_view');
	}

	function paginaAulas()
	{
		$this->data['query'] = $this->crud_model->getNombreAula();
		$this->load->view('aulas/aulas_view', $this->data);
	}

	function crearAula()
	{
		$data = array(	'numeroAula' => $this->input->post('numero'),
						'capacidAula' => $this->input->post('capacidad') );

		$existe = $this->crud_model->validaAula($data['numeroAula']);
		if ($existe == 0) 
		{	
			$this->crud_model->createAula($data);
	        $this->data['query'] = $this->crud_model->getNombreAula();
			$this->load->view('aulas/seccionaulas_view', $this->data);	
    	}	
    	elseif ($existe == 1) 
    	{
    		echo json_encode($existe);
    	}
	}

	function actualizarAula()
	{
		$data = array(
						'numeroAula' => $this->input->post('numero'),
						'capacidAula' => $this->input->post('capacidad') );
		$id = $this->input->post('numero');
		$this->crud_model->updateAula($id, $data);
        $this->data['query'] = $this->crud_model->getNombreAula();
		$this->load->view('aulas/seccionaulas_view', $this->data);
   	}

	function getAula()
	{
		$id = $this->input->post('id');
		$this->data['aula'] = $this->crud_model->getAula($id);
		$this->load->view('aulas/seccioninfo_view', $this->data);
	}

	function editarAula()
	{
		$numero = $this->input->post('numero');
		$this->data['aula'] = $this->crud_model->getAula($numero);
		$this->load->view('aulas/seccionformedit_view', $this->data);
	}
	
	function eliminarAula()
	{
		$id = $this->input->post('id');
		$this->crud_model->delAula($id);
		$this->data['query'] = $this->crud_model->getNombreAula();
		$this->load->view('aulas/seccionaulas_view', $this->data);
	}

	function formcrearaula()
	{
		$this->load->view('aulas/seccionformcrear_view');
	}

	function paginaMaestros()
	{
		$this->data['query'] = $this->crud_model->getNombreMaestro();
		$this->load->view('maestros/maestros_view', $this->data);
	}

	function crearMaestro()
	{
		$data = array(	'numMtro' => $this->input->post('numero'),
						'nombMtro' => $this->input->post('nombre'),
						'tipoMtro' => $this->input->post('tipo'),
						'horasMtro' => $this->input->post('horas') );

		$existe = $this->crud_model->validaMaestro($data['numMtro']);
		if ($existe == 0) 
		{
			$this->crud_model->createMaestro($data);
	        $this->data['query'] = $this->crud_model->getNombreMaestro();
			$this->load->view('maestros/seccionmaestros_view', $this->data);
		}
		elseif ($existe == 1) 
		{
			echo json_encode($existe);
		}			
	}

	function actualizarMaestro()
	{
		$data = array(
						'nombMtro' => $this->input->post('nombre'),
						'tipoMtro' => $this->input->post('tipo'),
						'horasMtro' => $this->input->post('horas') );
		$id = $this->input->post('numero');

		$this->crud_model->updateMaestro($id, $data);
        $this->data['query'] = $this->crud_model->getNombreMaestro();
		$this->load->view('maestros/seccionmaestros_view', $this->data);	
	}

	function getMaestro()
	{
		$id = $this->input->post('id');
		$this->data['maestro'] = $this->crud_model->getMaestro($id);
		$this->load->view('maestros/seccioninfo_view', $this->data);
	}

	function editarMaestro()
	{
		$numero = $this->input->post('numero');
		$this->data['maestro'] = $this->crud_model->getMaestro($numero);
		$this->load->view('maestros/seccionformedit_view', $this->data);
	}
	
	function eliminarMaestro()
	{
		$id = $this->input->post('id');
		$this->crud_model->delMaestro($id);
		$this->data['query'] = $this->crud_model->getNombreMaestro();
		$this->load->view('maestros/seccionmaestros_view', $this->data);
	}

	function formcrearmaestro()
	{
		$this->load->view('maestros/seccionformcrear_view');
	}

	/* Nombre: paginaHorario
	   Autor: Alfonso
	   Descripcion: Devuelve la página de horario
	*/
	function paginaHorario()
	{
		$this->data['carreras'] = $this->crud_model->getCarreras();
		$this->data['aulas'] = $this->crud_model->getAulas();
		$this->load->view('horarios/horarios_view', $this->data);
	}

	/* Nombre: seccionEE
	   Autor: Alfonso
	   Descripcion: Devuelve la página de seccion de EE
	*/
	function seccionEE()
	{	
		$codigo = $this->input->post('codigo');
		$this->data['ee'] = $this->crud_model->getEE($codigo);
		$this->load->view('horarios/seccionEE_view', $this->data);
	}

	/* Nombre: seccionHorario
	   Autor: Alfonso
	   Descripcion: Devuelve la página de seccion de EE
	*/
	function seccionHorario()
	{	
		$numeroaula = $this->input->post('numeroaula');
		$hora = $this->crud_model->getHorario($numeroaula);
		if (!is_null($hora)) 
		{
			$this->data['rows'] = ($hora->hrSHorario + 1) - $hora->hrEHorario;
			$this->data['entrada'] = $hora->hrEHorario;
			$this->data['numeroaula'] = $numeroaula;
			$this->load->view('horarios/seccionHoras_view', $this->data);
		}else
		{
			echo json_encode('-1');
		}
	}

	/* Nombre: setMovimiento
	   Autor: Alfonso
	   Descripcion: Recibe los datos de los elementos arrastrados
	*/
	function setMovimiento()
	{	
		$nrcEE = $this->input->post('nrc');
		$id = $this->input->post('id');
		list($nrc, $numEE) = explode(":", $nrcEE);
		list($dia, $hora, $numeroAula) = explode(":", $id);
		//$this->crud_model->setMovimiento($nrc, $numeroAula, $numEE, $hora, $dia);
		echo json_encode($this->crud_model->setMovimiento($nrc, $numeroAula, $numEE, $hora, $dia));
	}

	/* Nombre: getMovimiento
	   Autor: Alfonso
	   Descripcion: Recibe los datos de los elementos arrastrados
	*/
	function getMovimiento()
	{	
		$id = $this->input->post('numeroaula');
		echo json_encode($this->crud_model->getMovimiento($id));
	}

	/* Nombre: getposicAsigEE
	   Autor: Alfonso
	   Descripcion: Devuleve el campo EE posicAsig con el id especifico
	*/
	function getposicAsigEE()
	{	
		$id = $this->input->post('nrc');
		echo json_encode($this->crud_model->getposicAsigEE($id));
	}

	/* Nombre: borrarMovimiento
	   Autor: Alfonso
	   Descripcion: Recibe los datos del elemento a borrar
	*/
	function borrarMovimiento()
	{	
		$id = $this->input->post('id');
		list($nrc, $aula, $posicAsig) = explode(":", $id);
		echo json_encode($this->crud_model->borrarMovimiento($nrc, $aula, $posicAsig));
	}

	function paginaInicio()
	{
		$this->load->view('pagina_principal/inicio_view');
	}

    function paginaEE()
	{
		$this->data['query'] = $this->crud_model->getNombreEE();
        $this->data['query2'] = $this->crud_model->comboCarrera();
        $this->data['query3']= $this->crud_model->getNombreCarr();
		$this->load->view('EE/EE_view', $this->data);
	}

	function crearEE()
	{
		$data = array(	'nrcEE' => $this->input->post('nrc'),
						'codigoCarr' => $this->input->post('carrera'),
						'nombEE' => $this->input->post('nombre'),
						'periodEE' => $this->input->post('periodo'),
						'areaEE' => $this->input->post('area'),
						'tipoEE' => $this->input->post('tipo'),
						'hrsteoriaEE' => $this->input->post('hrsT'),
						'hrspractEE' => $this->input->post('hrsP'),
						'creditEE' => $this->input->post('creditos')
						);
		$existe = $this->crud_model->validaEE($data['nrcEE']);
		if ($existe == 0) 
		{
			$this->crud_model->crearEE($data);
			$this->data['query'] = $this->crud_model->getNombreEE();
			$this->load->view('EE/seccionEE_view', $this->data);
		}
		elseif ($existe == 1) 
		{
			echo json_encode($existe);
		}
		
	}
    function actualizarEE()
	{
		$data = array(	'nrcEE' => $this->input->post('nrc'),
						'codigoCarr' => $this->input->post('carrera'),
						'nombEE' => $this->input->post('nombre'),
						'periodEE' => $this->input->post('periodo'),
						'areaEE' => $this->input->post('area'),
						'tipoEE' => $this->input->post('tipo'),
						'hrsteoriaEE' => $this->input->post('hrsT'),
						'hrspractEE' => $this->input->post('hrsP'),
						'creditEE' => $this->input->post('creditos')
						);
        $id = $this->input->post('nrc');
        $id2=  $this->input->post('carrera');
		$this->crud_model->updateEE($id, $data);
		$this->data['query'] = $this->crud_model->getNombreCarrEE($id2);
		$this->load->view('EE/seccionEE_view', $this->data);
		
	}    

    function getEE()
	{
		$id = $this->input->post('id');
		$this->data['ee'] = $this->crud_model->getEEE($id);
		$this->load->view('EE/seccioninfoEE_view', $this->data);
	}

    function getCarreraEE()
	{
		$id = $this->input->post('id');
		$this->data['carrera'] = $this->crud_model->getCarreraEE($id);
		$this->data['query']= $this->crud_model->getNombreCarrEE($id);
		$this->load->view('EE/seccionEE_view', $this->data);
	}

    function editarEE()
	{
		$id = $this->input->post('id');
		$this->data['ee'] = $this->crud_model->getEEE($id);
        $this->data['query2'] = $this->crud_model->comboCarrera();
        $this->data['arreglo'] = array("Básica General", "Iniciación a la Diciplina", "Diciplinaria", "Terminal");
        $this->data['arreglo2'] = array("Obligatoria", "Optativa");
        $this->data['arreglo3'] = array("FEB-JUL", "AGO-ENE");
		$this->load->view('EE/seccionformEE_view', $this->data);         
	}

	function eliminarEE()
	{
		$id = $this->input->post('id');
		$this->crud_model->delEE($id);
		$this->data['query'] = $this->crud_model->getNombreEE();
		$this->load->view('EE/seccionEE_view', $this->data);
	}
        
    function formcrearEE()
	{
		$this->data['query'] = $this->crud_model->getNombreEE();
        $this->data['query2'] = $this->crud_model->comboCarrera();
        $this->data['query3']= $this->crud_model->getNombreCarr();
		$this->load->view('EE/seccionformCrearEE_view', $this->data);
	}

	/* Nombre: Reportes
	   Autor: Alfonso
	   Descripcion: Envía la pagina de Reportes
	*/
	function Reportes()
	{
		$this->load->view('reportes/paginaReportes_view');
	}

	/* Nombre: crearReporte
	   Autor: Alfonso
	   Descripcion: Realiza una consulta para el reporte
	   y envia la vista de Info
	*/
	function subTiposReporte()
	{
		$tipo = $this->input->post('tipo');
		$this->data['query'] = $this->crud_model->getTipo($tipo);
		if (is_null($this->data['query']))   {
			return 0;
		}
		$this->load->view('reportes/info_report_view', $this->data);
	}


	function previaReporte()
	{
		$id = $this->input->post('id');
		$this->data['ee'] = $this->crud_model->getEEByAula($id);

		$arr = array(); $arrayTmp = array(); $nrc = '';
		foreach ($this->data['ee'] as $value):
		    if ($value->nrcEE == $nrc) 
		    {
		      	$arrayTmp = array_pop($arr);
				array_push($arrayTmp, $value->diaAsig);
				array_push($arrayTmp, $value->horaAsig);
		      	array_push($arr, $arrayTmp);
		      $arrayTmp = array();
		    }
		    else
		    {
		       array_push($arrayTmp, $value->nrcEE);
		       $nrc = $value->nrcEE;
		       array_push($arrayTmp, $value->nombEE);
		       array_push($arrayTmp, $value->diaAsig);
		       array_push($arrayTmp, $value->horaAsig);

		       array_push($arr, $arrayTmp);
		    }
		endforeach;
		echo json_encode($arr);
		//$html = "No ha seleccionado el reporte".$id;
		//$html = $this->load->view('reportes/pdfReporte_view','',true);
		$this->data['arr'] = $arr;
		$html = $this->load->view('reportes/reporteAula_view', $this->data, true);
		$data = pdf_create($html, '', false);
     	write_file('recursos/pdf/temporal.pdf', $data);
     	
	}
}

