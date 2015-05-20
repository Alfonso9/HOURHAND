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
        //funciones Experiencias Educativas
    public function getEE($id)
	{

		$this->db->select('nrcEE, codigoCarr, nombEE, periodEE, areaEE, tipoEE, hrsteoriaEE, hrspractEE, creditEE');
		$this->db->where('nrcEE', $id); 
		$query = $this->db->get('ee');
		return $query->row();
	}

	public function crearEE($data)
	{
		$this->db->insert('ee', $data);
	}
    
    public function updateEE($id, $data)
	{
		$this->db->where('nrcEE', $id);
		$this->db->update('ee', $data);
	}
        
    public function getCarreraEE($id)
	{
		$this->db->select('codigoCarr, nombreCarr, creditosCarr');
		$this->db->where('codigoCarr', $id); 
		$query = $this->db->get('carrera');
		return $query->row();
	}
        
    public function getNombreEE()
	{
		$this->db->select('nrcEE, nombEE');
		$query = $this->db->get('ee');
		return $query->result();
	}
    
    public function getNombreCarrEE($id)
	{
		$this->db->select('nrcEE, nombEE');
                $this->db->where('codigoCarr', $id);
		$query = $this->db->get('ee');
		return $query->result();
        }

    public function delEE($id)
	{
		$this->db->where('nrcEE', $id); 
		$this->db->delete('ee');
	}

    public function comboCarrera()
	{
		$this->db->order_by('codigoCarr, nombreCarr','asc');
		$query2 = $this->db->get('carrera');
		if($query2->num_rows()>0)
		{
			return $query2->result();
		}
	}
}
