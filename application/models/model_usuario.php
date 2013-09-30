<?php
class Model_usuario extends CI_Model {
	protected $table;
	protected $id;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('security');
		$this->load->helper('url');
		$this->load->helper('form');
	}
	function get($username='', $password='') {
		
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->join('tipo_usuario', 'usuario.tipo_usuario_id_tipous = tipo_usuario.id_tipous');

		$this->db->where('nick', $username);
		$this->db->where('pass', do_hash($password, 'md5'));
		$this->db->where('estado', 1); 
		return $this->db->get()->row();
	}
	public function cargar_tipousuario()
	{
			$this->db->select('id_tipous, descripcion_us');
			$this->db->from('tipo_usuario');
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_cuentas_activas()
	{
		$estado = 1;
			$this->db->select('idcuenta, descripcion_cu');
			$this->db->from('cuenta');
			$this->db->where('estado_cu', $estado);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_cuentas_x_usuario()
	{
		$estado = 1;
			$this->db->select('idcuenta, descripcion_cu,id_usuario_det');
			$this->db->from('usuario_x_cuenta');
			$this->db->join('cuenta', 'usuario_x_cuenta.id_cuenta_det = cuenta.idcuenta');
			$this->db->where('estado_cu', $estado);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_cuentas_no_establecidas($idusuario)
	{
		$estado = 1;
			$this->db->select('idcuenta, descripcion_cu,id_usuario_det');
			$this->db->from('cuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det','left');
			$this->db->where('estado_cu', $estado);
			$this->db->where('NOT(id_usuario_det)', $idusuario);
			$this->db->or_where('id_usuario_det IS NULL'); 
			$this->db->group_by("descripcion_cu");
			$query = $this->db->get();
			return $query->result_array();
		
	}
	public function cargar_permisos()
	{
			$this->db->select('idpermiso, descripcionper');
			$this->db->from('l_permisos');
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_permisos_x_usuario()
	{
			$this->db->select('idpermiso, descripcionper, id_usuario_per');
			$this->db->from('l_permisos');
			$this->db->join('usuario_x_permiso', 'l_permisos.idpermiso = usuario_x_permiso.id_permiso_per');
			$query = $this->db->get();
			return $query->result_array();
	}

	public function cargar_permisos_no_establecidos($idusuario)
	{
		$tipo = 1;
			$this->db->select('idpermiso, descripcionper, id_usuario_per');
			$this->db->from('l_permisos');
			$this->db->join('usuario_x_permiso', 'l_permisos.idpermiso = usuario_x_permiso.id_permiso_per','left');
			$this->db->where('NOT(id_usuario_per)', $idusuario);
			$this->db->or_where('id_usuario_per IS NULL');
			$this->db->group_by("descripcionper");
			$query = $this->db->get();
			return $query->result_array();
		
	}

	public function cargar_usuario($id = FALSE)
	{
		if($id === FALSE)
		{
			$estado = 1;

			$this->db->select('id_usuario, tipo_usuario_id_tipous, descripcion_us,
				nick, pass, celular');
			$this->db->from('usuario');
			$this->db->join('tipo_usuario', 'usuario.tipo_usuario_id_tipous = tipo_usuario.id_tipous');
			$this->db->where('estado', $estado);
			
			$query = $this->db->get();
			return $query->result_array();
		}
		else
		{
			$this->db->select('id_usuario, tipo_usuario_id_tipous, descripcion_us,
				nick, pass, celular');
			$this->db->from('usuario');
			$this->db->join('tipo_usuario', 'usuario.tipo_usuario_id_tipous = tipo_usuario.id_tipous');
			$this->db->where('id_usuario', $id);
			$query2 = $this->db->get();
			return $query2->row_array();
		}
	}

	public function m_editar_usuario()
	{

		if($this->input->post('pass') == FALSE){
			$data = array(
			'tipo_usuario_id_tipous' => $this->input->post('idtipous'),
			'nick' => $this->input->post('nick'),
			'celular' => $this->input->post('celular')
			);
		}else{

			$passmd5 = do_hash($this->input->post('pass'), 'md5');

			$data = array(
			'tipo_usuario_id_tipous' => $this->input->post('idtipous'),
			'nick' => $this->input->post('nick'),
			'pass' => $passmd5,
			'celular' => $this->input->post('celular')
			);
		}

		$this->db->where('id_usuario', $this->input->post('idusuario'));
		return	$this->db->update('usuario', $data);
	}

	public function m_registrar_usuario()
	{
		$passmd5 = do_hash($this->input->post('pass'), 'md5');
		
		$data = array(
			'tipo_usuario_id_tipous' => $this->input->post('idtipous'),
			'nick' => $this->input->post('nick'),
			'pass' => $passmd5,
			'celular' => $this->input->post('celular')
		);
		return $this->db->insert('usuario', $data);
	}

	public function m_registrar_cuentas_usuario()
	{
		if($this->input->post('idusuario')== FALSE){
			$this->db->select_max('id_usuario');
			$query = $this->db->get('usuario');
			$row_idusuario = $query->row_array();
			$idusuario = $row_idusuario['id_usuario'];
		}else{
			$idusuario = $this->input->post('idusuario');
		}

		$cuentas = $this->input->post('cuentas');

		foreach ($cuentas as $key => $value)
		{
			$data[] = array(
				'id_usuario_det' => $idusuario,
				'id_cuenta_det' => $cuentas[$key]
			);
		}
		return $this->db->insert_batch('usuario_x_cuenta', $data);
	}

	public function m_eliminar_cuentas()
	{

		return $this->db->delete('usuario_x_cuenta', array('id_usuario_det' => $this->input->post('idusuario'))); 

	 }

	public function m_registrar_permisos_usuario()
	{
		if($this->input->post('idusuario')== FALSE){
			$this->db->select_max('id_usuario');
			$query = $this->db->get('usuario');
			$row_idusuario = $query->row_array();
			$idusuario = $row_idusuario['id_usuario'];
		}else{
			$idusuario = $this->input->post('idusuario');
		}
		
		$permisos = $this->input->post('permisos');

		foreach ($permisos as $key => $value)
		{
			$data[] = array(
				'id_usuario_per' => $idusuario,
				'id_permiso_per' => $permisos[$key]
			);
		}
		return $this->db->insert_batch('usuario_x_permiso', $data);
	}

	public function m_eliminar_permisos()
	{

		return $this->db->delete('usuario_x_permiso', array('id_usuario_per' => $this->input->post('idusuario'))); 

	 }

	public function m_anular_usuario($id)
	{
		$estado = '0';
		$data = array(
               'estado' => $estado
            );
		$this->db->where('id_usuario', $id);
		return	$this->db->update('usuario', $data);
	 }

}
?>