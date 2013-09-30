<?php
class Model_cierre extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->load->helper('url');
		$this->load->helper('form');

	}

	public function cargar_cierre_de_mes()
	{
			$this->db->select('*');
			$this->db->from('consolidado');
			$this->db->order_by('id_consolidado','desc');
			$query = $this->db->get();
			return $query->result_array();
		
	}
	public function cargar_fila_cierre_de_mes($id)
	{
			$this->db->select('*');
			$this->db->from('consolidado');
			$this->db->where('id_consolidado', $id);
			$this->db->order_by('id_consolidado','desc');
			$query = $this->db->get();
			return $query->row_array();
		
	}
	public function m_eliminar_cierre($id)
	{

		return $this->db->delete('consolidado', array('id_consolidado' => $id)); 

	}

	public function m_registrar_cierre()
	{

		 $estado = 1;

			$this->db->select_sum('facturado','facturado');
			$this->db->select_sum('costo_fijos','costo_fijos');
			$this->db->select_sum('costo_variables','costo_variables');
			$this->db->select_sum('costo_fijosper','costo_fijosper');
			$this->db->select_sum('costo_fijos + costo_variables + costo_fijosper','total_costos');
			$this->db->select_sum('facturado - ( costo_fijos + costo_variables + costo_fijosper)','profit');
			$this->db->select('SUM( facturado - (costo_fijos + costo_variables + costo_fijosper) )/SUM(facturado) *100 AS porcentaje', FALSE);
			$this->db->from('wp_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)', $this->input->post('mes'));
			$this->db->where('YEAR(fecha_venta)', $this->input->post('ano'));
			$this->db->group_by('MONTHNAME(fecha_venta)');
			$query = $this->db->get();

			$listar_cierre = $query->row_array();

			$facturado = $listar_cierre['facturado'];
			$cf = $listar_cierre['costo_fijos'];
			$costo_fijosper = $listar_cierre['costo_fijosper'];
			$cv = $listar_cierre['costo_variables'];
			$tc = $listar_cierre['total_costos'];
			$profit = $listar_cierre['profit'];
			$porcentaje = $listar_cierre['porcentaje'];

		$data = array(
			'mes_c' => $this->input->post('mes'),
			'ano_c' => $this->input->post('ano'),
			'facturado' => $facturado,
			'cfijo' => $cf,
			'cfijoper' => $costo_fijosper,
			'cvariable' => $cv,
			'tcostes' => $tc,
			'profit' => $profit,
			'porcentaje' => $porcentaje
		);
		return $this->db->insert('consolidado', $data);
	 }
	public function m_registrar_costo_fijo()
	{

		$data = array(
			'cf_x_apart' => $this->input->post('apart'),
			'mes_cf' => $this->input->post('mes'),
			'ano_cf' => $this->input->post('ano'),
			'monto_cf' => $this->input->post('monto')
		);
		return $this->db->insert('costo_fijo', $data);
	 }
	/*public function m_actualizar_cierre_al_registrar_cf($id)
	{

			$this->db->select('*');
			$this->db->from('consolidado');
			$this->db->where('id_consolidado', $id);
			$query = $this->db->get();
			$listar_cierre = $query->row_array();

			$facturado = $listar_cierre['facturado'];
			$cvariable = $listar_cierre['cvariable'];
			$cfijo = $listar_cierre['cfijo'];
			$cfijoper = $listar_cierre['cfijoper'];
			$tcostes = $listar_cierre['tcostes'];
			$profit = $listar_cierre['profit'];
			$porcentaje = $listar_cierre['porcentaje'];

			$n_cfijo = ($cfijo + $this->input->post('monto'));
			$n_tcostes = ($n_cfijo + $cvariable + $cfijoper);
			$n_profit = ($facturado + $n_tcostes);
			$n_porcentaje = (($n_profit / $facturado) * 100);

		$data = array(
			'cfijo' => $n_cfijo,
			'tcostes' => $n_tcostes,
			'profit' => $n_profit,
			'porcentaje' => $n_porcentaje
		);
		$this->db->where('id_consolidado', $id);
		return $this->db->update('consolidado', $data);
	 }*/
	public function m_actualizar_ventas_al_registrar_cf()
	{
		$estado = 1;
			$this->db->select('id_venta');
			$this->db->from('wp_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('id_ventaxapart', $this->input->post('apart'));
			$this->db->where('MONTHNAME(fecha_venta)', $this->input->post('mes'));
			$this->db->where('YEAR(fecha_venta)', $this->input->post('ano'));
			$query = $this->db->get();
			$listar_ventas = $query->result_array();
			$ac = 0;
			foreach ($listar_ventas as $row) {
				$ac+=1;
			}
			$n_cfijoventa = $this->input->post('monto')	/ $ac;

		$data = array(
			'costo_fijos' => $n_cfijoventa
		);
		$this->db->where('id_ventaxapart', $this->input->post('apart'));
		$this->db->where('MONTHNAME(fecha_venta)', $this->input->post('mes'));
		$this->db->where('YEAR(fecha_venta)', $this->input->post('ano'));
		return $this->db->update('wp_venta', $data);
	 }
	public function m_actualizar_ventas_al_registrar_cp()
	{
		$estado = 1;
			$this->db->select('id_venta');
			$this->db->from('wp_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)', $this->input->post('mes'));
			$this->db->where('YEAR(fecha_venta)', $this->input->post('ano'));
			$query = $this->db->get();
			$listar_ventas_cp = $query->result_array();
			$ac = 0;
			foreach ($listar_ventas_cp as $row) {
				$ac+=1;
			}
			$n_cp = $this->input->post('monto')	/ $ac;

		$data = array(
			'costo_fijosper' => $n_cp
		);
		$this->db->where('MONTHNAME(fecha_venta)', $this->input->post('mes'));
		$this->db->where('YEAR(fecha_venta)', $this->input->post('ano'));
		return $this->db->update('wp_venta', $data);
	 }

	public function m_actualizar_cierre($id,$mes,$ano)
	{

		 $estado = 1;

			$this->db->select_sum('facturado','facturado');
			$this->db->select_sum('costo_fijos','costo_fijos');
			$this->db->select_sum('costo_variables','costo_variables');
			$this->db->select_sum('costo_fijosper','costo_fijosper');
			$this->db->select_sum('costo_fijos + costo_variables + costo_fijosper','total_costos');
			$this->db->select_sum('facturado - ( costo_fijos + costo_variables + costo_fijosper )','profit');
			$this->db->select('SUM( facturado - (costo_fijos + costo_variables + costo_fijosper) )/SUM(facturado) *100 AS porcentaje', FALSE);
			$this->db->from('wp_venta');
			$this->db->where('estado_venta', $estado);
			$this->db->where('MONTHNAME(fecha_venta)', $mes);
			$this->db->where('YEAR(fecha_venta)', $ano);
			$this->db->group_by('MONTHNAME(fecha_venta)');
			$query = $this->db->get();

			$listar_cierre = $query->row_array();
			
			$facturado = $listar_cierre['facturado'];
			$cf = $listar_cierre['costo_fijos'];
			$cfp = $listar_cierre['costo_fijosper'];
			$cv = $listar_cierre['costo_variables'];
			$tc = $listar_cierre['total_costos'];
			$profit = $listar_cierre['profit'];
			$porcentaje = $listar_cierre['porcentaje'];

		$data = array(
			'facturado' => $facturado,
			'cfijo' => $cf,
			'cfijoper' => $cfp,
			'cvariable' => $cv,
			'tcostes' => $tc,
			'profit' => $profit,
			'porcentaje' => $porcentaje
		);
		$this->db->where('id_consolidado', $id);
		return $this->db->update('consolidado', $data);
	 }
	
	/*public function m_registrar_apartamento()
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
	}*/

}
?>