<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_usuario');
		$this->load->model('model_ventas');
		$this->load->model('model_otros');
		$this->load->model('model_apartamentos');
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

        //$permisos = cargar_permisos_del_usuario($this->user->idusuario);
 
	}
	public function index()
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '5';
		$data['subactive'] = '0';
		$data['listar_tipo_venta'] = $this->model_otros->cargar_tipo_venta();
		$data['listar_tipo_pago'] = $this->model_otros->cargar_tipo_pago();
		$data['listar_cuentas_usuario'] = $this->model_otros->cargar_cuentas_usuario($idusuario);
		$data['listar_apartamentos'] = $this->model_apartamentos->cargar_apartamentos();

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('venta/nueva_venta',$data);
		$this->load->view('plantillas/footer');
	}
	public function listar_ventas()
	{
		$data['active'] = '4';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';

		$data['antes'] = date("Y-m-d", strtotime("-1 month"));
        $data['despues'] = date("Y-m-d");
        
		$data['listar_ventas'] = $this->model_ventas->cargar_ventas();

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('venta/lista_ventas');
		$this->load->view('plantillas/footer');
	}

	public function filtrar_lista_ventas()
	{
		$data['active'] = '4';
		$data['subactive'] = '0';

		$data['antes'] = $this->input->post('entrada');
		$data['despues'] = $this->input->post('salida');

		$data['listar_ventas'] = $this->model_ventas->cargar_ventas_filtradas_por_fecha();

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('venta/lista_ventas',$data);
		$this->load->view('plantillas/footer');
	}

	public function obtener_venta_editar($idventa)
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '4';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';
		$data['listar_fila_venta'] = $this->model_ventas->cargar_ventas($idventa);
		$data['listar_tipo_venta'] = $this->model_otros->cargar_tipo_venta();
		$data['listar_tipo_pago'] = $this->model_otros->cargar_tipo_pago();
		$data['listar_apartamentos'] = $this->model_apartamentos->cargar_apartamentos();
		$data['listar_cuentas_usuario'] = $this->model_otros->cargar_cuentas_usuario($idusuario);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('venta/obtener_venta_editar',$data);
		$this->load->view('plantillas/footer');
 
	}
	
	public function registrar_venta()
	{
		$this->model_ventas->m_registrar_venta();
		 redirect (site_url('ventas/listar_ventas'));
	}

	public function editar_venta()
	{
		$this->model_ventas->m_editar_venta();

		redirect (site_url('ventas/listar_ventas'));
	}

	public function anular_venta($idventa)
	{

		$this->model_ventas->m_anular_venta($idventa);
		 redirect (site_url('ventas/listar_ventas'));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */