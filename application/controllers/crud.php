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

		if ($this->form_validation->run() == FALSE)
		{
			$this->data['query'] = $this->crud_model->getNombreCarr();
			$this->load->view('carreras/carreras_view', $this->data);
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
		$id = $this->input->post('id');
		$this->data['carrera'] = $this->crud_model->getCarrera($id);
		$this->load->view('carreras/seccionform_view', $this->data);
	}

	function eliminarCarrera()
	{
		$id = $this->input->post('id');
		$this->crud_model->delCarrera($id);
		$this->data['query'] = $this->crud_model->getNombreCarr();
		$this->load->view('carreras/seccioncarreras_view', $this->data);
	}
        //SECCIÓN DE EXPERIENCIAS EDUCATIVAS
        function paginaEE()
	{
		$this->data['query'] = $this->crud_model->getNombreEE();
                $this->data['query2'] = $this->crud_model->comboCarrera();
                $this->data['query3']= $this->crud_model->getNombreCarr();
		$this->load->view('EE/EE_view', $this->data);
	}
        function getEE()
	{
		$id = $this->input->post('id');
		$this->data['ee'] = $this->crud_model->getEE($id);
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
		$this->data['ee'] = $this->crud_model->getEE($id);
                $this->data['query2'] = $this->crud_model->comboCarrera();
                $this->data['arreglo'] = array("Básica General", "Iniciación a la Diciplina", "Diciplinaria", "Terminal");
                $this->data['arreglo2'] = array("Obligatoria", "Optativa");
                 $this->data['arreglo3'] = array("FEB-JUL", "AGO-ENE");
		$this->load->view('EE/seccionformEE_view', $this->data);
               
	}

	function eliminarEE()
	{
		$id = $this->input->post('id');
		$this->crud_model->delCarrera($id);
		$this->data['query'] = $this->crud_model->getNombreEE();
		$this->load->view('EE/seccionEE_view', $this->data);
	}
        
}
