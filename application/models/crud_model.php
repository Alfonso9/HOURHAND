<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crud_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	
	/**
	 * createCarrera
	 *
	 * @author Alfonso
	*/
	public function createCarrera($data)
	{
		$this->db->insert('carrera', $data);
	}

	/**
	 * updateCarrera
	 *
	 * @author Alfonso
	*/
	public function updateCarrera($id, $data)
	{
		$this->db->where('codigoCarr', $id);
		$this->db->update('carrera', $data);
	}

	/**
	 * delCarrera
	 *
	 * @author Alfonso
	*/
	public function delCarrera($id)
	{
		$this->db->where('codigoCarr', $id); 
		$this->db->delete('carrera');
	}

	/**
	 * getCarrera
	 *
	 * @author Alfonso
	*/
	public function getCarrera($id)
	{
		$this->db->select('codigoCarr, nombreCarr, creditosCarr');
		$this->db->where('codigoCarr', $id); 
		$query = $this->db->get('carrera');
		return $query->row();
	}

	/**
	 * getNombreCarrera
	 *
	 * @author Alfonso
	*/
	public function getNombreCarr()
	{
		$this->db->select('codigoCarr, nombreCarr');
		$query = $this->db->get('carrera');
		return $query->result();
	}


	public function createAula($data)
	{
		$this->db->insert('aula', $data);
	}

	/**
	 * updateAula
	 *
	 * @author Alfonso
	*/
	public function updateAula($id, $data)
	{
		$this->db->where('numeroAula', $id);
		$this->db->update('aula', $data);
	}

	/**
	 * delAula
	 *
	 * @author Alfonso
	*/
	public function delAula($id)
	{
		$this->db->where('numeroAula', $id); 
		$this->db->delete('aula');
	}

	/**
	 * getAula
	 *
	 * @author Alfonso
	*/
	public function getAula($id)
	{
		$this->db->select('numeroAula, capacidAula');
		$this->db->where('numeroAula', $id); 
		$query = $this->db->get('aula');
		return $query->row();
	}

	/**
	 * getNombreAula
	 *
	 * @author Alfonso
	*/
	public function getNombreAula()
	{
		$this->db->select('numeroAula');
		$query = $this->db->get('aula');
		return $query->result();
	}


	public function createMaestro($data)
	{
		$this->db->insert('maestro', $data);
	}

	/**
	 * updateMaestro
	 *
	 * @author Alfonso
	*/
	public function updateMaestro($id, $data)
	{
		$this->db->where('numMtro', $id);
		$this->db->update('maestro', $data);
	}

	/**
	 * delMaestro
	 *
	 * @author Alfonso
	*/
	public function delMaestro($id)
	{
		$this->db->where('numMtro', $id); 
		$this->db->delete('maestro');
	}

	/**
	 * getMaestro
	 *
	 * @author Alfonso
	*/
	public function getMaestro($id)
	{
		$this->db->select('numMtro, nombMtro, tipoMtro, horasMtro');
		$this->db->where('numMtro', $id); 
		$query = $this->db->get('maestro');
		return $query->row();
	}

	/**
	 * getNombreCarrera
	 *
	 * @author Alfonso
	*/
	public function getNombreMaestro()
	{
		$this->db->select('numMtro, nombMtro');
		$query = $this->db->get('maestro');
		return $query->result();
	}

}