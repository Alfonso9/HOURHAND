<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

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

		$this->form_validation->set_rules('codigo', 'código', 'required');
		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('creditos', 'créditos', 'required');
		$data = array(	'codigoCarr' => $this->input->post('codigo'),
						'nombreCarr' => $this->input->post('nombre'),
						'creditosCarr' => $this->input->post('creditos') );

		if($this->form_validation->run() == true){
			$this->crud_model->createCarrera($data);
	        $this->data['query'] = $this->crud_model->getNombreCarr();
			$this->load->view('carreras/seccioncarreras_view', $this->data);
    	}elseif ($this->form_validation->run() == false) {
    		$this->data['query'] = $this->crud_model->getNombreCarr();
			$this->load->view('carreras/seccioncarreras_view', $this->data);	
    	}	
	}

	function actualizarCarrera()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('codigo', 'código', 'required');
		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('creditos', 'créditos', 'required');
		$data = array(
						'nombreCarr' => $this->input->post('nombre'),
						'creditosCarr' => $this->input->post('creditos') );
		$id = $this->input->post('codigo');

		if($this->form_validation->run() == true){
			$this->crud_model->updateCarrera($id, $data);
	        $this->data['query'] = $this->crud_model->getNombreCarr();
			$this->load->view('carreras/seccioncarreras_view', $this->data);
    	}elseif ($this->form_validation->run() == false) {
    		$this->data['query'] = $this->crud_model->getNombreCarr();
			$this->load->view('carreras/seccioncarreras_view', $this->data);	
    	}
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
		$this->crud_model->setMovimiento($nrc, $numeroAula, $numEE, $hora, $dia);
		//echo json_encode($this->crud_model->setMovimiento($nrc, $numeroAula, $numEE, $hora, $dia));
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
}