<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_usuario');
		$this->load->model('model_reservas');
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
		$data['active'] = '2';
		$data['subactive'] = '0';
		$data['listar_tipo_venta'] = $this->model_otros->cargar_tipo_venta();
		$data['listar_tipo_pago'] = $this->model_otros->cargar_tipo_pago();
		$data['listar_cuentas_usuario'] = $this->model_otros->cargar_cuentas_usuario($idusuario);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reserva/nueva_reserva');
		$this->load->view('plantillas/footer');
	}
	public function reservaciones_entrantes()
	{
		$data['active'] = '3';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';

		$data['listar_r_sinconfirmar'] = $this->model_reservas->cargar_reserva_sin_confirmar();
		$data['listar_r_confirmada'] = $this->model_reservas->cargar_reserva_confirmada();
		$data['listar_r_despachada'] = $this->model_reservas->cargar_reserva_despachada();

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reserva/lista_reserva');
		$this->load->view('plantillas/footer');
	}

	public function ordenar_lista($forma)
	{
		$data['active'] = '3';

		$data['subactive'] = '0';

		$data['listar_r_sinconfirmar'] = $this->model_reservas->cargar_reserva_sin_confirmar_orden($forma);
		$data['listar_r_confirmada'] = $this->model_reservas->cargar_reserva_confirmada_orden($forma);
		$data['listar_r_despachada'] = $this->model_reservas->cargar_reserva_despachada_orden($forma);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reserva/lista_reserva',$data);
		$this->load->view('plantillas/footer');
	}
	public function cambiar_status($idreserva)
	{
		$this->model_reservas->m_cambiar_status($idreserva);

		 redirect (site_url('reserva/reservaciones_entrantes'));
	}

	public function obtener_reserva_confirmar($idreserva)
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '3';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';
		$data['listar_fila_reserva'] = $this->model_reservas->cargar_reserva_sin_confirmar_fila($idreserva);
		$data['listar_tipo_venta'] = $this->model_otros->cargar_tipo_venta();
		$data['listar_tipo_pago'] = $this->model_otros->cargar_tipo_pago();
		$data['listar_cuentas_usuario'] = $this->model_otros->cargar_cuentas_usuario($idusuario);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reserva/obtener_reserva_confirmar',$data);
		$this->load->view('plantillas/footer');
 
	}

	public function obtener_reserva_editar_sc($idreserva)
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '3';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';
		$data['listar_fila_reserva'] = $this->model_reservas->cargar_reserva_sin_confirmar_fila($idreserva);
		$data['listar_tipo_venta'] = $this->model_otros->cargar_tipo_venta();
		$data['listar_tipo_pago'] = $this->model_otros->cargar_tipo_pago();
		$data['listar_cuentas_usuario'] = $this->model_otros->cargar_cuentas_usuario($idusuario);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reserva/obtener_reserva_editar_sc',$data);
		$this->load->view('plantillas/footer');
 
	}
	public function obtener_reserva_editar_c($idreserva)
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '3';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';
		$data['listar_fila_reserva'] = $this->model_reservas->cargar_reserva_confirmada_fila($idreserva);
		$data['listar_tipo_venta'] = $this->model_otros->cargar_tipo_venta();
		$data['listar_tipo_pago'] = $this->model_otros->cargar_tipo_pago();
		$data['listar_cuentas_usuario'] = $this->model_otros->cargar_cuentas_usuario($idusuario);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reserva/obtener_reserva_editar_c',$data);
		$this->load->view('plantillas/footer');
 
	}
	public function obtener_reserva_facturar($idreserva)
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '3';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';
		$data['listar_fila_reserva'] = $this->model_reservas->cargar_reserva_confirmada_fila($idreserva);
		$data['listar_tipo_venta'] = $this->model_otros->cargar_tipo_venta();
		$data['listar_tipo_pago'] = $this->model_otros->cargar_tipo_pago();
		$data['listar_cuentas_usuario'] = $this->model_otros->cargar_cuentas_usuario($idusuario);
		$data['listar_apartamentos'] = $this->model_apartamentos->cargar_apartamentos();

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reserva/obtener_reserva_facturar',$data);
		$this->load->view('plantillas/footer');
 
	}

	public function confirmar_reserva()
	{

		$this->model_reservas->m_confirmar_reserva();

		 redirect (site_url('reserva/reservaciones_entrantes'));
	}
	
	public function registrar_reserva()
	{

		$this->model_reservas->m_registrar_reserva();
		$this->model_reservas->m_registrar_nota_de_reserva();
		 redirect (site_url('reserva/reservaciones_entrantes'));
	}

	public function facturar_reserva()
	{

		$this->model_reservas->m_facturar_reserva();
		$this->model_reservas->m_actualizar_reserva_facturada();
		 redirect (site_url('ventas/listar_ventas'));
	}

	public function editar_reserva_sc()
	{

		$this->model_reservas->m_editar_reserva_sc();

		 redirect (site_url('reserva/reservaciones_entrantes'));
	}

	public function editar_reserva_c()
	{

		$this->model_reservas->m_editar_reserva_c();

		 redirect (site_url('reserva/reservaciones_entrantes'));
	}

	public function notas($idreserva)
	{
		$data['active'] = '3';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';

		$data['fila_reserva'] = $this->model_reservas->cargar_reserva_sin_confirmar_fila($idreserva);

		$data['listar_nota_reserva'] = $this->model_reservas->cargar_notas_reserva($idreserva);


		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('reserva/nota_reservas');
		$this->load->view('plantillas/footer');
	}
	public function registrar_nota_reserva()
	{
		$idreserva = $this->input->post('idreserva');
		$this->model_reservas->m_registrar_nota();

		 redirect (site_url('reserva/notas/'.$idreserva));
	}
	public function anular_nota($idnota,$idreserva)
	{

		$this->model_reservas->m_anular_nota($idnota);

		 redirect (site_url('reserva/notas/'.$idreserva));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */