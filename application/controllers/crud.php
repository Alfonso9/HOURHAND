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

	function paginaAulas()
	{
		$this->data['query'] = $this->crud_model->getNombreAula();
		$this->load->view('aulas/aulas_view', $this->data);
	}

	function crearAula()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('numero', 'número', 'required');
		$this->form_validation->set_rules('capacidad', 'capacidad', 'required');
		$data = array(	'numeroAula' => $this->input->post('numero'),
						'capacidAula' => $this->input->post('capacidad') );

		if($this->form_validation->run() == true){
			$this->crud_model->createAula($data);
	        $this->data['query'] = $this->crud_model->getNombreAula();
			$this->load->view('aulas/seccionaulas_view', $this->data);
    	}elseif ($this->form_validation->run() == false) {
    		$this->data['query'] = $this->crud_model->getNombreAula();
			$this->load->view('aula/seccionaulas_view', $this->data);	
    	}	
	}

	function actualizarAula()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('numero', 'número', 'required');
		$this->form_validation->set_rules('capacidad', 'capacidad', 'required');
		$data = array(
						'numeroAula' => $this->input->post('numero'),
						'capacidAula' => $this->input->post('capacidad') );
		$id = $this->input->post('numero');

		if($this->form_validation->run() == true){
			$this->crud_model->updateAula($id, $data);
	        $this->data['query'] = $this->crud_model->getNombreAula();
			$this->load->view('aulas/seccionaulas_view', $this->data);
    	}elseif ($this->form_validation->run() == false) {
    		$this->data['query'] = $this->crud_model->getNombreAula();
			$this->load->view('aulas/seccionaulas_view', $this->data);	
    	}
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
		$this->load->library('form_validation');

		$this->form_validation->set_rules('numero', 'número', 'required');
		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('tipo', 'tipo', 'required');
		$this->form_validation->set_rules('horas', 'horas', 'required');
		$data = array(	'numMtro' => $this->input->post('numero'),
						'nombMtro' => $this->input->post('nombre'),
						'tipoMtro' => $this->input->post('tipo'),
						'horasMtro' => $this->input->post('horas') );

		if($this->form_validation->run() == true){
			$this->crud_model->createMaestro($data);
	        $this->data['query'] = $this->crud_model->getNombreMaestro();
			$this->load->view('maestros/seccionmaestros_view', $this->data);
    	}elseif ($this->form_validation->run() == false) {
    		$this->data['query'] = $this->crud_model->getNombreMaestro();
			$this->load->view('maestros/seccionmaestros_view', $this->data);	
    	}	
	}

	function actualizarMaestro()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('numero', 'número', 'required');
		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('tipo', 'tipo', 'required');
		$this->form_validation->set_rules('horas', 'horas', 'required');
		$data = array(
						'nombMtro' => $this->input->post('nombre'),
						'tipoMtro' => $this->input->post('tipo'),
						'horasMtro' => $this->input->post('horas') );
		$id = $this->input->post('numero');

		if($this->form_validation->run() == true){
			$this->crud_model->updateMaestro($id, $data);
	        $this->data['query'] = $this->crud_model->getNombreMaestro();
			$this->load->view('maestros/seccionmaestros_view', $this->data);
    	}elseif ($this->form_validation->run() == false) {
    		$this->data['query'] = $this->crud_model->getNombreMaestro();
			$this->load->view('maestros/seccionmaestros_view', $this->data);	
    	}
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




}


	