<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cierre_de_mes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('model_ventas');
		$this->load->model('model_cierre');
		$this->load->driver('cache');
		$this->load->helper(array('form', 'url','permisos_helper','fechas_helper'));

        // Se le asigna a la informacion a la variable $user.
        $this->user = @$this->session->userdata('logged_user');


        	$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
			$this->output->set_header('Pragma: no-cache');
			
			//redirect ('inicio/login');

         date_default_timezone_set("America/Lima");
        if(!@$this->user) redirect ('acceso/login');
        if($this->user->id_tipous == 1002 ){
        	redirect ('inicio');
        }

        //$permisos = cargar_permisos_del_usuario($this->user->idusuario);
 
	}
	public function index()
	{

		$data['active'] = '9';
		$data['subactive'] = '0';

		$data['listar_meses'] = $this->model_ventas->cargar_meses_venta();
		$data['listar_anos'] = $this->model_ventas->cargar_anos_venta();
		$data['listar_cierre'] = $this->model_cierre->cargar_cierre_de_mes();

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('cierre/cierre_de_mes',$data);
		$this->load->view('plantillas/footer');
	}
	public function detalles_de_cierre($mes,$ano)
	{

		$data['active'] = '9';
		$data['subactive'] = '0';

		$data['mes'] = $mes;
		$data['ano'] = $ano;

		$data['listar_ventas_del_mes'] = $this->model_ventas->cargar_ventas_del_mes_asignado($mes,$ano);
		$data['listar_total_ventas_del_mes'] = $this->model_ventas->cargar_total_ventas_del_mes_asignado($mes,$ano);
		$data['listar_ventas_por_tipodeventa_del_mes'] = $this->model_ventas->cargar_ventas_por_tipodeventa_del_mes_asignado($mes,$ano);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('cierre/detalle_cierre',$data);
		$this->load->view('plantillas/footer');
	}
	public function agregar_costos($id,$mes,$ano)
	{

		$data['active'] = '9';
		$data['subactive'] = '0';

		$data['mes'] = $mes;
		$data['ano'] = $ano;
		$data['idcon'] = $id;

		$data['listar_apartamentos'] = $this->model_ventas->cargar_facturado_por_apartamentos_del_mes($mes,$ano);
		$data['listar_fila_cierre_de_mes'] = $this->model_cierre->cargar_fila_cierre_de_mes($id);


		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('cierre/registrar_costos',$data);
		$this->load->view('plantillas/footer');
	}
	public function registrar_costo_fijo()
	{
		$id = $this->input->post('idcon');
		$mes = $this->input->post('mes');
		$ano = $this->input->post('ano');

		$this->model_cierre->m_actualizar_ventas_al_registrar_cf();
		$this->model_cierre->m_actualizar_cierre($id,$mes,$ano);
		 redirect (site_url('cierre_de_mes'));

	 }
	public function registrar_costo_permanente()
	{
		$id = $this->input->post('idcon');
		$mes = $this->input->post('mes');
		$ano = $this->input->post('ano');

		$this->model_cierre->m_actualizar_ventas_al_registrar_cp();
		$this->model_cierre->m_actualizar_cierre($id,$mes,$ano);
		 redirect (site_url('cierre_de_mes'));

	 }
	public function registrar_cierre()
	{

		$this->model_cierre->m_registrar_cierre();
		 redirect (site_url('cierre_de_mes'));

	 }
	public function actualizar_cierre($id,$mes,$ano)
	{

		$this->model_cierre->m_actualizar_cierre($id,$mes,$ano);
		 redirect (site_url('cierre_de_mes'));

	 }
	public function eliminar_cierre($id)
	{

		$this->model_cierre->m_eliminar_cierre($id);
		 redirect (site_url('cierre_de_mes'));

	 }
	public function graficos_del_mes($mes,$ano)
	{

		$data['active'] = '9';
		$data['subactive'] = '0';

		$data['mes'] = $mes;
		$data['ano'] = $ano;

//GRAFICO DE OCUPABILIDAD - EL MAS COMPLICADO XD
		$pnumes = date('m',strtotime($mes));
		$pfechainicio = date('Y-m-d',strtotime($ano."/".$pnumes."/01"));
		$pultimo = cal_days_in_month(CAL_GREGORIAN, $pnumes, $ano);
		$pfechafin = date("Y-m-d",strtotime($ano."/".$pnumes."/".$pultimo));

		$data['dias_mes'] = $pultimo;
		$data['pfechainicio'] = $pfechainicio;
		$data['pfechafin'] = $pfechafin;
		$data['listar_facturado_por_apartamentos_entre_el_mes'] = $this->model_ventas->cargar_facturado_por_apartamentos_entre_el_mes($pfechainicio,$pfechafin);
		//$data['listar_ocupabilidad_por_apartamento'] = $this->model_ventas->cargar_ocupabilidad_por_apartamento($pfechainicio,$pfechafin);

//FACTUURADO POR APARTAMENTO
		$data['listar_facturado_por_apartamento'] = $this->model_ventas->cargar_facturado_por_apartamentos_del_mes($mes,$ano);
		$listar_facturado_total = $this->model_ventas->cargar_facturado_por_apartamentos_del_mes($mes,$ano);
		$monto_total_fxa = 0;
		 foreach($listar_facturado_total as $rowfxa){
		 	$monto_total_fxa+=$rowfxa['monto_total'];
		 }
		 $data['monto_total_fxa'] = $monto_total_fxa;

//PROFIT POR APARTAMENTO
		$data['listar_profit_por_apartamento'] = $this->model_ventas->cargar_profit_por_apartamentos_del_mes($mes,$ano);
		$listar_profit_total = $this->model_ventas->cargar_profit_por_apartamentos_del_mes($mes,$ano);
		$monto_total_pxa = 0;
		 foreach($listar_profit_total as $rowpxa){
		 	$monto_total_pxa+=$rowpxa['profit'];
		 }
		 $data['monto_total_pxa'] = $monto_total_pxa;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_tipodeventa'] = $this->model_ventas->cargar_facturado_por_tipodeventa_del_mes($mes,$ano);
		$listar_tipodeventa_total = $this->model_ventas->cargar_facturado_por_tipodeventa_del_mes($mes,$ano);
		$monto_total_fptv = 0;
		 foreach($listar_tipodeventa_total as $rowfptv){
		 	$monto_total_fptv+=$rowfptv['monto_total'];
		 }
		 $data['monto_total_fptv'] = $monto_total_fptv;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_cuenta'] = $this->model_ventas->cargar_facturado_por_cuenta_del_mes($mes,$ano);
		$listar_cuenta_total = $this->model_ventas->cargar_facturado_por_cuenta_del_mes($mes,$ano);
		$monto_total_fpc = 0;
		 foreach($listar_cuenta_total as $rowfpc){
		 	$monto_total_fpc+=$rowfpc['monto_total'];
		 }
		 $data['monto_total_fpc'] = $monto_total_fpc;

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('graficos/graficos_del_mes',$data);
		$this->load->view('plantillas/footer');
	}
//EXPORTAR A EXCEL 
	public function exp_lista_cierres()
	{

		$data['listar_cierre'] = $this->model_cierre->cargar_cierre_de_mes();

		$this->load->view('exportacion/exportar_lista_cierres',$data);
		
	}
	public function exp_detalles_de_cierre_por_venta($mes,$ano)
	{

		$data['active'] = '9';
		$data['subactive'] = '0';

		$data['mes'] = $mes;
		$data['ano'] = $ano;

		$data['listar_ventas_del_mes'] = $this->model_ventas->cargar_ventas_del_mes_asignado($mes,$ano);
		$data['listar_total_ventas_del_mes'] = $this->model_ventas->cargar_total_ventas_del_mes_asignado($mes,$ano);
		

		$this->load->view('exportacion/exportar_detalle_mes_asignado',$data);

	}
	public function exp_detalles_de_cierre_por_tipo_de_venta($mes,$ano)
	{

		$data['active'] = '9';
		$data['subactive'] = '0';

		$data['mes'] = $mes;
		$data['ano'] = $ano;

		$data['listar_ventas_por_tipodeventa_del_mes'] = $this->model_ventas->cargar_ventas_por_tipodeventa_del_mes_asignado($mes,$ano);
		

		$this->load->view('exportacion/exportar_detalle_mes_por_tipo_venta',$data);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */