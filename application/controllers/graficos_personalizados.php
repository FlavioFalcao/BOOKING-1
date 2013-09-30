<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graficos_personalizados extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_otros');
		$this->load->model('model_ventas');
		$this->load->driver('cache');
		$this->load->helper(array('form', 'url','permisos_helper'));

        // Se le asigna a la informacion a la variable $user.
        $this->user = @$this->session->userdata('logged_user');


        	$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
			$this->output->set_header('Pragma: no-cache');
			
			//redirect ('inicio/login');

         date_default_timezone_set("America/Lima");
        if(!@$this->user) redirect ('acceso/login');

        //$permisos = cargar_permisos_del_usuario($this->user->idusuario);
 
	}
	public function index()
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '8';
		$data['subactive'] = '0';

		$fecha_despues = date("Y-m-d");
		$data['fecha_despues'] = date("Y-m-d");
		$data['fecha_antes'] = date("Y-m-d",strtotime("$fecha_despues-2 months"));

		$data['listar_apartamentos_x_venta'] = $this->model_ventas->cargar_venta_x_apartamento();

//FACTUURADO POR APARTAMENTO
		$data['listar_facturado_por_apartamento'] = $this->model_ventas->cargar_facturado_por_apartamentos();
		$listar_facturado_total = $this->model_ventas->cargar_facturado_por_apartamentos();
		$monto_total_fxa = 0;
		 foreach($listar_facturado_total as $rowfxa){
		 	$monto_total_fxa+=$rowfxa['monto_total'];
		 }
		 $data['monto_total_fxa'] = $monto_total_fxa;

//PROFIT POR APARTAMENTO
		$data['listar_profit_por_apartamento'] = $this->model_ventas->cargar_profit_por_apartamentos();
		$listar_profit_total = $this->model_ventas->cargar_profit_por_apartamentos();
		$monto_total_pxa = 0;
		 foreach($listar_profit_total as $rowpxa){
		 	$monto_total_pxa+=$rowpxa['profit'];
		 }
		 $data['monto_total_pxa'] = $monto_total_pxa;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_tipodeventa'] = $this->model_ventas->cargar_facturado_por_tipodeventa();
		$listar_tipodeventa_total = $this->model_ventas->cargar_facturado_por_tipodeventa();
		$monto_total_fptv = 0;
		 foreach($listar_tipodeventa_total as $rowfptv){
		 	$monto_total_fptv+=$rowfptv['monto_total'];
		 }
		 $data['monto_total_fptv'] = $monto_total_fptv;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_cuenta'] = $this->model_ventas->cargar_facturado_por_cuenta();
		$listar_cuenta_total = $this->model_ventas->cargar_facturado_por_cuenta();
		$monto_total_fpc = 0;
		 foreach($listar_cuenta_total as $rowfpc){
		 	$monto_total_fpc+=$rowfpc['monto_total'];
		 }
		 $data['monto_total_fpc'] = $monto_total_fpc;


		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('graficos/graficos_personalizados',$data);
		$this->load->view('plantillas/footer');
	}
	public function filtrar_graficos_por_fechas()
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '8';
		$data['subactive'] = '0';

		$data['fecha_despues'] = $this->input->post('salida');
		$data['fecha_antes'] = $this->input->post('entrada');

		$data['listar_apartamentos_x_venta'] = $this->model_ventas->cargar_venta_x_apartamento();
//FACTUURADO POR APARTAMENTO
		$data['listar_facturado_por_apartamento'] = $this->model_ventas->cargar_facturado_por_apartamentos();
		$listar_facturado_total = $this->model_ventas->cargar_facturado_por_apartamentos();
		$monto_total_fxa = 0;
		 foreach($listar_facturado_total as $rowfxa){
		 	$monto_total_fxa+=$rowfxa['monto_total'];
		 }
		 $data['monto_total_fxa'] = $monto_total_fxa;

//PROFIT POR APARTAMENTO
		$data['listar_profit_por_apartamento'] = $this->model_ventas->cargar_profit_por_apartamentos();
		$listar_profit_total = $this->model_ventas->cargar_profit_por_apartamentos();
		$monto_total_pxa = 0;
		 foreach($listar_profit_total as $rowpxa){
		 	$monto_total_pxa+=$rowpxa['profit'];
		 }
		 $data['monto_total_pxa'] = $monto_total_pxa;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_tipodeventa'] = $this->model_ventas->cargar_facturado_por_tipodeventa();
		$listar_tipodeventa_total = $this->model_ventas->cargar_facturado_por_tipodeventa();
		$monto_total_fptv = 0;
		 foreach($listar_tipodeventa_total as $rowfptv){
		 	$monto_total_fptv+=$rowfptv['monto_total'];
		 }
		 $data['monto_total_fptv'] = $monto_total_fptv;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_cuenta'] = $this->model_ventas->cargar_facturado_por_cuenta();
		$listar_cuenta_total = $this->model_ventas->cargar_facturado_por_cuenta();
		$monto_total_fpc = 0;
		 foreach($listar_cuenta_total as $rowfpc){
		 	$monto_total_fpc+=$rowfpc['monto_total'];
		 }
		 $data['monto_total_fpc'] = $monto_total_fpc;


		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('graficos/graficos_personalizados',$data);
		$this->load->view('plantillas/footer');
	}

	public function filtrar_graficos_por_apartamentos()
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '8';
		$data['subactive'] = '0';

		$data['fecha_despues'] = $this->input->post('salida');
		$data['fecha_antes'] = $this->input->post('entrada');
		$apartamentos = $this->input->post('apartamentos');

		$data['listar_apartamentos_x_venta'] = $this->model_ventas->cargar_venta_x_apartamento();
//FACTUURADO POR APARTAMENTO
		$data['listar_facturado_por_apartamento'] = $this->model_ventas->cargar_facturado_filtrar_por_apartamentos($apartamentos);
		$listar_facturado_total = $this->model_ventas->cargar_facturado_filtrar_por_apartamentos($apartamentos);
		$monto_total_fxa = 0;
		 foreach($listar_facturado_total as $rowfxa){
		 	$monto_total_fxa+=$rowfxa['monto_total'];
		 }
		 $data['monto_total_fxa'] = $monto_total_fxa;

//PROFIT POR APARTAMENTO
		$data['listar_profit_por_apartamento'] = $this->model_ventas->cargar_profit_filtrar_por_apartamentos($apartamentos);
		$listar_profit_total = $this->model_ventas->cargar_profit_filtrar_por_apartamentos($apartamentos);
		$monto_total_pxa = 0;
		 foreach($listar_profit_total as $rowpxa){
		 	$monto_total_pxa+=$rowpxa['profit'];
		 }
		 $data['monto_total_pxa'] = $monto_total_pxa;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_tipodeventa'] = $this->model_ventas->cargar_facturado_por_tipodeventa_filtrar_por_apartamentos($apartamentos);
		$listar_tipodeventa_total = $this->model_ventas->cargar_facturado_por_tipodeventa_filtrar_por_apartamentos($apartamentos);
		$monto_total_fptv = 0;
		 foreach($listar_tipodeventa_total as $rowfptv){
		 	$monto_total_fptv+=$rowfptv['monto_total'];
		 }
		 $data['monto_total_fptv'] = $monto_total_fptv;

//FACTURADO POR TIPO DE VENTA
		$data['listar_facturado_por_cuenta'] = $this->model_ventas->cargar_facturado_por_cuenta_filtrar_por_apartamentos($apartamentos);
		$listar_cuenta_total = $this->model_ventas->cargar_facturado_por_cuenta_filtrar_por_apartamentos($apartamentos);
		$monto_total_fpc = 0;
		 foreach($listar_cuenta_total as $rowfpc){
		 	$monto_total_fpc+=$rowfpc['monto_total'];
		 }
		 $data['monto_total_fpc'] = $monto_total_fpc;


		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('graficos/graficos_personalizados',$data);
		$this->load->view('plantillas/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */