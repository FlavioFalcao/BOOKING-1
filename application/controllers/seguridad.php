<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguridad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_usuario');
		$this->load->model('model_otros');
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
        if($this->user->id_tipous != 1000 ){
        	redirect ('inicio');
        }

        //$permisos = cargar_permisos_del_usuario($this->user->idusuario);
 
	}
	public function index()
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '10';
		$data['subactive'] = '0';

		$data['listar_tipo_usuario'] = $this->model_usuario->cargar_tipousuario();

		$data['listar_cuentas'] = $this->model_usuario->cargar_cuentas_activas();
		$data['listar_cuentas_usuario'] = $this->model_usuario->cargar_cuentas_x_usuario();

		$data['listar_permisos'] = $this->model_usuario->cargar_permisos();
		$data['listar_permisos_usuario'] = $this->model_usuario->cargar_permisos_x_usuario();

		$data['listar_usuario'] = $this->model_usuario->cargar_usuario();

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('seguridad/registrar_usuario',$data);
		$this->load->view('plantillas/footer');
	}

	public function registrar_usuario()
	{
		$this->model_usuario->m_registrar_usuario();
		$this->model_usuario->m_registrar_cuentas_usuario();
		$this->model_usuario->m_registrar_permisos_usuario();
		 redirect (site_url('seguridad'));
	}

	public function obtener_usuario_editar($id)
	{

		$data['active'] = '10';
		$data['subactive'] = '0';

		$data['listar_tipo_usuario'] = $this->model_usuario->cargar_tipousuario();

		$data['listar_usuario_fila'] = $this->model_usuario->cargar_usuario($id);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('seguridad/obtener_usuario_editar',$data);
		$this->load->view('plantillas/footer');
	}

	public function obtener_cuentas_asignar($id)
	{

		$data['active'] = '10';
		$data['subactive'] = '0';

		$data['listar_cuentas_x_usuario'] = $this->model_usuario->cargar_cuentas_x_usuario();
		$data['listar_cuentas_x_usuario_sin_asignar'] = $this->model_usuario->cargar_cuentas_no_establecidas($id);
		$data['listar_usuario_fila'] = $this->model_usuario->cargar_usuario($id);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('seguridad/obtener_cuentas_usuario',$data);
		$this->load->view('plantillas/footer');
	}

	public function obtener_permisos_asignar($id)
	{

		$data['active'] = '10';
		$data['subactive'] = '0';

		$data['listar_permisos_x_usuario'] = $this->model_usuario->cargar_permisos_x_usuario();
		$data['listar_permisos_x_usuario_sin_asignar'] = $this->model_usuario->cargar_permisos_no_establecidos($id);
		$data['listar_usuario_fila'] = $this->model_usuario->cargar_usuario($id);

		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('seguridad/obtener_permisos_usuario',$data);
		$this->load->view('plantillas/footer');
	}

	public function asignar_cuentas()
	{
		$this->model_usuario->m_eliminar_cuentas();
		$this->model_usuario->m_registrar_cuentas_usuario();
		 redirect (site_url('seguridad'));
	}

	public function asignar_permisos()
	{
		$this->model_usuario->m_eliminar_permisos();
		$this->model_usuario->m_registrar_permisos_usuario();
		 redirect (site_url('seguridad'));
	}

	public function editar_usuario()
	{
		$this->model_usuario->m_editar_usuario();
		 redirect (site_url('seguridad'));
	}
	public function anular_usuario($id)
	{
		$this->model_usuario->m_anular_usuario($id);
		 redirect (site_url('seguridad'));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */