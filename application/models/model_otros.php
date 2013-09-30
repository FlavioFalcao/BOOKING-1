<?php
class Model_otros extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		
	}
// --------------------------------------------------------------------   TABLA TIPO-PAGO  --------------------------------------------------------------------
	public function cargar_tipo_pago()
	{
		$estado = 1;
			$this->db->select("idtipo_pago_garantia, descripcion_pg");
			$this->db->from('tipo_pago');
			$this->db->where('estado_tp', $estado);

			$query = $this->db->get();
			return $query->result_array();
	}
	public function m_anular_tipo_pago($id)
	{
		$estado = 0;	
		$data = array(
               'estado_tp' => $estado
            );
			$this->db->where('idtipo_pago_garantia', $id);
		return	$this->db->update('tipo_pago', $data);

	}
	public function m_registrar_tipo_pago()
	{
		
		$data = array(
			'descripcion_pg' => $this->input->post('descripcion')
		);
		return $this->db->insert('tipo_pago', $data);
	}
// --------------------------------------------------------------------   TABLA CUENTAS  --------------------------------------------------------------------
	public function cargar_cuentas_usuario($idusuario)
	{
		$estado = 1;
			$this->db->select("idcuenta, descripcion_cu");
			$this->db->from('cuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->where('estado_cu', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function m_anular_cuenta($id)
	{
		$estado = 0;	
		$data = array(
               'estado_cu' => $estado
            );
			$this->db->where('idcuenta', $id);
		return	$this->db->update('cuenta', $data);

	}
	public function m_registrar_cuenta()
	{
		
		$data = array(
			'descripcion_cu' => $this->input->post('descripcion')
		);
		return $this->db->insert('cuenta', $data);
	}
// --------------------------------------------------------------------   TABLA TIPO_VENTAS  --------------------------------------------------------------------
	public function cargar_tipo_venta()
	{

			$this->db->select("idtipo_venta, tv_descripcion");
			$this->db->from('wp_tipoventa');

			$query = $this->db->get();
			return $query->result_array();
	}
}
?>