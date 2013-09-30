<?php
class Model_reservas extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function cargar_reserva_calendario()
	{
			$estado = 2;
			
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m') AS inen", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m') AS outsal", FALSE);
			$this->db->select("DATE(fecha_checkin) AS entrada", FALSE);
			$this->db->select("DATE_SUB(fecha_checkout,INTERVAL 1 DAY) AS salida", FALSE);
			$this->db->select('id_reservacion, apart');
			
			$this->db->from('wp_reservacion');
			
			$this->db->where('r_status', $estado);
			
			$this->db->order_by("id_reservacion", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_reserva_sin_confirmar()
	{
			$estado = 1;
			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select('id_reservacion, r_mensaje, num_infantes, wp_tipoventa_idtipo_venta,
				tipo_pago_garantia, id_x_cuenta, idcuenta,
				r_email,r_telefono, num_habitaciones, num_adultos,
				garantia, precioxnoche, nnoche, apart, limpieza, transporte, 
				r_status, r_bandera, idtipo_venta, tv_descripcion, descripcion_cu');
			$this->db->from('wp_reservacion');
			$this->db->join('wp_tipoventa','wp_reservacion.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta','wp_reservacion.id_x_cuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta','cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
	
			$this->db->where('r_status', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->order_by("id_reservacion", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_reserva_sin_confirmar_fila($idreserva)
	{
			$estado = 1;
			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("fecha_checkin AS entrada", FALSE);
			$this->db->select("fecha_checkout AS salida", FALSE);
			$this->db->select('id_reservacion, r_mensaje, num_infantes, wp_tipoventa_idtipo_venta,
				tipo_pago_garantia, id_x_cuenta, idcuenta, r_nombre, r_apellido, r_procedencia,
				r_email,r_telefono, num_habitaciones, num_adultos,
				garantia, precioxnoche, nnoche, apart, limpieza, transporte, 
				r_status, r_bandera, idtipo_venta, tv_descripcion, descripcion_cu');
			$this->db->from('wp_reservacion');
			$this->db->join('wp_tipoventa','wp_reservacion.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta','wp_reservacion.id_x_cuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta','cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->where('id_reservacion', $idreserva);
			$query = $this->db->get();
			return $query->row_array();
	}

	public function cargar_reserva_sin_confirmar_orden($forma)
	{
			$estado = 1;
			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select('id_reservacion, r_mensaje, num_infantes,idcuenta, 
				r_email,r_telefono, num_habitaciones, num_adultos,
				garantia, precioxnoche, nnoche, apart, limpieza, transporte, 
				r_status, r_bandera, idtipo_venta, tv_descripcion, descripcion_cu');
			$this->db->from('wp_reservacion');
			$this->db->join('wp_tipoventa','wp_reservacion.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta','wp_reservacion.id_x_cuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta','cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
	
			$this->db->where('r_status', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->order_by("fecha_checkin", $forma);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function m_registrar_reserva()
	{
		if($this->input->post('estado')==2){
			$estado = 2;
		}else{
			$estado = 1;
		}
			
			$entrada = $this->input->post('entrada');
			$entrada = date("d"."/"."m"."/"."Y", strtotime($entrada));

			$salida = $this->input->post('salida');
			$salida = date("d"."/"."m"."/"."Y", strtotime($salida));

			$nn = restafechas(date($entrada),date($salida));

			$data = array(
               'wp_tipoventa_idtipo_venta' => $this->input->post('idtipo'),
               'tipo_pago_garantia' => $this->input->post('idtipopago'),
               'id_x_cuenta' => $this->input->post('idcuenta'),
               'r_nombre' => $this->input->post('nombre'),
               'r_apellido' => $this->input->post('apellido'),
               'r_email' => $this->input->post('email'),
               'r_telefono' => $this->input->post('telefono'),
               'num_habitaciones' => $this->input->post('nh'),
               'num_adultos' => $this->input->post('na'),
               'num_infantes' => $this->input->post('ni'),
               'fecha_checkin' => $this->input->post('entrada'),
               'fecha_checkout' => $this->input->post('salida'),
               'apart' => $this->input->post('apart'),
               'nnoche' => $nn,
               'r_procedencia' => $this->input->post('proc'),
               'garantia' => $this->input->post('garantia'),
               'precioxnoche' => $this->input->post('pn'),
               'limpieza' => $this->input->post('limpieza'),
               'transporte' => $this->input->post('transporte'),
               'r_mensaje' => $this->input->post('mensaje'),
               'r_status' => $estado
            );
		return $this->db->insert('wp_reservacion', $data);
	}
	public function m_facturar_reserva()
	{
	
			$entrada = $this->input->post('entrada');
			$entrada = date("d"."/"."m"."/"."Y", strtotime($entrada));

			$salida = $this->input->post('salida');
			$salida = date("d"."/"."m"."/"."Y", strtotime($salida));

			$nn = restafechas(date($entrada),date($salida));

			$data = array(
               'wp_tipoventa_idtipo_venta' => $this->input->post('idtipo'),
               'id_ventaxapart' => $this->input->post('idapart'),
               'clientev' => $this->input->post('cliente'),
               'emailv' => $this->input->post('email'),
               'telefonov' => $this->input->post('telefono'),
               'id_ventaxcuenta' => $this->input->post('idcuenta'),
               'fecha_venta' => $this->input->post('fventa'),
               'fecha_real_checkin' => $this->input->post('entrada'),
               'fecha_real_checkout' => $this->input->post('salida'),
               'num_habitaciones' => $this->input->post('nh'),
               'num_real_adultos' => $this->input->post('na'),
               'num_real_ninos' => $this->input->post('ni'),	
               'num_noches' => $nn,
               'procedencia' => $this->input->post('proc'),
               'facturado' => $this->input->post('facturado'),
               'v_garantia' => $this->input->post('garantia'),
               'costo_variables' => $this->input->post('cv'),
               'igv' => $this->input->post('igv')
            );
		return $this->db->insert('wp_venta', $data);
	}
	public function m_confirmar_reserva()
	{
			$estado = 2;

			$entrada = $this->input->post('entrada');
			$entrada = date("d"."/"."m"."/"."Y", strtotime($entrada));

			$salida = $this->input->post('salida');
			$salida = date("d"."/"."m"."/"."Y", strtotime($salida));

			$nn = restafechas(date($entrada),date($salida));
			$data = array(
               'wp_tipoventa_idtipo_venta' => $this->input->post('idtipo'),
               'tipo_pago_garantia' => $this->input->post('idtipopago'),
               'id_x_cuenta' => $this->input->post('idcuenta'),
               'r_nombre' => $this->input->post('nombre'),
               'r_apellido' => $this->input->post('apellido'),
               'r_email' => $this->input->post('email'),
               'r_telefono' => $this->input->post('telefono'),
               'num_habitaciones' => $this->input->post('nh'),
               'num_adultos' => $this->input->post('na'),
               'num_infantes' => $this->input->post('ni'),
               'fecha_checkin' => $this->input->post('entrada'),
               'fecha_checkout' => $this->input->post('salida'),
               'nnoche' => $nn,
               'r_procedencia' => $this->input->post('proc'),
               'garantia' => $this->input->post('garantia'),
               'precioxnoche' => $this->input->post('pn'),
               'limpieza' => $this->input->post('limpieza'),
               'transporte' => $this->input->post('transporte'),
               'r_mensaje' => $this->input->post('mensaje'),
               'r_status' => $estado
            );
			$this->db->where('id_reservacion', $this->input->post('id_reservacion'));
		return	$this->db->update('wp_reservacion', $data);
	}

	public function m_editar_reserva_sc()
	{

			$entrada = $this->input->post('entrada');
			$entrada = date("d"."/"."m"."/"."Y", strtotime($entrada));

			$salida = $this->input->post('salida');
			$salida = date("d"."/"."m"."/"."Y", strtotime($salida));

			$nn = restafechas(date($entrada),date($salida));

			$data = array(
               'wp_tipoventa_idtipo_venta' => $this->input->post('idtipo'),
               'id_x_cuenta' => $this->input->post('idcuenta'),
               'r_nombre' => $this->input->post('nombre'),
               'r_apellido' => $this->input->post('apellido'),
               'r_email' => $this->input->post('email'),
               'r_telefono' => $this->input->post('telefono'),
               'num_habitaciones' => $this->input->post('nh'),
               'num_adultos' => $this->input->post('na'),
               'num_infantes' => $this->input->post('ni'),
               'fecha_checkin' => $this->input->post('entrada'),
               'fecha_checkout' => $this->input->post('salida'),
               'nnoche' => $nn,
               'r_procedencia' => $this->input->post('proc')
            );
			$this->db->where('id_reservacion', $this->input->post('id_reservacion'));
		return	$this->db->update('wp_reservacion', $data);
	}
	public function m_editar_reserva_c()
	{

			$entrada = $this->input->post('entrada');
			$entrada = date("d"."/"."m"."/"."Y", strtotime($entrada));

			$salida = $this->input->post('salida');
			$salida = date("d"."/"."m"."/"."Y", strtotime($salida));

			$nn = restafechas(date($entrada),date($salida));

			$data = array(
               'wp_tipoventa_idtipo_venta' => $this->input->post('idtipo'),
               'id_x_cuenta' => $this->input->post('idcuenta'),
               'r_nombre' => $this->input->post('nombre'),
               'r_apellido' => $this->input->post('apellido'),
               'r_email' => $this->input->post('email'),
               'r_telefono' => $this->input->post('telefono'),
               'num_habitaciones' => $this->input->post('nh'),
               'num_adultos' => $this->input->post('na'),
               'num_infantes' => $this->input->post('ni'),
               'fecha_checkin' => $this->input->post('entrada'),
               'fecha_checkout' => $this->input->post('salida'),
               'nnoche' => $nn,
               'apart' => $this->input->post('apart'),
               'r_procedencia' => $this->input->post('proc'),
               'garantia' => $this->input->post('garantia'),
               'precioxnoche' => $this->input->post('pn'),
               'limpieza' => $this->input->post('limpieza'),
               'transporte' => $this->input->post('transporte')
            );
			$this->db->where('id_reservacion', $this->input->post('id_reservacion'));
		return	$this->db->update('wp_reservacion', $data);
	}
	public function cargar_reserva_confirmada()
	{
			$estado = 2;
			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select('r_email, r_telefono, num_habitaciones, num_adultos, num_infantes,
				id_reservacion, r_mensaje, garantia, precioxnoche, nnoche, idcuenta,
				apart, limpieza, transporte, r_status, r_bandera, idtipo_venta, tv_descripcion, descripcion_cu,descripcion_pg');
			$this->db->from('wp_reservacion');
			$this->db->join('wp_tipoventa','wp_reservacion.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('tipo_pago','wp_reservacion.tipo_pago_garantia = tipo_pago.idtipo_pago_garantia');
			$this->db->join('cuenta','wp_reservacion.id_x_cuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta','cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
	
			$this->db->where('r_status', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->order_by("id_reservacion", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_reserva_confirmada_fila($idreserva)
	{
			$estado = 1;
			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("fecha_checkin AS entrada", FALSE);
			$this->db->select("fecha_checkout AS salida", FALSE);
			$this->db->select('id_reservacion, r_mensaje, num_infantes, wp_tipoventa_idtipo_venta,
				tipo_pago_garantia, id_x_cuenta, idcuenta, r_nombre, r_apellido, r_procedencia,
				r_email,r_telefono, num_habitaciones, num_adultos, idtipo_pago_garantia,
				garantia, precioxnoche, nnoche, apart, limpieza, transporte, 
				r_status, r_bandera, idtipo_venta, tv_descripcion, descripcion_cu, descripcion_pg');
			$this->db->from('wp_reservacion');
			$this->db->join('wp_tipoventa','wp_reservacion.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta','wp_reservacion.id_x_cuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta','cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('tipo_pago','wp_reservacion.tipo_pago_garantia = tipo_pago.idtipo_pago_garantia');
			$this->db->where('id_reservacion', $idreserva);
			$query = $this->db->get();
			return $query->row_array();
	}

	public function cargar_reserva_confirmada_orden($forma)
	{
			$estado = 2;
			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select('r_email, r_telefono, num_habitaciones, num_adultos, num_infantes, 
				id_reservacion, r_mensaje, garantia, precioxnoche, nnoche, idcuenta, 
				apart, limpieza, transporte, r_status, r_bandera, idtipo_venta, tv_descripcion, descripcion_cu,descripcion_pg');
			$this->db->from('wp_reservacion');
			$this->db->join('wp_tipoventa','wp_reservacion.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('tipo_pago','wp_reservacion.tipo_pago_garantia = tipo_pago.idtipo_pago_garantia');
			$this->db->join('cuenta','wp_reservacion.id_x_cuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta','cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
	
			$this->db->where('r_status', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->order_by("fecha_checkin", $forma); 
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_reserva_despachada()
	{
			$estado = 0;
			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select('r_email, r_telefono, num_habitaciones, 
				num_adultos, num_infantes, apart, idcuenta, 
				id_reservacion, r_mensaje, garantia, precioxnoche, nnoche, limpieza, transporte, 
				r_status, idtipo_venta, tv_descripcion, descripcion_cu,descripcion_pg');
			$this->db->from('wp_reservacion');
			$this->db->join('wp_tipoventa','wp_reservacion.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('tipo_pago','wp_reservacion.tipo_pago_garantia = tipo_pago.idtipo_pago_garantia');
			$this->db->join('cuenta','wp_reservacion.id_x_cuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta','cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
	
			$this->db->where('r_status', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->order_by("id_reservacion", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_reserva_despachada_orden($forma)
	{
			$estado = 0;
			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select('r_email, r_telefono, num_habitaciones, 
				num_adultos, num_infantes, apart, idcuenta, 
				id_reservacion, r_mensaje, garantia, precioxnoche, nnoche, limpieza, transporte, 
				r_status, idtipo_venta, tv_descripcion, descripcion_cu,descripcion_pg');
			$this->db->from('wp_reservacion');
			$this->db->join('wp_tipoventa','wp_reservacion.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('tipo_pago','wp_reservacion.tipo_pago_garantia = tipo_pago.idtipo_pago_garantia');
			$this->db->join('cuenta','wp_reservacion.id_x_cuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta','cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
	
			$this->db->where('r_status', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->order_by("fecha_checkin", $forma); 
			$query = $this->db->get();
			return $query->result_array();
	}
	
	/*public function cargar_reserva_fila($idreserva)
	{

			$idusuario = $this->user->id_usuario;
			$this->db->select("CONCAT(r_nombre,' ', r_apellido) AS nombre", FALSE);
			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m/%Y') AS entrada", FALSE);  
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select('id_reservacion, r_procedencia');
			$this->db->from('wp_reservacion');
	
			$this->db->where('id_reservacion', $idreserva);

			$query = $this->db->get();
			return $query->row_array();
	}*/
	public function cargar_notas_reserva($idreserva)
	{

			$this->db->select("DATE_FORMAT(fecha_checkin, '%d/%m/%Y') AS entrada", FALSE);  
			$this->db->select("DATE_FORMAT(fecha_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select('id_reservacion, r_procedencia, idnota, fecha_nota, mensaje_nota');
			$this->db->from('nota');
			$this->db->join('wp_reservacion','nota.idnota_reserva = wp_reservacion.id_reservacion','right');
			$this->db->where('id_reservacion', $idreserva);
			$this->db->order_by('fecha_nota','desc');

			$query = $this->db->get();
			return $query->result_array();
	}
	public function m_cambiar_status($idreserva)
	{
		$this->db->select("r_bandera");
		$this->db->from('wp_reservacion');
		$this->db->where('id_reservacion', $idreserva);
		$query = $this->db->get();
		$row_reserva = $query->row_array();
			if($row_reserva['r_bandera'] == 1){
				$bandera = 2;
			}elseif ($row_reserva['r_bandera'] == 2) {
				$bandera = 3;
			}elseif ($row_reserva['r_bandera'] == 3) {
				$bandera = 1;
			}
		if($bandera){	
		$data = array(
               'r_bandera' => $bandera
            );
			$this->db->where('id_reservacion', $idreserva);
		return	$this->db->update('wp_reservacion', $data);
		}
	}

	public function m_actualizar_reserva_facturada()
	{
		$status	= 0;
		$data = array(
               'r_status' => $status
            );
			$this->db->where('id_reservacion', $this->input->post('idr'));
		return	$this->db->update('wp_reservacion', $data);
		
	}
	
	public function m_anular_nota($idnota)
	{
		return $this->db->delete('nota', array('idnota' => $idnota));
	}

	public function m_registrar_nota()
	{

		$hoy = date("Y-m-d H:i:s");
			$data = array(
               'idnota_reserva' => $this->input->post('idreserva'),
               'mensaje_nota' => $this->input->post('mensaje'),
               'fecha_nota' => $hoy
            );
		return $this->db->insert('nota', $data);
	}
	public function m_registrar_nota_de_reserva()
	{
		$this->db->select_max("id_reservacion");
		$this->db->from('wp_reservacion');
		$query = $this->db->get();
		$row_reserva = $query->row_array();

		$hoy = date("Y-m-d H:i:s");
			$data = array(
               'idnota_reserva' => $row_reserva['id_reservacion'],
               'mensaje_nota' => $this->input->post('mensaje'),
               'fecha_nota' => $hoy
            );
		return $this->db->insert('nota', $data);
	}
}
?>