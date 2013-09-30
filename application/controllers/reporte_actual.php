<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_actual extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_ventas');
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

		$data['listar_ventas_actuales'] = $this->model_ventas->cargar_ventas_del_mes();
		$data['listar_total_ventas_actuales'] = $this->model_ventas->cargar_total_ventas_del_mes();
		$data['listar_ventas_por_tipodeventa_actuales'] = $this->model_ventas->cargar_ventas_por_tipodeventa_del_mes();

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reportes/reporte_actual',$data);
		$this->load->view('plantillas/footer');
	}
	public function graficos_actuales()
	{

		$data['active'] = '9';
		$data['subactive'] = '0';

//FACTUURADO POR APARTAMENTO
		$data['listar_facturado_por_apartamento'] = $this->model_ventas->cargar_facturado_por_apartamentos_actual();
		$listar_facturado_total = $this->model_ventas->cargar_facturado_por_apartamentos_actual();
		$monto_total_fxa = 0;
		 foreach($listar_facturado_total as $rowfxa){
		 	$monto_total_fxa+=$rowfxa['monto_total'];
		 }
		 $data['monto_total_fxa'] = $monto_total_fxa;

//PROFIT POR APARTAMENTO
		$data['listar_profit_por_apartamento'] = $this->model_ventas->cargar_profit_por_apartamentos_actual();
		$listar_profit_total = $this->model_ventas->cargar_profit_por_apartamentos_actual();
		$monto_total_pxa = 0;
		 foreach($listar_profit_total as $rowpxa){
		 	$monto_total_pxa+=$rowpxa['profit'];
		 }
		 $data['monto_total_pxa'] = $monto_total_pxa;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_tipodeventa'] = $this->model_ventas->cargar_facturado_por_tipodeventa_actual();
		$listar_tipodeventa_total = $this->model_ventas->cargar_facturado_por_tipodeventa_actual();
		$monto_total_fptv = 0;
		 foreach($listar_tipodeventa_total as $rowfptv){
		 	$monto_total_fptv+=$rowfptv['monto_total'];
		 }
		 $data['monto_total_fptv'] = $monto_total_fptv;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_cuenta'] = $this->model_ventas->cargar_facturado_por_cuenta_actual();
		$listar_cuenta_total = $this->model_ventas->cargar_facturado_por_cuenta_actual();
		$monto_total_fpc = 0;
		 foreach($listar_cuenta_total as $rowfpc){
		 	$monto_total_fpc+=$rowfpc['monto_total'];
		 }
		 $data['monto_total_fpc'] = $monto_total_fpc;

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('graficos/graficos_actuales',$data);
		$this->load->view('plantillas/footer');
	}

//EXPORTAR A EXCEL 
	public function exp_venta_actual_detalle()
	{

		$data['listar_ventas_actuales'] = $this->model_ventas->cargar_ventas_del_mes();
		$data['listar_total_ventas_actuales'] = $this->model_ventas->cargar_total_ventas_del_mes();

		$this->load->view('exportacion/exportar_mes_actual_detalle',$data);
		
	}
	public function exp_venta_actual_por_tipo_venta()
	{

		$data['listar_ventas_por_tipodeventa_actuales'] = $this->model_ventas->cargar_ventas_por_tipodeventa_del_mes();

		$this->load->view('exportacion/exportar_mes_actual_tipodeventa',$data);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */