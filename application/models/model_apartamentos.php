<?php
class Model_apartamentos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function cargar_apartamentos($id = FALSE)
	{
		if($id === FALSE)
		{
			$this->db->select('idapart, descripcion_ap, ubicacion');
			$this->db->from('apartamento');
			
			$query = $this->db->get();
			return $query->result_array();
		}
		else
		{
			$this->db->select('idapart, descripcion_ap, ubicacion');
			$this->db->from('apartamento');
			$this->db->where('idapart', $id);
			$query2 = $this->db->get();
			return $query2->row_array();
		}
	}
	public function m_registrar_apartamento()
	{
		
		$data = array(
			'descripcion_ap' => $this->input->post('descripcion'),
			'ubicacion' => $this->input->post('ubicacion')
		);
		return $this->db->insert('apartamento', $data);
	}
	public function m_editar_apartamento()
	{
		
		$data = array(
			'descripcion_ap' => $this->input->post('descripcion'),
			'ubicacion' => $this->input->post('ubicacion')
		);
		$this->db->where('idapart', $this->input->post('idapart'));
		return	$this->db->update('apartamento', $data);
	}

}
?>