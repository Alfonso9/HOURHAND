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
		$this->db->select('nombEE, nrcEE, hrsteoriaEE, hrspractEE, creditEE');
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
	public function setMovimiento($nrc, $numeroAula, $posicAsig, $hora, $dia)
	{
		$this->db->select('claveHor');
		$this->db->where('numeroAula', $numeroAula);
		$claveHor = $this->db->get('horario');
		$claveHor = $claveHor->row();
		/*Cosultamos en la base para ver si ya se habia almacenado antes,
		si existe ($bandera = 1) entonces actualizamos y si no ($bandera = 0),
		 creamos el registro*/
		$existe = $this->db->query("SELECT EXISTS(SELECT * FROM asignacion 
													WHERE nrcEE = '".$nrc."' 
													AND claveHor = '".$claveHor->claveHor."' 
													AND posicAsig = '".$posicAsig."') AS bool;"
									);
		$traslape = $this->db->query("SELECT EXISTS(SELECT * FROM asignacion 
															WHERE 	nrcEE = '".$nrc."' AND
															 		horaAsig = '".$hora."' AND
																	diaAsig = '".$dia."') AS bool"
									);
		$traslMaestro = $this->db->query("SELECT valTraslMaestro(	'".$nrc."',
																	'".$claveHor->claveHor."', 
																	'".$dia."', 
																	'".$hora."') AS func"
									);

		$existe = $existe->row();
		$traslape = $traslape->row();
		$traslMaestro = $traslMaestro->row();
		$data = array(				
               	'nrcEE' => $nrc,
               	'claveHor' => $claveHor->claveHor,
               	'posicAsig' => $posicAsig,
               	'horaAsig' => $hora,
               	'diaAsig' => $dia
            );

		if ($traslape->bool == 1) 
		{
			$this->db->select('nombEE');
			$this->db->where('nrcEE', $nrc);
			$nombEE = $this->db->get('ee');
			$nombEE = $nombEE->row();
			return "<strong>Traslape:</strong> EE: <strong>".$nombEE->nombEE."</strong> Dia: <strong>"
															.$dia."</strong> Hora: <strong>"
															.$hora.":00 hrs</strong>";
		}elseif ($traslMaestro->func == 1) 
		{
			$this->db->select('nrcEE, numMtro');
			$this->db->where('horaAsig', $hora);
			$this->db->where('diaAsig', $dia);
			$this->db->where('claveHor !=', $claveHor->claveHor);
			$this->db->from('asignacion');
			$this->db->join('carga', 'carga.nrc = asignacion.nrcEE');
			$carga = $this->db->get();
			$carga = $carga->result();
			$this->db->select('nombMtro');
			$this->db->where('numMtro', $carga[0]->numMtro);
			$maestro = $this->db->get('maestro');
			$maestro = $maestro->result();
			$this->db->select('nombEE');
			$this->db->where('nrcEE', $carga[0]->nrcEE);
			$ee = $this->db->get('ee');
			$ee = $ee->row();
			$this->db->select('nombEE');
			$this->db->where('nrcEE', $nrc);
			$eeA = $this->db->get('ee');
			$eeA = $eeA->row();
			return "<strong>Traslape:</strong> 	MAESTRO: <strong>".$maestro[0]->nombMtro.
												"</strong> EE: <strong>".$ee->nombEE.
												"</strong> con EE: <strong>".$eeA->nombEE.
												"</strong> Dia: <strong>".$dia.
												"</strong> Hora: <strong>".$hora.":00 hrs</strong>";
		}elseif ($existe->bool == 1) 
		{
			$this->db->where('claveHor', $claveHor->claveHor);
			$this->db->where('nrcEE', $nrc);
			$this->db->where('posicAsig', $posicAsig);
			$this->db->update('asignacion', $data); 
		}
		elseif ($existe->bool == 0) 
		{
           // return $posicAsig;
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
			$this->db->select('diaAsig, horaAsig, ee.nrcEE, nombEE, posicAsig');
			$this->db->where('claveHor', $claveHor->claveHor);
			$this->db->from('asignacion');
			$this->db->join('ee', 'ee.nrcEE = asignacion.nrcEE', 'right');
			$claveHor = $this->db->get();
			return $claveHor->result(); 
		}elseif ($bandera->bool == 0) {
			return 0; 
		}	
	}

	/**
	 * getposicAsigEE
	 *
	 * @author Alfonso
	 *
	 * Description: Consulta los movimientos hechos.
	*/
	public function getposicAsigEE($nrc)
	{
		$num = $this->db->query("SELECT posicAsig FROM asignacion 
													WHERE nrcEE = '".$nrc."';"
									); 
		return $num->result();
	}

	/**
	 * borrarMovimiento
	 *
	 * @author Alfonso
	 *
	 * Description: Borra el elemento de la base de datos
	*/
	public function borrarMovimiento($nrc, $numeroAula, $posicAsig)
	{
		$this->db->select('claveHor');
		$this->db->where('numeroAula', $numeroAula);
		$claveHor = $this->db->get('horario');
		$claveHor = $claveHor->row();
		/*Cosultamos en la base para ver los movimientos*/
		$bandera = $this->db->query("SELECT EXISTS(SELECT * FROM asignacion 
													WHERE 	nrcEE = '".$nrc."' AND
															claveHor = '".$claveHor->claveHor."' AND
															posicAsig = '".$posicAsig."') AS bool;"
									); 
		$bandera = $bandera->row();
		if ($bandera->bool == 1) 
		{
			$this->db->where('nrcEE', $nrc);
			$this->db->where('claveHor', $claveHor->claveHor);
			$this->db->where('posicAsig', $posicAsig); 
			$this->db->delete('asignacion');
			return 1;
		}elseif ($bandera->bool == 0) 
		{
			return 0; 
		}	
	}
}
