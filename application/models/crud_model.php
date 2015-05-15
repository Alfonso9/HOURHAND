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

	/**
	 * getCarreras
	 *
	 * @author Alfonso
	 *
	 * Description: Devuelve todas la carreras de la tabla carrera
	*/
	public function getCarreras()
	{
		$this->db->select('codigoCarr, nombreCarr');
		$query = $this->db->get('carrera');
		return $query->result();
	}

	/**
	 * getAulas
	 *
	 * @author Alfonso
	 *
	 * Description: Devuelve todas las aulas de la tabla aula
	*/
	public function getAulas()
	{
		$this->db->select('numeroAula, capacidAula');
		$query = $this->db->get('aula');
		return $query->result();
	}

	/**
	 * getEE
	 *
	 * @author Alfonso
	 *
	 * Description: Devuelve todas las EE de la tabla ee,
	 * que coincidan con el id de la carrera
	*/
	public function getEE($id)
	{
		$this->db->select('nombEE, nrcEE');
		$this->db->where('codigoCarr', $id);
		$query = $this->db->get('ee');
		return $query->result();
	}

	/**
	 * getHorario
	 *
	 * @author Alfonso
	 *
	 * Description: Devuelve todas los horarios de la tabla horario,
	 * que coincidan con el numero de aula
	*/
	public function getHorario($id)
	{
		$this->db->select('hrEHorario, hrSHorario');
		$this->db->where('numeroAula', $id);
		$query = $this->db->get('horario');
		return $query->row();
	}

	/**
	 * setMovimiento
	 *
	 * @author Alfonso
	 *
	 * Description: Almacena en la base datos los movimientos
	 * cuando se realiza en el drop
	*/
	public function setMovimiento($nrc, $numeroAula, $hora, $dia)
	{
		$this->db->select('claveHor');
		$this->db->where('numeroAula', $numeroAula);
		$claveHor = $this->db->get('horario');
		$claveHor = $claveHor->row();
		/*Cosultamos en la base para ver si ya se habia almacenado antes,
		si existe ($bandera = 1) entonces actualizamos y si no ($bandera = 0),
		 creamos el registro*/
		$bandera = $this->db->query("SELECT EXISTS(SELECT * FROM asignacion 
													WHERE nrcEE = '".$nrc."' 
													AND claveHor = '".$claveHor->claveHor."') AS bool;"
									); 
		$bandera = $bandera->row();
		if ($bandera->bool == 1) 
		{
			$data = array(				
               	'nrcEE' => $nrc,
               	'claveHor' => $claveHor->claveHor,
               	'posicAsig' => ' ',
               	'horaAsig' => $hora,
               	'diaAsig' => $dia
            );
			$this->db->where('claveHor', $claveHor->claveHor);
			$this->db->where('nrcEE', $nrc);
			$this->db->update('asignacion', $data); 
		}
		elseif ($bandera->bool == 0) 
		{
			$data = array(				
               	'nrcEE' => $nrc,
               	'claveHor' => $claveHor->claveHor,
               	'posicAsig' => ' ',
               	'horaAsig' => $hora,
               	'diaAsig' => $dia
            );
			$this->db->insert('asignacion', $data); 
		}	
	}

	/**
	 * getMovimiento
	 *
	 * @author Alfonso
	 *
	 * Description: Consulta los movimientos hechos.
	*/
	public function getMovimiento($numeroAula)
	{
		$this->db->select('claveHor');
		$this->db->where('numeroAula', $numeroAula);
		$claveHor = $this->db->get('horario');
		$claveHor = $claveHor->row();
		/*Cosultamos en la base para ver los movimientos*/
		$bandera = $this->db->query("SELECT EXISTS(SELECT * FROM asignacion 
													WHERE claveHor = '".$claveHor->claveHor."') AS bool;"
									); 
		$bandera = $bandera->row();
		if ($bandera->bool == 1) {
			$this->db->select('diaAsig, horaAsig, ee.nrcEE, nombEE');
			$this->db->where('claveHor', $claveHor->claveHor);
			$this->db->from('asignacion');
			$this->db->join('ee', 'ee.nrcEE = asignacion.nrcEE', 'right');
			$claveHor = $this->db->get();
			return $claveHor->result(); 
		}elseif ($bandera->bool == 0) {
			return 0; 
		}	
	}
}
