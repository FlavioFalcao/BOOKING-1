<?php
class Model_ventas extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
			//me devuelve un array
			//$salida = date("Y-m-d");
			//$entrada = date("Y-m-d",strtotime('-30 days'));
			
		
	}
// --------------------------------------------------------------------   CARGAR DE VENTAS  --------------------------------------------------------------------
	public function cargar_venta_calendario()
	{
			$estado = 1;
	

			$this->db->select("DATE_FORMAT(fecha_real_checkin, '%d/%m') AS inen", FALSE);
			$this->db->select("DATE_FORMAT(fecha_real_checkout, '%d/%m') AS outsal", FALSE);
			$this->db->select("DATE(fecha_real_checkin) AS entrada", FALSE);
			$this->db->select("DATE_SUB(fecha_real_checkout,INTERVAL 1 DAY) AS salida", FALSE);
			$this->db->select('id_venta, clientev, descripcion_ap');
			
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart','left');
	
			$this->db->where('estado_venta', $estado);
			
			$this->db->order_by("id_venta", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
	}

	public function cargar_ventas($id = FALSE)
	{
		if($id === FALSE)
		{
			$estado = 1;
			$idusuario = $this->user->id_usuario;
			$antes= date("Y-m-d", strtotime("-1 month"));
			$despues = date("Y-m-d");
			$this->db->select("DATE_FORMAT(fecha_real_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_real_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select("DATE_FORMAT(fecha_venta, '%d/%m/%Y') AS fecha_venta", FALSE);
			$this->db->select("IF(igv = '1', facturado * 0.18, '-') AS igvcont", FALSE);
			$this->db->select('id_venta, wp_tipoventa_idtipo_venta, id_ventaxcuenta, id_ventaxapart,
				clientev, descripcion_ap, num_habitaciones, num_real_adultos, num_real_ninos, emailv, telefonov,
				num_noches,v_garantia, fecha_venta, procedencia, facturado, 
				costo_variables,costo_fijos, tv_descripcion, descripcion_cu, igv
				');
			
			$this->db->from('wp_venta');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart','left');
	
			$this->db->where('estado_venta', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($antes) .' AND ' . $this->db->escape($despues));
			$this->db->order_by("fecha_venta", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
			

		}
		else
		{
			$this->db->select("fecha_real_checkin AS entrada", FALSE);
			$this->db->select("fecha_real_checkout AS salida", FALSE);
			$this->db->select("fecha_venta AS fecha_venta", FALSE);
			$this->db->select("IF(igv = '1', facturado * 0.18, '-') AS igvcont", FALSE);
			$this->db->select('id_venta, wp_tipoventa_idtipo_venta, id_ventaxcuenta, id_ventaxapart, 
				clientev, descripcion_ap, num_habitaciones, num_real_adultos, num_real_ninos, emailv, telefonov,
				num_noches,v_garantia, fecha_venta, procedencia, facturado, 
				costo_variables,costo_fijos, tv_descripcion, descripcion_cu, igv
				');
			
			$this->db->from('wp_venta');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart','left');
	
			$this->db->where('id_venta', $id);
			$query = $this->db->get();
			return $query->row_array();
		}
	}

	public function cargar_ventas_filtradas_por_fecha()
	{
			$antes = $this->input->post('entrada');
			$despues = $this->input->post('salida');

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select("DATE_FORMAT(fecha_real_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_real_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select("DATE_FORMAT(fecha_venta, '%d/%m/%Y') AS fecha_venta", FALSE);
			$this->db->select("IF(igv = '1', facturado * 0.18, '-') AS igvcont", FALSE);
			$this->db->select('id_venta, wp_tipoventa_idtipo_venta, 
				clientev, descripcion_ap, num_habitaciones, num_real_adultos, num_real_ninos,
				num_noches,v_garantia, fecha_venta, procedencia, facturado, 
				costo_variables, tv_descripcion, descripcion_cu, igv
				');
			$this->db->from('wp_venta');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart','left');
			$this->db->where('estado_venta', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($antes) .' AND ' . $this->db->escape($despues));
			$this->db->order_by("fecha_venta", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
			
	}
	public function cargar_ventas_del_mes()
	{

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select("DATE_FORMAT(fecha_real_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_real_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select("DATE_FORMAT(fecha_venta, '%d/%m/%Y') AS fecha_venta", FALSE);
			$this->db->select("IF(igv = '1', facturado * 0.18, '-') AS igvcont", FALSE);
			$this->db->select('costo_fijos + costo_variables AS total_costos',FALSE);
			$this->db->select('facturado - ( costo_fijos + costo_variables ) AS profit', FALSE);
			$this->db->select('round(((facturado - (costo_fijos + costo_variables))/(facturado))*100,2) AS porcentaje', FALSE);
			$this->db->select('id_venta, wp_tipoventa_idtipo_venta, costo_fijos, costo_variables,
				clientev, descripcion_ap, num_habitaciones, num_real_adultos, num_real_ninos,
				num_noches,v_garantia, fecha_venta, procedencia, facturado, 
				costo_variables, tv_descripcion, descripcion_cu, igv
				');
			$this->db->from('wp_venta');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart','left');
			$this->db->where('estado_venta', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->where('MONTHNAME(fecha_venta) = MONTHNAME(NOW())');
			$this->db->where('YEAR(fecha_venta) = YEAR(NOW())');
			$this->db->order_by("fecha_venta", "desc");
			$query = $this->db->get();
			return $query->result_array();
			
	}
	public function cargar_ventas_del_mes_asignado($mes,$ano)
	{

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select("DATE_FORMAT(fecha_real_checkin, '%d/%m/%Y') AS entrada", FALSE);
			$this->db->select("DATE_FORMAT(fecha_real_checkout, '%d/%m/%Y') AS salida", FALSE);
			$this->db->select("DATE_FORMAT(fecha_venta, '%d/%m/%Y') AS fecha_venta", FALSE);
			$this->db->select("IF(igv = '1', facturado * 0.18, '-') AS igvcont", FALSE);
			$this->db->select('costo_fijos + costo_variables + costo_fijosper AS total_costos',FALSE);
			$this->db->select('facturado - ( costo_fijos + costo_variables + costo_fijosper ) AS profit', FALSE);
			$this->db->select('round(((facturado - (costo_fijos + costo_variables + costo_fijosper))/(facturado))*100,2) AS porcentaje', FALSE);
			$this->db->select('id_venta, wp_tipoventa_idtipo_venta, costo_fijos, costo_variables, costo_fijosper,
				clientev, descripcion_ap, num_habitaciones, num_real_adultos, num_real_ninos,
				num_noches,v_garantia, fecha_venta, procedencia, facturado, 
				costo_variables, tv_descripcion, descripcion_cu, igv
				');
			$this->db->from('wp_venta');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart','left');
			$this->db->where('estado_venta', $estado);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->where('MONTHNAME(fecha_venta)', $mes);
			$this->db->where('YEAR(fecha_venta)', $ano);
			$this->db->order_by("fecha_venta", "desc");
			$query = $this->db->get();
			return $query->result_array();
			
	}
	public function cargar_total_ventas_del_mes()
	{

			$estado = 1;

			$this->db->select_sum('facturado','facturado');
			$this->db->select_sum('costo_fijos','costo_fijos');
			$this->db->select_sum('costo_variables','costo_variables');
			$this->db->select_sum('costo_fijos + costo_variables','total_costos');
			$this->db->select_sum('facturado - ( costo_fijos + costo_variables )','profit');
			//$this->db->select_sum('((facturado - (costo_fijos + costo_variables))/(facturado))*100','porcentaje');
			$this->db->select('SUM( facturado - (costo_fijos + costo_variables) )/SUM(facturado) *100 AS porcentaje', FALSE);
			//round(SUM( v.facturado - ( v.costo_fijos + v.costo_variables ) )/SUM( v.facturado )*100,2) AS porcentaje
			//round(((v.facturado - (v.costo_fijos + v.costo_variables))/(v.facturado))*100,2) AS PORCENTAJE
			$this->db->from('wp_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta) = MONTHNAME(NOW())');
			$this->db->where('YEAR(fecha_venta) = YEAR(NOW())');
			$this->db->group_by('MONTHNAME(fecha_venta)'); 
			$query = $this->db->get();
			return $query->row_array();
			
	}
	public function cargar_total_ventas_del_mes_asignado($mes,$ano)
	{

			$estado = 1;

			$this->db->select_sum('facturado','facturado');
			$this->db->select_sum('costo_fijos','costo_fijos');
			$this->db->select_sum('costo_fijosper','costo_fijosper');
			$this->db->select_sum('costo_variables','costo_variables');
			$this->db->select_sum('costo_fijos + costo_variables + costo_fijosper','total_costos');
			$this->db->select_sum('facturado - ( costo_fijos + costo_variables + costo_fijosper )','profit');
			$this->db->select('SUM( facturado - (costo_fijos + costo_variables + costo_fijosper) )/SUM(facturado) *100 AS porcentaje', FALSE);
			$this->db->from('wp_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)', $mes);
			$this->db->where('YEAR(fecha_venta)', $ano);
			$this->db->group_by('MONTHNAME(fecha_venta)'); 
			$query = $this->db->get();
			return $query->row_array();
			
	}
	public function cargar_ventas_por_tipodeventa_del_mes()
	{
			$estado = 1;

			$this->db->select_sum('facturado','facturado');
			$this->db->select_sum('costo_fijos','costo_fijos');
			$this->db->select_sum('costo_variables','costo_variables');
			$this->db->select_sum('costo_fijos + costo_variables','total_costos');
			$this->db->select_sum('facturado - ( costo_fijos + costo_variables )','profit');
			//$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('tv_descripcion');
			$this->db->from('wp_venta');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta) = MONTHNAME(NOW())');
			$this->db->where('YEAR(fecha_venta) = YEAR(NOW())');
			$this->db->group_by('idtipo_venta'); 
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_ventas_por_tipodeventa_del_mes_asignado($mes,$ano)
	{
			$estado = 1;

			$this->db->select_sum('facturado','facturado');
			$this->db->select_sum('costo_fijos','costo_fijos');
			$this->db->select_sum('costo_fijosper','costo_fijosper');
			$this->db->select_sum('costo_variables','costo_variables');
			$this->db->select_sum('costo_fijos + costo_variables + + costo_fijosper','total_costos');
			$this->db->select_sum('facturado - ( costo_fijos + costo_variables + costo_fijosper )','profit');
			//$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('tv_descripcion');
			$this->db->from('wp_venta');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)', $mes);
			$this->db->where('YEAR(fecha_venta)', $ano);
			$this->db->group_by('idtipo_venta'); 
			$query = $this->db->get();
			return $query->result_array();
	}
	public function m_editar_venta()
	{

			$entrada = $this->input->post('entrada');
			$entrada = date("d"."/"."m"."/"."Y", strtotime($entrada));

			$salida = $this->input->post('salida');
			$salida = date("d"."/"."m"."/"."Y", strtotime($salida));

			$nn = restafechas(date($entrada),date($salida));

			$data = array(
               'wp_tipoventa_idtipo_venta' => $this->input->post('idtipo'),
               'id_ventaxcuenta' => $this->input->post('idcuenta'),
               'id_ventaxapart' => $this->input->post('idapart'),
               'clientev' => $this->input->post('cliente'),
               'emailv' => $this->input->post('email'),
               'telefonov' => $this->input->post('telefono'),
               'procedencia' => $this->input->post('proc'),
               'fecha_venta' => $this->input->post('fventa'),
               'fecha_real_checkin' => $this->input->post('entrada'),
               'fecha_real_checkout' => $this->input->post('salida'),
               'num_habitaciones' => $this->input->post('nh'),
               'num_real_adultos' => $this->input->post('na'),
               'num_real_ninos' => $this->input->post('ni'),
               'num_noches' => $nn,
               'facturado' => $this->input->post('facturado'),
               'v_garantia' => $this->input->post('garantia'),
               'costo_variables' => $this->input->post('cv'),
               'costo_fijos' => $this->input->post('cf'),
               'igv' => $this->input->post('igv')
            );
			$this->db->where('id_venta', $this->input->post('idventa'));
		return	$this->db->update('wp_venta', $data);
	}
	public function m_registrar_venta()
	{

			$entrada = $this->input->post('entrada');
			$entrada = date("d"."/"."m"."/"."Y", strtotime($entrada));

			$salida = $this->input->post('salida');
			$salida = date("d"."/"."m"."/"."Y", strtotime($salida));

			$nn = restafechas(date($entrada),date($salida));

			$data = array(
               'wp_tipoventa_idtipo_venta' => $this->input->post('idtipo'),
               'id_ventaxcuenta' => $this->input->post('idcuenta'),
               'id_ventaxapart' => $this->input->post('idapart'),
               'clientev' => $this->input->post('cliente'),
               'emailv' => $this->input->post('email'),
               'telefonov' => $this->input->post('telefono'),
               'procedencia' => $this->input->post('proc'),
               'fecha_venta' => $this->input->post('fventa'),
               'fecha_real_checkin' => $this->input->post('entrada'),
               'fecha_real_checkout' => $this->input->post('salida'),
               'num_habitaciones' => $this->input->post('nh'),
               'num_real_adultos' => $this->input->post('na'),
               'num_real_ninos' => $this->input->post('ni'),
               'num_noches' => $nn,
               'facturado' => $this->input->post('facturado'),
               'v_garantia' => $this->input->post('garantia'),
               'costo_variables' => $this->input->post('cv'),
               // 'costo_fijos' => $this->input->post('cf'),
               'igv' => $this->input->post('igv')
            );
		return	$this->db->insert('wp_venta', $data);
	}
	public function m_anular_venta($idventa)
	{

		$estado = 0;

			$data = array(
               'estado_venta' => $estado
            );
			$this->db->where('id_venta', $idventa);
		return	$this->db->update('wp_venta', $data);
	}

//GRAFICOS PERSONALIZADOS
	public function cargar_venta_x_apartamento()
	{
		if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}
			$estado = 1;

			$this->db->select('idapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->group_by('descripcion_ap');
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cargar_facturado_por_apartamentos()
	{
		if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->group_by('descripcion_ap'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_facturado_filtrar_por_apartamentos($apartamentos)
	{
		if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->where_in('idapart', $apartamentos);
			$this->db->group_by('descripcion_ap'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_profit_por_apartamentos()
	{
		if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}
			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('((facturado - costo_fijos) - costo_variables) - costo_fijosper','profit');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->group_by('descripcion_ap'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}
	public function cargar_profit_filtrar_por_apartamentos($apartamentos)
	{
		if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}
			$estado = 1;
			$idusuario = $this->user->id_usuario;
			$this->db->select_sum('((facturado - costo_fijos) - costo_variables) - costo_fijosper','profit');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->where_in('idapart', $apartamentos);
			$this->db->group_by('descripcion_ap');
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_facturado_por_tipodeventa()
	{
		if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}
			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, tv_descripcion');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->group_by('tv_descripcion'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}
	public function cargar_facturado_por_tipodeventa_filtrar_por_apartamentos($apartamentos)
	{
		if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, tv_descripcion');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->where_in('idapart', $apartamentos);
			$this->db->group_by('tv_descripcion');
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_facturado_por_cuenta()
	{
		if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}
			
			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta,
				idapart, descripcion_cu');
			$this->db->from('wp_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->group_by('descripcion_cu'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}
	public function cargar_facturado_por_cuenta_filtrar_por_apartamentos($apartamentos)
	{
			if($this->input->post('entrada') == FALSE) {
			$fecha_despues = date("Y-m-d");
			$fecha_antes = date("Y-m-d",strtotime("$fecha_despues-2 months"));
		}else{
			$fecha_antes = $this->input->post('entrada');
			$fecha_despues = $this->input->post('salida');
		}
			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta,
				idapart, descripcion_cu');
			$this->db->from('wp_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('fecha_venta BETWEEN '. $this->db->escape($fecha_antes) .' AND ' . $this->db->escape($fecha_despues));
			$this->db->where_in('idapart', $apartamentos);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->group_by('descripcion_cu');
			$query = $this->db->get();
			return $query->result_array();
			
	}
//GRAFICOS ACTUALES
	public function cargar_facturado_por_apartamentos_actual()
	{

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta) = MONTHNAME(NOW())');
			$this->db->where('YEAR(fecha_venta) = YEAR(NOW())');
			$this->db->group_by('descripcion_ap'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_profit_por_apartamentos_actual()
	{
			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('(facturado - costo_fijos) - costo_variables','profit');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta) = MONTHNAME(NOW())');
			$this->db->where('YEAR(fecha_venta) = YEAR(NOW())');
			$this->db->group_by('descripcion_ap'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_facturado_por_tipodeventa_actual()
	{

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, tv_descripcion');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta) = MONTHNAME(NOW())');
			$this->db->where('YEAR(fecha_venta) = YEAR(NOW())');
			$this->db->group_by('tv_descripcion'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_facturado_por_cuenta_actual()
	{

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta,
				idapart, descripcion_cu');
			$this->db->from('wp_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta) = MONTHNAME(NOW())');
			$this->db->where('YEAR(fecha_venta) = YEAR(NOW())');
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->group_by('descripcion_cu'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}
//GRAFICOS DEL MES ASIGNADO
	public function cargar_facturado_por_apartamentos_entre_el_mes($pfechainicio,$pfechafin)
	{

			$estado = 1;

			$this->db->select('id_ventaxapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('DATE(fecha_real_checkout) >',$pfechainicio);
			$this->db->where('DATE(fecha_real_checkin) <',$pfechafin);
			$this->db->group_by('id_ventaxapart'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}
	
	public function cargar_facturado_por_apartamentos_del_mes($mes,$ano)
	{

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)',$mes);
			$this->db->where('YEAR(fecha_venta)',$ano);
			$this->db->group_by('descripcion_ap'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_profit_por_apartamentos_del_mes($mes,$ano)
	{
			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('((facturado - costo_fijos) - costo_variables) - costo_fijosper','profit');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, descripcion_ap');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)',$mes);
			$this->db->where('YEAR(fecha_venta)',$ano);
			$this->db->group_by('descripcion_ap'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_facturado_por_tipodeventa_del_mes($mes,$ano)
	{

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta, ubicacion, 
				idapart, tv_descripcion');
			$this->db->from('wp_venta');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)',$mes);
			$this->db->where('YEAR(fecha_venta)',$ano);
			$this->db->group_by('tv_descripcion'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

	public function cargar_facturado_por_cuenta_del_mes($mes,$ano)
	{

			$estado = 1;
			$idusuario = $this->user->id_usuario;

			$this->db->select_sum('facturado','monto_total');
			$this->db->select("MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->select('fecha_venta,
				idapart, descripcion_cu');
			$this->db->from('wp_venta');
			$this->db->join('cuenta', 'wp_venta.id_ventaxcuenta = cuenta.idcuenta');
			$this->db->join('usuario_x_cuenta', 'cuenta.idcuenta = usuario_x_cuenta.id_cuenta_det');
			$this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
			$this->db->join('wp_tipoventa', 'wp_venta.wp_tipoventa_idtipo_venta = wp_tipoventa.idtipo_venta');
			
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)',$mes);
			$this->db->where('YEAR(fecha_venta)',$ano);
			$this->db->where('id_usuario_det', $idusuario);
			$this->db->group_by('descripcion_cu'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}
//Para obtener años y meses
	public function cargar_meses_venta()
	{

			$estado = 1;

			$this->db->select("DISTINCT MONTHNAME(fecha_venta) AS mes", FALSE);
			$this->db->from('wp_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->group_by('MONTHNAME(fecha_venta)'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}
	public function cargar_anos_venta()
	{

			$estado = 1;

			$this->db->select("DISTINCT YEAR(fecha_venta) AS ano", FALSE);
			$this->db->from('wp_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->group_by('YEAR(fecha_venta)'); 
			$query = $this->db->get();
			return $query->result_array();
			
	}

}
?>